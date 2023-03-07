<?php include('View/custom/header.php'); ?>
<?php
if (isset($_SESSION['username'])) {
    ?>

    <!-- Start Checkout -->
    <section class="shop checkout section">
        <div class="container">
            <!-- Form -->
            <form class="form" method="post">
                <div class="row">
                    <div class="col-lg-8 col-12">
                        <div class="checkout-form">
                            <h2>Thanh toán tại đây</h2>
                            <p>Điền thông tin của bạn tại đây</p>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-12">
                                    <div class="form-group">
                                        <label>Họ và tên<span>*</span></label>
                                        <input type="text" name="fullname" placeholder="" value="<?php if ($dataUserId['fullname']) {
                                            echo $dataUserId['fullname'];
                                        } ?>" required="required">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="form-group">
                                        <label>Địa chỉ<span>*</span></label>
                                        <input type="text" name="andress" placeholder="" value="<?php if ($dataUserId['andress']) {
                                            echo $dataUserId['andress'];
                                        } ?>" required="required">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="form-group">
                                        <label>Phone Number<span>*</span></label>
                                        <input type="number" name="phone" placeholder="" value="<?php if ($dataUserId['phone']) {
                                            echo $dataUserId['phone'];
                                        } ?>" required="required">
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <?php
                    $cart_detail_user = (json_decode($dataCartUserId[0]['cart_detail']));
                    $cart_detail_user_encode = (json_encode($dataCartUserId[0]['cart_detail']));
                    ?>
                    <div class="col-lg-4 col-12">
                        <div class="order-details">
                            <!-- Order Widget -->
                            <div class="single-widget">
                                <h2>TỔNG ĐƠN HÀNG</h2>
                                <div class="content">
                                    <ul>
                                        <?php
                                        $sum = 0;
                                        foreach ($cart_detail_user as $key => $cart_item) {
                                            # code...
                                            $sum += $cart_item->cart_data->total_price
                                            ?>
                                            <li>
                                                <strong><?php echo $cart_item->cart_data->quantity . "x"; ?></strong>
                                                <?php echo $cart_item->cart_data->title .":"; ?>
                                                <?php echo number_format($cart_item->cart_data->total_price).'đ'; ?>
                                            </li>
                                            <?php
                                        }
                                        ?>
                                        <li class="last">Tổng tiền<span><?php echo number_format($sum). 'đ'; ?></span></li>
                                    </ul>
                                    <input type="hidden" name="total_bill" value="<?php echo $sum; ?>">
                                </div>
                            </div>
                            <!--/ End Order Widget -->

                            <!-- Payment Method Widget -->
                            <div class="single-widget payement">
                                <div class="content">
                                    <img src="images/payment-method.png" alt="#">
                                </div>
                            </div>
                            <!--/ End Payment Method Widget -->
                            <!-- Button Widget -->
                            <div class="single-widget get-button">
                                <div class="content">
                                    <div class="button">
                                        <input type="submit" class="btn" name="checkout" value="proceed to checkout">
                                        <!-- <a href="#" class="btn">proceed to checkout</a> -->
                                    </div>
                                </div>
                            </div>
                            <!--/ End Button Widget -->
                        </div>
                    </div>
                </div>
            </form>
            <!--/ End Form -->
        </div>
    </section>
    <!--/ End Checkout -->
    <?php
}
?>

<?php include('View/custom/footer_home.php'); ?>