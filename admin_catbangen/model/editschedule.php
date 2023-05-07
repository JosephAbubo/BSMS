<?php 
	include '../server/server.php';

	if(!isset($_SESSION['username'])){
		if (isset($_SERVER["HTTP_REFERER"])) {
			header("Location: " . $_SERVER["HTTP_REFERER"]);
		}
	}
	
    $invoiceid 	= $conn->real_escape_string($_POST['invoiceid']);
	$address		= $conn->real_escape_string($_POST['prodname']);
	$price 		= $conn->real_escape_string($_POST['price']);
	$status1		= $conn->real_escape_string($_POST['status1']);
    $purpose 		= $conn->real_escape_string($_POST['purpose']);
	$id		= $conn->real_escape_string($_POST['id']);
    $name 	= $conn->real_escape_string($_POST['name']);

	$profile 	= $conn->real_escape_string($_POST['profileimg']); // base 64 image
	$profile2 	= $_FILES['img']['name'];

	// change profile2 name
	$newName = date('dmYHis').str_replace(" ", "", $profile2);

	  // image file directory
  	$target = "../assets/uploads/resident_profile/".basename($newName);
	$check = "SELECT id FROM tblresident WHERE national_id='$national_id'";
	$nat = $conn->query($check)->fetch_assoc();	
	if($nat['id'] == $id || count($nat) <= 0){
		if(!empty($id)){

			if(!empty($profile) && !empty($profile2)){

				$query = "UPDATE tblresident SET national_id='$national_id',citizenship='$citi',`picture`='$profile', `firstname`='$fname', `middlename`='$mname', `lastname`='$lname', `alias`='$alias', `birthplace`='$bplace', `birthdate`='$bdate', 
						age=$age, `civilstatus`='$cstatus', `gender`='$gender', `purok`='$purok', `voterstatus`='$vstatus', `identified_as`='$indetity', `phone`='$number', `email`='$email',`occupation`='$occu', `address`='$address',
						`resident_type`='$deceased', `remarks`='$remarks'
						WHERE id=$id;";

				if($conn->query($query) === true){

					$_SESSION['message'] = 'Resident Information has been updated!';
					$_SESSION['success'] = 'success';
				}
			}else if(!empty($profile) && empty($profile2)){

				$query = "UPDATE tblresident SET national_id='$national_id',citizenship='$citi',`picture`='$profile', `firstname`='$fname', `middlename`='$mname', `lastname`='$lname', `alias`='$alias', `birthplace`='$bplace', `birthdate`='$bdate', 
						age=$age, `civilstatus`='$cstatus', `gender`='$gender', `purok`='$purok', `voterstatus`='$vstatus', `identified_as`='$indetity', `phone`='$number', `email`='$email',`occupation`='$occu', `address`='$address',
						`resident_type`='$deceased', `remarks`='$remarks'
						WHERE id=$id;";
				
				if($conn->query($query) === true){

					$_SESSION['message'] = 'Resident Information has been updated!';
					$_SESSION['success'] = 'success';
				}

			}else if(empty($profile) && !empty($profile2)){

				$query = "UPDATE tblresident SET national_id='$national_id',citizenship='$citi',`picture`='$newName', `firstname`='$fname', `middlename`='$mname', `lastname`='$lname', `alias`='$alias', `birthplace`='$bplace', `birthdate`='$bdate', 
							age=$age, `civilstatus`='$cstatus', `gender`='$gender', `purok`='$purok', `voterstatus`='$vstatus', `identified_as`='$indetity', `phone`='$number', `email`='$email',`occupation`='$occu', `address`='$address',
							`resident_type`='$deceased', `remarks`='$remarks'
							WHERE id=$id;";

				if($conn->query($query) === true){

					$_SESSION['message'] = 'Resident Information has been updated!!';
					$_SESSION['success'] = 'success';

					if(move_uploaded_file($_FILES['img']['tmp_name'], $target)){

						$_SESSION['message'] = 'Resident Information has been updated!!';
						$_SESSION['success'] = 'success';
					}
				}

			}else{
				$query = "UPDATE tblresident SET national_id='$national_id',citizenship='$citi',`firstname`='$fname', `middlename`='$mname', `lastname`='$lname', `alias`='$alias', `birthplace`='$bplace', `birthdate`='$bdate', 
							age=$age, `civilstatus`='$cstatus', `gender`='$gender', `purok`='$purok', `voterstatus`='$vstatus', `identified_as`='$indetity', `phone`='$number', `email`='$email',`occupation`='$occu', `address`='$address',
							`resident_type`='$deceased', `remarks`='$remarks'
							WHERE id=$id;";
				
				if($conn->query($query) === true){

					$_SESSION['message'] = 'Resident Information has been updated!';
					$_SESSION['success'] = 'success';
				}
			}

		}else{

			$_SESSION['message'] = 'Please complete the form!';
			$_SESSION['success'] = 'danger';
		}
	}else{
		$_SESSION['message'] = 'National ID is already taken. Please enter a unique national ID!';
		$_SESSION['success'] = 'danger';
	}
    header("Location: ../resident.php");

	$conn->close();

