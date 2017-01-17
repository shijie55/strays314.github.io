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
      <form name="import_form" method="post" onsubmit="return checkfm();" action="<?php echo U('/Content/insarticle');?>">
      <div class="nav-tabs-custom">
         <ul class="nav nav-tabs">
            <li class="active"><a href="#default" data-toggle="tab">基本</a></li>
            <li><a href="#piclis" class="piclisTab" data-toggle="tab">图集</a></li>
            <!--            
            <li><a href="#remark" class="remarkTab" data-toggle="tab">自定义字段</a></li> 
            -->
         </ul>         
         <div class="tab-content form-horizontal">            
            
            <div class="active tab-pane" id="default">
               <?php if(count($catelis) > 0): ?><div class="form-group">
                  <label for="catename" class="col-sm-2 control-label">分类：</label>
                  <div class="col-sm-2 col-xs-12">
                     <select name="cateid" id="cateid" class="form-control">                                 
                        <option value="<?php echo ($focusid); ?>"><?php echo ($focusname); ?></option>
                        <?php if(is_array($catelis)): $i = 0; $__LIST__ = $catelis;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$rscate): $mod = ($i % 2 );++$i;?><option value="<?php echo ($rscate['id']); ?>"><?php $__FOR_START_10760__=0;$__FOR_END_10760__=$rscate['level'];for($i=$__FOR_START_10760__;$i < $__FOR_END_10760__;$i+=1){ ?>∟<?php } echo ($rscate['catename']); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                     </select>
                  </div>
               </div>
               <?php else: ?>
               <input type="hidden" name="cateid" value="<?php echo ($focusid); ?>" /><?php endif; ?>
               <input type="hidden" name="bkid" value="<?php echo ($focusid); ?>" />
               <div class="form-group">
                  <label for="title" class="col-sm-2 control-label">标题：</label>
                  <div class="col-sm-4 col-xs-12">
                     <input type="text" class="form-control" name="title" id="title">
                  </div>
               </div>
               <div class="form-group">
                  <label for="title" class="col-sm-2 control-label">副标：</label>
                  <div class="col-sm-4 col-xs-12">
                     <input type="text" class="form-control" name="otitle" id="otitle">
                  </div>
               </div>
               <div class="form-group">
                  <label for="tags" class="col-sm-2 control-label">标签：</label>
                  <div class="col-sm-4 col-xs-12">
                     <input type="text" class="form-control" name="tags" id="tags">
                  </div>
               </div>
               <div class="form-group">
                  <label for="defaultpic" class="col-sm-2 col-xs-12 control-label">图片：</label>
                  <div class="col-sm-3 col-xs-8">
                     <p><input type="text" class="form-control" name="defaultpic" id="defaultpic" /></p>
                     <p><button type="button" class="btn btn-danger upload_button" id="file_upload_01" data-input="defaultpic" data-img="defaultpic_pic">上传</button><i class="pull-right" id="loading" style="display:none;"><img src="/Public/admin/dist/img/loading.gif" /></i></p>
                     <p><small class="text-muted">建议尺寸：1045/590(px)</small></p>                           
                  </div>
                  <div class="col-sm-1 col-xs-4">
                     <img src="/Public/admin/dist/img/nopic.jpg" id="defaultpic_pic" class="img-responsive" />
                  </div>
               </div>
               <!-- <div class="form-group">
                  <label for="sid" class="col-sm-2 control-label">关联展馆：</label>
                  <div class="col-sm-4 col-xs-12">
                     <select class="form-control" name="sid" id="sid">
                        <option value="0">不选择</option>
                        <?php if(is_array($plis)): $i = 0; $__LIST__ = $plis;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$rsp): $mod = ($i % 2 );++$i;?><option value="<?php echo ($rsp['id']); ?>"><?php echo ($rsp['catename']); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                     </select>
                  </div>
               </div> -->
               <div class="form-group hidden-xs">
                  <label for="docsrc" class="col-sm-2 control-label">相关下载：</label>
                  <div class="col-sm-3 col-xs-12">
                     <input type="text" class="form-control" name="docsrc" id="docsrc">
                  </div>
                  <div class="col-sm-7 col-xs-12"><button type="button" class="btn btn-danger fzupbtn" data-input="docsrc">上传</button></div>
               </div>
               <!--
               <div class="form-group">
                  <label for="poster-big" class="col-sm-2 col-xs-12 control-label">海报横版：</label>
                  <div class="col-sm-3 col-xs-8">
                     <p><input type="text" class="form-control" name="poster-big" id="poster-big"  /></p>
                     <p><button type="button" class="btn btn-danger upload_button" id="file_upload_02" data-input="poster-big" data-img="poster-big_pic">上传</button><i class="pull-right" id="loading" style="display:none;"><img src="/Public/admin/dist/img/loading.gif" /></i></p>
                     <p><small class="text-muted">建议尺寸：1920/500(px)</small></p>                           
                  </div>
                  <div class="col-sm-1 col-xs-4">
                     <img src="/Public/admin/dist/img/nopic.jpg" id="poster-big_pic" class="img-responsive" />
                  </div>
               </div>
               <div class="form-group">
                  <label for="poster-small" class="col-sm-2 col-xs-12 control-label">海报竖版：</label>
                  <div class="col-sm-3 col-xs-8">
                     <p><input type="text" class="form-control" name="poster-small" id="poster-small"  /></p>
                     <p><button type="button" class="btn btn-danger upload_button" id="file_upload_03" data-input="poster-small" data-img="poster-small_pic">上传</button><i class="pull-right" id="loading" style="display:none;"><img src="/Public/admin/dist/img/loading.gif" /></i></p>
                     <p><small class="text-muted">建议尺寸：352/500(px)</small></p>                           
                  </div>
                  <div class="col-sm-1 col-xs-4">
                     <img src="/Public/admin/dist/img/nopic.jpg" id="poster-small_pic" class="img-responsive" />
                  </div>
               </div>
               <div class="form-group">
                  <label for="playurl" class="col-sm-2 control-label">播放链接：</label>
                  <div class="col-sm-4 col-xs-12">
                     <input type="text" class="form-control" name="playurl" id="playurl">
                  </div>
               </div>
               -->
               <!-- <div class="form-group">
                  <label for="thebeg" class="col-sm-2 control-label">开始时间：</label>
                  <div class="col-sm-2 col-xs-12">
                     <input type="text" class="form-control" name="thebeg" id="thebeg">
                  </div>
               </div>
               <div class="form-group">
                  <label for="theed" class="col-sm-2 control-label">结束时间：</label>
                  <div class="col-sm-2 col-xs-12">
                     <input type="text" class="form-control" name="theed" id="theed">
                  </div>
               </div> -->
               <div class="form-group">
                  <label for="shortcontent" class="col-sm-2 control-label">简介：</label>
                  <div class="col-sm-10 col-xs-12">
                     <textarea class="easyedit" style="width:100%; height:200px;" name="shortcontent"></textarea>
                  </div>
               </div>
               <div class="form-group">
                  <label for="content" class="col-sm-2 control-label">正文：</label>
                  <div class="col-sm-10 col-xs-12">
                     <textarea class="kindeditor" style="width:100%; height:300px;" name="content"></textarea>
                  </div>
               </div>
               <div class="form-group">
                  <label for="author" class="col-sm-2 control-label">作者：</label>
                  <div class="col-sm-2 col-xs-12">
                     <input type="text" class="form-control" name="author" id="author">
                  </div>
               </div>
               <div class="form-group">
                  <label for="comefrom" class="col-sm-2 control-label">来源：</label>
                  <div class="col-sm-1 col-xs-12">
                     <input type="text" class="form-control" name="comefrom" id="comefrom">
                  </div>
               </div>
               <div class="form-group">
                  <label for="hits" class="col-sm-2 control-label">点击率：</label>
                  <div class="col-sm-2 col-xs-12">
                     <input type="text" class="form-control" name="hits" id="hits">
                  </div>
               </div>
               <div class="form-group">
                  <label for="links" class="col-sm-2 control-label">链接：</label>
                  <div class="col-sm-4 col-xs-12">
                     <input type="text" class="form-control" name="links" id="links">
                  </div>
               </div>
               <div class="form-group">
                  <label for="isgood" class="col-sm-2 control-label">推荐：</label>
                  <div class="col-sm-1 col-xs-12">
                     <select name="isgood" id="isgood" class="form-control">
                        <option value="0">否</option>
                        <option value="1">是</option>
                     </select>
                  </div>
               </div>
               <div class="form-group">
                  <label for="isfocus" class="col-sm-2 control-label">焦点：</label>
                  <div class="col-sm-1 col-xs-12">
                     <select name="isfocus" id="isfocus" class="form-control">
                        <option value="0">否</option>
                        <option value="1">是</option>
                     </select>
                  </div>
               </div>
               
               <div class="form-group">
                  <label for="addtime" class="col-sm-2 control-label">时间：</label>
                  <div class="col-sm-4 col-xs-12">
                     <input type="text" class="form-control" name="addtime" id="addtime" value="<?php echo ($addtime); ?>">
                  </div>
               </div>
               <div class="form-group">
                  <label for="taxis" class="col-sm-2 control-label">排序：</label>
                  <div class="col-sm-1 col-xs-12">
                     <input type="text" class="form-control" name="taxis" id="taxis" value="0">
                  </div>
               </div>
                             
            </div>
            
            <div class="tab-pane" id="piclis">               
               
               <div class="form-group">
                  <div class="col-sm-10 col-sm-offset-1 col-xs-12 hidden-xs">
                     <div class="callout callout-light">
                        <p>可同时上传20张以内照片，图集内容处理成相同尺寸，建议大小为：420*300。</p>
                     </div>                     
                     <p><input type="hidden" name="picarr" id="picarr"></p>
                     <button type="button" class="btn btn-danger fupDTbtn" data-input="picarrlist" data-hidden="picarr">上传</button>
                  </div>
                  <div class="col-xs-12 visible-xs text-red text-center">图集上传请通过电脑登录操作</div>
               </div>
               <div class='form-group'>
                  <div class='col-sm-10 col-sm-offset-1 col-xs-12' id="picarrlist" style="padding-left:0;">
                     
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

