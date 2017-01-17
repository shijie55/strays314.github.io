<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo C('SYS_TITLE');?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="/Public/admin/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="/Public/admin/dist/css/font/css/font-awesome.min.css">
  <!-- Theme style -->
  
<link rel="stylesheet" href="/Public/admin/plugins/datepicker/datepicker3.css">

  <link rel="stylesheet" href="/Public/admin/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="/Public/admin/dist/css/skins/_all-skins.min.css">
  
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-red-light sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini">kdhy</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><?php echo C('SYS_TITLE');?></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="/admin.php" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo C('SYS_LOGO');?>" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo ($userinfo['username']); ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php echo C('SYS_LOGO');?>" class="img-circle" alt="User Image">
                <p>欢迎您 <?php echo ($userinfo['username']); ?><small>当前时间是：<?php echo date('Y-m-d H:i:s');?></small></p>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="javascript:void(0);" data-toggle="control-sidebar" class="signout">退出 <i class="fa fa-sign-out"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo C('SYS_LOGO');?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo ($userinfo['username']); ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> 当前在线</a>          
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li>
           <a href="/admin.php">
              <i class="fa fa-home"></i> <span>主页</span><span class="pull-right-container"><i class="fa fa-angle-right pull-right"></i></span>
           </a>
           <ul class="treeview-menu">
              <li><a href="/admin.php"><i class="fa fa-angle-right"></i> 系统主页</a></li>
              <li><a href="/index.php" target="_blank"><i class="fa fa-angle-right"></i> 站点主页</a></li>
           </ul>
        </li>
        <?php if(is_array($navbar)): $i = 0; $__LIST__ = $navbar;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$rsnav): $mod = ($i % 2 );++$i;?><li class="<?php if($rsnav['role'] == CONTROLLER_NAME): ?>active<?php endif; ?> <?php if(is_array($rs['submenu'])): ?>treeview<?php endif; ?>">
          <a href="<?php echo ($rsnav['url']); ?>">
            <i class="fa <?php echo ($rsnav['icon']); ?>"></i> <span><?php echo ($rsnav['name']); ?></span>
            <?php if(is_array($rsnav['submenu']) OR $rsnav['isc'] == 1): ?><span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
            <?php else: ?>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span><?php endif; ?>
          </a>
          <?php if($rsnav['isc'] == 1): $category = setcate($focusid); ?>
                  <ul class="treeview-menu">
                     <?php if(is_array($category)): foreach($category as $key=>$cates): ?><li class="<?php echo ($cates['cls']); ?>">
                           <a href="<?php echo ($cates['url']); ?>">
                              <i class="fa fa-angle-right"></i> <?php echo ($cates['name']); ?>                   
                           </a>
                           <?php if(is_array($cates[submenu])): ?><ul class="treeview-menu">
                                 <?php if(is_array($cates[submenu])): foreach($cates[submenu] as $key=>$chd): ?><li class="<?php echo ($chd['cls']); ?>">
                                       <a href="<?php echo ($chd['url']); ?>"><i class="fa fa-angle-right"></i> <?php echo ($chd['name']); ?></a>
                                       <?php if(is_array($chd[submenu])): ?><ul class="treeview-menu">
                                             <?php if(is_array($chd[submenu])): foreach($chd[submenu] as $key=>$chdrs): ?><li class="<?php echo ($chdrs['cls']); ?>">
                                                   <a href="<?php echo ($chdrs['url']); ?>"><i class="fa fa-angle-right"></i> <?php echo ($chdrs['name']); ?></a>
                                                   <?php if(is_array($chdrs[submenu])): ?><ul class="treeview-menu">
                                                         <?php if(is_array($chdrs[submenu])): foreach($chdrs[submenu] as $key=>$noders): ?><li <?php if($noders[id] == $focusid): ?>class="active"<?php endif; ?>>
                                                            <a href="<?php echo ($noders['url']); ?>"><i class="fa fa-angle-right"></i> <?php echo ($noders['name']); ?></a>
                                                         </li><?php endforeach; endif; ?>
                                                      </ul><?php endif; ?>
                                                </li><?php endforeach; endif; ?>
                                          </ul><?php endif; ?>
                                    </li><?php endforeach; endif; ?>
                              </ul><?php endif; ?>
                        </li><?php endforeach; endif; ?>
                  </ul><?php endif; ?>
          <?php if(is_array($rsnav['submenu'])): ?><ul class="treeview-menu">
                <?php if(is_array($rsnav['submenu'])): foreach($rsnav['submenu'] as $key=>$vo): ?><li class="<?php if($vo['role'] == CONTROLLER_NAME.'/'.ACTION_NAME): ?>active<?php endif; ?>"><a href="<?php echo ($vo['url']); ?>"><i class="fa fa-angle-right"></i> <?php echo ($vo['name']); ?></a>
                    <?php if(is_array($vo['submenu'])): ?><ul class="treeview-menu">
                           <?php if(is_array($vo['submenu'])): foreach($vo['submenu'] as $key=>$im): ?><li><a href="<?php echo ($im['url']); ?>"><i class="fa fa-angle-right"></i> <?php echo ($im['name']); ?></a></li><?php endforeach; endif; ?>
                        </ul><?php endif; ?>
                </li><?php endforeach; endif; ?>
              </ul><?php endif; ?>
        </li><?php endforeach; endif; else: echo "" ;endif; ?>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    
    <!-- Main content -->
    <section class="content">
       
