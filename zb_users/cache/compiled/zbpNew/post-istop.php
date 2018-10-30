
<article id="post-<?php  echo $article->ID;  ?>" class="post-article">
    <?php $description = preg_replace('/[\r\n\s]+/', '', trim(SubStrUTF8(TransferHTML($article->Intro,'[nohtml]'),40)).'...'); ?>
<div class="post-box">
	<div class="post-card-body">
	 <a href="<?php  echo $article->Url;  ?>" title="<?php  echo $article->Title;  ?>" class="post-thumb">
	   <img src="<?php  echo $host;  ?>zb_users/theme/<?php  echo $theme;  ?>/style/images/grey.gif" data-original="<?php  echo zbpNew_thumbnail($article->ID,258,165);  ?>" alt="<?php  echo $article->Title;  ?>" />
	    <div class="post-desc"><?php  echo $description;  ?></div>
	 </a>
	 <header class="post-header">
	 <h2 class="post-tit"><a href="<?php  echo $article->Url;  ?>"><?php  echo $article->Title;  ?></a></h2>
	 <span class="post-male"><i class="fa fa-clock-o"></i><?php  echo zbpNew_TimeAgo($article->Time());  ?> <i class="fa fa-eye "></i><?php  echo $article->ViewNums;  ?><i class="fa fa-comment-o"></i><a href="<?php  echo $article->Url;  ?>#postcmt"><?php  echo $article->CommNums;  ?></a>
	 </span>
	 </header>
	 <span class="istop">置顶</span>
	</div>
</div>
</article>