 <!DOCTYPE html>
 <html>
 <head>
   <title></title>
 </head>
 <body>
 
 
 <?php 
 include "connection.php";
 header("Content-type:application/vnd.ms-excel");
 header("Content-Disposition:attachment;filename=reports.xls");
 if (isset($_POST['subdate'])) {
   $start = $_POST['from'];
   $end = $_POST['to'];

   $query = "SELECT * FROM offences where offence_Date BETWEEN '$start' AND '$end' ";
 }else if(isset($_POST['sub_badge'])){
  $badgeR = $_POST['badge_field'];
   $query = "SELECT * FROM `offences` WHERE Badge = '$badgeR'  ORDER BY UNIX_TIMESTAMP(offence_Date) DESC ";
 }else {
  $query = "SELECT * FROM `offences`  ORDER BY UNIX_TIMESTAMP(offence_Date) DESC ";
 }
   
      
    $result = mysqli_query($db, $query);
            if (!$result) {
                echo mysqli_errno($db) . ": " . mysqli_error($db) . "\n";
            }
if(mysqli_num_rows($result) > 0)
{ ?>
           <h3>Offence Report</h3>
           <h4>From <?php echo $start; ?> to <?php echo $end; ?></h4>
          <div class="table-responsive text-center" id="result" style="overflow-y:auto; max-height: 500px;">
           <table class="table table-bordered table-hover header-fixed">
            <tr class="text-center">
              <th>ID</th>
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
            </tr>
      <?php
     while($row = mysqli_fetch_array($result))
     {
 
        ?>

         <tr>
          
            <td>'<?php echo $row['ID']; ?></td>
            <td>'<?php echo $row['offence_Date']; ?></td>
            <td>'<?php echo $row['Raised_By']; ?></td>
            <td>'<?php echo $row['Badge']; ?></td>
            <td>'<?php echo $row['Owner']; ?></td>
            <td>'<?php echo $row['Contact']; ?></td>
            <td>'<?php echo $row['Vehicle']; ?></td>
            <td>'<?php echo $row['Registration']; ?></td>
            <td>'<?php echo $row['Offence Category']; ?></td>
            <td>'<?php echo $row['Description']; ?></td>
            <td>'<?php echo $row['Location']; ?></td>
            <td>'<?php echo $row['Status']; ?></td>
            <td>'<?php echo $row['Transaction_ID']; ?></td>
            <td>'<?php echo $row['Challan']; ?></td>
           
            </tr>
         
        <?php
       }
    
  } ?>
            </table>
            </div>
    </body>
 </html>