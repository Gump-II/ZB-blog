<?php echo'<meta charset="UTF-8"><div style="text-align:center;padding:60px 0;font-size:16px;"><h2 style="font-size:60px;margin-bottom:32px;color:f00;">欢迎您的访问！</h2><h3>但是，这里并没有你想找的东西，喜欢这个的主题可以联系我们！</h3><h2 style="font-size:50px;margin-bottom:32px;color:f00;">QQ：229693666</h2></div>';die();?>{template:header}
{if $zbp->Config('mxlee')->sycmsoff=="1"}<div class="container-fluid home-fluid">
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
{/if}{if $zbp->Config('mxlee')->topcmsoff=="1"}
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
{/if}<section class="widget-box home-layout">
{if $zbp->Config('mxlee')->ttoff=="1"}<h3 class="post_box_title"><i class="fa {$zbp->Config('mxlee')->toutiaoico}"></i>{$zbp->Config('mxlee')->toutiao}</h3>{/if}
{foreach GetList( $zbp->Config('mxlee')->newsnum ) as $n=>$newlist}{php}$k = $n+1;{/php}
{php}$pattern="/<[img|IMG].*?src=[\'|\"](.*?(?:[\.gif|\.jpg|\.png]))[\'|\"].*?[\/]?>/";
$content = $newlist->Content;
preg_match_all($pattern,$content,$matchContent);
$picArray=array_unique(array_merge($matchContent[1]));
$pictotal=count($picArray);
if(count($matchContent[1]) >= 3){
	$picsrca=$matchContent[1][0];
	$picsrcb=$matchContent[1][1];
	$picsrcc=$matchContent[1][2];
}elseif(count($matchContent[1]) >= 1){
	$picsrcd=$matchContent[1][0];
}{/php}{php}
  $zero1=strtotime (date('y-m-d')); //当前时间
  $zero2=strtotime ($newlist->Time('y-m-d'));  //过期时间
  $isnew=false;
  if (ceil(($zero1-$zero2)/86400) < 1){
    $isnew=true;
  }
{/php}{if mxlee_is_mobile()}<!-- 移动端 -->{if $pictotal>=3}<!-- 多图 -->
<article class="post_box multi{if $zbp->Config('mxlee')->gdtxoff=="1"} wow fadeInDown{/if}" id="post_box{$k}"">
	<h3><a href="{$newlist.Url}"><i class="fa fa-picture-o"></i>{$newlist.Title}</a></h3>
	<div class="multiimgs" style="display: block;zoom:1;">
		<ul>
			<li><a href="{$newlist.Url}"><img class="img-multi" src="{$picsrca}" alt="{$newlist.Title}" title="详细阅读：{$newlist.Title}" style="display: block;"></a></li>
			<li><a href="{$newlist.Url}"><img class="img-multi" src="{$picsrcb}" alt="{$newlist.Title}" title="详细阅读：{$newlist.Title}" style="display: block;"></a></li>
			<li><a href="{$newlist.Url}"><img class="img-multi" src="{$picsrcc}" alt="{$newlist.Title}" title="详细阅读：{$newlist.Title}" style="display: block;"></a></li>
		</ul>
	</div>
	<div class="multiintro">{php}$intro = preg_replace('/[\r\n]+/', '', trim(SubStrUTF8(TransferHTML($newlist->Intro,'[nohtml]'),108)).'...');{/php}
    <a href="{$newlist.Url}" title="查看《{$newlist.Title}》全文">{$intro}</a>
  </div>
	<div class="multiinfo">
		<span class="author"><i class="fa fa-list-alt"></i><a href="{$newlist.Category.Url}">{$newlist.Category.Name}</a></span>
		<span class="date"><i class="fa fa-calendar"></i>{$newlist.Time('Y-m-d')}</span>
		<span class="views"><i class="fa fa-paw"></i>{$newlist.ViewNums}次浏览</span>
		<span class="cmtnum"><i class="fa fa-comment"></i><a href="{$newlist.Url}#comments">{$newlist.CommNums}条评论</a></span>
	</div>{if $isnew}<div class="news"></div>{/if}
