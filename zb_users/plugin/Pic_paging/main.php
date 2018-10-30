<?php /* EL PSY CONGROO */    			   	 
require '../../../zb_system/function/c_system_base.php';     	 	 		 
require '../../../zb_system/function/c_system_admin.php';    		 		 	 
$zbp->Load();    	 	  	  
$action='root';     	      
if (!$zbp->CheckRights($action)) {$zbp->ShowError(6);die();}       	   	
if (!$zbp->CheckPlugin('Pic_paging')) {$zbp->ShowError(48);die();}    		      
foreach ($_POST as $type=>$sj){
    $zbp->Config('Pic_paging')->$type = $sj;
}   
$zbp->SaveConfig('Pic_paging');
$blogtitle='文章图片分页';        	   
require $blogpath . 'zb_system/admin/admin_header.php';    		 	  	 
require $blogpath . 'zb_system/admin/admin_top.php';     	 	   	
?>
<style type="text/css">
td label{margin-right:9px;}
td {height:40px;}
</style>
<div id="divMain">
  <div class="divHeader"><?php echo $blogtitle;?></div>
  <div id="divMain2">
<form action="main.php" method="post">
    <table class="tb-set" width="100%">
        <tr>
            <td style="width:200px"><label>前后按钮使用符号</label></td>
            <td><input name="showzhen" class="checkbox" type="text" value="<?php echo $zbp->Config('Pic_paging')->showzhen;?>" /></td>
        </tr>
        <tr>
            <td><label>点击图片跳转到下一张</label></td>
            <td><input name="clickimgjump" class="checkbox" type="text" value="<?php echo $zbp->Config('Pic_paging')->clickimgjump;?>" /></td>
        </tr>
        <tr>
            <td><label>"显示全部"按钮</label></td>
            <td><input name="showall" class="checkbox" type="text" value="<?php echo $zbp->Config('Pic_paging')->showall;?>" /></td>
        </tr>
        <tr>
            <td><label>数字页数数量</label></td>
            <td><input type="number" name="showpage" value="<?php echo $zbp->Config('Pic_paging')->showpage?:3; ?>"></td>
        </tr>
        <tr>
            <td><label></label></td>
            <td><input name="submit" type="submit" class="button" value="保存"/></td>
        </tr>
    </table>
</form>
	</div>
</div>
<script type="text/javascript">AddHeaderIcon("<?php echo $bloghost . 'zb_users/plugin/Pic_paging/logo.png';?>");</script>
<?php
require $blogpath . 'zb_system/admin/admin_footer.php';    					 		
RunTime();         	 	
?>