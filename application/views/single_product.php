<script>
    $(function() {
        $("#tabs").tabs();
    });
    $(document).ready(function() {

        // event handler for window resize
        $(window).resize(function(e) {
            updateUI();
        });
        updateUI();

    });
// event handler for window resize
    function updateUI() {

        if ($(window).width() <= 480) {

            // mobile view instructions
            tabsToAccordions();

        } else {

            // desktop view instructions
            accordionsToTabs();
        }

    }
// changes tabs to accordions (jquery ui)
    function tabsToAccordions() {
        $('#tabs').each(function() {
            var a = $('<div class="accordion">');
            var b = new Array();
            $(this).find('>ul>li').each(function() {
                b.push('<h3>' + $(this).html() + '</h3>');
            });
            var c = new Array();
            $(this).find('>div').each(function() {
                c.push('<div>' + $(this).html() + '</div>');
            });
            for (var i = 0; i < b.length; i++) {
                a.append(b[i]).append(c[i]);
            }
            $(this).before(a);
            $(this).remove();
        })
        $('.accordion').accordion()
    }

// changes accordions to tabs (jquery ui)
    function accordionsToTabs() {
        $('.accordion').each(function() {
            var a = $('<div id="tabs">');
            var count = 0;
            var b = $('<ul>');
            $(this).find('>h3').each(function() {
                count++;
                b.append('<li><a href="#tabs-' + count + '">' + $(this).text() + '</a></li>');
            });
            var count = 0;
            var c = $('');
            $(this).find('>div').each(function() {
                count++;
                c = c.add('<div id="tabs-' + count + '">' + $(this).html() + '</div>');
            });
            a.append(b).append(c);
            $(this).before(a);
            $(this).remove();
        });
        $('#tabs').tabs();
    }
</script>
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
                    changePoint: 480,
                    visibleItems: 1
                },
                landscape: {
                    changePoint: 640,
                    visibleItems: 2
                },
                tablet: {
                    changePoint: 768,
                    visibleItems: 3
                }
            }
        });

    });
</script>
<script type="text/javascript" src="<?php echo $base_url; ?>js/jquery.flexisel.js"></script>
<div class="main-top">
    <div class="content_top col-md-12">
        <div class="col-md-5">
            <img src="<?php echo $base_url; ?>images/new-pic3.jpg" alt="" />
        </div>
        <div class="col-md-7">
            <h2>Lorem Ipsum is simply </h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
            <p><span class="strike">$528.22</span><span class="price">$505.22</span></p>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="content_middle col-md-12" id="tabs">

        <ul>
            <li><a href="#tabs-1">Description</a></li>
            <li><a href="#tabs-2">Manual</a></li>
            <li><a href="#tabs-3">Comments</a></li>
        </ul>
        <div id="tabs-1">
            <p>Proin elit arcu, rutrum commodo, vehicula tempus, commodo a, risus. Curabitur nec arcu. Donec sollicitudin mi sit amet mauris. Nam elementum quam ullamcorper ante. Etiam aliquet massa et lorem. Mauris dapibus lacus auctor risus. Aenean tempor ullamcorper leo. Vivamus sed magna quis ligula eleifend adipiscing. Duis orci. Aliquam sodales tortor vitae ipsum. Aliquam nulla. Duis aliquam molestie erat. Ut et mauris vel pede varius sollicitudin. Sed ut dolor nec orci tincidunt interdum. Phasellus ipsum. Nunc tristique tempus lectus.</p>
        </div>
        <div id="tabs-2">
            <p>Morbi tincidunt, dui sit amet facilisis feugiat, odio metus gravida ante, ut pharetra massa metus id nunc. Duis scelerisque molestie turpis. Sed fringilla, massa eget luctus malesuada, metus eros molestie lectus, ut tempus eros massa ut dolor. Aenean aliquet fringilla sem. Suspendisse sed ligula in ligula suscipit aliquam. Praesent in eros vestibulum mi adipiscing adipiscing. Morbi facilisis. Curabitur ornare consequat nunc. Aenean vel metus. Ut posuere viverra nulla. Aliquam erat volutpat. Pellentesque convallis. Maecenas feugiat, tellus pellentesque pretium posuere, felis lorem euismod felis, eu ornare leo nisi vel felis. Mauris consectetur tortor et purus.</p>
        </div>
        <div id="tabs-3">
            <p>Mauris eleifend est et turpis. Duis id erat. Suspendisse potenti. Aliquam vulputate, pede vel vehicula accumsan, mi neque rutrum erat, eu congue orci lorem eget lorem. Vestibulum non ante. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Fusce sodales. Quisque eu urna vel enim commodo pellentesque. Praesent eu risus hendrerit ligula tempus pretium. Curabitur lorem enim, pretium nec, feugiat nec, luctus a, lacus.</p>
            <p>Duis cursus. Maecenas ligula eros, blandit nec, pharetra at, semper at, magna. Nullam ac lacus. Nulla facilisi. Praesent viverra justo vitae neque. Praesent blandit adipiscing velit. Suspendisse potenti. Donec mattis, pede vel pharetra blandit, magna ligula faucibus eros, id euismod lacus dolor eget odio. Nam scelerisque. Donec non libero sed nulla mattis commodo. Ut sagittis. Donec nisi lectus, feugiat porttitor, tempor ac, tempor vitae, pede. Aenean vehicula velit eu tellus interdum rutrum. Maecenas commodo. Pellentesque nec elit. Fusce in lacus. Vivamus a libero vitae lectus hendrerit hendrerit.</p>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="device">
        <div class="course_demo">
            <p>Similar products</p>
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
    <div class="clearfix"></div>
</div>