<?php
namespace Admin\Controller;
use Think\Controller;
class OrderController extends CommonController {
    
	public function index(){
	   $Model = M('meet_ord');
	   $type = I('get.type');
	   if($type == ""){
	      $type = 1;
	   }
	   $this -> assign('ordtype',$type);
	   $parr = I('param.');
	   $condition = "ord_type=".$type;
	   $maps = array();
	   foreach($parr as $key=>$val){
	      if($val != "" && $key != 'p'){
		     if($key == 'sj'){
			    $condition .= " and ".$key." like '%".$val."%'";
			 }
			 $maps[$key] = urldecode($val);
		  }
	   }
	   $count = $Model -> where($condition) -> count();
	   //分页
	   $Page = new \Think\Page($count,15);
	   foreach($maps as $key=>$val) {
	      $Page->parameter[$key] = urlencode($val);
	   }
	   $Page->setConfig('prev','上一页');
	   $Page->setConfig('next','下一页');
	   $show = $Page->show();
	   $showpage = 0;
	   if($count > 15){
	      $showpage = 1;
	   }
	   //列表内容
	   $rs = $Model -> where($condition) -> limit($Page->firstRow.','.$Page->listRows) -> order('id desc') -> select();
	   //$ret = array();	   
	   //$list = $this -> getorderinfo($ret);
	   $this -> assign('list',$rs);
	   $this -> assign('showpage',$showpage);
	   $this -> assign('pagination',$show);
	   //dump($list);
	   $this -> display();
	}
	
	public function ordpla(){
	   $Model = M('place_ord');
	   $parr = I('param.');
	   $condition = "1=1";
	   $maps = array();
	   foreach($parr as $key=>$val){
	      if($val != "" && $key != 'p'){
		     if($key == 'sj'){
			    $condition .= " and ".$key." like '%".$val."%'";
			 }
			 $maps[$key] = urldecode($val);
		  }
	   }
	   $count = $Model -> where($condition) -> count();
	   //分页
	   $Page = new \Think\Page($count,15);
	   foreach($maps as $key=>$val) {
	      $Page->parameter[$key] = urlencode($val);
	   }
	   $Page->setConfig('prev','上一页');
	   $Page->setConfig('next','下一页');
	   $show = $Page->show();
	   $showpage = 0;
	   if($count > 15){
	      $showpage = 1;
	   }
	   //列表内容
	   $rs = $Model -> where($condition) -> limit($Page->firstRow.','.$Page->listRows) -> order('id desc') -> select();
	   //$ret = array();	   
	   //$list = $this -> getorderinfo($ret);
	   $this -> assign('list',$rs);
	   $this -> assign('showpage',$showpage);
	   $this -> assign('pagination',$show);
	   //dump($list);
	   $this -> display();
	}
	
	/*
	  ## orderinfo
	  ## 订单明细
	*/
	public function orderinfo(){
	   $id = I('get.id');
	   //订单基本信息
	   $Model = M('order');
	   //$U = M('user');
	   $rs = $Model -> field('a.*,b.nickname,b.face,c.result_code,c.err_code,c.err_code_des,c.bank_type,c.transaction_id,c.time_end') -> join(' as a LEFT JOIN __USER__ as b ON a.uid=b.id') -> join(' LEFT JOIN __ORDER_PAY__ as c ON a.order_num=c.order_num') -> where('a.id='.$id) -> find();
	   $this -> assign('ordermain',$rs);
	   $MG = M('order_goods');
	   $rslis = $MG -> where('order_id='.$id) -> select();
	   $this -> assign('goods',$rslis);
	   $this -> display();
	}
	
