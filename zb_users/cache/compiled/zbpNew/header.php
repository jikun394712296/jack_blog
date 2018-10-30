<!DOCTYPE html>
<html lang="<?php  echo $lang['lang_bcp47'];  ?>">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<meta http-equiv="X-UA-Compatible" content="ie=edge" />
	<meta name="viewport" content="width=device-width,initial-scale=1.33,minimum-scale=1.0,maximum-scale=1.0">
	<?php if ($zbp->Config('zbpNew')->seokg) { ?>
	<title><?php if ($type=="index") { ?><?php  echo $name;  ?><?php  echo $zbp->Config('zbpNew')->seoljf;  ?><?php  echo $subname;  ?><?php }elseif($type=="category"&&$page=="1") {  ?><?php  echo $category->Name;  ?><?php if ($category->Metas->fjtitle) { ?><?php  echo $zbp->Config('zbpNew')->seoljf;  ?><?php  echo $category->Metas->fjtitle;  ?><?php } ?><?php  echo $zbp->Config('zbpNew')->seoljf;  ?><?php  echo $name;  ?><?php }elseif($type=="category"&&$page>"1") {  ?><?php  echo $category->Name;  ?><?php if ($category->Metas->fjtitle) { ?><?php  echo $zbp->Config('zbpNew')->seoljf;  ?><?php  echo $category->Metas->fjtitle;  ?><?php } ?><?php  echo $zbp->Config('zbpNew')->seoljf;  ?><?php  echo $name;  ?><?php  echo $zbp->Config('zbpNew')->seoljf;  ?>第<?php  echo $page;  ?>页<?php }elseif($type=="tag"&&$page=="1") {  ?><?php  echo $tag->Name;  ?><?php if ($tag->Metas->fjtitle) { ?><?php  echo $zbp->Config('zbpNew')->seoljf;  ?><?php  echo $tag->Metas->fjtitle;  ?><?php } ?><?php  echo $zbp->Config('zbpNew')->seoljf;  ?><?php  echo $name;  ?><?php }elseif($type=="tag"&&$page>"1") {  ?><?php  echo $tag->Name;  ?><?php if ($tag->Metas->fjtitle) { ?><?php  echo $zbp->Config('zbpNew')->seoljf;  ?><?php  echo $tag->Metas->fjtitle;  ?><?php } ?><?php  echo $zbp->Config('zbpNew')->seoljf;  ?><?php  echo $name;  ?><?php  echo $zbp->Config('zbpNew')->seoljf;  ?>第<?php  echo $page;  ?>页<?php }elseif($type=="date"&&$page=="1") {  ?><?php  echo $title;  ?><?php  echo $zbp->Config('zbpNew')->seoljf;  ?><?php  echo $name;  ?><?php }elseif($type=="date"&&$page>"1") {  ?><?php  echo $title;  ?><?php  echo $zbp->Config('zbpNew')->seoljf;  ?><?php  echo $name;  ?><?php }elseif($type=="article") {  ?><?php  echo $title;  ?><?php if ($article->Metas->fjtitle) { ?><?php  echo $zbp->Config('zbpNew')->seoljf;  ?><?php  echo $article->Metas->fjtitle;  ?><?php } ?><?php  echo $zbp->Config('zbpNew')->seoljf;  ?><?php  echo $article->Category->Name;  ?><?php  echo $zbp->Config('zbpNew')->seoljf;  ?><?php  echo $name;  ?><?php }elseif($type=="page") {  ?><?php  echo $title;  ?><?php if ($article->Metas->fjtitle) { ?><?php  echo $zbp->Config('zbpNew')->seoljf;  ?><?php  echo $article->Metas->fjtitle;  ?><?php } ?><?php  echo $zbp->Config('zbpNew')->seoljf;  ?><?php  echo $name;  ?><?php  echo $zbp->Config('zbpNew')->seoljf;  ?><?php  echo $subname;  ?><?php }else{  ?><?php  echo $title;  ?><?php  echo $zbp->Config('zbpNew')->seoljf;  ?><?php  echo $name;  ?><?php } ?>
	</title>
	<?php }else{  ?>
	<title><?php  echo $name;  ?><?php  echo $zbp->Config('zbpNew')->seoljf;  ?><?php  echo $title;  ?></title>
	<?php } ?>
	<meta name="generator" content="<?php  echo $zblogphp;  ?>" />
		<?php 
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
 ?>
<?php if ($zbp->Config('zbpNew')->seokg) { ?>
<?php if (isset($keywords)&&strlen($keywords)>0) { ?>
<meta name="keywords" content="<?php  echo $keywords;  ?>">
<?php } ?>
<?php if (isset($description)&&strlen($description)>0) { ?>
<meta name="description" content="<?php  echo $description;  ?>">
<?php } ?>
<?php } ?>
	<link rel="stylesheet" rev="stylesheet" href="<?php  echo $host;  ?>zb_users/theme/<?php  echo $theme;  ?>/style/<?php  echo $style;  ?>.css" type="text/css" media="all"/>
	<link rel="stylesheet" href="<?php  echo $host;  ?>zb_users/theme/<?php  echo $theme;  ?>/style/css/font-awesome.min.css">
	<script src="<?php  echo $host;  ?>zb_system/script/jquery-2.2.4.min.js" type="text/javascript"></script>
    <script src="<?php  echo $host;  ?>zb_system/script/zblogphp.js" type="text/javascript"></script>
    <script src="<?php  echo $host;  ?>zb_system/script/c_html_js_add.php" type="text/javascript"></script>
    <script src="<?php  echo $host;  ?>zb_users/theme/<?php  echo $theme;  ?>/script/zbpNew.js"></script>
<?php  echo $header;  ?>
<?php if ($type=='index'&&$page=='1') { ?>
	<link rel="alternate" type="application/rss+xml" href="<?php  echo $feedurl;  ?>" title="<?php  echo $name;  ?>" />
	<link rel="EditURI" type="application/rsd+xml" title="RSD" href="<?php  echo $host;  ?>zb_system/xml-rpc/?rsd" />
	<link rel="wlwmanifest" type="application/wlwmanifest+xml" href="<?php  echo $host;  ?>zb_system/xml-rpc/wlwmanifest.xml" /> 
<?php } ?>
</head>