<?php 
ob_start();
ini_set('display_errors', 0);
error_reporting(E_ERROR | E_WARNING | E_PARSE);
  include "connection.php";
?>


<!DOCTYPE html>
<html>
<head>
	<title>Vahanmitra</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-compatible" content="IE-edge">
	<meta name="viewport" content="width=device-width">
	<link rel="shortcut icon" type="image/ico" href="images/favicon.ico">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Nunito:400,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Ubuntu+Condensed" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Viga" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> 
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="sweetalert/sweetalert2.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="sweetalert/sweetalert2.css">
	<link rel="stylesheet" type="text/css" href="vendor/aos.css">

</head>
<body onload="getCurrentDate(); ">
	
	<!-- header -->
	<div class="container-fluid top-bar">
		<div class="container">
			<div class="row">
				<div class="col-sm-4  text-left">
					<h5 id="date" style="color: #fff;"></h5>
				</div>
				<div class="col-sm-4  text-right" data-aos="fade-left">
					<form class="srch" method="POST" action="results.php">
					<input type="text" name="searchbox" placeholder="eg. MH50J2098" autocomplete="off" required>
					<input type="submit" class="color" name="search" value="Search">
				</form>
				</div>
				<div class="col-sm-4 text-right">
					<?php 
					$csession = $_SESSION['COPusername'];
					$asession = $_SESSION['ADMINusername'];
					if ($csession) { ?>
						<h5 style="color: #fff"><span class="glyphicon glyphicon-user" aria-hidden="true" style="color: orange;"></span> &nbsp Welcome &nbsp <a href="cop.php" style="text-decoration: none; color: orange;"><?php echo $_SESSION['COPusername']; ?></a> </h5>
						<a href="logout.php" class="btn btn-danger">Logout</a> <?php
					}elseif($asession) { ?>
						<h5 style="color: #fff"><span class="glyphicon glyphicon-user" aria-hidden="true" style="color: orange;"></span> &nbsp Welcome &nbsp<a href="admin.php" style="text-decoration: none; color: orange;"><?php echo $_SESSION['ADMINusername']; ?></a></h5> 
						<a href="logout.php" class="btn btn-danger">Logout</a> <?php
				} else { ?>
						<h5 style="color: #fff"><span class="glyphicon glyphicon-user" aria-hidden="true" style="color: orange;"></span> &nbsp Welcome &nbsp guest</h5> <?php
					}
				 ?>
				
				</div>
			</div>  <!--row end -->
		</div> <!--container end -->
	</div> <!-- container-fluid end -->

	<div class="container-fluid">
		<div class="row" style="background-color: #9E9E9E"> 
			<div class="col-sm-1">
				<img src="images/logosmall.png" alt="" class="img-responsive" style="margin-top: 10px;">
			</div>
			<div class="col-sm-5">
				<h1 class="title">Vahan Mitra</h1>
				<h4 class="sub">Ministry of Road Transport & Highways</h4>
			</div>
			<div class="col-sm-6 menu">
			<nav class="navbar navbar-default" style="background-color: #9E9E9E;border: none;">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mynav">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span></button>
				</div>
				<div class="collapse navbar-collapse" id="mynav">
				<ul class="nav navbar-nav text-center">
				   <li class="active"><a href="#">HOME</a></li>
				   <li><a href="portfolio/dist/index.html" target="_blank">PORTFOLIO</a></li>
				   <li><a data-toggle="modal" href="#mymodal">ADMIN</a></li> 
				   <li><a href="about.php">ABOUT</a></li>
				   <li><a href="contact.php">CONTACTS</a></li>
			    </ul>
			</div> <!--mynav end -->
			</nav>
			</div>
	</div> <!--row end -->
	</div><!-- container-fluid end -->

	<!-- header end -->

	<!-- slider area -->
	<div class="container-fluid">
  	<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
      <li data-target="#myCarousel" data-slide-to="3"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      <div class="item active">
        <img src="images/wpolice.jpg" alt="Los Angeles" style="width:100%;">
      </div>

      <div class="item">
        <img src="images/02 (Custom).jpg" alt="Chicago" style="width:100%;"> 
      </div>
    
      <div class="item">
        <img src="images/rsz_pred.jpg" alt="New york" style="width:100%;">
    </div>

    <div class="item">
        <img src="images/cmpg1.jpg" alt="New york" style="width:100%;">
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>
</div> 
	<!-- slider area end -->

	<!-- login area -->
	<div class="container" style="margin-top: 30px;">
		<div class="row" style="background: #9E9E9E;">
			<div class="col-sm-4  text-center" style="margin-top: 50px;" data-aos="fade-up" data-aos-once="true">
				<img src="images/cop.png" alt="" class="img-responsive">
				<h3>Registered COP's</h3>
				<h4>Log In Here</h4>
			</div><!--col4 end -->

			<div class="col-sm-8">
				<div class="containerr" data-aos="fade-up" data-aos-once="true">
		            <h3>Log In</h3>
		          <form action="" method="POST">
			         <div class="box">
						<input type="text" name="badge" id="cbadge" placeholder="Badge No" autocomplete="off" required><br>
						
					</div>
			
					<div class="box">
						<input type="Password" name="password" id="cpass" placeholder="Password" required><br>
						
					</div>
					<div class="box">
						<input type="submit" name="loginC" value="Log In" onclick="aalert()">
						
					</div>
					<a data-toggle="modal" href="#passmodal">Forgot Password ?</a>
				</form>
		<?php 
		if (isset($_POST['loginC'])) {
			if ($csession) {
				echo "<script>Swal.fire('Oops...', 'session is already running!', 'error');</script>";
			}else {
			$badge = trim(mysqli_real_escape_string($db, $_POST['badge']));
			$password = trim(mysqli_real_escape_string($db, $_POST['password']));
			$query = mysqli_query($db , "SELECT * FROM `cop_details` WHERE Badge = '$badge' && Password = '$password'");
			if (mysqli_num_rows($query) == 1) {
				$row = mysqli_fetch_array($query);
				$user = $row['Name'];
				$badge = $row['Badge'];
				$_SESSION['badge'] = $badge;
				$_SESSION['COPusername'] = $user;
				header("location:cop.php");
			} else {
				echo "<script>Swal.fire('Oops...', 'Invalid credentials!', 'error');</script>";
				}
			}
		}
	 ?>   
    
	</div>
			</div><!--col8 end -->
		</div><!--row end -->
	</div><!--container end -->
	<!-- login area end -->

	<!-- content area -->
	<div class="container">
		<div class="row" style="background: #9E9E9E;">
			<div class="col-sm-4 text-center" data-aos="fade-up" data-aos-once="true">
				<img src="images/QR.jpg" alt="" class="img-responsive">
				<h3>RTO Maharashtra App</h3>
				<h4>Download it from GOOGLE PLAY</h4>
			</div>
			<div class="col-sm-4 text-center" data-aos="fade-up" data-aos-once="true">
				<img src="images/signs.png" class="img-responsive">
				<h3>Follow Traffic Rules</h3>
				<h4>Be a Good Citizen</h4>
			</div>
			<div class="col-sm-4 text-center" data-aos="fade-up" data-aos-once="true">
				<img src="images/helmet.png" class="img-responsive">
				<h3>Always Wear Helmet</h3>
				<h4>Be Safe !</h4>
			</div>
		</div><!--row end -->
	</div><!--container end -->
	<!-- content area end -->

	<!-- chart area -->
	
	<div class="container" style="margin-top: 50px;">
		<div class="row">
			<div class="col-sm-6">
				<img src="images/road_accident.jpg" class="img-responsive" width="95%" style="margin-left: 20px;">
			</div>
			<div class="col-sm-5 text-left">
				<h2 style="margin-left: 80px;"><u>Our Goals</u></h2> 
   		<ul class="goals" style="list-style: disc;">
   			<li><h3>Reduce Road Accidents</h3></li>
   			<li><h3>Road Safety Awareness Programs</h3></li>
   			<li><h3>Maintain Road Safety Laws</h3></li>
   			<li><h3>Assisting citizens by responding to emergency calls</h3></li>
   		</ul>
			</div>
		</div><!--row end -->
	</div><!--container-fluid end -->
	
	<!--chart area end -->

    <!-- team area  -->	
    <div class="container team" data-aos="fade-right" data-aos-once="true">
    	<div class="row">
    		<h2 class="text-center">Honourable Ministers</h2>
    		<div class="col-xs-6 text-center">
    			<div class="thumbnail" style="background: #F5F5F5">
    			<img src="images/cm.jpg" alt="" class="img-responsive">
				<h4>Shri Devendra Fadnavis</h4>
				<h5>Hon. Chief Minister, Maharashtra State</h5>
				</div>
    		</div>
    		<div class="col-xs-6 text-center">
    			<div class="thumbnail" style="background: #F5F5F5">
    			<img src="images/raote.jpg" alt="" class="img-responsive">
				<h4>Shri Diwakar Raote</h4>
				<h5>Hon. Minister Transport and Khar Land Development, Maharashtra State </h5>
				</div>
    		</div>
    		<div class="col-xs-6 text-center">
    			<div class="thumbnail" style="background: #F5F5F5">
    			<img src="images/deshmukh.jpg" alt="" class="img-responsive">
				<h4>Shri Vijay Deshmukh</h4>
				<h5>Hon. Minister of State for Public Health, Transport, Labour, State Excise, Maharashtra State </h5>
				</div>
    		</div>
    		<div class="col-xs-6 text-center">
    			<div class="thumbnail" style="background: #F5F5F5"><br>
    			<img src="images/channe.jpg" alt="" class="img-responsive"><br>
				<h4>Shri Shekhar Channe, IAS </h4>
				<h5>Transport Commissioner, Maharashtra State</h5>
				</div>
    		</div>
    	</div><!--row end -->
    	<button onclick="topFunction()" id="myBtn" title="Go to top">
    	    	<span class="glyphicon glyphicon-arrow-up"></span> </button>
    </div><!--container end -->

    <!-- team area end -->	

     <!-- footer area -->	
     <div class="container-fluid footer">
     	<div class="container">
     		<div class="col-sm-4 text-center" data-aos="fade-in" data-aos-once="true">
     			<img src="images/mah.png" class="img-responsive">
     			<p>Copyrights © AB Creatives 2019</p>
     			<p>All Rights Reserved</p>
     		</div>
     		<div class="col-sm-4" data-aos="fade-in" data-aos-once="true">
     			<h3>Quick Links</h3>
     			<ul class="social">
     				<li><a href=""><i class="fa fa-facebook-square" aria-hidden="true"></i></a></li>
     				<li><a href="#"><i class="fa fa-twitter-square" aria-hidden="true"></i></a></li>
     				<li><a href="#"><i class="fa fa-google-plus-square" aria-hidden="true"></i></a></li>
     				<li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
     				<li><a href="#"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a></li>
     			</ul>
     		</div>
     		<div class="col-sm-4" data-aos="fade-in" data-aos-once="true">
     			<h3>Contact</h3>
     			<h4>Transport Commissioner Office</h4>
     			<p>New Administrative Bldg., 4th Floor Near Govt. Colony, Opp. Dr. Babasaheb Ambedkar Garden, Bandra (East), Mumbai - 400 051.</p>
     			<p>Enquiry Phone: 022-26550932 / 33 / 34 Ext. 216</p>
     			<p>Fax No: 022-26414901</p>
     		</div>
     	</div><!--container end -->
     </div><!--container-fluid end -->
     <!-- footer area end-->

     <!-- modal-->

     <div class="modal fade" id="mymodal" role="dialog">
     	<div class="modal-dialog moda">
     		<div class="modal-content">
     			<div class="modal-header">
     				<button class="close" data-dismiss="modal">&times;</button>
     				<h3 class="modal-title text-center">Admin Log In</h3>
     				
     			</div>
     			<div class="modal-body">
     			<div class="container1">
				<form action="" method="POST">
					<div class="box1">
						<input type="text" name="Badge" placeholder="Badge No" required autocomplete="off" autofocus="on"><br>
						<span>
 						<i class="fas fa-id-badge"></i>
						</span>
					</div>
					<div class="box1">
						<input type="Password" name="Password" placeholder="Password" required><br>
						<span>
						<i class="fas fa-unlock-alt"></i>
						</span>
					</div>
					<div class="box1">
						<input type="submit" name="login" value="Log In">
					</div>
				</form>
				<?php 
					if (isset($_POST['login'])) {
						if ($asession) {
				echo "<script>Swal.fire('Oops...', 'session is already running!', 'error');</script>";
						}else {
					$badge = trim(mysqli_real_escape_string($db, $_POST['Badge']));
					$password = trim(mysqli_real_escape_string($db, $_POST['Password']));
					$query = mysqli_query($db , "SELECT * FROM `admin_details` WHERE Badge_n = '$badge' && Password = '$password'");
					if (mysqli_num_rows($query) == 1) {
					$row = mysqli_fetch_array($query);
					$user = $row['Name'];
					$admin = $row['badge'];
					$_SESSION['ADMINusername'] = $user;
					$_SESSION['ADbadge'] = $admin;
					header("location:admin.php");
					} else {
						echo "<script>Swal.fire('Oops...', 'Invalid credentials!', 'error');</script>";
						}
					  }
				    }
				 ?> 
			</div>
     			</div>
     			
     		</div>
     	</div>
     </div>
     <!-- modal end-->

      <!-- password modal-->

     <div class="modal fade" id="passmodal" role="dialog">
     	<div class="modal-dialog moda">
     		<div class="modal-content">
     			<div class="modal-header" style="background: red;">
     				<button class="close" data-dismiss="modal">&times;</button>
     				<h3 class="modal-title text-center" style="color: #fff;">Password Reset</h3>
     				
     			</div>
     			<div class="modal-body">
     			<div class="container1">
				<form>
					<div id="bdg">
					<div class="box1">
						<input type="text" name="badge1" placeholder="Badge No" id="badgetxt" required autocomplete="off" autofocus><br>
						
					</div>
					<div class="box1">
						<input type="button" name="badgeno" value="submit" id="submit1">
					</div>
					<p id="error"></p>
					<p id="results"></p>
					</div>
					</form>
					<form>
					<div id="otp" style="display: none;">
						<h5 style="color: red; margin-left: 70px;">OTP has been send to mobile number registered with entered badge.</h5> 
						<div class="box1">
						<input type="text" name="otptxt" placeholder="Enter OTP" id="otptxt" autocomplete="off" required><br><br>
						<input type="text" name="passtxt" placeholder="Set Password" id="passtxt" autocomplete="off" required><br>
						<h5 style="color: gray; margin-left: 70px">* password length should be atleast 6 characters.</h5>
						</div>
					<button class="btn btn-primary text-right" style="margin-left: 250px;" name="verify"
						 id="verify">submit</button>
						 <p id="res"></p>
					</div>
				</form>
				
				
				</div>
     			</div>
     			
     		</div>
     	</div>
     </div>
     <!-- modal end-->



