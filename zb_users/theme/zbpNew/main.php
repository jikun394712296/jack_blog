<?php
require '../../../zb_system/function/c_system_base.php';
require '../../../zb_system/function/c_system_admin.php';

$zbp->Load();
$action = 'root';
if (!$zbp->CheckRights($action)) {$zbp->ShowError(6);die();}
if (!$zbp->CheckPlugin('zbpNew')) {$zbp->ShowError(48);die();}
$blogtitle = 'zbpNew主题配置';

$act = "";
if (@$_GET['act']){
$act = $_GET['act'] == "" ? 'seo' : $_GET['act'];
}
require $blogpath . 'zb_system/admin/admin_header.php';
require $blogpath . 'zb_system/admin/admin_top.php';
?>
   <?php
  if(isset($_POST['seo'])){
    $zbp->Config('zbpNew')->logo= $_POST['logo'];
    $zbp->Config('zbpNew')->seoljf = $_POST['seoljf'];
    $zbp->Config('zbpNew')->Keywords = $_POST['keywords'];
    $zbp->Config('zbpNew')->Description = $_POST['description'];
    $zbp->Config('zbpNew')->seokg = $_POST['seokg'] ;
    $zbp->SaveConfig('zbpNew');
    $zbp->SetHint('good');
    Redirect('./main.php?act=seo');
  }

  if ($zbp->CheckPlugin('UEditor')) { 
  echo '<script type="text/javascript" src="'.$zbp->host.'zb_users/plugin/UEditor/ueditor.config.php"></script>';
  echo '<script type="text/javascript" src="'.$zbp->host.'zb_users/plugin/UEditor/ueditor.all.min.js"></script>';
}
	?>
<style type="text/css">
#img_editor {display:none}
.uploadimg strong{color: #ffffff;font-size: 1.1em;height: 29px;padding: 2px 18px 3px 18px;margin: 0 0.5em;background: #3a6ea5;border: 1px solid #3399cc;cursor: pointer;}
</style>

<script type="text/javascript" src="script/lib.upload.js"></script>
<div id="divMain">
  <div class="divHeader"><?php echo $blogtitle;?></div>
  <div class="SubMenu"><?php zbpNew_SubMenu($act);?></div>
  <div id="divMain2">
  <?php 
  if($act == 'seo'){
   ?>
     <!--seo-->
     <form method="POST" action="main.php">
    <table>
      <tr>
        <td  align="center" width="10%">LOGO</td>
        <td  width="40%" class="uploadimg"><input name="logo" type="text"  style="width:70%;" class="uplod_img" value="<?php echo $zbp->Config('zbpNew')->logo;?>" /><strong class="button">浏览文件</strong></td>
      </tr>
        <tr>
        <td  align="center" width="10%" height="35">连接符</td>
        <td  width="40%" height="35">
       <input id="sx" name="seoljf" type="radio" value="|" <?php echo (($zbp->Config('zbpNew')->seoljf == '|') ? 'checked="checked"' : '');?>/><label for="sx">竖线"|"</label>
       <input id="zhg" name="seoljf" type="radio" value="-" <?php echo (($zbp->Config('zbpNew')->seoljf == '-') ? 'checked="checked"' : '');?>/><label for="zhg">中横杠"-"</label>
       <input id="xhx" name="seoljf" type="radio" value="_" <?php echo (($zbp->Config('zbpNew')->seoljf == '_') ? 'checked="checked"' : '');?>/><label for="xhx">下划线"_"</label>
        </td>
      </tr>
      <tr>
        <td  align="center" width="10%">首页关键词</td>
        <td  width="40%">
       <textarea name="keywords"  rows="4" cols="60"><?php echo $zbp->Config('zbpNew')->Keywords; ?></textarea>
        </td>
      </tr>
      <tr>
        <td  align="center" width="10%">首页网站描述</td>
        <td width="40%">
        <textarea name="description"  rows="4" cols="60"><?php echo $zbp->Config('zbpNew')->Description; ?></textarea>
        </td>
      </tr>
        <tr>
        <td height="35" colspan="1" align="center" width="25%">是否开启自带seo（如有其它seo工具，请关闭此开关）</td>
        <td height="35" colspan="3" align="center"><input name="seokg" type="text" value="<?php echo $zbp->Config('zbpNew')->seokg;?>"  class="checkbox" style="display:none;" /></td>
      </tr>
      <tr>
        <td  align="center" width="10%"><input type="submit" name="seo"></td><td   colspan="3"></td>
      </tr>
    </table>
    </form>
  <?php }?>
<?php if($act == 'ztjs'){?>
<form id="form4" name="form4" method="post">	
<table name="form1" width="100%" style="padding:0;margin:0;" cellspacing="0" cellpadding="0" class="tableBorder">
	<tr><td>
		<p>感谢你喜欢并使用此主题！</p>
    <p>声明：免费主题是无技术支持，有问题可以在我博客或者应用中心主题页进行反馈，有时间就会修复。</p>
    <p>主题可自由修改，或者可以找我付费解决 QQ:763989459</p>
	</td></tr>	
</table>
</form>
<?php } ?>
  </div>
</div>
<script type="text/javascript">
ActiveTopMenu("topmenu_zbpNew");
AddHeaderIcon("<?php echo $zbp->host?>zb_system/style/img/common/themes_32.png");
</script>
<?php
require $blogpath . 'zb_system/admin/admin_footer.php';
RunTime();
?>