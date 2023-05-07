<?php include 'server/server.php' ?>
<?php 
	$query = "SELECT * FROM notifications ORDER BY `id`";
    $result = $conn->query($query);

    $sched = array();
	while($row = $result->fetch_assoc()){
		$sched[] = $row; 
	}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php include 'templates/header.php' ?>
	<title>Resident Schedules -  Barangay Management System</title>
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
								<h2 class="text-white fw-bold">Schedules</h2>
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
										<div class="card-title">Resident Document request list</div>
										<?php if(isset($_SESSION['username'])):?>
											
										<?php endif?>
									</div>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table id="residenttable" class="display table table-striped">
											<thead>
												<tr>
													<th scope="col">NO.</th>
													<th scope="col">Tracking Number</th>
													<th scope="col">Full Name</th>
													<th scope="col">Address</th>
													<th scope="col">Type of Document</th>
                                                    <th scope="col">Purpose</th>
                                                    <th scope="col">Date of Pickup</th>
                                                    <th scope="col">Status</th>
													<th scope="col">Mode of Payment</th>
													<th scope="col">Reference No. (If Gcash)</th>
													<th scope="col">Remarks</th>
													<?php if(isset($_SESSION['username'])):?>
													<th scope="col">Action</th>
													<?php endif ?>
												</tr>
											</thead>
											<tbody>
											<?php if(!empty($sched)): ?>
                                                    <?php $no=1; foreach($sched as $row): ?>
                                                    <tr>
                                                        <td><?= $no ?></td>
                                                        <td><?= $row['invoiceid'] ?></td>
                                                        <td><?= $row['name'] ?></td>
														<td><?= $row['prodname'] ?></td>
														<td><?= $row['price'] ?></td>
														<td><?= $row['purpose'] ?></td>
														<td><?= $row['dop'] ?></td>
														<td><?= $row['status1'] ?></td>
														<td><?= $row['pay'] ?></td>
														<td><?= $row['refid'] ?></td>
														<td><?= $row['remarks'] ?></td>
                                                        <td>
                                                            <div class="form-button-action">
                                                                <a type="button" href="#edit" data-toggle="modal" class="btn btn-link btn-primary" title="View Status Appointment" onclick="editSched(this)" 
                                                                    data-invoiceid="<?= $row['invoiceid'] ?>" 
																	data-name="<?= $row['name'] ?>"
																	data-purpose="<?= $row['purpose'] ?>"
																	data-status1="<?= $row['status1'] ?>" 
																	data-remarks="<?= $row['remarks'] ?>" 
                                                                    data-id="<?= $row['id'] ?>">
                                                                    <i class="fa fa-edit"></i>
                                                                </a>
                                                                <a type="button" data-toggle="tooltip" href="model/remove_sched.php?id=<?= $row['id'] ?>" onclick="return confirm('Are you sure you want to delete this Appointment Request?');" class="btn btn-link btn-danger" data-original-title="Remove">
                                                                    <i class="fa fa-times"></i>
                                                                </a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <?php $no++; endforeach ?>
                                                <?php else: ?>
                                                    <tr>
                                                        <td colspan="4" class="text-center">No Available Data</td>
                                                    </tr>
                                                <?php endif ?>
											</tbody>
											<tfoot>
												<tr>
												<th scope="col">NO.</th>
                                                  <th scope="col">Tracking Number</th>
													<th scope="col">Full Name</th>
													<th scope="col">Address</th>
													<th scope="col">Type of Docoument</th>
                                                    <th scope="col">Purpose</th>
                                                    <th scope="col">Date of Pickup</th>
                                                    <th scope="col">Status</th>
													<th scope="col">Remarks</th>
													<?php if(isset($_SESSION['username'])):?>
													<th scope="col">Action</th>
													<?php endif ?>
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

			<!-- Main Footer -->
			<?php include 'templates/main-footer.php' ?>
			<!-- End Main Footer -->

			<!-- Modal -->
			<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Appointment approval</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="model/edit_schedule.php" >
                                <div class="form-group">
                                    <label>Tracking Number</label>
                                    <input type="text" class="form-control" id="invoiceid"  name="invoiceid" readonly>
                                </div>
								<div class="form-group">
                                    <label>Full Name</label>
                                    <input type="text" class="form-control" id="name"  name="name">
                                </div>
								<div class="form-group">
                                    <label>Purpose</label>
                                    <input type="text" class="form-control" id="purpose"  name="purpose">
                                </div>
                                <div class="form-group">
                                    <label>Status</label>
                                    <select class="form-control" name="status1" id="status1">
												<option value="Pending">Pending</option>
                                                <option value="Approved">Approve</option>
												<option value="Declined">Decline</option>
									</select>
                                </div>
								<div class="form-group">
                                    <label>Remakrs</label>
                                    <input type="text" class="form-control" id="remarks"  name="remarks">
                                </div>
                            
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" id="sched_id" name="id">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>

		</div>
	</div>
	<?php include 'templates/footer.php' ?>
	<script src="assets/js/plugin/datatables/datatables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#residenttable').DataTable();
        });
    </script>
</body>
</html>