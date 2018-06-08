<?php
require('includes/db.php');

if (isset($_POST['submit'])) {
    if (empty($_POST['username']) || empty($_POST['password'])) {
        $error = "username or password is empty";
    } else { 
        // Save username & password in a variable
        $username = $_POST['username'];
        $password = $_POST['password'];

        // 2. Prepare query
        $query  = "SELECT username, password "; 
        $query .= "FROM traveler ";
        $query .= "WHERE username = '$username' AND password = '$password' ";
        
        
        // 2. Execute query
        $result = mysqli_query($connection, $query);

        if (!$result) {
            die("query is wrong");
        }

        // Check how many rows are selected
        $numrows=mysqli_num_rows($result);
        if ($numrows == 1) {
            // Start to use sessions
            session_start();
            
            $row = mysqli_fetch_array($result);
            
            // Create session variable
            $_SESSION['login_user'] = $username;
            
            header('Location: booking.php');
        
        }
        else {
            echo "Login failed";
        }
        
        // 4. free results
        mysqli_free_result($result);
    }
}

// 5. close db connection
mysqli_close($connection);

?>

            <?php

            if (isset($error)) {
                echo "<span>" . $error ."</span>";
            }

            ?>


<!DOCTYPE html>
<!-- html -->
<html>
<!-- head -->
<head>
<title>Sichuan Airline</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" /><!-- bootstrap-CSS -->
<link href="css/font-awesome.css" rel="stylesheet" type="text/css" media="all" /><!-- Fontawesome-CSS -->
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script type='text/javascript' src='js/jquery-2.2.3.min.js'></script>
<!-- Custom Theme files -->
<link href="css/menu.css" rel="stylesheet" type="text/css" media="all" /> <!-- menu style --> 
<!--theme-style-->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />	
<!--//theme-style-->
<link rel="stylesheet" type="text/css" href="css/easy-responsive-tabs.css " />
<!--meta data-->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="utf-8">
<meta name="keywords" content="Match Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, Sony Ericsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--//meta data-->
<!-- online fonts -->
<link href="http://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700&amp;subset=devanagari,latin-ext" rel="stylesheet">
<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese" rel="stylesheet">
<!-- /online fonts -->
<!-- nav smooth scroll -->
<script>
$(document).ready(function(){
    $(".dropdown").hover(            
        function() {
            $('.dropdown-menu', this).stop( true, true ).slideDown("fast");
            $(this).toggleClass('open');        
        },
        function() {
            $('.dropdown-menu', this).stop( true, true ).slideUp("fast");
            $(this).toggleClass('open');       
        }
    );
});
</script>	
<!-- //nav smooth scroll -->			
<!-- Calendar -->
	<link rel="stylesheet" href="css/jquery-ui.css" />
	<script src="js/jquery-ui.js"></script>
		<script>
		  $(function() {
			$( "#datepicker" ).datepicker();
		 });
		</script>
<!-- //Calendar -->			
<link rel="stylesheet" href="css/intlTelInput.css">
</head>
<!-- //head -->
<!-- body -->
<body>

<!-- header -->

<!-- /header -->

<div class="w3layouts-banner" id="home">
<div class="container registerbox">
	
	<div class="clearfix"></div>
	<div class="agileits-register" style="margin-right: 320px; margin-top: 160px; height: 500px; ">
		<h3>login by employee</h3>
        <div style="">
        <a class="d-block small mt-3" href="e_login.php">*  employee</a>
        <a class="d-block small mt-3" href="login.php" style="margin-left: 150px; padding-left: 80px;">* customer</a>
        </div>
		<form action="#" method="post">
				
				<div class="w3_modal_body_grid w3_modal_body_grid1">
					<p>username:</p>
					<input type="text" name="username" placeholder="Username">
				</div>
				<div class="w3_modal_body_grid w3_modal_body_grid1">
					<p>Password:</p>
					<input type="password" name="password" placeholder="Password">
				</div>
				<input type="submit" name="submit" value="login" style="margin-right: 30px;margin-top: 20px;padding-left: 160px;padding-right: 160px;border-right-width: 0px;" />
             <div class="text-center" style="margin-top: 100px;">
          
                 <a class="d-block small mt-3" href="register.php">Register an Account</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <a class="d-block small" href="forgot-password.php">Forgot Password?</a>
            
        </div>
				
			</form>
		</div>
		<!-- Modal -->
				<div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
				  <div class="modal-dialog">
					<!-- Modal content-->
					<div class="modal-content">
					  <div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>		
						<h4 class="modal-title">Login to Continue</h4>
					  </div>
					  <div class="modal-body">
						<div class="login-w3ls">
							<form id="signin" action="#" method="post">
								<label>User Name </label>
								<input type="text" name="User Name" placeholder="Username" required="">
								<label>Password</label>
								<input type="password" name="Password" placeholder="Password" required="">	
								<div class="w3ls-loginr"> 
									<input type="checkbox" id="brand" name="checkbox" value="">
									<span> Remember me ?</span> 
									<a href="#">Forgot password ?</a>
								</div>
								<div class="clearfix"> </div>
								<input type="submit" name="submit" value="Login">
								<div class="clearfix"> </div>
								<div class="social-icons">
									<ul>  
										<li><a href="#"><span class="icons"><i class="fa fa-facebook" aria-hidden="true"></i></span><span class="text">Facebook</span></a></li> 
										<li class="twt"><a href="#"><span class="icons"><i class="fa fa-twitter" aria-hidden="true"></i></span><span class="text">Twitter</span></a></li>  
									</ul> 
									<div class="clearfix"> </div>
								</div>	
							</form>
						</div>
					  </div>
					</div>
				  </div>
				</div>
				<!-- //Modal -->
	</div>
</div>

	


<!-- //footer -->	
<!-- menu js aim -->
	<script src="js/jquery.menu-aim.js"> </script>
	<script src="js/main.js"></script> <!-- Resource jQuery -->
	<!-- //menu js aim -->
	<!-- for bootstrap working -->
		<script src="js/bootstrap.js"></script>
<!-- //for bootstrap working -->
	<script type="text/javascript">
		$(document).ready(function() {
			/*
			var defaults = {
	  			containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
	 		};
			*/
			
			$().UItoTop({ easingType: 'easeOutQuart' });
							
		});
	</script>
	<a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
	<!-- for smooth scrolling -->
	<script type="text/javascript" src="js/move-top.js"></script>
	<script type="text/javascript" src="js/easing.js"></script>
	<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
	</script>
	<!-- //for smooth scrolling -->

</body>
<!-- //body -->
</html>
<!-- //html -->