</article>{elseif $pictotal<1 && $zbp->Config('mxlee')->noimgoff=="1"}<!-- 无图 -->
<article class="post_box{if $zbp->Config('mxlee')->gdtxoff=="1"} wow fadeInDown{/if}" id="post_box{$k}">
	<div class="multibox noimg">
		<h3><a href="{$newlist.Url}"><i class="fa fa-columns"></i>{$newlist.Title}</a></h3>
    <div class="noimginfo">
      <a href="{$newlist.Url}" title="查看《{$newlist.Title}》全文">{php}$intros = preg_replace('/[\r\n]+/', '', trim(SubStrUTF8(TransferHTML($newlist->Intro,'[nohtml]'),246)).'...');{/php}{$intros}</a>
    </div>
		<div class="noimgtags">
			<span class="no-author"><i class="fa fa-list-alt"></i><a href="{$newlist.Category.Url}">{$newlist.Category.Name}</a></span>
			<span class="no-date"><i class="fa fa-calendar"></i>{$newlist.Time('Y-m-d')}</span>
			<span class="no-views"><i class="fa fa-paw"></i>{$newlist.ViewNums}次浏览</span>
			<span class="no-cmtnum"><i class="fa fa-comment"></i><a href="{$newlist.Url}#comments">{$newlist.CommNums}条评论</a></span>
      <a class="read-more right" href="{$newlist.Url}" title="详细阅读：{$newlist.Title}">阅读全文</a>
		</div>
	</div>{if $isnew}<div class="news"></div>{/if}
</article>{else}<!-- 单图 -->
<article class="post_box{if $zbp->Config('mxlee')->gdtxoff=="1"} wow fadeInDown{/if}" id="post_box{$k}">
  <div class="post-img col-xs-4">
    <a href="{$newlist.Url}" style="display: block;zoom:1;">
      <img class="img-responsive img-rounded imgs" src="{if $zbp->Config('mxlee')->zdypic=="1" && strlen ( $newlist->Metas->tesetu ) > 6}{$newlist->Metas->tesetu}{else}{mxlee_firstimg($newlist)}{/if}" alt="{$newlist.Title}" title="详细阅读：{$newlist.Title}" style="display: block;"><em></em>
    </a>
  </div>
  <div class="post-left">
    <h3><a href="{$newlist.Url}" title="{$newlist.Title}">{$newlist.Title}</a></h3>
    <div class="post-con">{php}$description = preg_replace('/[\r\n]+/', '', trim(SubStrUTF8(TransferHTML($newlist->Intro,'[nohtml]'),150)).'...');{/php}
      <a href="{$newlist.Url}" title="查看《{$newlist.Title}》全文">{$description}</a>
    </div>
    <aside class="item-meta">
      <span class="mu-ml"><i class="fa fa-list-alt"></i><a href="{$newlist.Category.Url}">{$newlist.Category.Name}</a></span>
      <span class="mu-ml-clock"><i class="fa fa-calendar"></i>{$newlist.Time('Y-m-d')}</span>
      <span class="mu-ml-eye"><i class="fa fa-paw"></i>{$newlist.ViewNums}次浏览</span>
      <span class="mu-ml-comment"><i class="fa fa-comment"></i><a href="{$newlist.Url}#comments">{$newlist.CommNums}条评论</a></span>
      <a class="read-more right" href="{$newlist.Url}" title="详细阅读：{$newlist.Title}">阅读全文</a>
    </aside>
  </div>{if $isnew}<div class="news"></div>{/if}
</article>
{/if}
{else}<!-- PC端 -->
{if $pictotal<1 && $zbp->Config('mxlee')->noimgoff=="1"}<!-- 无图 -->
<article class="post_box{if $zbp->Config('mxlee')->gdtxoff=="1"} wow fadeInDown{/if}" id="post_box{$k}">
	<div class="multibox noimg">
		<h3><a href="{$newlist.Url}"><i class="fa fa-columns"></i>{$newlist.Title}</a></h3>
    <div class="noimginfo">
      <a href="{$newlist.Url}" title="查看《{$newlist.Title}》全文">{php}$intros = preg_replace('/[\r\n]+/', '', trim(SubStrUTF8(TransferHTML($newlist->Intro,'[nohtml]'),246)).'...');{/php}{$intros}</a>
    </div>
		<div class="noimgtags">
			<span class="no-author"><i class="fa fa-list-alt"></i><a href="{$newlist.Category.Url}">{$newlist.Category.Name}</a></span>
			<span class="no-date"><i class="fa fa-calendar"></i>{$newlist.Time('Y-m-d')}</span>
			<span class="no-views"><i class="fa fa-paw"></i>{$newlist.ViewNums}次浏览</span>
			<span class="no-cmtnum"><i class="fa fa-comment"></i><a href="{$newlist.Url}#comments">{$newlist.CommNums}条评论</a></span>
      <a class="read-more right" href="{$newlist.Url}" title="详细阅读：{$newlist.Title}">阅读全文</a>
		</div>
	</div>{if $isnew}<div class="news"></div>{/if}
