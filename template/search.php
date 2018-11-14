<?php echo'<meta charset="UTF-8"><div style="text-align:center;padding:60px 0;font-size:16px;"><h2 style="font-size:60px;margin-bottom:32px;color:f00;">欢迎您的访问！</h2><h3>但是，这里并没有你想找的东西，喜欢这个的主题可以联系我们！</h3><h2 style="font-size:50px;margin-bottom:32px;color:f00;">QQ：229693666</h2></div>';die();?>{template:header}
<div class="container-fluid home-fluid">
<div class="site-content">
  <nav class="navcates">
    当前位置：<i class="fa fa-home"></i><a href="{$host}">{$name}</a> » {$title} 有关的文章
  </nav>
<div class="site-main">
<!--文章列表-->
{if mxlee_is_mobile()}
  {if $zbp->Config('mxlee')->catead1=="1" && strlen ( $zbp->Config('mxlee')->cadyd ) > 8}<div class="ad shadow-box">
    {$zbp->Config('mxlee')->cadyd}
  </div>{/if}
{else}
  {if $zbp->Config('mxlee')->catead1=="1" && strlen ( $zbp->Config('mxlee')->catead ) > 8}<div class="ad shadow-box">
    {$zbp->Config('mxlee')->catead}
  </div>{/if}
{/if}
  <div class="widget-box blog-layout">
    <div class="post_box_title">
      <h3><i class="fa fa-search"></i>{$title}</h3>      
    </div>
    {foreach $articles as $n=>$article}{php}$k = $n+1;{/php}
      {template:post-multi}
    {/foreach}
<!--页码-->
  <div class="pagination">
    <div class="page-list">
      {template:pagebar}
    </div>
  </div>
  </div>
</div>
<!--侧栏-->
  <aside class="sidebar-right">
    {if $zbp->Config('mxlee')->zzxxoff=="1"}<div class="widget-box widget" id="zzxx-box">
			<div class="topauthor">{php}$id = "{$zbp->Config('mxlee')->adminid}";$mem = $zbp->GetMemberByID($id);{/php}
				<img alt="博客主人：{$mem.StaticName}" src="{$mem.Avatar}" class="avatar-photo" alt="{$mem.StaticName}" title="{$mem.StaticName}" height="100" width="100">
				<span class="intag" title="{$mem.StaticName}">博 主：</span>
				<span class="names"><a href="{$mem.Url}" title="查看 {$mem.StaticName} 发布的文章" rel="author">{$mem.StaticName}</a></span>
				<span class="talk">{$zbp->Config('mxlee')->clbzjs}</span>
			</div>
      <ul>
        <li class="tsina"><a title="" rel="nofollow" href="{$zbp->Config('mxlee')->weiboadd}" target="_blank"><i class="fa fa-weibo"></i></a></li>
        <li class="weixin"><a title="微信"><i class="fa fa-weixin"></i><span style="background-image:url({php}mxlee_Get_Logo('wxlogo','png');{/php});"></span></a></li>
        <li class="tqq"><a target="blank" rel="nofollow" href="//wpa.qq.com/msgrd?v=3&uin={$zbp->Config('mxlee')->qicq}&site=qq&menu=yes" title="QQ临时对话"><i class="fa fa-qq"></i></a></li>
        <li class="feed"><a title="{$zbp->Config('mxlee')->feedname}" href="{$zbp->Config('mxlee')->feedadd}" rel="nofollow" target="_blank"><i class="fa {$zbp->Config('mxlee')->feedico}"></i></a></li>
      </ul>
      <div class="butauthor ">
			  <span class="bignum pn">浏览 {mxlee_all_views()} 次</span>
			  <span class="bignum">运行 <a id="days">0</a> 天数</span>
      </div>
    </div>
    {/if}{template:sidebar4}
  </aside>
</div><div class="clear"></div>
</div>
<script type='text/javascript' src="{$host}zb_users/theme/{$theme}/script/sticky-sidebar.js"></script>
<script type='text/javascript' src='{$host}zb_users/theme/{$theme}/script/jquery.ias.min.js'></script>
{if $zbp->Config('mxlee')->zzxxoff=="1"}<script type="text/javascript">var s1='{$zbp->Config('mxlee')->jztime}';s1=new Date(s1.replace(/-/g,"/"));s2=new Date();var days=s2.getTime()-s1.getTime();var number_of_days=parseInt(days/(1000*60*60*24));document.getElementById('days').innerHTML=number_of_days;</script>
{/if}
{template:footer}