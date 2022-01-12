<?php
ob_start();
ini_set('display_errors', 0);
error_reporting(E_ERROR | E_WARNING | E_PARSE); 
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
	<link href="https://fonts.googleapis.com/css?family=Nunito:400,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Ubuntu+Condensed" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Viga" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> 
	<script src="sweetalert/sweetalert2.min.js"></script> 
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="sweetalert/sweetalert2.css">

</head>
<body onload="getCurrentDate()">
	<!-- header -->
	<div class="container-fluid top-bar sticky-top">
		<div class="container">
			<div class="row">
				<div class="col-sm-4  text-left">
					<h5 id="date" style="color: #fff; font-weight: bold;"></h5>
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
			<nav class="navbar navbar-default"style="background-color: #9E9E9E;border: none;">
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
	</div> <!--row end -->
	</div><!-- container-fluid end -->

	<div class="container text-center">
	<section class="breadcrumb">
      <h3>COP Dashboard</h3>
     </section>
    </div>

     <section id="main">
      <div class="container">
        <div class="row">
          <div class="col-md-3">
            <div class="list-group">
              <a href="#" class="list-group-item active main-color-bg">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Dashboard
              </a>
              <a href="reports.php" class="list-group-item"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> View Reports</a>
              <a href="profile.php" class="list-group-item"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Profile</a>
              <a href="logout.php" class="list-group-item"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Logout</a>
              
            </div>
           </div>
           <div class="col-md-9">
             <div class="panel panel-default">
              <div class="panel-heading main-color-bg">
                <h3 class="panel-title">Overview</h3>              
              </div>
              <div class="panel-body" style="background: #cfd8dc">
                <div class="col-md-3">
                  <div class="well dash-box" style="background: #00796B;  width: 240px;">
                  	<?php 
                  	$bdgc = $_SESSION['badge'];
                  	$copquery = "SELECT COUNT(*) AS total FROM `offences` WHERE Badge = '$bdgc' AND Status = 'Active'";
                  	$res = mysqli_query($db,$copquery);
                  	$rowc = mysqli_fetch_assoc($res);
                  	?>
                    <h2><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> &nbsp <?php echo $rowc['total']; ?></h2>
                    <h4>Active Offences</h4>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="well dash-box" style="background: #FF5252;  width: 240px; margin-left: 70px;">
                  	<?php 
                  	
                  	$copquery = "SELECT COUNT(*) AS total FROM `offences` WHERE Badge = '$bdgc' AND Status ='Closed'";
                  	$res = mysqli_query($db,$copquery);
                  	$rowc = mysqli_fetch_assoc($res);
                  	?>
                    <h2><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> &nbsp <?php echo $rowc['total']; ?></h2>
                    <h4>Self Closed Offences</h4>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="well dash-box" style="background: #FFC107; width: 250px; margin-left: 140px;">
                  	<?php 
                  	
                  	$copquery = "SELECT COUNT(*) AS total FROM `offences` WHERE Badge = '$bdgc' AND Status ='Closed (admin)'";
                  	$res = mysqli_query($db,$copquery);
                  	$rowc = mysqli_fetch_assoc($res);
                  	?>
                    <h2><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> &nbsp <?php echo $rowc['total']; ?></h2>
                    <h4>Admin Closed Offences</h4>
                  </div>
                </div>
            </div>
        </div>
        </div>
      </div>
     </section>


	<div class="container fluid">
		<div class="row" style="margin-top: 50px;">
			<div class="text-center">
				<form action="" method="POST" style="font-size: 20px;">
					<input type="text" class="srch" name="searchbox" id="searchbox" placeholder="eg. MH50J2098" autocomplete="off" required>
					<button class="btn btn-info" name="submitVeh" id="submitVeh">Search</button>
		<!--	<input type="submit" name="submitVeh" id="submitVeh" value="search">  -->
				</form>
				<?php 
 					if (isset($_POST['submitVeh'])) {
 						$srch = $_POST['searchbox'];
 						$_SESSION['srchVEH'] = $srch;
 						$queryy = "SELECT * FROM `vehicle_info` WHERE Registration = '$srch'";

						$result = mysqli_query($db, $queryy);
						if(mysqli_num_rows($result) > 0)
							{  ?>
 
   
        						<h2 class="text-danger text-center">Search Results</h2>
								<div class="table-responsive">
								<table class="table table-bordered">
								<thead>
								<tr class="bg-dark" style="color: #000000;">
									<th class="text-center">Owner</th>
									<th class="text-center">Mobile</th>
									<th class="text-center">Vehicle</th>
									<th class="text-center">Registration No.</th>
									<th class="text-center">Registration Authority</th>
									<th class="text-center">Registration Date</th>
									<th class="text-center">Vehicle Class</th>
									<th class="text-center">Fuel Type</th>
									<th class="text-center">Chessis No.</th>
									<th class="text-center">Engine No.</th>
								</tr>
							</thead>	
							<?php
						 while($row = mysqli_fetch_array($result))
						 	
					 	{  ?>

					   				<tr>
					    				<td><?php echo $row["Owner"]; ?></td>
					    				<td><?php echo $row["Mobile"]; ?></td>
					    				<td><?php echo $row["Vehicle"]; ?></td>
					    				<td><?php echo $row["Registration"]; ?></td>
					    				<td><?php echo $row["Registration_Authority"]; ?></td>
					    				<td><?php echo $row["Registration Date"]; ?></td>
					    				<td><?php echo $row["Vehicle Class"]; ?></td>
					    				<td><?php echo $row["Fuel Type"]; ?></td>
					    				<td><?php echo $row["Chessis No."]; ?></td>
					    				<td><?php echo $row["Engine No."]; ?></td>
					   				 </tr>

					   				<?php
					   				$_SESSION['r_no'] = $row["Registration"];
							 $_SESSION['mobile'] = $row["Mobile"];
							 }
							 
							 
						}else{
						 echo 'Data Not Found';   
						}

					} ?>
					      </table>
					       </div>     
					   </div>
			
		</div>
		<div class="container">
	    <div class="row" style="background-color: lightgray; margin-top: 30px;">
		    <div class="col-sm-5 text-center">
				<img src="images/report.png" class="img-responsive" style="margin-top: 10px; margin-left: 40%;">
				<h3>Report Offence</h3>
			</div>
			<div class="col-sm-7 text-left">
				<h4 class="text-alert text-center">NOTE</h4>
				<ul>
					<li><p>Search for victim vehicles registration number.</p></li>
					<li><p>Choose from the offences category.</p></li>
					<li><p>Briefly explain offence details.</p></li>
					<li><p>You can also upload photo evidance.</p></li>
					<li><p>Add offence location.</p></li>
					<li><p>Receive penalty either ONLINE or enter challan receipt no.</p></li>
					<li><p>Finally submit offence report.</p></li>
					<li><p>On submit vehicle owner will receive an SMS regarding offence.</p></li>
				</ul>
			</div>	<!--col-sm-7 end -->
		</div>
		</div><!--row end -->
	</div> <!-- container fluid end -->
	<div class="container">
	<div class="row text-left" style="margin-top: 80px; background: ;">
		
				<div class="containerr">
					<section>
		              <h3>Fill Up Details</h3> 
		          <form action="" method="POST" enctype="multipart/form-data">
			         <div class="box">
			         	<h4><span><img src="images/reg.png"></span>&nbsp Registration No.</h4>
						<input type="text" name="regn" placeholder="Search Above" value="<?php echo $_SESSION['srchVEH']; ?>" disabled><br><br>
					</div>
					<div class="box">
						
						<h4><span><img src="images/location.png"></span>Penalty</h4>
						
						<a href="PaytmKit/TxnTest.php" style="margin-left: 150px;
											font-size: 20px;">Proceed to Pay Online</a><br><br>
											<?php
											$txnID = $_GET["txn"];
											  ?>
							</div>
						<div class="box">					  	
						<h4 style="font-size: 18px; letter-spacing: 0px;">Transaction ID :</h4>
						<input style="letter-spacing: 0px;" type="text" name="tID" value="<?php echo $txnID; ?>" >
					
						<h4 style="margin-left: 125px">OR</h4>
					</div>
					<div class="box">
						<h4><span><img src="images/location.png"></span>Challan</h4>
						<input type="text" name="receipt" placeholder="receipt no." >
					</div> 
					<div class="box">
						<h4><span><img src="images/category.png"></span>&nbsp Offence Category</h4>
						<select class="dropdown" name="category">
							<option>Parking Offences</option>
							<option>Licence Offences</option>
							<option>Driving Offences</option>
							<option>Driving Restrictions</option>
							<option>Pollution Offences</option>
							<option>Loading of Goods Offences</option>
							<option>Offences Relating to Conduct of PSV</option>
						</select><br>
						
					</div>
					<div class="box">
						<h4><span><img src="images/desc.png"></span>&nbsp Description</h4>
						<textarea cols="10" rows="5" name="description" placeholder="type here" required></textarea>
					</div>
					<div class="box">
						<h4><span><img src="images/pic.png"></span>&nbsp Choose Photo</h4>
						<input type="file" class="file" name="Evidance">
					</div>
					<div class="box">
						<h4><span><img src="images/location.png"></span>Location</h4>
						<input type="text" name="Loc" placeholder="location" required>
					</div>
					
					<input type="submit" class="btn btn-danger" name="submitReport" value="Report Now"><br>
					<h5 style="color: gray;">* once lodging report, vehicle owner will receive SMS regarding offence.</h5>
				</form>
			</section>

			 <?php 
		 	  
		 	 
      if(isset($_POST['submitReport'])) {
      	  $reg = $_SESSION['srchVEH'];
		  $cop = $_SESSION['COPusername'];
          $badge = $_SESSION['badge']; 
      	  $file = $_FILES['Evidance'];
      	  $filename = $file['name'];
      	  $tempname = $file['tmp_name']; 
      	  $category = $_POST['category']; 
      	  $description = $_POST['description'];
      	  $location = $_POST['Loc'];
      	  $Txn = $_POST['tID'];
      	  $challan = $_POST['receipt'];
      	  $text = explode(".", $filename);
      	  $checkfile = strtolower(end($text));
      	  $extention = array('png', 'jpg', 'jpeg');

      	  if (in_array($checkfile, $extention)) {
      	  	  $folder = "Evidance/".$filename;
      	  	  move_uploaded_file($tempname, $folder);   

      	  	 } 
      	  	$sql = "INSERT INTO `offences`(`Raised_By`, `Badge`, `Owner`, `Contact`, `Vehicle`, `Registration`, `Registration_Authority`, `Offence Category`, `Description`, `Location`, `Img`, `Evidence`, `Status`, `Transaction_ID`, `Challan`) SELECT '$cop', '$badge',  Owner , Mobile , Vehicle  , Registration , Registration_Authority, '$category', '$description', '$location', '$filename', '$folder', 'Active', '$Txn', '$challan' FROM vehicle_info WHERE vehicle_info.Registration =  '$reg'"; 
          
           $res = mysqli_query($db,$sql); 	
             
           if (!$res) {
           		echo mysqli_errno($db) . ": " . mysqli_error($db) . "\n";
           		
           }else if($category == "Parking Offences"){
           	 /*TEXTLOCAL */ 
          /*  require('textlocal.class.php');
          	$reg = $_SESSION['r_no'];
			$textlocal = new Textlocal(false, false, 'JMpw1lxS3Bk-QA6NzT08H6qJN0xiPr0niemsalbCeU');
			$contact = $_SESSION['mobile'];
			$numbers = array($contact);
			$sender = 'TXTLCL';
			$message = "Your vehicle " . $reg . " is liable for violation of Motor Vehicle Act. For more details kindly reach to nearest RTO or call: +91 216 255004";

			try {
    			$result = $textlocal->sendSms($numbers, $message, $sender);
    			
				} catch (Exception $e) {
    				die('Error: ' . $e->getMessage());
				} */

           }else {
          		echo "<script>Swal.fire('done...', 'offence reported successfully!', 'success');</script>";
          }

          
         }
       ?>

    </div>	<!-- containerr end -->
	</div><!--row end -->
	</div><!-- container fluid end -->

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

	
	<script type="text/javascript">
	/*	function showtable(){
			document.getElementById('tablerow').style.display="block";
		}*/
	</script>

<!--	<script>
	$(document).ready(function(){
		$('#submitVeh').click(function(){
		
			var searchvehicle = $('#searchbox').val();
			$.ajax({
 			 	 url:"vehiclefetch.php",
  				 method:"POST",
  				 data:{searchvehicle:searchvehicle},
   				success:function(data,status)
  				 {
  				  $('#showtable').html(data);
  				}
 			 });
		}

	});	
	</script> -->

	<script>
		$('#pay').click(function(){
			var amount = $('#amount').val();
			$.ajax({
				url:"PaytmKit/TxnTest.php",
				method:"POST",
				data:{amount:amount},
				success:function(data){
					 alert "payment success";
				}
			})
		});
	</script>
	
	<script type="text/javascript">
	function getCurrentDate(){
				var curDate=new Date().toLocaleString();
				document.getElementById("date").innerHTML = curDate.toString();
			}
			setInterval(getCurrentDate, 1000);
</script>
<script type="text/javascript">
	function show(){
    		Swal.fire({
 				 type: 'error',
 				 title: 'Oops...',
 				 text: 'Something went wrong!',
})
</script>

</body>
</html>