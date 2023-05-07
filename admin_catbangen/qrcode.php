<?php

    include('phpqrcode/qrlib.php');
    require_once('config.php');
    
    $name=$_POST['pname'];
    $emailadd=$_POST['emailadd'];
    $path = 'images/';
    $file = $path.uniqid("Resident_").".jpg";

    $ecc = 'L';
    $pixel_Size = 10;
    $frame_Size = 10;

    $query="insert into tblqr(pname,emailadd,qrImage) values ('$name','$emailadd','$file')";
    if($mysqli->query($query)==true)
    {
        QRcode::png($emailadd,$file,$ecc,$pixel_Size,$frame_Size);
        header('location:addQrCode.php?msg=data added successfully');
    }
    else{
        header('location:addQrCode.php?msg=data failed ');
    }
    
   

    
?>