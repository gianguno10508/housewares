<?php
require_once "Model/dbmodel.php";
session_start();

/**
 * Chuyển đổi chuỗi kí tự thành dạng slug dùng cho việc tạo friendly url.
 * @access    public
 * @param string
 * @return    string
 */
if (!function_exists('create_slug')) {
    function create_slug($string)
    {
        $search = array(
            '#(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)#',
            '#(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)#',
            '#(ì|í|ị|ỉ|ĩ)#',
            '#(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)#',
            '#(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)#',
            '#(ỳ|ý|ỵ|ỷ|ỹ)#',
            '#(đ)#',
            '#(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)#',
            '#(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)#',
            '#(Ì|Í|Ị|Ỉ|Ĩ)#',
            '#(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)#',
            '#(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)#',
            '#(Ỳ|Ý|Ỵ|Ỷ|Ỹ)#',
            '#(Đ)#',
            "/[^a-zA-Z0-9\-\_]/",
        );
        $replace = array(
            'a',
            'e',
            'i',
            'o',
            'u',
            'y',
            'd',
            'A',
            'E',
            'I',
            'O',
            'U',
            'Y',
            'D',
            '-',
        );
        $string = preg_replace($search, $replace, $string);
        $string = preg_replace('/(-)+/', '-', $string);
        $string = strtolower($string);
        return $string;
    }
}
class Controller extends Model
{
    public function MainControl()
    {
        $dataUser = $this->GetDataUser();
        $dataUserRole = $this->GetDataUserRole();
        $categories = $this->GetAllCategories();
        $products = $this->GetAllProducts();
        $bills = $this->GetAllBill();
        $statusBill = $this->GetStatusBill();
        $allReviews = $this->GetAllReviews();
        if (isset($_SESSION['username'])) {
            $dataCartUserId = $this->GetCartUser($_SESSION['username']);
        }
        if (isset($_GET['action'])) {
            $action = $_GET['action'];
            switch ($action) {

                /** User */
                case 'login': {
                        if (isset($_POST['login'])) {
                            $count = 0;
                            $user = $_POST['username'];
                            $pass = $_POST['password'];
                            foreach ($dataUser as $value) {
                                if ($value['username'] == $user && $value['pass'] == $pass) {
                                    $_SESSION['username'] = $user;
                                    $_SESSION['role'] = $value['id_role'];
                                    $_SESSION['id_user'] = $value['id'];
                                    $count++;
                                    break;
                                }
                            }
                        }
                        require_once('View/page/login/login.php');
                        break;
                    }
                case 'signup': {
                        if (isset($_POST['register'])) {
                            $check = 0;
                            $user = $_POST['username'];
                            $pass = $_POST['password'];
                            $repass = $_POST['repassword'];
                            $len = strlen($pass);
                            if ($pass != $repass) {
                                $check = -1;
                            }
                            if ($len < 8) {
                                $check = 1;
                            }
                            foreach ($dataUser as $value) {
                                if ($value['username'] == $user) {
                                    $check = 2;
                                    break;
                                }
                            }
                            if ($check == 0) {
                                $this->RegisterUser($user, $pass);
                            }
                        }
                        require_once('View/page/signup.php');
                        break;
                    }
                case 'account': {
                        if (isset($_SESSION['username'])) {
                            $username = $_SESSION['username'];
                            $dataUserId = $this->GetUserID($_SESSION['id_user']);
                            $dataBillUser = $this->GetAllBillUser($username);
                            if (isset($_GET['infor_user'])) {
                                if (isset($_POST['update_user'])) {
                                    $fullname = $_POST['fullname'];
                                    $andress = $_POST['andress'];
                                    $phone = $_POST['phone'];
                                    if ($this->UpdateInfo($_SESSION['id_user'], $fullname, $andress, $phone)) {
                                        header('location: http://localhost/houseware/?action=account&infor_user');
                                    }
                                }
                            } elseif (isset($_GET['changepass'])) {
                                if (isset($_POST['changepass'])) {
                                    $check = 0;
                                    $user = $_SESSION['username'];
                                    $passold = $_POST['passwordold'];
                                    $passnew = $_POST['passwordnew'];
                                    $repassnew = $_POST['repasswordnew'];
                                    $len = strlen($passnew);
                                    if ($passnew != $repassnew) {
                                        $check = -1;
                                    }
                                    if ($len < 8) {
                                        $check = 1;
                                    }
                                    foreach ($dataUser as $value) {
                                        if ($value['username'] == $user) {
                                            if ($value['pass'] != $passold) {
                                                $check = 2;
                                                break;
                                            }
                                            if ($value['pass'] == $passnew) {
                                                $check = 3;
                                                break;
                                            }
                                        }
                                    }
                                    if ($check == 0) {
                                        if ($this->ChangePass($user, $passnew)) {
                                            header('location: http://localhost/houseware/?action=account&dashboard_user');
                                        }
                                    }
                                }
                            }
                            require_once('View/page/account.php');
                        } else {
                            echo '<h1 style="text-align: center">Bạn cần đăng nhập!!!</h1>';
                            die;
                        }
                        break;
                    }
                case 'logout': {
                        unset($_SESSION['username']);
                        unset($_SESSION['role']);
                        header('location: http://localhost/houseware');
                        break;
                    }
                /***End User */


                /** Manager */
                case 'manager': {
                        if (isset($_GET['categories_manager'])) {
                            if (isset($_GET['add_categories'])) {
                                if (isset($_POST['add_category'])) {
                                    $title = $_POST['title'];
                                    if ($this->AddCategory($title)) {
                                        header('location: http://localhost/houseware/?action=manager&categories_manager');
                                    }
                                }
                                require_once('View/page/manager_admin/addcategories.php');
                                break;
                            } elseif (isset($_GET['update_categories'])) {
                                if (isset($_GET['id'])) {
                                    $id_cate = $_GET['id'];
                                    $categoryID = $this->GetCategoryID($id_cate);
                                    if (isset($_POST['update_category'])) {
                                        $title = $_POST['title'];
                                        if ($this->UpdateCategory($id_cate, $title)) {
                                            header('location: http://localhost/houseware/?action=manager&categories_manager');
                                        }
                                    }
                                }
                                require_once('View/page/manager_admin/updatecategories.php');
                                break;
                            } elseif (isset($_GET['delete_categories'])) {
                                if (isset($_GET['id'])) {
                                    $id_cate = $_GET['id'];
                                    if ($this->DeleteCategory($id_cate)) {
                                        header('location: http://localhost/houseware/?action=manager&categories_manager');
                                    }
                                }
                                break;
                            }
                            require_once('View/page/manager_admin/categories.php');
                            break;
                        } elseif (isset($_GET['products_manager'])) {
                            if (isset($_GET['add_products'])) {
                                if (isset($_POST['add_product'])) {
                                    $title = $_POST['title'];
                                    $description = $_POST['description'];
                                    $price = $_POST['price'];
                                    $id_cate = $_POST['category'];
                                    // Count # of uploaded files in array
                                    $total = count($_FILES['image']['name']);
                                    // Loop through each file
                                    $array_img = [];
                                    for ($i = 0; $i < $total; $i++) {

                                        //Get the temp file path
                                        $tmpFilePath = $_FILES['image']['tmp_name'][$i];

                                        //Make sure we have a file path
                                        if ($tmpFilePath != "") {
                                            //Setup our new file path
                                            $newFilePath = "uploads/" . $_FILES['image']['name'][$i];

                                            array_push($array_img, $_FILES['image']['name'][$i]);
                                            //Upload the file into the temp dir
                                            move_uploaded_file($tmpFilePath, $newFilePath);
                                        }
                                    }
                                    $array_img = json_encode($array_img);
                                    if ($this->AddProduct($title, $description, $array_img, $price, $id_cate)) {
                                        header('location: http://localhost/houseware/?action=manager&products_manager');
                                    }
                                }
                                require_once('View/page/manager_admin/addproducts.php');
                                break;
                            } elseif (isset($_GET['update_product'])) {
                                if (isset($_GET['id'])) {
                                    $id_product = $_GET['id'];
                                    $dataProductId = $this->GetProductID($id_product);
                                    if (isset($_POST['update_product'])) {
                                        $title = $_POST['title'];
                                        $description = $_POST['description'];
                                        $price = $_POST['price'];
                                        $id_cate = $_POST['category'];
                                        // Count # of uploaded files in array
                                        $total = count($_FILES['image']['name']);
                                        $array_img = [];
                                        if ($_FILES['image']['name'][0]) {
                                            // Loop through each file
                                            for ($i = 0; $i < $total; $i++) {

                                                //Get the temp file path
                                                $tmpFilePath = $_FILES['image']['tmp_name'][$i];

                                                //Make sure we have a file path
                                                if ($tmpFilePath != "") {
                                                    //Setup our new file path
                                                    $newFilePath = "uploads/" . $_FILES['image']['name'][$i];

                                                    array_push($array_img, $_FILES['image']['name'][$i]);
                                                    //Upload the file into the temp dir
                                                    move_uploaded_file($tmpFilePath, $newFilePath);
                                                }
                                            }
                                            $array_img = json_encode($array_img);
                                        } else {
                                            $array_img = $dataProductId['img'];
                                        }
                                        if ($this->UpdateProduct($id_product, $title, $description, $array_img, $price, $id_cate)) {
                                            header('location: http://localhost/houseware/?action=manager&products_manager');
                                        }
                                    }

                                }
                                require_once('View/page/manager_admin/updateproducts.php');
                                break;
                            } elseif (isset($_GET['delete_product'])) {
                                if (isset($_GET['id'])) {
                                    $id_product = $_GET['id'];
                                    if ($this->DeleteProduct($id_product)) {
                                        header('location: http://localhost/houseware/?action=manager&products_manager');
                                    }
                                }
                                break;
                            }
                            require_once('View/page/manager_admin/products.php');
                            break;
                        } elseif (isset($_GET['bills_manager'])) {
                            if (isset($_POST['update_bill'])) {
                                if (isset($_POST['id_bill'])) {
                                    $id_bill = $_POST['id_bill'];
                                    $id_status = $_POST['status'];
                                    if ($this->UpdateBill($id_bill, $id_status)) {
                                        header('location: http://localhost/houseware/?action=manager&bills_manager');
                                    }
                                }
                                // require_once('View/page/manager_admin/bills.php');
                                // break;
                            }
                            require_once('View/page/manager_admin/bills.php');
                            break;
                        } elseif (isset($_GET['deny_job'])) {
                            if (isset($_GET['id'])) {
                                $id = $_GET['id'];
                                $dataJobId = $this->GetJobID($id);
                                $title = $dataJobId['title'];
                                $descrip = $dataJobId['descrip'];
                                $date_post = $dataJobId['date_post'];
                                $loca = $dataJobId['loca'];
                                $price = $dataJobId['price'];
                                $phone_number = $dataJobId['phone_number'];
                                $id_status = 3;
                                $id_job = $dataJobId['id_job'];
                                $user = $dataJobId['user'];
                                if ($this->DenyJob($id, $title, $descrip, $date_post, $loca, $price, $phone_number, $id_status, $id_job, $user)) {
                                    header('location: http://localhost/houseware/?action=manager&jobs_manager');
                                }
                            }
                            require_once('View/page/manager/index.php');
                            break;
                        } elseif (isset($_POST['update_bill'])) {
                            if (isset($_POST['id_bill'])) {
                                $id_bill = $_POST['id_bill'];
                                $id_status = $_POST['status'];
                                if ($this->UpdateBill($id_bill, $id_status)) {
                                    header('location: http://localhost/houseware/?action=manager&bills_manager');
                                }
                            }
                            require_once('View/page/manager/index.php');
                            break;
                        } elseif (isset($_GET['reviews_manager'])){
                            if(isset($_GET['delete_review'])){
                                if(isset($_GET['id'])){
                                    $id_review = $_GET['id'];
                                    if($this->DeleteReview($id_review)){
                                        header('location: http://localhost/houseware/?action=manager&reviews_manager');
                                    }
                                }
                            }
                            require_once('View/page/manager_admin/reviews.php');
                            break;
                        }
                        else {
                            require_once('View/page/manager_admin/index.php');
                            break;
                        }
                    }

                /** Cart + bill */
                case 'cart': {
                        if (isset($_POST['update_cart'])) {

                            $cartUserId = $this->GetCartUser($_SESSION['username']);

                            $id_cart = $cartUserId[0]['id'];
                            $dataCart = (array) json_decode($cartUserId[0]['cart_detail']);
                            foreach ($dataCart as $key => $value) {
                                # code...
                                $dataCart[$key]->cart_data->quantity = $_POST['quant'][$key];
                                $dataCart[$key]->cart_data->total_price = $_POST['quant'][$key] * $dataCart[$key]->cart_data->price;
                            }
                            $dataCart = json_encode($dataCart, JSON_UNESCAPED_UNICODE);

                            if ($this->UpdateCartExist($id_cart, $dataCart, $_SESSION['username'])) {
                                header('location: http://localhost/houseware/?action=cart');
                            }
                        }
                        require_once('View/page/cart.php');
                        break;
                    }
                case 'delete_cart': {
                        if (isset($_GET['all'])) {
                            if ($this->DeleteUserCart($_SESSION['username'])) {
                                header('location: http://localhost/houseware/?action=cart');
                            }
                        }
                        if (isset($_GET['index'])) {
                            $id_cart = $dataCartUserId[0]['id'];
                            $cart_decode = json_decode($dataCartUserId[0]['cart_detail']);
                            unset($cart_decode[$_GET['index']]);
                            $dataCart = json_encode($cart_decode, JSON_UNESCAPED_UNICODE);
                            if ($this->UpdateCartExist($id_cart, $dataCart, $_SESSION['username'])) {
                                header('location: http://localhost/houseware/?action=cart');
                            }
                        }
                        require_once('View/page/cart.php');
                        break;
                    }
                case 'checkout': {
                        $dataUserId = $this->GetUserID($_SESSION['id_user']);
                        $username = $_SESSION['username'];
                        $id_status = 1;
                        if (isset($_POST['checkout'])) {
                            $fullname = $_POST['fullname'];
                            $andress = $_POST['andress'];
                            $phone = $_POST['phone'];
                            $total_bill = $_POST['total_bill'];
                            $dataCart = $dataCartUserId[0]['cart_detail'];
                            $date_order = date("Y-m-d");
                            if ($this->AddBill($fullname, $andress, $phone, $date_order, $dataCart, $total_bill, $username, $id_status)) {
                                if ($this->DeleteUserCart($_SESSION['username'])) {
                                    header('location: http://localhost/houseware/?action=thanks');
                                }
                            }
                        }
                        require_once('View/page/checkout.php');
                        break;
                    }
                case 'thanks': {
                        require_once('View/page/thanks.php');
                        break;
                    }
                /**End Cart + Bill */

                /** Detail product */
                case 'detail_product': {
                        if (isset($_GET['id'])) {
                            $id = $_GET['id'];
                            $productID = $this->GetProductID($id);
                            $reviews = $this->GetReviewByProduct($id);
                            if (isset($_POST['addcart'])) {
                                if (isset($_SESSION['username'])) {
                                    $cartUserId = $this->GetCartUser($_SESSION['username']);
                                    $quantity = $_POST['quant'];
                                    $img = json_decode($productID['img']);
                                    $cart_data = [
                                        'cart_data' => [
                                            'id_product' => $id,
                                            'title' => $productID['title'],
                                            'price' => $productID['price'],
                                            'img' => $img[0],
                                            'quantity' => $quantity,
                                            'total_price' => $productID['price'] * $quantity
                                        ]
                                    ];
                                    $dataCart = [];
                                    if ($cartUserId == 0) {
                                        # code...
                                        array_push($dataCart, $cart_data);
                                        $dataCart = json_encode($dataCart, JSON_UNESCAPED_UNICODE);
                                        if ($this->AddCart($dataCart, $_SESSION['username'])) {
                                            header('location: http://localhost/houseware/?action=cart');
                                        }
                                    } else {
                                        $id_cart = $cartUserId[0]['id'];
                                        $dataCart = (array) json_decode($cartUserId[0]['cart_detail']);
                                        $check = 0;
                                        $index = 0;
                                        foreach ($dataCart as $key => $value) {
                                            # code...
                                            if ($value->cart_data->id_product == $id) {
                                                $check = 1;
                                                $index = $key;
                                            }
                                        }
                                        if ($check == 1) {
                                            $old_quantity = $dataCart[$index]->cart_data->quantity;
                                            $new_quantity = $old_quantity + $quantity;
                                            $dataCart[$index]->cart_data->quantity = $new_quantity;
                                            $dataCart[$index]->cart_data->total_price = $new_quantity * $dataCart[$index]->cart_data->price;
                                            $dataCart = json_encode($dataCart, JSON_UNESCAPED_UNICODE);
                                        } else {
                                            array_push($dataCart, $cart_data);
                                            $dataCart = json_encode($dataCart, JSON_UNESCAPED_UNICODE);
                                        }
                                        if ($this->UpdateCartExist($id_cart, $dataCart, $_SESSION['username'])) {
                                            header('location: http://localhost/houseware/?action=cart');
                                        }
                                    }
                                } else {
                                    header('location: http://localhost/houseware/?action=login');
                                }
                            }
                            if (isset($_POST['submit'])) {
                                if (isset($_SESSION['username'])) {
                                    $username = $_SESSION['username'];
                                    $rate = $_POST['rate'];
                                    $content_reviews = $_POST['comment'];
                                    $id_product = $_POST['id_product'];
                                    $date_review = date("Y-m-d");
                                    if ($this->AddReview($rate, $content_reviews, $username, $date_review, $id_product)) {
                                        $reviews = $this->GetReviewByProduct($id);
                                        //header('location: http://localhost/houseware/?action=detail_product&id='.$id_product);
                                    }
                                } else {
                                    header('location: http://localhost/houseware/?action=login');
                                }
                            }
                        }
                        require_once('View/page/product_details.php');
                        break;
                    }

                /** All product */
                case 'all-products': {
                        require_once('View/page/all_products.php');
                        break;
                    }
                /*Cate*/
                case 'cate-view': {
                        if (isset($_GET['id'])) {
                            $dataProductbyCate = $this->GetProductCateID($_GET['id']);
                            $cateId = $this->GetCategoryID($_GET['id']);
                        }
                        require_once('View/page/categories_detail.php');
                        break;
                    }
            }
        } else {
            if (isset($_REQUEST['search'])) {
                $key = addslashes($_GET['key']);
                $dataSearch = $this->SearchProducts($key);
            }
            require_once('View/page/homepage.php');
        }
    }
}
?>