<script src="/Public/admin/plugins/select2/select2.full.min.js"></script>
<link rel="stylesheet" href="/Public/kindEditor/themes/default/default.css" />
<script charset="utf-8" src="/Public/kindEditor/kindeditor.js"></script>
<script charset="utf-8" src="/Public/kindEditor/lang/zh_CN.js"></script>
<script language="javascript">
function checkfm(){
   var title = $('#title').val();
   var stock = $('#stock').val();
   //var content = $('.kindeditor').val();
   //alert(content);
   if(title == ""){
	  $.fn.tips({type:'error',content:'标题不可为空'});
	  $('#title').focus().parent().parent().addClass('has-error');
	  return false;
   }else if(stock == '' || stock == 0){
      $.fn.tips({type:'error',content:'请输入库存不可为空'});
	  $('#stock').focus().parent().parent().addClass('has-error');
	  return false;
   }else{
      return true;
   }
}
KindEditor.ready(function(K) {
   var editor = K.editor({
      uploadJson : '/Public/kindEditor/php/upload_json.php',
      fileManagerJson : '/Public/kindEditor/php/file_manager_json.php',
	  allowFileManager : true
   });
   K('.fupDTbtn').click(function() {
					var DTArray = K("#"+K(this).attr("data-input"));
					var DTList = K("#"+K(this).attr("data-hidden"));
					var strTemp = DTList.val();
					var DTshow = DTArray.html();
					editor.loadPlugin('multiimage', function() {
						editor.plugin.multiImageDialog({
							clickFn : function(urlList) {
								var div = DTArray;
								div.html('');
								K.each(urlList, function(i, data) {
									DTshow += "<div class='col-sm-2 col-xs-4'><p><img src='"+data.url+"' class='img-responsive' /></p><p><input type='text' class='form-control' name='picarrcm[]' /></p><p class='text-center'><a href='javascript:void(0);' data-replace='"+data.url+"' onclick='delpicarr(this)'><i class='fa fa-trash text-red'></i></a></p></div>";
									strTemp+="|"+data.url.replace("/public/kindEditor/php/../../../","");
									//alert(DTshow);
								});
								//alert(DTList.html());
								DTList.val(strTemp);
								DTArray.html(DTshow);
								editor.hideDialog();
							}
						});
                    });
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
   K.create('.easyedit', {
                items : [ 'source', '|', 'undo', 'redo', '|', 'image' ,'|', 'fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold','italic', 'underline', 'strikethrough', '|','link', 'unlink']
   });
   K.create('.kindeditor', {
      uploadJson : '/Public/kindEditor/php/upload_json.php',
      fileManagerJson : '/Public/kindEditor/php/file_manager_json.php',
      allowFileManager : true,
	  filterMode: false
   });
});
function delpicarr(e){
   var obj = $(e);
   var str = obj.attr('data-replace');
   str = '|'+str.replace('/public/kindEditor/php/../../../','');
   var dmstr = $('#picarr').val();
   //alert(dmstr);
   dmstr = dmstr.replace(str,'');
   $('#picarr').val(dmstr);
   obj.parent().parent().remove();
   //dmstr = $('#picarr').val();
   //alert(dmstr);
}
</script>

<script src="/Public/admin/dist/js/app.min.js"></script>
</body>
</html>