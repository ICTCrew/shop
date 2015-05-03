<div class="main-top">
				<div class="col-md-3 banner">
					<!-- start expand menu categories -->
					
					<div class=" top-nav rsidebar span_1_of_left">
	<h3 class="cate">CATEGORIES</h3>
	<ul class="menu">
			<li class="item1"><a href="#">Categorie1<img class="arrow-img" src="images/arrow1.png" alt=""/> </a>
				<ul class="cute">
					<li class="subitem1"><a href="products.html">Cute Kittens<img class="arrow-img" src="images/arrow1.png" alt=""/> </a>
						<ul class="cute">
							<li class="subitem1"><a href="products.html">Cute Kittens </a></li>
							<li class="subitem2"><a href="products.html">Strange Stuff </a></li>
							<li class="subitem3"><a href="products.html">Automatic Fails </a></li>
						</ul>
					</li>
					<li class="subitem2"><a href="products.html">Strange Stuff </a></li>
					<li class="subitem3"><a href="products.html">Automatic Fails </a></li>
				</ul>
			</li>
			<li class="item1"><a href="#">Categorie2<img class="arrow-img" src="images/arrow1.png" alt=""/> </a>
				<ul class="cute">
					<li class="subitem1"><a href="products.html">Cute Kittens <img class="arrow-img" src="images/arrow1.png" alt=""/></a>
						<ul class="cute">
							<li class="subitem1"><a href="products.html">Cute Kittens<img class="arrow-img" src="images/arrow1.png" alt=""/> </a>
								<ul class="cute">
									<li class="subitem1"><a href="products.html">Cute Kittens <img class="arrow-img" src="images/arrow1.png" alt=""/></a>
										<ul class="cute">
											<li class="subitem1"><a href="products.html">Cute Kittens </a></li>
											<li class="subitem2"><a href="products.html">Strange Stuff </a></li>
											<li class="subitem3"><a href="products.html">Automatic Fails<img class="arrow-img" src="images/arrow1.png" alt=""/> </a>
												<ul class="cute">
													<li class="subitem1"><a href="products.html">Cute Kittens <img class="arrow-img" src="images/arrow1.png" alt=""/></a>
														<ul class="cute">
															<li class="subitem1"><a href="products.html">Cute Kittens </a></li>
															<li class="subitem2"><a href="products.html">Strange Stuff </a></li>
															<li class="subitem3"><a href="products.html">Automatic Fails <img class="arrow-img" src="images/arrow1.png" alt=""/></a>
                                                                                                                            <ul class="cute">
                                                                                                                                    <li class="subitem1"><a href="products.html">Cute Kittens </a></li>
                                                                                                                                    <li class="subitem2"><a href="products.html">Strange Stuff </a></li>
                                                                                                                                    <li class="subitem3"><a href="products.html">Automatic Fails<img class="arrow-img" src="images/arrow1.png" alt=""/> </a>
                                                                                                                                            <ul class="cute">
                                                                                                                                                    <li class="subitem1"><a href="products.html">Cute Kittens <img class="arrow-img" src="images/arrow1.png" alt=""/></a>
                                                                                                                                                            <ul class="cute">
                                                                                                                                                                    <li class="subitem1"><a href="products.html">Cute Kittens </a></li>
                                                                                                                                                                    <li class="subitem2"><a href="products.html">Strange Stuff </a></li>
                                                                                                                                                                    <li class="subitem3"><a href="products.html">Automatic Fails </a></li>
                                                                                                                                                            </ul>
                                                                                                                                                    </li>
                                                                                                                                                    <li class="subitem2"><a href="products.html">Strange Stuff </a></li>
                                                                                                                                                    <li class="subitem3"><a href="products.html">Automatic Fails </a></li>
                                                                                                                                            </ul>
                                                                                                                                    </li>
										</ul>
                                                                                                                        </li>
														</ul>
													</li>
													<li class="subitem2"><a href="products.html">Strange Stuff </a></li>
													<li class="subitem3"><a href="products.html">Automatic Fails </a></li>
												</ul>
											</li>
										</ul>
									</li>
									<li class="subitem2"><a href="products.html">Strange Stuff </a></li>
									<li class="subitem3"><a href="products.html">Automatic Fails </a></li>
								</ul>
							</li>
							<li class="subitem2"><a href="products.html">Strange Stuff </a></li>
							<li class="subitem3"><a href="products.html">Automatic Fails </a></li>
						</ul>
					</li>
					<li class="subitem2"><a href="products.html">Strange Stuff </a></li>
					<li class="subitem3"><a href="products.html">Automatic Fails </a></li>
				</ul>
			</li>
			
	</ul>
</div>
					
					<!--initiate accordion-->
			<script type="text/javascript">
				
				$(document).ready(function () {
				$( '.menu > li > ul' )
	.slideUp()
	.click(function( e ){
		e.stopPropagation();
	});

$('.menu li>a').toggle(function (e) {
e.preventDefault;
var url=$(this).attr('href');
if($(this).parent().find('ul').length==0) {
window.location.href = url;}
else {
var menu_root = $(this).parent().parent();
$('ul', menu_root).hide();
$('.aktivno', menu_root).removeClass('aktivno');
$('>ul', $(this).addClass('aktivno').parent()).slideDown();
}
}, function (o) {
o.preventDefault;
if ($(this).parent().has($(o.relatedTarget)).length < 1) {
$('ul', $(this).parent()).slideUp();
}
});
});
			</script> 	
						  <div class="clearfix"> </div>
					<!-- end expand menu categories-->
			   </div>