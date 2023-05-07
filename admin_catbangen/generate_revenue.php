<?php include 'server/server.php' ?>

<?php 
	$sql = "SELECT * FROM tblpayments ORDER BY `date` DESC";
    $result = $conn->query($sql);

    $revenue = array();
	while($row = $result->fetch_assoc()){
		$revenue[] = $row; 
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<?php include 'templates/header.php' ?>
	<title>Revenue report</title>
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
								<h2 class="text-white fw-bold">Generate Report</h2>
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
										<div class="card-title">revenue Report</div>
										<div class="card-tools">
											<button class="btn btn-info btn-border btn-round btn-sm" onclick="printDiv('printThis')">
												<i class="fa fa-print"></i>
												Print Report
											</button>
										</div>
									</div>
								</div>
								<div class="card-body m-5" id="printThis">
                                    <div class="d-flex flex-wrap justify-content-center">
										<div class="text-center">
										    <img src="assets/uploads/<?= $brgy_logo ?>" class="img-fluid" width="200" />
                                            <h3 class="mb-0">Republic of the Philippines</h3>
                                            <h3 class="mb-0">Province of <?= ucwords($province) ?></h3>
											<h3 class="mb-0"><?= ucwords($town) ?></h3>
											<h1 class="fw-bold mb-0"><?= ucwords($brgy) ?></i></h2>
                                           
										</div>
									</div>
                                    <div class="row mt-2">
                                    <div class="table-responsive">
										<table id="revenuetable" class="display table table-striped">
											<thead>
												<tr>
												
													<th scope="col">Date</th>
													<th scope="col">Recipient</th>
													<th scope="col">Details</th>
													<th scope="col">Amount</th>
													<th scope="col">Username</th>
												</tr>
											</thead>
											<tbody>
												<?php if(!empty($revenue)): ?>
													<?php $no=1; foreach($revenue as $row): ?>
													<tr>
														<td><?= $row['date'] ?></td>
														<td><?= $row['name'] ?></td>
														<td><?= $row['details'] ?></td>
														<td>P <?= number_format($row['amounts'],2) ?></td>
														<td><?= $row['user'] ?></td>
													</tr>
													<?php $no++; endforeach ?>
												<?php endif ?>
											</tbody>
											<tfoot>
												<tr>
                                                    <th scope="col">Date</th>
													<th scope="col">Recipient</th>
													<th scope="col">Details</th>
													<th scope="col">Amount</th>
													<th scope="col">Username</th>
												</tr>
											</tfoot>
										</table>
                                      
                                        </div>
                                    </div>
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
    <script>
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