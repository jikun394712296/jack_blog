
<?php 
  $avatar = md5(strtolower($comment->Author->Email));
 ?>
<ul class="msg" id="cmt<?php  echo $comment->ID;  ?>">
  <li class="msgname">
    <div class="msgname-cont">
      <div class="avatar"><img alt='<?php  echo $comment->Author->StaticName;  ?>' src="http://cn.gravatar.com/avatar/<?php  echo $avatar;  ?>&amp;r=X&amp;s=50?d=404" onerror='javascript:this.src="<?php  echo $comment->Author->Avatar;  ?>";this.onerror=null;' height='50' width='50' /></div>
      <div class="avatar-right">
        <div class="commentname"><a href="<?php  echo $comment->Author->HomePage;  ?>" rel="nofollow" target="_blank"><?php  echo $comment->Author->StaticName;  ?></a>&nbsp;&nbsp;<span class="comm-time"><?php  echo zbpNew_TimeAgo($comment->Time());  ?></span>&nbsp;&nbsp;<span class="revertcomment"><a href="#comment" onclick="zbp.comment.reply('<?php  echo $comment->ID;  ?>')">回复</a></span></div>
        <div class="comm-content">
        <?php  echo $comment->Content;  ?>
        </div>
      </div>
    </div>
      <?php  foreach ( $comment->Comments as $comment) { ?>
      <?php  include $this->GetTemplate('comment');  ?>
      <?php }   ?>
  </li>
</ul>