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
<link rel="stylesheet" href="/Public/admin/plugins/datepicker/datepicker3.css">
<link rel="stylesheet" href="/Public/admin/plugins/iCheck/all.css">

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
            <div class="box-header with-border">                
                <a class="btn btn-info btn-sm" href="<?php echo U('/Content/addarticle',array('id'=>$focusid));?>"><i class="fa fa-plus"></i> 添加内容</a>
                <a class="btn btn-success btn-sm btn-sub-taxis" href="javascript:void(0);"><i class="fa fa-sort-alpha-desc"></i> 更新排序</a>
                <a class="btn btn-danger btn-sm btn-sub-del" href="javascript:void(0);"><i class="fa fa-trash"></i> 删除所选</a>
                <a class="btn btn-primary btn-sm do-sth" data-ctrl="isgood" href="javascript:void(0);"><i class="fa fa-star"></i> 推荐/取消推荐</a>
                <a class="btn btn-warning btn-sm do-sth" data-ctrl="isfocus" href="javascript:void(0);"><i class="fa fa-hourglass-half"></i> 焦点/取消焦点</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
             <form name="form1" method="post" action="<?php echo U('/Content/article',array('id'=>$focusid));?>">
             <div class="clearfix pad-b row">
                <div class="col-sm-2 col-xs-12"><input type="text" name="title" class="form-control" placeholder="标题" /></div>
                <div class="visible-xs col-xs-12" style="height:6px;"></div>
                <div class="col-sm-2 col-xs-12">
                   <select class="form-control select2" style="width:100%;" name="cateid">
                      <option value="-1">--分类--</option>
                      <?php if(is_array($catelis)): $i = 0; $__LIST__ = $catelis;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$rscate): $mod = ($i % 2 );++$i;?><option value="<?php echo ($rscate['id']); ?>"><?php $__FOR_START_583__=0;$__FOR_END_583__=$rscate['level'];for($i=$__FOR_START_583__;$i < $__FOR_END_583__;$i+=1){ ?>∟<?php } echo ($rscate['catename']); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                   </select>
                </div>
                <div class="visible-xs col-xs-12" style="height:6px;"></div>
                <div class="col-sm-1 col-xs-4">
                   <select class="form-control" name="isgood">
                      <option value="-1">是否推荐</option>
                      <option value="0">否</option>
                      <option value="1">是</option>
                   </select>
                </div>
                <div class="col-sm-1 col-xs-4">
                   <select class="form-control" name="isfocus">
                      <option value="-1">是否焦点</option>
                      <option value="0">否</option>
                      <option value="1">是</option>
                   </select>
                </div>
                <div class="col-sm-1 col-xs-4"><button type="submit" class="btn btn-success btn-block"><i class="fa fa-search"></i> 搜索</button></div>
             </div>
             </form>
             <div class="table-responsive">  
                 <table id="sample-table-1" class="table table-striped table-bordered table-hover">
                    <thead>
                       <tr>
                          <th class="text-center">
                            <input id="checkall" class="minimal-red" type="checkbox">
                          </th>
                          <th class="text-center" width="120">排序</th>
                          <th class="text-center">ID</th>
                          <th>标题</th>
                          <th class="text-center">分类</th>
                          <th class="text-center">推荐</th>
                          <th class="text-center">焦点</th>
                          <th class="text-center">时间</th>
                          <th class="text-center">操作</th>
                       </tr>
                    </thead>
                    <tbody>
                       <?php if(is_array($rslist)): $i = 0; $__LIST__ = $rslist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$rs): $mod = ($i % 2 );++$i;?><tr>
                          <td class="text-center">
                             
                                <input name="for-dosth" value="<?php echo ($rs['id']); ?>" data-isgood="<?php echo ($rs['isgood']); ?>" data-isfocus="<?php echo ($rs['isfocus']); ?>" class="minimal-red" type="checkbox">
                             
                          </td>
                          <td class="text-center">
                             <input class="text-center" value="<?php echo ($rs['taxis']); ?>" size="4" data-id="<?php echo ($rs['id']); ?>" type="text" name="fortaxis">
                          </td>
                          <td class="text-center"><?php echo ($rs['id']); ?></td>
                          <td><?php echo ($rs['title']); ?></td>
                          <td class="text-center"><?php echo ($rs['catename']); ?></td>
                          <td class="text-center"><?php if($rs['isgood'] == 1): ?>是<?php else: ?>-<?php endif; ?></td>
                          <td class="text-center"><?php if($rs['isfocus'] == 1): ?>是<?php else: ?>-<?php endif; ?></td>
                          <td class="text-center"><?php echo ($rs['addtime']); ?></td>
                          <td class="text-center">
                             <a class="btn btn-xs btn-info" href="<?php echo U('/Content/editarticle',array('doid'=>$rs['id'],'id'=>$focusid));?>">
                               <i class="fa fa-edit"></i> 编辑
                             </a>
                             <a class="btn btn-xs btn-danger btn-del" href="javascript:void(0);" data-id="<?php echo ($rs['id']); ?>">
                               <i class="fa fa-trash"></i> 删除
                             </a>                             
                          </td>
                       </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                    </tbody>
                 </table>
             </div>
             <div class="clearfix pad-v pager-admin"><?php echo ($pagination); ?></div>
            </div>
            <!-- /.box-body -->
          </div>
        </div>
        <!-- /.col -->
