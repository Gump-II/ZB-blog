<?php echo'<meta charset="UTF-8"><div style="text-align:center;padding:60px 0;font-size:16px;"><h2 style="font-size:60px;margin-bottom:32px;color:f00;">欢迎您的访问！</h2><h3>但是，这里并没有你想找的东西，喜欢这个的主题可以联系我们！</h3><h2 style="font-size:50px;margin-bottom:32px;color:f00;">QQ：229693666</h2></div>';die();?><div class="widget-box post-page">
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
      {if $user.Level == 1}<a href="{$host}zb_system/cmd.php?act=PageEdt&id={$article.ID}" class="sing-bj" title="编辑本文" target="_blank"><i class="fa fa-pencil"></i>编辑本文</a>{/if}
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
    {$article.Content}
  </div>
{if $zbp->Config('mxlee')->diyzzjj=="1"}
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
      <p class="author-description">{$zbp->Config('mxlee')->wz_about}</p>
    </div>
    </div>
    {if $zbp->Config('mxlee')->diybdfx=="1"}
    <div class="bdshare">
      {$zbp->Config('mxlee')->bdfenxiang}
    </div>
    {/if}
  </div>
{/if}
  <div class="nav-links"><!--全局上下篇-->
    {if $article.Prev}<div class="nav-previous"><a href="{$article.Prev.Url}" rel="prev"><span class="meta-nav-r"><i class="fa fa-angle-left"></i></span></a></div>{/if}
    {if $article.Next}<div class="nav-next"><a href="{$article.Next.Url}" rel="next"><span class="meta-nav-l"><i class="fa fa-angle-right"></i></span></a></div>{/if}
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