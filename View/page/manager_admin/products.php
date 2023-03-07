<?php include('View/custom/header-manager.php'); ?>
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">Sản phẩm</h6>
                        <a class="text-white text-capitalize ps-3" href="?action=manager&products_manager&add_products">Thêm sản phẩm mới</a>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        STT</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Tên
                                        sản phẩm</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Mô tả
                                    </th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Ảnh
                                    </th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Giá
                                    </th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Danh mục
                                    </th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Hành động
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 0;
                                foreach ($products as $key => $value) {
                                    # code...
                                    $i++;
                                    ?>
                                    <tr>
                                        <td class="text-center">
                                            <?php echo $i; ?>
                                        </td>
                                        <td class="text-center">
                                            <?php echo $value['title']; ?>
                                        </td>
                                        <td class="des-none">
                                            <p
                                                style="width: 100px;white-space: nowrap;overflow: hidden;text-overflow: ellipsis">
                                                <?php echo $value['descrip']; ?>
                                            </p>
                                        </td>
                                        <td class="thumb text-center">
                                            <?php $img = json_decode($value['img']); ?>
                                            <img width="150px" height="150px" src="uploads/<?php echo $img[0]; ?>" alt="">
                                        </td>
                                        <td class="text-center">
                                            <?php echo number_format($value['price']) . 'đ'; ?>
                                        </td>
                                        <?php
                                        foreach ($categories as $key => $cate) {
                                            if ($cate['id'] == $value['id_category']) {
                                                ?>
                                                <td class="text-center">
                                                    <?php echo $cate['title']; ?>
                                                </td>
                                                <?php
                                            }
                                        }
                                        ?>
                                        <td class="text-center">
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
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include('View/custom/footer-manager.php'); ?>