<?php  include $this->GetTemplate('header');  ?>
		<div class="w_container">
			<div class="container">
				<div class="row w_main_row">
					<div class="col-lg-9 col-md-9 w_main_left">
						<!--滚动图开始-->
						<?php if ($type=='index') { ?>
						<div class="panel panel-default">
							<div id="w_carousel" class="carousel slide w_carousel" data-ride="carousel">
									<div class="item">
										<a href="<?php  echo $zbp->Config('qk_zhuan')->banlink;  ?>" target="_blank"><img src="<?php  echo $zbp->Config('qk_zhuan')->ban;  ?>" width="100%" ></a>						
									</div>
							</div>
						</div>
						<?php } ?>
						
                       
						<?php  foreach ( $articles as $article) { ?>
            				    <?php if ($article->IsTop) { ?>
            				    <?php  include $this->GetTemplate('post-istop');  ?>
            				    <?php }else{  ?>
             				   
             				   <?php } ?>
             				   <?php }   ?>
						<div class="panel panel-default">
							<div class="panel-heading">
								<h3 class="panel-title"><?php if ($type=='index') { ?>最新文章<?php }else{  ?><?php  echo $title;  ?><?php } ?></h3>
							</div>

							<div class="panel-body">

								<!--文章列表开始-->
								<div class="contentList">
								<?php  foreach ( $articles as $article) { ?>
            				    <?php if ($article->IsTop) { ?>
            				   
            				    <?php }else{  ?>
             				   <?php  include $this->GetTemplate('post-multi');  ?>
             				   <?php } ?>
             				   <?php }   ?>
            
              				    
              				    <div class="pagebar"><?php  include $this->GetTemplate('pagebar');  ?></div>
              				   
								</div>
								<!--文章列表结束-->

							</div>
						</div>
					</div>

					<!--左侧开始-->
					<?php if ($type=='category' && $category->Metas->side=='1') { ?>
                    <?php }else{  ?>
					<div class="col-lg-3 col-md-3 w_main_right side-box">

						<div class="panel panel-default sitetip" style="margin-top:20px;">
							  <a>
								<strong><?php  echo $zbp->Config('qk_zhuan')->gonggaot;  ?></strong>
								<p class="overView"><?php  echo $zbp->Config('qk_zhuan')->gonggao;  ?></p>	
								</a>						
						</div>
						<?php if ($type=='index') { ?>
                        <?php  include $this->GetTemplate('sidebar');  ?>
                        <?php }else{  ?>
                        <?php  include $this->GetTemplate('sidebar2');  ?>
                        <?php } ?>
						<div class="panel panel-default">
						<?php  include $this->GetTemplate('sidebar4');  ?>	
						</div>

					</div>
					<?php } ?>
				</div>
			</div>
		</div>
<?php  include $this->GetTemplate('footer');  ?>