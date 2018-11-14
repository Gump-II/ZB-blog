<?php echo'<meta charset="UTF-8"><div style="text-align:center;padding:60px 0;font-size:16px;"><h2 style="font-size:60px;margin-bottom:32px;color:f00;">欢迎您的访问！</h2><h3>但是，这里并没有你想找的东西，喜欢这个的主题可以联系我们！</h3><h2 style="font-size:50px;margin-bottom:32px;color:f00;">QQ：229693666</h2></div>';die();?><div class="container-fluid home-fluid">
<div class="site-content">
  <nav class="gonggao navcates">
    <div class="bull"><i class="fa fa-volume-up"></i></div>
    <div id="callboard" >
      <ul class="menu">
       {$zbp->Config('mxlee')->callboard}
      </ul>
    </div>
  </nav>
<div class="site-main">
  <div class="content-wrap left">
    {if $zbp->Config('mxlee')->slideoff=="1" && $type=='index'}<div class="slide-main"><!--幻灯片-->
    <div class="swiper-container swiper-home">
      <div class="swiper-wrapper">
        {module:slide}
      </div>
      <div class="swiper-pagination swiper-home-pagination"></div>
      <div class="swiper-button swiper-home-button-next swiper-button-next"><i class="fa fa-chevron-right"></i></div>
      <div class="swiper-button swiper-home-button-prev swiper-button-prev"><i class="fa fa-chevron-left"></i></div>
    </div>
    </div>
{/if}</div>
{if mxlee_is_mobile()}
  {if $zbp->Config('mxlee')->DisplayAd1=="1" && strlen ( $zbp->Config('mxlee')->Ad1yd ) > 8}<div class="ad shadow-box">
    {$zbp->Config('mxlee')->Ad1yd}
  </div>{/if}
{else}
  {if $zbp->Config('mxlee')->DisplayAd1=="1" && strlen ( $zbp->Config('mxlee')->Ad1 ) > 8}<div class="ad shadow-box">
    {$zbp->Config('mxlee')->Ad1}
  </div>{/if}
{/if}
{if $zbp->Config('mxlee')->topcmsoff=="1"}
{php}$arrays = explode(',',$zbp->Config('mxlee')->topcms);{/php}
<div class="deanpol aiv cl">
  {foreach $arrays as $ikeys=>$topcms}
  {$article=GetPost((int)$topcms)}{$ids=$ikeys}
  {if $ids==0}
  <div class="article-item">
    <div class="item-pic pull-left">
      <a href="{$article.Url}" title="{$article.Title}"><img src="{if $zbp->Config('mxlee')->zdypic=="1" && strlen ( $article->Metas->tesetu ) > 6}{$article->Metas->tesetu}{else}{mxlee_firstimg($article)}{/if}" width="200" height="120" alt="{$article.Title}"></a>
    </div>
    <div class="item-intro">
      <a href="{$article.Url}" class="item-title"><i class="fa fa-gitlab"></i>{$article.Title}</a>
      <p class="item-desc">{php}$description = preg_replace('/[\r\n]+/', '', trim(SubStrUTF8(TransferHTML($article->Intro,'[nohtml]'),120)).'...');{/php}{$description}</p>
      <div class="item-push-info"><i class="fa fa-user"></i>{$article.Author.StaticName} | <time><i class="fa fa-calendar"></i>{mxlee_TimeAgo($article.Time())}</time></div>
    </div>
  </div>
  <ul class="jxnr cl">
  {else}
  {$ik = $ikeys+1;}
  <li><em class="color-{$ik}">{$ik}</em><a href="{$article.Url}" title="详细阅读：{$article.Title}">{$article.Title}</a><span class="list-date">{$article.Time('m-d')}</span></li>{/if}
  {/foreach}
  </ul>
  <span class="jxwz"><i class="fa fa-paper-plane"></i>精选导读</span>
</div>
{/if}
  <div class="widget-box blog-layout">
    <div class="post_box_title">
      {if $zbp->Config('mxlee')->ttoff=="1"}<h3><i class="fa {$zbp->Config('mxlee')->toutiaoico}"></i>{$zbp->Config('mxlee')->toutiao}</h3>{/if}   
    </div>
    {foreach $articles as $n=>$article}{php}$k = $n+1;{/php}
    {if $article.IsTop}
    {template:post-istop}
    {else}
    {template:post-multi}
    {/if}
    {/foreach}
    <!--页码-->
    <div class="pagination"><div class="page-list">{template:pagebar}</div></div>
  </div>
  </div><!--侧栏-->
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
    {/if}{template:sidebar}
  </aside>
</div><div class="clear"></div>
</div>
<script type='text/javascript' src='{$host}zb_users/theme/{$theme}/script/jquery.ias.min.js'></script>