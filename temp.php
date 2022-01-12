<?php  

 
 function fetch_data()  
 {  
      $output = '';  
      include "connection.php"; 
     $query = "SELECT * FROM `offences`  ORDER BY UNIX_TIMESTAMP(offence_Date) DESC ";
      
    $result = mysqli_query($db, $query);
      while($row = mysqli_fetch_array($result))  
      {       
      $output .= '  <tbody>       <tr>
          
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
            
            </tr> 
              
                          ';  
      }  
      return $output;  
 }  
  
  
      require_once "dompdf/autoload.inc.php";
      use Dompdf\Dompdf;
     $dompdf = new Dompdf();
       
      $content = '';  
      $content .= '  
      <!DOCTYPE html>  
      <html>  
      <head>  
           <title>Webslesson Tutorial | Export HTML Table data to PDF using TCPDF in PHP</title>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <style type="text/css"> 
           thead:before, thead:after { display: none; } 
           tbody:before, tbody:after { display: none; } 
           </style>          
      </head>  
      <body>  
      <div class="table-responsive text-center" id="result" style="overflow-y:auto; max-height: 500px;">
                          <table class="table table-bordered table-hover header-fixed">
                          <thead>
                                <tr class="text-center">
             
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
            </thead>
      ';  
      $content .= fetch_data();  
      $content .= '</tbody></table></div>  
      </body>  
 </html>  ';  
     $dompdf->load_html($content); 
     $dompdf->setPaper('A4','portrait');

      $dompdf->render();
      $dompdf->stream("offences.xls");
  
 ?>  
 
           
         