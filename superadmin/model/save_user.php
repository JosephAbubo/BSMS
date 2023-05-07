<?php 
	include('../server/server.php');

    if(!isset($_SESSION['username'])){
        if (isset($_SERVER["HTTP_REFERER"])) {
            header("Location: " . $_SERVER["HTTP_REFERER"]);
        }
    }

	$user 	= $conn->real_escape_string($_POST['username']);
	$pass 	= sha1($conn->real_escape_string($_POST['pass']));
    $usertype 	= $conn->real_escape_string($_POST['user_type']);
    $barangay 	= $conn->real_escape_string($_POST['barangay']);
    $profile 	= $conn->real_escape_string($_POST['profileimg']); // base 64 image
	$profile2 	= $_FILES['img']['name'];
    // change profile2 name
    $newName = date('dmYHis').str_replace(" ", "", $profile2);

    // image file directory
    $target = "../assets/uploads/avatar/".basename($newName);

    if(!empty($user) && !empty($pass) && !empty($usertype)){

        $query = "SELECT * FROM tbl_users WHERE username='$user'";
        $res = $conn->query($query);

        if($res->num_rows){
            $_SESSION['message'] = 'Please enter a unique username!';
            $_SESSION['success'] = 'danger';
        }else{
            if(!empty($profile) && !empty($profile2)){
                $insert  = "INSERT INTO tbl_users (`SAusername`, `password`, user_type, barangay, avatar) VALUES ('$user', '$pass', '$usertype','$barangay','$profile')";
                $result  = $conn->query($insert);
    
                if($result === true){
                    $_SESSION['message'] = 'User added!';
                    $_SESSION['success'] = 'success';
    
                }else{
                    $_SESSION['message'] = 'Something went wrong!';
                    $_SESSION['success'] = 'danger';
                }
            }else if(!empty($profile) && empty($profile2)){
                $insert  = "INSERT INTO tbl_users (`SAusername`, `password`, user_type, barangay, avatar) VALUES ('$user', '$pass', '$usertype','$barangay','$profile')";
                $result  = $conn->query($insert);
    
                if($result === true){
                    $_SESSION['message'] = 'User added!';
                    $_SESSION['success'] = 'success';
    
                }else{
                    $_SESSION['message'] = 'Something went wrong!';
                    $_SESSION['success'] = 'danger';
                }
            }else if(empty($profile) && !empty($profile2)){
                $insert  = "INSERT INTO tbl_users (`SAusername`, `password`, user_type, barangay, avatar) VALUES ('$user', '$pass', '$usertype','$barangay','$newName')";
                $result  = $conn->query($insert);

                move_uploaded_file($_FILES['img']['tmp_name'], $target);

                if($result === true){
                    $_SESSION['message'] = 'User added!';
                    $_SESSION['success'] = 'success';
    
                }else{
                    $_SESSION['message'] = 'Something went wrong!';
                    $_SESSION['success'] = 'danger';
                }
            }else{
                $insert  = "INSERT INTO tbl_users (`SAusername`, `password`,`barangay`, user_type) VALUES ('$user', '$pass','$barangay', '$usertype')";
                $result  = $conn->query($insert);
                
                if($result === true){
                    $_SESSION['message'] = 'User added!';
                    $_SESSION['success'] = 'success';
    
                }else{
                    $_SESSION['message'] = 'Something went wrong!';
                    $_SESSION['success'] = 'danger';
                }
            }
        }
        
    }else{

        $_SESSION['message'] = 'Please fill up the form completely!';
        $_SESSION['success'] = 'danger';
    }

    header("Location: ../users.php");

	$conn->close();
?>
 <?php
 
 $servername = "localhost";
 $username = "root";
 $password = "";
 $dbname = "abms";
 $conn = mysqli_connect($servername,$username,$password,$dbname);

 $user 	= $conn->real_escape_string($_POST['username']);
	$pass 	= sha1($conn->real_escape_string($_POST['pass']));
    $usertype 	= $conn->real_escape_string($_POST['user_type']);
    $barangay 	= $conn->real_escape_string($_POST['barangay']);

 $insert  = "INSERT INTO tbl_users (`username`, `password`, user_type, `barangay`) VALUES ('$user', '$pass', '$usertype', '$barangay')";
 if (mysqli_query($conn, $insert)) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $insert . "<br>" . mysqli_error($conn);
  }
  
  mysqli_close($conn);
?>