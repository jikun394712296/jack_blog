<?php



function qk_zhuan_previous() {
	global $zbp;
	$i = $zbp->modulesbyfilename['previous']->MaxLi;
	if ($i == 0) $i = 8;
	$articles = $zbp->GetArticleList('*', array(array('=', 'log_Type', 0), array('=', 'log_Status', 0)), array('log_PostTime' => 'DESC'), $i, null,false);
	$s = '';
	foreach ($articles as $key=>$article) {
		$key = $key+1;
	$imgrand=rand(1,8);
	 $pattern="/<[img|IMG].*?src=[\'|\"](.*?(?:[\.gif|\.jpg|\.png]))[\'|\"].*?[\/]?>/";
        $content = $article->Content;
        preg_match_all($pattern,$content,$matchContent);
        if(isset($matchContent[1][0]))
            $imgrand=$matchContent[1][0];
        else
            $imgrand="{$zbp->host}zb_users/theme/qk_zhuan/style/images/$imgrand.jpg";
		 $s .='<li class="qk_zuixin"><a href="'.$article->Url.'" title="'.$article->Title.'">'.$article->Title.'</a></li>';
    }		
	return $s;
}

//重建模块
function qk_zhuan_rebuild_Main() {
	global $zbp;
	$zbp->RegBuildModule('previous','qk_zhuan_previous');
	$zbp->RegBuildModule('comments','qk_zhuan_comments');
}

?>