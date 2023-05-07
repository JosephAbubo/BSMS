<?php include 'server/server.php' ?>

<html lang="en">
<head>
	<?php include 'templates/header.php' ?>
	<title>Upload</title>
</head>
<body>
<?php include 'templates/loading_screen.php' ?>
	<div class="wrapper">
		<!-- Main Header -->
		<?php include 'templates/main-header.php' ?>
		<!-- End Main Header -->

		<!-- Sidebar -->
		<?php include 'templates/sidebar.php' ?>
		<!-- End Sidebar -->

		<div class="main-panel">
			<div class="content">
				<div class="panel-header bg-primary-gradient">
					<div class="page-inner">
						<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
							<div>
								<h2 class="text-white fw-bold">Settings</h2>
							</div>
						</div>
					</div>
				</div>
				<div class="page-inner">
					<div class="row mt--2">
						<div class="col-md-12">

                            <?php if(isset($_SESSION['message'])): ?>
                                <div class="alert alert-<?php echo $_SESSION['success']; ?> <?= $_SESSION['success']=='danger' ? 'bg-danger text-light' : null ?>" role="alert">
                                    <?php echo $_SESSION['message']; ?>
                                </div>
                            <?php unset($_SESSION['message']); ?>
                            <?php endif ?>

                            <div class="card">
								<div class="card-header">
									<div class="card-head-row">
										<div class="card-title">Support Management</div>
									</div>
								</div>
								<div class="card-body">
                                <form enctype="multipart/form-data" action="" name="form" method="post">
                                        Select File
                                            <input type="file" name="file" id="file" /></td>
                                            <label for="filetype">Choose file type</label>
                                            <select id="filetype" name="filetype">
                                                <option value="--">--</option>
                                                <option value="barangay budget">barangay budget</option>
                                                <option value="summary of income and expenditures">summary of income and expenditurest</option>
                                                <option value="20% Component of IRA Utilizations">20% Component of IRA Utilizations</option>
                                                <option value="Annual Procurement Plan">Annual Procurement Plan</option>
                                                <option value="List of Notices of Award">List of Notices of Award</option>
                                                <option value="Itemized Monthly Collection and Disbursements">Itemized Monthly Collection and Disbursements</option>
                                            </select>   
                                            <label for="filetype">Date of report</label>
                                            <input type="date" name="date" id="date" />
                                            <input type="submit" name="submit" id="submit" value="Submit" />
                                    </form>
                                        <?php
                                                $conn=new PDO('mysql:host=localhost; dbname=abms', 'root', '') or die(mysql_error());
                                                if(isset($_POST['submit'])!=""){
                                                $name=$_FILES['file']['name'];
                                                $size=$_FILES['file']['size'];
                                                $type=$_FILES['file']['type'];
                                                $temp=$_FILES['file']['tmp_name'];
                                                $filetype = $_POST['filetype'];
                                                $date = $_POST['date'];
                                                // $caption1=$_POST['caption'];
                                                // $link=$_POST['link'];
                                                $fname = $date .'_'.$name;
                                                $chk = $conn->query("SELECT * FROM  upload where name = '$name' ")->rowCount();
                                                if($chk){
                                                    $i = 1;
                                                    $c = 0;
                                                    while($c == 0){
                                                        $i++;
                                                        $reversedParts = explode('.', strrev($name), 2);
                                                        $tname = (strrev($reversedParts[1]))."_".($i).'.'.(strrev($reversedParts[0]));
                                                    // var_dump($tname);exit;
                                                        $chk2 = $conn->query("SELECT * FROM  upload where name = '$tname' ")->rowCount();
                                                        if($chk2 == 0){
                                                            $c = 1;
                                                            $name = $tname;
                                                        }
                                                    }
                                                }
                                                $move =  move_uploaded_file($temp,"upload/".$fname);
                                                if($move){
                                                    $filetype = $_POST['filetype'];
                                                    $query=$conn->query("insert into upload(name,fname,filetype)values('$name','$fname','$filetype',)");
                                                    if($query){
                                                    
                                                    }
                                                    else{
                                                    die(mysql_error());
                                                    }
                                                }
                                                }
                                        ?>
                                        
                                    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
                                        <thead>
                                            <tr>
                                                <th width="90%" align="center">Files</th>
                                                <th align="center">Action</th>	
                                            </tr>
                                        </thead>
                                        
                                        <?php
                                        $query=$conn->query("select * from upload order by id desc");
                                        while($row=$query->fetch()){
                                            $name=$row['name'];
                                        ?>
                                        <tr>
                                        
                                            <td>
                                                &nbsp;<?php echo $name ;?>
                                            </td>
                                            <td>
                                                <button class="alert-waring"><a href="deletefile.php?userid=<?php echo $row["fname"]; ?>">Delete</a></button>
                                                <button class="alert-success"><a href="download.php?filename=<?php echo $name;?>&f=<?php echo $row['fname'] ?>">Download</a></button>
                                            </td>
                                        </tr>
                                        <?php }?>
                                    </table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<!-- Main Footer -->
			<?php include 'templates/main-footer.php' ?>
			<!-- End Main Footer -->
			
		</div>
		
	</div>
	<?php include 'templates/footer.php' ?>
</body>
</html>