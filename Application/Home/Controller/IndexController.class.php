<?php
namespace Home\Controller;
use Think\Controller;

class IndexController extends CommonController 
{
   public function index()
   {
   		$category = M('Category');
   		$content = M('Content');
   		$carousel = M('Carousel');
   		// 首页banner
   		$cars = $carousel -> where('groupid=3') -> find();
   		$this -> assign('cars', $cars);
   		
   		// 业主信箱
   		$discuss = M('Discuss');
	   	$mail = $discuss -> order('id asc') -> limit(5) -> select();
	   	$mailname = $category -> where('id=65') -> field('catename') -> find();
	   	$this -> assign('mailname', $mailname);
	   	$this -> assign('mails', $mail);
//		 dump($mail);die();
   		// 业委会动态
   		$insLink = U('Article/index','id=56');
   		$insName = $content -> where('cateid=56') -> order('taxis asc') -> select();
   		foreach ($insName as $key => $value) {
   			$insName[$key]['links'] = U('Show/index','id='.$value['id']);
   		}
   		// dump($insName);
   		$this -> assign('insLink', $insLink);
   		$this -> assign('insName', $insName);
   		// 工作简讯
   		$workName = $content -> where('cateid=71') -> order('taxis asc') -> select();
   		foreach ($workName as $key => $value) {
   			$workName[$key]['links'] = U('Show/index','id='.$value['id']);
   		}
   		$this -> assign('workName', $workName);
   		// 通知公告
   		$pubName = $content -> where('cateid=70') -> order('taxis asc') -> select();
   		foreach ($pubName as $key => $value) {
   			$pubName[$key]['links'] = U('Show/index','id='.$value['id']);
   		}
   		$this -> assign('pubName', $pubName);
   		// 物业服务
   		$proSelfName = $category -> where('id=44') -> field('catename, englishname') -> find();
   		$proName = $category -> where('pid=44') -> order('taxis asc') -> select();
   		foreach ($proName as $key => $value) {
   			$proName[$key]['links'] = U('Page/index','id='.$value['id']);
   		}
   		// dump($proName);die();
   		$this -> assign('proSelfName', $proSelfName);
   		$this -> assign('proName', $proName);
   		// 员工风采
   		$staffSelfName = $category -> where('id=63') -> field('catename, englishname') -> find();
   		$staffName = $content -> where('cateid=63') -> order('taxis asc') -> select();
   		foreach ($staffName as $key => $value) {
   			$staffName[$key]['links'] = U('Show/index','id='.$value['id']);
   		}
   		$this -> assign('staffSelfName', $staffSelfName);
   		$this -> assign('staffName', $staffName);
   		$this -> display();
   }
}