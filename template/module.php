<?php echo'<meta charset="UTF-8"><div style="text-align:center;padding:60px 0;font-size:16px;"><h2 style="font-size:60px;margin-bottom:32px;color:f00;">��ӭ���ķ��ʣ�</h2><h3>���ǣ����ﲢû�������ҵĶ�����ϲ������������������ϵ���ǣ�</h3><h2 style="font-size:50px;margin-bottom:32px;color:f00;">QQ��229693666</h2></div>';die();?><div class="widget-box widget{if $zbp->Config('mxlee')->gdtxoff=="1"} wow fadeInDown{/if}" id="{$module.HtmlID}">
{if (!$module.IsHideTitle)&&($module.Name)}
<h3 class="widget-title"><i class="fa fa-th"></i>{$module.Name}</h3>
{/if}
{if $module.Type=='div'}
{if $module.FileName=="comments"}
<ul class="widget-content {$module.HtmlID}">{php}echo mxlee_BuildModule_Avatarcomments(){/php}</ul>
{else}
<ul class="widget-content {$module.HtmlID}">{$module.Content}</ul>
{/if}{/if}
{if $module.Type=='ul'}
{if $module.FileName=="comments"}
<ul class="widget-content {$module.HtmlID}">{php}echo mxlee_BuildModule_Avatarcomments(){/php}</ul>
{else}
<ul class="widget-content {$module.HtmlID}">{$module.Content}</ul>
{/if}{/if}
</div>