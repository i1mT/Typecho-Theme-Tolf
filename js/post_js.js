function getCover(u,obj){
  $.ajax({
    url: u,
    success:function(data){
      var reg = /background:url\(([\s\S]*)\)50\%/;
      var result = $.trim(data.match(reg)[1]);
      $(obj).css({
        background:'url('+ result+ ') 50% 80%',
        'background-size':'cover',
      });
    }
  });
}
$(document).ready(function(){
    var relatePages = $('.relatePage li');
    var max = parseInt($(relatePages[0]).css('height')) > parseInt($(relatePages[1]).css('height')) ? $(relatePages[0]).css('height'):$(relatePages[1]).css('height');
    for(var i = 0; i < relatePages.length; i++){
      if($(relatePages[i]).html()=='none'){//如果沒有的话 就删除这个li
        relatePages[i].remove();
        relatePages.css('width','94%');
      }else{//否则通过ajax获取封面图
        var url = $(relatePages[i]).find('a')[0].href;
        console.log(url);
        getCover(url,relatePages[i]);
      }
      relatePages.css('height',max);
    }
    //下面的代码将文章中的图片大小优化一下  后7个
    var contentImg = $('article').find('img');//获取文章中所有的图片
    var articleWidth = $('article').width();
    for (var i = 0; i < contentImg.length-7; i++) {
      if( $(contentImg[i]).width()>= articleWidth*0.9 && $(contentImg[i]).height()>articleWidth*0.3){
          $(contentImg[i]).css({
            width: '104%',
            margin: '.7rem -2% 0 -2%',
          })
      }else if( $(contentImg[i]).width()>= articleWidth*0.4 ){
        var width = '50%';
        if($(contentImg[i]).width()>= articleWidth*0.5 ){width = '60%';}
        var marginCenter = ((100-parseInt(width))/2)+'%';
        $(contentImg[i]).css({
          width: width,
          'margin-top': '.7rem',
          'margin-right': marginCenter,
          'margin-bottom': '0',
          'margin-left': marginCenter
        })
        var img_alt = '<div class="img-alt">'+ contentImg[i].alt +'</div>';
        $(contentImg[i].parentNode).css('text-align','center');
        $(contentImg[i].parentNode).append(img_alt);
      }else{
        $(contentImg[i]).css({
          width: '30%',
          margin: '.7rem 35% 0 35%'
        })
      }
    }
  })
