<?php include('View/custom/header.php'); ?>
<div class="container add-job">
    <h2>Thêm thể loại mới</h2>
    <form method="post" enctype="multipart/form-data">
        <div class="title">
            <label for="title">
                Tên thể loại:
                <input type="text" name="title" id="title">
            </label>
        </div>
        <div class="button-link">
            <input type="submit" value="Thêm" name="add_category">
        </div>
    </form>
</div>
<?php include('View/custom/footer.php'); ?>