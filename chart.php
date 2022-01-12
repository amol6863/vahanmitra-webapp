
<?php 
include "connection.php";

$query = "SELECT * FROM offences";
$result = mysqli_query($db, $query);


$chart_data = '';
while($row = mysqli_fetch_array($result))
{  extract($row);
 echo $offence_Date;
 echo $ID;

 $chart_data .= "{ date:'".$row["offence_Date"]."', ";
}

$query2 = "SELECT COUNT(*) FROM `offences` WHERE offence_Date LIKE (SELECT offence_Date FROM offences) "

$chart_data = substr($chart_data, 0, -2);
?>


<!DOCTYPE html>
<html>
 <head>
  <title>Webslesson Tutorial | How to use Morris.js chart with PHP & Mysql</title>
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
  
 </head>
 <body>
  <br /><br />
  <div class="container" style="width:900px;">
   <h2 align="center">Morris.js chart with PHP & Mysql</h2>
   <h3 align="center">Daily offence reports</h3>   
   <br /><br />
   <div id="chart"></div>
  </div>
 </body>
</html>

<script>
Morris.Line ({
 element : 'chart',
 data:[<?php echo $chart_data; ?>],
 xkey:'date',
 ykeys:['total'],
 labels:['total'],
 hideHover:'auto',
 stacked:true
});
</script>

