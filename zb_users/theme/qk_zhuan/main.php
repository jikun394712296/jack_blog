<?php
require '../../../zb_system/function/c_system_base.php';
require '../../../zb_system/function/c_system_admin.php';

$zbp->Load();
$action='root';
if (!$zbp->CheckRights($action)) {$zbp->ShowError(6);die();}
if (!$zbp->CheckPlugin('qk_zhuan')) {$zbp->ShowError(48);die();}
$blogtitle='主题配置';

require $blogpath . 'zb_system/admin/admin_header.php';
require $blogpath . 'zb_system/admin/admin_top.php';

if(isset($_POST['qkms'])){
  $zbp->Config('qk_zhuan')->logo = $_POST['logo'];
  $zbp->Config('qk_zhuan')->qkms = $_POST['qkms'];
  $zbp->Config('qk_zhuan')->qkgjc = $_POST['qkgjc'];
  $zbp->Config('qk_zhuan')->qkzs = $_POST['qkzs'];
  $zbp->Config('qk_zhuan')->qkfs = $_POST['qkfs'];
  $zbp->Config('qk_zhuan')->beian = $_POST['beian'];
  $zbp->Config('qk_zhuan')->qkft = $_POST['qkft'];
  $zbp->Config('qk_zhuan')->gonggaot = $_POST['gonggaot'];
  $zbp->Config('qk_zhuan')->gonggao = $_POST['gonggao'];
  $zbp->Config('qk_zhuan')->ban = $_POST['ban'];
  $zbp->Config('qk_zhuan')->banlink = $_POST['banlink'];
  $zbp->SaveConfig('qk_zhuan');
  $zbp->ShowHint('good');
}
?>
<script src="script/color/jscolor.js" type="text/javascript"></script>

