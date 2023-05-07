<?php include 'server/poroserver.php' ?>
<?php 
    $id = $_GET['id'];
	$query = "SELECT * FROM tblresident WHERE id='$id'";
    $result = $conn->query($query);
    $resident = $result->fetch_assoc();

    $query1 = "SELECT * FROM tblofficials JOIN tblposition ON tblofficials.position=tblposition.id WHERE tblposition.position NOT IN ('SK Chairrman','Secretary','Treasurer')
                AND `status`='Active' ORDER BY `order` ASC";
    $result1 = $conn->query($query1);
    $officials = array();
	while($row = $result1->fetch_assoc()){
		$officials[] = $row; 
	}

    $c = "SELECT * FROM tblofficials JOIN tblposition ON tblofficials.position=tblposition.id WHERE tblposition.position='Captain'";
    $captain = $conn->query($c)->fetch_assoc();
    $s = "SELECT * FROM tblofficials JOIN tblposition ON tblofficials.position=tblposition.id WHERE tblposition.position='Secretary'";
    $sec = $conn->query($s)->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php include 'templates/header.php' ?>
	<title>Barangay Certificate -  Barangay Management System</title>
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
								<h2 class="text-white fw-bold">Generate Certificate</h2>
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
										<div class="card-title">Barangay Certificate</div>
										<div class="card-tools">
											<button class="btn btn-info btn-border btn-round btn-sm" onclick="printDiv('printThis')">
												<i class="fa fa-print"></i>
												Print Certificate
											</button>
										</div>
									</div>
								</div>
								<div class="card-body m-5" id="printThis">
                                    <div class="d-flex flex-wrap justify-content-center" >
										<div class="text-center">
                                             <img src="assets/uploads/<?= $brgy_logo ?>" class="img-fluid" width="100" height="100" />
                                            <h3 class="mb-0"><b>Republic of the Philippines</b></h3>
                                            <h3 class="mb-0"><b>Province of <?= ucwords($province) ?></b></h3>
											<h3 class="mb-0"><b><?= ucwords($town) ?></b></h3>
                                            <br>
                                            <h2 class="mt-4 fw-bold">OFFICE OF THE PUNONG BARANGAY</h2>
											<h1 class="fw-bold mb-0">BARANGAY <?= ucwords($brgy) ?></i></h2>

                                            <h1 class="mt-4 fw-bold mb-5"><u>CERTIFICATE OF RESIDENCY</u></h1>
                                            
                                        
										</div>
                                        <div class="col-md-10">
                                            <div class="text-left">
                                            <h2 class="mt-5" style="text-indent: 50px;">This is to certify that <span class="fw-bold" style="font-size:25px"><?= ucwords($resident['firstname'].' '.$resident['middlename'].' '.$resident['lastname']) ?></span>, <?= ucwords($resident['age'])?> years old, and whose picture attached and specimen signature below is a <b>PERMANENT RESIDENT</b> of
                                                <span class="fw-bold" style="font-size:25px"><?= ucwords($brgy) ?></span>, <?= ucwords($town) ?>,<?= ucwords($province) ?> </h2>
                                            </div>
                                        </div>  

                                       
                                        

									</div>
                                    <div class="d-flex flex-wrap justify-content-center" >
                                    <div class="col-md-10">
                                            
                                            
                                            <h2 class="mt-5" style="text-indent: 50px;">Issued This <span class="fw-bold" style="font-size:25px"><?= date('m/d/Y') ?></span> upon request here at office of the Punong Barangay,<?= ucwords($brgy) ?> <?= ucwords($town) ?>,<?= ucwords($province) ?> for all legal intents and purposes it may serve</h2>
                                            
                                        </div>
                                        
                                    </div>
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                    <div class="col-md-10">
                                        <h2 class="fw-bold mb-0"><?= ucwords($resident['firstname'].' '.$resident['middlename'].' '.$resident['lastname']) ?></h2>
                                                <p>Signature over printed name</p>
                                        </div>  
                                    <div class="row mt-2">
                                        <div class="col-md-3">
                                            <div>
                                               

                                            </div>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="text-center">
                                                
                                            </div>
                                           
                                            
                                            
                                           
                                          
                                        </div>
                                        <div class="col-md-12">
                                            <div class="p-3 text-right mr-3">
                                                <h2 class="fw-bold mb-0 text-capitalize"><?= ucwords($captain['name']) ?></h2>
                                                <p class="mr-3">Punong Barangay</p>
                                            </div>
                                            <h2 class="text-capitalize" style="margin-top:180px;">Not valid without the official seal of <?= ucwords($brgy) ?> :</h2>
                                        </div>
                                        
                                    </div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

            <!-- Modal -->
            <div class="modal fade" id="pment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Create Payment</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="model/save_pment.php" >
                                <div class="form-group">
                                    <label>Amount</label>
                                   <textarea class="form-control" placeholder="Enter Payment Details" name="amount">150</textarea>
                                </div>
                                <div class="form-group">
                                    <label>Date Issued</label>
                                    <input type="date" class="form-control" name="date" value="<?= date('Y-m-d') ?>">
                                </div>
                                <div class="form-group">
                                    <label>Payment Details(Optional)</label>
                                    <textarea class="form-control" placeholder="Enter Payment Details" name="details">Barangay Clearance Payment</textarea>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="name" value="<?= ucwords($resident['firstname'].' '.$resident['middlename'].' '.$resident['lastname']) ?>">
                            <button type="button" class="btn btn-secondary" onclick="goBack()">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>

			<!-- Main Footer -->
			<?php include 'templates/main-footer.php' ?>
			<!-- End Main Footer -->
			<?php if(!isset($_GET['closeModal'])){ ?>
            
                <script>
                    setTimeout(function(){ openModal(); }, 1000);
                </script>
            <?php } ?>
		</div>
		
	</div>
	<?php include 'templates/footer.php' ?>
    <script>
            function openModal(){
                $('#pment').modal('show');
            }

            function printDiv(divName) {
                var printContents = document.getElementById(divName).innerHTML;
                var originalContents = document.body.innerHTML;

                document.body.innerHTML = printContents;

                window.print();

                document.body.innerHTML = originalContents;
            }
    </script>
</body>
</html>