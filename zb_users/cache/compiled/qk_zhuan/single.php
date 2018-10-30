<?php  /* Template Name: 默认内容页模板 */  ?>
<?php  include $this->GetTemplate('header');  ?>

<div class="w_container">
		<div class="container">
			<div class="row w_main_row">
				
				<ol class="breadcrumb w_breadcrumb">
				  <?php 
        $html='';
        function navcate($id){
        global $html;
        $cate = new Category;
        $cate->LoadInfoByID($id);
        $html =' > <a href="' .$cate->Url.'" title="查看' .$cate->Name. '中的全部文章">' .$cate->Name. '</a> '.$html;
        if(($cate->ParentID)>0){navcate($cate->ParentID);}
        }
        navcate($article->Category->ID);
        global $html;
        echo $html;
         ?> > 正文


				
				</ol>
				
				<div class="col-lg-9 col-md-9 w_main_left  ">
				
        <?php if ($article->Type==ZC_POST_TYPE_ARTICLE) { ?>
        <?php  include $this->GetTemplate('post-single');  ?>
        <?php }else{  ?>
        <?php  include $this->GetTemplate('post-page');  ?>
        <?php } ?>	
					
				</div>
				
				<?php if ($article->Metas->side=='1') { ?>
                <?php }else{  ?>
				<div class="col-lg-3 col-md-3 w_main_right side-box">
				 <div style="margin-top:15px;">	
					<?php  include $this->GetTemplate('sidebar3');  ?>
				 </div>
					
					
				</div>
			    <?php } ?>
			
			</div>
		</div>
	</div>
	<?php  include $this->GetTemplate('footer');  ?>