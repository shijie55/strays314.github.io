<?php
namespace Home\Controller;
use Think\Controller;

class ArticleController extends CommonController 
{
	public function index($id)
	{
		if (empty($id)) {
    		$this -> redirect('Index/index');
    	}
	    // 获取界面模板
	    $temp = $this -> getTpl($id);
	    // 本身不存在模板则从子类的第一个找
	    if (empty($temp)) {
	        $category = M('Category');
	        $sid = $category -> where('pid='.$id) -> field('id') -> find();
	        $id = $sid['id'];
	        $temp = $this -> getTpl($id);
	    }
		// 获取界面banner图
		$banner = $this -> SetBanner($id);
		$this -> assign('banner', $banner);
		// 获取本页涵盖文章的简介内容
		$content = M('Content');
		$conts = $content -> where('cateid='.$id) -> select();
		foreach ($conts as $key => $val) {
			$conts[$key]['links'] = U('Show/index','id='.$val['id']);
		}
		$this -> assign('conts', $conts);
		// dump($conts);die();
		$this -> display('Article/'.$temp);
	}

	public function getHit()
	{
		$id = I('get.id');
		$content = M('Content');
		$hits = $content -> where('id='.$id) -> setInc('hits',1);
		echo "success";
	}
    
}