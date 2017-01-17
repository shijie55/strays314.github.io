<?php
namespace Home\Controller;
use Think\Controller;
class PageController extends CommonController 
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
        // dump($id);
    	// 获取界面banner图
    	$banner = $this -> SetBanner($id);
    	$this -> assign('banner', $banner);
        // 获取界面信息
    	$info = $this -> getInfo($id);
    	$this -> assign('info', $info);
        // 获取帖子
        $discuss = $this -> getDis();
        $this -> assign('discuss', $discuss);
        /*dump($discuss);
        die();*/
    	$this -> display('Page/'.$temp);
    }
	
	public  function  getDis()
    {
        $model = M('Discuss');
        $discuss = $model -> select();
        return $discuss;
    }
	
}