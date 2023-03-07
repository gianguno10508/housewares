<?php include('View/custom/header-manager.php'); ?>
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">Hoá đơn</h6>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <form method="post">
                                <thead>
                                    <tr>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            STT</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Họ và tên</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Địa chỉ
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Số điện thoại
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Ngày đặt hàng
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Tổng đơn
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Tài khoản
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Trạng thái đơn
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
                                    foreach ($bills as $key => $value) {
                                        # code...
                                        $i++;
                                        ?>
                                        <tr>
                                            <td class="text-center">
                                                <?php echo $i; ?>
                                            </td>
                                            <td class="text-center">
                                                <?php echo $value['fullname'] ?>
                                            </td>
                                            <td class="text-center">
                                                <?php echo $value['andress'] ?>
                                            </td>
                                            <td class="text-center">
                                                <?php echo $value['phone'] ?>
                                            </td>
                                            <td class="text-center">
                                                <?php echo $value['date_order'] ?>
                                            </td>
                                            <td class="text-center">
                                                <?php echo number_format($value['total_bill']) . 'đ' ?>
                                            </td>
                                            <td class="text-center">
                                                <?php echo $value['username'] ?>
                                            </td>
                                            <td class="text-center">
                                                <select name="status">
                                                    <?php
                                                    foreach ($statusBill as $k => $status) {
                                                        if ($status['id'] == $value['id_status']) {
                                                            ?>
                                                            <option value="<?php echo $status['id'] ?>" selected="selected">
                                                                <?php echo $status['title']; ?>
                                                            </option>
                                                            <?php
                                                        } else {
                                                            ?>
                                                            <option value="<?php echo $status['id'] ?>">
                                                                <?php echo $status['title']; ?>
                                                            </option>
                                                            <?php
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            <td class="text-center">
                                                <input type="hidden" name="id_bill" value="<?php echo $value['id']; ?>">
                                                <input type="submit" name="update_bill" value="Cập nhật">
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                </tbody>
                            </form>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include('View/custom/footer-manager.php'); ?>