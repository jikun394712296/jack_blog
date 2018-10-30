<?php if ($zbp->CheckPlugin('IMAGE')) { ?>
<?php 
IMAGE::getPics($article,450,360,4);
$tay = $article->IMAGE_COUNT;
if(!empty($article->IMAGE[0])) $img1=$article->IMAGE[0];
if(!empty($article->IMAGE[1])) $img2=$article->IMAGE[1];
if(!empty($article->IMAGE[2])) $img3=$article->IMAGE[2];
 ?> 
<?php }else{  ?>
<?php 
$pattern="/<[img|IMG].*?src=[\'|\"](.*?(?:[\.gif|\.jpg|\.png]))[\'|\"].*?[\/]?>/";
$content = $article->Content;
preg_match_all($pattern,$content,$matchContent);
$SUM= count($matchContent[1]);
$tay = $SUM;
if(!empty($matchContent[1][0])) $img1=$matchContent[1][0];
if(!empty($matchContent[1][1])) $img2=$matchContent[1][1];
if(!empty($matchContent[1][2])) $img3=$matchContent[1][2];
 ?>
<?php } ?>
<?php 
$intro=preg_replace("/<(.*?)>/","",$article->Content); 
$intro=str_replace("&nbsp;"," ",$intro); 
$intro=trim(SubStrUTF8($intro,80)).'...'
 ?>


                                <?php if ($tay >=1) { ?>
		                         <div class="panel panel-default">
										<div class="panel-body">
											<div class="contentleft">
												<h4><a class="title" href="<?php  echo $article->Url;  ?>"><?php  echo $article->Title;  ?></a></h4>
												<p>
													<?php  foreach ( $article->Tags as $tag) { ?><a href="<?php  echo $tag->Url;  ?>" target="_blank" class="label label-default"><?php  echo $tag->Name;  ?></a><?php }   ?>
												</p>
												<p class="overView"><?php  echo $intro;  ?></p>
												<p><span class="count">作者:<?php  echo $article->Author->StaticName;  ?></span> <span class="count">阅读:<?php  echo $article->ViewNums;  ?></span><span class="count"><a href="<?php  echo $article->Url;  ?>#qk_huifu2" title="查看评论" class="list-user">评论:<?php  echo $article->CommNums;  ?></a></span><span class="count"><?php  echo $article->Time('Y-m-d');  ?></span></p>
											</div>
											<div class="contentImage">
											
												<div class="row">
													<a href="<?php  echo $article->Url;  ?>" class="thumbnail w_thumbnail">
														<img  src="<?php  echo qk_zhuan_FirstIMG($article,$article,450,360);  ?>">
													</a>
												</div>
											</div>
										</div>
									</div>
									<?php }else{  ?>
									<div class="panel panel-default">
										<div class="panel-body">
											<div class="contentleftnimg">
												<h4><a class="title" href="<?php  echo $article->Url;  ?>"><?php  echo $article->Title;  ?></a></h4>
												<p>
													<?php  foreach ( $article->Tags as $tag) { ?><a href="<?php  echo $tag->Url;  ?>" target="_blank" class="label label-default"><?php  echo $tag->Name;  ?></a><?php }   ?>
												</p>
												<p class="overView"><?php  echo $intro;  ?></p>
												<p><span class="count">作者:<?php  echo $article->Author->StaticName;  ?></span> <span class="count">阅读:<?php  echo $article->ViewNums;  ?></span><span class="count"><a href="<?php  echo $article->Url;  ?>#qk_huifu2" title="查看评论" class="list-user">评论:<?php  echo $article->CommNums;  ?></a></span><span class="count"><?php  echo $article->Time('Y-m-d');  ?></span></p>
											</div>
											
										</div>
									</div>
									<?php } ?>  