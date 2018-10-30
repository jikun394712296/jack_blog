<?php  /* Template Name:404错误页 */  ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="Cache-Control" content="no-transform"/>
	<meta http-equiv="Content-Language" content="<?php  echo $language;  ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <title>对不起，页面未找到</title>
    <link rel="stylesheet" rev="stylesheet" href="<?php  echo $host;  ?>zb_users/theme/<?php  echo $theme;  ?>/style/images/404.css" type="text/css" media="all"/>
    <style>
	.page-back,submit{background-color: #<?php  echo $zbp->Config('qk_zhuan')->qkzs;  ?>
	</style>
</head>
<body>
<div class="wrapper-page">
    <div class="page-ex">
        <h1>404!</h1>
        <h2>对不起，页面未找到</h2><br>
        <form name="search" method="post" action="<?php  echo $host;  ?>zb_system/cmd.php?act=search">
		    <input type="text" name="q" size="11" placeholder="找不到内容？尝试下我们的搜索吧!"> 
			<input type="submit" value="搜索">
		</form>
        <br>
        <a class="page-back" href="<?php  echo $host;  ?>"><i class="fa fa-angle-left"></i> 返回首页</a>
    </div>
</div>
</body>
</html>