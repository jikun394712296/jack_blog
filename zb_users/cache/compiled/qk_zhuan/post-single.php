<div class="panel panel-default">
						<div class="panel-body">
							<h2 class="c_titile"><?php  echo $article->Title;  ?></h2>
							<p class="box_c"><span class="d_time">发布时间：<?php  echo $article->Time('Y-m-d');  ?></span><span>编辑：<?php  echo $article->Author->StaticName;  ?></span><span>阅读:<?php  echo $article->ViewNums;  ?></span></p>
							<ul class="infos">
								    <?php  echo $article->Content;  ?>
							</ul>
															
							<div class="keybq">
						    	<p><span>关键字</span>：<?php  foreach ( $article->Tags as $tag) { ?><a href="<?php  echo $tag->Url;  ?>" target="_blank"><?php  echo $tag->Name;  ?></a><?php }   ?></p>    
						    </div>
							
							
							
							<div class="nextinfo">
								<p class="last">上一篇：<?php if ($article->Prev) { ?>
            <a  href="<?php  echo $article->Prev->Url;  ?>" title="<?php  echo $article->Prev->Title;  ?>"><?php  echo $article->Prev->Title;  ?></a>
            <?php }else{  ?>没有了<?php } ?></p>
								<p class="next">下一篇：<?php if ($article->Next) { ?>
            <a  href="<?php  echo $article->Next->Url;  ?>" title="<?php  echo $article->Next->Title;  ?>"><?php  echo $article->Next->Title;  ?></a>
            <?php }else{  ?>没有了<?php } ?></p>
						    </div>
							
						</div>
					</div>
					
					<div class="panel panel-default">
						<div class="panel-body">
						<?php if (!$article->IsLock) { ?>
<?php  include $this->GetTemplate('comments');  ?>
<?php } ?>	
							
						</div>
					</div>