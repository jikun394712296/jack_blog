<!--面包屑导航-->
<?php if ($type =='index') { ?>
<?php } ?>
<?php if ($type!='index') { ?>
    <div class="container">
当前位置<em>:</em>
<?php if ($type == 'category') { ?>
    <i class="fa fa-home"></i> <a href="<?php  echo $host;  ?>" title="<?php  echo $name;  ?>">首页</a>
    <?php 
        $html='';
        function navcate($id){
            global $html;
            $cate = new Category;
            $cate->LoadInfoByID($id);
            $html ='&raquo;  <a href="' .$cate->Url.'" title="查看' .$cate->Name. '中的全部文章">' .$cate->Name. '</a> '.$html;
            if(($cate->ParentID)>0){navcate($cate->ParentID);}
        }
        navcate($category->ID);
        global $html;
        echo $html;
     ?>
<?php }elseif($type =="article") {  ?>  
     <i class="fa fa-home"></i> <a href="<?php  echo $host;  ?>" title="<?php  echo $name;  ?>">首页</a>    
     <?php 
        $html='';
        function navcate($id){
            global $html;
            $cate = new Category;
            $cate->LoadInfoByID($id);
            $html ='&raquo;  <a href="' .$cate->Url.'" title="查看' .$cate->Name. '中的全部文章">' .$cate->Name. '</a> '.$html;
            if(($cate->ParentID)>0){navcate($cate->ParentID);}
        }
        navcate($article->Category->ID);
        global $html;
        echo $html;
    ?> &raquo; 正文
<?php }elseif($type =="page") {  ?>
     <i class="fa fa-home"></i> <a href="<?php  echo $host;  ?>" title="<?php  echo $name;  ?>">首页</a>
     &raquo; 正文 
<?php }elseif($type =="tag") {  ?>
     <i class="fa fa-home"></i> <a href="<?php  echo $host;  ?>" title="<?php  echo $name;  ?>">首页</a>
     &raquo;
     <span class="current">标签存档：<?php  echo $tag->Name;  ?></span>
<?php }elseif($type =="author") {  ?>
      <i class="fa fa-home"></i> <a href="<?php  echo $host;  ?>" title="<?php  echo $name;  ?>">首页</a>
      &raquo;
     <span class="current"><?php  echo $author->Name;  ?> 的文章</span>
<?php } ?>
    </div>
<?php } ?>