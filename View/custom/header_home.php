<!DOCTYPE html>
<html lang="zxx">

<head>
    <!-- Meta Tag -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name='copyright' content=''>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Title Tag  -->
    <title>Eshop - Gia dụng cho mọi nhà</title>
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="images/favicon.png">
    <!-- Web Font -->
    <link
        href="https://fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap"
        rel="stylesheet">

    <!-- StyleSheet -->

    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <!-- Magnific Popup -->
    <link rel="stylesheet" href="css/magnific-popup.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="css/font-awesome.css">
    <!-- Fancybox -->
    <link rel="stylesheet" href="css/jquery.fancybox.min.css">
    <!-- Themify Icons -->
    <link rel="stylesheet" href="css/themify-icons.css">
    <!-- Nice Select CSS -->
    <link rel="stylesheet" href="css/niceselect.css">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="css/animate.css">
    <!-- Flex Slider CSS -->
    <link rel="stylesheet" href="css/flex-slider.min.css">
    <!-- Owl Carousel -->
    <link rel="stylesheet" href="css/owl-carousel.css">
    <!-- Slicknav -->
    <link rel="stylesheet" href="css/slicknav.min.css">

    <!-- Eshop StyleSheet -->
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="css/custom_style.css">
</head>

<body class="js">

    <!-- Preloader -->
    <div class="preloader">
        <div class="preloader-inner">
            <div class="preloader-icon">
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
    <!-- End Preloader -->


    <!-- Header -->
    <header class="header shop">
        <!-- Topbar -->
        <div class="topbar">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5 col-md-12 col-12">
                        <!-- Top Left -->
                        <div class="top-left">
                            <ul class="list-main">
                                <li><i class="ti-headphone-alt"></i> +123456789</li>
                                <li><i class="ti-email"></i> nguyenminhanh@gmail.com</li>
                            </ul>
                        </div>
                        <!--/ End Top Left -->
                    </div>
                    <div class="col-lg-7 col-md-12 col-12">
                        <!-- Top Right -->
                        <div class="right-content">
                            <ul class="list-main">
                                <li><i class="ti-location-pin"></i> Hà Nội</li>
                                <li><i class="ti-alarm-clock"></i> <a href="#">8a.m - 10p.m</a></li>
                            </ul>
                        </div>
                        <!-- End Top Right -->
                    </div>
                </div>
            </div>
        </div>
        <!-- End Topbar -->


        <div class="middle-inner">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2 col-md-2 col-12">
                        <!-- Logo -->
                        <div class="logo">
                            <a href="http://localhost/houseware/"><img src="images/logo.png" alt="logo"></a>
                        </div>
                        <!--/ End Logo -->
                        <!-- Search Form -->
                        <div class="search-top">
                            <div class="top-search"><a href="#0"><i class="ti-search"></i></a></div>
                            <!-- Search Form -->
                            <div class="search-top">
                                <form class="search-form" method="get">
                                    <input type="text" placeholder="Search here..." name="key" type="search">
                                    <button value="search" name="search" type="submit"><i class="ti-search"></i></button>
                                </form>
                            </div>
                            <!--/ End Search Form -->
                        </div>
                        <!--/ End Search Form -->
                        <div class="mobile-nav"></div>
                    </div>
                    <div class="col-lg-8 col-md-7 col-12">
                        <div class="search-bar-top">
                            <div class="search-bar">
                                <form method="get">
                                    <input placeholder="Tìm kiếm sản phẩm....." name="key" type="search">
                                    <button class="btnn" name="search" type="submit"><i class="ti-search"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3 col-12">
                        <div class="right-bar">
                            <!-- Search Form -->
                            <div class="sinlge-bar">
                                <?php
                                if (isset($_SESSION['username'])) {
                                    if ($_SESSION['role'] == 1) {
                                        ?>
                                        <a href="?action=manager&products_manager" class="single-icon"><i class="fa fa-user-circle-o"
                                                aria-hidden="true"></i></a>
                                        <?php
                                    } else {
                                        ?>
                                        <a href="?action=account&dashboard_user" class="single-icon"><i
                                                class="fa fa-user-circle-o" aria-hidden="true"></i></a>
                                        <?php
                                    }
                                } else {
                                    ?>
                                    <a href="?action=login" class="single-icon"><i class="fa fa-user-circle-o"
                                            aria-hidden="true"></i></a>
                                    <?php
                                }
                                ?>
                            </div>
                            <div class="sinlge-bar shopping">
                                <?php
                                if (isset($_SESSION['username'])) {
                                    ?>
                                    <a href="?action=cart" class="single-icon"><i class="ti-bag"></i> <span
                                            class="total-count">
                                            <?php
                                            if (is_array($dataCartUserId)) {
                                                $cart = (array)json_decode(($dataCartUserId[0]['cart_detail']));
                                                echo count($cart);
                                            } else {
                                                echo "0";
                                            }
                                            ?>
                                        </span></a>
                                    <?php
                                } else {
                                    ?>
                                    <a href="?action=login" class="single-icon"><i class="ti-bag"></i></a>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header Inner -->
        <div class="header-inner">
            <div class="container">
                <div class="cat-nav-head">
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="all-category">
                                <h3 class="cat-heading"><i class="fa fa-bars" aria-hidden="true"></i>DANH MỤC</h3>
                                <ul class="main-category">
                                    <?php
                                    foreach ($categories as $key => $category) {
                                        # code...
                                        ?>
                                        <li><a href="?action=cate-view&id=<?php echo $category['id']; ?>">
                                                <?php echo $category['title']; ?>
                                            </a></li>
                                        <?php
                                    }
                                    ?>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-9 col-12">
                            <div class="menu-area">
                                <!-- Main Menu -->
                                <nav class="navbar navbar-expand-lg">
                                    <div class="navbar-collapse">
                                        <div class="nav-inner">
                                            <ul class="nav main-menu menu navbar-nav">
                                                <li class="active"><a href="http://localhost/houseware">Trang chủ</a>
                                                </li>
                                                <li><a href="?action=all-products">Sản phẩm</a></i><span
                                                        class="new">New</span></li>
                                                <li><a href="#">Giới thiệu</a></li>
                                                <li><a href="contact.php">Liên hệ</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </nav>
                                <!--/ End Main Menu -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/ End Header Inner -->
    </header>
    <!--/ End Header -->