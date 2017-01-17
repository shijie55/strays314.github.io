<?php 
namespace Home\Controller;
use Think\Controller;

class DiscussController extends CommonController
{
	// 添加话题
	public function add()
	{
		$data['pname'] = I('post.pname');
		$data['content'] = I('post.content');
		$data['title'] = I('post.title');
		$data['uip'] = $this -> getIP();
		$data['addtime'] = date('Y-m-d H:i:s');
		$model = M('Discuss');
		$model -> add($data);
		$this -> ajaxReturn('ok');
	}

	// 获取用户ip地址
	public function getIP()
	{
		global $ip;
		if (getenv("HTTP_CLIENT_IP")) {
			$ip = getenv("HTTP_CLIENT_IP");
		} else if(getenv("HTTP_X_FORWARDED_FOR")) {
			$ip = getenv("HTTP_X_FORWARDED_FOR");
		} else if(getenv("REMOTE_ADDR")) {
			$ip = getenv("REMOTE_ADDR");
		} else {
			$ip = "Unknow";
		}
		return $ip;
	}

	// ajax返回话题讨论界面
	public function getDisInfo($id)
	{
		$id = I('post.id');
		$discuss = M('Discuss');
		$comment = M('Comment');
		$disInfo['local'] = $discuss -> where('id='.$id) -> find();
		$disInfo['coms'] = $comment -> where('pid='.$id) -> select();
		$str1 = '<div class="clearfix topic-act-box"><a href="javascript:void(0);" class="btn btn-grn btn-md">话题列表</a></div>';
		$str1 .= '<div class="clearfix topic-lis-box"><div class="item-item" style="background:#FAFAFA;">';
		$str1 .= '<div class="hidden tId">'.$disInfo['local']['id'].'</div>';
		$str1 .= '<a href="javascript:void(0);" class="t f-md-lg">'.$disInfo['local']['title'].'</a><div class="clearfix">';
		$str1 .= '<table><tr></tr><td><i class="ion f-md-lg">&#xe66e;</i></td>';
		$str1 .= '<td><small class="gray">'.$disInfo['local']['uip'].'</small></td><td class="pad-l-xs"><i class="ion f-md-lg">&#xe66c;</i></td>';
		$str1 .= '<td><small class="gray">'.$disInfo['local']['addtime'].'</small></td><td class="pad-l-xs"><i class="ion f-md-lg">&#xe66d;</i></td>';
		$str1 .= '<td><small class="gray">'.$disInfo['local']['pname'].'</small></td><td class="pad-l-xs"><i class="ion f-md-lg">&#xe66b;</i></td>';
		$str1 .= '<td><small class="gray">'.$disInfo['local']['dnum'].'</small></td></tr></table></div>';
		$str1 .= '<div class="clearfix pad-t-xs">'.$disInfo['local']['content'].'</div></div>';
		global $str2;
		foreach($disInfo['coms'] as $key => $val) {
			$str2 .= '<div class="item-item"><div class="clearfix"><table><tr>';
			$str2 .= '<td>#'.intval($key+1).'</td><td class="pad-l-xs"><i class="ion f-md-lg">&#xe66d;</i></td>';
			$str2 .= '<td><small class="gray">'.$val['uname'].'</small></td><td class="pad-l-xs"><i class="ion f-md-lg">&#xe66c;</i></td>';
			$str2 .= '<td><small class="gray">'.$val['addtime'].'</small></td></tr></table>';
			$str2 .= '<div class="clearfix">'.$val['content'].'</div></div></div>';
		}
		$str3 = '<div class="clearfix pad"></div></div><div class="clearfix topic-lis-box"><form role="form" class="pad-v">';
		$str3 .= '<div class="form-group"><label for="nickname">昵称</label><input type="text" class="form-control" id="nickname" placeholder="请输入昵称"></div>';
		$str3 .= '<div class="form-group"><label for="content">内容</label><textarea class="form-control" id="content" placeholder="请输入内容" rows="4"></textarea></div>';
		$str3 .= '<button type="button" class="btn btn-grn" onclick="reptopic()">回复话题</button></form></div><div class="page bg"><div></div></div>';
		$this -> ajaxReturn($str1.$str2.$str3);
	}

	// 添加评论
	public function addComment()
	{
		$tid = I('post.tid');
		$addtime = date('Y-m-d H:i:s');
		$data['pid'] = $tid;
		$data['uname'] = I('post.uname');
		$data['content'] = I('post.content');
		$data['addtime'] = $addtime;
		$comment = M('Comment');
		$discuss = M('Discuss');
		$res1 = $comment -> add($data);
		$res2 = $discuss -> where('id='.$tid) -> setInc('dnum',1);
		if (($res1)&&($res2)) {
			$this -> ajaxReturn('ok');
		} else {
			$this -> ajaxReturn('failed');
		}
	}
}

?>