</div>
<style type="text/css">
.table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th{ vertical-align:middle; }
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
<script src="/Public/admin/plugins/select2/select2.full.min.js"></script>
<script src="/Public/admin/plugins/iCheck/icheck.min.js"></script>
<script language="javascript">
$(function(){
   $(".select2").select2();
   $('#checkall').on('ifChecked',function(){
      //var f = $(this).prop('checked');
	  $('input[name="for-dosth"]').each(function(){
         $(this).iCheck('check');  
      });
   });
   $('#checkall').on('ifUnchecked',function(){
      //var f = $(this).prop('checked');
	  $('input[name="for-dosth"]').each(function(){
         $(this).iCheck('uncheck');  
      });
   });
   $('input[type="checkbox"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass: 'iradio_minimal-red'
   });
   
   $('.btn-sub-taxis').click(function(){
      var chk_value =Array();
	  var tax_value = Array();
	  $("input[name='fortaxis']").each(function(){
		 chk_value.push($(this).attr('data-id'));
		 tax_value.push($(this).val());
	  });
	  $.ajax({
			 url: "<?php echo U('/Role/updatetaxis',array('tabel'=>'content'));?>", 
			 type: "POST",
			 data:{idarray:chk_value,taxisArray:tax_value},
			 //dataType: "json",
			 error: function(){  
				 $.fn.tips({type:"error",content:"更新排序失败!"}); 
			 },  
			 success: function(data,status){
				 var d=$.parseJSON(data);
				 $.fn.tips({type:d.type,content:d.content,url:''});				 
			 }
      });
   });
   $('.btn-del').click(function(){
      var id = $(this).attr('data-id');
	  del(id);
   });
   $('.btn-sub-del').click(function(){
      var chk_value =Array();
	  $('input[name="for-dosth"]:checked').each(function(){
		 chk_value.push($(this).val());
      });
	  if(chk_value == ""){
	     $.fn.tips({type:'error',content:'您没有选择任何项目'});
	  }else{
	     del(chk_value);
	  }
   });
   $('.do-sth').click(function(){
      var ctrlattr = $(this).attr('data-ctrl');
	  var chk_value =Array();
	  var isg_value = Array();
	  $('input[name="for-dosth"]:checked').each(function(){
		 chk_value.push($(this).val());
		 isg_value.push($(this).attr("data-"+ctrlattr));
      });
	  if(chk_value == ""){
	     $.fn.tips({type:'error',content:'您没有选择任何项目'});
	  }else{
	     $.ajax({
		    url : "<?php echo U('/Goods/updateattr/type/"+ctrlattr+"');?>",
			type : "POST",
			data : {'idarr':chk_value,'attrarr':isg_value,'table':'content'},
			error : function(){
			   $.fn.tips({type:'error',content:'异步加载失败,建议刷新重试'});
			},
			success : function(data){
			   //var d=$.parseJSON(data);
			   $.fn.tips({'type':data.type,'content':data.msg,'url':''});
			}
		 });
	  }
   });	
});
function del(idarr){
      $.ajax({
			 url: "<?php echo U('/Goods/delete');?>", 
			 type: "POST",
			 data:{'idarr':idarr,'table':'content'}, 
			 success: function(d){
				 $.fn.tips({'type':d.type,'content':d.msg,'url':''});			 
			 }
      });
}
</script>

<script src="/Public/admin/dist/js/app.min.js"></script>
</body>
</html>