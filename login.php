<?php ob_start(); ?>
<?php include('./pages/head.php'); ?>

<?php include('./pages/header.php'); ?>

<main class="main-content" id="MainContent" role="main">
            <section class="collection-heading heading-content ">
                <div class="container">
                    <div class="row">
                        <div class="collection-wrapper">
                            <h1 class="collection-title"><span>Login</span></h1>
                            <div class="breadcrumb-group">
                                <div class="breadcrumb clearfix">
                                    <span itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">
                                        <a href="./index.php" title="Bridal 1" itemprop="url">
                                            <span itemprop="title">Home</span>
                                        </a>
                                    </span>
                                    <span class="arrow-space">></span>
                                    <span itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">
                                        <a href="./login.php" title="Login" itemprop="url">
                                            <span itemprop="title">Login</span>
                                        </a>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="login-content">
                <div class="login-content-wrapper">
                    <div class="container">
                        <div class="row">
                            <div class="login-content-inner">
                                <div id="customer-login">
                                    <div id="login" class="">
                                        <form method="post" id="customer_login1" accept-charset="UTF-8">
                                            <label for="customer_email" class="label">Email</label>
                                            <input type="email" value="" name="username" id="customer_email" class="text">
                                            <label for="customer_password" class="label">Mật khẩu</label>
                                            <input type="password" value="" name="password" id="customer_password" class="text" size="16">
                                            <div class="action_bottom">
                                                <input class="btn" type="submit" name="submit" value="Đăng nhập">
                                                <a href="./register.php" style="margin-right: 20px;">Đăng kí</a>
                                                <a href="#" onclick="showRecoverPasswordForm();return false;">Bạn quên mật khẩu?</a>
                                            </div>
                                        </form>
                                    </div>
                                    <div id="recover-password" style="display:none;" class="">
                                        <h2>Đặt lại mật khẩu</h2>
                                        <p class="note">Chúng tôi sẽ gửi mật khẩu vào email của bạn.</p>
                                        <form method="post">
                                            <label class="label">Email</label>
                                            <input type="email" value="" size="30" name="email" id="recover-email" class="text">
                                            <div class="action_bottom">
                                                <input class="btn" type="submit" name="forgot" value="Submit"> or
                                                <span class="note"><a href="#" onclick="hideRecoverPasswordForm();return false;">Thoát</a></span>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <?php 
                                include('Auth.php');
                                if (isset($_POST['submit'])) {
                                    $username = mysql_escape_string($_POST['username']);
                                    $password = mysql_escape_string($_POST['password']);
                                    Auth::login($username,$password);
                                    if(isset($_SESSION['cart'])){
                                        header("Location: cart.php");
                                    }
                                }
                                if (isset($_POST['forgot'])) {
                                    include('./mail/send.php');
                                    $password = uniqid();
                                    $to = mysql_escape_string($_POST['email']);
                                    $from = 'lukirito15@gmail.com';
                                    $from_name = 'ESHOP';
                                    $subject = "Resset your password";
                                    $body = "Mật khẩu của bạn là:".$password;
                                    if(smtpmailer($to,$from,$from_name,$subject,$body)){
                                        $pass = crypt($password,'$5$rounds=5000$eshop$');
                                        $sql = "update customer set password ='".$pass."' where email='".$to."'";
                                        db::query($mysqli,$sql);
                                        echo "<h3>Đã gửi thành công</h3>";
                                    }else{
                                        echo "<h3>Gửi gặp lỗi</h3>";
                                    }
                                }
                             ?>
                        </div>
                    </div>
                </div>
            </section>

            <script type="text/javascript">
                function showRecoverPasswordForm() {
                    document.getElementById('recover-password').style.display = 'block';
                    document.getElementById('login').style.display = 'none';
                }

                function hideRecoverPasswordForm() {
                    document.getElementById('recover-password').style.display = 'none';
                    document.getElementById('login').style.display = 'block';
                }

                if (window.location.hash == '#recover') {
                    showRecoverPasswordForm()
                }
            </script>
        </main>
<?php include('pages/footer.php') ?>

<?php ob_end_flush();?>