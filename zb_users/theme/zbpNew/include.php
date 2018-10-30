<?php
#注册插件
RegisterPlugin("zbpNew","ActivePlugin_zbpNew");

function ActivePlugin_zbpNew() {
    Add_Filter_Plugin('Filter_Plugin_Admin_TopMenu', 'zbpNew_AddMenu');
    Add_Filter_Plugin('Filter_Plugin_Edit_Response5', 'zbpNew_Filter_Plugin_Edit_Response5');
    Add_Filter_Plugin('Filter_Plugin_Zbp_MakeTemplatetags','zbpNew_add_js');
    Add_Filter_Plugin('Filter_Plugin_ViewPost_Template', 'zbpNew_lazyLoad');
    Add_Filter_Plugin('Filter_Plugin_Category_Edit_Response','zbpNew_Category_Edit_Response');
    Add_Filter_Plugin('Filter_Plugin_Tag_Edit_Response','zbpNew_Tag_Edit_Response');
}
function InstallPlugin_zbpNew() {
   global $zbp;
    //配置初始化
    if (!$zbp->Config('zbpNew')->HasKey('version')) {
        $zbp->Config('zbpNew')->version = '1.0';
        $zbp->Config('zbpNew')->logo= '{#ZC_BLOG_HOST#}zb_users/theme/zbpNew/style/images/logo.png';
        $zbp->Config('zbpNew')->seoljf ='-';
        $zbp->Config('zbpNew')->seokg ='1';
        $zbp->Config('zbpNew')->Keywords = '这里填写你的网站关键词';
        $zbp->Config('zbpNew')->Description = '这里填写你的网站描述';
        $zbp->SaveConfig('zbpNew');
    }
    $zbp->SaveConfig('zbpNew');
}


function zbpNew_AddMenu(&$m) {
    global $zbp;
    array_unshift($m, MakeTopMenu("root", 'zbpNew主题配置', $zbp->host . "zb_users/theme/zbpNew/main.php?act=seo", "", "topmenu_zbpNew"));
}

function zbpNew_SubMenu($id) {
    $arySubMenu = array(
        0 => array('主题介绍', 'ztjs', 'left', false),
        1 => array('基本设置', 'seo', 'left', false)
    );
    foreach ($arySubMenu as $k => $v) {
        echo '<a href="?act=' . $v[1] . '" ' . ($v[3] == true ? 'target="_blank"' : '') . '><span class="m-' . $v[2] . ' ' . ($id == $v[1] ? 'm-now' : '') . '">' . $v[0] . '</span></a>';
    }
}


/*系统缩略图*/
function zbpNew_Filter_Plugin_Edit_Response5() {
    global $zbp, $article;
    echo "<script type=\"text/javascript\" src=\"{$zbp->host}zb_users/theme/zbpblog/script/lib.upload.js\"></script>";
    echo '<div id="divtcimg" class="editmod2"><div id="titleheader" class="editmod">
    <label for="edtTitle" class="editinputname">文章缩略图</label>
    <p align="left" class="uploadimg">
<input name="meta_pic" id="edtTitle" type="text" class="uplod_img" style="width: 60%;" value="' . $article->Metas->pic . '" /><strong class="button" style="color: #ffffff;    font-size: 1.1em;    height: 29px;      padding: 6px 18px 6px 18px;    margin: 0 0.5em;    background: #3a6ea5;    border: 1px solid #3399cc;    cursor: pointer;">浏览文件</strong></p></div></div>';
    if ($zbp->Config('zbpNew')->seokg){
        echo '<div><label for="meta_fjtitle"><span style="font-weight: bold;">附加标题（留空即为不显示）:</span></label><br><input style="width:50%;" type="text" name="meta_fjtitle" value="'.htmlspecialchars($article->Metas->fjtitle).'"/></div>';
        echo '<div><label for="meta_keywords"><span style="font-weight: bold;">关键词:</span></label><br></label><input style="width:50%;" type="text" name="meta_keywords" value="'.htmlspecialchars($article->Metas->keywords).'"/></div>';
        echo '<div><label for="meta_description"><span style="font-weight: bold;">描述:</span></label><br><textarea name="meta_description"  rows="4" cols="60">'.htmlspecialchars($article->Metas->description).'</textarea></div>';
    }
}

