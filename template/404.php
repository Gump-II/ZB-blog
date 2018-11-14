<?php echo'<meta charset="UTF-8"><div style="text-align:center;padding:60px 0;font-size:16px;"><h2 style="font-size:60px;margin-bottom:32px;color:f00;">欢迎您的访问！</h2><h3>但是，这里并没有你想找的东西，喜欢这个的主题可以联系我们！</h3><h2 style="font-size:50px;margin-bottom:32px;color:f00;">QQ：229693666</h2></div>';die();?><!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="{$language}" lang="{$language}">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
  <meta name="renderer" content="webkit">
  <title>404预警页面 - {$name}</title>
  <meta name="Keywords" content="{$zbp->Config('brieflee')->Keywords}">
  <meta name="description" content="{$zbp->Config('brieflee')->Description}">
  <meta name="author" content="{$zbp.members[1].StaticName}">
  <meta name="generator" content="{$zblogphp}" />
  <link rel="stylesheet" rev="stylesheet" href="{$host}zb_users/theme/{$theme}/style/{$style}.css" type="text/css" media="all" />
  {if $zbp->Config('mxlee')->gdtxoff=="1"}<link rel="stylesheet" rev="stylesheet" href="{$host}zb_users/theme/{$theme}/style/libs/animate.css" type="text/css" media="all" />
  {/if}<link rel="stylesheet" href="{$host}zb_users/theme/{$theme}/style/font-awesome-4.3.0/css/font-awesome.min.css" media="screen" type="text/css" />
  <script src="{$host}zb_system/script/common.js" type="text/javascript"></script>
  <script src="{$host}zb_system/script/c_html_js_add.php" type="text/javascript"></script>
  <link rel="alternate" type="application/rss+xml" href="{$feedurl}" title="{$name}" />
  <link rel="EditURI" type="application/rsd+xml" title="RSD" href="{$host}zb_system/xml-rpc/?rsd" />
  <link rel="wlwmanifest" type="application/wlwmanifest+xml" href="{$host}zb_system/xml-rpc/wlwmanifest.xml" />
  <link rel="icon" href="{php}mxlee_Get_Logo('favicon','ico');{/php}" type="image/x-icon">
  {$header}{if $zbp->Config('mxlee')->Displayds1=="1"}<style type="text/css">{$zbp->Config('mxlee')->diystyle}</style>
  {/if}<!--[if lte IE 7]><link rel="stylesheet" href="{$host}zb_users/theme/{$theme}/style/font-awesome-4.3.0/css/font-awesome-ie7.min.css"><![endif]-->
  <!--[if lte IE 8]><script src="{$host}zb_users/theme/{$theme}/script/respond.min.js"></script><![endif]-->
</head>
<body>
<header class="site-header">
<div id="header" class="navbar">
<nav id="top-header">
  <div class="top-nav">
    <div class="menu-container">
      <ul id="" class="top-menu"><li>
        {php}mxlee_Plugin_Html_login(){/php}
      </li>
      </ul>
    </div>
    <div id="inf-d">
      <div id="inf-b">
      Hi,<script type="text/javascript">today=new Date();var day; var date; var hello;hour=new Date().getHours();if(hour < 6){ hello=' 凌晨好！ ';}else if(hour < 9){ hello=' 早上好！';}else if(hour < 12){ hello=' 上午好！';}else if(hour < 14){ hello=' 中午好！ ';}else if(hour < 17){ hello=' 下午好！ ';}else if(hour < 19){ hello=' 傍晚好！';}else if(hour < 22){ hello=' 晚上好！ ';}else{ hello='夜深了！ ';}function GetCookie(sName) { var arr = document.cookie.match(new RegExp("(^| )"+sName+"=([^;]*)(;|$)")); if(arr !=null){return unescape(arr[2])}; return null;}var Guest_Name = decodeURIComponent(GetCookie('author'));var webUrl = webUrl;if (Guest_Name != "null" && Guest_Name != "" ){ hello = Guest_Name+' , '+hello+' 欢迎回来。';}document.write(' '+hello);</script>
      今天是：
      <span id="localtime">
        <script type="text/javascript">today=new Date(); var tdate,tday, x,year; var x = new Array("星期日", "星期一", "星期二", "星期三", "星期四", "星期五","星期六");var MSIE=navigator.userAgent.indexOf("MSIE");if(MSIE != -1){ year =(today.getFullYear());} else { year = (today.getYear()+1900);} tdate= year+ "年" + (today.getMonth() + 1 ) + "月" + today.getDate() + "日" + " " + x[today.getDay()];document.write(tdate);</script>
      </span><!---->
      </div><div id="inf-e"></div>
    </div>
  </div>
