
<?php
include "connection.php";
if (! isset($_SESSION['ADMINusername'])):
  header("location:index.php");
endif;

    $output = '';
    $output2 = '';
  $admin = $_SESSION['ADbadge'];
  echo $admin;
if(isset($_POST["query"]))
{

         $search = mysqli_real_escape_string($db, $_POST["query"]);

         $query = "SELECT * FROM `offences` WHERE offence_Date LIKE '%".$search."%'
          OR Owner LIKE '%".$search."%'
          OR Vehicle LIKE '%".$search."%'
          OR Registration LIKE '%".$search."%'
          OR Description LIKE '%".$search."%'
          OR Location LIKE '%".$search."%'
          OR Status LIKE '%".$search."%'
          OR Challan LIKE '%".$search."%'
          OR Transaction_ID LIKE '%".$search."%'
         ";
}
else{
      $query = "SELECT * FROM `offences`  ORDER BY UNIX_TIMESTAMP(offence_Date) DESC ";
      }
    $result = mysqli_query($db, $query);
            if (!$result) {
                echo mysqli_errno($db) . ": " . mysqli_error($db) . "\n";
            }
if(mysqli_num_rows($result) > 0)
{
           $output .= '
            <div class="table-responsive text-center" id="result" style="overflow-y:auto; max-height: 500px;">
                          <table class="table table-bordered table-hover header-fixed">
                                <tr class="text-center" style="background-color: #333333; color: #fff; font-size: 18px;">
             
              <th>Offence Date</th>
               <th>Raised By</th>
              <th>Badge No.</th>
              <th>Owner Name</th>
              <th>Mobile</th>
              <th>Vehicle Name</th>
              <th>Registration No.</th>
              <th>Offence Category</th>
              <th>Description</th>
              <th>Location</th>
              <th>Status</th>
              <th>Transaction ID</th>
              <th>Challan No.</th>
              <th colspan="3">Actions</th>
            </tr>
           ';
     while($row = mysqli_fetch_array($result))
     {
 
        $output .= '

         <tr>
           <form action="actions.php" method="POST">
            <input type="hidden" name="id" value='.$row["ID"].'> 
            <td>'.$row["offence_Date"].'</td>
            <td>'.$row["Raised_By"].'</td>
            <td>'.$row["Badge"].'</td>
            <td>'.$row["Owner"].'</td>
            <td>'.$row["Contact"].'</td>
            <td>'.$row["Vehicle"].'</td>
            <td>'.$row["Registration"].'</td>
            <td>'.$row["Offence Category"].'</td>
            <td>'.$row["Description"].'</td>
            <td>'.$row["Location"].'</td>
            <td>'.$row["Status"].'</td>
            <td>'.$row["Transaction_ID"].'</td>
            <td>'.$row["Challan"].'</td>
            <td><button class="btn btn-md" style="background-color: #0288D1; color: white;" data-target="#mymodal" data-toggle="modal" onclick="viewrec('.$row["ID"].')"><span class="glyphicon glyphicon-eye-open"></span>&nbsp VIEW</button></td>
            <td><button class="btn btn-md" style="background-color: yellow; color: black;" onclick="updaterec('.$row["ID"].')"><span class="glyphicon glyphicon-remove"></span>&nbsp CLOSE</button></td>
            <td><button class="btn btn-md"  style="background-color: red; color: white;" onclick="deleterec('.$row["ID"].')"><span class="glyphicon glyphicon-trash"></span>&nbsp DELETE</button></td>
            </form>
            </tr>
         
        ';
       }
    echo $output;
  }else
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
         $updatequery = "UPDATE `offences` SET `Status`='Closed (admin)' WHERE ID = $updateid";
         mysqli_query($db,$updatequery);
      }
      

       ///view report
      if (isset($_POST['viewid'])) {
         $viewid = $_POST['viewid'];
         $viewquery = "SELECT `Img`, `Evidence` FROM offences WHERE ID = $viewid";
        $result3 =  mysqli_query($db,$viewquery);
        
         while ($row3 = mysqli_fetch_array($result3)) {

             $output2 = '
             <div class="modal-content text-right">
          <div class="modal-header">
            <button class="btn-danger" data-dismiss="modal">&times;</button>
            <h3 class="modal-title text-center">Evidance</h3>
            <img src="'.$row3["Evidence"].'" class="img-responsive" width="500px" height="300px">
          </div>
        </div>
        </div>
          
     ';
          
         }
         echo $output2; 
       
      }

?>