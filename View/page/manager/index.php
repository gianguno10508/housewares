<?php include('View/custom/header.php'); ?>
<div class="manager">
    <div class="left-list">
        <h4>List quản lí</h4>
        <ul>
            <li>
                <a href="?action=manager&categories_manager">
                    <i class="fas fa-hand-point-right"></i> Danh mục
                </a>
            </li>
            <li>
                <a href="?action=manager&products_manager">
                    <i class="fas fa-hand-point-right"></i> Sản phẩm
                </a>
            </li>
            <li>
                <a href="?action=manager&bills_manager">
                    <i class="fas fa-hand-point-right"></i> Hóa đơn
                </a>
            </li>
            <li>
                <a href="?action=manager&users_manager">
                    <i class="fas fa-hand-point-right"></i> Người dùng
                </a>
            </li>
        </ul>
    </div>
    <div class="container">
        <?php
        if (isset($_SESSION['role']) && $_SESSION['role'] == 1) {
            ?>
            <div class="row">
                <div class="col-lg-10 col-md-10 col-xs-10 col-10 content">
                    <h4 class="hello">Xin chào,
                        <?php echo $_SESSION['username']; ?>
                    </h4>
                    <div class="action">
                        <a href="http://localhost/houseware">Trang chủ</a>
                        <a href="?action=logout">Đăng xuất</a>
                    </div>
                    <?php
                    if (isset($_GET['categories_manager'])) {
                        ?>
                        <div class="categories-manage">
                            <h3>Quản lý danh mục</h3>
                            <div class="action">
                                <a href="?action=manager&add_categories">Thêm danh mục mới</a>
                            </div>
                            <table border="1px">
                                <thead>
                                    <th>STT</th>
                                    <th>Tên danh mục</th>
                                    <th>Hành động</th>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 0;
                                    foreach ($categories as $key => $value) {
                                        # code...
                                        $i++;
                                        ?>
                                        <tr>
                                            <td>
                                                <?php echo $i; ?>
                                            </td>

                                            <td>
                                                <?php echo $value['title']; ?>
                                            </td>
                                            <td>
                                                <a onclick="return confirm('Bạn có chắc chắn muốn sửa?')"
                                                    href="?action=manager&update_categories&id=<?php echo $value['id']; ?>">
                                                    Sửa
                                                </a>
                                                <a onclick="return confirm('Bạn có chắc chắn muốn xóa?')"
                                                    href="?action=manager&delete_categories&id=<?php echo $value['id']; ?>">Xóa</a>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <?php
                    } elseif (isset($_GET['products_manager'])) {
                        ?>
                        <h3>Sản phẩm</h3>
                        <div class="action-content">
                            <a href="?action=manager&add_products">Thêm sản phẩm mới</a>
                        </div>
                        <table border="1px" class="products-table">
                            <thead>
                                <th>STT</th>
                                <th>Tên</th>
                                <th class="des-none">Mô tả</th>
                                <th>Ảnh</th>
                                <th>Giá</th>
                                <th>Danh mục</th>
                                <th>Hành động</th>
                            </thead>
                            <tbody>
                                <?php
                                $i = 0;
                                foreach ($products as $key => $value) {
                                    # code...
                                    $i++;
                                    ?>
                                    <tr>
                                        <td>
                                            <?php echo $i; ?>
                                        </td>
                                        <td>
                                            <?php echo $value['title']; ?>
                                        </td>
                                        <td class="des-none">
                                            <p style="width: 100px;white-space: nowrap;overflow: hidden;text-overflow: ellipsis">
                                                <?php echo $value['descrip']; ?>
                                            </p>
                                        </td>
                                        <td class="thumb">
                                            <?php $img = json_decode($value['img']); ?>
                                            <img width="150px" height="150px" src="uploads/<?php echo $img[0]; ?>" alt="">
                                        </td>
                                        <td>
                                            <?php echo number_format($value['price']) . 'đ'; ?>
                                        </td>
                                        <?php
                                        foreach ($categories as $key => $cate) {
                                            if ($cate['id'] == $value['id_category']) {
                                                ?>
                                                <td>
                                                    <?php echo $cate['title']; ?>
                                                </td>
                                                <?php
                                            }
                                        }
                                        ?>
                                        <td>
                                            <a
                                                href="?action=manager&products_manager&update_product&id=<?php echo $value['id']; ?>">Sửa</a>
                                            <a
                                                href="?action=manager&products_manager&delete_product&id=<?php echo $value['id']; ?>">Xóa</a>
                                        </td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </tbody>
                        </table>
                        <?php
                    } elseif (isset($_GET['users_manager'])) {
                        ?>
                        <div class="user-manage">
                            <h3>Quản lý tài khoản</h3>
                            <table border="1px">
                                <thead>
                                    <th>STT</th>
                                    <th>Tên tài khoản</th>
                                    <th>Chức vụ</th>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 0;
                                    foreach ($dataUser as $key => $value) {
                                        # code...
                                        $i++;
                                        ?>
                                        <tr>
                                            <td>
                                                <?php echo $i; ?>
                                            </td>
                                            <td>
                                                <?php echo $value['username'] ?>
                                            </td>
                                            <?php
                                            foreach ($dataUserRole as $key => $role) {
                                                if ($value['id_role'] == $role['id']) {
                                                    ?>
                                                    <td>
                                                        <?php echo $role['title']; ?>
                                                    </td>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <?php
                    } elseif (isset($_GET['bills_manager'])) {
                        ?>
                        <div class="bill-manage">
                            <h3>Quản lý đơn hàng</h3>
                            <form method="POST">
                                <table border="1px">
                                    <thead>
                                        <th>STT</th>
                                        <th>Họ và tên</th>
                                        <th>Địa chỉ</th>
                                        <th>Số điện thoại</th>
                                        <th>Ngày đặt hàng</th>
                                        <th>Tổng đơn</th>
                                        <th>Tài khoản</th>
                                        <th>Trạng thái đơn</th>
                                        <th>Hành động</th>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i = 0;
                                        foreach ($bills as $key => $value) {
                                            # code...
                                            $i++;
                                            ?>
                                            <tr>
                                                <td>
                                                    <?php echo $i; ?>
                                                </td>
                                                <td>
                                                    <?php echo $value['fullname'] ?>
                                                </td>
                                                <td>
                                                    <?php echo $value['andress'] ?>
                                                </td>
                                                <td>
                                                    <?php echo $value['phone'] ?>
                                                </td>
                                                <td>
                                                    <?php echo $value['date_order'] ?>
                                                </td>
                                                <td>
                                                    <?php echo number_format($value['total_bill']) . 'đ' ?>
                                                </td>
                                                <td>
                                                    <?php echo $value['username'] ?>
                                                </td>
                                                <td>
                                                    <select name="status">
                                                        <?php
                                                        foreach ($statusBill as $k => $status) {
                                                            if ($status['id'] == $value['id_status']) {
                                                                ?>
                                                                <option value="<?php echo $status['id'] ?>" selected="selected">
                                                                    <?php echo $status['title']; ?>
                                                                </option>
                                                                <?php
                                                            }else{
                                                                ?>
                                                                <option value="<?php echo $status['id'] ?>">
                                                                    <?php echo $status['title']; ?>
                                                                </option>
                                                                <?php
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                <td>
                                                    <input type="hidden" name="id_bill" value="<?php echo $value['id']; ?>">
                                                    <input type="submit" name="update_bill" value="Cập nhật">
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </form>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
            <?php
        } else {
            ?>
            <h4>Bạn không đủ quyền truy cập!!!</h4>
            <?php
            die;
        }
        ?>
    </div>
</div>
<?php include('View/custom/footer.php'); ?>