<script type="text/javascript">
				$(window).load(function() {
					$("#flexiselDemo").flexisel({
						visibleItems: 4,
						animationSpeed: 1000,
						autoPlay: false,
						autoPlaySpeed: 3000,    		
						pauseOnHover: true,
						enableResponsiveBreakpoints: true,
						responsiveBreakpoints: { 
							portrait: { 
								changePoint:480,
								visibleItems: 1
							}, 
							landscape: { 
								changePoint:640,
								visibleItems: 2
							},
							tablet: { 
								changePoint:768,
								visibleItems: 3
							}
						}
					});
					
				});
			</script>
                        <script type="text/javascript" src="<?php echo $base_url; ?>js/jquery.flexisel.js"></script>
                        <!-- start slider -->
	<script src="<?php echo $base_url; ?>js/responsiveslides.min.js"></script>
	 <script>
		$(function () {
		  $("#slider").responsiveSlides({
			auto: true,
			speed: 500,
			namespace: "callbacks",
			pager: true,
		  });
		});
	  </script>
	<!--end slider -->
        <!--start categories -->
        <?php include('templates/categories.php'); ?>
        <!--end categories -->
			   <div class="col-md-9 right-grid">
					<!-- start slider -->
					<!----->
					<div class="slider">	  
						  <div class="callbacks_container">
							  <ul class="rslides" id="slider">
                                                              <?php // print_r($slider); ?>
                                                              <?php 
                                                                foreach ($slider as $ss){
                                                                  // print_r($ss);
                                                                   
                                                                    foreach($ss as $s){
                                                                        // print_r($s);
                                                                    echo '<li><img src="' . $base_url.''.$s['PicSrc'] . '" alt="'.$s['title'].'"/></li>';
                                                                    }
                                                                  
//                                                                    if($s['nazivSlajder'] =="main_sliedr"){
//                                                                }
                                                                    
                                                                    }
                                                              ?>
