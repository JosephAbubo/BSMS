<?php 
session_start(); 
include "db_conn.php";

if (isset($_POST['qrcode_text'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$qrcode_text = validate($_POST['qrcode_text']);


	if (empty($qrcode_text)) {
		header("Location: residentlogin.php?error=QR CODE is required");
	    exit();
	}else{
		$sql = "SELECT * FROM tblresident WHERE email='$qrcode_text'";

		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
            if ($row['email'] === $qrcode_text) {
            
				if($row['user_status'] =='active'){
					$_SESSION['email'] = $row['email'];
					$_SESSION['id'] = $row['id'];
					header("Location: dashboard.php");
					exit();
				}else{
					header("Location: residentlogin.php?error=You have pending query Pls comply in Barangay");
				}
            }else{
				header("Location: residentlogin.php?error=INCORRECT QR CODE!");
		        exit();
			}
		}else{
			header("Location: residentlogin.php?error=INVALID QR CODE!!");
	        exit();
		}
	}
	
}else{
	header("Location: index.php");
	exit();
}