</article>{else}<!-- 有图 -->
<article class="post_box{if $zbp->Config('mxlee')->gdtxoff=="1"} wow fadeInDown{/if}" id="post_box{$k}">
  <div class="post-img col-xs-4">
    <a href="{$newlist.Url}" style="display: block;zoom:1;">
      <img class="img-responsive img-rounded imgs" src="{if $zbp->Config('mxlee')->zdypic=="1" && strlen ( $newlist->Metas->tesetu ) > 6}{$newlist->Metas->tesetu}{else}{mxlee_firstimg($newlist)}{/if}" alt="{$newlist.Title}" title="详细阅读：{$newlist.Title}" style="display: block;"><em></em>
    </a>
  </div>
  <div class="post-left">
    <h3><a href="{$newlist.Url}" title="{$newlist.Title}">{$newlist.Title}</a></h3>
    <div class="post-con">{php}$description = preg_replace('/[\r\n]+/', '', trim(SubStrUTF8(TransferHTML($newlist->Intro,'[nohtml]'),150)).'...');{/php}
      <a href="{$newlist.Url}" title="查看《{$newlist.Title}》全文">{$description}</a>
    </div>
    <aside class="item-meta">
      <span class="mu-ml"><i class="fa fa-list-alt"></i><a href="{$newlist.Category.Url}">{$newlist.Category.Name}</a></span>
      <span class="mu-ml-clock"><i class="fa fa-calendar"></i>{$newlist.Time('Y-m-d')}</span>
      <span class="mu-ml-eye"><i class="fa fa-paw"></i>{$newlist.ViewNums}次浏览</span>
      <span class="mu-ml-comment"><i class="fa fa-comment"></i><a href="{$newlist.Url}#comments">{$newlist.CommNums}条评论</a></span>
      <a class="read-more right" href="{$newlist.Url}" title="详细阅读：{$newlist.Title}">阅读全文</a>
    </aside>
  </div>{if $isnew}<div class="news"></div>{/if}
</article>
{/if}{/if}<!-- End -->
{/foreach}
</section>
{if mxlee_is_mobile()}
  {if $zbp->Config('mxlee')->DisplayAd2=="1" && strlen ( $zbp->Config('mxlee')->Ad2yd ) > 8}<div class="ad shadow-box{if $zbp->Config('mxlee')->gdtxoff=="1"} wow fadeInDown" data-wow-delay="0.3s{/if}">
    {$zbp->Config('mxlee')->Ad2yd}
  </div>{/if}
{else}
  {if $zbp->Config('mxlee')->DisplayAd2=="1" && strlen ( $zbp->Config('mxlee')->Ad2 ) > 8}<div class="ad shadow-box{if $zbp->Config('mxlee')->gdtxoff=="1"} wow fadeInDown" data-wow-delay="0.3s{/if}">
    {$zbp->Config('mxlee')->Ad2}
  </div>{/if}
{/if}
<section class="home_shop shadow-box{if $zbp->Config('mxlee')->gdtxoff=="1"} wow fadeInDown{/if}">
{php}$caseid=$zbp->Config('mxlee')->zztuijian;{/php}
  {if isset($categorys[$caseid])}<h2><i class="icon-cart-plus"></i><a href="{$categorys[$caseid].Url}" class="shop_button" title="查看更多">{$categorys[$caseid].Name}</a><a class="cat-angle cat-move" href="{$categorys[$caseid].Url}" rel="category"><i class="fa fa-angle-right"></i></a></h2>{/if}
    <ul>
{foreach GetList(3,$caseid,null,null,null,null,array("has_subcate"  => true)) as $article}
<li class="shop_main">
    <a href="{$article.Url}" title="{$article.Title}" rel="bookmark" class="shopthumb"><img src="{if $zbp->Config('mxlee')->zdypic=="1" && strlen ( $article->Metas->tesetu ) > 6}{$article->Metas->tesetu}{else}{mxlee_firstimg($article)}{/if}" alt="{$article.Title}"></a>
  <h3><a href="{$article.Url}" title="{$article.Title}">{$article.Title}</a></h3>
  <p>{php}$description = preg_replace('/[\r\n]+/', '', trim(SubStrUTF8(TransferHTML($article->Intro,'[nohtml]'),36)).'...');{/php}{$description}</p>
  <div class="shop_btn">
    <span class="price">{$article.Time('Y-m-d')}</span><a class="zzxq" href="{$article.Url}"><i class="fa fa-chain"></i>查看详情</a>
  </div>
