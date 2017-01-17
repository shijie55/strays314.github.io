<?php 

	/*  MakeCateArr   
	 ## 将数组重新生成为菜单
	 ## @return $rets [array]
    */
	function MakeCateArr($arr){
	   $ret = array();
	   foreach($arr as $i => $k){
	      $ret[$k['id']]['catename'] = $k['catename'];
		  $ret[$k['id']]['id'] = $k['id'];
		  $ret[$k['id']]['pid'] = $k['pid'];
		  $links = SetCateLink($k['id']);
		  $ret[$k['id']]['links'] = $links;
		  $ret[$k['id']]['shortcontent'] = $k['shortcontent'];
		  //$tags = explode('|',$k['title']);
		  //$ret[$k['id']]['tags'] = $tags;		  
		  $ret[$k['id']]['defaultpic'] = $k['defaultpic'];
		  $ret[$k['id']]['content'] = $k['content'];
	   }
	   
	   $rets = array();
	   foreach($ret as $q){
		  if(isset($ret[$q['pid']])){
	         $ret[$q['pid']]['submenu'][] = &$ret[$q['id']];
		  }else{
		     $rets[] = &$ret[$q['id']];
		  }
	   }
	   
	   return $rets;
	}
	
	/*
   ## SetCateLink
   ## 栏目链接
   ## @param int $id 栏目ID
   ## @return $linkstr string
   */
   function SetCateLink($id){
      $linkstr = '';
	  $Model = M('Category');
	  $rs = $Model -> field('id,pid,model,links') -> where('id='.$id) -> find();
	  if($rs){
	     if($rs['links'] == 'http://'){
		    switch($rs['model']){
			   case 0:
			     $url = U('/Page/index',array('id'=>$rs['id']));
			     break;
			   case 1:
			     $url = U('/Article/index',array('id'=>$rs['id']));
			     break;
			}
			$linkstr = $url;
		 }else{
		    $linkstr = $rs['links'];
		 } 
	  }
	  return $linkstr;
   }




 ?>