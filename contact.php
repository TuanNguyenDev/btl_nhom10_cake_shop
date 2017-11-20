<!DOCTYPE php>
<!--[if IE 8 ]>    <php lang="en" class="no-js ie8"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <php lang="en" class="no-js"> <!--<![endif]-->
<?php include('./pages/head.php'); ?>

<body class="index-template sarahmarket_1">

	<?php include('./pages/header.php'); ?>
	<div class="fix-sticky"></div>
	
	<!-- Main Content -->
	<div class="page-container" id="PageContainer">
		<main class="main-content" id="MainContent" role="main">
			<section class="collection-heading heading-content ">
				<div class="container">
					<div class="row">
						<div class="collection-wrapper">
							<h1 class="collection-title"><span>Contact</span></h1>
							<div class="breadcrumb-group">
								<div class="breadcrumb clearfix">
									<span itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">
										<a href="./index.php" title="Sarahmarket 1" itemprop="url"><span itemprop="title">Home</span></a>
									</span>
									<span class="arrow-space">></span>
									<span itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">
										<a href="./contact.php" title="Contact" itemprop="url"><span itemprop="title">Contact</span></a>
									</span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<section class="contact_banner_show-content">
				<div class="blcontact_banner_showog-wrapper">
					<div class="container">
						<div class="row">
							<div class="contact_banner_show-inner">
								<div id="page">
									<div class="page-with-contact-form">
										<div id="shopify-section-contact-template" class="shopify-section">
											<div class="google-maps-content col-md-6">
												<div class="google-maps-wrapper">
													<div class="google-maps-inner">
														<div id="contact_map" class="map">
														</div>
													</div>
												</div>
											</div>
											<div class="contact-form-group col-md-6">
												<form method="post" action="./contact.php" id="contact_form" class="contact-form" accept-charset="UTF-8">
													<div id="contactFormWrapper">
														<p>
															<input type="text" value="<?php if(isset($_SESSION['name']) ? $_SESSION['name'] : "") echo $_SESSION['name']?>" id="contactFormName" name="name" placeholder="Username">
														</p>
														<p>
															<input type="email" value="<?php if(isset($_SESSION['name']) ? $_SESSION['email'] : "") echo $_SESSION['email']?>" id="contactFormEmail" name="email" placeholder="Email">
														</p>
														<p>
															<input id="contactFormTelephone" value="<?php if(isset($_SESSION['name']) ? $_SESSION['phone_number'] : "") echo $_SESSION['phone_number']?>" name="phone" placeholder="Phone" >
														</p>
														<p>
															<textarea rows="15" cols="75" id="contactFormMessage" name="body" placeholder="Your message"></textarea>
														</p>
														<p>
															<input type="submit" name="submit" id="contactFormSubmit" value="Send" class="btn">
														</p>
													</div>
												</form>
											</div>
											<?php 
												if(isset($_POST['submit'])){
													$name = $_POST['name'];
													$email = $_POST['email'];
													$phone = $_POST['phone'];
													$body = $_POST['body'];
													$sql = "insert into contacts(name,email,subject,message) values('$name','$email','$phone','$body')";
													if(db::query($mysqli,$sql)){
														echo "<h3>Đã gửi</h3>";
													}else
													{
														echo "<h3>Lỗi trong khi gửi</h3>";
													}

													
												}
											 ?>
											<script>
												$(window).ready(function($) {
													if (jQuery().gMap) {
														if ($('#contact_map').length) {
															$('#contact_map').gMap({
																zoom: 17,
																scrollwheel: false,
																maptype: 'ROADMAP',
																markers: [{
																	address: '474 Ontario St Toronto, ON M4X 1M7 Canada',
																	php: '_address'
																}]
															});
														}
													}
												});
											</script>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
		</main>
	</div>
	<?php include('./pages/footer.php'); ?>


</body>
</php>