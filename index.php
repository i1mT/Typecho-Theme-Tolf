<?php
/**
 * iimT制作的皮肤
 *
 * @package Tolf 主题
 * @author iimT
 * @version 1.0
 * @link http://iimT.me
 */

if (!defined('__TYPECHO_ROOT_DIR__')) exit;
 $this->need('header.php');
 ?>
    <!--start-->
    <?php while($this->next()): //开始循环输出博文 ?>
        <div class="section" style="background:url(
        <?php //用自定义字段T_bg获取背景图片地址
          if(isset($this->fields->T_bg)){
            $this->fields->T_bg();
          }else{
            $this->options->themeUrl();
            echo "img/default-bg.jpg";
          }?>) 50%;background-size:cover;">
        <div class="filter"></div>
        	<div class="postTitle">
        	  <a href="<?php $this->permalink() //文章链接 ?>"><?php $this->title() //文章标题 ?></a>
        	</div>
          <p class="pre-desc"> <!-- 各种描述 -->
            <?php $this->author(); //文章作者 ?> published on <?php $this->date('F j, Y'); ?>
          </p>
          <div class="tags">
            <?php $this->tags('', true); ?>
          </div>
        	<div class="abs"> <!-- 摘要部分 -->
        	    <?php //用自定义字段T_abs作为文章的摘要
                if(isset($this->fields->T_abs)){
                  $this->fields->T_abs();
                }else{
                  echo '这篇文章木有摘要唷~~~~(>_<)~~~~';
                }?>
          </div>
          <div class="setBottom">
            <div class="line"></div>
            <a class="readBtn" href="<?php $this->permalink() //文章链接 ?>">
              查看文章
            </a>
          </div>
          <p class="iconfont icon-xiangxia"></p>
          <p class="tips">下滑继续浏览</p>
          <a class="ToHome" href="<?php $this->options->siteUrl(); ?>">
            HOME
          </a>
        </div>
    <?php endwhile; ?>
    <!--end-->
    <div class='pageCount' style='float:right;display:none;'>
     <?php $this->pageNav(); ?></div>
  </div>
  <div id="postsCount" style="display:none">
    <?php
      $stat = Typecho_Widget::widget('Widget_Stat');
      _e('%s',$stat->myPublishedPostsNum); ?>
  </div>
  <div class="whenLast">
    没有了哦~
  </div>
<?php $this->need('footer.php'); ?>
