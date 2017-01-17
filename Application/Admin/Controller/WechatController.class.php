<?php
namespace Admin\Controller;
use Think\Controller;
class WechatController extends CommonController {	
	protected $Wechat;
	
	public function _init(){
	   $options = C('WXCONF');
	   $this -> Wechat = new \Weixin\Rep\Wechat($options);
	}
	
	public function updateconfig(){
	   $data = I('post.');
	   //dump($data);
	   $output = "<?php \n return array(\n";
	   $output .= "'WXCONF' => array(\n";
	   foreach($data as $key=>$val){
		  $output .= "\n\t'" . $key . "'=>'" . $val . "',";
	   }
	   $output .= "\n)\n);\n\n";
	   
	   $filepath = CONF_PATH.'config.wechat.php';
	   //echo $filepath;
	   $isok = file_put_contents ($filepath,$output);
	   if($isok !== 0){
	      //$this -> success('配置更新成功',U('/Role/siteconfig'));
		  $dors = array('type'=>'ok','msg'=>'配置更新成功');
	   }else{
	      $dors = array('type'=>'error','msg'=>'配置更新失败');
	   }
	   $this -> ajaxReturn($dors);
	}
	
	public function menu(){
	   $M = M('wechat_menu');
	   $rs = $M -> where('pid=0') -> select();
	   if($rs){
	      foreach($rs as $i => $q){
		     $rsmm = $M -> where('pid='.$q['id']) -> select();
			 if($rsmm){
			    $rs[$i]['subarr'] = $rsmm;
			 }
		  }
	   }
	   //dump($rs);
	   $this -> assign('menulis',$rs);
	   $this -> display();
	}
	
	public function menuedit($id){
	   $M = M('wechat_menu');
	   $rs = $M -> where('id='.$id) -> find();	   
	   $this -> assign('rsshow',$rs);
	   $this -> display();
	}
	
	public function menuadd(){
	   $this -> menu();
	}
	
	public function insmenu(){
	   $data = I('post.');
	   $M = M('wechat_menu');
	   $isok = $M -> add($data);
	   if($isok){
	      $dors = array('type'=>'ok','msg'=>'新增菜单成功','url'=>U('/Wechat/menu'));
	   }else{
	      $dors = array('type'=>'error','msg'=>'新增菜单失败','url'=>U('/Wechat/menu'));
	   }
	   $this -> ajaxReturn($dors);
	}
	
	public function upmenu(){
	   $data = I('post.');
	   $M = M('wechat_menu');
	   $isok = $M -> where('id='.$data['actid']) -> save($data);
	   if($isok !== false){
	      $dors = array('type'=>'ok','msg'=>'编辑菜单成功','url'=>U('/Wechat/menu'));
	   }else{
	      $dors = array('type'=>'error','msg'=>'编辑菜单失败','url'=>U('/Wechat/menu'));
	   }
	   $this -> ajaxReturn($dors);
	}
	
	public function delMenu(){
	   $id = I('get.id');
	   $M = M('wechat_menu');
	   $isok = $M -> where('id='.$id) -> delete();
	   if($isok){
	      $dors = array('type'=>'ok','msg'=>'删除菜单成功');
	   }
	   $this -> ajaxReturn($dors);
	}
	
	public function creatMenu(){
	   $WechatMenu = array('button' => array());
	   $M = M('wechat_menu');
	   $rs = $M -> where('pid=0') -> limit(0,3) -> select();
	   if($rs){
	      foreach($rs as $i => $q){
		     $rsmm = $M -> where('pid='.$q['id']) -> limit(0,6) -> select();
			 if($rsmm){
			    $sub[$i]['name'] = $q['name'];
				//$sub[$i]['sub_button'] = $q['name'];
				foreach($rsmm as $j => $kk){
				   $child[$j]['type'] = 'view';
				   $child[$j]['name'] = $kk['name'];
				   $child[$j]['url'] = $kk['url'];
				}
				$sub[$i]['sub_button'] = $child;
			 }else{
			    $sub[$i]['type'] = 'view';
			    $sub[$i]['name'] = $q['name'];
			    $sub[$i]['url'] = $q['url'];
			 }
		  }
	   }
	   $WechatMenu['button'] = $sub;
	   //print_r(json_encode($WechatMenu));
	   //dump($WechatMenu);
	   $result = $this -> Wechat -> createMenu($WechatMenu);
	   //dump($result);
	   if($result){
	     $dors = array('type'=>'ok','msg'=>'生成自定义菜单成功');
	   }else{
	      $dors = array('type'=>'error','msg'=>'生成自定义菜单失败');
	   }
	   $this -> ajaxReturn($dors);
	}
	
	
}