<!--								 <li>
									 <img src="images/slider1.jpg" alt=""/>
								 </li>
								 <li>
									 <img src="images/slider2.jpg" alt=""/>
								 </li>
								 <li>
									 <img src="images/slider3.jpg" alt=""/>
								 </li>
								 <li>
									 <img src="images/slider4.jpg" alt=""/>
								 </li>-->
							  </ul>	      
						  </div>
					</div>
					<!----->
					<!-- end  slider -->
					
			<div class="best-sellers ">
				<div class="best-sellers-head">
					<h3>Bestsellers</h3>
				</div>
				<div class="best-sellers-menu">
					<ul>
						<li><a class="active" href="#">Electronics</a></li>
						<li><a href="#">Fashion</a></li>
						<li><a href="#">Books</a></li>
						<li><a href="#">Other</a></li>
					</ul>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="device">
				<div class="course_demo">
		          <ul id="flexiselDemo">	
					<li>
						<div class="ipad text-center">
							<img src="<?php echo $base_url; ?>images/phone.jpg" alt="" />
							<h4>Ipad Mini</h4>
							<h3>$499</h3>
							<ul>
								<li><i class="cart-1"></i></li>
								<li><a class="cart" href="#">Add To Cart</a></li>
							</ul>
							<div class="clearfix"></div>
							<ul>
								<li><i class="heart"></i></li>
								<li><a class="cart" href="#">Add To Wishlist</a></li>
							</ul>
						</div>
					</li>
					<li>
					<div class="ipad text-center">
							<img src="<?php echo $base_url; ?>images/phone1.jpg" alt="" />
							<h4>Ipad Mini</h4>
							<h3>$499</h3>
							<ul>
								<li><i class="cart-1"></i></li>
								<li><a class="cart" href="#">Add To Cart</a></li>
							</ul>
							<div class="clearfix"></div>
							<ul>
								<li><i class="heart"></i></li>
								<li><a class="cart" href="#">Add To Wishlist</a></li>
							</ul>
						</div>
					</li>	
					<li>
					<div class="ipad text-center">
							<img src="<?php echo $base_url; ?>images/phone2.jpg" alt="" />
							<h4>Ipad Mini</h4>
							<h3>$499</h3>
							<ul>
								<li><i class="cart-1"></i></li>
								<li><a class="cart" href="#">Add To Cart</a></li>
							</ul>
							<div class="clearfix"></div>
							<ul>
								<li><i class="heart"></i></li>
								<li><a class="cart" href="#">Add To Wishlist</a></li>
							</ul>
						</div>
					</li>	
					<li>
					<div class="ipad text-center">
							<img src="<?php echo $base_url; ?>images/phone3.jpg" alt="" />
							<h4>Ipad Mini</h4>
							<h3>$499</h3>
							<ul>
								<li><i class="cart-1"></i></li>
								<li><a class="cart" href="#">Add To Cart</a></li>
							</ul>
							<div class="clearfix"></div>
							<ul>
								<li><i class="heart"></i></li>
								<li><a class="cart" href="#">Add To Wishlist</a></li>
							</ul>
						</div>
					</li>	
					<li>
					<div class="ipad text-center">
							<img src="<?php echo $base_url; ?>images/phone4.jpg" alt="" />
							<h4>Ipad Mini</h4>
							<h3>$499</h3>
							<ul>
								<li><i class="cart-1"></i></li>
								<li><a class="cart" href="#">Add To Cart</a></li>
							</ul>
							<div class="clearfix"></div>
							<ul>
								<li><i class="heart"></i></li>
								<li><a class="cart" href="#">Add To Wishlist</a></li>
							</ul>
						</div>
					</li>							    	  	       	   	  									    	  	       	   	    	
				</ul>
	  </div>
		  </div>
		  <div class="clients">
			<div class="course_demo1">
					  <ul id="flexiselDemo1">	
						<li>
							<div class="client">
								<img src="<?php echo $base_url; ?>images/c1.jpg" alt="" />
							</div>
						</li>
						<li>
							<div class="client">
								<img src="<?php echo $base_url; ?>images/c2.jpg" alt="" />
							</div>
						</li>	
						<li>
							<div class="client">
								<img src="<?php echo $base_url; ?>images/c4.jpg" alt="" />
							</div>
						</li>	
						<li>
							<div class="client">
								<img src="<?php echo $base_url; ?>images/c3.jpg" alt="" />
							</div>
						</li>	
						<li>
							<div class="client">
								<img src="<?php echo $base_url; ?>images/c5.jpg" alt="" />
							</div>
						</li>	
						<li>
							<div class="client">
								<img src="<?php echo $base_url; ?>images/c6.jpg" alt="" />
							</div>
						</li>
						<li>
							<div class="client">
								<img src="<?php echo $base_url; ?>images/c7.jpg" alt="" />
							</div>
						</li>
					</ul>
				</div>
				<link rel="stylesheet" href="<?php echo $base_url; ?>css/flexslider.css" type="text/css" media="screen" />
					<script type="text/javascript">
				$(window).load(function() {
					$("#flexiselDemo1").flexisel({
						visibleItems: 7,
						animationSpeed: 1000,
						autoPlay: false,
						autoPlaySpeed: 3000,    		
						pauseOnHover: true,
						enableResponsiveBreakpoints: true,
						responsiveBreakpoints: { 
							portrait: { 
								changePoint:480,
								visibleItems: 1
							}, 
							landscape: { 
								changePoint:640,
								visibleItems: 2
							},
							tablet: { 
								changePoint:768,
								visibleItems: 3
							}
						}
					});
					
				});
			</script>
			<script type="text/javascript" src="<?php echo $base_url; ?>js/jquery.flexisel.js"></script>
			</div>
			 
			   </div>
			   <div class="clearfix"></div>
			</div>
			
			<div class="clearfix"></div>