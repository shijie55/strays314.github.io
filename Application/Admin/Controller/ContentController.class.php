<?php
namespace Admin\Controller;
use Think\Controller;
class ContentController extends CommonController {
    
	public function setFocus($id){
	   $this -> assign('focusid',$id);
	   $M = M('category');
	   $plis = $M -> field('id,catename') -> where('pid=7') -> select();
	   $this -> assign('plis',$plis);
	}
	
	public function page(){       
	   $id = I('get.id');	   
	   $Model = M('category');
	   $rs = $Model -> field('id,pid,catename,shortcontent,content') -> where('id='.$id) -> find();
	   $this -> assign('rs',$rs);
	   $this -> setFocus($id);
	   $this -> display();
    }
	
	public function updatepage(){
	   $data = I('post.');
	   $data['content'] = I('post.content','',false);
	   $data['shortcontent'] = I('post.shortcontent','',false);
	   //$data['content'] = 'a';
	   //$content = I('post.content','',false);
	   //die($content);
	   //$data['config'] = str_replace('&quot;','');
	   $id = $data['doid'];
	   $Model = M('category');
	   $isok = $Model -> where('id='.$id) -> save($data);
	   if($isok !== false){
	      $this -> Redirect('/Content/page/id/'.$id); 
	   }
	}
	
	
	public function article(){
	   $id = I('get.id');	
	   $this -> setFocus($id);
	   $catelis = $this -> GPSon($id,session('user.catelev'));
	   $this -> assign('catelis',$catelis);  
	   $Model = M('content');
	   $parr = I('param.');
	   if($catelis){
	      if(!empty($parr['cateid']) and $parr['cateid'] != -1){
		      $condition = "cateid=".$parr['cateid'];
		  }else{
			  foreach($catelis as $q){
				 $idarr = $q['id'].',';
			  }
			  $idarr.=$id;		  
			  $condition = "cateid in(".$idarr.")";
		  }
	   }else{
	      $condition = "1=1 and cateid=".$id;
	   }
	   //dump($catelis);
	   $maps = array();
	   //dump($parr);
	   foreach($parr as $key=>$val){
	      if($val != ""){
		     if($key == 'title'){
			    $condition .= " and ".$key." like '%".urldecode($val)."%'";
			 }else if($key == 'isgood' || $key == 'isfocus' ){
			    if($val != -1){
				   $condition .= " and ".$key."=".$val;
				}
			 }
			 $maps[$key] = urldecode($val);
		  }
	   }
	   //dump($condition);
	   $count = $Model -> where($condition) -> count();
	   $Page = new \Think\Page($count,20);
	   foreach($maps as $key=>$val) {
	      $Page->parameter[$key] = urlencode($val);
	   }
	   $Page->setConfig('prev','上一页');
	   $Page->setConfig('next','下一页');
	   $pagination = $Page->show();
	   $rs = $Model -> field('id,title,catename,taxis,addtime,isgood,isfocus') -> where($condition) -> order('isgood desc,isfocus desc,taxis desc,id desc') -> limit($Page->firstRow.','.$Page->listRows) -> select();	   
	   $this -> assign('rslist',$rs);
	   $this->assign('pagination',$pagination);
	   //dump($rs);
	   $this -> display();
    }
	
	
	/*  addarticle 
	 ## 添加文章
	 ## @param $GET[pid,id]
	 ## @return [ display ]
	*/
	public function addarticle(){
	   $id = I('get.id');
	   $this -> setFocus($id);
	   $catelis = $this -> GPSon($id,session('user.catelev'));
	   $this -> assign('catelis',$catelis);
	   //查询类别是否存在子类
	   //dump(ischildren($id));	   
	   $addtime = date('Y-m-d H:i:s',time());	   
	   $this -> assign('addtime',$addtime);
	   $this -> display();
	}
	
	
	/*  editarticle 
	 ## 编辑文章
	 ## @param $GET[pid,id]
	 ## @return [ display ]
	*/
	public function editarticle(){
	   $doid = I('get.doid');
	   $id = I('get.id');
	   
	   if(empty($doid)){
	      $this -> error('操作错误：参数传递不完整，无法请求数据',U('/Index'),5);
	   }
	   
	   $this -> setFocus($id);
	   $catelis = $this -> GPSon($id,session('user.catelev'));
	   $this -> assign('catelis',$catelis);
	   
	   $Md = M('content');
	   $rsmm = $Md -> where('id='.$doid) -> find();
	   //组图处理
	   $picarrsm = $rsmm['picarrcm'];
	   $picarr = $rsmm['picarr'];
	   if(!empty($picarr)){
	      $pic = explode('|',$picarr);
		  $piccm = explode('{skip}',$picarrsm);
		  foreach($pic as $i => $p){
		     if($i>0){
				$vopic[$i]['pic'] = $pic[$i];
				$vopic[$i]['piccm'] = $piccm[$i];
				//$vopiccm[]['piccm'] = $piccm[$i];
			 }
		  }
		  //dump($vopic);
		  $this -> assign('vopiccm',$vopic);
	   }
	   $this -> assign('rs',$rsmm);
	   $this -> display();
	}
	
	
	
