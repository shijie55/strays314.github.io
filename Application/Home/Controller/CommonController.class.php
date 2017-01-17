<?php
namespace Home\Controller;
use Think\Controller;
class CommonController extends Controller {
    
	protected $Users;
	
	public function _initialize($id=0){
	   // 头部导航
	   $navbar = $this -> GetSubMenu(0);
	   $this -> assign('navbar',$navbar);
	   // 引入id
	   $id = I('get.id');
	   if ($id == 0) {
	   		return;
	   }
	   // 栏目导航
	   $category = M('Category');
	   $osign = $category -> where('id='.$id) -> find();
	   // dump($osign);die();
	   // 三种情况（全空，模板空或者正常）
	   if (empty($osign)) {
		    $Content = M('Content');
		    $cateid = $Content -> where('id='.$id) -> field('cateid') -> find();
		    $breadNav = $this -> BreadNav($cateid['cateid']);
		    $sideNav = $this -> GetSubMenu($cateid['cateid']);		
	   } elseif(empty($osign['listtemp'])) {
	   		$son = $category -> where('pid='.$id) -> field('id') -> find();
	   		$breadNav = $this -> BreadNav($son['id']);
	   		$sideNav = $this -> GetSubMenu($son['id']);
	   } else {
	   		// dump($id);die();
	   		$breadNav = $this -> BreadNav($id);
	   		$sideNav = $this -> GetSubMenu($id);
	   }
	   $selfCate = explode('_', $breadNav['seotitle']);
	   $selfCate = $selfCate['0'];
	   $this -> assign('selfCate', $selfCate);	
	   if (!empty($breadNav)) {$this -> assign('breadNav', $breadNav);};
	   $this -> assign('sideNav', $sideNav);
	   /*dump($sideNav);
	   die();*/
	}
	
	/**
	 * [getTpl 获取界面模板]
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function getTpl($id)
	{
		$category = M('Category');
		$sign  = $category -> where('id='.$id) -> find();
		// 从category表找不到数据则重定向到show控制器
		if (!empty($sign)) {
			$model = $category -> where('id='.$id) -> field('listtemp') -> find();
			$model = explode('.', $model['listtemp']);
			$model = $model[0]; 
			return $model;
		}
	}
	
	/**
	 * [getInfo 获取界面的所有信息]
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function getInfo($id)
	{
		$category = M('category');
		$info = $category -> where('id='.$id) -> find();
		return $info; 
	}

	/*
	 ## SuperSlide
	 ## @param int $id 幻灯分组ID
	 ## @return array $ret 幻灯列表数组 
	*/
	public function SuperSlide($id=1){
	   $Model = M('Carousel');
	   $rs = $Model -> field('title,content,pic,links') -> where('groupid='.$id) -> order('taxis desc,id desc') -> select();
	   $ret = array();
	   if($rs){
	      foreach($rs as $i => $q){
		     foreach($q as $key => $val){
			    $ret[$i][$key] = $val;
				if($key == 'links'){
				   if(empty($val)){
				      $ret[$i][$key] = "javascript:void(0);";
				   }
				} 
			 }
		  }
		  return $ret;
	   }
	}
	
	/*
	 ## GetListByID
	 ## 获取列表
	 ## @param int $id 指定栏目ID
	 ## @param int $lim_b 分页开始
	 ## @param int $lim_e 分页长度
	 ## @param string $field 查询字段
	 ## @param int $fn 字段追加 0、字段覆盖 1
	 ## @return ret array
	*/
	public function GetListByID($id,$lim_b=0,$lim_e=0,$field,$fn=0,$ispage=0,$cond=''){
	   //$ret = array();
	   $fields = 'id,cateid,catename,title,defaultpic,docsrc,addtime,thepla,thebeg,theed,links,content,shortcontent';
	   if(!empty($field)){
	      if($fn==0){
		     $fields .= ','.$field;
		  }else{
		     $fields = $field;
		  }
	   }
	   if($lim_e == 0){ //配置分页长度
	      $c = $this -> CateInfo($id,'pagesize',1);
		  $lim_e = $c['pagesize'];
	   }
	   
	   $idarray = $this -> GetSonArr($id);
	   $condition = 'cateid in('.$idarray.')';
	   
	   $kwds = I('get.keywords');
	   $year = I('get.year');
	   $exyear = I('get.exyear');
	   $mon = I('get.mon');
	   $sid = I('get.sid');	   
	   if(!empty($year)){
	      $condition .= " and year(addtime)='".$year."'";
	   }
	   if(!empty($exyear)){
	      $condition .= " and year(thebeg)='".$exyear."'";
	   }
	   if(!empty($mon)){
	      $condition .= " and month(thebeg)='".$mon."'";
	   }
	   if(!empty($kwds)){
	      $condition .= " and title like '%".$kwds."%'";
	   }
	   if(!empty($sid)){
	      $condition .= " and sid=".$sid;
	   }
	   if(!empty($cond)){
	      $condition .= $cond;
	   }
	   
	   //dump(I('get.keywords'));
	   $Model = M('content');
	   
	   if($ispage==1){
	      $count = $Model -> where($condition) -> count();
		  $Page = new \Think\Page($count,$lim_e);
		  $pagination = $Page -> show();
		  $this -> assign('pagination',$pagination);
		  $lim_b = $Page -> firstRow;
		  $lim_e = $Page -> listRows;
	   }
	   
	   $rs = $Model -> field($fields) -> where($condition) -> order('isgood desc,taxis desc,id desc') -> limit($lim_b.','.$lim_e) -> select();
	   
	   if($rs){
	      $list = $this -> MakeList($rs);
	   }
	   	   
	   return $list;
	}
	
	
	/*
	 ## MakeList()
	 ## 更新记录集为数组并返回
	 ## @param array $rs 记录集
	 ## @return ret array
	*/
	public function MakeList($rs){
		  $ret = array();
		  foreach($rs as $i => $q){
		     foreach($q as $key=>$val){
			    $ret[$i][$key] = $val;
				if($key == 'links'){
				   if(!empty($val)){
				      $ret[$i][$key] = $val;  
					  $ret[$i]['target'] = '_blank';
				   }else{
				      $ret[$i][$key] = U('/Show/index',array('id'=>$q['id']));
				   }
				}else if($key == 'tags'){
				   if(empty($val)){
				      $ret[$i][$key] = $q['catename'];
				   }
				}
			 }
		  }
		  return $ret;
	}
	
