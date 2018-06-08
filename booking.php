<?php

// make db conection
require('includes/db.php');

// Check if person is logged in
require('includes/logincheck.php');
// 3. AFter click button, use POST data to add student
if (isset($_POST['submit'])) {
    $payment = $_POST['payment'];
    $date = $_POST['date'];
    $flightid = $_POST['flightid'];
    $travelerd = $_POST['travelerid'];
    $seatid = $_POST['seatid'];
    $ordersid = $_POST['ordersid'];
    $price = $_POST['price'];
    
// Insert student into database
    $query  = "INSERT INTO orders ( payment, date )";
    $query .= "VALUES ('$payment', '$date' )";
   $last_id = mysqli_insert_id($connection);

    $result = mysqli_query($connection, $query);
    if (!$result) {
        die("query is wrong");
    }
    
    
    $query  = "INSERT INTO tickets ( flightid, travelerid, seatid, orders_id, price )";
    $query .= "VALUES ('$flightid', '$travelerid', '$seatid', '$last_id', '$price' )";
    echo $query;

    $result = mysqli_query($connection, $query);
    if (!$result) {
        die("query is wrong");
    }
    
    
    // Go back to students.php
    header('Location: app.php');
  
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
</head>
<!-- //head -->
<!-- body -->
<body >
<!-- header -->

<header>
	<!--  Navigation Start -->
 <div class="navbar navbar-inverse-blue navbar">
    <!--<div class="navbar navbar-inverse-blue navbar-fixed-top">-->
      <div class="navbar-inner">
        <div class="container">
          <div class="menu">
					<div class="cd-dropdown-wrapper">
						<a class="cd-dropdown-trigger" href="#0">Sichuan Airline</a>
						
					</div> <!-- .cd-dropdown-wrapper -->	 
				</div>
            <div class="pull-right">
          	<nav class="navbar nav_bottom" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
		  <div class="navbar-header nav_2">
		      <button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">Menu
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		      </button>
		   </div> 
		   <!-- Collect the nav links, forms, and other content for toggling -->
		    <div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
		        <ul class="nav navbar-nav nav_1">
		            <li><a href="homepage.php">Home</a></li>
		            <li><a href="about.php">About</a></li>
		            <li><a href="app.php">Flights</a></li>
					<li class="last"><a href="contact.php">Contacts</a></li>
                    <li class="last"><a href="logout.php" style="margin-left: 80px;">Logout!</a></li>
		        </ul>
		     </div><!-- /.navbar-collapse -->
		    </nav>
		   </div> <!-- end pull-right -->
          <div class="clearfix"> </div>
        </div> <!-- end container -->
      </div> <!-- end navbar-inner -->
    </div> <!-- end navbar-inverse-blue -->
<!--  Navigation End -->
</header>
<!-- /header -->

	<!-- inner banner -->	
	<div class="w3layouts-inner-banner">
	<div class="container">
		<div class="logo">
			<h1><a class="cd-logo link link--takiri" href="index.php">Dream <span><i class="fa fa-heart" aria-hidden="true"></i>I believe - I can fly.</span></a></h1>
		</div>
		<div class="clearfix"></div>
		</div>
	</div>
	<!-- //inner banner -->	
	

<div class="w3ls-list">
    
		<div class="container">
		<h2 style=" padding-right: 250px; ">Creat your order</h2>
		<div class="col-md-9 profiles-list-agileits">
		<!--Horizontal Tab-->
			<div id="parentHorizontalTab">
				<ul class="resp-tabs-list hor_1">
				</ul>
				<div class="resp-tabs-container hor_1">
					<div>	
						<div class="w3_regular_search">
							<form action="booking.php" method="post">	   
							
                        <div class="form_but1">
								<label class="col-sm-5 control-label1" for="sex">payment : </label>
								<div class="col-sm-7 form_radios">
								  <div class="select-block1">
									<select name="payment" style=" width: 364px; height: 31px;">
                                        <option value ="cash">Cash</option>
                                        <option value ="bank">Bank</option>
                                        <option value ="card">Card</option>
                                        <option value ="alipay">Alipay</option>
                                        <option value ="wecaht">Wechat</option>
                                      </select>
                                   
 	
								  </div>
								</div>
								<div class="clearfix"> </div>
							  </div>
                        <div class="form_but1">
								<label class="col-sm-5 control-label1" for="sex">date: </label>
								<div class="col-sm-7 form_radios">
								  <div class="select-block1">
									
                                   <input type="datetime-local" name="date" placeholder="date" style=" width: 364px; height: 31px; "> 
 	
								  </div>
								</div>
								<div class="clearfix"> </div>
							  </div>
                        <div class="form_but1">
								<label class="col-sm-5 control-label1" for="sex">flightid: </label>
								<div class="col-sm-7 form_radios">
								  <div class="select-block1">
									
                                  <input type="text" name="flightid" placeholder="flightid" style=" width: 364px; height: 31px;"> <br/>    
 	
								  </div>
								</div>
								<div class="clearfix"> </div>
							  </div>
                        <div class="form_but1">
								<label class="col-sm-5 control-label1" for="sex">travelid: </label>
								<div class="col-sm-7 form_radios">
								  <div class="select-block1">
									
                                  <input type="text" name="travelerid" placeholder="travelerid" style=" width: 364px; height: 31px;"> <br/>    
 	
								  </div>
								</div>
								<div class="clearfix"> </div>
							  </div>
                        <div class="form_but1">
								<label class="col-sm-5 control-label1" for="sex">seatid: </label>
								<div class="col-sm-7 form_radios">
								  <div class="select-block1">
									
                                  <input type="text" name="seatid" placeholder="seatid" style=" width: 364px; height: 31px;"> <br/>   
 	
								  </div>
								</div>
								<div class="clearfix"> </div>
							  </div>
                        <div class="form_but1">
								<label class="col-sm-5 control-label1" for="sex">ordersid: </label>
								<div class="col-sm-7 form_radios">
								  <div class="select-block1">
									
                                  <input type="text" name="ordersid" placeholder="ordersid" style=" width: 364px; height: 31px;"> <br/>   
 	
								  </div>
								</div>
								<div class="clearfix"> </div>
							  </div>
                        <div class="form_but1">
								<label class="col-sm-5 control-label1" for="sex">price: </label>
								<div class="col-sm-7 form_radios">
								  <div class="select-block1">
									
                                   <input type="text" name="price" placeholder="price" style=" width: 364px; height: 31px;"> <br/>     
 	
								  </div>
								</div>
								<div class="clearfix"> </div>
							  </div>  
                            
                         <input type="submit" name="submit" value="submit">
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
        
	
	</div>
	</div>
      

	<!-- Search form -->
	
	<script src="js/easyResponsiveTabs.js"></script>
	<script type="text/javascript">
		$(document).ready(function () {

			$('#parentHorizontalTab').easyResponsiveTabs({
				type: 'default', //Types: default, vertical, accordion
				width: 'auto', //auto or any width like 600px
				fit: true, // 100% fit in a container
				closed: 'accordion', // Start closed if in accordion view
				tabidentify: 'hor_1', // The tab groups identifier
				activate: function (event) { // Callback function if tab is switched
					var $tab = $(this);
					var $info = $('#nested-tabInfo');
					var $name = $('span', $info);
		
					$name.text($tab.text());
		
					$info.show();
				}
			});
	 
		});
	</script>
	<!-- //Search form -->
	
	<!-- browse profiles -->
	
	<!-- //browse profiles -->

	<!-- Get started -->
	<div class="w3layous-story text-center">
		<div class="container">
			<h4>Your story is waiting to happen!  <a href="index.php">Get started</a></h4>
		</div>
	</div>
	<!-- //Get started -->
	
<!-- footer -->
<footer>
	<div class="footer">
		<div class="container">
			<div class="footer-info w3-agileits-info">
				<div class="col-md-4 address-left agileinfo">
					<div class="footer-logo header-logo">
						<h6>Get in Touch.</h6>
					</div>
					<ul>
						<li><i class="fa fa-map-marker"></i> 123 San Sebastian, New York City USA.</li>
						<li><i class="fa fa-mobile"></i> 333 222 3333 </li>
						<li><i class="fa fa-phone"></i> +222 11 4444 </li>
						<li><i class="fa fa-envelope-o"></i> <a href="mailto:example@mail.com"> mail@example.com</a></li>
					</ul> 
				</div>
				<div class="col-md-8 address-right">
					<div class="col-md-4 footer-grids">
						<h3>Company</h3>
						<ul>
							<li><a href="about.php">About Us</a></li>
							<li><a href="feedback.php">Feedback</a></li>  
							<li><a href="help.php">Help</a></li>  
							<li><a href="tips.php">Safety Tips</a></li>
							<li><a href="typo.php">Typography</a></li>
							<li><a href="icons.php">Icons Page</a></li>
						</ul>
					</div>
					<div class="col-md-4 footer-grids">
						<h3>Quick links</h3>
						<ul>
							<li><a href="terms.php">Terms of use</a></li>
							<li><a href="privacy_policy.php">Privacy Policy</a></li>
							<li><a href="contact.php">Contact Us</a></li>
							<li><a href="faq.php">FAQ</a></li>
							<li><a href="sitemap.php">Sitemap</a></li>
						</ul> 
					</div>
					<div class="col-md-4 footer-grids">
						<h3>Follow Us on</h3>
						<section class="social">
                        <ul>
							<li><a class="icon fb" href="#"><i class="fa fa-facebook"></i></a></li>
							<li><a class="icon tw" href="#"><i class="fa fa-twitter"></i></a></li>	
							<li><a class="icon gp" href="#"><i class="fa fa-google-plus"></i></a></li>
						</ul>
						</section>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>	
	<div class="copy-right"> 
		<div class="container">
			<p>Copyright &copy; 2017.Company name All rights reserved.<a target="_blank" href="http://php.cn">php中文网</a></p>
		</div>
	</div> 
</footer>
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
