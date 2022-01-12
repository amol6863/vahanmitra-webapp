<?php 
ob_start();
 include "connection.php";
 if (! isset($_SESSION['ADMINusername'])):
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
	<link rel="stylesheet" type="text/css" href="css/admin.css">
	<link href="https://fonts.googleapis.com/css?family=Nunito:400,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Ubuntu+Condensed" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Viga" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> 
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.min.js"></script>
	<script src="js/jquery-3.3.1.js"></script> 
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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
					<h5 style="color: #fff"><span class="glyphicon glyphicon-user" aria-hidden="true" style="color: orange;"></span> &nbsp Welcome &nbsp <?php echo $_SESSION['ADMINusername']; ?></h5>
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
			<nav class="navbar navbar-default " style="background-color: #9E9E9E;border: none;">
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
           <li class="active"><a href="#">ADMIN</a></li>
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
      <h3>ADMIN Dashboard</h3>
     </section>
    </div>

    <section id="main">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-2">
             <div class="list-group">
              <a href="admin.php" class="list-group-item active main-color-bg">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Dashboard
              </a>
              <a href="#" id="newcop" class="list-group-item"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add COP</a>
             
              <a href="#" class="list-group-item"><span class="glyphicon glyphicon-bullhorn" aria-hidden="true"></span> Broadcast</a>
              <a href="logout.php" class="list-group-item"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Logout</a>
              
            </div>
             
		
          </div>
          <div class="col-md-10">
           <div class="panel panel-default" id="addcop" style="display: none;">
              <div class="panel-heading main-color-bg">
                <h3 class="panel-title">Add COP</h3>
              </div>
              <div class="panel-body text-center">
                <div class="col-md-10">
                 <a href="admin.php" class="end btn btn-danger">&times;</a> <br>
            <form action="" method="POST">
               <div class="box">
            <input type="text" name="badge" placeholder="Badge No" autocomplete="off" required><br>
             </div>
      
          <div class="box">
            <input type="text" name="name" placeholder="Name" required><br>
           </div>
           <div class="box">
            <input type="text" name="rto" placeholder="RTO" required><br>
           </div>
           <div class="box">
            <input type="text" name="rto_code" placeholder="RTO Code" required><br>
           </div>
           <div class="box">
            <input type="text" name="mobile" placeholder="Mobile" required><br>
           </div>
           <div class="box">
            <input type="email" name="mail" placeholder="Email" required><br>
           </div>  
           <div class="box">
            
            <input type="text" name="pass" id="pass" placeholder="Password">
           </div>
           <div class="box">
            <input type="submit" class="btn btn-success" name="add" value="Add COP"><br>
           </div><br>
         </form>
         <button class="btn btn-info" onclick="generatepass()">Generate Password</button>
            </div>
           </div>

        

            <?php 
                  if(isset($_POST['add'])) {

                    $badg = $_POST['badge'];
                    $name = $_POST['name'];
                    $rto = $_POST['rto'];
                    $rtocode = $_POST['rto_code'];
                    $mobile = $_POST['mobile'];
                    $mail = $_POST['mail'];
                    $pass = $_POST['pass'];
                    $addquery = "INSERT INTO `cop_details` (`Badge`, `Name`, `RTO`, `RTO code`, `Mobile`, `Email`, `Password`) VALUES ('$badg', '$name', '$rto', '$rtocode', '$mobile', '$mail', '$pass')";
                    $res = mysqli_query($db,$addquery);
                    if($res){
                      echo "cop added!";
                    }else{
                      echo mysqli_errno($db) . ": " . mysqli_error($db) . "\n";
                    }
                  }
                ?>
              
           </div> 

           <!-- cop details panel -->
           <div class="panel panel-default" id="cop" style="display: none;">
              <div class="panel-heading main-color-bg">
                <h3 class="panel-title">Registered COP's</h3>
              </div>
              <div class="panel-body text-center">
                <div class="col-md-10">
                 <a href="admin.php" class="end btn btn-danger">&times;</a> <br>
                 <div id="copdetail"></div>
              </div>
              </div>
          </div>  


            
            <!-- Website Overview -->
            <div class="panel panel-default">
              <div class="panel-heading main-color-bg">
                <h3 class="panel-title">Overview</h3>
              </div>
              <div class="panel-body" style="background: #cfd8dc">
                <div class="col-md-3"> <a href="#" id="copdetails" >
                  <div class="well dash-box" style="background: #00796B;">
                  	<?php 
                  	$copquery = "SELECT * FROM `cop_details`";
                  	$res = mysqli_query($db,$copquery);
                  	$copcount = mysqli_num_rows($res);
                  	?>
                    <h2><span class="glyphicon glyphicon-user" aria-hidden="true"></span> &nbsp <?php echo $copcount; ?></h2>
                    <h4>COP's Registered</h4>
                  </div>
                </div> </a>
                <div class="col-md-3">
                  <div class="well dash-box" style="background: #FF5252;">
                  	<?php 
                  	$offquery = "SELECT * FROM `offences` WHERE Status = 'Active'";
                  	$rest = mysqli_query($db,$offquery);
                  	$offcount = mysqli_num_rows($rest);
                  	?>
                    <h2><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> &nbsp <?php echo $offcount; ?></h2>
                    <h4>Active Offences</h4>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="well dash-box" style="background: #FFC107;">
                    <h2><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> &nbsp 33</h2>
                    <h4>Posts</h4>
                  </div>
                </div>
              </div>
              </div>
            </div>
          </div>
       </div>
       </div>
     </div>
     </div>
    </div>
  </section>
      <div class="container-fluid">
              <div class="row">
                <div class="search col-sm-8  text-right">
                  <input type="text" name="search_text" placeholder="search.." id="search_text" autocomplete="off" style="border: 2px solid">
                 </div>
                </div><br>
                <div class="row">
                <div id="results"></div>
                </div>
                <div class="row" style="margin-top: 20px;">
                  &nbsp &nbsp<a href="download.php" class="btn btn-primary">Download Report</a>&nbsp &nbsp
                  <button class="btn btn-primary" id="showrange">Download Custom Report</button>&nbsp &nbsp
                  <button class="btn btn-primary" id="badgefield">Download COP wise Report</button>&nbsp &nbsp <br><br>
                  <form method="POST" action="download.php" id="badgeForm" style="display: none;">&nbsp &nbsp
                    <label>Enter Badge No.</label>
                    <input type="text" name="badge_field" placeholder="Badge No." required>
                    <input type="submit" class="btn btn-success" name="sub_badge" value="Download">
                  </form><br>
                
                </div>
                <div class="row" id="daterow"  class="text-center" style="display: none;">
                  <form method="POST" action="download.php">&nbsp &nbsp
                    <label>from</label>
                    <input type="Date" name="from" placeholder="yyyy-mm-dd" required>
                    <label>to</label>
                    <input type="Date" name="to" placeholder="yyyy-mm-dd" required>
                    <input type="submit" class="btn btn-success" name="subdate" value="Download">
                  </form>
                </div>

           </div> <br><br>

  

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


       <div class="modal fade" id="mymodal" role="dialog" style="margin-top: 50px; background: black">
      <div class="modal-dialog modal">
       
          <div class="modal-body" style="background: black">
          <div id="mdl">

          	 </div>
         
      </div>
     </div>
     <!-- modal end--> 


	
	<script type="text/javascript">
		function showtable(){
			document.getElementById('tablerow').style.display="block";
		}
	</script>
	
	<script type="text/javascript">
	function getCurrentDate(){
				var curDate=new Date().toLocaleString();
				document.getElementById("date").innerHTML = curDate.toString();
			}
			setInterval(getCurrentDate, 1000);