</li>
{/foreach}
</ul>
</section>
{if strlen ( $zbp->Config('mxlee')->PostCMS ) > 1}
<div class="cms">
{php}$flids = explode(',',$zbp->Config('mxlee')->PostCMS);{/php}
{foreach $flids as $flid}
<article class="cms-cate shadow-box{if $zbp->Config('mxlee')->gdtxoff=="1"} wow fadeInDown" data-wow-delay="0.3s{/if}">
  <div class="cms-main">
    {if isset($categorys[$flid])}<h3 class="cms-title"><i class="fa fa-bars"></i><a href="{$categorys[$flid].Url}" rel="category">{$categorys[$flid].Name}</a><a class="cat-angle" href="{$categorys[$flid].Url}" rel="category"><i class="fa fa-angle-right"></i></a></h3>{/if}<div class="clear"></div>
  <div class="cms-post">
  {foreach GetList(6,$flid,null,null,null,null,array('has_subcate'=>true))  as $key=>$article}
  {$i=$key}{if $i==0}
    <h2 class="entry-title"><a href="{$article.Url}" title="阅读：{$article.Title}" rel="bookmark">{$article.Title}</a></h2> 
    <figure class="thumbnail"><a href="{$article.Url}"><img width="600" height="348" src="{if $zbp->Config('mxlee')->zdypic=="1" && strlen ( $article->Metas->tesetu ) > 6}{$article->Metas->tesetu}{else}{mxlee_firstimg($article)}{/if}" class="size-post-image" alt="{$article.Title}" title="详细阅读：{$article.Title}"></a></figure> 
    <div class="cat-main">{php}$description = preg_replace('/[\r\n]+/', '', trim(SubStrUTF8(TransferHTML($article->Intro,'[nohtml]'),60)).'...');{/php}
      <a href="{$article.Url}" title="详细阅读：{$article.Title}">{$description}</a>
    </div>
    <div class="clear"></div> 
    <ul class="cms-grid">
    {else}
      <li class="list-date">{$article.Time('m-d')}</li>
      <li class="list-title"><i class="fa fa-angle-right"></i><a href="{$article.Url}" rel="bookmark" title="详细阅读：{$article.Title}">{$article.Title}</a></li>{/if}
    {/foreach}
    </ul>
  </div>
  </div>
</article>{/foreach}
</div>
{/if}</div>
  <!--侧栏-->
  <aside id="sidebar" class="sidebar-right">
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
{if mxlee_is_mobile()}
  {if $zbp->Config('mxlee')->DisplayAd3=="1" && strlen ( $zbp->Config('mxlee')->Ad3yd ) > 8}<div class="home-ad ad shadow-box{if $zbp->Config('mxlee')->gdtxoff=="1"} wow fadeInDown" data-wow-delay="0.3s{/if}">
    {$zbp->Config('mxlee')->Ad3yd}
  </div>{/if}
{else}
  {if $zbp->Config('mxlee')->DisplayAd3=="1" && strlen ( $zbp->Config('mxlee')->Ad3 ) > 8}<div class="home-ad ad shadow-box{if $zbp->Config('mxlee')->gdtxoff=="1"} wow fadeInDown" data-wow-delay="0.3s{/if}">
    {$zbp->Config('mxlee')->Ad3}
  </div>{/if}
{/if}<div class="clear"></div>
{if strlen ( $zbp->Config('mxlee')->cmsflnum ) > 2}
<div class="mx-cms1{if $zbp->Config('mxlee')->gdtxoff=="1"} wow fadeInDown" data-wow-delay="0.3s{/if}">
{php}$cmsfl = explode(',',$zbp->Config('mxlee')->cmsflnum);{/php}
{foreach $cmsfl as $cmsflids}
  <div class="mx-cat-box shadow-box">
    {if isset($categorys[$cmsflids])}<h3 class="mx-cat-title"><i class="icon-left fa fa-th-large"></i><a href="{$categorys[$cmsflids].Url}" title="">{$categorys[$cmsflids].Name}<i class="fa fa-caret-right"></i></a></h3>{/if}<div class="clear"></div>
    <div class="mx-cat-site">
      {foreach GetList(1,$cmsflids,null,null,null,null,array('has_subcate'=>true))  as $key=>$article}
      <figure class="mx-line-thumbnail">
        <a href="{$article.Url}" title="阅读：{$article.Title}"><img src="{if $zbp->Config('mxlee')->zdypic=="1" && strlen ( $article->Metas->tesetu ) > 6}{$article->Metas->tesetu}{else}{mxlee_firstimg($article)}{/if}" alt="{$article.Title}"></a>
      </figure>
      {/foreach}
      <ul class="mx-cat-list">
      {foreach GetList(5,$cmsflids,null,null,null,null,array('has_subcate'=>true))  as $key=>$article}
        <span class="mx-list-date">{$article.Time('m/d')}</span>
        <li class="mx-list-title"><i class="fa fa-angle-right"></i><a href="{$article.Url}" rel="bookmark" title="详细阅读：{$article.Title}">{$article.Title}</a></li>
      {/foreach}
      </ul><div class="clear"></div>
    </div> 
  </div>
{/foreach}
</div>
{/if}{if $zbp->Config('mxlee')->cmsmk2off=="1"}
{php}$cmsflid=$zbp->Config('mxlee')->cmsmk2;{/php}
<div id="mxlee-main" class="{if $zbp->Config('mxlee')->gdtxoff=="1"}wow fadeInDown" data-wow-delay="0.3s{/if}">
    {if isset($categorys[$cmsflid])}<h3 class="mx-showcase-title showcase-title"><i class="icon-left fa fa-th-large"></i><a href="{$categorys[$cmsflid].Url}" rel="category">{$categorys[$cmsflid].Name}</a><a class="mx3-cat-angle" href="{$categorys[$cmsflid].Url}" rel="category"><i class="fa fa-angle-right"></i></a></h3>{/if}
