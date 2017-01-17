<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<!-- saved from url=(0031)http://test.95net.net/index.php -->
<html lang="zh-CN"> 
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="renderer" content="webkit">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
<title><?php echo C('SITE_TITLE');?></title>
<link href="/Public/home/css/bootstrap.min.css" rel="stylesheet">
<link href="/Public/home/css/common.css" rel="stylesheet">
<link href="/Public/home/css/swiper.min.css" rel="stylesheet">
<link href="/Public/home/css/public.css" rel="stylesheet">
<!--[if lt IE 9]>
   <script src="//cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
   <script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
<script src="/Public/home/js/jquery-1.11.3.min.js"></script>
<script src="/Public/home/js/swiper.min.js"></script>
<script src="/Public/home/js/common.js"></script>
<script>
   // 文章点击数更新
   $(function(){
      $('.hit').click(function(){
        var hitCount = $(this).find('.hitCount').text();
        $.get('/index.php/Article/getHit', 'id='+hitCount); 
      });
   })
</script>
</head>

<body>
<!--#header-->
<header class="hidden-xs kd-site-bar">
   <div class="container small">
      <span>欢迎访问 科大花园二期物业服务网</span>
      <div class="kd-site-nav dark-gray">
         <span>服务热线：0551-63471618</span>
         <a href="#wechat">关注微信</a>
         <a href="http://test.95net.net/index.php/Page/index/id/20.html">业主信箱</a>
         <a href="http://test.95net.net/index.php/Page/index/id/21.html">联系我们</a>
      </div>
   </div>
</header>
<section class="kd-head-p">
    <header class="container kd-head">
       <div class="row nmg npd">
          <div class="col-xs-12 col-md-4">
             <div class="row nmg npd prv">
                <div class="col-xs-8 col-md-12"><a href="<?php echo U('Index/index');?>"><img src="/Public/home/images/logo.png" class="img-responsive pull-left"></a></div>
                <div class="kd-menu-icon"><a href="javascript:void(0);" class="ion"></a></div>
             </div>
          </div>
          <div class="col-xs-12 col-md-8">
             <nav class="kd-nav">
                <ul>
                  <?php if(is_array($navbar)): $i = 0; $__LIST__ = $navbar;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="<?php echo ($vo['links']); ?>"><?php echo ($vo['catename']); ?><i class="ion">&#xe657;</i></a></li><?php endforeach; endif; else: echo "" ;endif; ?>                 
                </ul>
                <div class="kd-menu-icon-close"><a href="javascript:void(0);" class="ion"></a></div>
             </nav>
          </div>
       </div>
    </header> 
</section>


<!--#banner-->
<section class="clearfix"><img src="<?php echo ($banner); ?>" class="img-responsive"></section>


<!--#main-->
<section class="clearfix bgea pad-v-md">
   
    <div class="container">
      <div class="hidden-xs clearfix p-nav-box p-nm">
         <p class="m"><?php echo ($selfCate); ?></p><p class="ng">当前所在位置：<a href="<?php echo U('Index/index');?>">首页</a>&gt;<?php echo ($breadNav['breadnav']); ?></p>
      </div>
      <div class="clear p-nav-box visible-xs">
         <small class="catename"><a href="<?php echo U('Index/index');?>">首页</a>&gt;<?php echo ($breadNav['breadnav']); ?></small>
         <span class="pull-right"><i class="ion hidden ion-cls-sub-menu"></i><i class="ion r ion-opn-sub-menu"></i></span>
         <ul>
            <?php if(is_array($sideNav)): $i = 0; $__LIST__ = $sideNav;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($vo['catename'] == $selfCate): ?><li class="active"><a href="<?php echo ($vo['links']); ?>"><?php echo ($vo['catename']); ?></a></li>
              <?php else: ?>
                  <li><a href="<?php echo ($vo['links']); ?>"><?php echo ($vo['catename']); ?></a></li><?php endif; endforeach; endif; else: echo "" ;endif; ?>     
         </ul>
      </div>
