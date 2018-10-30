<?php echo'<meta charset="UTF-8"><div style="text-align:center;padding:60px 0;font-size:16px;"><h2 style="font-size:60px;margin-bottom:32px;color:f00;">zbpNew主题页面</h2><h3>请尊重版权，如想去除版权，请赞助20元辛苦费，谢谢合作！！</h3><h2 style="font-size:50px;margin-bottom:32px;color:f00;">QQ：763989459</h2></div>';die();?>
{template:header}
<body>
{template:navbar}
{php}
if($_GET['q']){
    $key = $_GET['q'];
}
{/php}
 <main>
  <!--内容专区start-->
        <section class="main-content clearfix">
        {foreach $articles as $article} 
                {if $article.IsTop}
                {template:post-istop}
                {else}
                {template:post-multi}
                {/if}
        {/foreach} 
    </section> 
    <!--内容专区end-->
    <!--分页bar-->            
    {template:pagebar}
    </main>
{template:footer}