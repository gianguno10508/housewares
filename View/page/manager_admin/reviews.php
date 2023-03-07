<?php include('View/custom/header-manager.php'); ?>
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">Đánh giá</h6>
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
                                        Tên tài khoản</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Nội dung
                                    </th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Rate
                                    </th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Ngày đánh giá
                                    </th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Id sản phẩm
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
                                foreach ($allReviews as $key => $value) {
                                    # code...
                                    $i++;
                                    ?>
                                    <tr>
                                        <td class="text-center">
                                            <?php echo $i; ?>
                                        </td>
                                        <td class="text-center">
                                            <?php echo $value['username']; ?>
                                        </td>
                                        <td class="des-none">
                                            <p
                                                style="width: 100px;white-space: nowrap;overflow: hidden;text-overflow: ellipsis">
                                                <?php echo $value['content_reviews']; ?>
                                            </p>
                                        </td>
                                        <td class="text-center">
                                            <p>
                                                <?php echo $value['rate'] . "/5"; ?>
                                            </p>
                                        </td>
                                        <td class="text-center">
                                            <?php echo ($value['date_review']); ?>
                                        </td>
                                        <td class="text-center">
                                            <?php echo $value['id_product']; ?>
                                        </td>
                                        <td class="text-center">
                                            <a
                                                href="?action=manager&reviews_manager&delete_review&id=<?php echo $value['id']; ?>">Xóa</a>
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