{* Template Name: 默认内容页模板 *}
{template:header}

<div class="w_container">
		<div class="container">
			<div class="row w_main_row">
				
				<ol class="breadcrumb w_breadcrumb">
				  {php}
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
        {/php} > 正文


				
				</ol>
				
				<div class="col-lg-9 col-md-9 w_main_left  ">
				
        {if $article.Type==ZC_POST_TYPE_ARTICLE}
        {template:post-single}
        {else}
        {template:post-page}
        {/if}	
					
				</div>
				
				{if $article.Metas.side=='1'}
                {else}
				<div class="col-lg-3 col-md-3 w_main_right side-box">
				 <div style="margin-top:15px;">	
					{template:sidebar3}
				 </div>
					
					
				</div>
			    {/if}
			
			</div>
		</div>
	</div>
	{template:footer}