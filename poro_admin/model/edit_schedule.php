<?php 
	include '../server/server.php';

	if(!isset($_SESSION['username'])){
		if (isset($_SERVER["HTTP_REFERER"])) {
			header("Location: " . $_SERVER["HTTP_REFERER"]);
		}
	}
	
	$invoiceid 	= $conn->real_escape_string($_POST['invoiceid']);
    $name 	= $conn->real_escape_string($_POST['name']);
	$status1 	= $conn->real_escape_string($_POST['status1']);
	$remarks 	= $conn->real_escape_string($_POST['remarks']);
    $id 	    = $conn->real_escape_string($_POST['id']);

	if(!empty($id)){

		$query 		= "UPDATE notifications SET `invoiceid` = '$invoiceid', `name`= '$name', `status1`= '$status1', `remarks`='$remarks' WHERE id=$id;";	
		$result 	= $conn->query($query);

		if($result === true){
            
			$_SESSION['message'] = 'Position has been updated!';
			$_SESSION['success'] = 'success';

		}else{
			$_SESSION['message'] = 'Somethin went wrong!';
			$_SESSION['success'] = 'danger';
		}

	}else{
		$_SESSION['message'] = 'No Sched ID found!';
		$_SESSION['success'] = 'danger';
	}

    header("Location: ../schedules.php");

	$conn->close();