<?php
namespace Admin\Controller;
use Think\Controller;
class GoodsController extends CommonController {
    
	private $ajaxres;
	
	public function _init(){
	   //do nothing
	   $this -> ajaxres = array(
	      'type' => 'error',
		  'msg' => '操作失败',
		  'url' => ''
	   );
	}
	
	
	
	public function set_ajaxres($type,$content,$url){
	   $this -> ajaxres = array(
	      'type' => $type,
		  'msg' => $content,
		  'url' => $url
	   );
	}
	
	
	/*
	  ## index
	  ## 商品列表
	*/
	public function index(){          
	   $catelis = categorytree('goods_cate');
	   $this -> assign('catelis',$catelis);
	   //查询所有内容
	   $Model = M('goods');
	   $parr = I('param.');
	   
	   $condition = "1=1";
	   $maps = array();
	   //dump($parr);
	   foreach($parr as $key=>$val){
	      if($val != ""){
		     if($key == 'title'){
			    $condition .= " and ".$key." like '%".urldecode($val)."%'";
			 }else if($key == 'cateid' || $key == 'ordtype'){
			    if($val != -1){
				   $condition .= " and ".$key."=".$val;
				}
			 }
			 $maps[$key] = urldecode($val);
		  }
	   }
	   //dump($condition);
	   $count = $Model -> where($condition) -> count();
	   $Page = new \Think\Page($count,20);
	   foreach($maps as $key=>$val) {
	      $Page->parameter[$key] = urlencode($val);
	   }
	   $Page->setConfig('prev','上一页');
	   $Page->setConfig('next','下一页');
	   $pagination = $Page->show();
	   $rs = $Model -> field('id,title,catename,price,stock,sta,taxis,ordtype') -> where($condition) -> order('ismin desc,ishot desc,id desc') -> limit($Page->firstRow.','.$Page->listRows) -> select();	   
	   $this -> assign('rslist',$rs);
	   $this->assign('pagination',$pagination);	 
	     
	   //$this -> display();
	   $this -> cate();
    }
	public function addgoods(){
	   $this -> assign('datetime',date('Y-m-d H:00:00'));
	   $this -> cate();
	}
	public function insgoods(){
	   $data = I('post.');
	   $data['content'] = I('post.content','',false);
	   $Model = M('goods_cate');
	   $data['catename'] = $Model -> where('id='.$data['cateid']) -> getField('catename');
	   //$data['catename'] = $rs['catename'];
	   
	   //处理组图
	   
	      if(!empty($data['picarr'])){
		     $str = '';
		     $picarrcm = $data['picarrcm'];
		     foreach($picarrcm as $val){
		        $str .= '{skip}'.$val;
		     }
			 $data['picarrcm'] = $str;
			 $picarr = explode('|',$data['picarr']);
			 foreach($picarr as $i=>$v){
			    if($i>0){
				   $picstr .= '|'.str_replace('/Public/kindEditor/php/../../../','',$v);
				}
			 }
			 $data['picarr'] = $picstr;
		  }
	   
	   
	   //dump($data);
	   $Md = M('goods');
	   $isok = $Md -> add($data);
	   if($isok){
	      
	         $filepath = './UpLoadFile/lock/goods_'.$isok.'.txt';
			 $isok = file_put_contents ($filepath,0);
			 if($isok){
			    $this -> success("添加'".$data['title']."'至".$data['catename']."成功",U('/Goods/index'),5);
			 } 
	      
		  //$this -> success("添加'".$data['title']."'至".$data['catename']."成功",U('/Goods/index'),5);
	   }else{
	      $this -> error("添加'".$data['title']."'至".$data['catename']."失败",U('/Goods/index'),5);
	   }
	}
	public function editgoods($id){
	   
	   $Md = M('goods');
	   $rsmm = $Md -> where('id='.$id) -> find();
	   //组图处理
	   $picarrsm = $rsmm['picarrcm'];
	   $picarr = $rsmm['picarr'];
	   if(!empty($picarr)){
	      $pic = explode('|',$picarr);
		  $piccm = explode('{skip}',$picarrsm);
		  foreach($pic as $i => $p){
		     if($i>0){
				$vopic[$i]['pic'] = $pic[$i];
				$vopic[$i]['piccm'] = $piccm[$i];
				//$vopiccm[]['piccm'] = $piccm[$i];
			 }
		  }
		  //dump($vopic);
		  $this -> assign('vopiccm',$vopic);
	   }
	   $this -> assign('rs',$rsmm);
	   $this -> cate();
	   //$this -> display();
	}
	public function upgoods($id){
	   $data = I('post.');	
	   $data['content'] = I('post.content','',false); 
	   $Model = M('goods_cate');
	   $data['catename'] = $Model -> where('id='.$data['cateid']) -> getField('catename');
	   //$data['catename'] = $rs['catename'];
	   
	   //处理组图
	   
	      if(!empty($data['picarr'])){
		     $str = '';
		     $picarrcm = $data['picarrcm'];
		     foreach($picarrcm as $val){
		        $str .= '{skip}'.$val;
		     }
			 $data['picarrcm'] = $str;
			 $picarr = explode('|',$data['picarr']);
			 foreach($picarr as $i=>$v){
			    if($i>0){
				   $picstr .= '|'.str_replace('/Public/kindEditor/php/../../../','',$v);
				}
			 }
			 $data['picarr'] = $picstr;
		  }
	   
	   $filepath = './UpLoadFile/lock/goods_'.$id.'.txt';
	   file_put_contents ($filepath,0);
	   
	   //dump($data);
	   $Md = M('goods');
	   $isok = $Md -> where('id='.$id) -> save($data);
	   if($isok !== false){//如果未做任何更新，返回0
	      $this -> success("编辑 '".$data['title']."' 成功",U('/Goods/index'),5);
	   }else{
	      $this -> error("编辑 '".$data['title']."' 失败",U('/Goods/index'),5);
	   }
	   
	}
	
