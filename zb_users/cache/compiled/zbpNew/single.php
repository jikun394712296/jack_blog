
<?php  include $this->GetTemplate('header');  ?>
<body>
<?php  include $this->GetTemplate('navbar');  ?>

    <?php if ($article->Type==ZC_POST_TYPE_ARTICLE) { ?>
    <?php  include $this->GetTemplate('post-single');  ?>
    <?php }else{  ?>
    <?php  include $this->GetTemplate('post-page');  ?>
    <?php } ?>

<?php  include $this->GetTemplate('footer');  ?>