	/*
	 ## BreadNav
	 ## 面包屑导航
	 ## @param int $id 指定栏目ID
	 ## @return ret array
	 ## ret['breadnav'] = $str 面包屑
	 ## ret['seotitle'] = $posstr 优化标题
	*/
	public function BreadNav($id,$Sep='&gt;',$f=0){
	   //static $str = '';
	   //static $posstr = '';
	   static $ret = array();
	   $Model = M('Category');
	   $rs = $Model -> field('id,pid,catename,links') -> where('id='.$id) -> find();
	   // ht note
	   if($rs){
	      $links = SetCateLink($rs['id']);		  
		  if($f == 0){
		     $ret['seotitle'] = $rs['catename'];
			 $ret['breadnav'] = "<a href='".$links."'>".$rs['catename']."</a>";
			 $f++;
		  }else{
		     $ret['seotitle'] = $ret['seotitle']."_".$rs['catename'];
			 $ret['breadnav'] = "<a href='".$links."'>".$rs['catename']."</a>".$Sep.$ret['breadnav'];
		  }
		  if($rs['pid'] != 0){
		     $this -> BreadNav($rs['pid'],$Sep,$f);
		  }
	   }
	   return $ret;
	}
	
	/*
	 ## SetBanner
	 ## 通栏图片
	 ## @param int $id 指定栏目ID
	 ## @return $str string
	*/
	public function SetBanner($id){
	   static $str = '';
	   $Model = M('category');
	   $rs = $Model -> field('pic,pid') -> where('id='.$id) -> find();
	   if($rs){
	      $str = $rs['pic'];
		  if(empty($str)){
		     if($rs['pid'] != 0){
			    $this -> SetBanner($rs['pid']);
			 }
		  }
	   }
	   return $str;
	}
	
	
	/*
	 ## GetSubMenu
	 ## 子栏目列表
	 ## @param int $id 指定栏目ID
	 ## @return $ret Array
	*/
	public function GetSubMenu($id){
	   $f = $this -> CheckChild($id);
	   if($f !== false){
	      //存在子类,序列化子类为数组
		  $ret = $this -> MakeCateArr($f);
	   }else{
	      //打印同级分类
		  $Model = M('category');
		  $rs = $Model -> field('catename,id,pid') -> where('id='.$id.' and isnav=1') -> find();
		  if($rs){
		     if($rs['pid'] == 0){
			    //返回自身				
				//return makearr($rs);
				$links = SetCateLink($rs['id']);
				$rs['links'] = $links; 
				$ret[] = $rs;
			 }else{
				global $gret;
				$gret = array();
			    $q = $this -> GetChildren($rs['pid']);
				//序列化为数组
				//dump($q);
				$ret = $this -> MakeCateArr($q);
			 }
		  }
	   }
	   return $ret;
	}
	
	/*
	 ## CheckChild
	 ## 是否拥有子类
	 ## @param int $id 指定栏目ID
	 ## @return bool
	*/
	public function CheckChild($id){
	   $Model = M('Category');
	   $rs = $Model -> field('id') -> order('taxis asc') -> where('pid='.$id.' and isnav=1') -> select();
	   if($rs){
		   global $gret;
		   $gret = array();
		   $catearr = $this -> GetChildren($id);
		   return $catearr;
	   }else{
	      return false;
	   }
	}
	
