
<?php if ($pagebar) { ?>
<div class="pagebar container">
<?php  foreach ( $pagebar->buttons as $k=>$v) { ?>
<?php if ($pagebar->PageNow==$k) { ?>
<a class="page-num current"><?php  echo $k;  ?></a>
<?php }elseif($k=='‹‹' and $pagebar->PageNow!=$pagebar->PageFirst) {  ?>
<a href="<?php  echo $pagebar->buttons['‹‹'];  ?>" class="page-num" title="首页">首页</a>
<?php }elseif($k=='‹‹' and $pagebar->PageNow==$pagebar->PageFirst) {  ?>
<?php }elseif($k=='››' and $pagebar->PageNow==$pagebar->PageLast) {  ?>
<?php }elseif($k=='››' and $pagebar->PageNow!=$pagebar->PageLast) {  ?>
<a href="<?php  echo $pagebar->buttons['››'];  ?>" class="page-num last" title="末页">末页 </a>
<?php }elseif($k=='‹') {  ?>
<a href="<?php  echo $v;  ?>" title="<?php  echo $k;  ?>" class="page-num pre">上一页</a>
<?php }elseif($k=='›') {  ?>
<a href="<?php  echo $v;  ?>" title="<?php  echo $k;  ?>" class="page-num next">下一页</a>
<?php }else{  ?>
<a href="<?php  echo $v;  ?>" title="<?php  echo $k;  ?>" class="page-num"><?php  echo $k;  ?></a>
<?php } ?>
<?php }   ?>
</div>
<?php } ?>