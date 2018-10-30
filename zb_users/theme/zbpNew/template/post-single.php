<?php echo'<meta charset="UTF-8"><div style="text-align:center;padding:60px 0;font-size:16px;"><h2 style="font-size:60px;margin-bottom:32px;color:f00;">zbpNew主题页面</h2><h3>请尊重版权，如想去除版权，请赞助20元辛苦费，谢谢合作！！</h3><h2 style="font-size:50px;margin-bottom:32px;color:f00;">QQ：763989459</h2></div>';die();?>
  <main>
  <!--内容专区start-->
        <section class="main-content box_article clearfix">
			<article>
				<div class="box_content">
					<header class="post-info">
					<h1>{$article.Title}</h1>
					<div class="p_info"> 
						<span><i class="fa fa-user"></i> <a href="{$article.Author.Url}" title="{$article.Author.StaticName}">{$article.Author.StaticName}</a></span> 
						<span><i class="fa fa-clock-o fa-fw"></i>{zbpNew_TimeAgo($article.Time())}</span> 
						<span><i class="fa fa-eye fa-fw"></i> {$article.ViewNums}℃</span> 
						<span><i class="fa fa-comment-o fa-fw"></i> <a href="javascript:;" title="点击评论" id="com">{$article.CommNums}</a></span>
					</div>
					</header>
					<div class="post-content">
						{$article.Content}
					</div>
					{if $article.Tags}
					   <h5 class="post-tags"><i class="fa fa-tag ico"></i> {foreach $article.Tags as $tag}<a href="{$tag.Url}">{$tag.Name}</a>{/foreach}</h5>
					{/if}
					</div>
			</article>
    	</section> 
    	<!--内容专区end-->
 </main>
<div class="post-comm box_article clearfix">
		{if !$article.IsLock}
		{template:comments}
		{/if}
</div>