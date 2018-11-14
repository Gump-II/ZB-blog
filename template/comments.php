<?php echo'<meta charset="UTF-8"><div style="text-align:center;padding:60px 0;font-size:16px;"><h2 style="font-size:60px;margin-bottom:32px;color:f00;">欢迎您的访问！</h2><h3>但是，这里并没有你想找的东西，喜欢这个的主题可以联系我们！</h3><h2 style="font-size:50px;margin-bottom:32px;color:f00;">QQ：229693666</h2></div>';die();?>{if $socialcomment}
  {$socialcomment}
{else}
<!--评论框-->
{if !$article.IsLock}
  {template:commentpost}
{/if}
<!--评论框结束-->
<!--评论输出-->
<ol class="commentlist">
<div class="comment-tab">
  <div class="come-comt">
    <i class="fa fa-comments"></i>评论列表 <span id="comment_count">{if $article.CommNums==0}（暂无评论，共<span style="color:#E1171B">{$article.ViewNums}</span>人参与）{else}（已有<span style="color:#E1171B">{$article.CommNums}</span>条评论，共<span style="color:#E1171B">{$article.ViewNums}</span>人参与）{/if}</span><span class="iliuyan"><a href="{$article.Url}#comment"><i class="fa fa-bell"></i>参与讨论</a></span>
  </div>
</div>
{if $article.CommNums==0}<h2 class="comment-text-center"><i class="fa fa-frown-o"></i> 还没有评论，来说两句吧...</h2>{/if}
<label id="AjaxCommentBegin"></label>
{foreach $comments as $key => $comment}
  {template:comment}
{/foreach}
<!--评论输出结束-->
<!--评论翻页条输出-->
{if $article.CommNums>$option['ZC_COMMENTS_DISPLAY_COUNT']}
  <div id="comments-nav" class="com-page{if $zbp->Config('mxlee')->gdtxoff=="1"} wow fadeInDown{/if}">
    <div class="com-page-list">
      {template:pagebar}
    </div>
  </div>
{/if}
<label id="AjaxCommentEnd"></label>
<!--评论翻页条输出结束-->
</ol>
{/if}