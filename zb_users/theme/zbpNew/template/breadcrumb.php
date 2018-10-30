<!--面包屑导航-->
{if $type =='index'}
{/if}
{if $type!='index'}
    <div class="container">
当前位置<em>:</em>
{if $type == 'category'}
    <i class="fa fa-home"></i> <a href="{$host}" title="{$name}">首页</a>
    {php}
        $html='';
        function navcate($id){
            global $html;
            $cate = new Category;
            $cate->LoadInfoByID($id);
            $html ='&raquo;  <a href="' .$cate->Url.'" title="查看' .$cate->Name. '中的全部文章">' .$cate->Name. '</a> '.$html;
            if(($cate->ParentID)>0){navcate($cate->ParentID);}
        }
        navcate($category->ID);
        global $html;
        echo $html;
    {/php}
{elseif $type =="article"}  
     <i class="fa fa-home"></i> <a href="{$host}" title="{$name}">首页</a>    
     {php}
        $html='';
        function navcate($id){
            global $html;
            $cate = new Category;
            $cate->LoadInfoByID($id);
            $html ='&raquo;  <a href="' .$cate->Url.'" title="查看' .$cate->Name. '中的全部文章">' .$cate->Name. '</a> '.$html;
            if(($cate->ParentID)>0){navcate($cate->ParentID);}
        }
        navcate($article->Category->ID);
        global $html;
        echo $html;
   {/php} &raquo; 正文
{elseif $type =="page"}
     <i class="fa fa-home"></i> <a href="{$host}" title="{$name}">首页</a>
     &raquo; 正文 
{elseif $type =="tag"}
     <i class="fa fa-home"></i> <a href="{$host}" title="{$name}">首页</a>
     &raquo;
     <span class="current">标签存档：{$tag.Name}</span>
{elseif $type =="author"}
      <i class="fa fa-home"></i> <a href="{$host}" title="{$name}">首页</a>
      &raquo;
     <span class="current">{$author.Name} 的文章</span>
{/if}
    </div>
{/if}