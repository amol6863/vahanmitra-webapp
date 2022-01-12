<?php
include "connection.php";
 
$output2='';

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
            <img src="'.$row3["Evidence"].'" class="img-responsive text-center" width="500px" height="300px">
          </div>
        </div>
        </div>
          
     ';
          
         }
     }
         echo $output2; 
     
?>