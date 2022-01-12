<?php 
 include "connection.php";
 if (! isset($_SESSION['ADMINusername'])):
	header("location:index.php");
endif;

	$output = '';
  $query = "SELECT `Badge`, `Name`, `RTO`, `RTO code`, `Mobile`, `Email` FROM `cop_details`";
  $result = mysqli_query($db,$query);
  if (!$result) {
    echo mysqli_errno($db) . ": " . mysqli_error($db) . "\n";
}
   if(mysqli_num_rows($result) > 0)
{
 $output .= '
  <div class="table-responsive  header-fixed text-center" id="result" style="overflow-y:auto; max-height: 500px;">
                <table class="table table-bordered table-hover">
                      <tr>
   
    <th>Badge No.</th>
     <th>Name</th>
    <th>RTO</th>
    <th>RTO Code</th>
    <th>Mobile</th>
    <th>Email</th>
  </tr>
 ';
  while($row = mysqli_fetch_array($result))
 {
 
  $output .= '

   <tr>
     <form action="" method="POST">
     
      <td>'.$row["Badge"].'</td>
      <td>'.$row["Name"].'</td>
      <td>'.$row["RTO"].'</td>
      <td>'.$row["RTO code"].'</td>
      <td>'.$row["Mobile"].'</td>
      <td>'.$row["Email"].'</td>
     </form>
    </tr>
   
  ';
 }
 echo $output;
}
else
{
 echo 'Data Not Found';   
}

$output .='
            </table>
            </div';


?>