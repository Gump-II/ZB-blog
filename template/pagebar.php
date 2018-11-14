<?php echo'<meta charset="UTF-8"><div style="text-align:center;padding:60px 0;font-size:16px;"><h2 style="font-size:60px;margin-bottom:32px;color:f00;">欢迎您的访问！</h2><h3>但是，这里并没有你想找的东西，喜欢这个的主题可以联系我们！</h3><h2 style="font-size:50px;margin-bottom:32px;color:f00;">QQ：229693666</h2></div>';die();?>{* Template Name:分页条 *}{if $pagebar}
{foreach $pagebar.buttons as $k=>$v}
{if $pagebar.PageNow==$k}
<a class="on">{$k}</a>
{elseif $k=='‹‹' and $pagebar.PageNow!=$pagebar.PageFirst}
<a href="{$pagebar.buttons['‹‹']}" class="c-nav ease shouye" title="首页">首页</a>
{elseif $k=='‹‹' and $pagebar.PageNow==$pagebar.PageFirst}
{elseif $k=='››' and $pagebar.PageNow==$pagebar.PageLast}
{elseif $k=='››' and $pagebar.PageNow!=$pagebar.PageLast}
<a href="{$pagebar.buttons['››']}" class="c-nav ease moye" title="末页">末页 </a>
{elseif $k=='‹'}
<a href="{$v}" title="上一页" class="c-nav prev ease syy">上一页</a>
<a href="{$v}" title="...">...</a>
{elseif $k=='›'}
<a href="{$v}" title="...">...</a>
<a href="{$v}" title="下一页" class="c-nav next ease xyy">下一页</a>
{else}
<a href="{$v}" title="第{$k}页" >{$k}</a>
{/if}
{/foreach}
{/if}