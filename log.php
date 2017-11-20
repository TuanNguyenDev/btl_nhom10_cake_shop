<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <meta name="viewport" content="width= divice-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="./public/css/login.css">

</head>
<body>
    <div class="login-box">
        <div class="login-content-wrapper">
            <div class="container">
                <div class="row">
                    <div class="login-content-inner">
                        <div id="customer-login">
                            <div class="login-bar">
                                <h3>LOGIN</h3>
                            </div>
                            <div id="login" class="login-box">
                                <form id="customer_login1" method="post" accept-charset="UTF-8">
                                    <div class="email">
                                        <label for="customer_email" class="label">Email</label>
                                        <input type="email" value="" name="username" id="customer_email" class="email1">
                                    </div>      
                                    <div class=password>
                                        <label for="customer_password" class="label">Password</label>
                                        <input type="password" value="" name="password" id="customer_password" class="email1" size="16">
                                    </div>
                                    
                                    <div class="action_bottom">
                                        <input class="btn" type="submit" name="Submit" value="Sign In">
                                        <a href="#" onclick="showRecoverPasswordForm();return false;">Forgot your password?</a>
                                    </div>
                                </form>
                            </div>
                            <div id="recover-password" style="display:none;" class="">
                                <h2>Reset Password</h2>
                                <p class="note">We will send you an email to reset your password.</p>
                                <form method="post">
                                    <input type="hidden" value="recover_customer_password" name="form_type">
                                    <input type="hidden" name="utf8" value="✓">
                                    <div class="email">
                                        <label class="label">Email</label>
                                        <input type="email" value="" size="30" name="email" id="recover-email" class="email">
                                    </div>
                                    
                                    <div class="action_bottom">
                                        <input class="btn" type="submit" value="Submit" name="Submit"> or
                                        <span class="note"><a href="#" onclick="hideRecoverPasswordForm();return false;">Cancel</a></span>
                                    </div>
                                </form>
                            </div>
                            <?php 
                                include('Auth.php');
                                session_start();
                                if (isset($_POST['Submit'])) {
                                    $username = mysql_escape_string($_POST['username']);
                                    $password = mysql_escape_string($_POST['password']);
                                    Auth::login($username,$password);
                                }
                             ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
    
</body>
</html>