<?php
session_start();
//include("functions/function.php");
include("admin_content/connect.php");
?>

<!DOCTYPE html>
<html lang="en">
    <head>


        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Login | BnG</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/font-awesome.min.css" rel="stylesheet">
        <link href="css/prettyPhoto.css" rel="stylesheet">
        <link href="css/price-range.css" rel="stylesheet">
        <link href="css/animate.css" rel="stylesheet">
        <link href="css/main.css" rel="stylesheet">
        <link href="css/responsive.css" rel="stylesheet">
        <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        <script src="js/respond.min.js"></script>
        <![endif]-->       
        <link rel="shortcut icon" href="images/ico/favicon.ico">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">





        <script>
            /* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */



function validpass()
{
    var password = document.getElementById("Password").value;
    var pattern = /^[a-zA-Z0-9]*$/;
    if (password === null || password === "")
    {
        document.getElementById("perror").innerHTML = "<font color=red>Please enter a password</font>";
        return false;
    }
   
    else if (!pattern.test(password))
    {
        document.getElementById("perror").innerHTML = "<font color=red>Password doesnot allow special characters</font>";
        return false;
    }
	 else{
 
 document.getElementById("perror").innerHTML = "";
 return true;}

}




function validemail() {
    var x = document.getElementById("Email").value;
    var pattern = /^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/;
    if (x === "" || x === null)
    {
        document.getElementById("emerror").innerHTML = "<font color='red'>Email address cannot be empty</font>";
        return false;
    } else if (!pattern.test(x))
    {
        document.getElementById("emerror").innerHTML = "<font color='red'>Please enter valid Email Address</font>";
        return false;
    } else {
        document.getElementById("emerror").innerHTML = "";
        return  true;
    }

}

function finalValidation()
{
    if (validfname() == true && validlname() == true && validpass() == true && validemail() == true)
    {
        return true;
    } else
    {
        alert("Please fill in mandatory fields to proceed further");
        return false;

    }


}


        </script>  




    </head><!--/head-->

    <body>

        <header id="header"><!--header-->
            <div class="header_top"><!--header_top-->
                <div class="container">
                    <div class="row">

                    </div>
                </div>
            </div><!--/header_top-->

            <div class="header-middle"><!--header-middle-->
                <div class="container">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="logo pull-left">
                                <a href="index.php"><img src="images/home/logo.png" alt="" /></a>
                            </div>

                        </div>
                        <div class="col-sm-8">
                            <div class="shop-menu pull-right">
                                <ul class="nav navbar-nav">

									<li><a href="account.php"><i class="fa fa-user"></i> Account</a></li>
                                    <li><a href="cart.php"><i class="fa fa-shopping-cart"></i> Cart</a></li>
                                   <?php 
					if(!isset($_SESSION['email'])){
					
					echo "<li><a href='checkout.php'><i class='fa fa-lock'></i>Login</a></li>";
					
					}
					else {
					echo "<li><a href='logout.php'><i class='fa fa-lock'></i>Logout</a></li>";
					}
					
					
					
					?>
                                    <li><a href="register.php" class="active">Signup</a></li>
                                </ul>
                            </div>
							<?php 
					if(isset($_SESSION['email'])){
					echo "<b>Welcome:</b>" . $_SESSION['email'] ;
					}
					else {
					echo "<b>Welcome Guest!</b>";
					}
					?>
                        </div>
                    </div>
                </div>
            </div><!--/header-middle-->

            <div class="header-bottom"><!--header-bottom-->
                <div class="container">
                    <div class="row">
                        <div class="col-sm-9">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </div>
                            <div class="mainmenu pull-left">
                                <ul class="nav navbar-nav collapse navbar-collapse">
                                    <li><a href="index.php">Home</a></li>
                                    <li class="dropdown"><a href="books.php">Books</a>

                                    </li> 
                                    <li class="dropdown"><a href="gadgets.php">Gadgets</a>

                                    </li> 

                                    <li><a href="contact-us.html">Contact</a></li>
                                </ul>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div><!--/header-bottom-->
        </header><!--/header-->
		<?php if (isset($_SESSION['regerrors'])): ?>
    <div class="form-errors">
        <?php foreach($_SESSION['regerrors'] as $error): ?>
            <p><?php echo $error ?></p>
        <?php endforeach; ?>
    </div>
<?php endif; ?>
<?php session_unset();
session_destroy();?>
        <section id="form"><!--form-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="signup-form"><!--sign up form-->
                            <h2>New User Signup!</h2>
                            <form method="post" action="registerdb.php" name="form" onsubmit="return finalValidation()">
                                <table cellspacing=20>
                                    
                                    <tr><td>Email id:</td><td><input type="email" name="Email" placeholder="Enter Email Address" required maxlength="200" id="Email" onblur="return validemail()" ></td><td><span id="emerror"></span></td></tr>
                                    <tr><td>Password:</td><td><input type="password" name="Password" placeholder="Enter Password" required maxlength="300" id="Password" onblur="return validpass()" ></td><td><span id="perror"></span> </td></tr>
                                    <tr><td><button type="submit" class="btn btn-default" name="Subbutton">Signup</button></td>
									 &nbsp; &nbsp; &nbsp;<td><button type="reset" class="btn btn-default" name="Subbutton">Reset</button></td></tr>
                                </table>
                            </form>
                        </div><!--/sign up form-->
                    </div>
                </div>
            </div> 	
        </section><!--/form-->

        <script src="js/jquery.js"></script>
        <script src="js/price-range.js"></script>
        <script src="js/jquery.scrollUp.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery.prettyPhoto.js"></script>
        <script src="js/main.js"></script>
    </body>
</html>
