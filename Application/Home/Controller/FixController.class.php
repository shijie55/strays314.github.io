<?php
namespace Home\Controller;
use Think\Controller;

class FixController extends CommonController
{
    public function index()
    {
        $data['tel'] = I('post.tel');
        $data['address'] = I('post.address');
        $data['problem'] = I('post.problem');
        $data['class'] = I('post.class');
        $fix = M('Fix');
        $res = $fix -> add($data);
        if ($res) {
            $this -> ajaxReturn('ok');
        } else {
            $this -> ajaxReturn('failed');
        }
    }
}