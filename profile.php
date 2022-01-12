<?php 
 include "connection.php";
 if (! isset($_SESSION['COPusername'])):
	header("location:index.php");
endif;
?>

<!DOCTYPE html>
<html>
<head>
	<title>Vahanmitra</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-compatible" content="IE-edge">
	<meta name="viewport" content="width=device-width">
	<link rel="stylesheet" type="text/css" href="css/cop.css">
	<link rel="stylesheet" type="text/css" href="css/reports.css">
	<link href="https://fonts.googleapis.com/css?family=Nunito:400,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Ubuntu+Condensed" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Viga" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> 
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="js/jquery-3.3.1.js"></script> 
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<style type="text/css">
		#rw {
			font-size: 18px;
			border: none;
		}
	</style>
	

</head>
<body onload="getCurrentDate()">
	<!-- header -->
	<div class="container-fluid top-bar">
		<div class="container">
			<div class="row">
				<div class="col-sm-4  text-left">
					<h5 id="date" style="color: #fff;"></h5>
				</div>
				<div class="col-sm-7 text-right">
					<h5 style="color: #fff"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> &nbsp Welcome &nbsp <?php echo $_SESSION['COPusername']; ?></h5>
				</div>
				<div class="col-sm-1 text-right">
					<a href="logout.php" class="btn btn-danger">Log Out</a>
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
			<nav class="navbar navbar-default pull-right" style="background-color: #9E9E9E;border: none;">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mynav">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span></button>
				</div>
				<div class="collapse navbar-collapse" id="mynav">
				<ul class="nav navbar-nav text-center">
				   <li><a href="index.php">HOME</a></li>
				   <li><a href="portfolio/dist/index.html" target="_blank">PORTFOLIO</a></li>
				   <li><a href="about.php">ABOUT</a></li>
				   <li><a href="contact.php">CONTACTS</a></li>
			    </ul>
			</div> <!--mynav end -->
			</nav>
			</div>
		</div><!--row end -->
	</div><!-- container-fluid end -->

	<div class="container text-center">
	<section class="breadcrumb">
      <h3> COP Dashboard</h3>
     </section>
    </div>

    <section id="main">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-2">
             <div class="list-group">
              <a href="cop.php" class="list-group-item active main-color-bg">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Dashboard
              </a>
              <a href="reports.php" class="list-group-item"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> View Reports</a>
              <a href="profile.php" class="list-group-item active" style="background: gray;"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Profile</a>
              <a href="logout.php" class="list-group-item"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Logout</a>
              
            </div>
             <div class="well">
              <img src="images/report.png" class="img-responsive">
          </div>
		
          </div>
          <div class="col-md-10">
            <!-- Website Overview -->
            <div class="panel panel-default">
              <div class="panel-heading main-color-bg">
                <h3 class="panel-title">Profile</h3>
              </div>
              <div class="panel-body" style="background: #cfd8dc">
                <div class="row">
                      <div class="col-sm-12  text-center">

                      	<?php
                      	$badge = $_SESSION['badge'];
                      	$sql = "SELECT * FROM `cop_details` WHERE Badge = '$badge'";
                      	$rslt = mysqli_query($db,$sql); ?>
                      	<img src="images/cop.png" class="img-circle" width="180" height="180" style="background: lightgray;"> 
                      	<div class="table-responsive">
						<table id="tbl" class="table table-bordered" style="border-collapse: collapse;">
							<?php
							while($row = mysqli_fetch_array($rslt)){ ?>
								<tr id="rw" class="success">
									<th class="text-center">Name</th>
									<td><?php echo $row['Name']; ?></td>
								</tr>
								<tr id="rw" class="danger">
									<th class="text-center">Badge No.</th>
									<td><?php echo $row['Badge']; ?></td>
								</tr>
								<tr id="rw" class="info">
									<th class="text-center">RTO</th>
									<td><?php echo $row['RTO']; ?></td>
								</tr>
								<tr id="rw" class="warning">
									<th class="text-center">RTO Code</th>
									<td><?php echo $row['RTO code']; ?></td>
								</tr>
								<tr id="rw" class="active">
									<th class="text-center">Mobile No.</th>
									<td><?php echo $row['Mobile']; ?></td>
								</tr>
								<tr id="rw" class="success">
									<th class="text-center">Email</th>
									<td><?php echo $row['Email']; ?></td>
								</tr>
							</table>
						</div>
							<?php
                      		 }
							?>

				
				</div>
                </div><br>
                

        </div>
       </div>

       </div>
     </div>
    </div>
  </section>

<!-- footer area -->	
     <div class="container-fluid footer">
     	<div class="container">
     		<div class="col-sm-4 text-center">
     			<img src="images/mah.png" class="img-responsive">
     			<p>Copyrights © AB Creatives 2019</p>
     			<p>All Rights Reserved</p>
     		</div>
     		<div class="col-sm-4">
     			<h3>Quick Links</h3>
     			<ul class="social">
     				<li><a href=""><i class="fa fa-facebook-square" aria-hidden="true"></i></a></li>
     				<li><a href="#"><i class="fa fa-twitter-square" aria-hidden="true"></i></a></li>
     				<li><a href="#"><i class="fa fa-google-plus-square" aria-hidden="true"></i></a></li>
     				<li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
     				<li><a href="#"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a></li>
     			</ul>
     		</div>
     		<div class="col-sm-4">
     			<h3>Contact</h3>
     			<h4>Transport Commissioner Office</h4>
     			<p>New Administrative Bldg., 4th Floor Near Govt. Colony, Opp. Dr. Babasaheb Ambedkar Garden, Bandra (East), Mumbai - 400 051.</p>
     			<p>Enquiry Phone: 022-26550932 / 33 / 34 Ext. 216</p>
     			<p>Fax No: 022-26414901</p>
     		</div>
     	</div><!--container end -->
     </div><!--container-fluid end -->
     <!-- footer area end-->



 <script>
	function getCurrentDate(){
				var curDate=new Date().toLocaleString();
				document.getElementById("date").innerHTML = curDate.toString();
			}
			setInterval(getCurrentDate, 1000);
</script>
</body>
</html>