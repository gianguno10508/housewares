<?php include('View/custom/header-manager.php'); ?>
  <!-- End Navbar -->
  <div class="container-fluid py-4">
    <div class="row">
      <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
          <div class="card-header p-3 pt-2">
            <div
              class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
              <i class="material-icons opacity-10">weekend</i>
            </div>
            <div class="text-end pt-1">
              <p class="text-sm mb-0 text-capitalize">Sản phẩm</p>
              <h4 class="mb-0">
                <?php
                if (count($products) < 10) {
                  echo '0' . count($products);
                } else {
                  echo count($products);
                }
                ?>
              </h4>
            </div>
          </div>
          <hr class="dark horizontal my-0">
          <div class="card-footer p-3">
            <p class="mb-0"><span class="text-success text-sm font-weight-bolder">Lorem </span>Lorem</p>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
          <div class="card-header p-3 pt-2">
            <div
              class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
              <i class="material-icons opacity-10">person</i>
            </div>
            <div class="text-end pt-1">
              <p class="text-sm mb-0 text-capitalize">Khách hàng</p>
              <h4 class="mb-0">
                <?php
                if (count($dataUser) < 10) {
                  echo '0' . count($dataUser);
                } else {
                  echo count($dataUser);
                }
                ?>
              </h4>
            </div>
          </div>
          <hr class="dark horizontal my-0">
          <div class="card-footer p-3">
            <p class="mb-0"><span class="text-success text-sm font-weight-bolder">Lorem </span>Lorem</p>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
          <div class="card-header p-3 pt-2">
            <div
              class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
              <i class="material-icons opacity-10">person</i>
            </div>
            <div class="text-end pt-1">
              <p class="text-sm mb-0 text-capitalize">Danh mục</p>
              <h4 class="mb-0">
                <?php
                if (count($categories) < 10) {
                  echo '0' . count($categories);
                } else {
                  echo count($categories);
                }
                ?>
              </h4>
            </div>
          </div>
          <hr class="dark horizontal my-0">
          <div class="card-footer p-3">
            <p class="mb-0"><span class="text-success text-sm font-weight-bolder">Lorem </span>Lorem</p>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-sm-6">
        <div class="card">
          <div class="card-header p-3 pt-2">
            <div
              class="icon icon-lg icon-shape bg-gradient-info shadow-info text-center border-radius-xl mt-n4 position-absolute">
              <i class="material-icons opacity-10">weekend</i>
            </div>
            <div class="text-end pt-1">
              <p class="text-sm mb-0 text-capitalize">Hoá đơn</p>
              <h4 class="mb-0">
                <?php
                if (count($bills) < 10) {
                  echo '0' . count($bills);
                } else {
                  echo count($bills);
                }
                ?>
              </h4>
            </div>
          </div>
          <hr class="dark horizontal my-0">
          <div class="card-footer p-3">
            <p class="mb-0"><span class="text-success text-sm font-weight-bolder">Lorem </span>Lorem</p>
          </div>
        </div>
      </div>
    </div>
    <div class="row mt-4">
    </div>
    <div class="row mb-4">
      <div class="col-lg-12 col-md-12 mb-md-0 mb-4">
        <div class="card">
          <div class="card-header pb-0">
            <div class="row">
              <div class="col-lg-6 col-7">
                <h6>Khách hàng</h6>
              </div>
            </div>
          </div>
          <div class="card-body px-0 pb-2">
            <div class="table-responsive">
              <table class="table align-items-center mb-0">
                <thead>
                  <tr>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">STT</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tên tài
                      khoản
                    </th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Họ và
                      tên
                    </th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                      Địa chỉ</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                      Số điện thoại</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                      Chức vụ</th>
                  </tr>
                </thead>
                <tbody>

                  <?php
                  $i = 0;
                  foreach ($dataUser as $key => $value) {
                    # code...
                    $i++;
                    ?>
                    <tr>
                      <td class="text-center">
                        <?php echo $i; ?>
                      </td>
                      <td class="text-center">
                        <?php echo $value['username'] ?>
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
                      <?php
                      foreach ($dataUserRole as $key => $role) {
                        if ($value['id_role'] == $role['id']) {
                          ?>
                          <td class="text-center">
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
          </div>
        </div>
      </div>
    </div>
    <?php include('View/custom/footer-manager.php'); ?>