</script>
</body>
</html>

<script>
  $("#newcop").on('click', function() {
    document.getElementById("addcop").style.display = "block";
    
});
</script>

<script>
  function generatepass() {
    
    var length = 8,
        charset = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789@#$%&*",
        retVal = "";
    for (var i = 0, n = charset.length; i < length; ++i) {
        retVal += charset.charAt(Math.floor(Math.random() * n));
    }
    document.getElementById("pass").value = retVal;
}

</script>


     <script>
$(document).ready(function(){

 load_data();
});
 function load_data(query)
 {
  $.ajax({
   url:"admfetch.php",
   method:"POST",
   data:{query:query},
   success:function(data)
   {
    $('#results').html(data);
   }
  });
 }

 $('#search_text').keyup(function(){
  var search = $(this).val();
  if(search != '')
  {
   load_data(search);
  }
  else
  {
   load_data();
  }
 });
function deleterec(deleteid){
	bootbox.confirm("Are you sure want to delete?", function(result) {
    if(result){
		$.ajax({
			url:"admfetch.php",
			type:"POST",
			data:{deleteid:deleteid},
			success:function(data,status){
				load_data();
			}
		});
  }
});
	}

function updaterec(id){
  bootbox.confirm("Are you sure want to close?", function(result1) {
    if(result1){
		$.ajax({
			url:"admfetch.php",
			type:"POST",
			data:{id:id},
			success:function(data,status){
				load_data();
			}
		});
    }
});
}

function viewrec(viewid){
	
  
  $.ajax({
			url:"viewEvidence.php",
			type:"POST",
			data:{viewid:viewid},
			success:function(data,status){
				$('#mymodal').html(data);	
			}
		});
  
}



 $('#copdetails').click(function(){ 
    $.ajax({
      url:"copdetails.php",
      type:"POST",
      data:{},
      success:function(data,status){
        $('#copdetail').html(data); 
         document.getElementById("cop").style.display="block";
      }
    });
 });


 
</script>

<script type="text/javascript">
$("#showrange").on('click', function() {
   $("#daterow").toggle();  
});</script>

<script type="text/javascript">
$("#badgefield").on('click', function() {
  $("form").toggle();  
});</script>


