<?php
	header("Pragma: no-cache");
	header("Cache-Control: no-cache");
	header("Expires: 0");
	

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Merchant Check Out Page</title>
<meta name="GENERATOR" content="Evrsoft First Page">
<link rel="stylesheet" type="text/css" href="PaytmKit/transaction.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> 
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
	<center>
	<h1>Merchant Check Out Page</h1>
	<pre>
	</pre>
	<form method="post" action="pgRedirect.php">
		<table class="table table-bordered">
			<thead>
				<tr class="bg-dark" style="color: #000000;">
					<th>S.No</th>
					<th>Label</th>
					<th>Value</th>
				</tr>
			</thead>
				<tr>
					<td>1</td>
					<td><label>ORDER_ID::*</label></td>
					<td><input id="ORDER_ID" tabindex="1" maxlength="20" size="20"
						name="ORDER_ID" autocomplete="off"
						value="<?php echo  "ORDS" . rand(10000,99999999)?>">
					</td>
				</tr>
				<tr>
					<td>2</td>
					<td><label>CUSTID ::*</label></td>
					<td><input id="CUST_ID" tabindex="2" maxlength="12" size="12" name="CUST_ID" autocomplete="off" value="CUST001"></td>
				</tr>
				<tr>
					<td>3</td>
					<td><label>INDUSTRY_TYPE_ID ::*</label></td>
					<td><input id="INDUSTRY_TYPE_ID" tabindex="4" maxlength="12" size="12" name="INDUSTRY_TYPE_ID" autocomplete="off" value="Retail"></td>
				</tr>
				<tr>
					<td>4</td>
					<td><label>Channel ::*</label></td>
					<td><input id="CHANNEL_ID" tabindex="4" maxlength="12"
						size="12" name="CHANNEL_ID" autocomplete="off" value="WEB">
					</td>
				</tr>
				<tr>
					<td>5</td>
					<td><label>txnAmount*</label></td>
					<td><input title="TXN_AMOUNT" tabindex="10"
						type="text" name="TXN_AMOUNT"
						value="" placeholder="Enter Amount" autofocus="on" required style="background: yellow; font-weight: bold;">
					</td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td><input value="CheckOut" type="submit" class="btn btn-success" 	onclick=""></td>
				</tr>
			
		</table>
		* - Mandatory Fields
	</form>
</center>
</body>
</html>