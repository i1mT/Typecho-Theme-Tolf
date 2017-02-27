<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>
  <div class="post-bg-container" style="background:url(
  <?php //用自定义字段T_bg获取背景图片地址
    if(isset($this->fields->T_bg)){
      $this->fields->T_bg();
    }else{
      $this->options->themeUrl();
      echo "img/default-bg.jpg";
    }?>)50% 90%;background-size:cover;">
    <div class="post-filter"></div>
    <div class="post-bg-container-mid">
      <a class="post-home-btn" href="<?php $this->options->siteUrl(); ?>">HOME</a>
      <h1 class="post-article-title"><ahref="<?php $this->permalink() ?>">标题：<?php $this->title() ?></a></h1>
      <time><?php $this->date('j F Y'); ?></time>
      <?php $this->author(); ?>
      <p><?php $this->tags('', true); ?></p>
    </div>
  </div>
    <article>
      <?php $this->content(); ?>
      <div class="admired">
            <span>赏</span>
            <img src="<?php $this->options->themeUrl() ?>/img/admired-weixin.png" alt="" />
            <p>
              如果你觉得这篇文章对你有帮助，欢迎你对我打赏
            </p>
      </div>
      <div class="aboutme">
        <img class="aboutme-avatar" src="<?php $this->options->themeUrl() ?>/img/avatar.jpg" alt="" />
        <p class="aboutme-name">
          iimT
        </p>
        <p class="aboutme-desc">
          大一计科狗，喜欢音乐、运动、编程、摄影，人生最大的快感来自于创造。目前致力于前端开发方向，坐标浙江绍兴，很乐意你与我交流。
        </p>
        <div class="aboutme-social">
          <a href="http://weibo.com/ATmxj" target="_blank"><img class="weibo" src="<?php $this->options->themeUrl() ?>/img/Weibo.png"></a>
          <img class="weixing" src="<?php $this->options->themeUrl() ?>/img/Weixing.png">
          <img class="qq" src="<?php $this->options->themeUrl() ?>/img/QQ.png">
          <a href="https://www.zhihu.com/people/tao-feng-hua" target="_blank"><img class="zhuhu" src="<?php $this->options->themeUrl() ?>/img/Zhihu.png"></a>
          <a href="https://github.com/tfh93121" target="_blank"><img class="github" src="<?php $this->options->themeUrl() ?>/img/GitHub.png"></a>
        </div>
      </div>
      <ul class="relatePage">
        <li style=""><?php $this->thePrev('%s','none'); ?></li>
        <li style=""><?php $this->theNext('%s','none'); ?></li>
      </ul>
        <!-- <div class="TogComment">
          点击展开评论
        </div> -->
        <div id="comments">
          <?php if($this->allow('comment')): ?>
          <!-- 多说评论框 start -->
          	<div class="ds-thread" data-thread-key="<?php echo $this->cid;?>" data-title="<?php echo $this->title;?>" data-author-key="<?php echo $this->authorId;?>" data-url=""></div>
          <!-- 多说评论框 end -->
          <!-- 多说公共JS代码 start (一个网页只需插入一次) -->
          <script type="text/javascript">
          var duoshuoQuery = {short_name:"iimt"};
          	(function() {
          		var ds = document.createElement('script');
          		ds.type = 'text/javascript';ds.async = true;
          		ds.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') + '//static.duoshuo.com/embed.js';
          		ds.charset = 'UTF-8';
          		(document.getElementsByTagName('head')[0]
          		 || document.getElementsByTagName('body')[0]).appendChild(ds);
          	})();
          	</script>
          <!-- 多说公共JS代码 end -->

          <?php else: ?>
          <h4><?php _e('评论已关闭'); ?></h4>
          <?php endif; ?>
        </div>
        <!-- <script>
          $('#comments').hide();
          $('.TogComment').click(function(){
            $(this).hide();
            $('#comments').slideDown(350);
          })
        </script> -->
    </article>
<?php $this->need('footer.php'); ?>
<script src="<?php $this->options->themeUrl() ?>/js/post_js.js"></script>
