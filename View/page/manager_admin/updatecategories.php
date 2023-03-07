<?php include('View/custom/header-manager.php'); ?>
<div class="container add-new">
    <h2>Sửa thể loại</h2>
    <form method="post" enctype="multipart/form-data">
        <div class="title">
            <label for="title">
                Tên thể loại:
                <input type="text" name="title" id="title" value="<?php echo $categoryID['title']; ?>">
            </label>
        </div>
        <div class="button-link">
            <input type="submit" value="Sửa" name="update_category">
        </div>
    </form>
    <?php include('View/custom/footer-manager.php'); ?>