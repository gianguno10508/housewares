<?php include('View/custom/header.php'); ?>
<div class="all-products">
    <div class="container">
        <?php
        if (isset($dataProductbyCate)) {
            if (is_array($dataProductbyCate)) {
                ?>
                <h2 class="text-center">
                    <?php echo $cateId['title']; ?>
                </h2>
                <div class="row">
                    <?php
                    foreach ($dataProductbyCate as $key => $product) {
                        # code...
                        ?>
                        <div class="single-product col-md-3">
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
                                </a>
                            </div>
                            <div class="product-content">
                                <h3><a href="?action=detail_product&id=<?php echo $product['id']; ?>"><?php echo $product['title']; ?></a></h3>
                                <div class="product-price">
                                    <span>
                                        <?php echo number_format($product['price']) . 'đ' ?>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>
                <?php
            }else {
                ?>
                <h2 class="text-center">Không có sản phẩm nào!!</h2>
                <?php
            }
        } 
        ?>

    </div>
</div>
<?php include('View/custom/footer_home.php'); ?>