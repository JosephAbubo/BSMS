<?php 
session_start(); 
include '../server/poroserver.php';

if (isset($_POST['username']) && isset($_POST['password'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$username = validate($_POST['username']);
	$password = sha1($_POST['password']);

	if (empty($username)) {
		header("Location: login.php?error=User Name is required");
	    exit();
	}else if(empty($password)){
        header("Location: login.php?error=Password is required");
	    exit();
	}else{
		$sql = "SELECT * FROM tbl_users WHERE username='$username' AND password='$password'";

		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
            if ($row['username'] === $username && $row['password'] === $password) {
                $_SESSION['id'] = $row['id'];
				$_SESSION['username'] = $row['username'];
				$_SESSION['role'] = $row['user_type'];
				$_SESSION['avatar'] = $row['avatar'];
            	header('location: ../dashboard.php');
		        exit();
            }else{
                $_SESSION['message'] = 'Username or password is incorrect!';
                $_SESSION['success'] = 'danger';
                header('location: ../login.php');
			}
		}else{
            $_SESSION['message'] = 'No Record Found';
			$_SESSION['success'] = 'danger';
            header('location: ../login.php');
		}
	}
	
}else{
    $_SESSION['message'] = 'Username or password is empty!';
    $_SESSION['success'] = 'danger';
    header('location: ../login.php');
}