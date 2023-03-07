<?php include('View/custom/header.php'); ?>


<div class="page-account">
    <div class="container">
        <div id="main-content" class="main-content">
            <div id="primary" class="content-area">
                <div id="content" class="site-content">
                    <article class="page type-page status-publish hentry">
                        <div class="entry-content">
                            <div class="row">
                                <div class="col-left col-md-4">
                                    <ul>
                                        <li><a href="?action=account&dashboard_user">Dashboard</a></li>
                                        <li><a href="?action=account&orders">Đơn hàng</a></li>
                                        <li><a href="?action=account&changepass">Đổi mật khẩu</a></li>
                                        <li><a href="?action=account&infor_user">Thông tin cá nhân</a></li>
                                        <li><a href="?action=logout">Đăng xuất</a></li>
                                    </ul>
                                </div>
                                <div class="col-right col-md-8">
                                    <?php
                                    if (isset($_GET['dashboard_user'])) {
                                        ?>
                                        <h2>Hello
                                            <?php echo $_SESSION['username']; ?>
                                        </h2>
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero, asperiores?
                                            Magni aspernatur nemo accusantium quas, maxime debitis impedit alias
                                            blanditiis omnis excepturi ducimus ipsa atque. Hic nobis ab itaque minus!
                                        </p>
                                        <?php
                                    } elseif (isset($_GET['orders'])) {
                                        ?>
                                        <table border="1px" class="products-table" style="text-align:center">
                                            <thead>
                                                <th>STT</th>
                                                <th>Ngày đặt</th>
                                                <th>Thông tin đặt</th>
                                                <th>Tổng đơn</th>
                                                <th>Trạng thái</th>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $i = 0;
                                                foreach ($dataBillUser as $key => $bill) {
                                                    # code...
                                                    $i++;
                                                    ?>
                                                    <tr>
                                                        <td>
                                                            <?php echo $i; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $bill['date_order']; ?>
                                                        </td>
                                                        <td>
                                                            <ul>
                                                                <?php
                                                                $billDetail = json_decode($bill['data_order']);
                                                                foreach ($billDetail as $key => $value) {
                                                                    # code...
                                                                    ?>
                                                                    <li>
                                                                        <strong>
                                                                            <?php echo $value->cart_data->quantity . "x"; ?>
                                                                        </strong>
                                                                        <?php echo $value->cart_data->title; ?>
                                                                    </li>
                                                                    <?php
                                                                }
                                                                ?>
                                                            </ul>
                                                        </td>
                                                        <td>
                                                            <?php echo number_format($bill['total_bill']) . 'đ'; ?>
                                                        </td>
                                                        <td>
                                                            <?php 
                                                            foreach ($statusBill as $key => $status) {
                                                                # code...
                                                                if($status['id'] == $bill['id_status']){
                                                                    echo $status['title'];
                                                                }
                                                            }
                                                            ?>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                        <?php
                                    } elseif (isset($_GET['changepass'])) {
                                        ?>
                                        <div class="message" style="text-align: center;">
                                            <?php if (isset($check)): ?>
                                                <?php if ($check == 2): ?>
                                                    <p style="font-size: 18px; font-weight: 700; margin-top: 10px;">Mật khẩu cũ
                                                        không khớp!!</p>
                                                <?php elseif ($check == -1): ?>
                                                    <p style="font-size: 18px; font-weight: 700; margin-top: 10px;">Hai mật khẩu
                                                        không khớp!!</p>
                                                <?php elseif ($check == 1): ?>
                                                    <p style="font-size: 18px; font-weight: 700; margin-top: 10px;">Mật khẩu lớn hơn
                                                        hoặc bằng 8 kí tự!!</p>
                                                <?php elseif ($check == 3): ?>
                                                    <p style="font-size: 18px; font-weight: 700; margin-top: 10px;">Mật khẩu mới
                                                        trùng mật khẩu cũ!!</p>
                                                <?php else: ?>
                                                    <p style="font-size: 18px; font-weight: 700; margin-top: 10px;">Đổi mật khẩu
                                                        thành công!</p>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                        </div>
                                        <div class="content-form">
                                            <form method="post" class='form'>
                                                <div class="passold">
                                                    <label for="passwordold">
                                                        <p>Mật khẩu cũ*:</p>
                                                        <input type="password" name="passwordold" id="passwordold" required>
                                                    </label>
                                                </div>
                                                <div class="passnew">
                                                    <label for="passwordnew">
                                                        <p>Mật khẩu mới*:</p>
                                                        <input type="password" name="passwordnew" id="passwordnew" required>
                                                    </label>
                                                </div>
                                                <div class="repassnew">
                                                    <label for="repasswordnew">
                                                        <p>Nhập lại mật khẩu mới*:</p>
                                                        <input type="password" name="repasswordnew" id="repasswordnew"
                                                            required>
                                                    </label>
                                                </div>
                                                <div class="button-link">
                                                    <input type="submit" name="changepass" value="OK">
                                                </div>
                                            </form>
                                        </div>
                                        <?php
                                    } elseif (isset($_GET['infor_user'])) {
                                        ?>
                                        <div class="content-form">
                                            <form method="post" class='form'>
                                                <div class="fullname">
                                                    <label for="fullname">
                                                        <p>Họ và tên*:</p>
                                                        <input type="text" name="fullname" id="fullname"
                                                            value="<?php echo $dataUserId['fullname']; ?>" required>
                                                    </label>
                                                </div>
                                                <div class="andress">
                                                    <label for="andress">
                                                        <p>Địa chỉ*:</p>
                                                        <input type="text" name="andress" id="andress"
                                                            value="<?php echo $dataUserId['andress']; ?>" required>
                                                    </label>
                                                </div>
                                                <div class="phone">
                                                    <label for="phone">
                                                        <p>Số điện thoại*:</p>
                                                        <input type="number" name="phone" id="phone"
                                                            value="<?php echo $dataUserId['phone']; ?>" required>
                                                    </label>
                                                </div>
                                                <div class="button-link">
                                                    <input type="submit" name="update_user" value="OK">
                                                </div>
                                            </form>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('View/custom/footer.php'); ?>