
<?php  include $this->GetTemplate('header');  ?>
<body>
<?php  include $this->GetTemplate('navbar');  ?>
<?php 
if($_GET['q']){
    $key = $_GET['q'];
}
 ?>
 <main>
  <!--内容专区start-->
        <section class="main-content clearfix">
        <?php  foreach ( $articles as $article) { ?> 
                <?php if ($article->IsTop) { ?>
                <?php  include $this->GetTemplate('post-istop');  ?>
                <?php }else{  ?>
                <?php  include $this->GetTemplate('post-multi');  ?>
                <?php } ?>
        <?php }   ?> 
    </section> 
    <!--内容专区end-->
    <!--分页bar-->            
    <?php  include $this->GetTemplate('pagebar');  ?>
    </main>
<?php  include $this->GetTemplate('footer');  ?>