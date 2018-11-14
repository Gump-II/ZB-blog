<?php echo'<meta charset="UTF-8"><div style="text-align:center;padding:60px 0;font-size:16px;"><h2 style="font-size:60px;margin-bottom:32px;color:f00;">欢迎您的访问！</h2><h3>但是，这里并没有你想找的东西，喜欢这个的主题可以联系我们！</h3><h2 style="font-size:50px;margin-bottom:32px;color:f00;">QQ：229693666</h2></div>';die();?><div id="comt-respond" class="commentpost{if $zbp->Config('mxlee')->gdtxoff=="1"} wow fadeInDown{/if}" id="comment">
  <h4><i class="fa fa-pencil"></i>发表评论<span><a rel="nofollow" id="cancel-reply" href="#comment" style="display:none;"><small>取消回复</small></a></span><span class="jubao"><a rel="nofollow" href="http://www.12377.cn/" target="_blank"><small><i class="fa fa-exclamation-triangle"></i>中国互联网举报中心</small></a></span></h4>
  <form id="frmSumbit" target="_self" method="post" action="{$article.CommentPostUrl}" >
  <input type="hidden" name="inpId" id="inpId" value="{$article.ID}" />
  <input type="hidden" name="inpRevID" id="inpRevID" value="0" />
{if $user.ID>0}
  <input type="hidden" name="inpName" id="inpName" value="{$user.Name}" />
  <input type="hidden" name="inpEmail" id="inpEmail" value="{$user.Email}" />
  <input type="hidden" name="inpHomePage" id="inpHomePage" value="{$user.HomePage}" />  
{else}
  <div class="comt-box">
  <div class="form-group liuyan form-name"><input type="text" id="inpName" class="text" name="inpName" tabindex="1" value="访客" placeholder="名称（必填）"></div>
  <div class="form-group liuyan form-email"><input type="text" id="inpEmail" class="text" name="inpEmail" tabindex="2" placeholder="邮箱"> </div>
  <div class="form-group liuyan form-www"><input type="text" id="inpHomePage" name="inpHomePage" onfocus="this.value='http://';" class="text" tabindex="3" placeholder="网址"></div></div>
{/if}
  <!--verify-->
  <div id="comment-tools">
    <span class="com-title">快捷回复：</span>
    <a title="粗体字" onmousedown="InsertText(objActive,ReplaceText(objActive,'[B]','[/B]'),true);"><i class="fa fa-bold"></i></a>
    <a title="斜体字" onmousedown="InsertText(objActive,ReplaceText(objActive,'[I]','[/I]'),true);"><i class="fa fa-italic"></i></a>
    <a title="下划线" onmousedown="InsertText(objActive,ReplaceText(objActive,'[U]','[/U]'),true);"><i class="fa fa-underline"></i></a>
    <a title="删除线" onmousedown="InsertText(objActive,ReplaceText(objActive,'[S]','[/S]'),true);"><i class="fa fa-strikethrough"></i></a>
    <a href="javascript:addNumber('{$zbp->Config('mxlee')->diyubhao}')" title="{$zbp->Config('mxlee')->diyubhao}"><i class="fa fa-thumbs-o-up"></i></a>
    <a href="javascript:addNumber('{$zbp->Config('mxlee')->diyubcai}')" title="{$zbp->Config('mxlee')->diyubcai}"><i class="fa fa-thumbs-o-down"></i></a>
    <a href="javascript:addNumber('{$zbp->Config('mxlee')->diyubding}')" title="{$zbp->Config('mxlee')->diyubding}"><i class="fa fa-heart"></i></a>
  </div>
  <textarea placeholder="{$zbp->Config('mxlee')->diyplwz}" name="txaArticle" id="txaArticle" class="text input-block-level comt-area" cols="50" rows="4" tabindex="5" onkeydown="if(event.ctrlKey&amp;&amp;event.keyCode==13){document.getElementById('submit').click();return false};"></textarea>
  <p>{if $option['ZC_COMMENT_VERIFY_ENABLE']}
  <div class="form-inpVerify"> 
  <div class="input-inpVerify"><input type="text" id="inpVerify" name="inpVerify" tabindex="4" placeholder="验证码">
  <div class="input-group-addon"><img src="{$article.ValidCodeUrl}" alt="验证码" class="verifyimg" onclick="javascript:this.src='{$article.ValidCodeUrl}&amp;tm='+Math.random();" /></div></div></div>
  {/if}<input name="sumbit" type="submit" tabindex="6" value="提交" onclick="return zbp.comment.post()" class="button" /></p>
  </form>
</div>