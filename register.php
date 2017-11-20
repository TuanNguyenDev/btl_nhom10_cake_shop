<?php include('./pages/head.php'); ?>

<?php include('./pages/header.php'); ?>
	
<main class="main-content" id="MainContent" role="main">
<section class="collection-heading heading-content ">
	<div class="container">
		<div class="row">
			<div class="collection-wrapper">
				<h1 class="collection-title"><span>Create Account</span></h1>
				<div class="breadcrumb-group">
					<div class="breadcrumb clearfix">
						<span itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">
							<a href="./index.html" title="Bridal 1" itemprop="url">
								<span itemprop="title">Home</span>
							</a>
						</span>
						<span class="arrow-space">></span>
						<span itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">
							<a href="./register.html" title="Create Account" itemprop="url">
								<span itemprop="title">Create Account</span>
							</a>
						</span>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="register-content">
	<div class="register-wrapper">
		<div class="container">
			<div class="row">
				<div class="register-inner">
					<div id="customer-register">
						<div id="register" class="">
							<form method="post" action="./model/register.php" id="create_customer" accept-charset="UTF-8"><input type="hidden" value="create_customer" name="form_type">
								<div id="first_name1" class="clearfix large_form">
									<label for="first_name2" class="label">Họ tên</label>
									<input type="text" value="" name="name" id="first_name2" class="text" size="30" placeholder="Họ tên">
								</div>								
								<div id="email1" class="clearfix large_form">
									<label for="email2" class="label">Email</label>
									<input type="email" value="" name="email" id="email2" class="text" size="30" placeholder="abc@example.com">
								</div>
								<div id="email1" class="clearfix large_form">
									<label for="email2" class="label">Điện thoại</label>
									<input type="text" value="" name="phone" id="phone" class="text" size="30" placeholder="Điện thoại">
								</div>
								
								<div id="password1" class="clearfix large_form">
									<label for="password2" class="label">Mật khẩu</label>
									<input type="password" value="" name="password" id="password2" class="password text" size="30">
								</div>
								<div id="password1" class="clearfix large_form">
									<label for="password2" class="label">Địa chỉ</label>
									<input type="text" value="" name="address"  class="password text" size="30">
								</div>
								<div id="email1" class="clearfix large_form">
									<label for="email2" class="label">Giới tính</label>
									<select class="text" name="gender" style="margin-bottom: 20px;">
										<option value="1" class="text">Nam</option>
										<option value="0">Nữ</option>
									</select>
								</div>
								<div class="action_bottom">
									<input class="btn" type="submit" value="Create" name="submit"> or
									<span class="note"><a href="./index.php">Return to Store</a></span>
								</div>
							</form>
						</div>
						<!-- #register -->
					</div>
					<!-- #customer-register -->
				</div>
			</div>
		</div>
	</div>
</section>
</main>
	
<?php include('./pages/footer.php'); ?>