	/*  insert 
	 ## 写入数据
	 ## @return [ url ]
	*/
	public function insarticle(){
	   $data = I('post.');
	   $data['content'] = I('post.content','',false);
	   $data['shortcontent'] = I('post.shortcontent','',false);
	   
	   $Model = M('category');
	   $data['catename'] = $Model -> where('id='.$data['cateid']) -> getField('catename');   
	   
	   if(!empty($data['content']) and empty($data['shortcontent'])){
	      $data['shortcontent'] = chinesesubstr(SpHtml2Text($data['content']),0,400);
	   }
	   
	   $sid = $data['sid'];
	   if($sid > 0){
	      $data['thepla'] = $Model -> where('id='.$sid) -> getField('catename');
	   }
	   
	   if(empty($data['thebeg'])){
	      unset($data['thebeg']);
	   }
	   if(empty($data['theed'])){
	      unset($data['theed']);
	   }
	   
	   if(!empty($data['picarr'])){
		     $str = '';
		     $picarrcm = $data['picarrcm'];
		     foreach($picarrcm as $val){
		        $str .= '{skip}'.$val;
		     }
			 $data['picarrcm'] = $str;
			 $picarr = explode('|',$data['picarr']);
			 foreach($picarr as $i=>$v){
			    if($i>0){
				   $picstr .= '|'.str_replace('/Public/kindEditor/php/../../../','',$v);
				}
			 }
			 $data['picarr'] = $picstr;
	   }
	    
	   //dump($data);
	   $Md = M('content');
	   $isok = $Md -> add($data);
	   $backurl = U('/Content/article',array('id'=>$data['bkid']));	   
	   if($isok){
	      $this -> success("添加'".$data['title']."'至".$data['catename']."成功",$backurl,5);
	   }else{
	      $this -> error("添加'".$data['title']."'至".$data['catename']."失败",$backurl,5);
	   }
	   
	}
	
	/*  insert 
	 ## 写入数据
	 ## @return [ url ]
	*/
	public function update(){
	   $data = I('post.');	
	   $data['content'] = I('post.content','',false);
	   $data['shortcontent'] = I('post.shortcontent','',false);   
	   
	   $Model = M('category');
	   $data['catename'] = $Model -> where('id='.$data['cateid']) -> getField('catename');
	  
	   if(!empty($data['content']) and empty($data['shortcontent'])){
	      $data['shortcontent'] = chinesesubstr(SpHtml2Text($data['content']),0,400);
	   }
	   
	   $sid = $data['sid'];
	   if($sid > 0){
	      $data['thepla'] = $Model -> where('id='.$sid) -> getField('catename');
	   }
	   
	   if(empty($data['thebeg'])){
	      unset($data['thebeg']);
	   }
	   if(empty($data['theed'])){
	      unset($data['theed']);
	   }
	   
	   //处理组图
	   
	      if(!empty($data['picarr'])){
		     $str = '';
		     $picarrcm = $data['picarrcm'];
		     foreach($picarrcm as $val){
		        $str .= '{skip}'.$val;
		     }
			 $data['picarrcm'] = $str;
			 $picarr = explode('|',$data['picarr']);
			 foreach($picarr as $i=>$v){
			    if($i>0){
				   $picstr .= '|'.str_replace('/Public/kindEditor/php/../../../','',$v);
				}
			 }
			 $data['picarr'] = $picstr;
		  }
	   
	   //dump($data);
	   $Md = M('content');
	   $isok = $Md -> where('id='.$data['doid']) -> save($data);
	   $backurl = U('/Content/article',array('id'=>$data['bkid']));
	   if($isok !== false){//如果未做任何更新，返回0
	      $this -> success("编辑 '".$data['title']."' 成功",$backurl,5);
	   }else{
	      $this -> error("编辑 '".$data['title']."' 失败",$backurl,5);
	   }
	   
	}
	
	
	/*  updateattr 
	 ## 文章属性更新
	 ## @param [$type,操作属性],[$idarr,操作的ID数组],[$attrarr,操作属性数组]
	 ## @return $output [json]
	*/
	public function updateattr(){
	   $type = I('get.type');
	   $idarr = I('post.idarr');
	   $attrarr = I('post.attrarr');
	   $data[$type] = 0;
	   //$do = explode();
	   $updateok = 1;
	   $Model = M('content');
	   foreach($idarr as $i=>$ids){
	      if($attrarr[$i] == 0){
		     $data[$type] = 1;
		  }
		  $isok = $Model -> where('id='.$ids) -> save($data);
		  if($isok === false){
		     $updateok = 0;
		  }
	   }
	   if($updateok == 0){
		  $output = array('type'=>'error','content'=>'更新失败','url'=>''); 
	   }else{
	      $output = array('type'=>'ok','content'=>'更新成功','url'=>'');
	   }
	   echo json_encode($output);
	}
	
	/*  delete 
	 ## 批量删除文章
	 ## @param [$idarr,操作的ID数组]
	 ## @return $output [json]
	*/
	public function delete(){
	   
	   $idarr = I('post.idarr');	   
	   $Model = M('content');
	   foreach($idarr as $ids){	      
		  $isok = $Model -> where('id='.$ids) -> delete();		  
	   }
	   if($isok !== false){
	      $output = array('type'=>'ok','content'=>'删除成功','url'=>''); 		   
	   }else{
	      $output = array('type'=>'error','content'=>'删除失败','url'=>'');  
	   }
	   echo json_encode($output);
	   
	}
}