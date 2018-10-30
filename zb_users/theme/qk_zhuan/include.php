<?php
require dirname(__FILE__) . DIRECTORY_SEPARATOR . '/modular.php';
RegisterPlugin("qk_zhuan","ActivePlugin_qk_zhuan");


function ActivePlugin_qk_zhuan(){
Add_Filter_Plugin('Filter_Plugin_Admin_TopMenu','qk_zhuan_AddMenu');
Add_Filter_Plugin('Filter_Plugin_ViewPost_Template','qk_zhuan_tags_set');
Add_Filter_Plugin('Filter_Plugin_Zbp_Load','qk_zhuan_rebuild_Main');
global $zbp;
$zbp->LoadLanguage('theme', 'qk_zhuan');
}


function qk_zhuan_Thumbs($src,$width,$height) {
    global $zbp;
    if (!$zbp->CheckPlugin('IMAGE')) {
        $thumbs_src=$src;
    } else {
        $thumbs_src=IMAGE::getPicUrlBy($src,$width,$height,4);
    }
    return $thumbs_src;
}
function qk_zhuan_FirstIMG($as,$pos,$width,$height) {
    global $zbp;   
    $temp=mt_rand(1,3);
    $pattern = "/<img.*?src=(\"|')?(?<src>.*?\.(gif|jpg|jpeg|png))(\"|')?.*?>/";   
    $content = $as->Content;
    if ($pos->Metas->jietu){
        $temp=$pos->Metas->jietu;
    }else{
        if(preg_match($pattern,$content,$matchContent) && isset($matchContent['src'])){
            $temp=$matchContent['src'];
        } else {
            $temp=$zbp->host . "zb_users/theme/" .$zbp->theme. "/include/pic.png";
        }
    }
    $src = qk_zhuan_Thumbs($temp,$width,$height);
    return $src;
}



function qk_zhuan_intro($as,$type,$long,$other){
    global $zbp;
    $str = '';
    if ($type=='0') {
        $str .= preg_replace('/[\r\n\s]+/', '', trim(SubStrUTF8(TransferHTML($as->Intro,'[nohtml]'),$long)).$other);
    } else {
        $str .= preg_replace('/[\r\n\s]+/', '', trim(SubStrUTF8(TransferHTML($as->Content,'[nohtml]'),$long)).$other);
    }
    return $str;
}





function qk_zhuan_AddMenu(&$m){
global $zbp;
	array_unshift($m, MakeTopMenu("root",'主题配置',$zbp->host . "zb_users/theme/qk_zhuan/main.php","","topmenu_qk_zhuan"));
}
function qk_zhuan_tags_set(&$template){
	global $zbp;
	$template->SetTags('qk_zhuan_gonggaot',$zbp->Config('qk_zhuan')->gonggaot);
	$template->SetTags('qk_zhuan_gonggao',$zbp->Config('qk_zhuan')->gonggao);
    $template->SetTags('qk_zhuan_qkms',$zbp->Config('qk_zhuan')->qkms);
    $template->SetTags('qk_zhuan_qkgjc',$zbp->Config('qk_zhuan')->qkgjc);
	$template->SetTags('qk_zhuan_qkzs',$zbp->Config('qk_zhuan')->qkzs);
	$template->SetTags('qk_zhuan_qkfs',$zbp->Config('qk_zhuan')->qkfs);
	$template->SetTags('qk_zhuan_ban',$zbp->Config('qk_zhuan')->ban);
	$template->SetTags('qk_zhuan_banlink',$zbp->Config('qk_zhuan')->banlink);
}
function InstallPlugin_qk_zhuan(){
	global $zbp;
	if(!$zbp->Config('qk_zhuan')->HasKey('Version')){
		$zbp->Config('qk_zhuan')->Version = '1.3';
		$zbp->Config('qk_zhuan')->gonggaot = '公告标题';
		$zbp->Config('qk_zhuan')->gonggao = '在这里输入网站的公告内容......';
		$zbp->Config('qk_zhuan')->bn = 'false';
		$zbp->Config('qk_zhuan')->qkms = '网站描述';
		$zbp->Config('qk_zhuan')->qkgjc = '网站关键词';
		$zbp->Config('qk_zhuan')->qkzs = '222222';
		$zbp->Config('qk_zhuan')->qkfs = 'F9F9F9';
		$zbp->Config('qk_zhuan')->ban = '/zb_users/theme/qk_zhuan/style/images/slider/slide2.jpg';
		$zbp->Config('qk_zhuan')->banlink = '#';
		$zbp->SaveConfig('qk_zhuan');
	}
}
//卸载主题
function UninstallPlugin_qk_zhuan(){
	global $zbp;
}
?>