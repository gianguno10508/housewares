<?php
require_once "db.php";

class Model extends Db
{


    /** USER */
    public function GetDataUser()
    {
        $sql = "SELECT * FROM user";
        $con = $this->connect();
        $ketqua = $con->query($sql);

        if ($ketqua->num_rows == 0) {
            $data = 0;
        } else {
            while ($datas = mysqli_fetch_assoc($ketqua)) {
                $data[] = $datas;
            }
        }
        return $data;
    }
    public function GetDataUserRole()
    {
        $sql = "SELECT * FROM role_user";
        $con = $this->connect();
        $ketqua = $con->query($sql);

        if ($ketqua->num_rows == 0) {
            $data = 0;
        } else {
            while ($datas = mysqli_fetch_assoc($ketqua)) {
                $data[] = $datas;
            }
        }
        return $data;
    }
    public function RegisterUser($user, $pass)
    {
        $sql = "INSERT INTO user(id, username, pass, fullname, andress, phone, id_role) VALUES(NULL,'$user', '$pass', NULL, NULL, NULL,2)";
        $conn = $this->connect();
        return $conn->query($sql);
    }
    public function ChangePass($user, $pass)
    {
        $sql = "UPDATE user SET pass = '$pass' WHERE username = '$user'";
        $conn = $this->connect();
        return $conn->query($sql);
    }
    public function UpdateInfo($user_id ,$fullname, $andress, $phone)
    {
        $sql = "UPDATE user SET fullname = '$fullname', andress='$andress', phone='$phone' WHERE id = '$user_id'";
        $conn = $this->connect();
        return $conn->query($sql);
    }
    public function GetUserID($id_user)
    {
        $sql = "SELECT * FROM user WHERE id = '$id_user'";
        $con = $this->connect();
        $ketqua = $con->query($sql);

        if ($ketqua->num_rows != 0) {
            $data = mysqli_fetch_array($ketqua);
        } else {
            $data = 0;
        }
        return $data;
    }

    /** CART */
    public function GetCartUser($username)
    {
        $sql = "SELECT * FROM cart WHERE username = '$username'";
        $con = $this->connect();
        $result = $con->query($sql);
        if ($result->num_rows == 0) {
            $data = 0;
        } else {
            while ($datas = mysqli_fetch_assoc($result)) {
                $data[] = $datas;
            }
        }
        return $data;
    }
    public function AddCart($cart_detail, $username)
    {
        $sql = "INSERT INTO cart(id, cart_detail, username)
                VALUES(NULL,'$cart_detail', '$username')";
        $conn = $this->connect();
        return $conn->query($sql);
    }
    public function UpdateCartExist($id_cart, $cart_detail, $username)
    {
        $sql = "UPDATE cart SET cart_detail='$cart_detail', username='$username' WHERE id='$id_cart'";
        $conn = $this->connect();
        return $conn->query($sql);
    }
    public function DeleteItemCart($id_cart)
    {
        $sql = "DELETE FROM cart WHERE id = '$id_cart'";
        $conn = $this->connect();
        return $conn->query($sql);
    }
    public function DeleteUserCart($username)
    {
        $sql = "DELETE FROM cart WHERE username = '$username'";
        $conn = $this->connect();
        return $conn->query($sql);
    }



    /* CATEGORIES */
    public function GetAllCategories()
    {
        $sql = "SELECT * FROM categories";
        $con = $this->connect();
        $result = $con->query($sql);
        if ($result->num_rows == 0) {
            $data = 0;
        } else {
            while ($datas = mysqli_fetch_assoc($result)) {
                $data[] = $datas;
            }
        }
        return $data;
    }
    public function AddCategory($title)
    {
        $sql = "INSERT INTO categories(id, title) VALUES(NULL,'$title')";
        $conn = $this->connect();
        return $conn->query($sql);
    }
    public function UpdateCategory($id_cate, $title)
    {
        $sql = "UPDATE categories SET title='$title' WHERE id='$id_cate'";
        $conn = $this->connect();
        return $conn->query($sql);
    }
    public function GetCategoryID($id_cate)
    {
        $sql = "SELECT * FROM categories WHERE id = $id_cate";
        $con = $this->connect();
        $ketqua = $con->query($sql);

        if ($ketqua->num_rows != 0) {
            $data = mysqli_fetch_array($ketqua);
        } else {
            $data = 0;
        }
        return $data;
    }
    public function DeleteCategory($id_cate)
    {
        $sql = "DELETE FROM categories WHERE id = '$id_cate'";
        $conn = $this->connect();
        return $conn->query($sql);
    }



