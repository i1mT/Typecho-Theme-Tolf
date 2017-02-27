  var siteHomePageUrl = "http://www.iimt.me/";
  var pageCount = $('.page-navigator li').length-1; //得到总页数
  var re = /\/page\/([\s\S]*)\//; //ajax获取内容正则表达式处理规则
  var locationHref = window.location.href;
  var curPageNum;
  if(locationHref== (siteHomePageUrl+"index.php") || locationHref==siteHomePageUrl){
    curPageNum = 1;
  }else{
    curPageNum = parseInt(locationHref.match(re)[1]);
  }
  console.log(curPageNum);
  var result = curPageNum;
  var Sections = $('#myFullPage .section');//所有屏

  scollEvent(Sections[Sections.length-1],true);
  //给最后一屏添加事件，如果发生滚动，先消除800毫秒，下一次滚动时弹出下一页提示。
  var ifClearTime = false;

  //改变每页最后一屏的下滑提示文字
  var t = $(Sections[Sections.length-1]).find('.tips').html('下滑到下一页');
  var next_page_con; //下一页的ajax内容获取容器
  var tog_next;
    //添加最后一屏鼠标滚轮事件

  function scollEvent(obj,a){ //传入要绑定的对象 传入布尔值 若为真绑定 假取消事件
    if (a) { //添加滚轮事件
      if(obj.addEventListener){
      obj.addEventListener('DOMMouseScroll',load_next_page);//W3C
      }
      obj.onmousewheel=load_next_page;//IE/Opera/Chrome
    }else{ //删除滚轮事件
      if(obj.removeEventListener){
      obj.removeEventListener('DOMMouseScroll',load_next_page);//W3C
      }
      obj.onmousewheel=null;//IE/Opera/Chrome
    }
  }

  function load_next_page(){ //出现下一页提示
    if(document.body.clientWidth <= 600){return;}
    console.log("scoll comes~");
    if(!ifClearTime){//误刷，消耗800毫秒之后重新接受滚动事件
      scollEvent(Sections[Sections.length-1],false);//解除滚动事件
      setTimeout(function(){
        console.log('已经等待了0.6秒');
        ifClearTime = true;
        scollEvent(Sections[Sections.length-1],true);//重新开始接受事件
      },600);
    }else{//800毫秒已经消除
      scollEvent(Sections[Sections.length-1],false);//解除滚动事件
      var text = "再次下滑进入下一页";
      var nextUrl;
      if(pageCount==curPageNum){
        text = "再次滑动进入上一页";
        nextUrl = siteHomePageUrl+"index.php/page/"+ (curPageNum-1) +"/";
      }else{
        nextUrl = siteHomePageUrl+"index.php/page/"+ (curPageNum+1) +"/";
      }
      var next = '<div class="nextPage">'+
      '<p>'+ text +'</p></div>';

      Sections = $('#myFullPage .section');//刷新
      if(!($('.nextPage').length)){
        $(Sections[Sections.length-1]).find('.fp-tableCell').append(next);
      }
      tog_next = $('.nextPage');
      tog_next.show();//显示提示
      setTimeout(function(){
        if(Sections[Sections.length-1].addEventListener){
          Sections[Sections.length-1].addEventListener('DOMMouseScroll',toHref);//W3C
        }
        Sections[Sections.length-1].onmousewheel=toHref;//IE/Opera/Chrome
      },300);
      //给下一页提示添加点击事件，点击之后隐藏提示
      tog_next.on('click',function(){
        console.log(1);
        tog_next.hide();
        //删除滚动事件
        if(Sections[Sections.length-1].addEventListener){
          Sections[Sections.length-1].removeEventListener('DOMMouseScroll',toHref);//W3C
        }
        Sections[Sections.length-1].onmousewheel=null;//IE/Opera/Chrome

        scollEvent(Sections[Sections.length-1],true);
      });
      function toHref(e){
        var v;
        e=e || window.event;
        if(e.wheelDelta){//IE/Opera/Chrome
            v=e.wheelDelta;
        }else if(e.detail){//Firefox
            v=e.detail;
        }
        if(pageCount==curPageNum || v<0){
          self.location = nextUrl;
        }else{
          tog_next.hide();
          if(Sections[Sections.length-1].addEventListener){
            Sections[Sections.length-1].removeEventListener('DOMMouseScroll',toHref);//W3C
          }
          Sections[Sections.length-1].onmousewheel=null;//IE/Opera/Chrome
        }
      }
    }
    // if (curPageNum<pageCount) {
    //   $.ajax({
    //     url:"http://localhost/Blog/index.php/page/" + (curPageNum+1) + "/",
    //     dataType:"html",
    //     success:function(data){
    //       next_page_con = data;
    //       next_page_con_handler();
    //       //更新Sections 并且重新初始化myFullPage  重新绑定对最后一屏的滚轮事件
    //       curPageNum++;
    //       Sections = $('#myFullPage .section');
    //       scollEvent(Sections[Sections.length-1],true);
    //       console.log(Sections[Sections.length-1]);
    //     }
    //   });
    // }else{
    //   console.log("已经是最后一篇了");
    // }
  }
  function next_page_con_handler(){ //处理ajax获取的内容并且添加到网页末
    var result = next_page_con.match(re);
    var last_con = result[1];
    console.log(result[1]);//得到中间的内容
    $(Sections[Sections.length-1]).after(result[1]);
    $(function(){
      $('#myFullPage').fullpage();
    });
  }
