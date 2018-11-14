<?php echo'<meta charset="UTF-8"><div style="text-align:center;padding:60px 0;font-size:16px;"><h2 style="font-size:60px;margin-bottom:32px;color:f00;">欢迎您的访问！</h2><h3>但是，这里并没有你想找的东西，喜欢这个的主题可以联系我们！</h3><h2 style="font-size:50px;margin-bottom:32px;color:f00;">QQ：229693666</h2></div>';die();?>{php}
$pattern="/<[img|IMG].*?src=[\'|\"](.*?(?:[\.gif|\.jpg|\.png]))[\'|\"].*?[\/]?>/";
$content = $article->Content;
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
  $zero2=strtotime ($article->Time('y-m-d'));  //过期时间
  $isnew=false;
  if (ceil(($zero1-$zero2)/86400) < 1){
    $isnew=true;
  }
{/php}{if mxlee_is_mobile()}<!-- 移动端 -->
{if $pictotal>=3}<!-- 多图 -->
<article class="post_box multi{if $zbp->Config('mxlee')->gdtxoff=="1"} wow fadeInDown{/if}" id="post_box{$k}"">
	<h3><a href="{$article.Url}"><i class="fa fa-picture-o"></i>{$article.Title}</a></h3>
	<div class="multiimgs" style="display: block;zoom:1;">
		<ul>
			<li><a href="{$article.Url}"><img class="img-multi" src="{$picsrca}" alt="{$article.Title}" title="详细阅读：{$article.Title}" style="display: block;"></a></li>
			<li><a href="{$article.Url}"><img class="img-multi" src="{$picsrcb}" alt="{$article.Title}" title="详细阅读：{$article.Title}" style="display: block;"></a></li>
			<li><a href="{$article.Url}"><img class="img-multi" src="{$picsrcc}" alt="{$article.Title}" title="详细阅读：{$article.Title}" style="display: block;"></a></li>
		</ul>
	</div>
	<div class="multiintro">
    <a href="{$article.Url}" title="查看《{$article.Title}》全文">{php}$description = preg_replace('/[\r\n]+/', '', trim(SubStrUTF8(TransferHTML($article->Intro,'[nohtml]'),108)).'...');{/php}{$description}</a>
  </div>
	<div class="multiinfo">
		<span class="author"><i class="fa fa-list-alt"></i><a href="{$article.Category.Url}">{$article.Category.Name}</a></span>
		<span class="date"><i class="fa fa-calendar"></i>{$article.Time('Y-m-d')}</span>
		<span class="views"><i class="fa fa-paw"></i>{$article.ViewNums}次浏览</span>
		<span class="cmtnum"><i class="fa fa-comment"></i><a href="{$article.Url}#comments">{$article.CommNums}条评论</a></span>
	</div><div class="post-top"></div>
</article>{elseif $pictotal<1 && $zbp->Config('mxlee')->noimgoff=="1"}<!-- 无图 -->
<article class="post_box{if $zbp->Config('mxlee')->gdtxoff=="1"} wow fadeInDown{/if}" id="post_box{$k}">
	<div class="multibox noimg">
		<h3><a href="{$article.Url}"><i class="fa fa-columns"></i>{$article.Title}</a></h3>
    <div class="noimginfo">
      <a href="{$article.Url}" title="查看《{$article.Title}》全文">{php}$description = preg_replace('/[\r\n]+/', '', trim(SubStrUTF8(TransferHTML($article->Intro,'[nohtml]'),246)).'...');{/php}{$description}</a>
    </div>
		<div class="noimgtags">
			<span class="no-author"><i class="fa fa-list-alt"></i><a href="{$article.Category.Url}">{$article.Category.Name}</a></span>
			<span class="no-date"><i class="fa fa-calendar"></i>{$article.Time('Y-m-d')}</span>
			<span class="no-views"><i class="fa fa-paw"></i>{$article.ViewNums}次浏览</span>
			<span class="no-cmtnum"><i class="fa fa-comment"></i><a href="{$article.Url}#comments">{$article.CommNums}条评论</a></span>
      <a class="read-more right" href="{$article.Url}" title="详细阅读：{$article.Title}">阅读全文</a>
		</div>
	</div><div class="post-top"></div>
