
<?php
include "connection.php"
?>

<!DOCTYPE html>
<html>
<head>
	<title>Search Results</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-compatible" content="IE-edge">
	<meta name="viewport" content="width=device-width">
	<link href="https://fonts.googleapis.com/css?family=Nunito:400,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Ubuntu+Condensed" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Viga" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"> 
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>
<body>

	<?php
		$reg_no="";
		if (isset($_POST['search'])) {
		$reg_no = $_POST['searchbox'];
		$query="SELECT `Owner`, `Vehicle`, `Registration`, `Registration_Authority`, `Registration Date`, `Vehicle Class`, `Fuel Type`, `Chessis No.`, `Engine No.` FROM `vehicle_info` WHERE Registration = '$reg_no'";
        $result=mysqli_query($db,$query);
     }
    ?>

	<div class="container-fluid">
		<h2 class="text-danger text-center">Search Results</h2>
		<table class="table table-responsive table-bordered">
			<thead>
				<tr class="bg-dark" style="color: #fff;">
					<th class="text-center">Owner</th>
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
			<tbody>
				<?php
	                while($row = mysqli_fetch_array($result)) {
                ?>
				<tr>
    				<td><?php echo $row['Owner']; ?></td>
    				<td><?php echo $row['Vehicle']; ?></td>
    				<td><?php echo $row['Registration']; ?></td>
    				<td><?php echo $row['Registration_Authority']; ?></td>
    				<td><?php echo $row['Registration Date']; ?></td>
    				<td><?php echo $row['Vehicle Class']; ?></td>
    				<td><?php echo $row['Fuel Type']; ?></td>
    				<td><?php echo $row['Chessis No.']; ?></td>
    				<td><?php echo $row['Engine No.']; ?></td>
   				 </tr>
   				 <?php
				}
   				?>
			</tbody>
		</table>
	</div>

</body>
</html>