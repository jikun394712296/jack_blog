<?php echo'<meta charset="UTF-8"><div style="text-align:center;padding:60px 0;font-size:16px;"><h2 style="font-size:60px;margin-bottom:32px;color:f00;">zbpNew主题页面</h2><h3>请尊重版权，如想去除版权，请赞助20元辛苦费，谢谢合作！！</h3><h2 style="font-size:50px;margin-bottom:32px;color:f00;">QQ：763989459</h2></div>';die();?>
<article id="post-{$article.ID}" class="post-article">
    {php}$description = preg_replace('/[\r\n\s]+/', '', trim(SubStrUTF8(TransferHTML($article->Intro,'[nohtml]'),40)).'...');{/php}
<div class="post-box">
	<div class="post-card-body">
	 <a href="{$article.Url}" title="{$article.Title}" class="post-thumb">
	   <img src="{$host}zb_users/theme/{$theme}/style/images/grey.gif" data-original="{zbpNew_thumbnail($article->ID,258,165)}" alt="{$article.Title}" />
	    <div class="post-desc">{$description}</div>
	 </a>
	 <header class="post-header">
	 <h2 class="post-tit"><a href="{$article.Url}">{$article.Title}</a></h2>
	 <span class="post-male"><i class="fa fa-clock-o"></i>{zbpNew_TimeAgo($article.Time())} <i class="fa fa-eye "></i>{$article.ViewNums}<i class="fa fa-comment-o"></i><a href="{$article.Url}#postcmt">{$article.CommNums}</a>
	 </span>
	 </header>
	 <span class="istop">置顶</span>
	</div>
</div>
</article>