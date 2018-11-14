<?php /* EL PSY CONGROO */ /* EL PSY CONGROO */    	 				      			 	   
require '../../../zb_system/function/c_system_base.php';     	            	 		  
require '../../../zb_system/function/c_system_admin.php';      	   		       		 		
$zbp->Load();    		   		     	 	 	 	 
$action='root';    			          	   	  
  if (!$zbp->CheckRights($action)) {$zbp->ShowError(6);die();}      	 	 		      		 	  
  if (!$zbp->CheckPlugin('mxlee')) {$zbp->ShowError(48);die();}     	  	 		      		 	 	
$blogtitle='主题配置';       	  	     			 	 		
$act = "";     			        	  	  		
if ($_GET['act']){    		  	 	       	    	
  $act = $_GET['act'] == "" ? 'config' : $_GET['act'];
}
require $blogpath . 'zb_system/admin/admin_header.php';
require $blogpath . 'zb_system/admin/admin_top.php';
if(isset($_POST['Keywords'])){    			  			    	    	  
	$zbp->Config('mxlee')->Keywords = $_POST['Keywords'];    	             		 	  
	$zbp->Config('mxlee')->Description = $_POST['Description'];     							    	  			  
	$zbp->Config('mxlee')->qicq = $_POST['qicq'];      		 			    							 
	$zbp->Config('mxlee')->qqkfoff = $_POST['qqkfoff'];      	 		 	    				 		 
	$zbp->Config('mxlee')->feedico = $_POST['feedico'];      		 	 	
	$zbp->Config('mxlee')->feedadd = $_POST['feedadd'];      		 		 
	$zbp->Config('mxlee')->feedname = $_POST['feedname'];     				  	
  $zbp->Config('mxlee')->lxfkico = $_POST['lxfkico'];     						 
	$zbp->Config('mxlee')->lxfkadd = $_POST['lxfkadd'];     				 	 
	$zbp->Config('mxlee')->lxfkname = $_POST['lxfkname'];    	 	 	   
	$zbp->Config('mxlee')->weiboadd = $_POST['weiboadd'];    					 		
	$zbp->Config('mxlee')->userico = $_POST['userico'];      	  		       	 		  
	$zbp->Config('mxlee')->useradd = $_POST['useradd'];     						      	 		   
	$zbp->Config('mxlee')->userregoff = $_POST['userregoff'];
	$zbp->Config('mxlee')->ftwenzi = $_POST['ftwenzi'];        	 		     	 			 	
	$zbp->SaveConfig('mxlee');     	   	 	    					 	 
	$zbp->ShowHint('good');     	 	  	     	  			 	
}     			 	      					 	 
if(isset($_POST['toutiao'])){    		  		      		    		
	$zbp->Config('mxlee')->toutiao = $_POST['toutiao'];
	$zbp->Config('mxlee')->toutiaoico = $_POST['toutiaoico'];
	$zbp->Config('mxlee')->ttoff = $_POST['ttoff'];    				  		    		   			
	$zbp->Config('mxlee')->newsnum = $_POST['newsnum'];    		 			  
	$zbp->Config('mxlee')->celanhot = $_POST['celanhot'];    				 	 	
	$zbp->Config('mxlee')->callboard = $_POST['callboard'];     	 	  		    	 	 				
	$zbp->Config('mxlee')->zztuijian = $_POST['zztuijian'];         			      	  	 	
	$zbp->Config('mxlee')->sidebox = $_POST['sidebox'];    			  			     	 	  	 
	$zbp->Config('mxlee')->sideboxoff = $_POST['sideboxoff'];    	  	   	     			  		
	$zbp->Config('mxlee')->tagsnum = $_POST['tagsnum'];    					       	  	    
	$zbp->Config('mxlee')->PostCMS = $_POST['PostCMS'];
  $zbp->Config('mxlee')->celantop = $_POST['celantop'];
  $zbp->Config('mxlee')->cmsmk2 = $_POST['cmsmk2'];       	 			
  $zbp->Config('mxlee')->cmsmk2off = $_POST['cmsmk2off'];    				  	 
  $zbp->Config('mxlee')->cmsflnum = $_POST['cmsflnum'];    	 			 	 
	$zbp->Config('mxlee')->topcms = $_POST['topcms'];    	  	 	 	
  $zbp->Config('mxlee')->twrandimg = $_POST['twrandimg'];     		  	 	
	$zbp->Config('mxlee')->sycmsoff = $_POST['sycmsoff'];      	   	 
  $zbp->Config('mxlee')->topcmsoff = $_POST['topcmsoff'];    	   				
	$zbp->Config('mxlee')->diystyle = $_POST['diystyle'];      	  	 	       	 			
	$zbp->Config('mxlee')->Displayds1 = $_POST['Displayds1'];    	 	  			      	  		 
	$zbp->Config('mxlee')->d_about = $_POST['d_about'];
	$zbp->Config('mxlee')->clbzjs = $_POST['clbzjs'];
  $zbp->Config('mxlee')->adminid = $_POST['adminid'];
  $zbp->Config('mxlee')->zzxxoff = $_POST['zzxxoff'];
	$zbp->Config('mxlee')->jztime = $_POST['jztime'];
	$zbp->Config('mxlee')->diyzzjj = $_POST['diyzzjj'];    		 	  	     	 		  		
	$zbp->Config('mxlee')->wz_about = $_POST['wz_about'];    	  	  		
  $zbp->Config('mxlee')->randhello = $_POST['randhello'];    	 	 			 
	$zbp->Config('mxlee')->bdfenxiang = $_POST['bdfenxiang'];
  $zbp->Config('mxlee')->wz_tougao = $_POST['wz_tougao'];
  $zbp->Config('mxlee')->tougaooff = $_POST['tougaooff'];
	$zbp->Config('mxlee')->diybdfx = $_POST['diybdfx'];    				         		   		
	$zbp->Config('mxlee')->d_contact = $_POST['d_contact'];    	   			     	   	   
	$zbp->Config('mxlee')->tongji = $_POST['tongji'];    	 				 	    	 		 	  
	$zbp->Config('mxlee')->diyubhao = $_POST['diyubhao'];       		 		      					 
	$zbp->Config('mxlee')->diyubding = $_POST['diyubding'];      	            	 			
	$zbp->Config('mxlee')->diyubcai = $_POST['diyubcai'];    		  			     			     
	$zbp->Config('mxlee')->diyplwz = $_POST['diyplwz'];     		    	 		 	 		       		 			
	$zbp->SaveConfig('mxlee');    	    		         	 		
	$zbp->ShowHint('good');    	 	 			     	 				  
}    					 	       			 		
if(isset($_POST['Ad1'])){     			 			     	  			 
	$zbp->Config('mxlee')->Ad1 = $_POST['Ad1'];     	 					     				   
	$zbp->Config('mxlee')->Ad1yd = $_POST['Ad1yd'];    		   		     		  	 		
	$zbp->Config('mxlee')->uncode = $_POST['uncode'];    		   	       		 		  
	$zbp->Config('mxlee')->uncodeoff = $_POST['uncodeoff'];    	 	 				       	   	
	$zbp->Config('mxlee')->DisplayAd1 = $_POST['DisplayAd1'];         	 	     	      
	$zbp->Config('mxlee')->catead = $_POST['catead'];      	  	      	       
	$zbp->Config('mxlee')->cadyd = $_POST['cadyd'];       		 	      			    
	$zbp->Config('mxlee')->catead1 = $_POST['catead1'];     			 	        		  	 
	$zbp->Config('mxlee')->Ad2 = $_POST['Ad2'];    	     		      	  		 
	$zbp->Config('mxlee')->Ad2yd = $_POST['Ad2yd'];    	   	 		            
	$zbp->Config('mxlee')->DisplayAd2 = $_POST['DisplayAd2'];    	  	  	      		  	  
	$zbp->Config('mxlee')->Ad3 = $_POST['Ad3'];    		 		 	     	  					
	$zbp->Config('mxlee')->Ad3yd = $_POST['Ad3yd'];    	  			      		  	 	 
	$zbp->Config('mxlee')->DisplayAd3 = $_POST['DisplayAd3'];     	 	 			    			   	 
	$zbp->Config('mxlee')->listad2 = $_POST['listad2'];      	    	      		  		
	$zbp->Config('mxlee')->listad2on = $_POST['listad2on'];    	  	 			    	   	 		
	$zbp->Config('mxlee')->listad2yd = $_POST['listad2yd'];     				        	 	 			
	$zbp->Config('mxlee')->mAd1 = $_POST['mAd1'];    					              	
	$zbp->Config('mxlee')->mAd1yd = $_POST['mAd1yd'];     			  	      		 	  	
	$zbp->Config('mxlee')->DisplaymAd1 = $_POST['DisplaymAd1'];         	      	  					
	$zbp->SaveConfig('mxlee');    				 			      				 	
	$zbp->ShowHint('good');    	  	 	 	     		     
}       			       		 				
if(isset($_POST['gdtxoff'])){    	  	  	     						 	
	$zbp->Config('mxlee')->zdywzseo = $_POST['zdywzseo'];    		  		 	     		  			
	$zbp->Config('mxlee')->srtxoff = $_POST['srtxoff'];       	  		    	 	 		 	
	$zbp->Config('mxlee')->imgbox = $_POST['imgbox'];
	$zbp->Config('mxlee')->gdtxoff = $_POST['gdtxoff'];    	   			           		
	$zbp->Config('mxlee')->listree = $_POST['listree'];    				 	       		 		  
	$zbp->Config('mxlee')->jtzqhoff = $_POST['jtzqhoff'];
	$zbp->Config('mxlee')->zdypic = $_POST['zdypic'];
	$zbp->Config('mxlee')->noimgoff = $_POST['noimgoff'];
	$zbp->Config('mxlee')->bdxzhoff = $_POST['bdxzhoff'];
  $zbp->Config('mxlee')->zanshangoff = $_POST['zanshangoff'];
	$zbp->Config('mxlee')->xzhid = $_POST['xzhid'];    			 		 	    				 	 	
	$zbp->Config('mxlee')->bdxzhgz = $_POST['bdxzhgz'];      			 	     	 	 		 	
  $zbp->Config('mxlee')->wzzyoff = $_POST['wzzyoff'];
	$zbp->SaveConfig('mxlee');     					      				    
	$zbp->ShowHint('good');    	 		 			     	 	 		 
}    			 			     		 	 			
if(isset($_POST['unadoff'])){    		   	 	     	 	   	
	$zbp->Config('mxlee')->unadoff = $_POST['unadoff'];    	 	  		     	 		 			
	$zbp->SaveConfig('mxlee');    	  		  	    		  		 	
	$zbp->ShowHint('good');    	  	 	      	 		 	  
}     		  	 	       	 		 
if(isset($_POST['slideoff'])){      					      	  	 		
	$zbp->Config('mxlee')->slideoff = $_POST['slideoff'];    				  	      			    
	$zbp->SaveConfig('mxlee');        			      	   	  
	$zbp->ShowHint('good');    		 			       	  	   
}    	 		   	
?>
<style>
.zwsrk{width: 100%;font-size: 15px;height: 150px;min-height: 40px;margin: 0;margin-top: 10px;padding: 8px 8px;color: #333;background-color: #fff;border: 1px solid #d7d7d7;box-sizing: border-box;vertical-align: middle;}
.uploadimg strong {color: #ffffff;height: 29px;line-height: 30px;font-size: 12px;padding: 2px 5px;margin-left: 1em;background: #3a6ea5;border: 1px solid #3399CC;cursor: pointer;}
.uploadimg strong:hover{background: #3399cc;}
.widget_id_side_con, .widget_id_side_hot, .widget_id_side_rand {display: none;}
</style>
<div id="divMain">
	<div class="divHeader"><?php echo $blogtitle;?></div>
	<div class="SubMenu">
	<?php mxlee_SubMenu($act);?>
     <a href="https://www.talklee.com/blog/279.html" target="_blank"><span class="m-right">主题说明</span></a>
    </div>
<div id="divMain2">
<?php if ($act == 'config') { ?>
<table id="form1" name="form1" width="100%" style="padding:0;margin:0;" cellspacing="0" cellpadding="0" class="tableBorder">
<tr>
    <th width="30%"><p align="center">图片名称</p></th>
    <th width="20%"><p align="center">当前图片</p></th>
	<th width="50%"><p align="center">上传文件</p></th>
  </tr>
  <form enctype="multipart/form-data" method="post" action="save.php?type=logo">
	<tr>
    <td><p align="center">LOGO（454X100）</p></td>
	<td>
	<p align="center"><a href="style/images/logo.png" target="_blank"><img src="<?php if(file_exists("style/images/logo.png")){echo "style/images/logo.png";}else{echo "style/images/logo_example.png";}?>" height="40px"></a></p>
	</td>
	<td><p align="center"><input name="logo.png" type="file"/><input name="" type="Submit" class="button" value="保存"/></p></td>
	</tr>
	</form>
  <form enctype="multipart/form-data" method="post" action="save.php?type=flogo">
	<tr>
    <td><p align="center">底部LOGO（180X56）</p></td>
	<td>
	<p align="center"><a href="style/images/flogo.png" target="_blank"><img src="<?php if(file_exists("style/images/flogo.png")){echo "style/images/flogo.png";}else{echo "style/images/flogo_example.png";}?>" height="40px"></a></p>
	</td>
	<td><p align="center"><input name="flogo.png" type="file"/><input name="" type="Submit" class="button" value="保存"/></p></td>
	</tr>
	</form>
  <form enctype="multipart/form-data" method="post" action="save.php?type=wxlogo">
	<tr>
    <td><p align="center">二维码（100X100）</p></td>
	<td>
	<p align="center"><a href="style/images/wxlogo.png" target="_blank"><img src="<?php if(file_exists("style/images/wxlogo.png")){echo "style/images/wxlogo.png";}else{echo "style/images/wxlogo_example.png";}?>" height="40px"></a></p>
	</td>
	<td><p align="center"><input name="wxlogo.png" type="file"/><input name="" type="Submit" class="button" value="保存"/></p></td>
	</tr>
	</form>
	<form enctype="multipart/form-data" method="post" action="save.php?type=favicon">
	<tr>
	<td><p align="center">网站ICO图标（32X32）</p></td>
	<td>
	<p align="center"><a href="style/images/favicon.ico" target="_blank"><img src="<?php if(file_exists("style/images/favicon.ico")){echo "style/images/favicon.ico";}else{echo "style/images/favicon_example.ico";}?>" height="40px"></a></p>
	</td>
	<td><p align="center"><input name="favicon.ico" type="file"/><input name="" type="Submit" class="button" value="保存"/></p></td>
	</tr>
	</form>

  <form enctype="multipart/form-data" method="post" action="save.php?type=weixin">
	<tr>
	<td><p align="center">微信收款二维码</p></td>
	<td>
	<p align="center"><a href="style/images/weixin.jpg" target="_blank"><img src="style/images/weixin.jpg" height="40px"></a></p>
	</td>
	<td><p align="center"><input name="weixin.jpg" type="file"/><input name="" type="Submit" class="button" value="保存"/></p></td>
	</tr>
	</form>
  <form enctype="multipart/form-data" method="post" action="save.php?type=alipay">
	<tr>
	<td><p align="center">支付宝收款二维码</p></td>
	<td>
	<p align="center"><a href="style/images/alipay.jpg" target="_blank"><img src="style/images/alipay.jpg" height="40px"></a></p>
	</td>
	<td><p align="center"><input name="alipay.jpg" type="file"/><input name="" type="Submit" class="button" value="保存"/></p></td>
	</tr>
	</form>

  <form enctype="multipart/form-data" method="post" action="save.php?type=bg_001">
	<tr>
	<td><p align="center">自定义网站背景</p></td>
	<td>
	<p align="center"><a href="style/images/bg_001.jpg" target="_blank"><img src="<?php if(file_exists("style/images/bg_001.jpg")){echo "style/images/bg_001.jpg";}else{echo "style/images/bg_001_example.jpg";}?>" height="40px"></a></p>
	</td>
	<td><p align="center"><input name="bg_001.jpg" type="file"/><input name="" type="Submit" class="button" value="保存"/></p></td>
	</tr>
	</form>
</table>
<form id="form2" name="form2" method="post">	
    <table width="100%" style="padding:0;margin:0;" cellspacing="0" cellpadding="0" class="tableBorder">
		<tr>
			<th width="15%"><p align="center">项目名称</p></th>
			<th width="50%"><p align="center">文本/代码</p></th>
			<th width="25%"><p align="center">说明</p></th>
		</tr>
		<tr>
			<td><label for="Keywords"><p align="center">站点关键词</p></label></td>
			<td><p align="left"><textarea name="Keywords" type="text" id="Keywords" style="width:98%;"><?php echo $zbp->Config('mxlee')->Keywords;?></textarea></p></td>
			<td><p align="left">填写站点关键词</p></td>
		</tr>
		<tr>
			 <td><label for="Description"><p align="center">站点描述</p></label></td>
			<td><p align="left"><textarea name="Description" type="text" id="Description" style="width:98%;"><?php echo $zbp->Config('mxlee')->Description;?></textarea></p></td>
			<td><p align="left">填写站点描述</p></td>
		</tr>
		<tr>
			<td><label for="qicq"><p align="center">媒体信息</p></label></td>
			<td><p align="left">腾讯QQ：<input name="qicq" type="text" id="qicq" style="width:30%;margin-right:3%;" value="<?php echo $zbp->Config('mxlee')->qicq;?>" />
      微博地址：<input name="weiboadd" type="text" id="weiboadd" style="width:38%;" value="<?php echo $zbp->Config('mxlee')->weiboadd;?>" /></p></td>
			<td><p align="left">开启右侧客服QQ<input type="text" id="qqkfoff" name="qqkfoff" class="checkbox" value="<?php echo $zbp->Config('mxlee')->qqkfoff;?>"/></p></td>
		</tr>
    <tr>
			<td><label for="feedico"><p align="center">订阅设置</p></label></td>
			<td><p>栏目图标：<input name="feedico" type="text" id="feedico" style="width:20%;margin-right: 2%;" value="<?php echo $zbp->Config('mxlee')->feedico;?>" />
      网址：<input name="feedadd" type="text" id="feedadd" style="width:20%;margin-right: 2%;" value="<?php echo $zbp->Config('mxlee')->feedadd;?>" />
      名称：<input name="feedname" type="text" id="feedname" style="width:25%;" value="<?php echo $zbp->Config('mxlee')->feedname;?>" />
      </p></td>
			<td><p align="left">自定义博主信息栏最后一个</p></td>
		</tr>
    <tr>
			<td><label for="lxfkico"><p align="center">联系反馈</p></label></td>
			<td><p>图标：<input name="lxfkico" type="text" id="lxfkico" style="width:20%;margin-right: 2%;" value="<?php echo $zbp->Config('mxlee')->lxfkico;?>" />
      网址：<input name="lxfkadd" type="text" id="lxfkadd" style="width:20%;margin-right: 2%" value="<?php echo $zbp->Config('mxlee')->lxfkadd;?>" />
      名称：<input name="lxfkname" type="text" id="lxfkname" style="width:25%;" value="<?php echo $zbp->Config('mxlee')->lxfkname;?>" />
      </p></td>
			<td><p align="left">底部右侧标签</p></td>
		</tr>
    <tr>
			<td><label for="userico"><p align="center">会员注册</p></label></td>
			<td><p>注册图标：<input name="userico" type="text" id="userico" style="width:30%;margin-right: 5%;" value="<?php echo $zbp->Config('mxlee')->userico;?>" />
      网址：<input name="useradd" type="text" id="useradd" style="width:40%;" value="<?php echo $zbp->Config('mxlee')->useradd;?>" />
      </p></td>
			<td><p align="left">会员注册地址<input type="text" id="userregoff" name="userregoff" class="checkbox" value="<?php echo $zbp->Config('mxlee')->userregoff;?>"/></p></td>
		</tr>
		<tr>
			<td><label for="ftwenzi"><p align="center">网站底部文字</p></label></td>
			<td><p align="left"><textarea name="ftwenzi" type="text" id="ftwenzi" style="width:98%;"><?php echo $zbp->Config('mxlee')->ftwenzi;?></textarea></p></td>
			<td><p align="left">添加网站底部文字</p></td>
		</tr>
	</table>
	<br />
	<input name="" type="Submit" class="button" style="margin-top:10px;padding:0 auto;" value="保存"/>
</form>
<?php } if ($act == 'gn'){
	?>
<form id="form4" name="form4" method="post">	
<table width="100%" style='padding:0;margin:0;' cellspacing='0' cellpadding='0' class="tableBorder">
<th width="9%"><p align="center">滚动特效<br><input type="text" id="gdtxoff" name="gdtxoff" class="checkbox" value="<?php echo $zbp->Config('mxlee')->gdtxoff;?>"/></p></th>
<th width="9%"><p align="center">输入特效<br><input type="text" id="srtxoff" name="srtxoff" class="checkbox" value="<?php echo $zbp->Config('mxlee')->srtxoff;?>"/></p></th>
<th width="9%"><p align="center">图片灯箱<br><input type="text" id="imgbox" name="imgbox" class="checkbox" value="<?php echo $zbp->Config('mxlee')->imgbox;?>"/></p></th>
<th width="9%"><p align="center">文章目录<br><input type="text" id="listree" name="listree" class="checkbox" value="<?php echo $zbp->Config('mxlee')->listree;?>"/></p></th>
<th width="9%"><p align="center">文章赞赏<br><input type="text" id="zanshangoff" name="zanshangoff" class="checkbox" value="<?php echo $zbp->Config('mxlee')->zanshangoff;?>"/></p></th>
<th width="9%"><p align="center">无图模式<br><input type="text" id="noimgoff" name="noimgoff" class="checkbox" value="<?php echo $zbp->Config('mxlee')->noimgoff;?>"/></p></th>
<th width="10%"><p align="center">简繁字切换<br><input type="text" id="jtzqhoff" name="jtzqhoff" class="checkbox" value="<?php echo $zbp->Config('mxlee')->jtzqhoff;?>"/></p></th>
<th width="10%"><p align="center">文章页导读<br><input type="text" id="wzzyoff" name="wzzyoff" class="checkbox" value="<?php echo $zbp->Config('mxlee')->wzzyoff;?>"/></p></th>
<th width="12%"><p align="center">diy缩略图<br><input type="text" id="zdypic" name="zdypic" class="checkbox" value="<?php echo $zbp->Config('mxlee')->zdypic;?>"/></p></th>
<th width="13%"><p align="center">文章,分类SEO<br><input type="text" id="zdywzseo" name="zdywzseo" class="checkbox" value="<?php echo $zbp->Config('mxlee')->zdywzseo;?>"/></p></th>
</table>
<table width="100%" style="padding:0;margin:0;margin-top: 10px;" cellspacing="0" cellpadding="0" class="tableBorder table_striped table_hover">
		<tbody><tr>
			<th width="15%"><p align="center">项目名称</p></th>
			<th width="50%"><p align="center">文本/代码</p></th>
			<th width="25%"><p align="center">说明</p></th>
		</tr>
		<tr>
			<td><label for="bdxzhoff"><p align="center">是否百度熊掌号</p></label></td>
			<td><p align="left"><input type="text" id="bdxzhoff" name="bdxzhoff" class="checkbox" value="<?php echo $zbp->Config('mxlee')->bdxzhoff;?>"/></p></td>
			<td><p align="left">没有熊掌号关闭即可</p></td>
		</tr>
    <tr>
			<td><label for="bdxzhgz"><p align="center">是否开启关注功能</p></label></td>
			<td><p align="left"><input type="text" id="bdxzhgz" name="bdxzhgz" class="checkbox" value="<?php echo $zbp->Config('mxlee')->bdxzhgz;?>"/></p></td>
			<td><p align="left">文章页面底部添加百度熊掌号</p></td>
		</tr>
		<tr>
			 <td><label for="xzhid"><p align="center">熊掌号ID</p></label></td>
			<td><p align="left"><input type="text" name="xzhid" style="width:88%;height:30px;" value="<?php echo $zbp->Config('mxlee')->xzhid;?>" size="6"></p></td>
			<td><p align="left"><a target="_blank" href="http://ziyuan.baidu.com/xzh/home/index" title="点击获取百度熊掌号ID" rel="bookmark">点击获取百度熊掌号ID</a></p></td>
		</tr>
	</tbody>
</table>
<br />
	<input name="" type="Submit" class="button" value="保存"/>
		</form>
<?php } if ($act == 'wgsz') { ?>
<form id="form2" name="form2" method="post">	
<table width="100%" style="padding:0;margin:0;" cellspacing="0" cellpadding="0" class="tableBorder">
		<tr>
			<th width="15%"><p align="center">项目名称</p></th>
			<th width="50%"><p align="center">文本/代码</p></th>
			<th width="25%"><p align="center">说明</p></th>
		</tr>
		<tr>
			<td><label for="callboard"><p align="center">首页公告</p></label></td>
			<td><p align="left"><textarea name="callboard" type="text" id="callboard" style="width:98%;"><?php echo $zbp->Config('mxlee')->callboard;?></textarea></p></td>
			<td><p align="left" style="width:58%;float: left;">设置首页公告</p></td>
		</tr>
		<tr>
			<td><label for="zztuijian"><p align="center">设置热门栏目推荐</p></label></td>
			<td>首页热门栏目：<select size="1" name="zztuijian" style="margin-right:30px;"><?php echo OutputOptionItemsOfCategories($zbp->Config('mxlee')->zztuijian);?></select>
			横向滚动栏目(<input type="text" id="sideboxoff" name="sideboxoff" class="checkbox" value="<?php echo $zbp->Config('mxlee')->sideboxoff;?>"/>)：<select size="1" name="sidebox" style="margin-right:30px;"><?php echo OutputOptionItemsOfCategories($zbp->Config('mxlee')->sidebox);?></select>
			标签数量：<input name="tagsnum" type="text" id="tagsnum" style="width:10%;" value="<?php echo $zbp->Config('mxlee')->tagsnum;?>" />
			</td>
			<td><p align="left" style="width:58%;float: left;">设置首页热门推荐分类</p></td>
		</tr>
		<tr>
			<td><label for="PostCMS"><p align="center">首页CMS模块设置</p></label></td>
			<td><p align="left"><input name="PostCMS" type="text" id="PostCMS" style="width:58%;margin-right:30px;" value="<?php echo $zbp->Config('mxlee')->PostCMS;?>" />
      开启CMS布局：<input type="text" id="sycmsoff" name="sycmsoff" class="checkbox" value="<?php echo $zbp->Config('mxlee')->sycmsoff;?>"/></select>
      </p></td>
			<td><p align="left">首页cms布局区块设置，要调用哪个栏目请直接填写分类id即可（栏目id在后台分类管理可以看到）多个分类ID之间用英文逗号分隔</p></td>
		</tr>
    <tr>
			<td><label for="cmsmk2"><p align="center">首页底部CMS模块设置</p></label></td>
			<td>模块调用分类ID：<input name="cmsflnum" type="text" id="cmsflnum" style="width:20%;margin-right:30px;" value="<?php echo $zbp->Config('mxlee')->cmsflnum;?>" />
      CMS栏目展示(<input type="text" id="cmsmk2off" name="cmsmk2off" class="checkbox" value="<?php echo $zbp->Config('mxlee')->cmsmk2off;?>"/>)：<select size="1" name="cmsmk2" style=""><?php echo OutputOptionItemsOfCategories($zbp->Config('mxlee')->cmsmk2);?></select>
			</td>
			<td><p align="left">设置首页cms模块2(位置：横向轮播上方),ID之间用,逗号隔开</p></td>
		</tr>
    <tr>
			<td><label for="topcms"><p align="center">精选导航</p></label></td>
			<td><p align="left"><input name="topcms" type="text" id="topcms" style="width:58%;margin-right:30px;" value="<?php echo $zbp->Config('mxlee')->topcms;?>" /></select>
      侧栏图文数量：<input name="twrandimg" type="text" id="twrandimg" style="width:10%;" value="<?php echo $zbp->Config('mxlee')->twrandimg;?>" /></p></td>
			<td><p align="left" style="width:58%;float: left;">开启精选文章并填写文章ID，例：1,2,3</p>
			<p align="right" style="width:35%;float: left;"><input type="text" id="topcmsoff" name="topcmsoff" class="checkbox" value="<?php echo $zbp->Config('mxlee')->topcmsoff;?>"/></p></td>
		</tr>
    <tr>
			<td><label for="celantop"><p align="center">首页CMS模块设置</p></label></td>
			<td><p align="left">侧栏推荐（最多显示9篇）：<input name="celantop" type="text" id="celantop" style="width:68%;" value="<?php echo $zbp->Config('mxlee')->celantop;?>" /></p></td>
			<td><p align="left">自定义侧栏推荐文章，填写文章ID：1,3,4</p></td>
		</tr>
		<tr>
			<td><label for="toutiao"><p align="center">最新文章标题</p></label></td>
			<td><input name="toutiao" type="text" id="toutiao" style="width:20%;margin-right: 2%;" value="<?php echo $zbp->Config('mxlee')->toutiao;?>" />
      Font图标：<input name="toutiaoico" type="text" id="toutiaoico" style="width:12%;margin-right: 2%" value="<?php echo $zbp->Config('mxlee')->toutiaoico;?>" />
      最新文章数：<input name="newsnum" type="text" id="newsnum" style="width:8%;margin-right: 2%" value="<?php echo $zbp->Config('mxlee')->newsnum;?>" />
      侧栏热门天数：<input name="celanhot" type="text" id="celanhot" style="width:8%;" value="<?php echo $zbp->Config('mxlee')->celanhot;?>" /></td>
			<td><p align="left" style="width:58%;float: left;">是否开启最新文章标题</p>
      <p align="right" style="width:35%;float: left;"><input type="text" id="ttoff" name="ttoff" class="checkbox" value="<?php echo $zbp->Config('mxlee')->ttoff;?>" /></p></td>
		</tr>
		<tr>
			<td><label for="diystyle"><p align="center">自定义css</p></label></td>
			<td><p align="left"><textarea name="diystyle" type="text" id="diystyle" style="width:98%;"><?php echo $zbp->Config('mxlee')->diystyle;?></textarea></p></td>
			<td><p align="left" style="width:58%;float: left;">开启自定义样式</p>
			<p align="right" style="width:35%;float: left;"><input type="text" id="Displayds1" name="Displayds1" class="checkbox" value="<?php echo $zbp->Config('mxlee')->Displayds1;?>" /></p></td>
		</tr>
		<tr>
			<td><label for="d_about"><p align="center">关于我们</p></label></td>
			<td><p align="left"><textarea name="d_about" type="text" id="d_about" style="width:98%;"><?php echo $zbp->Config('mxlee')->d_about;?></textarea></p></td>
			<td><p align="left">用来添加关于我们</p></td>
		</tr>
    <tr>
			<td><label for="clbzjs"><p align="center">侧栏博主介绍</p></label></td>
			<td><p align="left">博主ID：<input name="adminid" type="text" id="adminid" style="width:5%;margin-right:5px;" value="<?php echo $zbp->Config('mxlee')->adminid;?>" />
      建站时间：<input name="jztime" type="text" id="jztime" style="width:15%;margin-right:5px;" value="<?php echo $zbp->Config('mxlee')->jztime;?>" />
      介绍：<textarea name="clbzjs" type="text" id="clbzjs" style="width:45%;margin-right:10px;"><?php echo $zbp->Config('mxlee')->clbzjs;?></textarea></p></td>
			<td><p align="left" style="width:58%;float: left;">侧栏博主介绍60字左右</p>
      <p align="right" style="width:35%;float: left;"><input type="text" id="zzxxoff" name="zzxxoff" class="checkbox" value="<?php echo $zbp->Config('mxlee')->zzxxoff;?>"/></p></td>
		</tr>
		<tr>
			<td><label for="wz_about"><p align="center">作者-佳句赏析</p></label></td>
			<td><p align="left"><textarea name="wz_about" type="text" id="wz_about" style="width:50%;margin-right: 5%"><?php echo $zbp->Config('mxlee')->wz_about;?></textarea>
      随机显示佳句：<input type="text" id="randhello" name="randhello" class="checkbox" value="<?php echo $zbp->Config('mxlee')->randhello;?>"/></p></td>
			<td><p align="left" style="width:58%;float: left;">文章页底部作者-佳句赏析</p>
			<p align="right" style="width:35%;float: left;"><input type="text" id="diyzzjj" name="diyzzjj" class="checkbox" value="<?php echo $zbp->Config('mxlee')->diyzzjj;?>"/></p></td>
		</tr>
    <tr>
			<td><label for="wz_tougao"><p align="center">文章页投稿</p></label></td>
			<td><p align="left"><textarea name="wz_tougao" type="text" id="wz_tougao" style="width:98%;"><?php echo $zbp->Config('mxlee')->wz_tougao;?></textarea></p></td>
			<td><p align="left" style="width:58%;float: left;">开启文章页投稿</p>
			<p align="right" style="width:35%;float: left;"><input type="text" id="tougaooff" name="tougaooff" class="checkbox" value="<?php echo $zbp->Config('mxlee')->tougaooff;?>"/></p></td>
		</tr>
		<tr>
			<td><label for="bdfenxiang"><p align="center">网站分享代码</p></label></td>
			<td><p align="left"><textarea name="bdfenxiang" type="text" id="bdfenxiang" style="width:98%;"><?php echo $zbp->Config('mxlee')->bdfenxiang;?></textarea></p></td>
			<td><p align="left" style="width:58%;float: left;">先开启作者介绍，否则不显示分享代码</p>
			<p align="right" style="width:35%;float: left;"><input type="text" id="diybdfx" name="diybdfx" class="checkbox" value="<?php echo $zbp->Config('mxlee')->diybdfx;?>"/></p></td>
		</tr>
		<tr>
			<td><label for="d_contact"><p align="center">工信部网站备案号</p></label></td>
			<td><p align="left"><textarea name="d_contact" type="text" id="d_contact" style="width:98%;"><?php echo $zbp->Config('mxlee')->d_contact;?></textarea></p></td>
			<td><p align="left">用来添加工信部网站备案号</p></td>
		</tr>
		<tr>
			<td><label for="tongji"><p align="center">网站统计代码</p></label></td>
			<td><p align="left"><textarea name="tongji" type="text" id="tongji" style="width:98%;"><?php echo $zbp->Config('mxlee')->tongji;?></textarea></p></td>
			<td><p align="left">用来添加网站统计代码</p></td>
		</tr>
		<tr>
			 <td><label for="diypinglun"><p align="center">评论相关信息</p></label></td>
			<td><textarea name="diyubhao" type="text" id="diyubhao" style="width:24%;"><?php echo $zbp->Config('mxlee')->diyubhao;?></textarea>
			<textarea name="diyubding" type="text" id="diyubding" style="width:24%;"><?php echo $zbp->Config('mxlee')->diyubding;?></textarea>
			<textarea name="diyubcai" type="text" id="diyubcai" style="width:24%;"><?php echo $zbp->Config('mxlee')->diyubcai;?></textarea>
			<textarea name="diyplwz" type="text" id="diyplwz" style="width:24%;"><?php echo $zbp->Config('mxlee')->diyplwz;?></textarea></td>
			<td><p align="left" style="width:58%;float: left;">填写自定义评论信息</p></td>
		</tr>
	</table>
	<br />
	<input name="" type="Submit" class="button" style="margin-top:10px;padding:0 auto;" value="保存"/>
</form>
<?php } if ($act == 'ad'){
	?>
<form id="form3" name="form3" method="post">	
  <table width="399px" style='position: relative;padding:0;margin:0;text-align: center;' cellspacing='0' cellpadding='0' class="tableBorder">
    <th width="100%"><p align="center" style="float:left;margin-left:28px;">开启文章插入广告功能<input type="text" id="unadoff" name="unadoff" class="checkbox" value="<?php echo $zbp->Config('mxlee')->unadoff;?>"/></p><input style="position:absolute;top:8px;right:18px;" name="" type="Submit" class="button" value="保存"/></th>
  </table>
</form>
<form id="form3" name="form3" method="post">
	<table width="100%" style='padding:0;margin:0;' cellspacing='0' cellpadding='0' class="tableBorder">
	<tr>
		<th width="15%"><p align="center">AD编号</p></th>
		<th width="40%"><p align="center">广告代码</p></th>
		<th width="10%"><p align="center">是否开启</p></th>
		<th width="25%"><p align="center">备注</p></th>
	</tr>
  <tr>
    <td><label for="uncode"><p align="center">联盟广告js代码</p></label></td>
    <td><p align="left"><textarea name="uncode" type="text" id="uncode" style="width:98%;"><?php echo $zbp->Config('mxlee')->uncode;?></textarea></p></td>
    <td><p align="center"><input type="text" id="uncodeoff" name="uncodeoff" class="checkbox" value="<?php echo $zbp->Config('mxlee')->uncodeoff;?>" /></p></td>
    <td><p align="left">放在网页head之间的联盟js代码</p></td>
  </tr>
	<tr>
		<td><label for="Ad1"><p align="center">幻灯片下方广告位</p></label></td>
		<td><p align="left">PC端广告位：<textarea name="Ad1" type="text" id="Ad1" style="width:98%;"><?php echo $zbp->Config('mxlee')->Ad1;?></textarea>
		移动端广告位：<textarea name="Ad1yd" type="text" id="Ad1yd" style="width:98%;"><?php echo $zbp->Config('mxlee')->Ad1yd;?></textarea></p></td>
		<td><p align="center"><input type="text" id="DisplayAd1" name="DisplayAd1" class="checkbox" value="<?php echo $zbp->Config('mxlee')->DisplayAd1;?>" /></p></td>
		<td><p align="left">建议尺寸为：830x60(90)像素</p></td>
	</tr>
  <tr>
		<td><label for="catead"><p align="center">分类列表广告</p></label></td>
		<td><p align="left">PC端广告位：<textarea name="catead" type="text" id="catead" style="width:98%;"><?php echo $zbp->Config('mxlee')->catead;?></textarea>
		移动端广告位：<textarea name="cadyd" type="text" id="cadyd" style="width:98%;"><?php echo $zbp->Config('mxlee')->cadyd;?></textarea></p></td>
		<td><p align="center"><input type="text" id="catead1" name="catead1" class="checkbox" value="<?php echo $zbp->Config('mxlee')->catead1;?>" /></p></td>
		<td><p align="left">建议尺寸为：830x60(90)像素</p></td>
	</tr>
	<tr>
		<td><label for="Ad2"><p align="center">首页CMS分类广告位</p></label></td>
		<td><p align="left">PC端广告位：<textarea name="Ad2" type="text" id="Ad2" style="width:98%;"><?php echo $zbp->Config('mxlee')->Ad2;?></textarea>
		移动端广告位：<textarea name="Ad2yd" type="text" id="Ad2yd" style="width:98%;"><?php echo $zbp->Config('mxlee')->Ad2yd;?></textarea></p></td>
		<td><p align="center"><input type="text" id="DisplayAd2" name="DisplayAd2" class="checkbox" value="<?php echo $zbp->Config('mxlee')->DisplayAd2;?>" /></p></td>
		<td><p align="left">建议尺寸为：830x60(90)像素</p></td>
	</tr>
	<tr>
		<td><label for="Ad3"><p align="center">首页横向轮播广告位</p></label></td>
		<td><p align="left">PC端广告位：<textarea name="Ad3" type="text" id="Ad3" style="width:98%;"><?php echo $zbp->Config('mxlee')->Ad3;?></textarea>
		移动端广告位：<textarea name="Ad3yd" type="text" id="Ad3yd" style="width:98%;"><?php echo $zbp->Config('mxlee')->Ad3yd;?></textarea></p></td>
		<td><p align="center"><input type="text" id="DisplayAd3" name="DisplayAd3" class="checkbox" value="<?php echo $zbp->Config('mxlee')->DisplayAd3;?>" /></p></td>
		<td><p align="left">建议尺寸为：1200x60(90)像素</p></td>
	</tr>
	<tr>
		<td><label for="listad2"><p align="center">文章页广告</p></label></td>
		<td><p align="left">PC端广告位：<textarea name="listad2" type="text" id="listad2" style="width:98%;"><?php echo $zbp->Config('mxlee')->listad2;?></textarea>
		移动端广告位：<textarea name="listad2yd" type="text" id="listad2yd" style="width:98%;"><?php echo $zbp->Config('mxlee')->listad2yd;?></textarea></p></td>
		<td><p align="center"><input type="text" id="listad2on" name="listad2on" class="checkbox" value="<?php echo $zbp->Config('mxlee')->listad2on;?>" /></p></td>
		<td><p align="left">建议尺寸为：830x60(90)像素</p></td>
	</tr>
	<tr>
		<td><label for="mAd1"><p align="center">文章下方广告</p></label></td>
		<td><p align="left">PC端广告位：<textarea name="mAd1" type="text" id="mAd1" style="width:98%;"><?php echo $zbp->Config('mxlee')->mAd1;?></textarea>
		移动端广告位：<textarea name="mAd1yd" type="text" id="mAd1yd" style="width:98%;"><?php echo $zbp->Config('mxlee')->mAd1yd;?></textarea></p></td>
		<td><p align="center"><input type="text" id="DisplaymAd1" name="DisplaymAd1" class="checkbox" value="<?php echo $zbp->Config('mxlee')->DisplaymAd1;?>" /></p></td>
		<td><p align="left">建议尺寸为：830x60(90)像素</p></td>
	</tr>
</table>
	<br />
	<input name="" type="Submit" class="button" value="保存"/>
		</form>
<?php } if ($act == 'slide') {
?>
<form id="form4" name="form4" method="post">	
  <table width="399px" style='position: relative;padding:0;margin:0;text-align: center;' cellspacing='0' cellpadding='0' class="tableBorder">
    <th width="100%"><p align="center" style="float:left;margin-left:28px;">是否开启首页幻灯片<input type="text" id="slideoff" name="slideoff" class="checkbox" value="<?php echo $zbp->Config('mxlee')->slideoff;?>"/></p><input style="position:absolute;top:8px;right:18px;" name="" type="Submit" class="button" value="保存"/></th>
  </table>
</form>
<?php
$str = '<form action="save.php?type=flash" method="post">
                <table width="100%" border="1" class="tdCenter">
                <tr>
                    <th scope="col" width="5%" height="32" nowrap="nowrap">序号</th>
                    <th scope="col" width="25%">幻灯片标题</th>
                    <th scope="col" width="25%">图片网址</th>
                    <th scope="col" width="25%">目标链接</th>
                    <th scope="col" width="5%">排序</th>
                    <th scope="col" width="5%">显示</th>
                    <th scope="col" width="10%">操作</th>
                </tr>';
        $str .= '<tr>';    						       	 	  	     						 	
        $str .= '<td align="center">0</td>';    		     	       				         		  
        $str .= '<td><input type="text" class="sedit" name="title" value=""></td>';    	 		          		        	 	   		
        $str .= '<td><div class="uploadimg"><input type="text" class="sedit uplod_img" name="img" value=""><strong>上传图片</strong></div></td>';    	    		         	 	      	     	
        $str .= '<td><input type="text" class="sedit" name="url" value=""></td>';    			 	       	 	    	     				   
        $str .= '<td><input type="text" name="order" value="99" style="width:40px"></td>';    		  		         	 			     				 		
        $str .= '<td><input type="text" class="checkbox" name="IsUsed" value="1" /></td>';
        $str .= '<td><input type="hidden" name="editid" value="">
                        <input name="add" type="submit" class="button" value="增加"/></td>';
        $str .= '</tr>';       		 		    								    	 	   	 
        $str .= '</form>';    		           				  	    								
        $where = array(array('=','sean_Type','0'));    			   		    			  			         	 	
        $order = array('sean_IsUsed'=>'DESC','sean_Order'=>'ASC');    			 		 	     			  		        	  	
        $sql= $zbp->db->sql->Select($mxlee_Table,'*',$where,$order,null,null);    	     		     		           		   	
        $array=$zbp->GetListCustom($mxlee_Table,$mxlee_DataInfo,$sql);    			 				      			 		      	  	 	
        $i =1;         		     		  				       	   	
        foreach ($array as $key => $reg) {      	  	 	    				  	         	   
            $str .= '<form action="save.php?type=flash" method="post" name="flash">';    		    	     	 	 			       	   	 
            $str .= '<tr>';         	      	 	  			      	 	  	
            $str .= '<td align="center">'.$i.'</td>';     						     	  		 		    	  		 		
            $str .= '<td><input type="text" class="sedit" name="title" value="'.$reg->Title.'" ></td>';    	 		  		    	  	 	        		 	 	
            $str .= '<td><div class="uploadimg"><input type="text" class="sedit uplod_img" name="img" value="'.$reg->Img.'" ><strong>上传图片</strong></div></td>';    	 	  		        	   	    	  		 	 
            $str .= '<td><input type="text" class="sedit" name="url" value="'.$reg->Url.'" ></td>';     		  		      						      			 		 
            $str .= '<td><input type="text" class="sedit" name="order" value="'.$reg->Order.'" style="width:40px"></td>';         		      					      		 	 	 	
            $str .= '<td><input type="text" class="checkbox" name="IsUsed" value="'.$reg->IsUsed.'" /></td>';
            $str .= '<td nowrap="nowrap">
                        <input type="hidden" name="editid" value="'.$reg->ID.'">
                        <input name="edit" type="submit" class="button" value="修改"/>
                        <input name="del" type="button" class="button" value="删除" onclick="if(confirm(\'您确定要进行删除操作吗？\')){location.href=\'save.php?type=flashdel&id='.$reg->ID.'\'}"/>
                    </td>';
            $str .= '</tr>';    							     		           		  			
            $str .= '</form>';    		 	         			 			      	 				
            $i++;    	    	 	       		          	 			
        }     	  	       			 		 	       	    
        $str .='</table>';     		   	        	 	 	     	 	  	 
        echo $str;    					 	      	 		       	 	  		 
    };    		            	 	 	     		 	   	
?>
</div>
</div>
<script type="text/javascript">
ActiveTopMenu("topmenu_mxlee");
</script> 
<?php
if ($zbp->CheckPlugin('UEditor')) {	       	 			    								     			 	  
	echo '<script type="text/javascript" src="'.$zbp->host.'zb_users/plugin/UEditor/ueditor.config.php"></script>';    			  	        	  		     				 	  
	echo '<script type="text/javascript" src="'.$zbp->host.'zb_users/plugin/UEditor/ueditor.all.min.js"></script>';     							    				  	     					 		
	echo "<script type=\"text/javascript\" src=\"include/lib.upload.js\"></script>";      				        	  			    		  	 		
}    	     	      	 	  	     		  			 
require $blogpath . 'zb_system/admin/admin_footer.php';     	   	 	     	 	 		      	   	  
RunTime();    			  	      				   	     	  	   
?>