//缩略图
function zbpNew_thumbnail($id,$sltwd, $sltgd) {
	global $zbp,$article;
	$article=GetPost((int)$id);
	$temp = mt_rand(11, 19);
	        preg_match_all('/<img.*?(?: |\\t|\\r|\\n)?src=[\'"]?(.+?)[\'"]?(?:(?: |\\t|\\r|\\n)+.*?)?\/>/sim', $article->Content, $strResult, PREG_PATTERN_ORDER);
	        $n = count($strResult[1]);
			$zdy=$article->Metas->pic;
			if(empty($zdy)){
				if($n > 0){
					$thumb=$strResult[1][0];
				} else { 
					$thumb=$zbp->host . "zb_users/theme/" .$zbp->theme. "/style/random/" .$temp. ".jpg";
	        }
			}else{
				$thumb=$zdy;
			}
			$thumb=$zbp->host . "zb_users/theme/".$zbp->theme."/template/timthumb.php?src=".$thumb."&w=".$sltwd."&h=".$sltgd."&zc=1";
			return $thumb;
}

/*友好时间*/
function zbpNew_TimeAgo($ptime) {
    $ptime = strtotime($ptime);
    $etime = time() - $ptime;
    if ($etime < 1) return '刚刚';
    $interval = array(12 * 30 * 24 * 60 * 60 => '年前 (' . date('Y-m-d', $ptime) . ')', 30 * 24 * 60 * 60 => '个月前 (' . date('m-d', $ptime) . ')', 7 * 24 * 60 * 60 => '周前 (' . date('m-d', $ptime) . ')', 24 * 60 * 60 => '天前', 60 * 60 => '小时前', 60 => '分钟前', 1 => '秒前');
    foreach ($interval as $secs => $str) {
        $d = $etime / $secs;
        if ($d >= 1) {
            $r = round($d);
            return $r . $str;
        }
    };
}


//搜索标签云
function zbpNew_tagcloud(){
    global $zbp,$str;
    $str = '';
    $tagArr = $zbp->GetTagList('','','',array(14),'');
    $str .='<ul id="searchTags">';
    foreach ($tagArr as $tag) {
        $str .='<li title="查看更多关于《'.$tag->Name.'》的文章""><a href="'.$tag->Url.'">'.$tag->Name.'</a></li>';
    }
    $str .='</ul>';
    return $str;
}
function zbpNew_Tag_Edit_Response(){
    global $zbp,$tag;
    if ($zbp->Config('zbpNew')->seokg){
        echo '<div><label for="meta_fjtitle"><span style="font-weight: bold;">附加标题（留空即为不显示）:</span></label><br><input style="width:293px;" type="text" name="meta_fjtitle" value="'.htmlspecialchars($tag->Metas->fjtitle).'"/></div>';
        echo '<div><label for="meta_keywords"><span style="font-weight: bold;">关键词:</span></label><br></label><input style="width:293px;" type="text" name="meta_keywords" value="'.htmlspecialchars($tag->Metas->keywords).'"/></div>';
        echo '<div><label for="meta_description"><span style="font-weight: bold;">描述:</span></label><br><input style="width:293px;" type="text" name="meta_description" value="'.htmlspecialchars($tag->Metas->description).'"/></div>';
    }
}
function zbpNew_Category_Edit_Response(){
    global $zbp,$cate;
    if ($zbp->Config('zbpNew')->seokg){
        echo '<div><label for="meta_fjtitle"><span style="font-weight: bold;">附加标题（留空即为不显示）:</span></label><br><input style="width:293px;" type="text" name="meta_fjtitle" value="'.htmlspecialchars($cate->Metas->fjtitle).'"/></div>';
        echo '<div><label for="meta_keywords"><span style="font-weight: bold;">关键词:</span></label><br></label><input style="width:293px;" type="text" name="meta_keywords" value="'.htmlspecialchars($cate->Metas->keywords).'"/></div>';
        echo '<div><label for="meta_description"><span style="font-weight: bold;">描述:</span></label><br><input style="width:293px;" type="text" name="meta_description" value="'.htmlspecialchars($cate->Metas->description).'"/></div>';
    }
}
function zbpNew_lazyLoad(&$template){
  global $zbp,$placeIMG;    
  $article = $template->GetTags('article');
  $placeIMG = $zbp->host . 'zb_users/theme/'.$zbp->theme.'/style/images/grey.gif';
  $article->Content = preg_replace("/(<img[^>]+src=)[\"']?([^\"']+\.(gif|jpg|jpeg|png))/", "$1\"{$placeIMG}\" data-original=\"$2", $article->Content); 
}
//插入js
function zbpNew_add_js(){
    global $zbp;
    $zbp->footer .= "<script type=\"text/javascript\">
    $(function() {
        $(\"img:not(.avatar>img)\").lazyload({
            placeholder:\"{$zbp->host}zb_users/theme/{$zbp->theme}/style/images/grey.gif\",
            threshold:1,
            effect:\"fadeIn\"
          });
        });
</script>\r\n";
}
function UninstallPlugin_zbpNew() {
     global $zbp;
    // $zbp->SetHint('good', '清除成功');
    // $zbp->DelConfig('zbpNew');
}
