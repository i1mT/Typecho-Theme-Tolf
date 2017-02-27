var siteHomePageUrl = "http://www.iimt.me/";
$(document).ready(function(){
  if (document.body.offsetWidth > 750) {
    $(function(){
      $('#myFullPage').fullpage();
    });
  }else{
    var int1 = $('.intro1').html();
    var int2 = $('.intro2').html();
    $('.intro1').html(int1+int2);
    //宽度较低屏幕下删除一些元素
    $('.intro2').remove();
    $('.tips').remove();
    $('.icon-xiangxia').remove();
    $('.setBottom').remove();
    //给每一页最下面添加一个链接
    var pageCount = $('.page-navigator li').length-1;
    var re = /\/page\/([\s\S]*)\//;//截取当前是第几页
    var locationHref = window.location.href;
    var curPageNum;
    if(locationHref==siteHomePageUrl+"index.php" || locationHref==siteHomePageUrl){
      curPageNum = 1;
    }else{
      curPageNum = parseInt(locationHref.match(re)[1]);
    }
    var text = "进入下一页";
    var nextUrl;
    if(pageCount==curPageNum){
      text = "上一页";
      nextUrl = siteHomePageUrl+"index.php/page/"+ (curPageNum-1) +"/";;
    }else{
      nextUrl = siteHomePageUrl+"index.php/page/"+ (curPageNum+1) +"/";
    }
    var next = '<div class="nextPage">'+
    '<a href="'+ nextUrl +'">'+ text +'</a></div>';
    var Sections = $('#myFullPage .section');//所有屏
    $(Sections[Sections.length-1]).append(next);
  }
}
)
window.onresize = function(){
  var clientWidth = document.body.offsetWidth;
  console.log(clientWidth);
}
