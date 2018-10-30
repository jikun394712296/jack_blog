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
$intro=trim(SubStrUTF8($intro,135)).'...'
 ?>
                                
									
						 <div class="panel panel-default contenttop">
							<a href="<?php  echo $article->Url;  ?>" target="_blank">
								
								<h3 class="title"><strong>置顶</strong><?php  echo $article->Title;  ?></h3>
								<p class="overView"><?php  echo $intro;  ?></p>
							</a>
						</div>