</div>
  

   <div class="clearfix pad-sm visible-lg"></div>
   <div class="container clearfix">
      <div class="row">
         
         <div class="col-lg-1s col-md-12 hidden-xs">
    <div class="p-submenu">
    	<div class="hidden"><?php echo ($selfCate); ?></div>
       <ul>
		   <?php if(is_array($sideNav)): $i = 0; $__LIST__ = $sideNav;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($selfCate == $vo['catename']): ?><li class="active"><a href="<?php echo ($vo['links']); ?>"><?php echo ($vo['catename']); ?></a></li>
          	  <?php else: ?>
          	    <li><a href="<?php echo ($vo['links']); ?>"><?php echo ($vo['catename']); ?></a></li><?php endif; endforeach; endif; else: echo "" ;endif; ?>		
          	<li class="visible-lg"><a href="javascript:void(0);">&nbsp;</a></li>
       </ul>
    </div>
</div>


         <div class="col-lg-11s  col-md-12">
            <div class="pm-box">
               <div class="p-t hidden-xs"><?php echo ($selfCate); ?></div>
               <div class="clearfix boxm">
                  <div class="row lis">
                     <?php if(is_array($conts)): $i = 0; $__LIST__ = $conts;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="col-xs-6 col-sm-4">
                           <div class="clearfix"><a href="<?php echo ($vo['links']); ?>" class="hit"><div class="hidden hitCount"><?php echo ($vo['id']); ?></div><img src="<?php echo ($vo['defaultpic']); ?>" class="img-responsive" /></a></div><div class="clearfix t hit"><a href="<?php echo ($vo['links']); ?>" class="hit"><div class="hidden hitCount"><?php echo ($vo['id']); ?></div><?php echo ($vo['title']); ?></a></div>
                        </div><?php endforeach; endif; else: echo "" ;endif; ?>               
                  </div>
               </div>
            </div>
            <div class="page bg"><div>    </div></div>
         </div>
      </div>
   </div>
</section>


<!--#footer-->
<footer class="clearfix" id="wechat">
   <section class="container kd-foot-up clear">
      <div class="row white">
         <div class="col-md-8 col-sm-12 hidden-xs">
            <div class="row xs">
              <?php if(is_array($navbar)): $i = 0; $__LIST__ = $navbar;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v1): $mod = ($i % 2 );++$i;?><div class="col-xs-2">
                    <a href="<?php echo ($v1['links']); ?>" class="bok pad-b-sm"><?php echo ($v1['catename']); ?></a>
                    <p class="small gray bok-chd">
                      <?php if(is_array($v1['submenu'])): $i = 0; $__LIST__ = $v1['submenu'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v2): $mod = ($i % 2 );++$i;?><a href="<?php echo ($v2['links']); ?>"><?php echo ($v2['catename']); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>     
                    </p>               
                 </div><?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
         </div>
         <div class="col-md-4 col-sm-12">
            <div class="clearfix kd-ewm-code">
               <div><span><img src="/Public/home/images/ewm.jpg" class="img-responsive"><i class="bok text-center pad-t-sm">关注微信</i></span><span><img src="/Public/home/images/ewm.jpg" class="img-responsive"><i class="bok text-center pad-t-sm">手机网站</i></span></div>
            </div>
         </div>
      </div>
   </section>
   <section class="kd-foot-end clearfix pad-v-md small gray">
      <div class="clear container">
         <div class="row">
            <div class="col-sm-6">版权所有：Copyright 2012 All Rights Reserved  科大花园二期  物业服务网</div>
            <div class="col-sm-6 kd-powby">皖ICP备15004301号  技术支持：<a href="http://www.95net.net/" target="_blank">九五策划</a></div>
         </div>
      </div>
   </section>
</footer>
</body>
</html>