</article>{else}<!-- 单图 -->
<article class="post_box{if $zbp->Config('mxlee')->gdtxoff=="1"} wow fadeInDown{/if}" id="post_box{$k}">
  <div class="post-img col-xs-4">
    <a href="{$article.Url}" style="display: block;zoom:1;">
      <img class="img-responsive img-rounded imgs" src="{if $zbp->Config('mxlee')->zdypic=="1" && strlen ( $article->Metas->tesetu ) > 6}{$article->Metas->tesetu}{else}{mxlee_firstimg($article)}{/if}" alt="{$article.Title}" title="详细阅读：{$article.Title}" style="display: block;"><em></em>
    </a>
  </div>
  <div class="post-left">
    <h3><a href="{$article.Url}" title="{$article.Title}">{$article.Title}</a></h3>
    <div class="post-con">
      <a href="{$article.Url}" title="查看《{$article.Title}》全文">{php}$description = preg_replace('/[\r\n]+/', '', trim(SubStrUTF8(TransferHTML($article->Intro,'[nohtml]'),150)).'...');{/php}{$description}</a>
    </div>
    <aside class="item-meta">
      <span class="mu-ml"><i class="fa fa-list-alt"></i><a href="{$article.Category.Url}">{$article.Category.Name}</a></span>
      <span class="mu-ml-clock"><i class="fa fa-calendar"></i>{$article.Time('Y-m-d')}</span>
      <span class="mu-ml-eye"><i class="fa fa-paw"></i>{$article.ViewNums}次浏览</span>
      <span class="mu-ml-comment"><i class="fa fa-comment"></i><a href="{$article.Url}#comments">{$article.CommNums}条评论</a></span>
      <a class="read-more right" href="{$article.Url}" title="详细阅读：{$article.Title}">阅读全文</a>
    </aside>
  </div><div class="post-top"></div>
</article>
{/if}
{else}<!-- PC端 -->
{if $pictotal<1 && $zbp->Config('mxlee')->noimgoff=="1"}<!-- 无图 -->
<article class="post_box{if $zbp->Config('mxlee')->gdtxoff=="1"} wow fadeInDown{/if}" id="post_box{$k}">
	<div class="multibox noimg">
		<h3><a href="{$article.Url}"><i class="fa fa-columns"></i>{$article.Title}</a></h3>
    <div class="noimginfo">
      <a href="{$article.Url}" title="查看《{$article.Title}》全文">{php}$description = preg_replace('/[\r\n]+/', '', trim(SubStrUTF8(TransferHTML($article->Intro,'[nohtml]'),246)).'...');{/php}{$description}</a>
    </div>
		<div class="noimgtags">
			<span class="no-author"><i class="fa fa-list-alt"></i><a href="{$article.Category.Url}">{$article.Category.Name}</a></span>
			<span class="no-date"><i class="fa fa-calendar"></i>{$article.Time('Y-m-d')}</span>
			<span class="no-views"><i class="fa fa-paw"></i>{$article.ViewNums}次浏览</span>
			<span class="no-cmtnum"><i class="fa fa-comment"></i><a href="{$article.Url}#comments">{$article.CommNums}条评论</a></span>
      <a class="read-more right" href="{$article.Url}" title="详细阅读：{$article.Title}">阅读全文</a>
		</div>
	</div><div class="post-top"></div>
</article>{else}<!-- 有图 -->
<article class="post_box{if $zbp->Config('mxlee')->gdtxoff=="1"} wow fadeInDown{/if}" id="post_box{$k}">
  <div class="post-img col-xs-4">
    <a href="{$article.Url}" style="display: block;zoom:1;">
      <img class="img-responsive img-rounded imgs" src="{if $zbp->Config('mxlee')->zdypic=="1" && strlen ( $article->Metas->tesetu ) > 6}{$article->Metas->tesetu}{else}{mxlee_firstimg($article)}{/if}" alt="{$article.Title}" title="详细阅读：{$article.Title}" style="display: block;"><em></em>
    </a>
  </div>
  <div class="post-left">
    <h3><a href="{$article.Url}" title="{$article.Title}">{$article.Title}</a></h3>
    <div class="post-con">
      <a href="{$article.Url}" title="查看《{$article.Title}》全文">{php}$description = preg_replace('/[\r\n]+/', '', trim(SubStrUTF8(TransferHTML($article->Intro,'[nohtml]'),150)).'...');{/php}{$description}</a>
    </div>
    <aside class="item-meta">
      <span class="mu-ml"><i class="fa fa-list-alt"></i><a href="{$article.Category.Url}">{$article.Category.Name}</a></span>
      <span class="mu-ml-clock"><i class="fa fa-calendar"></i>{$article.Time('Y-m-d')}</span>
      <span class="mu-ml-eye"><i class="fa fa-paw"></i>{$article.ViewNums}次浏览</span>
      <span class="mu-ml-comment"><i class="fa fa-comment"></i><a href="{$article.Url}#comments">{$article.CommNums}条评论</a></span>
      <a class="read-more right" href="{$article.Url}" title="详细阅读：{$article.Title}">阅读全文</a>
    </aside>
  </div><div class="post-top"></div>
</article>
{/if}{/if}<!-- End -->