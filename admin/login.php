
<?php require_once ("../classes/adminlogin.php"); ?>

<?php

    $al = new AdminLogin();

    if(($_SERVER["REQUEST_METHOD"]) == "POST"){

        $userName = $_POST["userName"];
        $userPass = md5($_POST["userPass"]);
        $loginCheck = $al->adminLogin($userName,$userPass);

    }

?>

<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/stylelogin.css" media="screen" />
</head>
<body>
<div class="container">
	<section id="content">
		<form action="login.php" method="post">
			<h1>Admin Login</h1>
            <span style="color: red">
                <?php
                    if(isset($loginCheck)){
                        echo $loginCheck;
                    }

                ?>
            </span>
			<div>
				<input type="text" placeholder="Username"  name="userName"/>
			</div>
			<div>
				<input type="password" placeholder="Password" name="userPass"/>
			</div>
			<div>
				<input type="submit" value="Log in" />
			</div>
		</form><!-- form -->
		<div class="button">
			<a href="#">Training with live project</a>
		</div><!-- button -->
	</section><!-- content -->
</div><!-- container -->
</body>
</html>