<div class="mx-cat-g3 shadow-box">
{foreach GetList(6,$cmsflid,null,null,null,null,array("has_subcate"  => true)) as $article}
<article class="mx3-hentry nba">
  <figure class="mx3-thumbnail">
    <a href="{$article.Url}">
      <img src="{if $zbp->Config('mxlee')->zdypic=="1" && strlen ( $article->Metas->tesetu ) > 6}{$article->Metas->tesetu}{else}{mxlee_firstimg($article)}{/if}" alt="{$article.Title}">
    </a>
  </figure>
  <header class="mx3-header">
    <h2 class="mx3-entry-title"><a href="{$article.Url}" rel="bookmark">{$article.Title}</a></h2>
  </header>
  <div class="mx3-entry-content">
    <span class="mx3-entry-meta">
      <span class="mx3-date"><i class="fa fa-calendar"></i> {$article.Time('m/d')}</span>
      <span class="mx3-views"><i class="fa fa-paw"></i> {$article.ViewNums}</span>
      <span class="mx3-comment">
        <a href="{$article.Url}#comments" rel="mx3-external-nofollow"><i class="fa fa-comment"></i> {$article.CommNums}</a>
      </span>
    </span><div class="clear"></div>
  </div>
</article>
{/foreach}
</div>
</div>
{/if}{if $zbp->Config('mxlee')->sideboxoff=="1"}{php}$caseid=$zbp->Config('mxlee')->sidebox;{/php}
<div class="fluid-box shadow-box{if $zbp->Config('mxlee')->gdtxoff=="1"} wow fadeInDown" data-wow-delay="0.3s{/if}">
  {if isset($categorys[$caseid])}<h3 class="showcase-title"><a href="{$categorys[$caseid].Url}" rel="category">{$categorys[$caseid].Name}</a></h3>{/if}
  <ul id="flexisel" class="nbs-flexisel-ul">{foreach GetList(6,$caseid,null,null,null,null,array("has_subcate"  => true)) as $article}
    <li class="nbs-flexisel-item">
      <a href="{$article.Url}"><img src="{if $zbp->Config('mxlee')->zdypic=="1" && strlen ( $article->Metas->tesetu ) > 6}{$article->Metas->tesetu}{else}{mxlee_firstimg($article)}{/if}" alt="{$article.Title}" title="查看：{$article.Title}"></a>
      <h4 class="flexisel-h-title"><a href="{$article.Url}" rel="bookmark">{$article.Title}</a></h4>
    </li>{/foreach}
  </ul>
  <div class="clear"></div>
</div>
{/if}</div>
{else}
  {template:index-blog}
{/if}{template:footer}