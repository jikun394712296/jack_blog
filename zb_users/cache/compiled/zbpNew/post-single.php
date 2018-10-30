
  <main>
  <!--内容专区start-->
        <section class="main-content box_article clearfix">
			<article>
				<div class="box_content">
					<header class="post-info">
					<h1><?php  echo $article->Title;  ?></h1>
					<div class="p_info"> 
						<span><i class="fa fa-user"></i> <a href="<?php  echo $article->Author->Url;  ?>" title="<?php  echo $article->Author->StaticName;  ?>"><?php  echo $article->Author->StaticName;  ?></a></span> 
						<span><i class="fa fa-clock-o fa-fw"></i><?php  echo zbpNew_TimeAgo($article->Time());  ?></span> 
						<span><i class="fa fa-eye fa-fw"></i> <?php  echo $article->ViewNums;  ?>℃</span> 
						<span><i class="fa fa-comment-o fa-fw"></i> <a href="javascript:;" title="点击评论" id="com"><?php  echo $article->CommNums;  ?></a></span>
					</div>
					</header>
					<div class="post-content">
						<?php  echo $article->Content;  ?>
					</div>
					<?php if ($article->Tags) { ?>
					   <h5 class="post-tags"><i class="fa fa-tag ico"></i> <?php  foreach ( $article->Tags as $tag) { ?><a href="<?php  echo $tag->Url;  ?>"><?php  echo $tag->Name;  ?></a><?php }   ?></h5>
					<?php } ?>
					</div>
			</article>
    	</section> 
    	<!--内容专区end-->
 </main>
<div class="post-comm box_article clearfix">
		<?php if (!$article->IsLock) { ?>
		<?php  include $this->GetTemplate('comments');  ?>
		<?php } ?>
</div>