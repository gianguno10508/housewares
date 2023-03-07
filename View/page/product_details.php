<?php include('View/custom/header.php'); ?>
<div class="product-detail">
    <div class="container">
        <div class="row">
            <?php
            $avg = 0;
            $i = 0;
            $sum = 0;
            if (is_array($reviews)) {
                $reviews = array_reverse($reviews);
                foreach ($reviews as $key => $value) {
                    # code...
                    $sum = $sum + $value['rate'];
                    $i++;
                }
                $avg = round($sum / $i);
            }
            ?>
            <div class="col-left col-md-5 col-sm-5">
                <?php $img_product = json_decode($productID['img']); ?>
                <img src="uploads/<?php echo $img_product[0]; ?>" alt="#">
            </div>
            <div class="col-right col-md-7 col-sm-7">
                <h3 class="title-product">
                    <?php echo $productID['title']; ?>
                </h3>
                <?php
                if($avg > 0){
                    for ($i = 0; $i < $avg; $i++) {
                        # code...
                        ?>
                        <span class="rating rate-star"></span>
                            <?php
                    }
                }
                ?>
                <p>
                    <span class="price">
                        <?php echo $productID['price'] . "đ"; ?>
                    </span>
                </p>
                <div class="qty" data-title="Qty"><!-- Input Order -->
                    <div class="input-group">
                        <form method="post">
                            <div class="button minus">
                                <button type="button" class="btn btn-primary btn-number" disabled="disabled"
                                    data-type="minus" data-field="quant">
                                    <i class="ti-minus"></i>
                                </button>
                            </div>
                            <input type="text" name="quant" class="input-number" data-min="1" data-max="100" value="1">
                            <div class="button plus">
                                <button type="button" class="btn btn-primary btn-number" data-type="plus"
                                    data-field="quant">
                                    <i class="ti-plus"></i>
                                </button>
                            </div>
                            <input class="btn" type="submit" name="addcart" value="Thêm vào giỏ hàng">
                        </form>
                    </div>
                </div>
                <div class="descrip-product">
                    <p>
                        <?php echo $productID['descrip']; ?>
                    </p>
                </div>
            </div>
        </div>
        <div class="reviews">
            <div class="container">
                <h5>Đánh giá sản phẩm</h5>
                <?php if (is_array($reviews)) {
                    ?>
                    <div id="comments">
                        <ol class="commentlist">
                            <?php
                            foreach ($reviews as $key => $value) {
                                # code...
                                ?>
                                <li class="review even thread-even depth-1">
                                    <div class="comment_container">
                                        <img alt=""
                                            src="http://0.gravatar.com/avatar/c607c576706f151accdb431f4ee68a01?s=60&amp;d=mm&amp;r=g"
                                            srcset="http://0.gravatar.com/avatar/c607c576706f151accdb431f4ee68a01?s=120&amp;d=mm&amp;r=g 2x"
                                            class="avatar avatar-60 photo" height="60" width="60" loading="lazy"
                                            decoding="async">
                                        <div class="comment-text">
                                            <div class="star-rating">
                                                <?php
                                                for ($i = 0; $i < $value['rate']; $i++) {
                                                    # code...
                                                    ?>
                                                    <span class="rating rate-star">
                                                        <?php
                                                }
                                                ?>
                                                </span>
                                            </div>
                                            <p class="meta">
                                                <em class="woocommerce-review__awaiting-approval">
                                                    <?php echo $value['username']; ?>
                                                </em>
                                                <span>
                                                    <?php echo $value['date_review'] ?>
                                                </span>
                                            </p>
                                            <div class="description">
                                                <p>
                                                    <?php echo $value['content_reviews']; ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <?php
                            }
                            ?>
                        </ol>
                    </div>
                    <?php
                }
                ?>
                <div id="review_form_wrapper">
                    <div id="review_form">
                        <div id="respond" class="comment-respond">
                            <span id="reply-title" class="comment-reply-title">
                                <?php echo $productID['title']; ?>
                            </span>
                            <form method="post" id="commentform" class="comment-form">
                                <input type="hidden" name="id_product" value="<?php echo $productID['id']; ?>"
                                    id="comment_post_ID">
                                <div class="comment-form-rating">
                                    <label for="rating">Đánh giá của bạn&nbsp;<span class="required">*</span>
                                    </label>
                                    <div class="rate">
                                        <input type="radio" id="star5" name="rate" value="5" />
                                        <label for="star5">5 stars</label>
                                        <input type="radio" id="star4" name="rate" value="4" />
                                        <label for="star4">4 stars</label>
                                        <input type="radio" id="star3" name="rate" value="3" checked />
                                        <label for="star3">3 stars</label>
                                        <input type="radio" id="star2" name="rate" value="2" />
                                        <label for="star2">2 stars</label>
                                        <input type="radio" id="star1" name="rate" value="1" />
                                        <label for="star1">1 star</label>
                                    </div>
                                </div>
                                <p class="comment-form-comment"><label for="comment">Nội dung&nbsp;<span
                                            class="required">*</span></label><textarea id="comment" name="comment"
                                        cols="45" rows="8" required></textarea></p>
                                <p class="form-submit"><input name="submit" type="submit" id="submit" class="submit btn"
                                        value="Gửi">
                                </p>
                            </form>
                        </div><!-- #respond -->
                    </div>
                </div>
            </div>
        </div>
        <div class="related-products product-area most-popular section">
            <div class="container">
                <h2 class="text-center">Sản phẩm liên quan</h2>
                <div class="row">
                    <div class="col-12">
                        <div class="owl-carousel popular-slider">
                            <!-- Start Single Product -->
                            <?php
                            foreach ($products as $key => $product) {
                                if ($product['id_category'] == $productID['id_category']) {
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
                                                    <?php echo $product['price']; ?>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                }
                            }
                            ?>
                            <!-- End Single Product -->

                            <!-- Start Single Product -->
                            <!-- <div class="single-product">
                                <div class="product-img">
                                    <a href="product-details.html">
                                        <img class="default-img" src="https://via.placeholder.com/550x750" alt="#">
                                        <img class="hover-img" src="https://via.placeholder.com/550x750" alt="#">
                                    </a>
                                    <div class="button-head">
                                        <div class="product-action">
                                            <a data-toggle="modal" data-target="#exampleModal" title="Quick View"
                                                href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
                                            <a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to
                                                    Wishlist</span></a>
                                            <a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to
                                                    Compare</span></a>
                                        </div>
                                        <div class="product-action-2">
                                            <a title="Add to cart" href="#">Add to cart</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <h3><a href="product-details.html">Awesome Bags Collection</a></h3>
                                    <div class="product-price">
                                        <span>$50.00</span>
                                    </div>
                                </div>
                            </div> -->
                            <!-- End Single Product -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<?php include('View/custom/footer_home.php'); ?>