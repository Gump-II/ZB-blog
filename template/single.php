<?php echo'<meta charset="UTF-8"><div style="text-align:center;padding:60px 0;font-size:16px;"><h2 style="font-size:60px;margin-bottom:32px;color:f00;">欢迎您的访问！</h2><h3>但是，这里并没有你想找的东西，喜欢这个的主题可以联系我们！</h3><h2 style="font-size:50px;margin-bottom:32px;color:f00;">QQ：229693666</h2></div>';die();?>{template:header}
<div class="container-fluid home-fluid">
<div class="site-content">
  <nav class="navcates">
    当前位置：<i class="fa fa-home"></i><a href="{$host}">首页</a><i class="fa fa-angle-right"></i>{if $type=='page'}<a href="{$article.Url}" rel="bookmark" target="_blank" title="正在阅读 {$article.Title}">{$article.Title}</a>{else}<a href="{$article.Category.Url}" title="查看 {$article.Category.Name} 中的全部文章">{$article.Category.Name}</a><i class="fa fa-angle-right"></i><a href="{$article.Url}" rel="bookmark" target="_blank" title="正在阅读 {$article.Title}">{$article.Title}</a>{/if}
  </nav>
  <div class="site-main content-left">
    {if $article.Type==ZC_POST_TYPE_ARTICLE}
      {template:post-single}
    {else}
      {template:post-page}
    {/if}
  </div>
  <aside class="sidebar sidebar-right">
    {template:sidebar3}
  </aside>
</div><div class="clear"></div>
</div>
{template:footer}