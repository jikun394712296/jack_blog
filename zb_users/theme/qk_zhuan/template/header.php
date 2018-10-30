{* Template Name:公共头部 *} 
<!DOCTYPE html>
<html lang="{$lang['lang_bcp47']}">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<meta http-equiv="X-UA-Compatible" content="ie=edge" />
<meta name="generator" content="{$zblogphp}" />
<meta name="renderer" content="webkit">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
{if $type=='article'}
<title>{$title}-{$article.Category.Name}-{$name}</title>
<meta name="keywords" content="{foreach $article.Tags as $tag}{$tag.Name},{/foreach}" />
<meta name="description" content="{$article.Title}是{$name}中一篇关于{foreach $article.Tags as $tag}{$tag.Name}{/foreach}的文章，欢迎您阅读和评论,{$name}" />
{elseif $type=='page'}
<title>{$title}-{$name}</title>
<meta name="keywords" content="{$title},{$name}"/>
{php}$description = preg_replace('/[\r\n\s]+/', ' ', trim(SubStrUTF8(TransferHTML($article->Content,'[nohtml]'),135)).'...');{/php}
<meta name="description" content="{$description}"/>
<meta name="author" content="{$article.Author.StaticName}">
{elseif $type=='index'}
<title>{$name}{if $page>'1'}-第{$pagebar.PageNow}页{/if}-{$subname}</title>
<meta name="Keywords" content="{$zbp->Config('qk_zhuan')->qkgjc}">
<meta name="description" content="{$zbp->Config('qk_zhuan')->qkms}">
{elseif $type=='category'}
<title>{$title}-{$name}</title>
<meta name="Keywords" content="{$title},{$name}">
<meta name="description" content="{$category.Intro}">
{else}
<title>{$title}-{$name}</title>
{/if}
<link href="{$host}zb_users/theme/{$theme}/style/bootstrap.min.css"  rel="stylesheet">	
<link rel="stylesheet" rev="stylesheet" href="{$host}zb_users/theme/{$theme}/style/common.css" type="text/css" media="all"/>
<link rel="stylesheet" type="text/css" href="{$host}zb_users/theme/{$theme}/style/article_detail.css"/>

<script src="{$host}zb_system/script/jquery-2.2.4.min.js" type="text/javascript"></script> 
<script src="{$host}zb_system/script/zblogphp.js" type="text/javascript"></script> 
<script src="{$host}zb_system/script/c_html_js_add.php" type="text/javascript"></script> 
<script src="{$host}zb_users/theme/{$theme}/script/custom.js" type="text/javascript"></script> 
<style>
.w_header{height: 55px; margin-bottom: -55px; position: fixed; z-index:999; width: 100%; box-shadow:1px 3px 5px #ccc; opacity:.90;  background: #{$zbp->Config('qk_zhuan')->qkzs};}
.w_foot_copyright{height: 40px; text-align: center; padding-top: 10px; color:#b2bcc5; font-size:13px;  background: #{$zbp->Config('qk_zhuan')->qkzs};}
.side-box dl dt,.info-close h2 {font-size: 18px; line-height:40px;color: #393939;border-left-style: solid;border-left-width: 0px;margin-left: 0px;margin-bottom: 15px;padding: 5px 0 5px 18px;text-align: left; background-color:#{$zbp->Config('qk_zhuan')->qkfs}; }
#divCalendar th{color: #FFFFFF;text-transform: uppercase;height:26px;background-color: #{$zbp->Config('qk_zhuan')->qkzs};}

</style>	
</head>


	






	<body>
		<div class="w_header">
			<div class="container">
				<div class="w_header_top">
				{php}
    			  if($zbp->Config('qk_zhuan')->logo){
    			  $logo = $zbp->Config('qk_zhuan')->logo;
    			  }else{
    			  $logo = $host."zb_users/theme/".$theme."/style/images/logo.png";
    			  }
     		    {/php}
					<a href="{$host}" title="{$name}" rel="home" class="w_logo sousuoz" ><img src="{$logo}" alt="{$name}"></a>
					<span class="w_header_nav">
					<ul>
						{module:navbar}
					</ul>
				</span>
				<form name="search" method="post" action="{$host}zb_system/cmd.php?act=search" class="sousuoz">
					<div class="w_search">
						<div class="w_searchbox">
							
							 
                             <input name="q" size="11" id="edtSearch" type="text" placeholder="输入关键字" class="soneirong">
                              <button  id="btnPost" type="submit">搜索</button>
                            
						</div>
					</div>
					</form>
				</div>
			</div>
		</div>