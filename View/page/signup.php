<!DOCTYPE html>
<html lang="en">
<head>
	<title>Đăng kí</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
<link rel="icon" type="image/png" href="./View/page/login/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="./View/page/login/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="./View/page/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="./View/page/login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="./View/page/login/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="./View/page/login/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="./View/page/login/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="./View/page/login/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="./View/page/login/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="./View/page/login/css/util.css">
	<link rel="stylesheet" type="text/css" href="./View/page/login/css/main.css">
<!--===============================================================================================-->
</head>
<body style="background-color: #666666;">
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">

				<form class="login100-form validate-form" method="POST">
					<span class="login100-form-title p-b-43">
						Đăng kí
					</span>
					 <div class="message">
                        <?php if (isset($check)): ?>
                            <?php if ($check == 2): ?>
                                <p>Tài khoản đã tồn tại!!</p>
                            <?php elseif($check == -1): ?>
                                <p>Hai mật khẩu không khớp!!</p>
                            <?php elseif($check == 1): ?>
                                <p>Mật khẩu lớn hơn hoặc bằng 8 kí tự!!</p>
                            <?php else: ?>
                                <p>Đăng kí thành công!</p>
                                <?php header('location: http://localhost/houseware/?action=login'); ?>
                            <?php endif; ?>
                        <?php endif; ?>
                    </div>
					<div class="wrap-input100 validate-input" data-validate = "Vui lòng nhập">
						<input class="input100" type="text" name="username">
						<span class="focus-input100"></span>
						<span class="label-input100">Tài khoản</span>
					</div>
					
					
					<div class="wrap-input100 validate-input" data-validate="Vui lòng nhập">
						<input class="input100" type="password" name="password">
						<span class="focus-input100"></span>
						<span class="label-input100">Mật khẩu</span>
					</div>

                    <div class="wrap-input100 validate-input" data-validate="Vui lòng nhập">
						<input class="input100" type="password" name="repassword">
						<span class="focus-input100"></span>
						<span class="label-input100">Nhập lại mật khẩu</span>
					</div>
                    <div class="container-login100-form-btn">
                        <input class="login100-form-btn" type="submit" name='register' value="Đăng kí">
					</div>
                    <p class="message">
						Bạn đã có tài khoản?
					</p>
					<div class="container-login100-form-btn">
						<a class="login100-form-btn" href="?action=login">
							Đăng nhập
						</a>
					</div>                    
				</form>
				<div class="login100-more" style="background-image: url('https://images.unsplash.com/photo-1497294815431-9365093b7331?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1950&q=80');">
				</div>
			</div>
		</div>
	</div>
	
	

	
	
<!--===============================================================================================-->
<script src="./View/page/login/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="./View/page/login/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="./View/page/login/vendor/bootstrap/js/popper.js"></script>
	<script src="./View/page/login/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="./View/page/login/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="./View/page/login/vendor/daterangepicker/moment.min.js"></script>
	<script src="./View/page/login/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="./View/page/login/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="./View/page/login/js/main.js"></script>

</body>
</html>