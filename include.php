<?php /* EL PSY CONGROO */         	  
require dirname(__FILE__) . DIRECTORY_SEPARATOR . 'slide.php';     	 	 			
#注册插件
RegisterPlugin("mxlee","ActivePlugin_mxlee");    	 	  	  
function ActivePlugin_mxlee(){    		  				
	global $zbp;    	  	 	  
	Add_Filter_Plugin('Filter_Plugin_Admin_TopMenu','mxlee_AddMenu');
	Add_Filter_Plugin('Filter_Plugin_Index_Begin','mxlee_moduleContent');    	 						
	Add_Filter_Plugin('Filter_Plugin_ViewList_Template','mxlee_DefaultTemplate');
	Add_Filter_Plugin('Filter_Plugin_Index_Begin','mxlee_UrldeCode_Index_Begin');
	Add_Filter_Plugin("Filter_Plugin_ViewPost_Template","mxlee_Change_Url");
	Add_Filter_Plugin("Filter_Plugin_Cmd_Begin","mxlee_Set_Url");
	if($zbp->Config('mxlee')->unadoff=="1"){
		Add_Filter_Plugin('Filter_Plugin_ViewPost_Template','mxlee_post_ads');
		Add_Filter_Plugin('Filter_Plugin_Edit_Response5', 'mxlee_Custommeta4');
	}      	    	
	if($zbp->Config('mxlee')->listree=="1"){    			 	   
		Add_Filter_Plugin('Filter_Plugin_ViewPost_Template', 'mxlee_ViewPost');    	  	 		 
	}    				  	 
	if($zbp->Config('mxlee')->imgbox=="1"){    		  		 	
		Add_Filter_Plugin('Filter_Plugin_ViewPost_Template','mxlee_Content');        		  
	}          	 
	if($zbp->Config('mxlee')->zdypic=="1"){    		 	   	
		Add_Filter_Plugin('Filter_Plugin_Edit_Response3','mxlee_Custommeta3');      	  			
	}         		 
	if($zbp->Config('mxlee')->zdywzseo=="1"){     				 		
		Add_Filter_Plugin('Filter_Plugin_Edit_Response5','mxlee_Custommeta2');    			 	   
    Add_Filter_Plugin('Filter_Plugin_Category_Edit_Response','mxlee_cate_diyseo');     				  	
	}    	 	 	 		
	Add_Filter_Plugin('Filter_Plugin_Edit_Response', 'mxlee_Edit_Response');     			  	 
}
function mxlee_AddMenu(&$m){    				 		 
	global $zbp;
	array_unshift($m, MakeTopMenu("root",'主题配置',$zbp->host . "zb_users/theme/mxlee/main.php?act=config","","topmenu_mxlee"));
}
//站点信息
function mxlee_all_views() {//总访问量
  global $zbp;
	$all_views = GetValueInArrayByCurrent($zbp->db->Query('SELECT SUM(log_ViewNums) AS num FROM ' . $GLOBALS['table']['Post']), 'num');
	return $all_views;
}
function mxlee_all_artiles() {//文章总数
  global $zbp;
	$all_artiles = GetValueInArrayByCurrent($zbp->db->Query('SELECT COUNT(*) AS num FROM ' . $GLOBALS['table']['Post'] . ' WHERE log_Type=\'0\''), 'num');
	return $all_artiles;
}
function mxlee_all_comments() {//评论总数
  global $zbp;
	$all_comments = $zbp->cache->all_comment_nums;
	return $all_comments;
}
//灯箱插件    			  	  
function mxlee_Content(&$template){     		  			
	global $zbp;    	  	 	 	
	$article = $template->GetTags('article');    	 	 	   
	$pattern = "/<img(.*?)src=('|\")([^>]*).(bmp|gif|jpeg|jpg|png|swf)('|\")(.*?)>/i";      					 
	$replacement = '<a$1href=$2$3.$4$5 rel="box" class="fancybox"$6><img src=$2$3.$4$5/$6></a>';     	  			 
	$content = preg_replace($pattern, $replacement, $article->Content);    	 		  		
	$article->Content = $content;    						 	
	$template->SetTags('article', $article);       		  	
}    			    	
//目录    	 		  		
function mxlee_ViewPost(&$template) {     				 		
    global $zbp;       	 	  
    $content = '';    	 		 		 
    $article = $template->GetTags('article');
    $content .= '<div class="listree-box">
      <p class="listree-p">
        <span class="listree-titles">文章目录</span>
        <a class="listree-btn" title="展开">[+]</a>
      </p>
      <ol id="listree-ol" style="display: none;margin-left: 14px;padding-left: 14px;line-height: 160%;"></ol>
     </div>';
    $article->Content = $content .'<div id="listree-bodys">'. $article->Content .'</div>';    		  				
    $template->SetTags('article', $article);    	 	  		 
}    	  		  	
//登陆信息    			 	 		
function mxlee_Plugin_Html_login() {    	     		
	global $zbp;    	  	 			
	$str='';     					  
	$str.='';     	      
if ($zbp->user->Level < 2){    	  			  
	$str.='<i class="fa fa-user"></i>欢迎 <a href="'.$zbp->host.'zb_system/admin/member_edit.php?act=MemberEdt&id='.$zbp->user->ID.'" title="资料编辑">'.$zbp->user->StaticName.'</a>('.$zbp->user->LevelName.')&nbsp;';       	   	
	$str.='<i class="fa fa-wrench"></i><a href="'.$zbp->host.'zb_users/theme/mxlee/main.php?act=config" title="主题配置" target="_blank">主题配置</a>&nbsp;<i class="fa fa-gear"></i><a target="_blank" href="'.$zbp->host.'zb_system/cmd.php?act=admin">后台管理</a>&nbsp;<i class="fa fa-edit"></i><a href="'.$zbp->host.'zb_system/cmd.php?act=ArticleEdt" title="新建文章" target="_blank">新建文章</a>&nbsp;';    	    	  
  	$str.='<i class="fa fa-sign-out"></i><a href="'.BuildSafeCmdURL('act=logout').'">登出</a>';      	    	
}
elseif ($zbp->user->ID>0){    		  				
  $type=GetVars('type','GET');    			 		  
	$id=GetVars('id','GET');    	 					 
  $str.='<i class="fa fa-user"></i>欢迎 <a href="'.$zbp->host.'zb_system/admin/member_edit.php?act=MemberEdt&id='.$zbp->user->ID.'" title="资料编辑">'.$zbp->user->StaticName.'</a>('.$zbp->user->LevelName.')&nbsp;';    	 		   	
  if ($zbp->user->Level < 2){    			  	 	
    $str.='<i class="fa fa-gear"></i><a target="_blank" href="'.$zbp->host.'zb_system/cmd.php?act=admin">后台管理</a>&nbsp;<i class="fa fa-edit"></i><a href="'.$zbp->host.'zb_system/cmd.php?act=ArticleEdt" title="新建文章" target="_blank">新建文章</a>&nbsp;';      	  			
  }    			 	 	 
  elseif($zbp->user->Level < 5){    					  	
    $str.='<i class="fa fa-gear"></i><a target="_blank" href="'.$zbp->host.'zb_system/cmd.php?act=admin">后台管理</a>&nbsp;<i class="fa fa-edit"></i><a href="'.$zbp->host.'zb_system/cmd.php?act=ArticleEdt" title="新建文章" target="_blank">新建文章</a>&nbsp;';    	 			 	 
  }      				  
  elseif($zbp->user->Level < 6){    			   	 
    $str.='<i class="fa fa-gear"></i><a target="_blank" href="'.$zbp->host.'zb_system/cmd.php?act=admin">后台管理</a>&nbsp;<i class="fa fa-edit"></i><a href="'.$zbp->host.'zb_system/admin/index.php?act=CommentMng" title="评论管理" target="_blank">评论管理</a>&nbsp;';       		 		
  }    		 		   
	$str.='<i class="fa fa-sign-out"></i><a href="'.BuildSafeCmdURL('act=logout').'">登出</a>';   		 			 	
}        	 		
 elseif($zbp->Config('mxlee')->userregoff=="1"){       	 	  
		$str.='<i class="fa fa-github-square"></i>您好，欢迎到访'.$zbp->name.'! <i class="fa fa-slideshare"></i><a href="'.$zbp->Config('mxlee')->useradd.'">注册会员</a> <i class="fa fa-sign-in"></i><a href="'.$zbp->host.'zb_system/cmd.php?act=login">会员登录</a>';     			 			
}    	 	  			
 else{     			 	 	
		$str.='<i class="fa fa-github-square"></i>您好，欢迎到访'.$zbp->name.'! <i class="fa fa-sign-in"></i><a href="'.$zbp->host.'zb_system/cmd.php?act=login">会员登录</a>';    		  	  
}    	   				
//echo $str;       				 
$str = str_replace("\n", "", $str);    	    	  
$str = str_replace("\r", "", $str);     			 	 	
?>    		 	    
<?php echo addcslashes($str,'');?>     		 	 		
<?php    	     		
}     	 			  
//PC端和移动端显示不同广告    	  		 		
function mxlee_is_mobile(){    	    	 	
	if ( empty($_SERVER['HTTP_USER_AGENT']) ) {
		$is_mobile = false;
	} elseif ( strpos($_SERVER['HTTP_USER_AGENT'], 'Mobile') !== false // many mobile devices (all iPhone, iPad, etc.)
		|| strpos($_SERVER['HTTP_USER_AGENT'], 'Android') !== false
		|| strpos($_SERVER['HTTP_USER_AGENT'], 'Silk/') !== false
		|| strpos($_SERVER['HTTP_USER_AGENT'], 'Kindle') !== false
		|| strpos($_SERVER['HTTP_USER_AGENT'], 'BlackBerry') !== false
		|| strpos($_SERVER['HTTP_USER_AGENT'], 'Opera Mini') !== false
		|| strpos($_SERVER['HTTP_USER_AGENT'], 'Opera Mobi') !== false ) {
			$is_mobile = true;
	} else {
		$is_mobile = false;
	}
	return $is_mobile;	 	 				
}
//标签跳转      	 		  
function mxlee_DefaultTemplate(&$template){    			 	  	
	if( ($template->GetTags('type')=='tag') || ($template->GetTags('type')=='author') || ($template->GetTags('type')=='date') ){    	   			 
		$template->SetTemplate('catalog');    			 		 	
	}      	 	   
}    	  		   
//Uditor按钮    		 			  
function mxlee_Edit_Response(){    	 		 			
	global $zbp,$mxlee;    	 						
	echo '<script src="'.$zbp->host.'zb_users/theme/mxlee/include/uebuttons-editor.js" type="text/javascript"></script>'."\r\n";     	    		
}    		    		
function mxlee_echo_shoulu($sburl){       		 	 
    global $zbp;    		  				
	if ($zbp->Config('mxlee')->issearch_in){      	 	  	
		echo mxlee_check_shoulu('baidu',$sburl);     	   		 
	}else{     				  	
		return;    	    	  
	}      	 	 		
}
//选择替换     		  	 	
define( 'mxlee_THIS','mxlee');       			  
define( 'mxlee_ROOT_DIR',plugin_dir_path(mxlee_THIS));     	 	   	
define( 'mxlee_ROOT_URL',plugin_dir_url(mxlee_THIS));      	 				
function mxlee_Get_Logo($name='logo',$type='png'){      	   	 
  $path = mxlee_ROOT_DIR.'mxlee/style/images/'.$name.'.'.$type;    	 	  		 
  if (file_exists($path)){    				 	  
        echo mxlee_ROOT_URL.'mxlee/style/images/'.$name.'.'.$type;       	   	
    }else{        		 	
        echo mxlee_ROOT_URL.'mxlee/style/images/'.$name.'_example.'.$type;      	 	 	 
    }    	  			 	
}       	  		
//默认缩略图    	 	 	   
function mxlee_firstimg($article){    		  				
  global $zbp;      		 	 	
  $randnum = mt_rand(1,20);     				  	
  $pattern="/<[img|IMG].*?src=[\'|\"](.*?(?:[\.gif|\.jpg|\.png]))[\'|\"].*?[\/]?>/";    	     		
  $content = $article->Content;      	     
  preg_match_all($pattern,$content,$matchContent);         	  
  if(isset($matchContent[1][0])) {     		   		
	  $temp=$matchContent[1][0];    			   		
  }else{    		  		 	
	  $temp=$zbp->host."zb_users/theme/mxlee/include/noimg/" . $randnum . ".jpg";    					 	 
  }		     		   		
  return 	$temp;	       		  	
}
//友好时间
function mxlee_TimeAgo( $ptime ) {   			   		
    $ptime = strtotime($ptime);    	  		  	
    $etime = time() - $ptime;    			 	 	 
    if($etime < 1) return '刚刚';     		    	
    $interval = array (     			  		
        12 * 30 * 24 * 60 * 60  =>  '年前 ('.date('Y-m-d', $ptime).')',    						 	
        30 * 24 * 60 * 60       =>  '个月前 ('.date('m-d', $ptime).')',       	  		
        7 * 24 * 60 * 60        =>  '周前 ('.date('m-d', $ptime).')',      	 			 
        24 * 60 * 60            =>  '天前',      	 		 	
        60 * 60                 =>  '小时前',    	 	 		  
        60                      =>  '分钟前',     		     
        1                       =>  '秒前'    			  	 	
    );    	  	  	 
    foreach ($interval as $secs => $str) {    	 	  		 
        $d = $etime / $secs;    		 			 	
        if ($d >= 1) {     				 		
            $r = round($d);      	 	   
            return $r . $str;        	 		
        }    	   		  
    };    	  	 	 	
}
//newtime
function mxlee_newtime($article){    		  				
  global $zbp;     
  $zero1=strtotime (date('y-m-d')); //当前时间
  $zero2=strtotime ($article->Time('y-m-d'));  //过期时间
  $isnew=false;
  if (ceil(($zero1-$zero2)/86400) < 1){
    $isnew=true;
  }
}
//自定义SEO    	  	  	 
function mxlee_Custommeta2(){     	   	  
	global $zbp,$article;       		   
	if($article->Type=="0"){    		  	 	 
		echo '<div id="alias2" class="editmod"><label for="meta_mxleekey" class="editinputname">文章关键字：</label><input style="margin-right: 5px;" type="text" name="meta_mxleekey" id="edtAlias" value="'.htmlspecialchars($article->Metas->mxleekey).'">用英文","隔开(为空则显示默认)</div>';    	   	  	
		echo '<div id="alias2" class="editmod"><label for="meta_mxleedesc" class="editinputname">文章页描述：</label><input style="margin-right: 5px;" type="text" name="meta_mxleedesc" id="edtAlias" value="'.htmlspecialchars($article->Metas->mxleedesc).'">文章页描述(为空则显示默认)</div>';    	 			 	 
	}         	 	
}    			  	  
//分类SEO     	 	 	 	
function mxlee_cate_diyseo(){    	 			   
  global $zbp,$cate;
  echo '<div id="edit" class="edit category_edit">
     <p><strong>分类标题：</strong>当前分类标题<br>
     <input type="text" style="width: 293px;" name="meta_mxlee_diytitles" value="'.htmlspecialchars($cate->Metas->mxlee_diytitles).'"/><br></p>
     <p><strong>关键词：</strong>当前分类关键词<br>
     <input type="text" style="width: 293px;" name="meta_mxlee_diykeywords" value="'.htmlspecialchars($cate->Metas->mxlee_diykeywords).'"/><br></p>
     <p><strong>网站描述：</strong>当前分类网站描述<br>
     <textarea cols="3" rows="6" id="edtIntro" name="meta_mxlee_diydescrip" style="width:600px;">'.htmlspecialchars($cate->Metas->mxlee_diydescrip).'</textarea></p>
     </div>';
}           	
//自定义图片    						  
function mxlee_Custommeta3(){     	 				 
    global $zbp,$article;    			  			
    $s = <<<js
        <script type="text/javascript">
            var EditorIntroOption2 = {
	            toolbars:[['insertimage']],
	            initialFrameWidth:600,
	            autoHeightEnabled:false,
	            initialFrameHeight:800
            }
            UE.getEditor('meta_tesetu',EditorIntroOption2);
        </script>
js;
if ($zbp->CheckPlugin('UEditor')) {    		  	 	 
	echo "<script type=\"text/javascript\" src=\"{$zbp->host}zb_users/theme/mxlee/include/lib.upload.js\"></script>";    	 	 			 
}
  echo '<div id="alias" class="editmod" style="margin: 1em 0 0.5em 0;"><label for="meta_Feng_Price" class="editinputname">主题售价</label>
	<input type="text" name="meta_price" style="width: 35%;" value="'.htmlspecialchars($article->Metas->price).'"/>
	</div>';
	echo'<div id="alias"><p align="right" class="uploadimg"><strong style="color: #ffffff;font-size: 14px;height: 29px;margin-left: 15px;padding: 2px;background: #3a6ea5;border: 1px solid #3399cc;cursor: pointer;">缩略图</strong><input name="meta_tesetu" id="customLogo" type="text" class="uplod_img" style="width: 65%;" value="'.$article->Metas->tesetu.'" /></p></div></div>';      			 				
  if($article->Metas->tesetu){     			  	 
  	echo '<p style="padding: 0;"><img id="upload123" src="'.$article->Metas->tesetu.'" width="88px" height="58px"></p>';    	      	
  }    		  	 	 
}      						
//        	  	
function mxlee_post_ads( &$template ) {      	 	  	
    global $zbp;     	  				
    $article = $template->GetTags('article');    	 	 			 
	// 修改 2 这个段落数    		 		 	 
	if(!mxlee_is_mobile()){      	   	 
	    $ad_code = '<div class="union_ad">'.$article->Metas->union_code.'</div>';    			   		
	}else{    		  			 
	    $ad_code = '<div class="union_ad_m">'.$article->Metas->union_code_m.'</div>';    					 	 
	}     			 		 
  $ad_duan = $article->Metas->union_dl;    	  			 	
	$content= mxlee_prefix_paragraph_ads( $ad_code, $ad_duan, $article->Content );       		   
	$article->Content = $content;     	   	 	
	$template->SetTags('article', $article);     				   
	//return $content;     	  	 	 
}    	 	 		 	
// 插入广告所需的功能代码      	 	 	 
function mxlee_prefix_paragraph_ads( $insertion, $paragraph_id, $content ) {     					  
	$closing_p = '</p>';    	 						
	$paragraphs = explode( $closing_p, $content );     			 	 	
	foreach ($paragraphs as $index => $paragraph) {    	  					
		if ( trim( $paragraph ) ) {       	 	  
			$paragraphs[$index] .= $closing_p;    		 		   
		}      				 	
		if ( $paragraph_id == $index + 1 ) {    	  	    
			$paragraphs[$index] .= $insertion;     						 
		}    		 		 		
	}     	  	 		
	return implode( '', $paragraphs );    	     		
}    			   	 	 	
//自定义文章广告    								
function mxlee_Custommeta4(){     			 		 
	global $zbp,$article;    		 	 	 	
	if($article->Type=="0"){    	  			 	
		echo '<div id="alias2" class="editmod"><label for="meta_union_code" style="position: relative;bottom: 2px;" class="editinputname">PC端广告代码：</label><input style="margin-right: 20px;width: 30%;" type="text" name="meta_union_code" id="edtAlias" value="'.htmlspecialchars($article->Metas->union_code).'"><label for="meta_union_code_m" style="position: relative;bottom: 2px;" class="editinputname">移动广告代码：</label><input style="margin-right: 20px;width: 30%;" type="text" name="meta_union_code_m" id="edtAlias" value="'.htmlspecialchars($article->Metas->union_code_m).'"></div>';     			  		
		echo '<div id="alias2" class="editmod"><label for="meta_union_dl" class="editinputname">在文章第</label><input style="margin: 0 8px;width:68px;" type="text" name="meta_union_dl" id="edtAlias" value="'.htmlspecialchars($article->Metas->union_dl).'">自然段插入广告（填写数字，例如：2，则先第二段插入此广告。空则不显示）</div>';      		  		
	}    	       
}     		 	 	 	
//外链跳转       	   	
function mxlee_UrldeCode_Index_Begin() {    	 						
    global $zbp;    		 	    
    if (isset($_GET['urldecode'])) {    						 	
        $urldecode = trim(htmlspecialchars(GetVars('urldecode', 'GET')));    	   			 
        $url = base64_decode($urldecode);     	 					
        mxlee_UrldeCode_Url_Page($url);       			  
        die;     	 	  	 
    }    	 						
}    		  	 		
function mxlee_UrldeCode_Url_Page($url) {       					
    global $zbp;    				 	  
    echo '<!DOCTYPE html><head><meta charset="utf-8"><meta http-equiv="X-UA-Compatible" content="IE=edge">';    	  	    
    echo '<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">';         			
		echo '<title>博客外链跳转提示！</title>';  
    echo '<link rel="stylesheet" href="/zb_users/theme/mxlee/style/style.css"><link rel="shortcut icon" href="/favicon.ico" type="image/x-icon"><link rel="icon" href="/favicon.ico" type="image/x-icon">';    				  	 
	echo '<style>::-moz-selection{color:#fff;background:#00aa99}::selection{color:#fff;background:#00aa99}p{line-height:28px}p .tips{display:block;margin-bottom:10px;padding:0;font-size:20px;font-weight:600;color:#00aa99}p .url{display:block;margin-top:20px;padding:0}p a{color:#ff0000}p a:hover,p a:focus{text-decoration:none;}</style>';    	 				 	
    echo '</head>';       	 	  
	echo '<body>';
    echo '<br><br><div class="main-wrap container" id="content">
        <div class="col-xs-12 text-center">
            <p><br><br><span class="tips">外链跳转提示</span>您正在访问非本网站的链接，请确认该链接是否为欺诈性链接；<br>友情提示：请勿在陌生网站上输入QQ、手机等信息，不要下载安装任何软件，防止受骗！<br><span class="url"><a href="' . $url . '" rel="nofollow">' . $url . '</a></span><br><br></p>
        </div>
    </div>';
    echo '</body>';      			 		
    echo '</html>';    	 		   	
}     		   		
function mxlee_UrldeCode_ViewComments_Template(&$template) {    	 		 	 	
    global $zbp;    			 			 
    $comments = $template->GetTags('comments');    	 	     
    foreach ($comments as $key => $comment) {    			  		 
		$commentPage = $zbp->host . '?urldecode=' . base64_encode($comment->HomePage);    	    			
    }    	 	 	 		
}    	    			
function mxlee_Change_Url(&$t){     		 	   
    global $zbp;     				   
   $comments=$t->GetTags('comments');       			 	
   for ($i=0;$i<count($comments);$i++)    							 
   {    	 		  	 
       $comments[$i]->HomePage=$zbp->host."zb_system/cmd.php?act=ajax&hk_url=".base64_encode($comments[$i]->HomePage);    			 			 
   }    	  	  	 
  $t->SetTags('comments', $comments);     		 	 		
}       		 	 
function mxlee_Set_Url(){    	  			 	
    if(isset($_GET['hk_url'])) {    		 	  		
        global $zbp;     							
        if (!$zbp->CheckPlugin('mxlee')) {$zbp->ShowError(48);die();}    				 			
        if(isset($_SERVER['HTTP_REFERER'])&&substr($_SERVER['HTTP_REFERER'],0,strlen($zbp->host))==$zbp->host)    	 		  	 
        {      			 	 
            if(trim($_GET['hk_url'])!="")        		 	
            {      	    	
                Redirect(base64_decode($_GET['hk_url']));     				  	
            }      	 				
        }      				  
        Redirect($zbp->host);     			 	  
    }    						 	
}
//留言头像插件    	 		  	 
function mxlee_BuildModule_Avatarcomments() {      		 		 
	global $zbp;    	 	  			
	$i = $zbp->modulesbyfilename['comments']->MaxLi;    	  		   
	if ($i == 0) $i = 5;    	 	 			 
	$comments = $zbp->GetCommentList('*', array(array('=', 'comm_IsChecking', 0),array('<>', 'comm_AuthorID','1')), array('comm_PostTime' => 'DESC'), $i, null);    	 	 	  	
	$s = '';    	 	 				
	foreach ($comments as $comment) {      	 	  	
	  $randimg=rand(1,16);     	 		 	 
	  $randimg=$zbp->host."zb_users/theme/mxlee/include/avator/".$randimg.".jpg";    	 			  	
    //$comment->Content=mxlee_Symbol($comment->Content);    					   
    $s .= '<li>';        	  	
	  if (($zbp->CheckPlugin('Gravatar')) || ($zbp->CheckPlugin('tt_touxiang'))){      	 	   
	  	if ($comment->Author->Email){    		 	    
		   $s .= '<span class="zb_avatar"><a href="'.$comment->Post->Url.'#cmt'.$comment->ID.'"><img src="'.$comment->Author->Avatar.'" alt="'.$comment->Author->StaticName.'" title="'.$comment->Author->StaticName.'"></a></span>';      	  			
		  }else {      			   
       $s .= '<span class="zb_avatar"><a href="'.$comment->Post->Url.'#cmt'.$comment->ID.'"><img src="'.$comment->Author->Avatar.'" alt="'.$comment->Author->StaticName.'" title="'.$comment->Author->StaticName.'"></a></span>';}    	  				
	  }else{     		  		 
     $s .= '<span class="zb_avatar"><a href="'.$comment->Post->Url.'#cmt'.$comment->ID.'"><img src="'.$randimg.'" alt="'.$comment->Author->StaticName.'" title="'.$comment->Author->StaticName.'"></a></span>';    	    	 	
    }     		 	 	 
	$commentname = preg_replace('/[\r\n\s]+/', ' ', trim(SubStrUTF8(TransferHTML($comment->Author->StaticName,'[nohtml]'),10)));    	 	  	  
	$s .= '<p><a href="'.$comment->Post->Url.'#cmt'.$comment->ID.'" title="查看评论内容">'. TransferHTML($comment->Content, '[noenter]') .'</a></p><small>'.$comment->Author->StaticName.' 评论于：'.$comment->Time('m-d').'</small>';      	    	
	$s .= '</li>';    	 	 			 
	}         			
	return $s;     		 	 		
}    	   		 	
//推荐文章
function mxlee_side_hot(){    	 	  		 
  global $zbp,$str;
  $str = '';
  $array = explode(',', "{$zbp->Config('mxlee')->celantop}");
  foreach ($array as $p=>$celantop) {
		$article=GetPost((int)$celantop);
    $kh = $p+1; 
    $str .= "<li><span class=\"li-icon li-icon-{$kh}\">{$kh}</span><a href=\"{$article->Url}\" title=\"{$article->Title}\">{$article->Title}</a></li>";    		   			
  }
	return $str;      		    
}
//热门文章  把代码中的 log_ViewNums 改为 log_CommNums ，调用的是热评文章。
function mxlee_side_rand(){
	global $zbp,$settime;
	$hot = '';
	$nowtime = time();
	$settime = "{$zbp->Config('mxlee')->celanhot}"*24*60*60;
	$gettime = $nowtime-$settime;
	$array = $zbp->GetArticleList(array('*'),array(array('=','log_Status','0'),array('>','log_PostTime',$gettime)),array('log_ViewNums'=>'DESC'),array(9),'');
  foreach ($array as $p=>$related) {
    $k = $p+1;
    $hot .= "<li><span class=\"li-icon li-icon-{$k}\">{$k}</span><a href=\"{$related->Url}\" title=\"{$related->Title}({$related->CommNums}条评论)\">{$related->Title}</a></li>";
  }
	$hot .= '';
	return $hot;
}
//热评文章    		     	
function mxlee_side_con(){     			    
	global $zbp,$str,$order;	  					
    $str = '';    	   			 
    $order = array('log_CommNums'=>'DESC');     	   	 	
    $where = array(array('=','log_Status','0'));      		    
    $array = $zbp->GetArticleList(array('*'),$where,$order,array(9),'');     	 				 
    foreach ($array as $p=>$related) {    	    		 
		$kc = $p+1;     		  		 
        $str .= "<li><span class=\"li-icon li-icon-{$kc}\">{$kc}</span><a href=\"{$related->Url}\" title=\"{$related->Title} ({$related->CommNums}条评论)\">{$related->Title}</a></li>";
    }    			     
	return $str;    		 			  
}
//最新文章    		 					
function mxlee_side_new(){     		 				
	global $zbp,$new;    			  	 	
	$new .= '';    	 		  		
	$array = $zbp->GetArticleList(array('*'),array(array('=','log_Status','0')),array('log_PostTime'=>'DESC'),array(6),'');        	 		
	foreach ($array as $related) {     	 	   	
		$articletitle = preg_replace('/[\r\n\s]+/', ' ', trim(SubStrUTF8(TransferHTML($related->Title,'[nohtml]'),30)));    	 	 		  
		$new .= '<li class="clr"><a href="'.$related->Url.'"  title="'.$related->Title.'"><div class="time"><span class="r">'.$related->Time('d').'</span>/<span class="y">'.$related->Time('m月').'</span></div><div class="title">'.$related->Title.'</div></a></li>';          		
	}    	  	 			
	return $new;       	   	
}
//图文随机推荐 猜你喜欢
function mxlee_side_randimg(){
    global $zbp,$str,$order;$i;
    $i = "{$zbp->Config('mxlee')->twrandimg}";
    $str = '';
    $arr = array();
    $arand = array();
    $order = array('log_ViewNums'=>'ASC');
    $where = array(array('=','log_Status','0'));
    $array = $zbp->GetArticleList(array('*'),$where,$order,array(20),'');
    $arr = array_rand($array,$i);
    for($j=0;$j<$i;$j++){
      $arand[]=$array[$arr[$j]];
    }
    foreach ($arand as $related) {
      $str .= '<li><a href="'.$related->Url.'" title="'.$related->Title.'"><div class="hotpost-img">';
      if (strlen ( $related->Metas->tesetu ) > 6){    		   	        				  
			  $str .= '<img src="'.$related->Metas->tesetu.'" alt="'.$related->Title.'" class="randsimg" i>';
		  }else {
        $str .= '<img src="'.mxlee_firstimg($related).'" alt="'.$related->Title.'" class="randsimg s">';
      }
      $str .= '</div><div class="hotpost-left"><span class="hot-post-title">'.$related->Title.'</span><span class="hot-post-clock"><i class="fa fa-clock-o"></i> '.$related->Time('Y-m-d').'</span><span class="hot-post-info"><i class="fa fa-comment"></i> '.$related->CommNums.'</span></div></a>';  
    }
    return $str;
}
//新版读者墙，显示评论最多的人
function mxlee_readers(){
	global $zbp;    	  		 		    		 			 	    				  	 
	$r = '';
	$comments = $zbp->GetCommentList('*', array(array('=', 'comm_IsChecking', 0),array('<>', 'comm_AuthorID','1')), array('comm_PostTime' => 'DESC'), 12, null);
	foreach ($comments as $comment) {
		$randimg=rand(1,16);
		$randimg=$zbp->host."zb_users/theme/mxlee/include/avator/".$randimg.".jpg";
		$commentname = preg_replace('/[\r\n\s]+/', ' ', trim(SubStrUTF8(TransferHTML($comment->Author->StaticName,'[nohtml]'),4)));
		$commenthomePage = $zbp->host . '?urldecode=' . base64_encode($comment->Author->HomePage);
		if ($comment->Author->HomePage <> null){
			$r .= '<li><a href="'.$commenthomePage.'" title="'.$comment->Author->StaticName.' 点评" target="_blank" rel="external nofollow">';
		} else {
      $r .= '<li><a title="'.$comment->Author->StaticName.'">';
		}
		if (($zbp->CheckPlugin('Gravatar')) || ($zbp->CheckPlugin('tt_touxiang'))){
		  if ($comment->Author->Email){
			$r .= '<img src="'.$comment->Author->Avatar.'" alt="'.$comment->Author->StaticName.'">';
		  }else {
        $r .= '<img src="'.$randimg.'" alt="'.$comment->Author->StaticName.'">';
      }
		}else{
			if ($comment->Author->Level<4){
			$r .= '<img src="'.$comment->Author->Avatar.'" alt="'.$comment->Author->StaticName.'">';
			}else {
        $r .= '<img src="'.$randimg.'" alt="'.$comment->Author->StaticName.'">';
      }
		}
      $r .= ''.$commentname.'</a></li>';
	}
	$r .="\r\n";
	return $r;
}
//多个tab侧栏    	 		  		
function mxlee_tabname() {     		 	  	
	global $zbp;     	  	 		
	$s = '';    	  				 
	$i = $zbp->modulesbyfilename['tabcelan']->MaxLi;    			 				
	if ($i == 0) $i = 10;$s = '';
		$s.= '<li id="con_title" class="con_post_title"><ul id="tab">
		<li id="one1" class="tabhover">推荐</li>
		<li id="one2">热门</li>
		<li id="one3">热评</li></ul></li>';
		$s.= '<li id="con_one" class="con_one_list"><ul id="con_one_1" style="display:block;">'.mxlee_side_hot().'</ul>
		<ul id="con_one_2" style="display:none">'.mxlee_side_rand($i).'</ul>
		<ul id="con_one_3" style="display:none">'.mxlee_side_con().'</ul></li>';
	return $s;      		   	
}    		 	  		
//热门标签      				 	
function mxlee_getTags(){       	 			
	global $zbp,$str;$i;        			 
	$str = '';     		    	
  $i = "{$zbp->Config('mxlee')->tagsnum}";     		  	 	
	$array = $zbp->GetTagList('','',array('tag_Count'=>'DESC'),array($i),'');     			  	 
	foreach ($array as $tag) {    	  			  
		$str .= '<li><a href="'.$tag->Url.'" title="'.$tag->Name.'">'.$tag->Name.'<span class="tag-count"> ('.$tag->Count.')</span></a></li>';    	 			 		
	}     		 		 	
	return $str;      		 	 	
}
//插入模块    		     	
function mxlee_buildModulediv(){       		 		
	global $zbp;    			 			 
	if(!isset($zbp->modulesbyfilename['side_rand']))      	  	  
	{     				 	 
		$t = new Module();    	 			 		
		$t->Name = "热门文章";    		  	 	 
		$t->FileName = "side_rand";    		      
		$t->Source = "side_rand";    	    	  
		$t->SidebarID = 0;    			 				
		$t->IsHideTitle=false;    	  		   
		$t->HtmlID = "side_rand";    				 		 
		$t->Type = "ul";     	 			 	
		$t->MaxLi=9;     							
		$t->Content = '自动获取，无需修改！';    	 						
		$t->Save();    	 	  		 
	}    	    	 	
  if(!isset($zbp->modulesbyfilename['side_hot']))     	  		  
	{    		 			 	
		$t = new Module();     		     
		$t->Name = "推荐文章";    	 				  
		$t->FileName = "side_hot";    		  	 	 
		$t->Source = "side_hot";       	 		 
		$t->SidebarID = 0;    			 		 	
		$t->IsHideTitle=false;    	  				 
		$t->HtmlID = "side_hot";    							 
		$t->Type = "ul";       		  	
		$t->MaxLi=9;       	 	  
		$t->Content = '自动获取，无需修改！';     		    	
		$t->Save();       	    
	}    					  	
	 if(!isset($zbp->modulesbyfilename['side_con']))    	    	 	
	{     		  		 
		$t = new Module();      	 				
		$t->Name = "热评文章";       	   	
		$t->FileName = "side_con";    	  			  
		$t->Source = "side_con";     		 		 	
		$t->SidebarID = 0;     		 	   
		$t->IsHideTitle=false;    	  	 		 
		$t->HtmlID = "side_con";     	 	  	 
		$t->Type = "ul";    	 			  	
		$t->MaxLi=9;     	  		  
		$t->Content = '自动获取，无需修改！';    	   	   
		$t->Save();    						 	
	}    			     
	if(!isset($zbp->modulesbyfilename['side_new']))     	   	 	
	{    		  	 		
		$t = new Module();    	   	   
		$t->Name = "最新文章";     			 			
		$t->FileName = "side_new";     		  	 	
		$t->Source = "side_new";     	    		
		$t->SidebarID = 0;      		  		
		$t->IsHideTitle=false;    	  			  
		$t->HtmlID = "side_new";       		   
		$t->Type = "ul";     	 			  
		$t->MaxLi=6;    	 	 	 		
		$t->Content = '自动获取，无需修改！';    	 		    
		$t->Save();    	 	 	  	
	}
  if(!isset($zbp->modulesbyfilename['side_randimg']))
	{
		$t = new Module();
		$t->Name = "图文推荐";
		$t->FileName = "side_randimg";
		$t->Source = "side_randimg";
		$t->SidebarID = 0;
		$t->IsHideTitle=false;
		$t->HtmlID = "side_randimg";
		$t->Type = "ul";
		$t->MaxLi=3;
		$t->Content = '自动获取，无需修改！';
		$t->Save();
	}
	if(!isset($zbp->modulesbyfilename['readers']))     	 	 	  
	{     	   			
		$t = new Module();        	  	
		$t->Name = "读者墙";    	 	 				
		$t->FileName = "readers";     	   		 
		$t->Source = "readers";     	  			 
		$t->SidebarID = 0;    	  				 
		$t->IsHideTitle=false;    				 	  
		$t->HtmlID = "readers";    		 	 		 
		$t->Type = "ul";    		  	   
		$t->MaxLi=12;    	  	  	 
		$t->Content = '自动获取，无需修改！';    				  	 
		$t->Save();         		 
	}     	  	 	 
	if(!isset($zbp->modulesbyfilename['tabcelan']))         	 	
	{     	   	 	
		$t = new Module();      	   	 
		$t->Name = "热门/推荐/热评";    				   	
		$t->FileName = "tabcelan";      				  
		$t->Source = "tabcelan";      	 	   
		$t->SidebarID = 0;    		  		  
		$t->Content = "";     	 	   	
		$t->IsHideTitle=true;       	 	 	
		$t->HtmlID = "tabcelan";     	  	 		
 		$t->Type = "div";      	 		 	
		$t->MaxLi=9;       	  		
		$t->Content = '自动获取，无需修改！';    		 	  	 
		$t->Save();    			  			
	}    	  		   
	if(!isset($zbp->modulesbyfilename['hottags']))     	 	   	
	{    					   
		$t = new Module();    	    			
		$t->Name = "热门标签";    		 	 	 	
		$t->FileName = "hottags";     	 	 			
		$t->Source = "hottags";     			 	  
		$t->SidebarID = 0;     			 	 	
		$t->IsHideTitle=false;     	   	 	
		$t->HtmlID = "hottags";      		 			
		$t->Type = "ul";     	 		  	
		$t->MaxLi=24;    	    	  
		$t->Content = '自动获取博客内容，无需修改！';         			
		$t->Save();      	 		 	
	}      	 				
	if(!isset($zbp->modulesbyfilename['shangxi']))    				 	  
	{      	     
		$t = new Module();    	 	   	 
		$t->Name = "赏析";     		    	
		$t->FileName = "shangxi";    		 	 	  
		$t->Source = "shangxi";    		 	    
		$t->SidebarID = 0;         	  
		$t->IsHideTitle=true;       			  
		$t->HtmlID = "shangxi";     	  		 	
 		$t->Type = "div";    	 			   
		$t->MaxLi=9;
		$t->Content = '<h3 class="sx-title"><i class="fa fa-asterisk"></i>赏析</h3><li class="shangxi"><b>木兰词·拟古决绝词柬友</b><p class="plus">人生若只如初见，何事秋风悲画扇。</p><p>等闲变却故人心，却道故人心易变。</p><p>骊山语罢清宵半，泪雨霖铃终不怨。</p><p>何如薄幸锦衣郎，比翼连枝当日愿。</p></li>';
    $t->NoRefresh=true;     				   
		$t->Save();     	    	 
	}    			   		
}      		  	 
function mxlee_moduleContent(){      	   	 
	global $zbp;      		    
	if(isset($zbp->modulesbyfilename['side_rand'])){    				 			
		$i = $zbp->modulesbyfilename['side_rand']->MaxLi;    			 	 		
		$zbp->modulesbyfilename['side_rand']->Content = mxlee_side_rand($i);    				 		 
	}      	 		 	
	if(isset($zbp->modulesbyfilename['side_hot'])){    			  	 	
		$i = $zbp->modulesbyfilename['side_hot']->MaxLi;       	 	 	
		$zbp->modulesbyfilename['side_hot']->Content = mxlee_side_hot($i);    				  	 
	}    				 	 	
	if(isset($zbp->modulesbyfilename['side_con'])){    	 	   		
		$i = $zbp->modulesbyfilename['side_con']->MaxLi;    			     
		$zbp->modulesbyfilename['side_con']->Content = mxlee_side_con($i);     	    	 
	}    	  				 
	if(isset($zbp->modulesbyfilename['side_new'])){       	  	 
		$zbp->modulesbyfilename['side_new']->Content = mxlee_side_new();    		 		  	
	}
  if(isset($zbp->modulesbyfilename['side_randimg'])){
		$zbp->modulesbyfilename['side_randimg']->Content = mxlee_side_randimg();
	}
	if(isset($zbp->modulesbyfilename['readers'])){     		   	 
		$zbp->modulesbyfilename['readers']->Content = mxlee_readers();    	   		  
	}    			 				
	if(isset($zbp->modulesbyfilename['tabcelan'])){    	    			
		$zbp->modulesbyfilename['tabcelan']->Content = mxlee_tabname();      	 	 	 
	}      	     
	if(isset($zbp->modulesbyfilename['hottags'])){    		 			 	
		$i = $zbp->modulesbyfilename['hottags']->MaxLi;    	 	 	 		
		$zbp->modulesbyfilename['hottags']->Content = mxlee_getTags($i);     	   		 
	}
}      				 	
//SubMenu     	 	   	
function mxlee_SubMenu($id){       		  	
	$arySubMenu = array(    			 	 	 
		0 => array('基本设置', 'config', 'left', false),     	    	 
		1 => array('外观设置', 'wgsz', 'left', false),     	 				 
		4 => array('首页轮播', 'slide', 'left', false),     					  
		2 => array('广告设置', 'ad', 'left', false),      	 				
		3 => array('功能设置', 'gn', 'left', false),     	   	  
       					
	);        	  	
	foreach($arySubMenu as $k => $v){     			    
		echo '<a href="?act='.$v[1].'" '.($v[3]==true?'target="_blank"':'').'><span class="m-'.$v[2].' '.($id==$v[1]?'m-now':'').'">'.$v[0].'</span></a>';    							 
	}     	 	 			
}    		 	 	  
//初始化模块     		  	  
function InstallPlugin_mxlee(){    	       
	global $zbp;    					   
	mxlee_CreateTable();    		 		  	
  if(!$zbp->Config('mxlee')->HasKey('Version')){    					  	
	$zbp->Config('mxlee')->Version = '1.0';    					 	 
	$zbp->Config('mxlee')->Keywords = '填写站点关键词';      	  	  
  $zbp->Config('mxlee')->Description = '填写站点描述';    	  	   	
	$zbp->Config('mxlee')->qicq = '填写QQ号';     	 	 		 
  $zbp->Config('mxlee')->qqkfoff = '1';     			    
  $zbp->Config('mxlee')->feedico = 'fa-users';
  $zbp->Config('mxlee')->feedadd = '/feed.php';
  $zbp->Config('mxlee')->feedname = '名字';
  $zbp->Config('mxlee')->lxfkico = 'fa-envelope';
  $zbp->Config('mxlee')->lxfkadd = '/';
  $zbp->Config('mxlee')->lxfkname = '名字';
  $zbp->Config('mxlee')->userico = 'fa-slideshare';    	 		 		 
  $zbp->Config('mxlee')->useradd = '/reg.html';    	 		 	 	
  $zbp->Config('mxlee')->userregoff = '1';      		   	
	$zbp->Config('mxlee')->ftwenzi = 'Copyright<i class="fa fa-copyright"></i>2015-2017<a href="/">李洋博客.</a>';       	    
	$zbp->Config('mxlee')->zztuijian = '1';          		
	$zbp->Config('mxlee')->sidebox = '2';
  $zbp->Config('mxlee')->celantop = '2';
	$zbp->Config('mxlee')->tagsnum = '20';
  $zbp->Config('mxlee')->cmsmk2 = '1';
  $zbp->Config('mxlee')->cmsmk2off = '0';
  $zbp->Config('mxlee')->cmsflnum = '1,1';
  $zbp->Config('mxlee')->callboard = '<li>Bestlee最好的主题送给你！</li><li>Z-blogPHP简约主题mxlee!</li>';
	$zbp->Config('mxlee')->PostCMS = '1,1,1,1';      	 				
  $zbp->Config('mxlee')->sycmsoff = '1';
  $zbp->Config('mxlee')->topcms = '1,3,4';
  $zbp->Config('mxlee')->topcmsoff = '1';
  $zbp->Config('mxlee')->twrandimg = '2';
	$zbp->Config('mxlee')->toutiao = '最新文章';
  $zbp->Config('mxlee')->toutiaoico = 'fa-globe';
  $zbp->Config('mxlee')->celanhot = '90';
  $zbp->Config('mxlee')->ttoff = '1';    	  	  	 
  $zbp->Config('mxlee')->newsnum = '4';    				 			
	$zbp->Config('mxlee')->diystyle = ' ';     					 	
  $zbp->Config('mxlee')->Displayds1 = '0';    	    		 
	$zbp->Config('mxlee')->d_about = '<a rel="nofollow" href="/about/">关于我们</a><a rel="nofollow" href="/archive/" target="_blank">文章归档</a><a rel="nofollow" href="/sitemap.xml" target="_blank">谷歌地图</a>';
	$zbp->Config('mxlee')->clbzjs = '李洋个人博客，是一个记录自己生活点滴、互联网技术的原创独立博客（mxlee.Com）。';
  $zbp->Config('mxlee')->adminid = '1';
	$zbp->Config('mxlee')->wz_about = '舞台上有你，就演好角色； 舞台上没你，就静静地做观众；';     	  		  
	$zbp->Config('mxlee')->weiboadd = '填写新浪微博地址';    	 	     
  $zbp->Config('mxlee')->diyzzjj == "1";    	  			  
	$zbp->Config('mxlee')->bdfenxiang = '网站分享代码';
  $zbp->Config('mxlee')->wz_tougao = '有好的文章希望<strong>我们</strong>帮助分享和推广，猛戳这里<a href="/tougao/">我要投稿</a>';
  $zbp->Config('mxlee')->tougaooff = '0';
  $zbp->Config('mxlee')->diybdfx == "1";       	 		 
	$zbp->Config('mxlee')->d_contact = '网站ICP备案号';      	 	   
	$zbp->Config('mxlee')->tongji = '网站统计';    		    	 
	$zbp->Config('mxlee')->diyubhao = '文章不错,写的很好！';     			 		 
	$zbp->Config('mxlee')->diyubding = '我顶！！顶顶顶';    		 		 		
	$zbp->Config('mxlee')->diyubcai = '我踩！我踩踩踩';    	  		 	 
	$zbp->Config('mxlee')->diyplwz = '请爱护环境，勿发小广告！O(∩_∩)O~~';        		 	
  $zbp->Config('mxlee')->jztime = '2017-10-01';     		    	
  $zbp->Config('mxlee')->uncode = '联盟广告JS';      	 			 
  $zbp->Config('mxlee')->unadoff = '0';      					 
  $zbp->Config('mxlee')->uncodeoff = '0';    			 				
  $zbp->Config('mxlee')->bdxzhoff == "0";    				 			
  $zbp->Config('mxlee')->listree = '0';
  $zbp->Config('mxlee')->gdtxoff = '1';    			 	  	
  $zbp->Config('mxlee')->zdywzseo = '0';
  $zbp->Config('mxlee')->noimgoff = '0';  
	$zbp->Config('mxlee')->zdypic = '0';
  $zbp->Config('mxlee')->zanshangoff = '0';
  $zbp->Config('mxlee')->bdxzhgz = '0';    				 	 	
  $zbp->Config('mxlee')->zzxxoff == "1";
	$zbp->Config('mxlee')->srtxoff = '0';    	      	
	$zbp->Config('mxlee')->jtzqhoff = '1';      	 		  
  $zbp->Config('mxlee')->slideoff = '0';       	 			
	$zbp->Config('mxlee')->imgbox = '1';      	  	 	
	$zbp->SaveConfig('mxlee');    	  					
}    	       
	mxlee_CreateTable();         		 
	mxlee_buildModulediv();    		 			  
}      		    
//卸载插件     	 		   
function UninstallPlugin_mxlee() {     		 	   
	global $zbp;    		 	 	  
	$sql1 = $zbp->db->sql->Delete($zbp->table['Module'],array(array('=','mod_Source','side_rand')));    	 		  	 
	$sql2 = $zbp->db->sql->Delete($zbp->table['Module'],array(array('=','mod_Source','side_hot')));      						
	$sql3 = $zbp->db->sql->Delete($zbp->table['Module'],array(array('=','mod_Source','readers')));      		 		 
	$sql4 = $zbp->db->sql->Delete($zbp->table['Module'],array(array('=','mod_Source','tabcelan')));     		    	
	$sql5 = $zbp->db->sql->Delete($zbp->table['Module'],array(array('=','mod_Source','side_con')));     	 	    
	$sql6 = $zbp->db->sql->Delete($zbp->table['Module'],array(array('=','mod_Source','side_new')));    	 			 	 
	$sql7 = $zbp->db->sql->Delete($zbp->table['Module'],array(array('=','mod_Source','hottags')));    	  	  	 
  $sql8 = $zbp->db->sql->Delete($zbp->table['Module'],array(array('=','mod_Source','shangxi')));
  $sql9 = $zbp->db->sql->Delete($zbp->table['Module'],array(array('=','mod_Source','side_randimg')));
	$zbp->db->Delete($sql1);       	 	 	
	$zbp->db->Delete($sql2);    	 	  		 
	$zbp->db->Delete($sql3);     	 	 	 	
	$zbp->db->Delete($sql4);    	 		 	 	
	$zbp->db->Delete($sql5);    	   				
	$zbp->db->Delete($sql6);     	      
	$zbp->db->Delete($sql7);      			 		
  $zbp->db->Delete($sql8);
  $zbp->db->Delete($sql9);
}
//幻灯片     		 				
function mxlee_CreateTable(){    			 	 		
    global $zbp;    						 	
    $s=$zbp->db->sql->CreateTable($GLOBALS['mxlee_Table'],$GLOBALS['mxlee_DataInfo']);      		 	  
    $zbp->db->QueryMulit($s);     	 			 	
}    				 			
?>