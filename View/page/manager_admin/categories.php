<?php include('View/custom/header-manager.php'); ?>
<div class="container-fluid py-4">
  <div class="row">
    <div class="col-12">
      <div class="card my-4">
        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
          <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
            <h6 class="text-white text-capitalize ps-3">Danh mục</h6>
            <a class="text-white text-capitalize ps-3" href="?action=manager&categories_manager&add_categories">Thêm danh mục mới</a>
          </div>
        </div>
        <div class="card-body px-0 pb-2">
          <div class="table-responsive p-0">
            <table class="table align-items-center mb-0">
              <thead>
                <tr>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">STT</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Tên
                    danh mục</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Hành động
                  </th>
                  <th class="text-secondary opacity-7"></th>
                </tr>
              </thead>
              <tbody>
                <?php
                $i = 0;
                foreach ($categories as $key => $value) {
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
                    <td class="text-center">
                      <a onclick="return confirm('Bạn có chắc chắn muốn sửa?')"
                        href="?action=manager&categories_manager&update_categories&id=<?php echo $value['id']; ?>">
                        Sửa
                      </a>
                      <a onclick="return confirm('Bạn có chắc chắn muốn xóa?')"
                        href="?action=manager&categories_manager&delete_categories&id=<?php echo $value['id']; ?>">Xóa</a>
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