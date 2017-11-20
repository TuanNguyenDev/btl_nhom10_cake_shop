<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<meta name="viewport" content="width= divice-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../public/css/login.css">
</head>
<body>
    <?php 
        
     ?>
	<div class="login-box">
        <div class="login-bar">
            <a href="javascrip:;" style="text-decoration: underline;">LOGIN</a>
        </div>
        <div class="login-form">
           <form method="post">
           		<div class="email">
                    <label class="email-label">Username</label>
                    <input type="text" name="username" class="email" placeholder="Username">
                </div>
                <div class=password>
                    <label class="password-label">Password</label>
                    <input type="password" name="password" class="email" placeholder="Password">
                </div>
                <div class="send">
                    <input type="submit" id="btnlogin" name="submitlogin" value="Login" />
                </div>
           </form>
        </div>
    </div>
    <?php 
        include('Auth.php');
        session_start();
    	if (isset($_POST['submitlogin'])) {
    		# code...
    		$username = mysql_escape_string($_POST['username']);
            $password = mysql_escape_string($_POST['password']);
            if(Auth::login($username,$password)){
                header("Location:index.php");
                
            }else{
                echo "Invalid username or password";
                
            }
    	}
     ?>
</body>
</html>