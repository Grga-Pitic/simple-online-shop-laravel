<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Fultala - Flower Shop eCommerce Template </title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="/assets/images/favicon.ico">

    <!-- CSS
	============================================ -->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/assets/css/vendor/bootstrap.min.css">

    <!-- Icon Font CSS -->
    <link rel="stylesheet" href="/assets/css/vendor/ionicons.min.css">

    <!-- Plugins CSS -->
    <link rel="stylesheet" href="/assets/css/plugins/slick.css">
    <link rel="stylesheet" href="/assets/css/plugins/animation.css">
    <link rel="stylesheet" href="/assets/css/plugins/jqueryui.min.css">

    <!-- Vendor & Plugins CSS (Please remove the comment from below vendor.min.css & plugins.min.css for better website load performance and remove css files from avobe) -->
    <!--
    <script src="assets/js/vendor/vendor.min.js"></script>
    <script src="assets/js/plugins/plugins.min.js"></script>
    -->

    <!-- Main Style CSS (Please use minify version for better website load performance) -->
    <link rel="stylesheet" href="/assets/css/style.css">
    <!--<link rel="stylesheet" href="assets/css/style.min.css">-->

</head>

<body>

    <div class="main-wrapper">

        <header class="fl-header">

            <!-- Header Top Start -->
            <div class="header-top-area d-none d-lg-block">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="header-top-inner">
                                <div class="row">
                                    <div class="col-lg-4 col-md-3">
                                        <div class="social-top">
                                            <ul>
                                                <li><a href="#"><i class="ion-social-facebook"></i></a></li>
                                                <li><a href="#"><i class="ion-social-twitter"></i></a></li>
                                                <li><a href="#"><i class="ion-social-tumblr"></i></a></li>
                                                <li><a href="#"><i class="ion-social-googleplus"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-lg-8 col-md-9">
                                        <div class="top-info-wrap text-right">
                                            <ul class="top-info">
                                                <li>Mon - Fri : 9am to 5pm </li>
                                                <li><a href="#">+88012345678</a></li>
                                                <li><a href="#">fultalashop@gmail.com</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Header Top End -->

            <!-- haeader bottom Start -->
            <div class="haeader-bottom-area">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-2 col-md-4 col-5">
                            <div class="logo-area">
                                <a href="/"><img src="/assets/images/logo/logo.png" alt=""></a>
                            </div>
                        </div>
                        <div class="col-lg-8 d-none d-lg-block">
                            <div class="main-menu-area text-center">
                                <!--  Start Mainmenu Nav-->
                                <nav class="main-navigation">
                                    <ul>
                                        <li class="active"><a href="/">Home</a>
                                        </li>
                                        <li><a href="/catalog">catalog</a>
                                        </li>
                                        <li><a href="/news">news</a>
                                        </li>
                                        <li><a href="/contact">Contact</a></li>
                                        <li><a href="/about">About</a></li>
                                    </ul>
                                </nav>

                            </div>
                        </div>

                        <div class="col-lg-2 col-md-8 col-7">
                            <div class="right-blok-box d-flex">
                                <div class="search-wrap">
                                    <a href="#" class="trigger-search"><i class="ion-ios-search-strong"></i></a>
                                </div>

                                <div class="user-wrap">
                                </div>

                                @include('bootstrap.cart.inHeader', ['cartTotal' => $cartTotal])

                                <div class="mobile-menu-btn d-block d-lg-none">
                                    <div class="off-canvas-btn">
                                        <i class="ion-android-menu"></i>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- haeader bottom End -->

            <!-- main-search start -->
            <div class="main-search-active">
                <div class="sidebar-search-icon">
                    <button class="search-close"><span class="ion-android-close"></span></button>
                </div>
                <div class="sidebar-search-input">
                    <form>
                        <div class="form-search">
                            <input id="search" class="input-text" value="" placeholder="Search entire store here ..." type="search">
                            <button class="search-btn" type="button">
                                <i class="ion-ios-search"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- main-search start -->


            <!-- off-canvas menu start -->
            <aside class="off-canvas-wrapper">
                <div class="off-canvas-overlay"></div>
                <div class="off-canvas-inner-content">
                    <div class="btn-close-off-canvas">
                        <i class="ion-android-close"></i>
                    </div>

                    <div class="off-canvas-inner">

                        <!-- mobile menu start -->
                        <div class="mobile-navigation">

                            <!-- mobile menu navigation start -->
                            <nav>
                                <ul class="mobile-menu">
                                    <li class="menu-item-has-children"><a href="#">Home</a>
                                    </li>
                                    <li class="menu-item-has-children "><a href="#">shop</a>
                                        <ul class="dropdown">
                                            <li><a href="shop.html">Shop Left Sidebar</a></li>
                                            <li><a href="shop-right.html">Shop Right Sidebar</a></li>
                                            <li><a href="shop-fullwidth.html">Shop Full Width</a></li>
                                        </ul>
                                    </li>
                                    <li class="menu-item-has-children "><a href="#">Blog</a>
                                        <ul class="dropdown">
                                            <li><a href="blog.html">Blog Left Sidebar</a></li>
                                            <li><a href="blog-right.html">Blog Right Sidebar</a></li>
                                            <li><a href="blog-details.html">Blog Details Page</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="about-us.html">About</a></li>
                                    <li><a href="contact-us.html">Contact</a></li>
                                </ul>
                            </nav>
                            <!-- mobile menu navigation end -->
                        </div>
                        <!-- mobile menu end -->



                        <!-- offcanvas widget area start -->
                        <div class="offcanvas-widget-area">
                            <div class="off-canvas-contact-widget">
                                <ul>
                                    <li>
                                        Mon - Fri : 9am to 5pm
                                    </li>
                                    <li>
                                        <a href="#">0123456789</a>
                                    </li>
                                    <li>
                                        <a href="#">info@yourdomain.com</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="off-canvas-social-widget">
                                <a href="#"><i class="ion-social-facebook"></i></a>
                                <a href="#"><i class="ion-social-twitter"></i></a>
                                <a href="#"><i class="ion-social-tumblr"></i></a>
                                <a href="#"><i class="ion-social-googleplus"></i></a>
                            </div>

                        </div>
                        <!-- offcanvas widget area end -->
                    </div>
                </div>
            </aside>
            <!-- off-canvas menu end -->


        </header>

        @yield('content')

        <footer>
            <div class="footer-top section-pb section-pt-60">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 col-md-6">
                            <div class="widget-footer mt-20">
                                <div class="footer-logo">
                                    <a href="/"><img src="/assets/images/logo/logo.png" alt=""></a>
                                </div>
                                <p>long established fact that a reader will be distracted by the readable content by the readable content established fact that</p>
                                <div class="newsletter-footer">
                                    <input type="text" placeholder="You Email">
                                    <div class="subscribe-button">
                                        <button class="subscribe-btn">Subscribe</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6">
                            <div class="widget-footer mt-30">
                                <h6 class="title-widget">QUICK LINK</h6>
                                <ul class="footer-list">
                                    <li><a href="/">Home</a></li>
                                    <li><a href="/about">About Us</a></li>
                                    <li><a href="/contact">Contact</a></li>
                                    <li><a href="/news">News</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="widget-footer mt-30">
                                <h6 class="title-widget">QUICK CONTACT</h6>
                                <ul class="footer-contact">
                                    <li>
                                        <label>Phone</label>
                                        <a href="#">+88013678456313</a>
                                    </li>
                                    <li>
                                        <label>Email</label>
                                        <a href="#">fultala11@gmail.com</a>
                                    </li>
                                    <li>
                                        <label>Address</label>
                                        34/5 evergreen road, concord city <br> New work, United States
                            </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="copy-right-text text-center">
                                <p>Copyright &copy; <a href="#">Fultala</a> 2019. All Right Reserved</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>



    </div>

    <!-- JS
============================================ -->

    <!-- Modernizer JS -->
    <script src="/assets/js/vendor/modernizr-3.6.0.min.js"></script>
    <!-- jQuery JS -->
    <script src="/assets/js/vendor/jquery-3.3.1.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="/assets/js/vendor/popper.min.js"></script>
    <script src="/assets/js/vendor/bootstrap.min.js"></script>

    <!-- Slick Slider JS -->
    <script src="/assets/js/plugins/slick.min.js"></script>
    <!--  Jquery ui JS -->
    <script src="/assets/js/plugins/jqueryui.min.js"></script>
    <!--  Scrollup JS -->
    <script src="/assets/js/plugins/scrollup.min.js"></script>
    <script src="/assets/js/plugins/ajax-contact.js"></script>

    <!-- Main JS -->
    <script src="/assets/js/main.js"></script>

    @yield('jscode')

</body>

</html>