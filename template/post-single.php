<?php echo'<meta charset="UTF-8"><div style="text-align:center;padding:60px 0;font-size:16px;"><h2 style="font-size:60px;margin-bottom:32px;color:f00;">欢迎您的访问！</h2><h3>但是，这里并没有你想找的东西，喜欢这个的主题可以联系我们！</h3><h2 style="font-size:50px;margin-bottom:32px;color:f00;">QQ：229693666</h2></div>';die();?><div class="widget-box post-single">
<article id="post-20574" class="widget-content single-post">
  <header id="post-header">
    <div class="post-meta">
      <span class="time">{$article.Time('Y年m月d日')}</span>
      <span class="eye"><i class="fa fa-eye"></i>{$article.ViewNums}</span>
      <span class="comm"><a href="{$article.Url}#comments"><i class="fa fa-comment-o"></i>{$article.CommNums}</a></span>
      <span class="r-hide"><a title="侧边栏"><i class="fa fa-caret-left"></i><i class="fa fa-caret-right"></i></a></span>
    </div>
    <div id="font-change" class="left">
      <span id="font-dec"><a href="#" title="减小字体">-</a></span>
      <span id="font-n"><a href="#" title="默认大小">N</a></span>
      <span id="font-inc"><a href="#" title="增大字体">+</a></span>
      {if $user.Level == 1}<a href="{$host}zb_system/cmd.php?act=ArticleEdt&id={$article.ID}" class="sing-bj" title="编辑本文" target="_blank"><i class="fa fa-pencil"></i>编辑本文</a>{/if}
    </div>
    <h2 class="post-title"><a href="{$article.Url}" title="正在阅读：{$article.Title}" rel="bookmark">{$article.Title}</a></h2>
    <div class="clear"></div>
  </header>
{if mxlee_is_mobile()}
  {if $zbp->Config('mxlee')->listad2on=="1" && strlen ( $zbp->Config('mxlee')->listad2yd ) > 8}<div class="entry-ad">
    {$zbp->Config('mxlee')->listad2yd}
  </div>{/if}
{else}
  {if $zbp->Config('mxlee')->listad2on=="1" && strlen ( $zbp->Config('mxlee')->listad2 ) > 8}<div class="entry-ad">
    {$zbp->Config('mxlee')->listad2}
  </div>{/if}
{/if}
  <div class="entry">
    {if $zbp->Config('mxlee')->wzzyoff=="1"}<div class="excerpt">
      <h4 class="ex-h4"><img src="{php}mxlee_Get_Logo('favicon','ico');{/php}">原标题：{$article.Title}</h4>
      <p class="ex-strong"><i class="fa fa-bullseye"></i>导读：</p>
      <p>{php}$intro = preg_replace('/[\r\n]+/', '', trim(SubStrUTF8(TransferHTML($article->Intro,'[nohtml]'),88)).'...');{/php}{$intro}</p>
    </div>
    {/if}{$article.Content}
    {php}if ($zbp->CheckPlugin('ZCenter')) {
      echo '<script>zcenter_checksubscribe("favorite",'.$article->ID.'); </script><span class="muted zcenter_favorite"></span>';
    }{/php}
    {if $zbp->Config('mxlee')->tougaooff=="1"}<div class="article-join">
      <p>{$zbp->Config('mxlee')->wz_tougao}</p>
    </div>{/if}
  </div>
{if mxlee_is_mobile() && $zbp->Config('mxlee')->bdxzhgz=="1"}<div style="padding-left: 17px; padding-right: 17px;">
    <script>cambrian.render('tail')</script>
</div>
{/if}{if $zbp->Config('mxlee')->zanshangoff=="1"}
<div class="ds-reward-stl">
  <button id="dsRewardBtn" onclick="PaymentUtils.show();"><i class="fa fa-usd"></i>赏</button>
  <script type="text/javascript" src="{$host}zb_users/theme/{$theme}/script/award.js"></script>
