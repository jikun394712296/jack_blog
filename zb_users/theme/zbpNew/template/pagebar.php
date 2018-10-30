<?php echo'<meta charset="UTF-8"><div style="text-align:center;padding:60px 0;font-size:16px;"><h2 style="font-size:60px;margin-bottom:32px;color:f00;">zbpNew主题页面</h2><h3>请尊重版权，如想去除版权，请赞助20元辛苦费，谢谢合作！！</h3><h2 style="font-size:50px;margin-bottom:32px;color:f00;">QQ：763989459</h2></div>';die();?>
{if $pagebar}
<div class="pagebar container">
{foreach $pagebar.buttons as $k=>$v}
{if $pagebar.PageNow==$k}
<a class="page-num current">{$k}</a>
{elseif $k=='‹‹' and $pagebar.PageNow!=$pagebar.PageFirst}
<a href="{$pagebar.buttons['‹‹']}" class="page-num" title="首页">首页</a>
{elseif $k=='‹‹' and $pagebar.PageNow==$pagebar.PageFirst}
{elseif $k=='››' and $pagebar.PageNow==$pagebar.PageLast}
{elseif $k=='››' and $pagebar.PageNow!=$pagebar.PageLast}
<a href="{$pagebar.buttons['››']}" class="page-num last" title="末页">末页 </a>
{elseif $k=='‹'}
<a href="{$v}" title="{$k}" class="page-num pre">上一页</a>
{elseif $k=='›'}
<a href="{$v}" title="{$k}" class="page-num next">下一页</a>
{else}
<a href="{$v}" title="{$k}" class="page-num">{$k}</a>
{/if}
{/foreach}
</div>
{/if}