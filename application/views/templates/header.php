<!--
        Author: W3layouts
        Author URL: http://w3layouts.com
        License: Creative Commons Attribution 3.0 Unported
        License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
    <head>
        <title>OnLineShop</title>
        <link href="<?php echo $base_url; ?>css/bootstrap.css" rel='stylesheet' type='text/css' />
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="<?php echo $base_url; ?>js/jquery.min.js"></script>
        <!-- jQuery UI -->
        <script src="<?php echo $base_url; ?>js/jquery-ui.js"></script>
        <link href="<?php echo $base_url; ?>css/jquery-ui.css" rel='stylesheet' type='text/css' />
        <!-- Custom Theme files -->
        <link href="<?php echo $base_url; ?>css/style.css" rel="stylesheet" type="text/css" media="all" />
        <!-- Custom Theme files -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="keywords" content="" />
        <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
        <!--webfont-->
        <link href='http://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
        <!-- start menu -->
        <link href="<?php echo $base_url; ?>css/megamenu.css" rel="stylesheet" type="text/css" media="all" />
        <script type="text/javascript" src="<?php echo $base_url; ?>js/megamenu.js"></script>
        <script>$(document).ready(function () {
                $(".megamenu").megamenu();
            });</script>
        <link rel="stylesheet" href="<?php echo $base_url; ?>css/flexslider.css" type="text/css" media="screen" />				
        <!-- Skript for user interface -->
        <script type="text/javascript">
            $(init);

            function init() {
                $('.header, .navigation-strip, .banner, .right-grid, .footer').draggable({
                    cursor: 'move',
                    containment: 'document',
                    stop: handleDragStop
                });
                $('.logo').draggable({
                    cursor: 'move',
                    containment: '.header',
                    stop: handleDragStop
                });
                $('.header-right').draggable({
                    cursor: 'move',
                    containment: '.header',
                    stop: handleDragStop
                });
                $('.header-right>ul>li').draggable({
                    cursor: 'move',
                    containment: '.header-right',
                    stop: handleDragStop
                });
                $('.top-menu, .search').draggable({
                    cursor: 'move',
                    containment: '.navigation-strip',
                    stop: handleDragStop
                });
                $('.best-sellers-head').draggable({
                    cursor: 'move',
                    containment: '.best-sellers',
                    stop: handleDragStop
                });
                $('.best-sellers-menu').draggable({
                    cursor: 'move',
                    containment: '.best-sellers',
                    stop: handleDragStop
                });
                $('.best-sellers').draggable({
                    cursor: 'move',
                    containment: '.right-grid',
                    stop: handleDragStop
                });
                $('.device').draggable({
                    cursor: 'move',
                    containment: '.right-grid',
                    stop: handleDragStop
                });
                $('.navbar-custom-menu, .sidebar-toggle').draggable({
                    cursor: 'move',
                    containment: '.main-header',
                    stop: handleDragStop
                });
                $('.clients').draggable({
                    cursor: 'move',
                    containment: '.right-grid',
                    stop: handleDragStop
                });
                $('#main').draggable({
                    cursor: 'move',
                    containment: 'document',
                    stop: handleDragStop
                });
                $('.formdiv').draggable({
                    cursor: 'move',
                    containment: 'document',
                    stop: handleDragStop
                });
                $('.login').draggable({
                    cursor: 'move',
                    containment: '.login-signup-form',
                    stop: handleDragStop
                });
                $('.sign-up').draggable({
                    cursor: 'move',
                    containment: '.login-signup-form',
                    stop: handleDragStop
                });
                $('.benefits').draggable({
                    cursor: 'move',
                    containment: '.login-signup-form',
                    stop: handleDragStop
                });
                $('.singel_right').draggable({
                    cursor: 'move',
                    containment: '.new-product',
                    stop: handleDragStop
                });
                $('.map').draggable({
                    cursor: 'move',
                    containment: '.new-product',
                    stop: handleDragStop
                });
                $('.login-left').draggable({
                    cursor: 'move',
                    containment: '.login-page',
                    stop: handleDragStop
                });
                $('.login-right').draggable({
                    cursor: 'move',
                    containment: '.login-page',
                    stop: handleDragStop
                });
                $('.content_top').draggable({
                    cursor: 'move',
                    containment: 'document',
                    stop: handleDragStop
                });
                $('.content_middle').draggable({
                    cursor: 'move',
                    containment: 'document',
                    stop: handleDragStop
                });
                $('#tabs').draggable({
                    cursor: 'move',
                    containment: 'document',
                    stop: handleDragStop
                });
                $('#tabs>ul>li').draggable({
                    cursor: 'move',
                    containment: '#tabs',
                    stop: handleDragStop
                });
                $('.filter').draggable({
                    cursor: 'move',
                    containment: 'document',
                    stop: handleDragStop
                });
            }

            function handleDragStop(event, ui) {
                var offsetXPos = parseInt(ui.offset.left);
                var offsetYPos = parseInt(ui.offset.top);
                //alert( "Zaustavljeno!\n\nOffset: (" + offsetXPos + ", " + offsetYPos + ")\n");
            }
        </script>
        <!-- End of skript for user interface -->
    </head>
    <body>
        <!-- header -->
        <div class="header">
            <div class="wrap">
                <div class="header-bottom">
                    <div class="logo">
                        <a href="index.html"><img src="<?php echo $base_url; ?>images/logo.jpg" class="img-responsive" alt="" /></a>
                    </div>
                    <div class="header-right">
                        <ul>
                            <li>
                                <i class="user"></i>
                                <a href="account">My Account</a>
                            </li>
                            <li class="login">
                                <i class="lock"></i>
                                <a href="login">Login | Sign Up</a>
                            </li>
                            <li>
                                <i class="cart"></i>
                                <a href="#">Shopping Cart</a>
                            </li>
                            <li class="last">5</li>
                        </ul>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <!-- header-section-ends -->
        <div class="wrap">
            <div class="navigation-strip">
                <div class="top-menu">
                    <!-- start header menu -->
                  <ul class="megamenu skyblue">
                        <li><a class="color1" href="index">Home</a></li>
                        <li class="grid"><a class="color2" href="products">Products</a> </li>
                        <li><a class="color4" href="account">Account</a></li>				
                        <li><a class="color3" href="contact">Contact</a></li>
                        <li><a class="color5" href="reg">Register</a></li>
                        <li><a class="color6" href="login">Login</a></li>
                        <li><a class="color7" href="single">Single product</a></li>
                        <li><a class="color8" href="filter">Filter products</a></li>
                    </ul> 
                        <?php
                      //   print_r($menu); 
//                        echo "<ul>";
//foreach($menu as $m){
//    print_r($m);
//    echo '<li><a href="' . $base_url.''.$m['url'] . '">' . $m['nazivMeni'] . '</a></li>';
//} 
//      echo "</ul>";                  ?>

                </div>
                <!-- start search -->
                <div class="search">
                    <div class="search2">
                        <form>
                            <input type="submit" value="">
                            <input type="text" value="Search for a product, category or brand" onfocus="this.value = '';" onblur="if (this.value == '') {
                                        this.value = 'Search for a product, category or brand';
                                    }"/>
                        </form>
                    </div>
                </div>
                <!-- end search -->
                <div class="clearfix"></div>
            </div>