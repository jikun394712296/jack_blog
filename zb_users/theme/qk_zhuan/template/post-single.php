<div class="panel panel-default">
						<div class="panel-body">
							<h2 class="c_titile">{$article.Title}</h2>
							<p class="box_c"><span class="d_time">发布时间：{$article.Time('Y-m-d')}</span><span>编辑：{$article.Author.StaticName}</span><span>阅读:{$article.ViewNums}</span></p>
							<ul class="infos">
								    {$article.Content}
							</ul>
															
							<div class="keybq">
						    	<p><span>关键字</span>：{foreach $article.Tags as $tag}<a href="{$tag.Url}" target="_blank">{$tag.Name}</a>{/foreach}</p>    
						    </div>
							
							
							
							<div class="nextinfo">
								<p class="last">上一篇：{if $article.Prev}
            <a  href="{$article.Prev.Url}" title="{$article.Prev.Title}">{$article.Prev.Title}</a>
            {else}没有了{/if}</p>
								<p class="next">下一篇：{if $article.Next}
            <a  href="{$article.Next.Url}" title="{$article.Next.Title}">{$article.Next.Title}</a>
            {else}没有了{/if}</p>
						    </div>
							
						</div>
					</div>
					
					<div class="panel panel-default">
						<div class="panel-body">
						{if !$article.IsLock}
{template:comments}
{/if}	
							
						</div>
					</div>