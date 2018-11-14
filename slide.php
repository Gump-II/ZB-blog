<?php /* EL PSY CONGROO */    	   	 		
$mxlee_Table='%pre%mxlee';    				  	 
$mxlee_DataInfo=array(    		 		 		
    'ID'=>array('sean_ID','integer','',0),        	 	 
    'Type'=>array('sean_Type','integer','',0),     			 			
    'Title'=>array('sean_Title','string',255,''),     	   	 	
    'Url'=>array('sean_Url','string',255,''),      				 	
    'Img'=>array('sean_Img','string',255,''),      	  		 
    'Order'=>array('sean_Order','integer','',99),    		  	 	 
    'Code'=>array('sean_Code','string',255,''),    				 	  
    'IsUsed'=>array('sean_IsUsed','boolean','',true),      	 				
    'Intro'=>array('sean_Intro','string',255,''),        	   
    'Addtime'=>array('sean_Addtime','integer','',0),       	 		 
    'Endtime'=>array('sean_Endtime','integer','',0),       					
);    		     	
    	  	  		
function mxlee_Get_Flash($mxlee_Table,$mxlee_DataInfo){     		  			
    global $zbp;    	 		  		
    $where = array(array('=','sean_Type','0'),array('=','sean_IsUsed','1'));         			
    $order = array('sean_IsUsed'=>'DESC','sean_Order'=>'ASC');     	  		  
    $sql= $zbp->db->sql->Select($mxlee_Table,'*',$where,$order,null,null);    	 	   	 
    $array=$zbp->GetListCustom($mxlee_Table,$mxlee_DataInfo,$sql);     	 	    
    $i =1;    		 				 
    $str = "";     	 		   
    foreach ($array as $key => $reg) {     		  		 
       $str .= "<article class='swiper-slide slide-single'><div class='swiper-image'><a href='".$reg->Url."' title='".$reg->Title."' target='_blank'><img src='".$reg->Img."' alt='".$reg->Title."'></a></div><div class='swiper-post'><h3><a href='".$reg->Url."' target='_blank' title='".$reg->Title."'>".$reg->Title."</a></h3><div class='clearfix'></div></div></article>";     		 	 		
        //$i++;     	   	  
    }     			    
  @file_put_contents($zbp->usersdir . 'theme/'.$zbp->theme.'/include/slide.php', $str);    								
}    		  			 
?>