<div id="divMain">
  <div class="divHeader"><?php echo $blogtitle;?></div>
  <div id="divMain2">
    <form id="form1" name="form1" method="post">
      <table width="100%" style='padding:0;margin:0;' cellspacing='0' cellpadding='0' class="tableBorder">
        <tr>
          <th width="15%"><p align="center">配置名称</p></th>
          <th width="50%"><p align="center">配置内容</p></th>
          <th width="25%"><p align="center">配置说明</p></th>
        </tr>
        <tr>
          <td><label for="gjc">
            <p align="center">主题LOGO</p>
            </label></td>
          <td><p align="left">
              <input id="uplod_img1" class="uplod_img" type="text" size="56" name="logo" value="<?php echo $zbp->Config('qk_zhuan')->logo;?>">
              <input type="button" class="upload_button" value="上传">
              <?php if ($zbp->Config('qk_zhuan')->logo) { ?>
            <div id="img-preview1" class="img-preview"> <img style="width:auto; height:46px" src="<?php echo $zbp->Config('qk_zhuan')->logo;?>" alt=""> <a class="del-img" onclick="clearing();" title="删除">X</a> </div>
            <?php } ?>
            </p></td>
          <td><p align="left" class="help-tip">建议LOGO高度46px，宽度auto，最好为透明的 png 格式的图片。</p></td>
        </tr>
        <tr>
          <td><label for="qkms">
            <p align="center">网站描述</p>
            </label></td>
          <td><p align="left">
              <textarea name="qkms" type="text" id="qkms" style="width:98%;"><?php echo $zbp->Config('qk_zhuan')->qkms;?></textarea>
            </p></td>
          <td><p align="left">首页网站描述</p></td>
        </tr>
        <tr>
          <td><label for="qkgjc">
            <p align="center">网站关键词</p>
            </label></td>
          <td><p align="left">
              <textarea name="qkgjc" type="text" id="qkgjc" style="width:98%;"><?php echo $zbp->Config('qk_zhuan')->qkgjc;?></textarea>
            </p></td>
          <td><p align="left">首页网站关键词</p></td>
        </tr>
        
        <tr>
          <td><label for="qkgjc">
            <p align="center">页脚代码</p>
            </label></td>
          <td><p align="left">
              <textarea name="qkft" type="text" id="qkft" style="width:98%;"><?php echo $zbp->Config('qk_zhuan')->qkft;?></textarea>
            </p></td>
          <td><p align="left">放置页脚代码,可以添加第三方JS代码</p></td>
        </tr>
		
		
		<tr>
          <td><label for="gonggaot">
            <p align="center">公告标题</p>
            </label></td>
          <td><p align="left">
              <textarea name="gonggaot" type="text" id="gonggaot" style="width:98%;"><?php echo $zbp->Config('qk_zhuan')->gonggaot;?></textarea>
            </p></td>
          <td><p align="left">默认为公告</p></td>
        </tr>
		
		<tr>
          <td><label for="gonggao">
            <p align="center">公告内容</p>
            </label></td>
          <td><p align="left">
              <textarea name="gonggao" type="text" id="gonggao" style="width:98%;"><?php echo $zbp->Config('qk_zhuan')->gonggao;?></textarea>
            </p></td>
          <td><p align="left">公告内容</p></td>
        </tr>
		
		<tr>
          <td><label for="ban">
            <p align="center">首页banner图片地址</p>
            </label></td>
          <td><p align="left">
              <textarea name="ban" type="text" id="ban" style="width:98%;"><?php echo $zbp->Config('qk_zhuan')->ban;?></textarea>
            </p></td>
          <td><p align="left">只填写图片地址即可</p></td>
        </tr>
		
		<tr>
          <td><label for="banlink">
            <p align="center">首页banner链接地址</p>
            </label></td>
          <td><p align="left">
              <textarea name="banlink" type="text" id="banlink" style="width:98%;"><?php echo $zbp->Config('qk_zhuan')->banlink;?></textarea>
            </p></td>
          <td><p align="left">只填写要链接的网址http开头</p></td>
        </tr>
		
        
        <tr>
          <td><label for="beian">
            <p align="center">统计/ICP备案号</p>
            </label></td>
          <td><p align="left">
              <textarea name="beian" type="text" id="beian" style="width:98%;"><?php echo $zbp->Config('qk_zhuan')->beian;?></textarea>
            </p></td>
          <td><p align="left">可以添加统计代码或备案号</p></td>
        </tr>
        <tr>
          <td><label>
            <p align="center">网站主色</p>
            </label></td>
          <td><p align="left">
              <input name="qkzs" type="text" class="color"  style="width:100px" value="#<?php echo $zbp->Config('qk_zhuan')->qkzs;?>" />
            </p></td>
          <td><p align="left">默认222222</p></td>
        </tr>
        <tr>
          <td><label>
            <p align="center">网站辅色</p>
            </label></td>
          <td><p align="left">
              <input name="qkfs" type="text" class="color"  style="width:100px" value="#<?php echo $zbp->Config('qk_zhuan')->qkfs;?>" />
            </p></td>
          <td><p align="left">默认F9F9F9</p></td>
        </tr>
		
		<tr>
          <td><label>
            <p align="center">问题反馈</p>
            </label></td>
          <td><p align="left">
              使用过程中有任何问题请给我们留言
            </p></td>
          <td><a href="http://www.76zhuan.com/liuyan.html" target="_blank">点击留言</a></td>
        </tr>
        
      </table>
      <input name="" type="Submit" class="button" value="保存"/>
    </form>
    <br />
  </div>
</div>
<!--<script type="text/javascript">ActiveTopMenu("topmenu_qk_zhuan");</script>--> 
<script type="text/javascript" src="<?php echo $bloghost?>zb_users/theme/qk_zhuan/script/delimg.js"></script>
<?php
if ($zbp->CheckPlugin('UEditor')) {	
	echo '<script type="text/javascript" src="'.$zbp->host.'zb_users/plugin/UEditor/ueditor.config.php"></script>';
	echo '<script type="text/javascript" src="'.$zbp->host.'zb_users/plugin/UEditor/ueditor.all.min.js"></script>';
	echo '<script type="text/javascript" src="'.$zbp->host.'zb_users/theme/qk_zhuan/script/lib.upload.js"></script>';
}
require $blogpath . 'zb_system/admin/admin_footer.php';
RunTime();
?>
