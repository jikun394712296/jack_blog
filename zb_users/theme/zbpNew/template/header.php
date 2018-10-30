<!DOCTYPE html>
<html lang="{$lang['lang_bcp47']}">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<meta http-equiv="X-UA-Compatible" content="ie=edge" />
	<meta name="viewport" content="width=device-width,initial-scale=1.33,minimum-scale=1.0,maximum-scale=1.0">
	{if $zbp->Config('zbpNew')->seokg}
	<title>{if $type=="index"}{$name}{$zbp->Config('zbpNew')->seoljf}{$subname}{elseif $type=="category"&&$page=="1"}{$category.Name}{if $category.Metas.fjtitle}{$zbp->Config('zbpNew')->seoljf}{$category.Metas.fjtitle}{/if}{$zbp->Config('zbpNew')->seoljf}{$name}{elseif $type=="category"&&$page>"1"}{$category.Name}{if $category.Metas.fjtitle}{$zbp->Config('zbpNew')->seoljf}{$category.Metas.fjtitle}{/if}{$zbp->Config('zbpNew')->seoljf}{$name}{$zbp->Config('zbpNew')->seoljf}第{$page}页{elseif $type=="tag"&&$page=="1"}{$tag.Name}{if $tag.Metas.fjtitle}{$zbp->Config('zbpNew')->seoljf}{$tag.Metas.fjtitle}{/if}{$zbp->Config('zbpNew')->seoljf}{$name}{elseif $type=="tag"&&$page>"1"}{$tag.Name}{if $tag.Metas.fjtitle}{$zbp->Config('zbpNew')->seoljf}{$tag.Metas.fjtitle}{/if}{$zbp->Config('zbpNew')->seoljf}{$name}{$zbp->Config('zbpNew')->seoljf}第{$page}页{elseif $type=="date"&&$page=="1"}{$title}{$zbp->Config('zbpNew')->seoljf}{$name}{elseif $type=="date"&&$page>"1"}{$title}{$zbp->Config('zbpNew')->seoljf}{$name}{elseif $type=="article"}{$title}{if $article.Metas.fjtitle}{$zbp->Config('zbpNew')->seoljf}{$article.Metas.fjtitle}{/if}{$zbp->Config('zbpNew')->seoljf}{$article.Category.Name}{$zbp->Config('zbpNew')->seoljf}{$name}{elseif $type=="page"}{$title}{if $article.Metas.fjtitle}{$zbp->Config('zbpNew')->seoljf}{$article.Metas.fjtitle}{/if}{$zbp->Config('zbpNew')->seoljf}{$name}{$zbp->Config('zbpNew')->seoljf}{$subname}{else}{$title}{$zbp->Config('zbpNew')->seoljf}{$name}{/if}
	</title>
	{else}
	<title>{$name}{$zbp->Config('zbpNew')->seoljf}{$title}</title>
	{/if}
	<meta name="generator" content="{$zblogphp}" />
		{php}
        if($type=='index'){
                $keywords = $zbp->Config('zbpNew')->Keywords;
                $description = $zbp->Config('zbpNew')->Description;
        }elseif($type=='category'){
        	if($category->Metas->keywords){
        		$keywords =$category->Metas->keywords;
        	}else{
                $keywords = $category->Name;
            }
            if($category->Metas->description){
            	$description = $category->Metas->description;
        	}else{
                $description = $category->Intro;
            }
        }elseif($type=='article'||$type=='page'){
        	if ($article->Metas->keywords){
        		$keywords = $article->Metas->keywords;
        	}else{
        		$aryTags = array();
                foreach($article->Tags as $key){
                        $aryTags[] = $key->Name;
                }
                if(count($aryTags)>0) {$keywords = implode(',',$aryTags);}else{
        		$keywords = $title.','.$name;}
        	}
        	if ($article->Metas->description){
        		$description = $article->Metas->description;
        	}else{
                $description = preg_replace('/ [\r\n\s]+/', '', trim(SubStrUTF8(TransferHTML($article->Content,'[nohtml]'),100)).'...');
            }
        }elseif ($type=='tag'){
        	if ($tag->Metas->keywords){
				$keywords= $tag->Metas->keywords;
        	}else{
				$keywords= $title.','.$name;
        	}
			if ($tag->Metas->description){
				$description=$tag->Metas->description;
			}else{
				$description=$tag->Intro;
			}
    	}else{
    		$keywords=$title.','.$name;
			$description=$title.$zbp->Config('zbpNew')->seoljf.$name;
    	}
{/php}
{if $zbp->Config('zbpNew')->seokg}
{if isset($keywords)&&strlen($keywords)>0}
<meta name="keywords" content="{$keywords}">
{/if}
{if isset($description)&&strlen($description)>0}
<meta name="description" content="{$description}">
{/if}
{/if}
	<link rel="stylesheet" rev="stylesheet" href="{$host}zb_users/theme/{$theme}/style/{$style}.css" type="text/css" media="all"/>
	<link rel="stylesheet" href="{$host}zb_users/theme/{$theme}/style/css/font-awesome.min.css">
	<script src="{$host}zb_system/script/jquery-2.2.4.min.js" type="text/javascript"></script>
    <script src="{$host}zb_system/script/zblogphp.js" type="text/javascript"></script>
    <script src="{$host}zb_system/script/c_html_js_add.php" type="text/javascript"></script>
    <script src="{$host}zb_users/theme/{$theme}/script/zbpNew.js"></script>
{$header}
{if $type=='index'&&$page=='1'}
	<link rel="alternate" type="application/rss+xml" href="{$feedurl}" title="{$name}" />
	<link rel="EditURI" type="application/rsd+xml" title="RSD" href="{$host}zb_system/xml-rpc/?rsd" />
	<link rel="wlwmanifest" type="application/wlwmanifest+xml" href="{$host}zb_system/xml-rpc/wlwmanifest.xml" /> 
{/if}
</head>