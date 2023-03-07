<?php include('View/custom/header_home.php'); ?>

<!-- Slider Area -->
<section class="hero-slider">
    <!-- Single Slider -->
    <div class="single-slider">
    </div>
    <!--/ End Single Slider -->
</section>
<!--/ End Slider Area -->

<!-- Start Small Banner  -->
<section class="small-banner section">
    <div class="container-fluid">
        <div class="row">
            <!-- Single Banner  -->
            <div class="col-lg-6 col-md-6 col-12">
                <div class="single-banner">
                    <img src="images/banner-left.png" alt="#">
                </div>
            </div>
            <!-- /End Single Banner  -->
            <!-- Single Banner  -->
            <div class="col-lg-6 col-md-6 col-12">
                <div class="single-banner">
                    <img src="images/banner-right.jpg" alt="#">
                </div>
            </div>
            <!-- /End Single Banner  -->
        </div>
    </div>
</section>
<!-- End Small Banner -->

<?php
if (isset($dataSearch)) {
    if (is_array($dataSearch)) {
        ?>
        <div class="container">
            <h3 class="title-search" style="text-align: center; font-weight: 700; font-size: 32px; margin-top: 20px">Kết
                quả tìm kiếm
            </h3>
            <div class="tab-single">
                <div class="row">
                    <?php
                    foreach ($dataSearch as $key => $product) {

                        ?>
                        <div class="col-xl-3 col-lg-4 col-md-4 col-12">
                            <div class="single-product">
                                <div class="product-img">
                                    <a href="?action=detail_product&id=<?php echo $product['id']; ?>">
                                        <?php
                                        $product_img = json_decode($product['img']);
                                        if (count($product_img) > 1) {
                                            ?>
                                            <img class="default-img" src="uploads/<?php echo $product_img[0]; ?>" alt="#">
                                            <img class="hover-img" src="uploads/<?php echo $product_img[1]; ?>" alt="#">
                                            <?php
                                        } elseif (count($product_img) == 0) {
                                            ?>
                                            <img class="default-img" src="https://via.placeholder.com/550x750" alt="#">
                                            <img class="hover-img" src="https://via.placeholder.com/550x750" alt="#">
                                            <?php
                                        } else {
                                            ?>
                                            <img class="default-img" src="uploads/<?php echo $product_img[0]; ?>" alt="#">
                                            <img class="hover-img" src="uploads/<?php echo $product_img[0]; ?>" alt="#">
                                            <?php
                                        }
                                        ?>
                                        <span class="out-of-stock">Hot</span>
                                    </a>
                                </div>
                                <div class="product-content">
                                    <h3><a href="?action=detail_product&id=<?php echo $product['id']; ?>">
                                            <?php echo $product['title']; ?>
                                        </a></h3>
                                    <div class="product-price">
                                        <span>
                                            <?php echo number_format($product['price']) . "đ"; ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
        <?php
    } else {
        ?>
        <h2 class="message-find">Xin lỗi! Không tìm thấy sản phẩm bạn tìm !!!</h2>
        <?php
    }
} else {
    ?>
    <!-- Start Product Area -->
    <div class="product-area section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>Sản phẩm mới nhất</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="product-info">
                        <div class="nav-main">
                            <!-- Tab Nav -->
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <?php
                                $i = 0;
                                foreach ($categories as $key => $category) {
                                    # code...
                                    ?>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab"
                                            href="#<?php echo create_slug($category['title']) ?>" role="tab">
                                            <?php echo $category['title']; ?>
                                        </a>
                                    </li>
                                    <?php

                                }
                                ?>
                            </ul>
                            <!--/ End Tab Nav -->
                        </div>
                        <div class="tab-content" id="myTabContent">
                            <!-- Start Single Tab -->
                            <?php
                            foreach ($categories as $key => $category) {
                                ?>
                                <div class="tab-pane fade show active" id="<?php echo create_slug($category['title']) ?>"
                                    role="tabpanel">
                                    <div class="tab-single">
                                        <div class="row">
                                            <?php
                                            foreach ($products as $key => $product) {
                                                if ($category['id'] == $product['id_category']) {
                                                    ?>
                                                    <div class="col-xl-3 col-lg-4 col-md-4 col-12">
                                                        <div class="single-product">
                                                            <div class="product-img">
                                                                <a href="?action=detail_product&id=<?php echo $product['id']; ?>">
                                                                    <?php
                                                                    $product_img = json_decode($product['img']);
                                                                    if (count($product_img) > 1) {
                                                                        ?>
                                                                        <img class="default-img"
                                                                            src="uploads/<?php echo $product_img[0]; ?>" alt="#">
                                                                        <img class="hover-img" src="uploads/<?php echo $product_img[1]; ?>"
                                                                            alt="#">
                                                                        <?php
                                                                    } elseif (count($product_img) == 0) {
                                                                        ?>
                                                                        <img class="default-img" src="https://via.placeholder.com/550x750"
                                                                            alt="#">
                                                                        <img class="hover-img" src="https://via.placeholder.com/550x750"
                                                                            alt="#">
                                                                        <?php
                                                                    } else {
                                                                        ?>
                                                                        <img class="default-img"
                                                                            src="uploads/<?php echo $product_img[0]; ?>" alt="#">
                                                                        <img class="hover-img" src="uploads/<?php echo $product_img[0]; ?>"
                                                                            alt="#">
                                                                        <?php
                                                                    }
                                                                    ?>
                                                                    <span class="out-of-stock">Hot</span>
                                                                </a>
                                                            </div>
                                                            <div class="product-content">
                                                                <h3><a href="?action=detail_product&id=<?php echo $product['id']; ?>">
                                                                        <?php echo $product['title']; ?>
                                                                    </a></h3>
                                                                <div class="product-price">
                                                                    <span>
                                                                        <?php echo number_format($product['price']) . "đ"; ?>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                            ?>
                            <!--/ End Single Tab -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Product Area -->


    <!-- Start Most Popular -->
    <div class="product-area most-popular section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>Sản phẩm hot</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="owl-carousel popular-slider">
                        <!-- Start Single Product -->
                        <?php
                        foreach ($products as $key => $product) {
                            ?>
                            <div class="single-product">
                                <div class="product-img">
                                    <a href="?action=detail_product&id=<?php echo $product['id']; ?>">
                                        <?php
                                        $product_img = json_decode($product['img']);
                                        if (count($product_img) > 1) {
                                            ?>
                                            <img class="default-img" src="uploads/<?php echo $product_img[0]; ?>" alt="#">
                                            <img class="hover-img" src="uploads/<?php echo $product_img[1]; ?>" alt="#">
                                            <?php
                                        } elseif (count($product_img) == 0) {
                                            ?>
                                            <img class="default-img" src="https://via.placeholder.com/550x750" alt="#">
                                            <img class="hover-img" src="https://via.placeholder.com/550x750" alt="#">
                                            <?php
                                        } else {
                                            ?>
                                            <img class="default-img" src="uploads/<?php echo $product_img[0]; ?>" alt="#">
                                            <img class="hover-img" src="uploads/<?php echo $product_img[0]; ?>" alt="#">
                                            <?php
                                        }
                                        ?>
                                        <span class="out-of-stock">Hot</span>
                                    </a>
                                </div>
                                <div class="product-content">
                                    <h3><a href="?action=detail_product&id=<?php echo $product['id']; ?>">
                                            <?php echo $product['title']; ?>
                                        </a></h3>
                                    <div class="product-price">
                                        <span>
                                            <?php echo number_format($product['price']). 'đ'; ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                        <!-- End Single Product -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Most Popular Area -->
    <?php
}
?>


<?php include('View/custom/footer_home.php'); ?>