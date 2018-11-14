<?php echo'<meta charset="UTF-8"><div style="text-align:center;padding:60px 0;font-size:16px;"><h2 style="font-size:60px;margin-bottom:32px;color:f00;">欢迎您的访问！</h2><h3>但是，这里并没有你想找的东西，喜欢这个的主题可以联系我们！</h3><h2 style="font-size:50px;margin-bottom:32px;color:f00;">QQ：229693666</h2></div>';die();?>{$comment.CommentUA_GetUserAgent()}

<div class="shadow-box msg noimg{if $zbp->Config('mxlee')->gdtxoff=="1"} wow fadeInDown{/if}" id="cmt{$comment.ID}">
  <div class="msgimg">
    <img class="avatar" src="{$comment.Author.Avatar}" alt="网友昵称：{$comment.Author.StaticName}" title="网友昵称：{$comment.Author.StaticName}"/>
  </div>
<div class="msgtxt">
  <div class="msgname">
    <a href="{$comment.Author.HomePage}" rel="nofollow" target="_blank">{$comment.Author.StaticName}</a><span class="LevelName aulevel{$comment.Author.Level}">{$comment.Author.LevelName}</span><span>{mxlee_TimeAgo($comment.Time())}<a href="#reply" onclick="RevertComment('{$comment.ID}')" class="comment-reply-link">回复</a></span>
    {if $zbp->CheckPlugin('CommentUA')}<span class="WB-OS">
      <img src="{$comment.CommentUA['browser']['img_16']}" title="{$comment.CommentUA['browser']['title']}" alt="" width="auto" height="auto">
      <img src="{$comment.CommentUA['platform']['img_16']}" title="{$comment.CommentUA['platform']['title']}" alt="" width="auto" height="auto">
    </span>
  {/if}</div>
  <div class="msgarticle">
    {if $comment.ParentID!=0}{php}$newc=$zbp->GetCommentByID($comment->ParentID);$atid=$newc->ID;$atname=$newc->Author->StaticName;{/php}<a class="comment_at" href="#comment-{$atid}">@ {$atname}</span></a>{/if}
      {$comment.Content}
    {foreach $comment.Comments as $comment}
      {template:comment}
    {/foreach}
  </div>
</div>
</div>