<div class="row hidden">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-file-text"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">当前订单总量</span>
              <span class="info-box-number pad-v-xs"><?php echo ($count['orders']); ?></span>
              <span class="info-box-more"><a href="<?php echo U('/Order/index');?>" class="small text-muted">明细 <i class="fa fa-angle-right"></i></a></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-shopping-cart"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">商城商品数</span>
              <span class="info-box-number pad-v-xs"><?php echo ($count['goods']); ?></span>
              <span class="info-box-more"><a href="<?php echo U('/Goods/index');?>" class="small text-muted">详情 <i class="fa fa-angle-right"></i></a></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-heart-o"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">积分商品</span>
              <span class="info-box-number pad-v-xs"><?php echo ($count['gifts']); ?></span>
              <span class="info-box-more"><a href="<?php echo U('/Gift/index');?>" class="small text-muted">详情 <i class="fa fa-angle-right"></i></a></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="fa fa-users"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">会员粉丝</span>
              <span class="info-box-number pad-v-xs"><?php echo ($count['users']); ?></span>
              <span class="info-box-more"><a href="<?php echo U('/Users/index');?>" class="small text-muted">详情 <i class="fa fa-angle-right"></i></a></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
</div>
<!-- /.row -->
<div class="row hidden">
   <div class="col-md-6">
      <div class="box box-info">
         <div class="box-header with-border">
            <h3 class="box-title">资讯点击排行</h3>
            <div class="box-tools pull-right">
               <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
               <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
         </div>
         <div class="box-body">
            <ul class="products-list product-list-in-box">
                <?php
 $cond = "1=1 and cateid in(15)"; $foc = ""; $ida = "15"; if(!empty($foc)&&empty($ida)){ $A = A("Common"); $idarr = $A -> GetSonArr("$foc"); $cond .= " and cateid in(".$idarr.")"; } $table = M("content"); $rs = $table -> field("id,title,defaultpic,tags,cateid,catename,links,shortcontent,hits") -> where("$cond") -> limit("0,6") -> order("hits desc") -> select(); $ret = array(); $i = 0; foreach($rs as $i => $q){ $ret[$i] = $q; if(empty($q["links"])){ $ret[$i]["links"] = U("/Show/index",array("id"=>$q["id"])); }else{ $ret[$i]["links"] = $q["links"]; } } foreach($ret as $k=>$rs): $i++; ?><li class="item">
                  <div class="product-img">
                    <img src="<?php echo ($rs['defaultpic']); ?>" alt="Product Image">
                  </div>
                  <div class="product-info">
                    <p style="padding:4px 0; margin:0;"><a href="/index.php/Show/index/id/<?php echo ($rs['id']); ?>.html" target="_blank" class="product-title"><?php echo ($rs['title']); ?><span class="pull-right"><?php echo ($rs['hits']); ?></span></a></p>
                    <span class="product-description"><?php echo (chinesesubstr($rs['shortcontent'],0,160)); ?></span>
                  </div>
                </li><?php endforeach ?>
              </ul>
         </div>
      <!-- /.box-body -->
      </div>
   </div>
   
   <div class="col-md-6">
      <div class="box box-success">
         <div class="box-header with-border">
            <h3 class="box-title">作品点击排行</h3>
            <div class="box-tools pull-right">
               <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
               <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
         </div>
         <div class="box-body">
            <ul class="products-list product-list-in-box">
                <?php
 $cond = "1=1 and cateid in(11)"; $foc = ""; $ida = "11"; if(!empty($foc)&&empty($ida)){ $A = A("Common"); $idarr = $A -> GetSonArr("$foc"); $cond .= " and cateid in(".$idarr.")"; } $table = M("content"); $rs = $table -> field("id,title,defaultpic,tags,cateid,catename,links,shortcontent,hits") -> where("$cond") -> limit("0,6") -> order("hits desc") -> select(); $ret = array(); $i = 0; foreach($rs as $i => $q){ $ret[$i] = $q; if(empty($q["links"])){ $ret[$i]["links"] = U("/Show/index",array("id"=>$q["id"])); }else{ $ret[$i]["links"] = $q["links"]; } } foreach($ret as $k=>$rs): $i++; ?><li class="item">
                  <div class="product-img">
                    <img src="<?php echo ($rs['defaultpic']); ?>" alt="Product Image">
                  </div>
                  <div class="product-info">
                    <p style="padding:4px 0; margin:0;"><a href="/index.php/Show/index/id/<?php echo ($rs['id']); ?>.html" target="_blank" class="product-title"><?php echo ($rs['title']); ?><span class="pull-right"><?php echo ($rs['hits']); ?></span></a></p>
                    <span class="product-description"><?php echo (chinesesubstr($rs['shortcontent'],0,160)); ?></span>
                  </div>
                </li><?php endforeach ?>
              </ul>
         </div>
      <!-- /.box-body -->
      </div>
   </div>
