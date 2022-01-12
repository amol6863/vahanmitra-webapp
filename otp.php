<?php 
       include "connection.php";
  
				if (isset($_POST["bd"])) {
					
					$badge1 = mysqli_real_escape_string($db, $_POST["bd"]);
					$_SESSION['bdg'] = $badge1;
					$sql1 = "SELECT `Mobile` FROM `cop_details` WHERE Badge = '$badge1'";
					$result = mysqli_query($db,$sql1);
					if ($result) {
						while ($row = mysqli_fetch_array($result)) {
						$mob = $row['Mobile']; 
						
							}
					  }else{
							echo mysqli_errno($db) . ": " . mysqli_error($db) . "\n";
						}
					
					
						/*TEXTLOCAL */ 
        		/*	  require('textlocal.class.php');
         		 	$textlocal = new Textlocal(false, false, 'JMpw1lxS3Bk-QA6NzT08H6qJN0xiPr0niemsalbCeU');
					
					$numbers = array($mob);
					$sender = 'TXTLCL';
					$otp = mt_rand(10000, 99999);
					$message = "Your OTP is : " . $otp ;

					try {
    					$result = $textlocal->sendSms($numbers, $message, $sender);
    					setcookie('otp', $otp);
					} catch (Exception $e) {
    				die('Error: ' . $e->getMessage());
					}  */
       			}

       			if (isset($_POST["otptxt"])) { 
       				$bdg = $_SESSION['bdg'];
       				$otptxt = mysqli_real_escape_string($db, $_POST["otptxt"]);
       				$passtxt = mysqli_real_escape_string($db, $_POST["passtxt"]);
       				if ($otptxt=="" && $passtxt=="") {
       					echo "Specify all fields.";
       				}else{
       						$otp1 = $otptxt;

       						if ($_COOKIE['otp'] == $otp1) {
       							
       							$sql = "UPDATE `cop_details` SET `Password`= '$passtxt' WHERE Badge = '$bdg'";
       							$result1 = mysqli_query($db,$sql);
									if ($result1) {
										echo " Password set successfully"; 
									}else{
										echo mysqli_errno($db) . ": " . mysqli_error($db) . "\n";
										}
       						}else{
       						echo "incorrect OTP.";
       						}
       					}
       			}


				 ?> 