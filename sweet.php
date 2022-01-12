<!DOCTYPE html>
<html>
<head>
	<title>sweet</title>
	<script src="sweetalert/sweetalert2.min.js"></script>
	<link rel="stylesheet" href="sweetalert/sweetalert2.css">
</head>
<body>
    <button onclick="show()">show</button>

    <script type="text/javascript">
    	function show(){
    		Swal.fire({
 				 type: 'error',
 				 title: 'Oops...',
 				 text: 'Something went wrong!',
})
    	}
    </script>
</body>
</html>