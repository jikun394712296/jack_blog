<?php echo'<meta charset="UTF-8"><div style="text-align:center;padding:60px 0;font-size:16px;"><h2 style="font-size:60px;margin-bottom:32px;color:f00;">zbpNew主题页面</h2><h3>请尊重版权，如想去除版权，请赞助20元辛苦费，谢谢合作！！</h3><h2 style="font-size:50px;margin-bottom:32px;color:f00;">QQ：763989459</h2></div>';die();?>
{php}
  $avatar = md5(strtolower($comment->Author->Email));
{/php}
<ul class="msg" id="cmt{$comment.ID}">
  <li class="msgname">
    <div class="msgname-cont">
      <div class="avatar"><img alt='{$comment.Author.StaticName}' src="http://cn.gravatar.com/avatar/{$avatar}&amp;r=X&amp;s=50?d=404" onerror='javascript:this.src="{$comment.Author.Avatar}";this.onerror=null;' height='50' width='50' /></div>
      <div class="avatar-right">
        <div class="commentname"><a href="{$comment.Author.HomePage}" rel="nofollow" target="_blank">{$comment.Author.StaticName}</a>&nbsp;&nbsp;<span class="comm-time">{zbpNew_TimeAgo($comment.Time())}</span>&nbsp;&nbsp;<span class="revertcomment"><a href="#comment" onclick="zbp.comment.reply('{$comment.ID}')">回复</a></span></div>
        <div class="comm-content">
        {$comment.Content}
        </div>
      </div>
    </div>
      {foreach $comment.Comments as $comment}
      {template:comment}
      {/foreach}
  </li>
</ul>