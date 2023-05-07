<?php include 'server/server.php' ?>

<!DOCTYPE html>
<html lang="">
    <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <?php include 'templates/header.php' ?>
    </head>
    <body>

	<div class="wrapper">
		<!-- Main Header -->
		<?php include 'templates/main-header.php' ?>
		<!-- End Main Header -->

		<!-- Sidebar -->
		<?php include 'templates/sidebar.php' ?>
		<!-- End Sidebar -->

       
        <div class="main-panel">            
        <div class="col-md-6">
        <form action="qrcode.php"  method="POST" class="form-horizontal" role="form">
                <div class="form-group">
                    <legend>Add QrCode</legend>
                   <?php 
                   if(isset($_GET['msg']))
                    {
                        echo $_GET['msg'];
                    }

                   ?>
                </div>
                <div class="form-group">
                Resident Name: <input type="text" name="pname" class="form-control" required >
                </div>
                <div class="form-group">
                Email Address: <input type="text" name="emailadd" class="form-control" required >
                </div>
                
                <div class="form-group">
                    <div class="col-sm-10 col-sm-offset-2">
                        <button type="submit" class="btn btn-primary" name="add_qr">Generate QRCODE</button>
                        
                    </div>
                </div>
        </form>
        </div>
        <div class="main-panel">
        <div class="col-md-2"></div>
            <div class="col-md-8">
            <h1>QR Code List</h1>
            <br>   
           
            <br>
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                      
                        <th>Resident Name</th>
                        <th>QR CODE</th>
                        <th>Action</th>
                        
                      
                    </tr>
                </thead>
                <?php
                include_once 'config.php';
                $result = mysqli_query($conn,"SELECT * FROM tblqr");
                    $i=0;
                    while($row = mysqli_fetch_array($result)) {
                    ?>
                    <tr class="<?php if(isset($classname)) echo $classname;?>">
                    <td><?php echo $row["pname"]; ?></td>
                    <td>
                    <img src="<?php echo $row["qrImage"];?>" height ="50" width="50">
                    </td>

                   
                   
                    <td><a href="deleteqr.php?userid=<?php echo $row["pname"]; ?>">Delete</a></td>
                    </tr>
                    <?php
                    $i++;
                    }
	?>
            </table>
            
      </div>          
        <!-- jQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!-- Bootstrap JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
                </div>
        
               
        
               
            </body>
</html>
