<?php echo'<meta charset="UTF-8"><div style="text-align:center;padding:60px 0;font-size:16px;"><h2 style="font-size:60px;margin-bottom:32px;color:f00;">欢迎您的访问！</h2><h3>但是，这里并没有你想找的东西，喜欢这个的主题可以联系我们！</h3><h2 style="font-size:50px;margin-bottom:32px;color:f00;">QQ：229693666</h2></div>';die();?><!DOCTYPE html>
<!--
//                          _ooOoo_
//                         o8888888o
//                         88" . "88
//                         (| ^_^ |)
//                         O\  =  /O
//                      ____/`---'\____
//                    .'  \\|     |//  `.
//                   /  \\|||  :  |||//  \
//                  /  _||||| -:- |||||-  \
//                  |   | \\\  -  /// |   |
//                  | \_|  ''\---/''  |   |
//                  \  .-\__  `-`  ___/-. /
//                ___`. .'  /--.--\  `. . ___
//              ."" '<  `.___\_<|>_/___.'  >'"".
//            | | :  `- \`.;`\ _ /`;.`/ - ` : | |
//            \  \ `-.   \_ __\ /__ _/   .-` /  /
//      ========`-.____`-.___\_____/___.-`____.-'========
//                           `=---='//
//
//            拦截插件累计拦截逗比攻击"3838438"次！
//        .............................................
//                  佛祖保佑         永无BUG
//                                                               
//                     江城子 . 程序员之歌
// 
//               十年生死两茫茫，写程序，到天亮。
//                     千行代码，Bug何处藏。
//               纵使上线又怎样，朝令改，夕断肠。           
// 
//               领导每天新想法，天天改，日日忙。
//                    相顾无言，惟有泪千行。
//               每晚灯火阑珊处，夜难寐，加班狂。
//
-->
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
  <meta name="renderer" content="webkit">
  {if $type=='article'}<title>{$title} - {$article.Category.Name} - {$name}</title>
  {php} $aryTags = array(); foreach($article->Tags as $key){ $aryTags[] = $key->Name; } if(count($aryTags)>0){ $keywords = implode(',',$aryTags); } else { $keywords = $zbp->Config('mxlee')->Keywords; }$description = preg_replace('/[\r\n]+/', '', trim(SubStrUTF8(TransferHTML($article->Intro,'[nohtml]'),88)).'...');{/php}<meta name="keywords" content="{if $zbp->Config('mxlee')->zdywzseo=="1"}{$article->Metas->mxleekey}{else}{$keywords}{/if}" />
  <meta name="description" content="{if $zbp->Config('mxlee')->zdywzseo=="1"}{$article->Metas->mxleedesc}{else}{$description}{/if}" />
  <meta name="author" content="{$article.Author.StaticName}">
  {elseif $type=='category'}<title>{if $zbp->Config('mxlee')->zdywzseo=="1"}{$category->Metas->mxlee_diytitles}{if $page>'1'} - 第{$pagebar.PageNow}页{/if}{else}{$title} - {$name}{if $page>'1'} - 第{$pagebar.PageNow}页{/if}{/if}</title>
  <meta name="Keywords" content="{if $zbp->Config('mxlee')->zdywzseo=="1"}{$category->Metas->mxlee_diykeywords}{else}{$title},{$name}{/if}">
  {php} $intro= preg_replace('/[\r\n]+/', '', trim(SubStrUTF8(TransferHTML($category->Intro,'[nohtml]'),188)).'......'); {/php}<meta name="description" content="{if $zbp->Config('mxlee')->zdywzseo=="1"}{$category->Metas->mxlee_diydescrip}{elseif $category.Intro>'0'}{$intro}{else}{$title},{$name},{$zbp->Config('mxlee')->Description}{/if}">
  {elseif $type=='page'}<title>{$title} - {$name} - {$subname}</title>
  <meta name="keywords" content="{$title},{$name}" />
  {php}$description = preg_replace('/[\r\n]+/', ' ', trim(SubStrUTF8(TransferHTML($article->Content,'[nohtml]'),88)).'...');{/php}<meta name="description" content="{$description}" />
  <meta name="author" content="{$article.Author.StaticName}">
  {elseif $type=='index'}<title>{$name}{if $page>'1'} - 第{$pagebar.PageNow}页{/if} - {$subname}</title>
  <meta name="description" content="{$zbp->Config('mxlee')->Description}" />
  <meta name="keywords" content="{$zbp->Config('mxlee')->Keywords}" />
  <meta name="author" content="{$zbp.members[1].StaticName}">
  <meta name="txqq" content="{$zbp->Config('mxlee')->qicq}" />
  {else}<title>{$title} - {$name}{if $page>'1'} - 第{$pagebar.PageNow}页{/if}</title>
  <meta name="Keywords" content="{$title},{$name}">
  <meta name="description" content="{$title},{$name},{$zbp->Config('mxlee')->Description}">
  <meta name="author" content="{$zbp.members[1].StaticName}">
  {/if}<meta name="generator" content="{$zblogphp}" />
  <link rel="stylesheet" rev="stylesheet" href="{$host}zb_users/theme/{$theme}/style/{$style}.css" type="text/css" media="all" />
  {if $zbp->Config('mxlee')->gdtxoff=="1"}<link rel="stylesheet" rev="stylesheet" href="{$host}zb_users/theme/{$theme}/style/libs/animate.css" type="text/css" media="all" />
  {/if}<link rel="stylesheet" href="{$host}zb_users/theme/{$theme}/style/font-awesome-4.3.0/css/font-awesome.min.css" media="screen" type="text/css" />
  <link rel="stylesheet" href="{$host}zb_users/theme/{$theme}/style/font-awesome-animation.css" media="screen" type="text/css" />
  <link rel="stylesheet" href="{$host}zb_users/theme/{$theme}/style/style.css" media="screen" type="text/css" />
  <link rel="icon" href="{php}mxlee_Get_Logo('favicon','ico');{/php}" type="image/x-icon">
  <script type="text/javascript">(window.jQuery) || document.write('<script src="{$host}zb_system/script/jquery-2.2.4.min.js" type="text/javascript"><\/script>');</script>
  <script src="{$host}zb_system/script/zblogphp.js"></script>
  <script src="{$host}zb_system/script/c_html_js_add.php"></script>
  {if $type=='index'}{if $zbp->Config('mxlee')->sideboxoff=="1"}<script type="text/javascript" src="{$host}zb_users/theme/{$theme}/script/flexisel.js"></script>
  {/if}{if $zbp->Config('mxlee')->slideoff=="1"}<script src="{$host}zb_users/theme/{$theme}/script/swiper.min.js"></script>
  {/if}<link rel="alternate" type="application/rss+xml" href="{$feedurl}" title="{$name}" />
  <link rel="EditURI" type="application/rsd+xml" title="RSD" href="{$host}zb_system/xml-rpc/?rsd" />
  <link rel="wlwmanifest" type="application/wlwmanifest+xml" href="{$host}zb_system/xml-rpc/wlwmanifest.xml" />
  {/if}<style type="text/css">body{background-image: url({php}mxlee_Get_Logo('bg_001','jpg');{/php});}</style>
  {$header}{if $zbp->Config('mxlee')->Displayds1=="1"}<style type="text/css">{$zbp->Config('mxlee')->diystyle}</style>
  {/if}{if $zbp->Config('mxlee')->uncodeoff=="1"}{$zbp->Config('mxlee')->uncode}<br />
  {/if}<!--[if lte IE 7]><link rel="stylesheet" href="{$host}zb_users/theme/{$theme}/style/font-awesome-4.3.0/css/font-awesome-ie7.min.css"><![endif]-->
  <!--[if lte IE 8]><script src="{$host}zb_users/theme/{$theme}/script/respond.min.js"></script><![endif]-->
{if $type=='article' && $zbp->Config('mxlee')->bdxzhoff=="1"}  <link rel="canonical" href="{$article.Url}"/>
  <script src="//msite.baidu.com/sdk/c.js?appid={$zbp->Config('mxlee')->xzhid}"></script>
  <script type="application/ld+json">
    {
        "@context": "https://ziyuan.baidu.com/contexts/cambrian.jsonld",
        "@id": "{$article.Url}",
        "appid": "{$zbp->Config('mxlee')->xzhid}",
        "title": "{$article.Title}",
        "images": [
                    "{mxlee_firstimg($article)}"
        ],
        "description": "{php}$description = preg_replace('/[\r\n]+/', '', trim(SubStrUTF8(TransferHTML($article->Intro,'[nohtml]'),100)).'...');{/php}{$description}",
        "pubDate": "{$article.Time('Y-m-d')}T{$article.Time('H:i:s')}"
    }
  </script>
{/if}</head>
<body class="home-{$type}">
<header class="site-header">
<div id="header" class="navbar fixed-nav">
<nav id="top-header">
  <div class="top-nav">
    <div class="menu-container">
      <ul class="top-menu"><li>
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