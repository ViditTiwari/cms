			<!--/start-footer-section-->
			<div class="footer-section">
				<div class="container">
					<div class="footer-grids wow bounceIn animated" data-wow-delay="0.4s">
						<div class="col-md-3 footer-grid">
						<h4>Block 1</h4>
						<div class="border2"></div>
						  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque id arcu neque, at convallis est felis.</p>
						  <p class="sub">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque id arcu neque, at convallis est felis.</p>
						</div>
						<div class="col-md-3 footer-grid tags">
								<h4>Block 2</h4>
								<div class="border2"></div>
							
						</div>
						<div class="col-md-3 footer-grid tweet">
								<h4>Block 3</h4>
								<div class="border2"></div>
								
								<div class="clearfix"></div>
						</div>
						<div class="col-md-3 footer-grid flickr">
								<h4>Block 4</h4>
								<div class="border2"></div>
								
								
						<div class="clearfix"></div>
					</div>
			</div>
		</div>
	<!--//end-footer-section-->
			<!--/start-copyright-section-->
				<div class="copyright">
					<div class="container">
					<div class="logo2  wow bounceInLeft" data-wow-delay="0.4s"><a href="#"><img src="#" alt=""/ title="logo" /></a></div>
					<p class="write  wow bounceInRight" data-wow-delay="0.4s">Copyright &copy; 2015  All rights  Reserved <a href="#">CVS</a></p>
					</div>
					<div class="clearfix"></div>
				</div>
			
			<!--//end-copyright-section-->
			<!--start-smoth-scrolling-->
			<script type="text/javascript" src="js/move-top.js"></script>
			<script type="text/javascript" src="js/easing.js"></script>
			<script type="text/javascript">
								jQuery(document).ready(function($) {
									$(".scroll").click(function(event){		
										event.preventDefault();
										$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
									});
								});
								</script>
							<!--start-smoth-scrolling-->
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
										
										$().UItoTop({ easingType: 'easeOutQuart' });
										
									});
								</script>
		<a href="#head" id="toTop" class="scroll" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>


			
</body>
</html>