    /** PRODUCTS */
    public function GetAllProducts()
    {
        $sql = "SELECT * FROM products";
        $con = $this->connect();
        $result = $con->query($sql);
        if ($result->num_rows == 0) {
            $data = 0;
        } else {
            while ($datas = mysqli_fetch_assoc($result)) {
                $data[] = $datas;
            }
        }
        return $data;
    }
    public function GetStatusBill()
    {
        $sql = "SELECT * FROM status_bill";
        $con = $this->connect();
        $result = $con->query($sql);
        if ($result->num_rows == 0) {
            $data = 0;
        } else {
            while ($datas = mysqli_fetch_assoc($result)) {
                $data[] = $datas;
            }
        }
        return $data;
    }
    public function AddProduct($title, $descrip, $img, $price, $id_category)
    {
        $sql = "INSERT INTO products(id, title, descrip, img, price, id_category)
            VALUES(NULL,'$title', '$descrip', '$img', '$price','$id_category')";
        $conn = $this->connect();
        return $conn->query($sql);
    }
    public function GetProductID($id_product)
    {
        $sql = "SELECT * FROM products WHERE id = $id_product";
        $con = $this->connect();
        $ketqua = $con->query($sql);

        if ($ketqua->num_rows != 0) {
            $data = mysqli_fetch_array($ketqua);
        } else {
            $data = 0;
        }
        return $data;
    }
    public function GetProductCateID($id_cate)
    {
        $sql = "SELECT * FROM products WHERE id_category = '$id_cate'";
        $con = $this->connect();
        $result = $con->query($sql);
        if ($result->num_rows == 0) {
            $data = 0;
        } else {
            while ($datas = mysqli_fetch_assoc($result)) {
                $data[] = $datas;
            }
        }
        return $data;
    }
    public function UpdateProduct($id, $title, $descrip, $img, $price, $id_category)
    {
        $sql = "UPDATE products SET title = '$title', descrip = '$descrip', img = '$img', price = '$price', id_category = '$id_category' WHERE id='$id'";
        $conn = $this->connect();
        return $conn->query($sql);
    }
    public function DeleteProduct($id_product)
    {
        $sql = "DELETE FROM products WHERE id = '$id_product'";
        $conn = $this->connect();
        return $conn->query($sql);
    }
    public function SearchProducts($key)
    {
        $sql = "SELECT * FROM products WHERE title like '%$key%'";
        $con = $this->connect();
        $result = $con->query($sql);
        if ($result->num_rows == 0) {
            $data = 0;
        } else {
            while ($datas = mysqli_fetch_assoc($result)) {
                $data[] = $datas;
            }
        }
        return $data;
    }

    /**Reviews */
    public function GetAllReviews(){
        $sql = "SELECT * FROM reviews ";
        $con = $this->connect();
        $result = $con->query($sql);
        if ($result->num_rows == 0) {
            $data = 0;
        } else {
            while ($datas = mysqli_fetch_assoc($result)) {
                $data[] = $datas;
            }
        }
        return $data;
    }
    public function GetReviewByProduct($id_product){
        $sql = "SELECT * FROM reviews WHERE id_product = '$id_product' ";
        $con = $this->connect();
        $result = $con->query($sql);
        if ($result->num_rows == 0) {
            $data = 0;
        } else {
            while ($datas = mysqli_fetch_assoc($result)) {
                $data[] = $datas;
            }
        }
        return $data;
    }
    public function AddReview($rate, $content_reviews, $username, $date_review,$id_product)
    {
        $sql = "INSERT INTO reviews(id, rate, content_reviews, username, date_review,id_product)
            VALUES(NULL,'$rate', '$content_reviews', '$username', '$date_review' ,'$id_product')";
        $conn = $this->connect();
        return $conn->query($sql);
    }
    public function DeleteReview($id_review)
    {
        $sql = "DELETE FROM reviews WHERE id = '$id_review'";
        $conn = $this->connect();
        return $conn->query($sql);
    }

    /**BILL */
    public function GetAllBill()
    {
        $sql = "SELECT * FROM bill";
        $con = $this->connect();
        $result = $con->query($sql);
        if ($result->num_rows == 0) {
            $data = 0;
        } else {
            while ($datas = mysqli_fetch_assoc($result)) {
                $data[] = $datas;
            }
        }
        return $data;
    }
    public function GetAllBillUser($username)
    {
        $sql = "SELECT * FROM bill WHERE username = '$username'";
        $con = $this->connect();
        $result = $con->query($sql);
        if ($result->num_rows == 0) {
            $data = 0;
        } else {
            while ($datas = mysqli_fetch_assoc($result)) {
                $data[] = $datas;
            }
        }
        return $data;
    }
    public function AddBill($fullname, $andress, $phone, $date_order, $data_order, $total_bill, $username, $id_status)
    {
        $sql = "INSERT INTO bill(id, fullname, andress, phone, date_order, data_order, total_bill, username, id_status)
            VALUES(NULL,'$fullname', '$andress', '$phone', '$date_order','$data_order', '$total_bill', '$username', '$id_status')";
        $conn = $this->connect();
        return $conn->query($sql);
    }
    public function UpdateBill($id_bill, $id_status)
    {
        $sql = "UPDATE bill SET id_status = '$id_status' WHERE id='$id_bill'";
        $conn = $this->connect();
        return $conn->query($sql);
    }
}
?>