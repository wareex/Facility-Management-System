<?php include('db_connect.php'); ?>

<div class="container-fluid">

	<div class="col-lg-12">
		<div class="row mb-4 mt-4">
			<div class="col-md-12">

			</div>
		</div>
		<div class="row">
			<!-- FORM Panel -->

			<!-- Table Panel -->
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<b>List of Service Agents</b>
						<span class="float:right"><a class="btn btn-primary btn-block btn-sm col-sm-2 float-right" href="javascript:void(0)" id="new_agent">
								<i class="fa fa-plus"></i> New Entry
							</a></span>
					</div>
					<div class="card-body">
						<table class="table table-condensed table-bordered table-hover">
							<thead>
								<tr>
									<th class="text-center">#</th>
									<th class="">Name</th>
									<th class="">Service</th>
									<th class="">Phone Number</th>
									<th class="">Status</th>
									<th class="">Requested By</th>
									<th class="text-center">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$i = 1;
								$agents = $conn->query("SELECT * from agents ");
								while ($row = $agents->fetch_assoc()) :

								?>
									<tr>
										<td class="text-center"><?php echo $i++ ?></td>
										<td>
											<?php echo $row['name'] ?>
										</td>
										<td class="">
											<p> <b><?php echo $row['service'] ?></b></p>
										</td>
										<td class="">
											<p> <b><?php echo $row['phone_no'] ?></b></p>
										</td>
										<td class="text-right">
											<p> <b><?php if ($row['status'] == 0) : ?>
														<span class="badge badge-success">Available</span>
													<?php else : ?>
														<span class="badge badge-danger">UnAvailable</span>
													<?php endif; ?></b></p>
										</td>
										<td class="text-right">
											<p> <b><?php echo $row['requester'] ?></b></p>
										</td>
										<td class="text-center">
											<button class="btn btn-sm btn-outline-primary edit_agent" type="button" data-id="<?php echo $row['id'] ?>">Edit</button>
											<button class="btn btn-sm btn-outline-danger delete_agent" type="button" data-id="<?php echo $row['id'] ?>">Delete</button>
										</td>
									</tr>
								<?php endwhile; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<!-- Table Panel -->
		</div>
	</div>

</div>
<style>
	td {
		vertical-align: middle !important;
	}

	td p {
		margin: unset
	}

	img {
		max-width: 100px;
		max-height: 150px;
	}
</style>
<script>
	$(document).ready(function() {
		$('table').dataTable()
	})

	$('#new_agent').click(function() {
		uni_modal("New Agent", "manage_agent.php", "mid-large")

	})
	$('.edit_agent').click(function() {
		uni_modal("Manage Agents Details", "manage_agent.php?id=" + $(this).attr('data-id'), "mid-large")

	})
	$('.delete_agent').click(function() {
		_conf("Are you sure to delete this Agent?", "delete_agent", [$(this).attr('data-id')])
	})

	function delete_agent($id) {
		start_load()
		$.ajax({
			url: 'ajax.php?action=delete_agent',
			method: 'POST',
			data: {
				id: $id
			},
			success: function(resp) {
				if (resp == 1) {
					alert_toast("Data successfully deleted", 'success')
					setTimeout(function() {
						location.reload()
					}, 1500)

				}
			}
		})
	}
</script>