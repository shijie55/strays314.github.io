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
         <a href="<?php echo U('Page/index', 'id=65');?>">业主信箱</a>
         <a href="<?php echo U('Page/index', 'id=66');?>">联系我们</a>
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
    <section class="clearfix swiper-container swp-ban swiper-container-horizontal swiper-container-autoheight">
        <div class="swiper-wrapper"
             style="height: 453px; transition-duration: 0ms; transform: translate3d(0px, 0px, 0px);">
            <a href="javascript:void(0);" class="swiper-slide swiper-slide-active" style="width: 1583px;"><img
                    src="/Public/home/images/banner.jpg" class="img-responsive"></a>
        </div>
        <div class="swiper-pagination swiper-pagination-clickable swiper-pagination-bullets"><span
                class="swiper-pagination-bullet swiper-pagination-bullet-active"></span></div>
    </section>
    <script>
        var Topswiper = new Swiper('.swp-ban', {
            pagination: '.swiper-pagination',
            paginationClickable: true,
            autoHeight: true,
            autoplay: 5000
        });

    </script>


    <!--#main-->

    <!--#kd mail box-->
    <section class="clearfix kd-mail-box">
        <div class="container clearfix">
            <div class="row">
                <div class="col-md-63 col-xs-12">
                    <div class="mail-area">
                        <div class="subj">
                            <div class="clearfix">
                                <p class="hidden-xs"><span class="t">Mail</span><br><span><?php echo ($mailname['catename']); ?></span><br><span
                                        class="more"><a href="<?php echo U('Page/index', 'id=65');?>">更多<i
                                        class="ion"></i></a></span></p>

                                <p class="visible-xs"><span><?php echo ($mailname['catename']); ?></span><span class="more"><a
                                        href="<?php echo U('Page/index', 'id=65');?>">更多<i class="ion"></i></a></span></p>
                            </div>
                        </div>
                        <div class="lis-box" style="min-height:220px;">
                            <?php if(is_array($mails)): $i = 0; $__LIST__ = $mails;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a href="<?php echo U('Page/index', 'id=65');?>"><span><?php echo (substr($vo['addtime'],0,10)); ?></span><?php echo ($vo['title']); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-37 col-xs-12">
                    <div class="clearfix hidden-lg hidden-md pad-xs"></div>
                    <div class="clearfix mail-dt-area">
                        <div class="sub-t"><?php echo ($insName[0]['catename']); ?><a href="<?php echo ($insLink); ?>"
                                                                       class="pull-right small gray-gray">更多</a></div>
                        <div class="clearfix lis-box">
                            <?php if(is_array($insName)): $i = 0; $__LIST__ = $insName;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a href="<?php echo ($vo['links']); ?>"><span><?php echo (substr($vo['addtime'],0,10)); ?></span><?php echo ($vo['title']); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--#kd art box-->
    <section class="clearfix kd-art-box">
        <div class="clearfix container">
            <div class="row">
                <div class="col-md-63 col-xs-12">
                    <div class="clearfix title">工作简讯</div>
                    <div class="clearfix visible-lg pad-xs"></div>
                    <!--#art pt01-->
                    <div class="clearfix art-lis">
                        <?php if(is_array($workName)): $i = 0; $__LIST__ = array_slice($workName,0,2,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="row">
                                <div class="col-xs-35 npd-r">
                                    <div class="clearfix"><img src="<?php echo ($vo['defaultpic']); ?>" class="img-responsive"></div>
                                </div>
                                <div class="col-xs-65 nmg art-cont">
                                    <a href="<?php echo ($vo['links']); ?>" class="art-title"><?php echo ($vo['title']); ?></a>

                                    <p class="art-ms"><?php echo ($vo['shortcontent']); ?></p>

                                    <p class="art-time"><?php echo (substr($vo['addtime'],0,10)); ?></p>
                                </div>
                            </div><?php endforeach; endif; else: echo "" ;endif; ?>
                    </div>
                    <!--#art pt02-->
                    <div class="clearfix pad-md bg">
                        <div class="swiper-container art-swp swiper-container-vertical">
                            <div class="swiper-wrapper"
                                 style="transform: translate3d(0px, -25px, 0px); transition-duration: 0ms;">
                                <?php if(is_array($workName)): $i = 0; $__LIST__ = array_slice($workName,1,null,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a href="<?php echo ($vo['links']); ?>" class="swiper-slide swiper-slide-prev"
                                       style="height: 25px;">
                                        <small><?php echo (substr($vo['addtime'],0,10)); ?></small>
                                        <?php echo ($vo['title']); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
                            </div>
                            <div class="swp-btn"><a href="javascript:void(0);" class="btn-prev"></a><a
                                    href="javascript:void(0);" class="btn-next"></a></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-37 col-xs-12">
                    <div class="clearfix hidden-lg pad-xs"></div>
                    <div class="clearfix title"><?php echo ($pubName[0]['catename']); ?></div>
                    <div class="clearfix visible-lg pad-xs"></div>
                    <div class="clearfix kd-notic-box">
                        <div class="clearfix prv">
                            <div class="time-area"><span class="d">16</span><span class="full"><?php echo (substr($pubName[0]['addtime'],0,10)); ?></span>
                            </div>
                            <img src="<?php echo ($pubName[0]['defaultpic']); ?>" class="img-responsive">

                            <div class="tit-area"><a href="<?php echo ($pubName[0]['links']); ?>"><?php echo ($pubName[0]['title']); ?>"</a></div>
                        </div>
                        <!--#notic list-->
                        <div class="clearfix notic-lis">
                            <?php if(is_array($pubName)): $i = 0; $__LIST__ = array_slice($pubName,1,null,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a href="<?php echo ($vo['links']); ?>"><?php echo ($vo['title']); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <script language="text/javascript">
        $(function () {
            var ArtSwiper = new Swiper('.art-swp', {
                autoplay: 5000,//可选选项，自动滑动
                direction: 'vertical',
                autoplayDisableOnInteraction: false,
                slidesPerView: 1,
                slidesPerGroup: 1,
                prevButton: '.btn-prev',
                nextButton: '.btn-next',
            });
        });
    </script>
    <!--#service-->
    <section class="clearfix kd-serv-box">
        <div class="kd-gb-box-tit nmg">
            <p><span class="eng"><?php echo ($proSelfName['englishname']); ?></span></p>

            <p><span class="cha"><?php echo ($proSelfName['catename']); ?></span></p>
        </div>
        <div class="container clearfix serv-main swp-serv swiper-container swiper-container-horizontal">
            <div class="item-lis swiper-wrapper">
                <?php if(is_array($proName)): $i = 0; $__LIST__ = $proName;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($i == 1): ?><div class="item-item swiper-slide swiper-slide-active"
                             style="width: 180px; margin-right: 75px;">
                            <a href="<?php echo ($vo['links']); ?>" class="box">
                                <p><i class="ion"></i></p>

                                <p><?php echo ($vo['catename']); ?></p>
                            </a>
                        </div>
                        <?php elseif($i == 2): ?>
                        <div class="item-item swiper-slide swiper-slide-next" style="width: 180px; margin-right: 75px;">
                            <a href="<?php echo ($vo['links']); ?>" class="box">
                                <p><i class="ion"></i></p>

                                <p><?php echo ($vo['catename']); ?></p>
                            </a>
                        </div>
                        <?php else: ?>
                        <div class="item-item swiper-slide" style="width: 180px; margin-right: 75px;">
                            <a href="<?php echo ($vo['links']); ?>" class="box">
                                <p><i class="ion"></i></p>

                                <p><?php echo ($vo['catename']); ?></p>
                            </a>
                        </div><?php endif; endforeach; endif; else: echo "" ;endif; ?>
            </div>
        </div>
    </section>
    <script language="javascript">
        var Svpswiper = new Swiper('.swp-serv', {
            autoplay: false,
            spaceBetween: 75,
            slidesPerView: 5,
            loop: false,
            breakpoints: {
                //当宽度小于等于320
                1200: {
                    spaceBetween: 10
                },
                //当宽度小于等于480
                640: {
                    autoplay: 2000,
                    slidesPerView: 2,
                    spaceBetween: 10
                }
            }
        });
        //Svpswiper.lockSwipes();
    </script>
    <!--#yuangongfengcai-->
    <section class="clearfix bge kd-serv-box">
        <div class="kd-gb-box-tit nmg">
            <p><span class="eng"><?php echo ($staffSelfName['englishname']); ?></span></p>

            <p><span class="cha"><?php echo ($staffSelfName['catename']); ?></span></p>
        </div>
        <div class="container clearfix serv-main swp-fengc swiper-container swiper-container-horizontal">
            <div class="swiper-wrapper text-center"
                 style="transform: translate3d(-415px, 0px, 0px); transition-duration: 0ms;">
                <?php if(is_array($staffName)): $i = 0; $__LIST__ = $staffName;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a href="<?php echo ($vo['links']); ?>" class="swiper-slide swiper-slide-prev"
                       style="width: 370px; margin-right: 45px;"><p><img src="<?php echo ($vo['defaultpic']); ?>"
                                                                         class="img-responsive"></p>

                        <p class="pad-v-sm"><?php echo ($vo['title']); ?></p></a><?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
        </div>
    </section>
    <script language="javascript">
        var Sfcswiper = new Swiper('.swp-fengc', {
            autoplay: 2000,
            spaceBetween: 45,
            slidesPerView: 3,
            loop: false,
            breakpoints: {
                //当宽度小于等于480
                640: {
                    slidesPerView: 1,
                    spaceBetween: 10
                }
            }
        });
        //Svpswiper.lockSwipes();
    </script>
    <!--#feedback-->
    <section class="clearfix kd-book-box">
        <div class="clearfix container">
            <div class="clearfix mar-t-sm">
                <p class="t1">网上保修</p>

                <p class="lh-md"><span class="bok t2">填写您报修项目给我们。</span><span>
                        class="t3">*请认真填写报修信息，我们会在24小时内与您取得联系。</span></p>
            </div>
            <div class="clearfix mar-t-sm book-fm">
                <div class="row">
                    <div class="col-md-2">
                        <select class="form-control" id="otype">
                            <option value="电器维修">电器维修</option>
                            <option value="管道维修">管道维修</option>
                            <option value="防漏防水">防漏防水</option>
                        </select>
                    </div>
                    <div class="col-md-2"><input type="text" id="tel" class="form-control" placeholder="联系电话"></div>
                    <div class="col-md-2"><input type="text" id="addr" class="form-control" placeholder="联系地址"></div>
                    <div class="col-md-4"><input type="text" id="content" class="form-control" placeholder="简要填写报修问题">
                    </div>
                    <div class="col-md-2">
                        <button type="button" class="btn btn-dark btn-block addfed">提交</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script language="javascript">
        $(function () {
            $('.addfed').click(function () {
                var otype = $.trim($('#otype').val());
                var tel = $.trim($('#tel').val());
                var addr = $.trim($('#addr').val());
                var content = $.trim($('#content').val());
                if (tel == '') {
                    alert('手机必须填写');
                    $('#tel').focus();
                    return false;
                } else if (content == '') {
                    alert('内容必须填写');
                    $('#content').focus();
                    return false;
                }
                $.ajax({
                    url : "<?php echo U('Fix/index');?>",
                    type : "POST",
                    data : {'class':otype,'tel':tel,'address':addr,'problem':content},
                    success: function(d){
                        if(d == 'ok'){
                            alert('信息提交成功');
                            location.reload();
                        }else{
                            alert('信息提交失败');
                            location.reload();
                        }
                    }
                });
            });
        });
    </script>


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
               <div><span><img src="<?php echo C('SITE_WX_IMG');?>" class="img-responsive"><i class="bok text-center pad-t-sm">关注微信</i></span><span><img src="<?php echo C('SITE_WAP_IMG');?>" class="img-responsive"><i class="bok text-center pad-t-sm">手机网站</i></span></div>
            </div>
         </div>
      </div>
   </section>
   <section class="kd-foot-end clearfix pad-v-md small gray">
      <div class="clear container">
         <div class="row">
            <div class="col-sm-6"><?php echo C('SITE_COPYRIGHT');?></div>
            <div class="col-sm-6 kd-powby">皖ICP备15004301号  技术支持：<a href="http://www.95net.net/" target="_blank">九五策划</a></div>
         </div>
      </div>
   </section>
</footer>
</body>
</html>