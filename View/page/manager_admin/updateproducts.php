<?php include('View/custom/header-manager.php'); ?>
<div class="container add-new">
    <h2>Sửa sản phẩm mới</h2>
    <form method="post" enctype="multipart/form-data">
        <div class="title">
            <label for="title">
                <p>Tên sản phẩm*:</p>
                <input type="text" name="title" id="title" value="<?php echo $dataProductId['title']; ?>" required>
            </label>
        </div>
        <div class="description">
            <label for="description">
                <p>Mô tả sản phẩm*:</p>
                <textarea name="description" id="description" placeholder="<?php echo $dataProductId['descrip']; ?>"
                    cols="69" rows="2"></textarea>
            </label>
        </div>
        <div class="image">
            <label for="image">
                <p>Ảnh:</p>
                <input type="file" multiple="multiple" name="image[]" id="image">
                <p class="message-img">Nếu không chọn ảnh, ảnh sản phẩm sẽ giữ nguyên</p>
            </label>
        </div>
        <div class="price">
            <label for="price">
                <p>Giá*:</p>
                <input type="text" name="price" value="<?php echo $dataProductId['price']; ?>" id="price" required>
            </label>
        </div>
        <div class="category">
            <p>Loại công việc:</p>
            <select name="category">
                <?php
                foreach ($categories as $key => $category) {
                    # code...
                    ?>
                    <option value="<?php echo $category['id'] ?> ">
                        <?php echo $category['title']; ?>
                    </option>
                    <?php
                }
                ?>
            </select>
        </div>
        <div class="button-link">
            <input type="submit" class="btn" value="Sửa" name="update_product">
        </div>
    </form>
    <?php include('View/custom/footer-manager.php'); ?>