<?php
namespace Admin\Controller;
use Think\Controller;
class CommonController extends Controller {
    
	//protected $UserInfo;
	
	
	private $ajaxres;	
	public function _initialize(){
	   //登录状态验证
	   if(!CheckSession()){
	      Redirect(U("/Login"));
	   }
	   $navbar = $this -> ControlNav();
	   $this -> assign('navbar',$navbar);
	   //会员信息
	   $UserInfo = session('UserInfo');
	   //dump($this -> UserInfo);
	   $this -> assign('userinfo',$UserInfo);
	   //弹窗内容
	   $this -> _init();	   
	}
	
	public function _init(){
	   //do nothing
	   $this -> ajaxres = array(
	      'type' => 'error',
		  'msg' => '操作失败',
		  'url' => ''
	   );
	}
	
	
	/*
	  ## GetSonArr
	  ## @param int $id 父类ID
	  ## @return string $str 子类ID序列字符串
	*/
	public function GetSonArr($id,$tp=0){
	   static $idarr;
	   if($tp == 0){
	      $idarr = "";
		  $tp++;
	   }
	   $Cate = M('category');
	   $rs = $Cate -> field('id') -> where('pid='.$id) -> select();
	   if($rs){
	      foreach($rs as $i => $q){
		     $idarr .= $q['id'].',';
			 $this -> GetSonArr($q['id'],$tp);
		  }
	   }
	   $str = $idarr.$id;
	   return $str;
	}
	
	
	public function set_ajaxres($type,$content,$url){
	   $this -> ajaxres = array(
	      'type' => $type,
		  'msg' => $content,
		  'url' => $url
	   );
	}
	
	
	
	/*
	  ## ControlNav
	  ## 功能菜单
	*/
	public function ControlNav(){
	   $groupid = session('user.groupid');
	   $Model = M('admin_menu');
	   if($groupid != 1){
	      //非系统管理员
		  $pagelevel = getpagelevel($groupid);
	   }
	   //return $pagelevel;
	   $condition = '1=1';
	   if(!empty($pagelevel)){
		  //return $pagelevel; 
		  $condition .= " and id in(".$pagelevel.")";
	   }
	   $rs = $Model -> where($condition) -> order('pid asc,taxis desc') -> select();
	   //序列化菜单
	   foreach($rs as $q){
		  if(empty($q['icon'])){
		     $icon = 'fa-circle-o';
		  }else{
		     $icon = $q['icon'];
		  }
		  $url = U('/'.$q['role']);
		  $menu[$q['id']] = array(
			 'id' => $q['id'],
			 'pid' => $q['pid'],
		     'name' => $q['name'],
			 'role' => $q['role'],
			 'icon' => $icon,
			 'isc' => $q['isc'],
			 'url' => $url
		  );
		  //$m[$q['id']] = $q;
	   }	   
	   //print_r($menu);
	   $ret = array();
	   foreach($menu as $q){
		  if(isset($menu[$q['pid']])){
	         $menu[$q['pid']]['submenu'][] = &$menu[$q['id']];
		  }else{
		     $ret[] = &$menu[$q['id']];
		  }
	   }
	   return $ret;
	}
	
	
	public function GPSon($id,$idarr){
	   static $res;
	   $M = M('category');	
	   $condition = "pid=".$id;  
	   if(!empty($idarr)){
	      $condition .= " and id in(".$idarr.")";
	   }
	   $rs = $M -> field('id,pid,catename,level') -> where($condition) -> select();
	   if($rs){
	      foreach($rs as $q){
		     $res[] = $q;
		     $this -> GPSon($q['id'],$idarr);
		  }
	   }
	   //return $res;
	   //$res[] = $id;
	   return $this -> indexGPSon($res);
	}
	
	public function indexGPSon($res){
	   foreach($res as $q){
	      $cate_sort[$q['level']][$q['pid']][$q['id']] = $q;
	   }	   	   
	   $ret = array();
       foreach($cate_sort as $level=>$sort_fid){            
			foreach ($sort_fid as $fid => $childs) {                
				if ($fid == 0) {
                    $ret = $ret + $childs;
                } else {
                    $ret = insert_after($ret, $fid, $childs);
                }
            }
       }
	   return $ret;
	}
	
	
	public function GetTopId($id){
	   static $pid;
	   $Model = M('Category');
	   $rs = $Model -> field('id,pid') -> where('id='.$id) -> find();
	   if($rs){
	      if($rs['pid'] != 0){
		     $this -> GetTopId($rs['pid']);
		  }else{
		     $pid = $rs['id'];
		  }
	   }
	   return (int)$pid;  
	}
	
	/**
	  ## delrs
	  ## ……
	**/
	public function delrs(){
	   $idarr = I('post.idarr');
	   $table = I('post.table');
	   if(empty($table)){
	      $this -> set_ajaxres('error','未指定删除表','');
		  $this -> ajaxReturn($this -> ajaxres);
		  die();
	   }
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
}