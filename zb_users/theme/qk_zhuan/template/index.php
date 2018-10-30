{template:header}
		<div class="w_container">
			<div class="container">
				<div class="row w_main_row">
					<div class="col-lg-9 col-md-9 w_main_left">
						<!--滚动图开始-->
						{if $type=='index'}
						<div class="panel panel-default">
							<div id="w_carousel" class="carousel slide w_carousel" data-ride="carousel">
									<div class="item">
										<a href="{$zbp->Config('qk_zhuan')->banlink}" target="_blank"><img src="{$zbp->Config('qk_zhuan')->ban}" width="100%" ></a>						
									</div>
							</div>
						</div>
						{/if}
						
                       
						{foreach $articles as $article}
            				    {if $article.IsTop}
            				    {template:post-istop}
            				    {else}
             				   
             				   {/if}
             				   {/foreach}
						<div class="panel panel-default">
							<div class="panel-heading">
								<h3 class="panel-title">{if $type=='index'}最新文章{else}{$title}{/if}</h3>
							</div>

							<div class="panel-body">

								<!--文章列表开始-->
								<div class="contentList">
								{foreach $articles as $article}
            				    {if $article.IsTop}
            				   
            				    {else}
             				   {template:post-multi}
             				   {/if}
             				   {/foreach}
            
              				    
              				    <div class="pagebar">{template:pagebar}</div>
              				   
								</div>
								<!--文章列表结束-->

							</div>
						</div>
					</div>

					<!--左侧开始-->
					{if $type=='category' && $category.Metas.side=='1'}
                    {else}
					<div class="col-lg-3 col-md-3 w_main_right side-box">

						<div class="panel panel-default sitetip" style="margin-top:20px;">
							  <a>
								<strong>{$zbp->Config('qk_zhuan')->gonggaot}</strong>
								<p class="overView">{$zbp->Config('qk_zhuan')->gonggao}</p>	
								</a>						
						</div>
						{if $type=='index'}
                        {template:sidebar}
                        {else}
                        {template:sidebar2}
                        {/if}
						<div class="panel panel-default">
						{template:sidebar4}	
						</div>

					</div>
					{/if}
				</div>
			</div>
		</div>
{template:footer}