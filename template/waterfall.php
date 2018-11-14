<?php echo'<meta charset="UTF-8"><div style="text-align:center;padding:60px 0;font-size:16px;"><h2 style="font-size:60px;margin-bottom:32px;color:f00;">欢迎您的访问！</h2><h3>但是，这里并没有你想找的东西，喜欢这个的主题可以联系我们！</h3><h2 style="font-size:50px;margin-bottom:32px;color:f00;">QQ：229693666</h2></div>';die();?>{template:header}
<div class="waterfall-show">
  <div class="link-s">
    <section class="pk-title"><h2>{$title}</h2>{if strlen ( $category.Intro ) > 0}{$category.Intro}{else}{$zbp->Config('mxlee')->Description}{/if}</section>
    <div class="pk-line pk-line-l"></div>
    <div class="pk-line pk-line-r"></div>
  </div>
  <div class="index-list">
    <ul class="qx_list" id="wrap">
    {foreach $articles as $article}
      {template:show-multi}
    {/foreach}
    </ul>
  </div>
  <div class="pagebar">
    {if $pagebar}{foreach $pagebar.buttons as $k=>$v}{if $pagebar.PageNow==$k}<span class="page now-page">{$k}</span>{elseif $k=='‹'}<a href="{$v}"><span class="page">‹‹</span></a>{elseif $k=='›'}<span class="next-page"  id="npage"><a href="{$v}">下一页</a></span>{else}<a href="{$v}"><span class="page">{$k}</span></a>{/if}{/foreach}
  {/if}</div>
  <span id="days"></span>
</div>
</div>
<script src="{$host}zb_users/theme/{$theme}/script/masonry.js"></script>
<script type="text/javascript">
$(function(wrap) {
    var $container = $('#wrap');
    $container.imagesLoaded(function() {
        $container.masonry({
            itemSelector: '.box',
            gutter: 20
        })
    });
    $container.infinitescroll({
        navSelector: "#npage",
        nextSelector: "#npage a",
        itemSelector: ".box",
        pixelsFromNavToBottom: 300,
        loading: {
            img: "{$host}zb_users/theme/{$theme}/style/images/pbl-loading.gif",
            msgText: '\u73a9\u547d\u52a0\u8f7d\u4e2d\u002e\u002e\u002e',
            finishedMsg: '\u007e\u6211\u662f\u6709\u5e95\u7ebf\u7684\u007e',
        }
    },
    function(newElements) {
        var $newElems = $(newElements).css({
            opacity: 0
        });
        $newElems.imagesLoaded(function() {
            $newElems.animate({
                opacity: 1
            });
            $container.masonry('appended', $newElems, true)
        })
    })
});
</script>
{template:footer}