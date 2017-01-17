<?php
namespace Home\Controller;
use Think\Controller;

class ShowController extends CommonController 
{
    public function index($id)
    {
    	if (empty($id)) {
    		$this -> redirect('Index/index');
    	}
    	$category = M('Category');
    	$content = M('Content');
    	// 获取界面模板
    	$parentCate = $content -> where('id='.$id) -> field('cateid') -> find();
    	$temp = $category -> where('id='.$parentCate['cateid']) -> field('contenttemp') -> find();
    	$temp = explode('.', $temp['contenttemp']);
    	$temp = $temp[0];
    	// 获取界面banner图,文章内容banner与父类一致
    	$banner = $this -> SetBanner($parentCate['cateid']);
    	$this -> assign('banner', $banner);
    	// 获取文章信息
    	$cont = $content -> where('id='.$id) -> find();
    	$this -> assign('cont', $cont);
    	$this -> display('Show/'.$temp);
    }
	
	
	
}