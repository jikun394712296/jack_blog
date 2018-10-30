<?php  /* Template Name:公共头部 */  ?> 
<!DOCTYPE html>
<html lang="<?php  echo $lang['lang_bcp47'];  ?>">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<meta http-equiv="X-UA-Compatible" content="ie=edge" />
<meta name="generator" content="<?php  echo $zblogphp;  ?>" />
<meta name="renderer" content="webkit">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
<?php if ($type=='article') { ?>
<title><?php  echo $title;  ?>-<?php  echo $article->Category->Name;  ?>-<?php  echo $name;  ?></title>
<meta name="keywords" content="<?php  foreach ( $article->Tags as $tag) { ?><?php  echo $tag->Name;  ?>,<?php }   ?>" />
<meta name="description" content="<?php  echo $article->Title;  ?>是<?php  echo $name;  ?>中一篇关于<?php  foreach ( $article->Tags as $tag) { ?><?php  echo $tag->Name;  ?><?php }   ?>的文章，欢迎您阅读和评论,<?php  echo $name;  ?>" />
<?php }elseif($type=='page') {  ?>
<title><?php  echo $title;  ?>-<?php  echo $name;  ?></title>
<meta name="keywords" content="<?php  echo $title;  ?>,<?php  echo $name;  ?>"/>
<?php $description = preg_replace('/[\r\n\s]+/', ' ', trim(SubStrUTF8(TransferHTML($article->Content,'[nohtml]'),135)).'...'); ?>
<meta name="description" content="<?php  echo $description;  ?>"/>
<meta name="author" content="<?php  echo $article->Author->StaticName;  ?>">
<?php }elseif($type=='index') {  ?>
<title><?php  echo $name;  ?><?php if ($page>'1') { ?>-第<?php  echo $pagebar->PageNow;  ?>页<?php } ?>-<?php  echo $subname;  ?></title>
<meta name="Keywords" content="<?php  echo $zbp->Config('qk_zhuan')->qkgjc;  ?>">
<meta name="description" content="<?php  echo $zbp->Config('qk_zhuan')->qkms;  ?>">
<?php }elseif($type=='category') {  ?>
<title><?php  echo $title;  ?>-<?php  echo $name;  ?></title>
<meta name="Keywords" content="<?php  echo $title;  ?>,<?php  echo $name;  ?>">
<meta name="description" content="<?php  echo $category->Intro;  ?>">
<?php }else{  ?>
<title><?php  echo $title;  ?>-<?php  echo $name;  ?></title>
<?php } ?>
<link href="<?php  echo $host;  ?>zb_users/theme/<?php  echo $theme;  ?>/style/bootstrap.min.css"  rel="stylesheet">	
<link rel="stylesheet" rev="stylesheet" href="<?php  echo $host;  ?>zb_users/theme/<?php  echo $theme;  ?>/style/common.css" type="text/css" media="all"/>
<link rel="stylesheet" type="text/css" href="<?php  echo $host;  ?>zb_users/theme/<?php  echo $theme;  ?>/style/article_detail.css"/>

<script src="<?php  echo $host;  ?>zb_system/script/jquery-2.2.4.min.js" type="text/javascript"></script> 
<script src="<?php  echo $host;  ?>zb_system/script/zblogphp.js" type="text/javascript"></script> 
<script src="<?php  echo $host;  ?>zb_system/script/c_html_js_add.php" type="text/javascript"></script> 
<script src="<?php  echo $host;  ?>zb_users/theme/<?php  echo $theme;  ?>/script/custom.js" type="text/javascript"></script> 
<style>
.w_header{height: 55px; margin-bottom: -55px; position: fixed; z-index:999; width: 100%; box-shadow:1px 3px 5px #ccc; opacity:.90;  background: #<?php  echo $zbp->Config('qk_zhuan')->qkzs;  ?>;}
.w_foot_copyright{height: 40px; text-align: center; padding-top: 10px; color:#b2bcc5; font-size:13px;  background: #<?php  echo $zbp->Config('qk_zhuan')->qkzs;  ?>;}
.side-box dl dt,.info-close h2 {font-size: 18px; line-height:40px;color: #393939;border-left-style: solid;border-left-width: 0px;margin-left: 0px;margin-bottom: 15px;padding: 5px 0 5px 18px;text-align: left; background-color:#<?php  echo $zbp->Config('qk_zhuan')->qkfs;  ?>; }
#divCalendar th{color: #FFFFFF;text-transform: uppercase;height:26px;background-color: #<?php  echo $zbp->Config('qk_zhuan')->qkzs;  ?>;}

</style>	
<?php  echo $header;  ?></head>


	






	<body>
		<div class="w_header">
			<div class="container">
				<div class="w_header_top">
				<?php 
    			  if($zbp->Config('qk_zhuan')->logo){
    			  $logo = $zbp->Config('qk_zhuan')->logo;
    			  }else{
    			  $logo = $host."zb_users/theme/".$theme."/style/images/logo.png";
    			  }
     		     ?>
					<a href="<?php  echo $host;  ?>" title="<?php  echo $name;  ?>" rel="home" class="w_logo sousuoz" ><img src="<?php  echo $logo;  ?>" alt="<?php  echo $name;  ?>"></a>
					<span class="w_header_nav">
					<ul>
						<?php  if(isset($modules['navbar'])){echo $modules['navbar']->Content;}  ?>
					</ul>
				</span>
				<form name="search" method="post" action="<?php  echo $host;  ?>zb_system/cmd.php?act=search" class="sousuoz">
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