<script type="text/javascript">
	function getCurrentDate(){
				var curDate=new Date().toLocaleString();
				document.getElementById("date").innerHTML = curDate.toString();
			}
			setInterval(getCurrentDate, 1000);
</script>

<script>
	function aalert(){
		var cbadge = $('#cbadge').val();
		var cpass = $('#cpass').val();
		if (cbadge==''|| cpass=='') {
			Swal.fire('Oops...', 'specify all fields!', 'error');
		}
	}



	$(document).ready(function(){

		$('#submit1').click(function(){
		var bd = $('#badgetxt').val();

		if (bd == '') {
			Swal.fire('Oops...', 'specify all fields!', 'error');
			
		}else{
		 $.ajax({
 			 	 url:"otp.php",
  				 method:"POST",
  				 data:{bd:bd},
   				success:function(data)
  				 {
  				  $('#results').html(data);
  				  document.getElementById("bdg").style.display="none";
  				  document.getElementById("otp").style.display="block";
   				}
 			 });
		}

		});

		$('#verify').click(function(){
		var otptxt = $('#otptxt').val();
		var passtxt = $('#passtxt').val();
		 $.ajax({
 			 	 url:"otp.php",
  				 method:"POST",
  				 data:{otptxt:otptxt, passtxt:passtxt},
   				success:function(data)
  				 {
  				  $('#res').html(data);
  				
   				}
 			 });
		 e.preventDefault();
		});


	});

</script> 
<script type="text/javascript">
    	function show(){
    		Swal.fire({
 				 type: 'error',
 				 title: 'Oops...',
 				 text: 'Something went wrong!',
})

    	}
    </script>
   
    <script src="vendor/aos.js" type="text/javascript"></script>
    <script>
  		AOS.init({
  			duration: 1000,
  		});
	</script>
	<script>
// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    document.getElementById("myBtn").style.display = "block";
  } else {
    document.getElementById("myBtn").style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}
</script>
</body>
</html>