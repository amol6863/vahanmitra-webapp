<?php 
 include "connection.php";
 if (! isset($_SESSION['COPusername'])):
	header("location:index.php");
endif;
	 
	$output = '';
		if(isset($_POST["searchbox"])){

		$reg_no = mysqli_real_escape_string($db, $_POST["searchbox"]);
 	 $_SESSION['Reg']=$reg_no;	
 echo $reg_no;
 $query = "SELECT * FROM `vehicle_info` WHERE Registration = '$reg_no'";

$result = mysqli_query($db, $query);


if(mysqli_num_rows($result) > 0)
{
 $output .= '
   
        	<h2 class="text-danger text-center">Search Results</h2>
		
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
			';
	 while($row = mysqli_fetch_array($result))
	 	
 	{
 			
  $output .= '	

   				<tr>
    				<td> '.$row['Owner'].'</td>
    				<td> '.$row['Mobile'].'</td>
    				<td> '.$row['Vehicle'].'</td>
    				<td> '.$row['Registration'].'</td>
    				<td> '.$row['Registration_Authority'].'</td>
    				<td> '.$row['Registration Date'].'</td>
    				<td> '.$row['Vehicle Class'].'</td>
    				<td> '.$row['Fuel Type'].'</td>
    				<td> '.$row['Chessis No.'].'</td>
    				<td> '.$row['Engine No.'].'</td>
   				 </tr>
   				';
		 }
		 
 	echo $output;
	}else{
	 echo 'Data Not Found';   
	}

}else{
	echo "r no required";
	}

$output .='
            </table>
            
         ';
   
?>