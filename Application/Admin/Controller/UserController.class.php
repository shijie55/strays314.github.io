<?php
namespace Admin\Controller;
use Think\Controller;
class UserController extends CommonController {
	
    public function index(){
	   $parr = I('param.');	   
	   $condition = "1=1";
	   $maps = array();
	   //dump($parr);
	   foreach($parr as $key=>$val){
	      if($val != ""){
		     if($key == 'nickname'){
			    $condition .= " AND (";
				//$condition .= " and ".$key." like '%".urldecode($val)."%'";
				$str = nickname($val);
				$str = str_replace("\"","",$str);
				$strarr = explode("\\",$str);
				foreach($strarr as $i => $q){
				   if(!empty($q)){
				      if($i > 1){
					     $condition .= " OR ";
					  }
					  $condition .= " nickname like '%".$q."%'";
				   }
				}
				$condition .= ")";
			 }
			 $maps[$key] = urldecode($val);
		  }
	   }
	   //会员列表
	   $Model = M('user');
	   $count = $Model -> where($condition) -> count();
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
	   $rs = $Model -> limit($Page->firstRow.','.$Page->listRows) -> where($condition) -> order('score desc,id desc') -> select();
	   
	   $this -> assign('listarr',$rs);
	   $this -> assign('showpage',$showpage);
	   $this->assign('pagination',$show);
	   
	   
	   $this -> display();
	}
	
	public function tx(){
	   $str = "\u672b\u5b50";
	   $str = explode("\\",$str);
	   dump($str);
	}
	
	public function score(){
	   $id = I('get.id');
	   $M = M('score');
	   $rs = $M -> field('a.*,b.order_num,c.nickname') -> join(' as a LEFT JOIN __ORDER__ as b ON a.oid=b.id') -> join('LEFT JOIN __USER__ as c ON a.uid=c.id') -> where('a.uid='.$id) -> select();
	   if($rs){
		  $Htm .= "<div class='table-responsive'><table class='table table-striped table-bordered table-hover'><tbody>";
		  foreach($rs as $q){
		     switch($q['type']){
			    case 0:
				$tpname = '系统';
				$unlock = '<small>管理员手动操作</small>';
				break;
				case 1:
				$tpname = '消费';
				$unlock = '订单：'.$q['order_num'];
				break;
				case 2:
				$tpname = '推荐';
				$unlock = '用户：'.emnick($q['nickname']);
				break;
				default:
				$tpname = '其它';
				$unlock = '<small>-</small>';
			 }
			 $Htm .= "<tr><td class='text-muted text-center'>".$tpname."</td><td class='text-center'>".$q['numb']."</td><td class='text-muted'>".$unlock."</td><td class='text-center text-muted small'>".$q['addtime']."</td></tr>";
		  }
		  $Htm .= "</tbody></table></div></div>";
		  $ecstr = array('Htm' => $Htm);
	   }else{
	      $ecstr = array('Htm' => 'ept');
	   }
	   $this -> ajaxReturn($ecstr);
	}
}