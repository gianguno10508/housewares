<?php include('View/custom/header.php'); ?>
<!-- Shopping Cart -->
<div class="shopping-cart section">
	<div class="container">
		<?php
		if (is_array($dataCartUserId)) {
			?>
			<div class="row">
				<div class="col-12">
					<!-- Shopping Summery -->
					<form method="post">
						<table class="table shopping-summery">
							<thead>
								<tr class="main-hading">
									<th>ẢNH</th>
									<th>TÊN</th>
									<th class="text-center">GIÁ</th>
									<th class="text-center">SỐ LƯỢNG</th>
									<th class="text-center">TỔNG</th>
									<th class="text-center"><a href="?action=delete_cart&all"><i class="ti-trash remove-icon"></i></a></th>
								</tr>
							</thead>
							<tbody>
								<?php
								$i = 0;
								$sum = 0;
								$cartDataId = json_decode($dataCartUserId[0]['cart_detail']);
								foreach ($cartDataId as $key => $item) {
									$sum = $sum + $item->cart_data->total_price;
									?>
									<tr>
										<td class="image" data-title="No"><img
												src="uploads/<?php echo $item->cart_data->img; ?>" alt="#">
										</td>
										<td class="product-des" data-title="Description">
											<p class="product-name"><a href="#">
													<?php echo $item->cart_data->title; ?>
												</a></p>
										</td>
										<td class="price" data-title="Price"><span>
												<?php echo number_format($item->cart_data->price) . 'đ' ?>
											</span></td>
										<td class="qty" data-title="Qty"><!-- Input Order -->
											<div class="input-group">
												<div class="button minus">
													<button type="button" class="btn btn-primary btn-number" disabled="disabled"
														data-type="minus" data-field="quant[<?php echo $i; ?>]">
														<i class="ti-minus"></i>
													</button>
												</div>
												<input type="text" name="quant[<?php echo $i; ?>]" class="input-number"
													data-min="1" data-max="100"
													value="<?php echo $item->cart_data->quantity; ?>">
												<div class="button plus">
													<button type="button" class="btn btn-primary btn-number" data-type="plus"
														data-field="quant[<?php echo $i; ?>]">
														<i class="ti-plus"></i>
													</button>
												</div>
											</div>
											<input type="hidden" name="product_id[]" value="<?php echo $item->cart_data->id_product; ?>">
											<!--/ End Input Order -->
										</td>
										<td class="total-amount" data-title="Total"><span>
												<?php echo number_format($item->cart_data->total_price) . 'đ' ?>
											</span></td>
										<td class="action" data-title="Remove"><a href="?action=delete_cart&index=<?php echo $i; ?>"><i
													class="ti-trash remove-icon"></i></a>
										</td>
									</tr>
									<?php
									$i++;
								}
								?>
							</tbody>
						</table>
						<input type="submit" name="update_cart" style="float: right" class="btn" value="Cập nhật giỏ hàng">
						<!-- <button class="btn">Apply</button> -->
					</form>
					<!--/ End Shopping Summery -->
				</div>
			</div>
			<div class="row">
				<div class="col-12">
					<!-- Total Amount -->
					<div class="total-amount">
						<div class="row">
							<div class="col-lg-8 col-md-5 col-12">
								<div class="left">
									<div class="coupon">
										<form action="#" target="_blank">
											<input name="Coupon" placeholder="Mã giảm giá">
											<button class="btn">Apply</button>
										</form>
									</div>
								</div>
							</div>
							<div class="col-lg-4 col-md-7 col-12">
								<div class="right">
									<ul>
										<li>Tổng giỏ hàng<span>
												<?php echo number_format($sum) . 'đ'; ?>
											</span></li>
										<li>Shipping<span>Free</span></li>
									</ul>
									<div class="button5">
										<a href="?action=checkout" class="btn">Thanh toán</a>
										<a href="?action=all-products" class="btn">Tiếp tục mua</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!--/ End Total Amount -->
				</div>
			</div>
		<?php
		} else {
			?>
			<h4 class="message-cart">Bạn không có gì trong giỏ <a href="?action=all-products">Mua ngay!!!</a></h4>
		<?php
		}
		?>
	</div>
</div>
<!--/ End Shopping Cart -->

<?php include('View/custom/footer_home.php'); ?>