</nav>
  <div class="header">
  <h1 id="logo">
    <a href="{$host}"><img src="{php}mxlee_Get_Logo('logo','png');{/php}" title="{$name}" alt="{$name}" ></a> 
  </h1>
  <div class="search">
    <form method="post" name="search" action="{$host}zb_system/cmd.php?act=search" class="searchform">
      <input type="text" name="q" placeholder="搜索..." class="text">
      <input type="submit" class="btn" value="搜索">
    </form>
  </div>
  <!-- mobile nav -->
  <div class="nav-sjlogo"><i class="fa fa-navicon"></i></div>
  <div class="nav-sousuo">
    <div class="mini_search">
      <form name="search" class="searchform" method="post" action="{$host}zb_system/cmd.php?act=search">    
        <input class="searchInput" type="text" name="q" size="11" placeholder="请输入搜索内容..." id="ls"/>
        <button type="submit" class="btn-search dtb2" value=""><i class="fa fa-search"></i></button>
      </form>
    </div>
    <a id="mo-so" href="javascript:void(0);"><i class="fa fa-search icon-search"></i></a>
  </div>
  <div class="header-nav" data-type="{if $type=='category'}category{elseif $type=='article'}article{elseif $type=='page'}page{else}index{/if}"  data-infoid="{if $type=='index'&&$page=='1'}index{elseif $type=='category'}{$category.ID}{elseif $type=='article'}{$article.Category.ID}{elseif $type=='page'}{$article.ID}{else}{/if}">
  <aside class="mobile_aside mobile_nav">
    <div class="mobile-menu">
      <ul id="nav" class="nav-pills">
        {module:navbar}
      </ul>
    </div>
  </aside>
  </div>
  </div>
</div>
</header>
<div class="container-fluid home-fluid">
  <div class="site-content primary error">
    <div class="content4 widget-box">
      <header id="post-header">
        <h1 class="post-title">
          <a href="{$host}" title="Error:404-您访问的页面不存在或已删除！" rel="bookmark">Error:404-您访问的页面不存在或已删除！</a></h1>
      </header>
      <div class="error_content">
        <div class="error_left">
          <span class="sp_con">赶紧修，大家等着呢。</span></div>
        <div class="error_right">
          <div class="error_detail">
            <p class="error_p_title">哎呦~ 服务器居然累倒了!</p>
            <p class="error_p_con">● 别急，工程师正在紧急处理，马上就好。</p>
            <p class="error_p_con">● 您可联系站长QQ/微信：<a target="blank" rel="nofollow" href="tencent://message/?uin={$zbp->Config('mxlee')->qicq}&Site=&Menu=yes" title="QQ临时对话">{$zbp->Config('mxlee')->qicq}</a>,通知网站开发人员!</p>
            <p class="error_p_con">● {$name}的进步需要您的反馈,感谢您对我们的支持,请您耐心等待!</p></div>
          <div class="btn_error">
            <a class="btn_back1" href="{$host}">返回首页</a>
            <a class="btn_back2" href="javascript:history.go(-1);">返回上一页</a></div>
        </div>
        <div class="clear"></div>
        <div id="related-posts" class="related-posts">
          <h3>随便看看吧</h3>
          <ul class="widget-content">{foreach GetList(4) as $newlist}
              <li class="related-item post-thumbnail">
                <a href="{$newlist.Url}" title="详细阅读 {$newlist.Title}" rel="bookmark">
                  <img src="{if $zbp->Config('mxlee')->zdypic=="1" && strlen ( $newlist->Metas->tesetu ) > 6}{$newlist->Metas->tesetu}{else}{mxlee_firstimg($newlist)}{/if}" alt="{$newlist.Title}" width="330" height="200">
                  <h5>{$newlist.Title}</h5></a>
              </li>{/foreach}</ul>
        </div>
      </div>
    </div>
  </div><div class="clear"></div>
</div>
{template:footer}