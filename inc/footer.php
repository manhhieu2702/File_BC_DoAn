</div>
<div class="footer" style="background: #ff7100; color: white; font-weight: bold;border: none;">
    <div class="wrapper" style="border: none;">
        <div class="section group" style="border: none;">
            <div class="col_1_of_4 span_1_of_4" style="border: none;">
                <h4>Thông tin</h4>
                <ul>
                    <li><a href="#">Thông tin cửa hàng</a></li>
                    <li><a href="#">Dịch vụ chăm sóc khách hàng</a></li>
                    <li><a href="#">Đặt hàng và đổi trả</a></li>
                    <li><a href="#"><span>Liên hệ</span></a></li>
                </ul>
            </div>
            <div class="col_1_of_4 span_1_of_4" style="border: none;">
                <h4>Tại sao nên đặt hàng ?</h4>
                <ul>
                    <li><a href="about.php">Về cửa hàng</a></li>
                    <li><a href="faq.php">Chăm sóc khách hành</a></li>
                    <li><a href="#">Thủ tục pháp lý</a></li>
                </ul>
            </div>
            <div class="col_1_of_4 span_1_of_4" style="border: none;">
                <h4>Tài khoản</h4>
                <ul>
                    <li><a href="contact.php">Đăng nhập</a></li>
                    <li><a href="index.php">Xem giỏ hàng</a></li>
                    <li><a href="#">Danh sách yêu thích</a></li>
                    <li><a href="#">Đơn hàng của tôi</a></li>
                    <li><a href="faq.php">Trợ giúp</a></li>
                </ul>
            </div>
            <div class="col_1_of_4 span_1_of_4" style="border: none;">
                <h4>Liên hệ đường dây nóng</h4>
                <ul>
                    <li><span>+84-0977271847</span></li>
                    <li><span>+84-0335557245</span></li>
                </ul>
                <div class="social-icons" style="border: none;">
                    <h4>Theo dõi fanpage</h4>
                    <ul>
                        <li class="facebook"><a href="#" target="_blank"> </a></li>
                        <li class="twitter"><a href="#" target="_blank"> </a></li>
                        <li class="googleplus"><a href="#" target="_blank"> </a></li>
                        <li class="contact"><a href="#" target="_blank"> </a></li>
                        <div class="clear"></div>
                    </ul>
                </div>
            </div>
        </div>
        <div class="copy_right">
            <p>Copy right by DiepHoaStore &amp; All rights Reseverd </p>
        </div>
    </div>
</div>
<script type="text/javascript">
$(document).ready(function() {
    /*
			var defaults = {
	  			containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
	 		};
			*/

    $().UItoTop({
        easingType: 'easeOutQuart'
    });

});
</script>
<a href="#" id="toTop" style="display: block;"><span id="toTopHover" style="opacity: 1;"></span></a>
<link href="css/flexslider.css" rel='stylesheet' type='text/css' />
<script defer src="js/jquery.flexslider.js"></script>
<script type="text/javascript">
$(function() {
    SyntaxHighlighter.all();
});
$(window).load(function() {
    $('.flexslider').flexslider({
        animation: "slide",
        start: function(slider) {
            $('body').removeClass('loading');
        }
    });
});
</script>
</body>

</html>
<?php
ob_end_flush();
?>