	/*
	  ## cate
	  ## 商品分类
	*/
	public function cate(){
       $rs = categorytree('goods_cate');
	   $this -> assign('list',$rs);
	   $this -> display();
    }
	public function addcate(){
       $this -> cate();
    }
	public function editcate($id){
       $catelis = categorytree('goods_cate');
	   $this -> assign('catelis',$catelis);
	   
	   $M = M('goods_cate');
	   $rs = $M -> where('id='.$id) -> find();
	   $this -> assign('rs',$rs);
	   $this -> display();
    }
	public function inscate(){
	   $data = I('post.');
	   $M = M('goods_cate');
	   $pid = $data['pid'];
	   if($pid == 0){
	      $data['level'] = 0;
	   }else{
	      $level = $M -> where('id='.$pid) -> getField('level');
		  $data['level'] = $level+1;
	   }
	   $isok = $M -> add($data);
	   //$ajaxres = array('type'=>'error','content'=>'新增分类失败，建议刷新重试','url'=>U('/Goods/addcate'));
	   if($isok){
	      $this -> set_ajaxres('ok','新增分类成功',U('/Goods/cate'));
	   }
	   $this -> ajaxReturn($this -> ajaxres);
	}
	public function upcate(){
	   $data = I('post.');
	   $id = $data['doid'];
	   unset($data['doid']);
	   $M = M('goods_cate');
	   $rs = $M -> where('id='.$id) -> find();
	   foreach($data as $key => $val){
	      if($rs[$key] == $val){
		     unset($data[$key]);
		  }
	   }
	   if(count($data)>0){
		   if(array_key_exists('pid',$data)){
			  $level = $M -> where('id='.$data['pid']) -> getField('level');
			  $data['level'] = $level+1;
		   }
		   $isok = $M -> where('id='.$id) -> save($data);
		   //$ajaxres = array('type'=>'error','content'=>'新增分类失败，建议刷新重试','url'=>U('/Goods/addcate'));
		   if($isok){
			  $this -> set_ajaxres('ok','编辑分类成功',U('/Goods/cate'));
		   }
	   }else{
	       $this -> set_ajaxres('ok','未作出任何修改',U('/Goods/cate'));
	   }
	   $this -> ajaxReturn($this -> ajaxres);
	}
	
	
	/*
	  ## delete
	  ## 删除信息
	*/	
	public function delete(){
	   $idarr = I('post.idarr');
	   $table = I('post.table');
	   $M = M($table);
	   if(is_array($idarr)){
	      foreach($idarr as $i => $q){
		     if($i > 0){
			    $p .= ",";
			 }
			 $p .= $q;
		  }
		  $idarr = $p;
	   }
	   $isok = $M -> where("id in(".$idarr.")") -> delete();
	   if($isok){
	      $this -> set_ajaxres('ok','删除成功','');
	   }
	   $this -> ajaxReturn($this -> ajaxres);   
	}
	
	public function upordtype(){
	   $idarr = I('post.idarr');
	   $ordtype = I('post.ordtype');
	   
	   $M = M('goods');
	   if(is_array($idarr)){
	      foreach($idarr as $i => $q){
		     if($i > 0){
			    $p .= ",";
			 }
			 $p .= $q;
			 $stock = $M -> where('id='.$q) -> getField('stock');
			 $filepath = './UpLoadFile/lock/goods_'.$q.'.txt';
		     $contents = $stock;
		     file_put_contents ($filepath,0); 
		  }
		  $idarr = $p;
	   }else{
	      $stock = $M -> where('id='.$q) -> getField('stock');
		  $filepath = './UpLoadFile/lock/goods_'.$idarr.'.txt';
		  $contents = $stock;
		  file_put_contents ($filepath,0);
	   }
	   $data['ordtype'] = $ordtype;
	   $isok = $M -> where("id in(".$idarr.")") -> save($data);
	   if($isok !== false){
	      $this -> set_ajaxres('ok','更新商品属性成功','');
	   }
	   $this -> ajaxReturn($this -> ajaxres);   
	}
	
	public function updateattr(){
	   $type = I('get.type');
	   $idarr = I('post.idarr');
	   $attrarr = I('post.attrarr');
	   $table = I('post.table');
	   if(empty($table)){
	      $table = 'content';
	   }
	   $data[$type] = 0;
	   //$do = explode();
	   $updateok = 1;
	   $Model = M($table);
	   foreach($idarr as $i=>$ids){
	      if($attrarr[$i] == 0){
		     $data[$type] = 1;
		  }
		  $isok = $Model -> where('id='.$ids) -> save($data);
		  if($isok === false){
		     $updateok = 0;
		  }
	   }
	   if($updateok){
	      $this -> set_ajaxres('ok','更新成功','');
	   }
	   $this -> ajaxReturn($this -> ajaxres);
	   
	}
}