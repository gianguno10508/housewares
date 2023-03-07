<?php include('View/custom/header.php'); ?>
<!-- Breadcrumbs -->
<div class="breadcrumbs">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="bread-inner">
					<ul class="bread-list">
						<li><a href="http://localhost/houseware">Trang chủ<i class="ti-arrow-right"></i></a></li>
						<li class="active"><a href="http://localhost/houseware/contact.php">Liên hệ</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- End Breadcrumbs -->

<!-- Start Contact -->
<section id="contact-us" class="contact-us section">
	<div class="container">
		<div class="contact-head">
			<div class="row">
				<div class="col-lg-8 col-12">
					<div class="form-main">
						<div class="title">
							<h4>Liên hệ</h4>
							<h3>Gửi thư cho chúng tôi</h3>
						</div>
						<form class="form" method="post">
							<div class="row">
								<div class="col-lg-6 col-12">
									<div class="form-group">
										<label>Họ và tên<span>*</span></label>
										<input name="name" type="text" placeholder="">
									</div>
								</div>
								<div class="col-lg-6 col-12">
									<div class="form-group">
										<label>Nội dung chính<span>*</span></label>
										<input name="subject" type="text" placeholder="">
									</div>
								</div>
								<div class="col-lg-6 col-12">
									<div class="form-group">
										<label>Email<span>*</span></label>
										<input name="email" type="email" placeholder="">
									</div>
								</div>
								<div class="col-lg-6 col-12">
									<div class="form-group">
										<label>Số điện thoại<span>*</span></label>
										<input name="company_name" type="text" placeholder="">
									</div>
								</div>
								<div class="col-12">
									<div class="form-group message">
										<label>Nội dung thư<span>*</span></label>
										<textarea name="message" placeholder=""></textarea>
									</div>
								</div>
								<div class="col-12">
									<div class="form-group button">
										<button type="submit" class="btn ">Gửi</button>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
				<div class="col-lg-4 col-12">
					<div class="single-head">
						<div class="single-info">
							<i class="fa fa-phone"></i>
							<h4 class="title">Gọi cho chúng tôi:</h4>
							<ul>
								<li>+123 456-789-1120</li>
								<li>+522 672-452-1120</li>
							</ul>
						</div>
						<div class="single-info">
							<i class="fa fa-envelope-open"></i>
							<h4 class="title">Email:</h4>
							<ul>
								<li><a href="mailto:info@yourwebsite.com">nguyenminhanh@gmail.com</a></li>
								<li><a href="mailto:info@yourwebsite.com">support@gmail.com</a></li>
							</ul>
						</div>
						<div class="single-info">
							<i class="fa fa-location-arrow"></i>
							<h4 class="title">Địa chỉ:</h4>
							<ul>
								<li>Số 123. đường Ga Hà Nội.</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!--/ End Contact -->

<?php include('View/custom/footer_home.php'); ?>