</div>
<div class="row">
   <div class="col-md-6">
      <div class="box box-danger">
         <div class="box-header with-border">
            <h3 class="box-title">日历</h3>
            <div class="box-tools pull-right">
               <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
               <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
         </div>
         <div class="box-body">
            <div id="calendar" style="width: 100%"></div>
         </div>
      <!-- /.box-body -->
      </div>
   </div>
   <div class="col-md-6">
      <div class="box box-primary">
         <div class="box-header with-border">
            <h3 class="box-title">服务器基本信息</h3>
            <div class="box-tools pull-right">
               <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
               <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
         </div>
         <div class="box-body" style="line-height:40px;">
            <table class="table table-hover">
                     <tr>
                        <td>服务器名：<?php echo $_SERVER['SERVER_NAME']; ?></td>
                        <td>站点目录：<?php echo $_SERVER['DOCUMENT_ROOT']; ?></td>
                     </tr>
                     <tr>
                        <td>Php版本：<?php echo PHP_VERSION; ?></td>
                        <td>Zend版本：<?php echo zend_version(); ?></td>
                     </tr>
                     <tr>
                        <td>Mysql支持：<?php echo function_exists (mysql_close)?"是":"否"; ?></td>
                        <td>Mysql版本：<?php echo mysql_get_server_info(); ?></td>
                     </tr>
                     <tr>
                        <td>最大上传限制：<?php echo get_cfg_var ("upload_max_filesize")?get_cfg_var ("upload_max_filesize"):"不允许上传附件"; ?></td>
                        <td>最大执行时间：<?php echo get_cfg_var("max_execution_time")."秒 "; ?></td>
                     </tr>
                     <tr>
                        <td>服务器操作系统：<?php echo PHP_OS; ?></td>
                        <td>当前时间：<?php date_default_timezone_set (PRC); echo date("Y-m-d G:i:s"); ?></td>
                     </tr>
                  </table>
         </div>
      <!-- /.box-body -->
      </div>
   </div>
</div>
<style type="text/css">
.chart-legend li{ list-style:none; }
.chart-legend li span.doughnut-legend-icon{
    display: inline-block;
    width: 12px;
    height: 12px;
    margin-right: 5px;
}
</style>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer small">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.3.5
    </div>
    Copyright &copy; 2016-2018 <a href="http://www.95net.net/" target="_blank">www.95net.net</a>. All rights reserved.
  </footer>
  <!-- Control Sidebar -->
  <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
<!-- jQuery 2.2.3 -->
<script src="/Public/admin/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="/Public/admin/bootstrap/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script type="text/javascript" src="/Public/admin/dist/js/ajaxupload.3.5.js"></script>
<script src="/Public/admin/dist/js/common.js"></script>
<script language="javascript" src="/Public/admin/tips/jquery.tips.js"></script>
<script language="javascript">
$(function(){
   $('a.signout').click(function(){
      $.ajax({
		url : "<?php echo U('/Login/logout');?>",
		type : "POST",
		success : function(d){		   
		   $.fn.tips({type:d.type,content:d.content,url:d.url});
		}
	  });
   });	
});
</script>

<script src="/Public/admin/plugins/datepicker/bootstrap-datepicker.js"></script>
<script language="javascript">
$(function(){
   $("#calendar").datepicker();	
});
</script>

<script src="/Public/admin/dist/js/app.min.js"></script>
</body>
</html>