<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2014 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
namespace Think\Template\TagLib;
use Think\Template\TagLib;
/**
 * Html标签库驱动
 */
class Jwcms extends TagLib{
    // 标签定义
    protected $tags   =  array(
        // 标签定义： attr 属性列表 close 是否闭合（0 或者1 默认1） alias 标签别名 level 嵌套层次
        'list' => array('attr'=>'id,focus,table,limit,field,where,order,key,item,index','close'=>1),
		'cate' => array('attr'=>'id,limit,isnav,fid,field,where,order,key,item,index','close'=>1),
		'cateinfo' => array('attr'=>'id,field','close'=>1)
    );
	
	public function _list($tag,$content){
	   
	   $tb = isset($tag['table'])?$tag['table']:'content';
	   $lim = isset($tag['limit'])?$tag['limit']:'0,10';
	   if(!strpos($lim,',')){
	      $lim = "0,".$lim;
	   }
	   $ord = isset($tag['order'])?$tag['order']:'taxis desc,id desc';
	   $where = isset($tag['where'])?$tag['where']:'';
	   $field = "id,title,defaultpic,tags,cateid,catename,links";
	   $fields = isset($tag['field'])?$tag['field']:'';
	   if(!empty($fields)){
	      $field .= ",".$fields;
	   }
	   $id = isset($tag['id'])?$tag['id']:'';
	   $focus = isset($tag['focus']) ? $this->autoBuildVar($tag['focus']) : '';
	   $key = isset($tag['key'])?$tag['key']:'i';
	   $item = isset($tag['item'])?$tag['item']:'rs';
	   $index = isset($tag['index'])?$tag['index']:'0';
	   $condition = "1=1";
	   $idarr = "";
	   if(!empty($id)){
	      $A = A("Common");
		  $idarr = $A -> GetSonArr($id);
		  //dump($idarr);
		  $condition .= " and cateid in(".$idarr.")";
	   }
	   if(!empty($where)){
	      $condition .= " and ".$where;
	   }
	   $str = '<?php
		  $cond = "'.$condition.'";		  
		  $foc = "'.$focus.'";
		  $ida = "'.$idarr.'";
		  if(!empty($foc)&&empty($ida)){
		     $A = A("Common");
			 $idarr = $A -> GetSonArr("$foc");
			 //die("$idarr");
			 $cond .= " and cateid in(".$idarr.")";
		  }
		  $table =  M("'.$tb.'");
		  $rs = $table -> field("'.$field.'") -> where("$cond") -> limit("'.$lim.'") -> order("'.$ord.'") -> select();
		  $ret = array();
		  $'.$key.' = '.$index.';
		  foreach($rs as $i => $q){
		     $ret[$i] = $q;
			 if(empty($q["links"])){
			    $ret[$i]["links"] = U("/Show/index",array("id"=>$q["id"]));
			 }else{
			    $ret[$i]["links"] = $q["links"];
			 }
		  }		  
		  foreach($ret as $k=>$'.$item.'):
		  $'.$key.'++;
	   ?>';
	   $str .= $content;
	   $str .= "<?php endforeach ?>";
	   return $str;
	}
	
	public function _cate($tag,$content){
	   $id = isset($tag['id'])?$tag['id']:'';
	   //if(empty($id)){
	      //return false;
	   //}
	   $fid = isset($tag['fid']) ? $this->autoBuildVar($tag['fid']) : '';
	   //$active = isset($tag['act']) ? $this->autoBuildVar($tag['act']) : '';
	   $lim = isset($tag['limit'])?$tag['limit']:'0,10';
	   if(!strpos($lim,',')){
	      $lim = "0,".$lim;
	   }
	   $ord = isset($tag['order'])?$tag['order']:' taxis desc,id desc';
	   $where = isset($tag['where'])?$tag['where']:'';
	   $isnav = isset($tag['isnav'])?$tag['isnav']:'0';
	   $field = "id,catename,defaultpic,links,model";
	   $fields = isset($tag['field'])?$tag['field']:'';
	   if(!empty($fields)){
	      $field .= ",".$fields;
	   }
	   
	   
	   $key = isset($tag['key'])?$tag['key']:'i';
	   $item = isset($tag['item'])?$tag['item']:'rs';
	   $index = isset($tag['index'])?$tag['index']:'0';
	   
	   if($fid){
	      $condition = "1=1 and pid=".$fid;
	   }else{
	      if(empty($id)){
		     return false;
		  }else{
		     $condition = "1=1 and pid=".$id;
		  }
	   }
	   if($isnav==1){
	      $condition .= " and isnav=1";
	   }
	   if(!empty($where)){
	      $condition .= " and ".$where;
	   }
	   $str = '<?php
		  $cond = "'.$condition.'";		  
		  $table =  M("category");
		  $rs = $table -> field("'.$field.'") -> where("$cond") -> limit("'.$lim.'") -> order("'.$ord.'") -> select();		  
		  $'.$key.' = '.$index.';		  
		  foreach($rs as $k=>$'.$item.'):
		  $'.$key.'++;
	   ?>';
	   $str .= $content;
	   $str .= "<?php endforeach ?>";
	   return $str;
	}
	
	public function _cateinfo($tag,$content){
	   $id = isset($tag['id'])?$tag['id']:'';	   
	   $field = "id,catename,defaultpic,links,model";
	   $fields = isset($tag['field'])?$tag['field']:'';
	   if(!empty($fields)){
	      $field .= ','.$fields;
	   }
	   $key = isset($tag['key'])?$tag['key']:'i';
	   $item = isset($tag['item'])?$tag['item']:'rs';
	   $index = isset($tag['index'])?$tag['index']:'0';
	   
	   $condition = "id=".$id;
	   
	   $str = '<?php
		  $cond = "'.$condition.'";		  
		  $table =  M("category");
		  $rs = $table -> field("'.$field.'") -> where("$cond") -> find();
		  if($rs){
		     if($rs["links"] == "http://"){
				 if($rs["model"] == 1){
					$rs["links"] = U("/Article/index",array("id"=>$rs["id"]));
				 }else{
					$rs["links"] = U("/Page/index",array("id"=>$rs["id"]));
				 }
			 }
	   ?>';
	   $str .= $content;
	   $str .= "<?php } ?>";
	   return $str;
	}
}