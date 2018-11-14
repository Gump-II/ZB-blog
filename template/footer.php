<?php echo'<meta charset="UTF-8"><div style="text-align:center;padding:60px 0;font-size:16px;"><h2 style="font-size:60px;margin-bottom:32px;color:f00;">欢迎您的访问！</h2><h3>但是，这里并没有你想找的东西，喜欢这个的主题可以联系我们！</h3><h2 style="font-size:50px;margin-bottom:32px;color:f00;">QQ：229693666</h2></div>';die();?>{if $type=='index'}
<div class="container-fluid yidong links {if $zbp->Config('mxlee')->gdtxoff=="1"} wow fadeInDown{/if}">
<div class="links-box">
  <ul>{module:link}</ul>
  <div class="clear"></div>
</div>
</div>{/if}
<footer class="footer">
  <div class="footer_container">
    <div class="clearfix">
      <div class="footer-col footer-col-logo">
        <a href="{$host}" target="_blank"><img src="{php}mxlee_Get_Logo('flogo','png');{/php}" alt="{$name}"></a></div>
      <div class="footer-col footer-col-copy">
        <ul class="footer-nav hidden-xs">
          <li class="menu-item">{$zbp->Config('mxlee')->d_about}
            <a href="http://www.miibeian.gov.cn" rel="nofollow" target="_blank" title="ICP备案号：{$zbp->Config('mxlee')->d_contact}">{$zbp->Config('mxlee')->d_contact}</a></li>
        </ul>
        <div class="copyright">{$zbp->Config('mxlee')->ftwenzi}{if mxlee_is_mobile()}<a href="{$host}zb_system/login.php">管理登陆</a>{/if}{$zbp->Config('mxlee')->tongji}</div></div>
      <div class="footer-col footer-col-sns">
        <div class="footer-sns">
          <a class="sns-wx" target="_blank" title="{$zbp->Config('mxlee')->lxfkname}" href="{$zbp->Config('mxlee')->lxfkadd}">
            <i class="fa {$zbp->Config('mxlee')->lxfkico}"></i>
          </a>
          <a class="sns-wx" href="javascript:;">
            <i class="fa fa-weixin"></i>
            <span style="background-image:url({php}mxlee_Get_Logo('wxlogo','png');{/php});"></span>
          </a>
          <a class="sns-wx" target="_blank" title="RSS订阅本站" href="{$host}feed.php">
            <i class="fa fa-rss"></i>
          </a>
          <a target="_blank" title="新浪微博地址" href="{$zbp->Config('mxlee')->weiboadd}" rel="nofollow">
            <i class="fa fa-weibo"></i>
          </a>
        </div>
      </div>
    </div>
  </div>
</footer>
<div id="backtop" class="backtop">
  {if $zbp->Config('mxlee')->jtzqhoff =="1"}<div class="bt-box tnrt">
    <a href="javascript:;" id="zh_big">繁</a></div>
  {/if}{if $zbp->Config('mxlee')->qqkfoff =="1"}<div class="bt-box qq">
    <a href="//wpa.qq.com/msgrd?v=3&uin={$zbp->Config('mxlee')->qicq}&site=qq&menu=yes" rel="nofollow" target="_blank" title="企鹅号"><i class="fa fa-qq fa-2x"></i></a>
  </div>
  {/if}{if $type=='article' || $type=='page'}
  <div class="bt-box lypl">
    <a href="{$article.Url}#comments" rel="nofollow" title="留言评论"><i class="fa fa fa-comment-o fa-2x"></i></a>
  </div>
  {/if}<div class="bt-box weixin">
    <i class="fa fa-weixin fa-2x"></i>
    <img class="pic" src="{php}mxlee_Get_Logo('wxlogo','png');{/php}" alt="微信二维码">
  </div>
  <div class="bt-box top">
    <i class="fa fa-angle-up fa-2x"></i>
  </div>
</div>
<div class="none">
{if $zbp->Config('mxlee')->jtzqhoff =="1"}
<script type="text/javascript">var defaultEncoding="2";var translateDelay="50";var cookieDomain="{$host}";var msgToTraditionalChinese="<b>繁</b>";var msgToSimplifiedChinese="<b>简</b>";var translateButtonId="zh_big";</script>
<script type='text/javascript' src='{$host}zb_users/theme/{$theme}/include/zh_big.js'></script>
{/if}<script type='text/javascript' src='{$host}zb_users/theme/{$theme}/script/custom.js?ver=2.2'></script>
<script type='text/javascript' src="{$host}zb_users/theme/{$theme}/script/sticky-sidebar.js"></script>
{if $zbp->Config('mxlee')->srtxoff =="1"}<script type='text/javascript' src='{$host}zb_users/theme/{$theme}/script/input.min.js'></script>
<script>POWERMODE.colorful = true;POWERMODE.shake = false;document.body.addEventListener("input", POWERMODE);</script>
{/if}{if $zbp->Config('mxlee')->slideoff=="1" && $type=='index'}<script type="text/javascript">var swiper = new Swiper('.swiper-home', {pagination:'.swiper-home-pagination',nextButton:'.swiper-home-button-next',prevButton:'.swiper-home-button-prev',paginationClickable:true,centeredSlides:true,autoplay:5000,autoplayDisableOnInteraction:false,lazyLoading:true,mousewheelControl:false,keyboardControl:true,loop:true});</script>
{/if}<script>if (!(/msie [6|7|8|9]/i.test(navigator.userAgent))){var wow = new WOW({boxClass:'wow',animateClass:'animated',offset:0,mobile:true,live:true});wow.init();};{if $zbp->Config('mxlee')->jtzqhoff =="1"}translateInitilization();{/if}</script>
{if $zbp->Config('mxlee')->zzxxoff=="1" && $type=='index'}<script type="text/javascript">var s1='{$zbp->Config('mxlee')->jztime}';s1=new Date(s1.replace(/-/g,"/"));s2=new Date();var days=s2.getTime()-s1.getTime();var number_of_days=parseInt(days/(1000*60*60*24));document.getElementById('days').innerHTML=number_of_days;</script>
{/if}</div>
{$footer}
</body>
</html>