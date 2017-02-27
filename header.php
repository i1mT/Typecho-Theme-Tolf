<?php
// 说明：获取完整URL
$siteHomePageUrl = "http://www.iimt.me/";
function curPageURL(){
  $pageURL = 'http';
  // if ($_SERVER["HTTPS"] == "on") {
  //   $pageURL .= "s";
  // }
  $pageURL .= "://";
  if ($_SERVER["SERVER_PORT"] != "80") {
    $pageURL .= $_SERVER["SERVER_NAME"] . ":" . $_SERVER["SERVER_PORT"] . $_SERVER["REQUEST_URI"];
  }
  else{
    $pageURL .= $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
  }
  return $pageURL;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title><?php if ($this->is('index')) $this->options->title();
               else $this->title();
   ?></title>
   <link rel="stylesheet" href="<?php $this->options->themeUrl() ?>/css/load.css" media="screen" title="no title" charset="utf-8">
  <link rel="stylesheet" href="<?php $this->options->themeUrl() ?>/css/style.css" media="screen" title="no title" charset="utf-8">
  <link rel="stylesheet" href="<?php $this->options->themeUrl() ?>/css/responsive.css" media="screen" title="no title" charset="utf-8">
  <link rel="stylesheet" href="<?php $this->options->themeUrl() ?>/font/iconfont.css" media="screen" title="no title" charset="utf-8">
  <script src="http://lib.sinaapp.com/js/jquery/3.1.0/jquery-3.1.0.min.js"></script>
  <script src="http://apps.bdimg.com/libs/jquery-fullPage/2.7.4/vendors/jquery.easings.min.js"></script>
  <?php if ($this->is('index')): //当前是首页的时候引用的文件 ?>
    <script src="<?php $this->options->themeUrl() ?>/js/jquery.fullPage.js"></script>
    <script src="<?php $this->options->themeUrl() ?>/js/jquery.fullPage.min.js"></script>
    <link rel="stylesheet" href="<?php $this->options->themeUrl() ?>/css/jquery.fullPage.css" media="screen" title="no title" charset="utf-8">
    <script src="<?php $this->options->themeUrl() ?>/js/script.js"></script>
  <?php endif ?>
</head>
<body>
  <div class="spinner-wrap">
    <div class="spinner">
      <div class="rect1"></div>
      <div class="rect2"></div>
      <div class="rect3"></div>
      <div class="rect4"></div>
      <div class="rect5"></div>
    </div>
  </div>
  <script>
  setTimeout(function(){//等待了8秒之后
    $('.spinner-wrap').hide();
  },8000);
  window.onload = function(){
    $('.spinner-wrap').hide();
  }
  </script>
  <div id="myFullPage">
    <?php if(curPageURL() == $siteHomePageUrl||curPageURL() == $siteHomePageUrl."index.php"): //如果当前是首页的话 ?>
    <!-- 第一屏 -->
    <div class="section homePage">
      <div class="home-filter"></div>
      <p class="title"><?php $this->options->title() ?></p>
      <p class="intro1">我叫陶逢华,目前在浙江绍兴读书,爱好前端技术,立志成为有独立</p>
      <p class="intro2">思想的前端工程师,同时对产品设计有着强烈兴趣.</p>
      <div class="social">
        <a href="http://weibo.com/ATmxj" target="_blank"><img class="weibo" src="<?php $this->options->themeUrl() ?>/img/Weibo.png"></a>
        <img class="weixing" src="<?php $this->options->themeUrl() ?>/img/Weixing.png">
        <img class="qq" src="<?php $this->options->themeUrl() ?>/img/QQ.png">
        <a href="https://www.zhihu.com/people/tao-feng-hua" target="_blank"><img class="zhuhu" src="<?php $this->options->themeUrl() ?>/img/Zhihu.png"></a>
        <a href="https://github.com/tfh93121" target="_blank"><img class="github" src="<?php $this->options->themeUrl() ?>/img/GitHub.png"></a>
      </div>
      <p class="iconfont icon-xiangxia"></p>
      <p class="tips">下滑浏览博文</p>
    </div>
    <!-- 第一屏结束  个人主页结束  后面为博文 -->
  <?php endif ?>
