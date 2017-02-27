<?php if ($this->is('index')): ?>
  <script src="<?php $this->options->themeUrl() ?>/js/handler.js"></script>
<?php else: ?>
  <a class="flyTo" style="display: none;">
    <div class="to-top-wrap"></div>
  </a>
  <script>
    var V_height = $(window).height();
    $(window).scroll(function(){
      if(V_height*1 < $(document).scrollTop()){
        $('.flyTo').show();
      }else{
        $('.flyTo').hide();
      }
    });
    $('.flyTo').on('click',function(){
      $('html, body').animate({scrollTop:0}, 'normal');
    })
  </script>
  <footer>
		<p><a href="http://www.iimt.me">iimT的独立博客</a> @2017</p>
		<p>Theme <a href="http://www.iimt.me">Tolf</a> Design by <a href="http://www.iimt.me">iimT</a></p>
		<p>浙ICP备17000556号</p>
	</footer>
<?php endif ?>
</body>
<script>
  //去掉tags的标签里面的href
  $('.tags').find('a').attr('href','#');//去掉首页的
  $('.post-bg-container-mid p').find('a').attr('href','#');//去掉博文页的
</script>
</html>
