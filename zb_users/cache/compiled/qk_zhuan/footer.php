		<div class="w_foot">
			<div class="w_foot_copyright">
				Powered By <?php  echo $zblogphphtml;  ?><span><?php  echo $copyright;  ?>&nbsp;</span><?php  echo $zbp->Config('qk_zhuan')->beian;  ?>
			</div>
		</div>
	<?php  echo $footer;  ?></body>
	<script type="text/javascript">
		var $backToTopEle = $('<a href="javascript:void(0)" class="Hui-iconfont toTop" title="返回顶部" alt="返回顶部" style="display:none">^</a>').appendTo($("body")).click(function() {
			$("html, body").animate({ scrollTop: 0 }, 120);
		});
		var backToTopFun = function() {
			var st = $(document).scrollTop(),
				winh = $(window).height();
			(st > 0) ? $backToTopEle.show(): $backToTopEle.hide();
			/*IE6下的定位*/
			if(!window.XMLHttpRequest) {
				$backToTopEle.css("top", st + winh - 166);
			}
		};

		$(function() {
			$(window).on("scroll", backToTopFun);
			backToTopFun();
		});
	</script>

</html>