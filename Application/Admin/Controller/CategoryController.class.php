<?php
namespace Admin\Controller;
use Think\Controller;
class CategoryController extends CommonController {
	
	public function _init(){
	   $rscate = categorytree('category');
	   $this -> assign('catelis',$rscate);
	}
	
	public function add(){
	   $this -> display();
	}
	
	/*  edit 
	 ## 编辑分类
	 ## @return empty
	*/
	public function edit(){
	   $id = I('get.id');
	   if(empty($id)){
	      $this -> error('抱歉，参数不完整，操作失败！',U('/Category'),5);
	   }
	   $Model = M('category');
	   $rs = $Model -> where('id='.$id) -> find();
	   //$rs['focusid'] = $id;
	   $rsmm = $Model -> where('pid='.$id) -> find();
	   //$isson = 0;
	   if($rsmm){
		  $isson = 1;
	   }
	   $rs['isson'] = $isson;
	   $this -> assign('rs',$rs);
	   $this -> display();
	}
	
	/*  insert 
	 ## 写入分类
	 ## @return empty
	*/
	public function insert(){
	   //$this->success('操作失败',U('/Category'),50);
	   $data = I('post.');
	   $data['content'] = I('post.content','',false);
	   $data['shortcontent'] = I('post.shortcontent','',false);
	   $pid = $data['pid'];
	   $Model = M('category');
	   if(empty($data['taxis'])){
	      $data['taxis'] = 0;
	   }
	   if($pid!=0){
	      $rs = $Model -> field('level') -> where('id='.$pid) -> find();
	      $data['level'] = $rs['level']+1;
	   }
	   if(empty($data['pagesize']) || $data['pagesize']<0){
	      $data['pagesize'] = 20;
	   }
	   $isok = $Model -> add($data);
	   if($isok){
		  $this -> success('新增分类信息成功',U('/Category'),5);
	   }else{
	      $this -> error('新增分类信息失败',U('/Category'),5);
	   }
	   //echo json_encode($output);
	}
	
	/*  update 
	 ## 更新分类
	 ## @return empty
	*/
	public function update(){
	   $data = I('post.');
	   $data['content'] = I('post.content','',false);
	   $data['shortcontent'] = I('post.shortcontent','',false);
	   $mid = $data['id'];
	   $opid = $data['opid'];
	   $pid = $data['pid'];
	   
	   $Model = M('category');
	   //die($data['pagesize']);
	   if(empty($mid)){
	      $this -> error('抱歉，参数不完整，操作失败！',U('/Category'),5);
	   }
	   if($pid == ''){
	      //die($pid);
		  $pid = $data['lol'];
	   }
	   
	   if($opid != $pid){
	      //更新了父类
		  //die($pid.'<br />'.$opid);
		  if($pid != $mid){
			  $rs = $Model -> field('level') -> where('id='.$pid) -> find();
			  $data['level'] = $rs['level']+1;
			  if($data['pid']==0){
				 $data['level'] = 0;
			  }
		  }else{
		      $data['pid'] = $opid;
		  }
	   }
	   if(empty($data['pagesize']) || $data['pagesize']<0){
	      $data['pagesize'] = 20;
	   }
	   if(empty($data['isextends'])){
	      $data['isextends'] = 0;
	   }
	   $isok = $Model -> where('id='.$mid) -> save($data);
	   if($isok !== false){
	      $this -> success('更新分类信息成功',U('/Category'),5);
	   }else{
	      $this -> error('更新分类信息失败',U('/Category'),5);
	   }
	}
	
	public function showdir(){
	   $type = I('get.type');
	   $dir = APP_PATH.'Home/View/'.$type.'/';
	   //echo $dir;
	   $f = @ opendir($dir);
	   $err = 0;
	   $i = 0;
	   while(($file=readdir($f))!=false){
	      $i++;
		  if(!($file == '.' || $file == '..')){
			 $output .= "<div class='callout callout-light'><a href='javascript:void(0);' onclick='javascript:settemp(this);' data-temp='".$file."'>".$file."</a></div>";
		  }
	   }
	   if($i <= 1){
	      $err = 1;
		  $output = "<div class='callout callout-danger'>未能在".$type."目录找到模板文件</div>";   
	   }
	   closedir($f);
	   //echo $output;
	   $ret = array('err'=>$err,'Htm'=>$output);
	   $this -> ajaxReturn($ret);
	}
	
	public function checkextends(){
	   $id = I('get.id');
	   $Model = M('category');
	   $rs = $Model -> field('isextends,listtemp,contenttemp') -> where('id='.$id) -> find();
	   $output = array('type'=>'error');
	   if($rs){
	      if($rs['isextends'] == 1){
		     $output = array('type'=>'ok','listtemp'=>$rs['listtemp'],'contenttemp'=>$rs['contenttemp']);
		  }else{
		     $output = array('type'=>'error');
		  }
	   }
	   echo json_encode($output);
	}
}