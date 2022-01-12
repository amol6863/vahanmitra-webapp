<?php
include "connection.php";
if (! isset($_SESSION['COPusername'])):
  header("location:index.php");
endif;

$output = '';
  $cop = $_SESSION['badge'];
if(isset($_POST["query"]))
{

 $search = mysqli_real_escape_string($db, $_POST["query"]);

 $query = "SELECT `ID`,`Owner`,`Contact`, `Vehicle`, `Registration`, `offence_Date`, `Description`, `Location`,`Status` FROM `offences` WHERE Badge = '$cop' AND offence_Date LIKE '%".$search."%'
  OR Owner LIKE '%".$search."%'
  OR Vehicle LIKE '%".$search."%'
  OR Registration LIKE '%".$search."%'
  OR Description LIKE '%".$search."%'
  OR Location LIKE '%".$search."%'
  OR Status LIKE '%".$search."%'
 ";
}
else
{
 $query = "SELECT `ID`,`Owner`,`Contact`, `Vehicle`, `Registration`, `offence_Date`, `Description`, `Location`,`Status` FROM `offences` WHERE Badge = '$cop' ORDER BY UNIX_TIMESTAMP(offence_Date) DESC ";
}
$result = mysqli_query($db, $query);
if (!$result) {
    echo mysqli_errno($db) . ": " . mysqli_error($db) . "\n";
}
if(mysqli_num_rows($result) > 0)
{
 $output .= '
  <div class="table-responsive  header-fixed text-center" id="result" style="overflow-y:auto; max-height: 500px;">
                <table class="table table-bordered table-hover">
                      <tr class="text-center" style="background-color: #333333; color: #fff;">
    <th>Offence Date</th>
    <th>Owner Name</th>
    <th>Mobile</th>
    <th>Vehicle Name</th>
    <th>Registration No.</th>
    <th>Description</th>
    <th>Location</th>
    <th>Status</th>
    <th colspan="2">Actions</th>
  </tr>
 ';
 while($row = mysqli_fetch_array($result))
 {
 
  $output .= '

   <tr>
     <form action="actions.php" method="POST">
      <input type="hidden" name="id" value='.$row["ID"].'> 
      <td>'.$row["offence_Date"].'</td>
      <td>'.$row["Owner"].'</td>
      <td>'.$row["Contact"].'</td>
      <td>'.$row["Vehicle"].'</td>
      <td>'.$row["Registration"].'</td>
      <td>'.$row["Description"].'</td>
      <td>'.$row["Location"].'</td>
      <td>'.$row["Status"].'</td>
      <td><button class="btn btn-sm" style="background-color: yellow; color: black;"  onclick="updaterec('.$row["ID"].')"><span class="glyphicon glyphicon-remove"></span>&nbsp CLOSE</button></td>
      <td><button class="btn btn-sm" style="background-color: red; color: white;" onclick="deleterec('.$row["ID"].')"><span class="glyphicon glyphicon-trash"></span>&nbsp DELETE</button></td>
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

      ///delete record
      if (isset($_POST['deleteid'])) {
         $recordid = $_POST['deleteid'];
         $deletequery = "DELETE FROM `offences` WHERE ID='$recordid'";
         mysqli_query($db,$deletequery);
      }


      ///update status
      if (isset($_POST['id'])) {
         $updateid = $_POST['id'];
         $updatequery = "UPDATE `offences` SET `Status`='Closed' WHERE ID = $updateid";
         mysqli_query($db,$updatequery);
      }

?>