</div>
{/if}{if Count($article.Tags)>0}<div class="entry-meta">
    <p class="post-tag">标签：{foreach $article.Tags as $tag}<a href="{$tag.Url}" rel="tag" title="查看标签为《{$tag.Name}》的所有文章">{$tag.Name}</a>{/foreach}</p>
  </div>
{/if}{if $zbp->Config('mxlee')->diyzzjj=="1"}
  <div id="authorarea">
    <div class="authorinfo">
    <div class="author-avater">
      <img class="avaterimg" alt="作者：{$article.Author.StaticName}" title="作者：{$article.Author.StaticName}" src="{$article.Author.Avatar}" height="50" width="50">
    </div>
    <div class="author-des">
      <div class="author-meta">
        <span class="post-author-name"><a href="{$article.Author.Url}" title="由{$article.Author.StaticName}发布" rel="author">{$article.Author.StaticName}</a></span>
        <span class="post-author-tatus"><a href="{$article.Author.Url}" target="_blank">{$article.Author.Articles}篇文章</a></span>
        <span class="post-author-url"><a href="{$host}" rel="nofollow" target="_blank">站点</a></span>
        {if strlen ( $zbp->Config('mxlee')->weiboadd ) > 10}<span class="post-author-weibo"><a href="{$zbp->Config('mxlee')->weiboadd}" rel="nofollow" target="_blank">微博</a></span>{/if}
      </div>
	  {if $zbp->Config('mxlee')->randhello=="1"}
		  <script type="text/javascript" src="{$host}zb_users/theme/{$theme}/include/hitokoto/?format=js&charset=utf-8"></script>
		  <div id="hitokoto"><script>hitokoto()</script></div>
	  {else}
		  <div id="hitokoto">{$zbp->Config('mxlee')->wz_about}</div>
	  {/if}</div>
    </div>
    {if $zbp->Config('mxlee')->diybdfx=="1"}
    <div class="bdshare">
      {$zbp->Config('mxlee')->bdfenxiang}
    </div>
    {/if}
  </div>
{/if}
  <div class="post-navigation">
    <a href="{$article.Category.Url}" class="backtolist">返回列表</a>
    {if $article.Prev}<div class="post-previous"><span>上一篇：</span><a href="{$article.Prev.Url}" rel="prev">{$article.Prev.Title}</a></div>{/if}
    {if $article.Next}<div class="post-next"><span>下一篇：</span><a href="{$article.Next.Url}" rel="next">{$article.Next.Title}</a></div>{/if}
  </div>
  <div class="nav-links"><!--全局上下篇-->
    {if $article.Prev}<div class="nav-previous"><a href="{$article.Prev.Url}" rel="prev"><span class="meta-nav-r"><i class="fa fa-angle-left"></i></span></a></div>{/if}
    {if $article.Next}<div class="nav-next"><a href="{$article.Next.Url}" rel="next"><span class="meta-nav-l"><i class="fa fa-angle-right"></i></span></a></div>{/if}
  </div>
  <div id="related-posts" class="related-posts">
  <h3><span class="h3line">相关文章</span>
    {if Count($article.Tags)>0}<div class="post-tags-key">
      <span class="post-keyword">
        关键词：{foreach $article.Tags as $tag}<a href="{$tag.Url}" target="_blank" rel="tag">{$tag.Name}</a>{/foreach}
      </span>
    </div>{/if}
  </h3>
  <ul class="widget-content">
    {if strlen ( $article.Tag ) > 0}
    {foreach GetList(4,null,null,null,null,null,array('is_related'=>$article.ID)) as $related}
      {php}
      $randnum = mt_rand(1,20);
      $pattern="/<[img|IMG].*?src=[\'|\"](.*?(?:[\.gif|\.jpg|\.png]))[\'|\"].*?[\/]?>/"; 
      $content = $related->Content; 
      preg_match_all($pattern,$content,$matchContent); 
      if(isset($matchContent[1][0])) 
        $temp=$matchContent[1][0]; 
      else 
        $temp="$host"."zb_users/theme/$theme/include/noimg/" . $randnum . ".jpg"; 
      {/php}
    <li class="related-item post-thumbnail">
      <a href="{$related.Url}" title="详细阅读 {$related.Title}" rel="bookmark"><img src="{if $zbp->Config('mxlee')->zdypic=="1" && strlen ( $related->Metas->tesetu ) > 6}{$related->Metas->tesetu}{else}{$temp}{/if}" alt="{$related.Title}" width="330" height="200"><span>{$related.Title}</span></a>
    </li>
    {/foreach}
  {else}
    {foreach GetList(4) as $newlist}
      {php}
      $randnum = mt_rand(1,20);
      $pattern="/<[img|IMG].*?src=[\'|\"](.*?(?:[\.gif|\.jpg|\.png]))[\'|\"].*?[\/]?>/"; 
      $content = $newlist->Content; 
      preg_match_all($pattern,$content,$matchContent); 
      if(isset($matchContent[1][0])) 
        $temp=$matchContent[1][0]; 
      else 
        $temp="$host"."zb_users/theme/$theme/include/noimg/" . $randnum . ".jpg"; 
      {/php}
    <li class="related-item post-thumbnail">
      <a href="{$newlist.Url}" title="详细阅读 {$newlist.Title}" rel="bookmark"><img src="{if $zbp->Config('mxlee')->zdypic=="1" && strlen ( $newlist->Metas->tesetu ) > 6}{$newlist->Metas->tesetu}{else}{$temp}{/if}" alt="{$newlist.Title}" width="330" height="200"><span>{$newlist.Title}</span></a>
    </li>
    {/foreach}
    {/if}
  </ul>
  </div>
{if mxlee_is_mobile()}
  {if $zbp->Config('mxlee')->DisplaymAd1=="1" && strlen ( $zbp->Config('mxlee')->mAd1yd ) > 8}<div class="single-ad{if $zbp->Config('mxlee')->gdtxoff=="1"} wow fadeInDown" data-wow-delay="0.1s{/if}">
    {$zbp->Config('mxlee')->mAd1yd}
  </div>{/if}
{else}
  {if $zbp->Config('mxlee')->DisplaymAd1=="1" && strlen ( $zbp->Config('mxlee')->mAd1 ) > 8}<div class="single-ad{if $zbp->Config('mxlee')->gdtxoff=="1"} wow fadeInDown" data-wow-delay="0.1s{/if}">
    {$zbp->Config('mxlee')->mAd1}
  </div>{/if}
{/if}
  {if !$article.IsLock}<section id="comments">  
    {template:comments}
    <span class="icon icon_comment" title="comment"></span>
  </section>
{/if}</article>
</div>