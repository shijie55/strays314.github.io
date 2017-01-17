<?php
namespace Admin\Controller;
use Think\Controller;
class CouponController extends CommonController {
    
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
	   
	   //查询所有内容
	   $Model = M('Coupon');
	   $parr = I('param.');
	   
	   $condition = "1=1";
	   $maps = array();
	   //dump($parr);
	   foreach($parr as $key=>$val){
	      if($val != ""){
		     if($key == 'title'){
			    $condition .= " and ".$key." like '%".urldecode($val)."%'";
			 }else if($key == 'btime'){
			    $t = date('Y-m-d H:i:s',strtotime($val));
				$condition .= " and ".$key." < '".$t."'";
			 }else if($key == 'etime'){
			    $t = date('Y-m-d H:i:s',strtotime($val));
				$condition .= " and ".$key." > '".$t."'";
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
	   $rs = $Model -> where($condition) -> order('id desc') -> limit($Page->firstRow.','.$Page->listRows) -> select();	   
	   $this -> assign('rslist',$rs);
	   $this->assign('pagination',$pagination);	 
	   
	   $this -> display();
    }
	
	public function add(){
	   $this -> display();
	}
	
	public function inscoupon(){
	   $data = I('post.');
	   $Md = M('coupon');
	   $isok = $Md -> add($data);
	   if($isok){
	      $this -> set_ajaxres('ok','新增优惠券成功',U('/Coupon/index'));  
	   }
	   $this -> ajaxReturn($this -> ajaxres);
	}
	
	public function edit($id){
	   
	   $Md = M('coupon');
	   $rsmm = $Md -> where('id='.$id) -> find();	   
	   $this -> assign('rs',$rsmm);
	   $this -> display();
	   
	}
	public function upcoupon($id){
	   $data = I('post.');		   
	   $Md = M('coupon');
	   $isok = $Md -> where('id='.$id) -> save($data);
	   if($isok !== false){
	      $this -> set_ajaxres('ok','编辑优惠券成功',U('/Coupon/index'));  
	   }
	   $this -> ajaxReturn($this -> ajaxres);
	}
	
	
	/*
	  ## delete
	  ## 删除信息
	*/	
	public function delete(){
	   $idarr = I('post.idarr');
	   $M = M('coupon');
	   $ME = M('yhq_lis');
	   if(is_array($idarr)){
	      foreach($idarr as $i => $q){
		     if($i > 0){
			    $p .= ",";
			 }
			 $p .= $q;
		  }
		  $idarr = $p;
	   }
	   $M -> where("id in(".$idarr.")") -> delete();
	   $ME -> where("qid in(".$idarr.")") -> delete();
	   
	   $this -> set_ajaxres('ok','删除成功','');	   
	   $this -> ajaxReturn($this -> ajaxres);   
	}
	
}