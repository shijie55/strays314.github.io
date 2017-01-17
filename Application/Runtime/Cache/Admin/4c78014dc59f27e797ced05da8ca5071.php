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
       
<div class="row">
        <div class="col-xs-12">
          <div class="box box-danger">
            <div class="box-body pad-v">
                <form name="import_form" id="import_form" class="form-horizontal" method="post" action="" >
                     <div class="form-group">
                        <label for="SITE_TITLE" class="col-sm-2 control-label">网站名称：</label>
                        <div class="col-sm-4 col-xs-12">
                           <input type="text" class="form-control" name="SITE_TITLE" value="<?php echo C('SITE_TITLE');?>">
                        </div>
                        <div class="pad-t-sm col-sm-6 col-xs-12"></div>
                     </div>
                     <div class="form-group">
                        <label for="SITE_KEYWORDS" class="col-sm-2 control-label">关键词：</label>
                        <div class="col-sm-4 col-xs-12">
                           <textarea class="form-control" name="SITE_KEYWORDS"><?php echo C('SITE_KEYWORDS');?></textarea>
                        </div>
                        <div class="pad-t-sm col-sm-6 col-xs-12"></div>
                     </div>
                     <div class="form-group">
                        <label for="SITE_DESC" class="col-sm-2 control-label">描述：</label>
                        <div class="col-sm-4 col-xs-12">
                           <textarea class="form-control" name="SITE_DESC"><?php echo C('SITE_DESC');?></textarea>
                        </div>
                        <div class="pad-t-sm col-sm-6 col-xs-12"></div>
                     </div>                     
                     <div class="form-group">
                        <label for="SITE_LOGO" class="col-sm-2 col-xs-12 control-label">Logo：</label>
                        <div class="col-sm-3 col-xs-8">
                           <p><input type="text" class="form-control" name="SITE_LOGO" id="SITE_LOGO" value="<?php echo C('SITE_LOGO');?>" /></p>
                           <p><button type="button" class="btn btn-danger upload_button" id="file_upload_01" data-input="SITE_LOGO" data-img="SITE_LOGO_PIC">上传</button><i class="pull-right" id="loading" style="display:none;"><img src="/Public/admin/dist/img/loading.gif" /></i></p>                                                  
                        </div>
                        <div class="col-sm-1 col-xs-4">
                           <img src="<?php echo C('SITE_LOGO');?>" id="SITE_LOGO_PIC" class="img-responsive" />
                        </div>
                     </div>
                     <div class="form-group">
                        <label for="SITE_WORK_FAX" class="col-sm-2 control-label">传真：</label>
                        <div class="col-sm-4 col-xs-12">
                           <input type="text" class="form-control" name="SITE_WORK_FAX" value="<?php echo C('SITE_WORK_FAX');?>">
                        </div>
                        <div class="pad-t-sm col-sm-6 col-xs-12"></div>
                     </div>
                     <div class="form-group">
                        <label for="SITE_WORK_PHONE" class="col-sm-2 control-label">电话：</label>
                        <div class="col-sm-4 col-xs-12">
                           <input type="text" class="form-control" name="SITE_WORK_PHONE" value="<?php echo C('SITE_WORK_PHONE');?>">
                        </div>
                        <div class="pad-t-sm col-sm-6 col-xs-12"></div>
                     </div>
                     <div class="form-group">
                        <label for="SITE_WORK_EMAIL" class="col-sm-2 control-label">邮箱：</label>
                        <div class="col-sm-4 col-xs-12">
                           <input type="text" class="form-control" name="SITE_WORK_EMAIL" value="<?php echo C('SITE_WORK_EMAIL');?>">
                        </div>
                        <div class="pad-t-sm col-sm-6 col-xs-12"></div>
                     </div>
                     <div class="form-group">
                        <label for="SITE_WORK_ADDRESS" class="col-sm-2 control-label">通讯地址：</label>
                        <div class="col-sm-4 col-xs-12">
                           <textarea class="form-control" name="SITE_WORK_ADDRESS"><?php echo C('SITE_WORK_ADDRESS');?></textarea>
                        </div>
                        <div class="pad-t-sm col-sm-6 col-xs-12"></div>
                     </div>
                     <div class="form-group">
                        <label for="SITE_WORK_TRAF" class="col-sm-2 control-label">交通：</label>
                        <div class="col-sm-4 col-xs-12">
                           <input type="text" class="form-control" name="SITE_WORK_TRAF" value="<?php echo C('SITE_WORK_TRAF');?>">
                        </div>
                        <div class="pad-t-sm col-sm-6 col-xs-12"></div>
                     </div>
                     
                     <!-- <div class="form-group">
                        <label for="SITE_TEL_MEET" class="col-sm-2 control-label">订单短信[会议]：</label>
                        <div class="col-sm-4 col-xs-12">
                           <input type="text" class="form-control" name="SITE_TEL_MEET" value="<?php echo C('SITE_TEL_MEET');?>">
                        </div>
                        <div class="pad-t-sm col-sm-6 col-xs-12"></div>
                     </div>
                     <div class="form-group">
                        <label for="SITE_TEL_EXH" class="col-sm-2 control-label">订单短信[展馆]：</label>
                        <div class="col-sm-4 col-xs-12">
                           <input type="text" class="form-control" name="SITE_TEL_EXH" value="<?php echo C('SITE_TEL_EXH');?>">
                        </div>
                        <div class="pad-t-sm col-sm-6 col-xs-12"></div>
                     </div>
                     <div class="form-group">
                        <label for="SITE_TEL_ZU" class="col-sm-2 control-label">订单短信[我要租]：</label>
                        <div class="col-sm-4 col-xs-12">
                           <input type="text" class="form-control" name="SITE_TEL_ZU" value="<?php echo C('SITE_TEL_ZU');?>">
                        </div>
                        <div class="pad-t-sm col-sm-6 col-xs-12"></div>
                     </div>
                     <div class="form-group">
                        <label for="SITE_TEL_WORK" class="col-sm-2 control-label">订单短信[施工]：</label>
                        <div class="col-sm-4 col-xs-12">
                           <input type="text" class="form-control" name="SITE_TEL_WORK" value="<?php echo C('SITE_TEL_WORK');?>">
                        </div>
                        <div class="pad-t-sm col-sm-6 col-xs-12"></div>
                     </div>
                     <div class="form-group">
                        <label for="SITE_TEL_AREA" class="col-sm-2 control-label">订单短信[场地]：</label>
                        <div class="col-sm-4 col-xs-12">
                           <input type="text" class="form-control" name="SITE_TEL_AREA" value="<?php echo C('SITE_TEL_AREA');?>">
                        </div>
                        <div class="pad-t-sm col-sm-6 col-xs-12"></div>
                     </div>
                     
                     <div class="form-group">
                        <label for="SITE_MAIL_MEET" class="col-sm-2 control-label">订单邮件[会议]：</label>
                        <div class="col-sm-4 col-xs-12">
                           <input type="text" class="form-control" name="SITE_MAIL_MEET" value="<?php echo C('SITE_MAIL_MEET');?>">
                        </div>
                        <div class="pad-t-sm col-sm-6 col-xs-12"></div>
                     </div>
                     <div class="form-group">
                        <label for="SITE_MAIL_EXH" class="col-sm-2 control-label">订单邮件[展馆]：</label>
                        <div class="col-sm-4 col-xs-12">
                           <input type="text" class="form-control" name="SITE_MAIL_EXH" value="<?php echo C('SITE_MAIL_EXH');?>">
                        </div>
                        <div class="pad-t-sm col-sm-6 col-xs-12"></div>
                     </div>
                     <div class="form-group">
                        <label for="SITE_MAIL_ZU" class="col-sm-2 control-label">订单邮件[我要租]：</label>
                        <div class="col-sm-4 col-xs-12">
                           <input type="text" class="form-control" name="SITE_MAIL_ZU" value="<?php echo C('SITE_MAIL_ZU');?>">
                        </div>
                        <div class="pad-t-sm col-sm-6 col-xs-12"></div>
                     </div>
                     <div class="form-group">
                        <label for="SITE_MAIL_WORK" class="col-sm-2 control-label">订单邮件[施工]：</label>
                        <div class="col-sm-4 col-xs-12">
                           <input type="text" class="form-control" name="SITE_MAIL_WORK" value="<?php echo C('SITE_MAIL_WORK');?>">
                        </div>
                        <div class="pad-t-sm col-sm-6 col-xs-12"></div>
                     </div>
                     <div class="form-group">
                        <label for="SITE_MAIL_AREA" class="col-sm-2 control-label">订单邮件[场地]：</label>
                        <div class="col-sm-4 col-xs-12">
                           <input type="text" class="form-control" name="SITE_MAIL_AREA" value="<?php echo C('SITE_MAIL_AREA');?>">
                        </div>
                        <div class="pad-t-sm col-sm-6 col-xs-12"></div>
                     </div> -->
                     
                     <div class="form-group">
                        <label for="SITE_WX_IMG" class="col-sm-2 col-xs-12 control-label">微信二维码：</label>
                        <div class="col-sm-3 col-xs-8">
                           <p><input type="text" class="form-control" name="SITE_WX_IMG" id="SITE_WX_IMG" value="<?php echo C('SITE_WX_IMG');?>" /></p>
                           <p><button type="button" class="btn btn-danger upload_button" id="file_upload_02" data-input="SITE_WX_IMG" data-img="SITE_WX_IMG_PIC">上传</button><i class="pull-right" id="loading" style="display:none;"><img src="/Public/admin/dist/img/loading.gif" /></i></p>
                           <p><small class="text-muted">建议尺寸：120/120(px)</small></p>                           
                        </div>
                        <div class="col-sm-1 col-xs-4">
                           <img src="<?php echo C('SITE_WX_IMG');?>" id="SITE_WX_IMG_PIC" class="img-responsive" />
                        </div>
                     </div>
                     <div class="form-group">
                        <label for="SITE_WAP_IMG" class="col-sm-2 col-xs-12 control-label">网站二维码：</label>
                        <div class="col-sm-3 col-xs-8">
                           <p><input type="text" class="form-control" name="SITE_WAP_IMG" id="SITE_WAP_IMG" value="<?php echo C('SITE_WAP_IMG');?>" /></p>
                           <p><button type="button" class="btn btn-danger upload_button" id="file_upload_03" data-input="SITE_WAP_IMG" data-img="SITE_WAP_IMG_PIC">上传</button><i class="pull-right" id="loading" style="display:none;"><img src="/Public/admin/dist/img/loading.gif" /></i></p>
                           <p><small class="text-muted">建议尺寸：120/120(px)</small></p>                           
                        </div>
                        <div class="col-sm-1 col-xs-4">
                           <img src="<?php echo C('SITE_WAP_IMG');?>" id="SITE_WAP_IMG_PIC" class="img-responsive" />
                        </div>
                     </div>
                     <div class="form-group">
                        <label for="SITE_COPYRIGHT" class="col-sm-2 control-label">版权：</label>
                        <div class="col-sm-4 col-xs-12">
                           <textarea class="form-control" name="SITE_COPYRIGHT"><?php echo C('SITE_COPYRIGHT');?></textarea>
                        </div>
                        <div class="pad-t-sm col-sm-6 col-xs-12"></div>
                     </div> 
                     <div class="form-group form-actions">
                        <div class="col-sm-10 col-sm-offset-2">
                           <button type="button" class="btn btn-danger btn-sub-fm"> <i class="icon-ok bigger-110"></i>确认修改</button>
                        </div>
                     </div>
                </form> 
            </div>
            <!-- /.box-body -->
          </div>
        </div>
        <!-- /.col -->
      </div>

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

<script language="javascript">
$(function(){
   $('.btn-sub-fm').click(function(){
      
	 var data = $("#import_form").serialize();
	 //alert(data);
	 $.ajax({
	    url : "<?php echo U('/Role/updateconfig');?>",
		type : "POST",
		data : data,
		success : function(d){
		   var d=$.parseJSON(d);
		   $.fn.tips({type:d.type,content:d.content,url:d.url});
		} 
	 });
	 
   });
});
</script>

<script src="/Public/admin/dist/js/app.min.js"></script>
</body>
</html>