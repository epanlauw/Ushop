<?php
    require_once('../controller/user_controller.php');
    $controller = new UserController();
    $valid = $controller->login();
    echo $valid;
?>
<!DOCTYPE html>
<html>
<head>
        <meta charset="UTF-8" />
        <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">  -->
        <title>Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="../favicon.ico">
        <link rel="stylesheet" type="text/css" href="../asset/css/demo.css" />
        <link rel="stylesheet" type="text/css" href="../asset/css/style.css" />
		<link rel="stylesheet" type="text/css" href="../asset/css/animate-custom.css" />
    </head>
    <body>
        <div class="container">
            <!-- Codrops top bar -->
            <div class="codrops-top">
                <span class="right">
                    <a href=" http://tympanus.net/codrops/2012/03/27/login-and-registration-form-with-html5-and-css3/">
                        <strong>Back to the Codrops Article</strong>
                    </a>
                </span>
                <div class="clr"></div>
            </div><!--/ Codrops top bar -->
            <header>
                <h1>Login</h1>
				<nav class="codrops-demos">
					<span>Click <strong>"Join us"</strong></span>
				</nav>
            </header>
            <section>
                <div id="container_demo" >
                    <!-- hidden anchor to stop jump http://www.css3create.com/Astuce-Empecher-le-scroll-avec-l-utilisation-de-target#wrap4  -->
                    <a class="hiddenanchor" id="toregister"></a>
                    <a class="hiddenanchor" id="tologin"></a>
                    <div id="wrapper">
                        <div id="login" class="animate form">
                            <form  action="" method="POST">
                                <h1>Log in</h1>
                                <p>
                                    <label for="username" class="uname" data-icon="u" > ID </label>
                                    <input id="id" name="id" required="required" type="text" placeholder="Insert your ID"/>
                                </p>
                                <p>
                                    <label for="password" class="youpasswd" data-icon="p"> Your password </label>
                                    <input id="password" name="password" required="required" type="password" placeholder="eg. X8df!90EO" />
                                </p>
                                <p class="keeplogin">
              						<input type="checkbox" name="loginkeeping" id="loginkeeping" value="loginkeeping" />
              						<label for="loginkeeping">Keep me logged in</label>
                                </p>
                                <?php if($valid==false){ ?>              
								    <p class='text-danger'>Invalid credentials.</p>              
						        <?php } ?>
                                <p class="login button">
                                    <input type="submit" value="Login" name="login"/>
              					</p>
                                <p class="change_link">
              						Not a member yet ?
              					<a href="../view/signup.php" class="to_register">Join us</a>
              					</p>
                            </form>
                        </div>

                    </div>
                </div>
            </section>
        </div>
    </body>
</html>
