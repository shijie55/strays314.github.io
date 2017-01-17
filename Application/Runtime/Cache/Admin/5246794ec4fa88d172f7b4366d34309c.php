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
  

<link rel="stylesheet" href="/Public/admin/plugins/select2/select2.min.css">

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
      <form name="import_form" method="post" onsubmit="return checkfm();" action="<?php echo U('/Category/update');?>">
      <div class="nav-tabs-custom">
         <ul class="nav nav-tabs">
            <li class="active"><a href="#default" data-toggle="tab">栏目</a></li>
            <li><a href="#templete" class="piclisTab" data-toggle="tab">模板</a></li>            
            <li><a href="#remark" class="remarkTab" data-toggle="tab">内容</a></li> 
         </ul>         
         <div class="tab-content form-horizontal">            
            
            <div class="active tab-pane" id="default">
               
               <div class="form-group">
                  <label for="catename" class="col-sm-2 control-label">父类：</label>
                  <div class="col-sm-2 col-xs-12">
                     <select name="pid" id="pid" class="form-control" <?php if($rs['isson'] == 1): ?>disabled="disabled"<?php endif; ?>>
                        <option value="0">顶级栏目</option>
                        <?php if(is_array($catelis)): $i = 0; $__LIST__ = $catelis;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$rscate): $mod = ($i % 2 );++$i;?><option value="<?php echo ($rscate["id"]); ?>" <?php if($rscate['id'] == $rs['pid']): ?>selected='selected'<?php endif; ?>><?php $__FOR_START_14359__=0;$__FOR_END_14359__=$rscate['level'];for($i=$__FOR_START_14359__;$i < $__FOR_END_14359__;$i+=1){ ?>∟<?php } echo ($rscate["catename"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                     </select>
                     <input type="hidden" name="id" value="<?php echo ($rs["id"]); ?>" />
                     <input type="hidden" name="opid" value="<?php echo ($rs["pid"]); ?>" />
                  </div>
                  <?php if($rs['isson'] == 1): ?><div class="col-sm-8 col-xs-12 lh">
                        <input type="hidden" name="lol" value="<?php echo ($rs["pid"]); ?>" />
                        <span class="text-red">&nbsp;当前分类存在子类，不允许编辑</span>
                     </div><?php endif; ?>
               </div>
               <div class="form-group">
                  <label for="catename" class="col-sm-2 control-label">栏目名称：</label>
                  <div class="col-sm-4 col-xs-12">
                     <input type="text" class="form-control" name="catename" id="catename" value="<?php echo ($rs['catename']); ?>">
                  </div>
               </div>
               <div class="form-group">
               <label for="EnglishName" class="col-sm-2 control-label">英文名称：</label>
                  <div class="col-sm-4 col-xs-12">
                     <input type="text" class="form-control" name="EnglishName" id="EnglishName" value="<?php echo ($rs['englishname']); ?>">
                  </div>
               </div>
               <div class="form-group">
                  <label for="logo" class="col-sm-2 col-xs-12 control-label">栏目图标：</label>
                  <div class="col-sm-3 col-xs-8">
                     <p><input type="text" class="form-control" name="logo" id="logo" placeholder="" value="<?php echo ($rs['logo']); ?>" /></p>
                     <p><button type="button" class="btn btn-danger upload_button" id="file_upload_03" data-input="logo" data-img="logo_pic">上传</button><i class="pull-right" id="loading" style="display:none;"><img src="/Public/admin/dist/img/loading.gif" /></i></p>
                     <p><small class="text-muted">建议参照UI另存查看尺寸或者咨询技术</small></p>                          
                  </div>
                  <div class="col-sm-1 col-xs-4">
                     <img src="/Public/admin/dist/img/nopic.jpg" id="logo_pic" class="img-responsive" />
                  </div>
               </div>
               <div class="form-group">
                  <label for="isnav" class="col-sm-2 control-label">导航显示：</label>
                  <div class="col-sm-2 col-xs-12">
                     <select name="isnav" class="form-control">
                        <option value="1" <?php if($rs['isnav'] == 1): ?>selected='selected'<?php endif; ?>>是</option>
                        <option value="0" <?php if($rs['isnav'] == 0): ?>selected='selected'<?php endif; ?>>否</option>
                     </select>
                  </div>
               </div>
               <div class="form-group">
                  <label for="model" class="col-sm-2 control-label">模型：</label>
                  <div class="col-sm-2 col-xs-12">
                     <select name="model" id="model" class="form-control">
                        <option value="1" <?php if($rs['model'] == 1): ?>selected='selected'<?php endif; ?>>文章</option>
                        <option value="0" <?php if($rs['model'] == 0): ?>selected='selected'<?php endif; ?>>单页</option>
                        <option value="2" <?php if($rs['model'] == 2): ?>selected='selected'<?php endif; ?>>外链</option>
                     </select>
                  </div>
               </div>
               <div class="form-group">
                  <label for="pagesize" class="col-sm-2 control-label">分页：</label>
                  <div class="col-sm-2 col-xs-12">
                     <input type="text" class="form-control" name="pagesize" id="pagesize" value="<?php echo ($rs['pagesize']); ?>">
                  </div>
               </div>
               <div class="form-group">
                  <label for="taxis" class="col-sm-2 control-label">排序：</label>
                  <div class="col-sm-1 col-xs-12">
                     <input type="text" class="form-control" name="taxis" id="taxis" value="<?php echo ($rs['taxis']); ?>">
                  </div>
               </div>
               <div class="form-group">
                  <label for="defaultpic" class="col-sm-2 col-xs-12 control-label">图片：</label>
                  <div class="col-sm-3 col-xs-8">
                     <p><input type="text" class="form-control" name="defaultpic" id="defaultpic" value="<?php echo ($rs['defaultpic']); ?>" /></p>
                     <p><button type="button" class="btn btn-danger upload_button" id="file_upload_02" data-input="defaultpic" data-img="defaultpic_pic">上传</button><i class="pull-right" id="loading" style="display:none;"><img src="/Public/admin/dist/img/loading.gif" /></i></p>
                     <p><small class="text-muted">建议参照UI另存查看尺寸或者咨询九五策划</small></p>                           
                  </div>
                  <div class="col-sm-1 col-xs-4">
                     <img src="/Public/admin/dist/img/nopic.jpg" id="defaultpic_pic" class="img-responsive" />
                  </div>
               </div>
               <div class="form-group">
               <label for="bannercm" class="col-sm-2 control-label">图片描述：</label>
                  <div class="col-sm-4 col-xs-12">
                     <input type="text" class="form-control" name="bannercm" id="bannercm" value="<?php echo ($rs['bannercm']); ?>">
                  </div>
                  <!-- <div><p><small class="text-muted">输入上图片的描述，没有可以不填</small></p></div> -->
               </div>
               <div class="form-group">
                  <label for="pic" class="col-sm-2 col-xs-12 control-label">通栏图片：</label>
                  <div class="col-sm-3 col-xs-8">
                     <p><input type="text" class="form-control" name="pic" id="pic" value="<?php echo ($rs['pic']); ?>" /></p>
                     <p><button type="button" class="btn btn-danger upload_button" id="file_upload_01" data-input="pic" data-img="pic_pic">上传</button><i class="pull-right" id="loading" style="display:none;"><img src="/Public/admin/dist/img/loading.gif" /></i></p>
                     <p><small class="text-muted">建议尺寸：1920/400(px)</small></p>                           
                  </div>
                  <div class="col-sm-1 col-xs-4">
                     <img src="/Public/admin/dist/img/nopic.jpg" id="pic_pic" class="img-responsive" />
                  </div>
               </div>
               <!--
               <div class="form-group">
                  <label for="logo" class="col-sm-2 col-xs-12 control-label">logo：</label>
                  <div class="col-sm-3 col-xs-8">
                     <p><input type="text" class="form-control" name="logo" id="logo" placeholder="品牌logo" value="<?php echo ($rs['logo']); ?>" /></p>
                     <p><button type="button" class="btn btn-danger upload_button" id="file_upload_03" data-input="logo" data-img="logo_pic">上传</button><i class="pull-right" id="loading" style="display:none;"><img src="/Public/admin/dist/img/loading.gif" /></i></p>
                     <p><small class="text-muted">建议参照UI另存查看尺寸或者咨询技术</small></p>                           
                  </div>
                  <div class="col-sm-1 col-xs-4">
                     <img src="/Public/admin/dist/img/nopic.jpg" id="logo_pic" class="img-responsive" />
                  </div>
               </div>
               <div class="form-group">
                  <label for="sty" class="col-sm-2 control-label">样式配置：</label>
                  <div class="col-sm-2 col-xs-12">
                     <select name="sty" id="sty" class="form-control">
                        <option value="1" <?php if($rs['sty'] == 1): ?>selected='selected'<?php endif; ?> style="color:#1D24AB;">▎默认</option>
                        <option value="2" <?php if($rs['sty'] == 2): ?>selected='selected'<?php endif; ?> style="color:#59BC7D;">▎青色系</option>
                        <option value="3" <?php if($rs['sty'] == 3): ?>selected='selected'<?php endif; ?> style="color:#D22088;">▎红色系</option>
                        <option value="4" <?php if($rs['sty'] == 4): ?>selected='selected'<?php endif; ?> style="color:#FBC200;">▎黄色系</option>
                     </select>
                  </div>
               </div>
               -->
               <!--
               <div class="form-group">
                  <label for="slogo" class="col-sm-2 col-xs-12 control-label">slogo：</label>
                  <div class="col-sm-3 col-xs-8">
                     <p><input type="text" class="form-control" name="slogo" id="slogo" placeholder="品牌详情页小logo" value="<?php echo ($rs['slogo']); ?>" /></p>
                     <p><button type="button" class="btn btn-danger upload_button" id="file_upload_04" data-input="slogo" data-img="slogo_pic">上传</button><i class="pull-right" id="loading" style="display:none;"><img src="/Public/admin/dist/img/loading.gif" /></i></p>
                     <p><small class="text-muted">建议参照UI另存查看尺寸或者咨询技术</small></p>                           
                  </div>
                  <div class="col-sm-1 col-xs-4">
                     <img src="/Public/admin/dist/img/nopic.jpg" id="slogo_pic" class="img-responsive" />
                  </div>
               </div>
               <div class="form-group hidden-xs">
                  <label for="docsrc" class="col-sm-2 control-label">相关下载：</label>
                  <div class="col-sm-3 col-xs-12">
                     <input type="text" class="form-control" name="docsrc" id="docsrc" value="<?php echo ($rs['docsrc']); ?>">
                  </div>
                  <div class="col-sm-7 col-xs-12"><button type="button" class="btn btn-danger fzupbtn" data-input="docsrc">上传</button></div>
               </div>
               --> 
               <div class="form-group">
                  <label for="links" class="col-sm-2 control-label">链接：</label>
                  <div class="col-sm-4 col-xs-12">
                     <input type="text" class="form-control" name="links" id="links" value="<?php echo ($rs['links']); ?>">
                  </div>
               </div>       
            </div>
            
            <div class="tab-pane" id="templete">               
               
               <div class="form-group">
                  <div class="col-sm-10 col-sm-offset-1 col-xs-12 hidden-xs">
                     <div class="callout callout-light">
                        <p>模板文件选择十分重要，如不选择，系统将根据栏目模型选择默认模板！</p>
                     </div>
                  </div>
                  <div class="col-xs-12 visible-xs text-red text-center">栏目模板请通过电脑登录选择</div>
               </div>
               <div class="form-group">
                  <label for="listtemp" class="col-sm-2 control-label">列表模板：</label>
                  <div class="col-sm-3 col-xs-9">
                     <input type="text" class="form-control" name="listtemp" id="listtemp" value="<?php echo ($rs['listtemp']); ?>">
                  </div>
                  <div class="col-sm-1 col-xs-3"><button type="button" data-model="list" class="btn btn-info seltemp">选择</button></div>
               </div>
               <div class="form-group">
                  <label for="contenttemp" class="col-sm-2 control-label">内容模板：</label>
                  <div class="col-sm-3 col-xs-9">
                     <input type="text" class="form-control" name="contenttemp" id="contenttemp" value="<?php echo ($rs['contenttemp']); ?>">
                  </div>
                  <div class="col-sm-1 col-xs-3"><button type="button" data-model="content" class="btn btn-info seltemp">选择</button></div>
               </div>
                              
            </div>             
                         
            <div class="tab-pane" id="remark">
               <div class="form-group">
                  <label for="shortcontent" class="col-sm-2 control-label">简介：</label>
                  <div class="col-sm-10 col-xs-12">
                     <textarea class="easyedit" style="width:100%; height:200px;" name="shortcontent"><?php echo ($rs['shortcontent']); ?></textarea>
                  </div>
               </div>
               <div class="form-group">
                  <label for="content" class="col-sm-2 control-label">正文：</label>
                  <div class="col-sm-10 col-xs-12">
                     <textarea class="kindeditor" style="width:100%; height:300px;" name="content"><?php echo ($rs['content']); ?></textarea>
                  </div>
               </div>
            </div>            
            
         </div>         
      </div>
      <div class="clearfix"><button type="submit" class="btn btn-info"> <i class="icon-ok bigger-110"></i>确认添加</button></div>
      </form> 
        
   </div>
   <!-- /.col -->
</div>
<div class="modal fade" id="myModal">
   <div class="modal_wrapper">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            <h4 class="modal-title">选择模板</h4>
         </div>
         <div class="modal-body">
            
         </div>
         <div class="modal-footer">
            <input type="hidden" id="cktemp" value="" />
            <input type="hidden" id="sktemp" value="listtemp" />
            <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
            <button type="button" class="btn btn-info upOrdbtn">确定</button>
         </div>
      </div>
   </div>
   </div>
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

<style type="text/css">
.modal-body .callout{ margin-bottom:2px !important; padding-top:8px !important; padding-bottom:8px !important; }
.modal-body .callout a{ display:block; }
.lh{ line-height:34px; }
</style>
<script src="/Public/admin/plugins/select2/select2.full.min.js"></script>
<link rel="stylesheet" href="/Public/kindEditor/themes/default/default.css" />
<script charset="utf-8" src="/Public/kindEditor/kindeditor.js"></script>
<script charset="utf-8" src="/Public/kindEditor/lang/zh_CN.js"></script>
<script language="javascript">
function checkfm(){
   var catename = $('#catename').val();
   //var content = $('.kindeditor').val();
   //alert(content);
   if(title == ""){
	  $.fn.tips({type:'error',content:'栏目名称不可为空'});
	  $('#catename').focus().parent().parent().addClass('has-error');
	  return false;
   }else{
      return true;
   }
}
function settemp(e){
   //alert($(e).attr('data-temp'));
   var Dom = $(e);
   Dom.parent().removeClass('callout-light').addClass('callout-info');
   Dom.parent().siblings().removeClass('callout-info').addClass('callout-light');
   //var temp = Dom.attr('data-temp');
   $('#cktemp').val(Dom.attr('data-temp'));
}
$(function(){
   $('button.seltemp').click(function(){
      //$('#myModal').modal();
	  var model = $(this).attr('data-model');
	  var catemodel = $('#model').val();
	  var dir = 'Article';
	  if(model == 'list'){
	     switch(parseInt(catemodel)){
		    case 0:
			   dir = 'Page';
			break;
			case 2:
			   alert('外链栏目无需选择模板文件');
			   return false;
			break;
		 }
		 $('#sktemp').val('listtemp');
	  }else{
	     $('#sktemp').val('contenttemp');
		 dir = 'Show';
	  }
	  $.ajax({
	     url : "<?php echo U('/Category/showdir');?>",
		 type : 'GET',
		 data : {'type':dir},
		 success : function(d){
		    //alert(data);
			if(d.err == 1){
			   $('.upOrdbtn').hide();
			}else{
			   $('.upOrdbtn').show();
			}
			$('.modal-body').html(d.Htm);
			$('#myModal').modal();
		 }
	  });
   });	
   $('.upOrdbtn').click(function(){
      var temp = $('#cktemp').val();
	  var ipt = $('#sktemp').val();
	  $('#'+ipt).val(temp);
	  if(temp == ''){
	     $.fn.tips({type:'error',content:'您未选择任何模板'});
	  }
	  $('#myModal').modal('hide');
   });
});
KindEditor.ready(function(K) {
   var editor = K.editor({
      uploadJson : '/Public/kindEditor/php/upload_json.php',
      fileManagerJson : '/Public/kindEditor/php/file_manager_json.php',
	  allowFileManager : true
   });
   K.create('.easyedit', {
      items : [ 'source', '|', 'undo', 'redo', '|', 'fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold','italic', 'underline', 'strikethrough', '|','link', 'unlink'],
	  filterMode: false
   });
   K.create('.kindeditor', {
      uploadJson : '/Public/kindEditor/php/upload_json.php',
      fileManagerJson : '/Public/kindEditor/php/file_manager_json.php',
      allowFileManager : true,
	  filterMode: false
   });
   K('.fzupbtn').click(function() {
					var fzArray = K("#"+K(this).attr("data-input"));
					editor.loadPlugin('insertfile', function() {
						editor.plugin.fileDialog({
							fileUrl : fzArray.val(),
							clickFn : function(url, title) {
								fzArray.val(url);
								editor.hideDialog();
							}
						});
					});
   });
});
</script>

<script src="/Public/admin/dist/js/app.min.js"></script>
</body>
</html>