	public function goodslis(){
	   $id = I('get.id');
	   $tid = I('get.tid');
	   $Model = M('meet_ord');
	   
	   
	   $rs = $Model ->  where('id='.$id) -> find();
	   $ecstr = "<div class='row'>";
	   if($rs){
	      switch($tid){
		     case 1:
			 $ecstr .= "<div class='col-xs-12'><p>会议名称：".$rs['hymc']."</p><p>会议类别：".$rs['hylb']."</p><p>会议日期：".$rs['hyrq']."</p><p>布置日期：".$rs['bzrq']."</p></div>";
			 break;
			 case 0:
			 $ecstr .= "<div class='col-xs-12'><p>展会名称：".$rs['hymc']."</p><p>展会类别：".$rs['hylb']."</p><p>展会日期：".$rs['hyrq']."</p><p>布展日期：".$rs['bzrq']."</p></div>";
			 break;
			 case 2:
			 $ecstr .= "<div class='col-xs-12'><p>用途：".$rs['hymc']."</p><p>开始日期：".$rs['hyrq']."</p><p>结束日期：".$rs['bzrq']."</p></div>";
			 break;
			 case 3:
			 $ecstr .= "<div class='col-xs-12'><p>展会名称：".$rs['hymc']."</p><p>申办场地类别：".$rs['hylb']."</p><p>展会日期：".$rs['hyrq']."</p><p>布展日期：".$rs['bzrq']."</p></div>";
			 break;
		  }
		  $ecstr .= "<div class='col-xs-12'><p>场地面积：".$rs['cdmj']."</p><p>公司名称：".$rs['gsmc']."</p><p>公司地址：".$rs['gsdz']."</p><p>联系人：".$rs['lxr']."</p><p>电话：".$rs['dh']."</p><p>传真：".$rs['cz']."</p><p>电子邮箱：".$rs['yx']."</p><p>备注：".$rs['mak']."</p><p>手机：".$rs['sj']."</p></div>";
	   }  
	   $ecstr .= "</div>";
	   $result = array('Htm'=>$ecstr);	   
	   $this -> ajaxReturn($result);
	}
	
	public function plainfo(){
	   $id = I('get.id');
	   $Model = M('place_ord');
	   
	   
	   $rs = $Model ->  where('id='.$id) -> find();
	   $ecstr = "<div class='row'>";
	   if($rs){	      
		  $ecstr .= "<div class='col-xs-12'><p>展会服务：".$rs['zhfw']."</p><p>公司名称：".$rs['gsmc']."</p><p>展会日期：".$rs['zhrq']."</p><p>申报日期：".$rs['sbrq']."</p><p>场地名称：".$rs['cgmc']."</p><p>展厅编号：".$rs['ztbh']."</p><p>预计面积：".$rs['yjmj']."</p><p>招展服务：".$rs['zsfw']."</p><p>附件：<img src='".$rs['docsrc']."' width='300' /></p></div>";
	   }  
	   $ecstr .= "</div>";
	   $result = array('Htm'=>$ecstr);	   
	   $this -> ajaxReturn($result);
	}
	
	/*  deleteall 
	 ## 批量删除订单
	 ## @param [$idarr,操作的ID数组]
	 ## @return $output [json]
	*/
	public function delete(){
	   
	   $idarr = I('post.idarr');	   
	   $Model = M('meet_ord');
	   //$Ord = M('order_goods');
	   if(is_array($idarr)){
	      foreach($idarr as $i => $q){
		     if($i > 0){
			    $p .= ",";
			 }
			 $p .= $q;
		  }
		  $idarr = $p;
	   }
	   $isok = $Model -> where("id in(".$idarr.")") -> delete();	  
	  	   
	   $msg = array('type'=>'ok','msg'=>'订单删除成功');
	   $this -> ajaxReturn($msg);
	   
	}
	
	public function deletepla(){
	   
	   $idarr = I('post.idarr');	   
	   $Model = M('place_ord');
	   //$Ord = M('order_goods');
	   if(is_array($idarr)){
	      foreach($idarr as $i => $q){
		     if($i > 0){
			    $p .= ",";
			 }
			 $p .= $q;
		  }
		  $idarr = $p;
	   }
	   $isok = $Model -> where("id in(".$idarr.")") -> delete();	  
	  	   
	   $msg = array('type'=>'ok','msg'=>'订单删除成功');
	   $this -> ajaxReturn($msg);
	   
	}
	
