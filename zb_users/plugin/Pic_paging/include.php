<?php
RegisterPlugin("Pic_paging", "ActivePlugin_Pic_paging");
function ActivePlugin_Pic_paging() {
	Add_Filter_Plugin('Filter_Plugin_ViewPost_Template', 'Pic_paging_main');
}

//代码从大谋的简单分页插件修改
function Pic_paging_main($template) {
	global $zbp;

	$zbp->header .='<link rel="stylesheet" rev="stylesheet" href="'. $zbp->host.'zb_users/plugin/Pic_paging/page.css" type="text/css" media="all"/>';
	$article = $zbp->template->GetTags('article');

    preg_match_all('/(\s+src\s?\=)\s?[\'|"]([^\'|"]*)/is', $article->Content, $match);
    $imgarr = $match[2];
	if (!$imgarr) return;
	$tt = $zbp->option['ZC_STATIC_MODE'] =="ACTIVE"?'&page=':'?page=';
	
	$array_content = $imgarr;
	$pages = count($imgarr);
	$showpage = $zbp->Config('Pic_paging')->showpage?:3;
	$lang = $zbp->Config('Pic_paging')->showzhen?array('<<','<','>','>>','All'):array('首页','上一页','下一页','尾页','显示全部');
	$pagenum = GetVars('page', 'GET');
	if ( $pagenum == '' || is_numeric($pagenum)){
		$pagenum = ($pagenum > 0 && $pagenum <= $pages) ? $pagenum : 1;
		$pagenav = '<ul id="Pic_paging">';
		if (($pagenum - 1) > 0) {
			$pagenav.= '<li class="prev-page"><a href="' .$article->Url.'">'.$lang[0].'</a></li>';
			$pagenav.= '<li class="prev-page"><a href="' .$article->Url.$tt.($pagenum - 1).'">'.$lang[1].'</a></li>';
		}
		for ($i = 1;$i <= $pages;$i++) {
			if ($i == $pagenum) {
				$pagenav.= '<li><span>' . $i . '</span></li>';
			} else {
			    if ($pages > $showpage+3 && $i < $pagenum && $pagenum - $i <= $showpage){
			        $pagenav.= '<li><a href="' .$article->Url.$tt.$i. '">' . $i . '</a></li>';
			    }elseif ($pages > $showpage+3 && $i > $pagenum && !($i - $pagenum > $showpage) ){
			        $pagenav.= '<li><a href="' .$article->Url.$tt.$i. '">' . $i . '</a></li>';
			    }
			}
		}
		if (($pagenum + 1) <= $pages) {
		    $pagenav.= '<li class="next-page"><a href="' .$article->Url.$tt.($pagenum + 1).'">'.$lang[2].'</a></li>';
			$pagenav.= '<li class="next-page"><a href="' .$article->Url.$tt.$pages. '">'.$lang[3].'</a></li>';
		}
		if ($zbp->Config('Pic_paging')->showall)
		$pagenav.= '<li class="all-page"><a href="' .$article->Url.$tt.'all'. '">'.$lang[4].'</a></li></ul>';
		if ($zbp->Config('Pic_paging')->clickimgjump && $pagenum != $pages){
		    $article->Content = '<a href="' .$article->Url.$tt.($pagenum + 1).'"><img src="'.$array_content[$pagenum - 1].'"></a>'. $pagenav;
		}else{
		    $article->Content = '<img src="'.$array_content[$pagenum - 1].'">'. $pagenav;
		}
		if ($pagenum >= 1) {
			$zbp->template->SetTags('title', $article->Title.'-第' . $pagenum . '页');
		}
		$zbp->template->SetTags('article', $article);
	}else{
		$zbp->template->SetTags('title', $article->Title.'-全文');
		$zbp->template->SetTags('article', $article);
	}
}