	/*
	 ## GetChildren
	 ## 获取子类数组
	 ## @param int $id 指定栏目ID
	 ## @return $ret Array
	*/
	public function GetChildren($id){
	   global $gret;
	   $Model = M('category');
	   $condition = 'pid='.$id;
	   $condition .= ' and isnav=1';
	   	   
	   //echo $condition;
	   $rs = $Model -> field('id,pid,level,catename,defaultpic,shortcontent,content') -> where($condition) -> order('pid asc,taxis asc') -> select();
	   if($rs){
	      foreach($rs as $menu){
			 $gret[] = $menu;
			 $this -> GetChildren($menu['id']);
		  }
	   }
	   return $gret;
	}
	
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
	
	/*  CateInfo   
	 ## 分类信息
	 ## @return $ret [array]
    */
	public function CateInfo($id,$fields='',$infield=0){
	   $ret = array();
	   $Model = M('Category');
	   $field = 'id,pid,catename,links,defaultpic,shortcontent';
	   if(!empty($fields)){
	      $field .= ','.$fields;
	   }
	   if($infield == 1){
	      $field = $fields;
	   }
	   $rs = $Model -> field($field) -> where('id='.$id) -> find();
	   if($rs){
	      foreach($rs as $key=>$val){
		     $ret[$key] = $val;
			 if($key == 'links'){
			    $links = SetCateLink($id);
				$ret[$key] = $links;
			 }
		  }
		  return $ret;
	   }
	}
	
	/*  GetTopId   
	 ## 顶级分类ID
	 ## @return $id [int]
    */
	public function GetTopId($id){
	   static $pid;
	   $Model = M('Category');
	   $rs = $Model -> field('id,pid') -> where('id='.$id) -> find();
	   if($rs){
	      if($rs['pid'] != 0){
		     $this -> GetTopId($rs['pid']);
		  }else{
		     $pid = $rs['id'];
		  }
	   }
	   return (int)$pid;  
	}
	
	/*  GetPid   
	 ## 当前分类父类ID
	 ## @return $id [int]
    */
	public function GetPid($id){
	   //static $pid;
	   $Model = M('Category');
	   $rs = $Model -> field('id,pid') -> where('id='.$id) -> find();
	   if($rs){
	      if($rs['pid'] == 0){
		     return (int)$id;
		  }else{
		     return (int)$rs['pid'];
		  }
	   }
	}
	
	/*  GetPid   
	 ## 当前分类父类ID
	 ## @return $id [int]
    */
	public function GetSon($id){
	   //static $pid;
	   $Model = M('Category');
	   $rs = $Model -> field('id,pid') -> where('pid='.$id.' and isnav=1') -> order('taxis desc,id desc') -> find();
	   if($rs){
	      //dump($rs);
		  return $rs['id'];
	   }else{
		  return $id;
	   }
	}
	
	/*
	  ## GetSonArr
	  ## @param int $id 父类ID
	  ## @return string $str 子类ID序列字符串
	*/
	public function GetSonArr($id,$tp=0){
	   static $idarr;
	   if($tp == 0){
	      $idarr = "";
		  $tp++;
	   }
	   $Cate = M('category');
	   $rs = $Cate -> field('id') -> where('pid='.$id) -> select();
	   if($rs){
	      foreach($rs as $i => $q){
		     $idarr .= $q['id'].',';
			 $this -> GetSonArr($q['id'],$tp);
		  }
	   }
	   $str = $idarr.$id;
	   return $str;
	}
	
	/*  GetRscNav   
	 ## 获取当前内容上一篇|下一篇导航
	 ## @return $ret [array]
    */
	public function GetRscNav($id,$cateid=0){
	   //$ret = array();
	   $prev = $next = array('title'=>'没有了','links'=>'javascript:void(0);');
	   $Model = M('content');
	   if($cateid == 0){
	      $cateid = $Model -> where('id='.$id) -> getField('cateid');
	   }
	   //上一篇
	   $rsprev = $Model -> field('id,title,links') -> where('cateid='.$cateid.' and id<'.$id) -> order('id desc') -> find();
	   if($rsprev){
	      $prev['title'] = $rsprev['title'];
		  if(empty($rsprev['links'])){
		     $prev['links'] = U('/Show/index',array('id'=>$rsprev['id']));
		  }else{
		     $prev['links'] = $rsprev['links'];
		  }		  
	   }
	   //下一篇
	   $rsnext = $Model -> field('id,title,links,defaultpic') -> where('cateid='.$cateid.' and id>'.$id) -> order('id asc') -> find();
	   if($rsnext){
	      $next['title'] = $rsnext['title'];
		  if(empty($rsnext['links'])){
		     $next['links'] = U('/Show/index',array('id'=>$rsnext['id']));
		  }else{
		     $next['links'] = $rsnext['links'];
		  }	
	   }
	   //return $ret;
	   $ret['prev'] = $prev;
	   $ret['next'] = $next;
	   //dump($ret);
	   $this -> assign('rsnav',$ret);
	}
	
}