	/*
	  ## updateordersate
	  ## 更新订单状态
	*/
	public function updateordersate($id){
	   $state = I('post.state');
	   $msg = array('type'=>'error','msg'=>'更新订单状态错误');
	   $Model = M('order');
	   //$Model -> state = $state;
	   $lasttime = date('Y-m-d H:i:s');
	   $data['state'] = $state;
	   $data['lasttime'] = $lasttime;
	   
	   $isok = $Model -> where('id='.$id) -> save($data);
	   
	   if($isok !== false){
	      //更新成功
		  $msg = array('type'=>'ok','msg'=>'更新订单状态成功');
	   }
	   $this -> ajaxReturn($msg);
	}
	
	public function unlock($id){
	   //$state = I('post.state');
	   $msg = array('type'=>'error','msg'=>'更新订单状态错误');
	   $Model = M('meet_order');
	   //$Model -> state = $state;
	   //$lasttime = date('Y-m-d H:i:s');
	   $data['islock'] = 1;
	   
	   $isok = $Model -> where('id='.$id) -> save($data);
	   
	   if($isok !== false){
	      //更新成功
		  $msg = array('type'=>'ok','msg'=>'更新订单状态成功');
	   }
	   $this -> ajaxReturn($msg);
	}
	
	/*
	  ## fileback
	  ## 清空资料
	*/
	public function fileback(){
	   $id = I('get.id');
	   $Ord = M('order');
	   $Ordlist = M('order_list');
	   $Ordlist -> docsrc = '';
	   $Ordlist -> where('id='.$id) -> save();
	   
	   $oid = $Ordlist -> where('id='.$id) -> getField('order_id');
	   $Ord -> state = 2;
	   $Ord -> where('id='.$oid) -> save();
	   
	   $msg = array('type'=>'ok','msg'=>'资料退回成功');
	   $this -> ajaxReturn($msg);
	}
	
	/*
	  ## updateorderstate_arr
	  ## 批量更新订单状态
	*/
	public function updateorderstate_arr(){
	   $idarr = I('post.idarr');
	   $state = I('post.state');
	   $needstate = 0;
	   switch($state){
	      case 2:
		     $needstate = 1;
			 break;
		  case 4:
		     $needstate = 3;
			 break;
	   }	   
	   $Model = M('order');
	   $beupdate = true;
	   foreach($idarr as $ids){	      
		  //遍历查询选中订单需求	  
		  $rsstate = $Model -> field('state') -> where('id='.$ids) -> find();
		  if($rsstate['state'] != $needstate){
		     $beupdate = false;
		  }
	   }
	   if($beupdate){
	      //更新
		  foreach($idarr as $ids){
		     $Model -> state = $state;
			 $Model -> where('id='.$ids) -> save();
		  }
		  $msg = array('type'=>'ok','msg'=>'订单状态更新成功');
	   }else{
	      $msg = array('type'=>'error','msg'=>'当前选择订单中，有不满足条件的订单');   
	   }
	   
	   $this -> ajaxReturn($msg);
	}
	
	/*
	  ## getregionbydist
	  ## 递归地址
	*/
	public function getregionbydist($region_id,$p=0){
	   static $area;
	   $Model = M('region');
	   $rs = $Model -> where('region_id='.$region_id) -> find();
	   if($rs){
	      if($p==0){
		     $p++;
			 $area = $rs['region_name'];
		  }else{
		     $area = $rs['region_name'].' '.$area;
		  }
		  if($rs['parent_id'] != 0){
		     $this -> getregionbydist($rs['parent_id'],$p);
		  }
	   }
	   return $area;
	}
	
}