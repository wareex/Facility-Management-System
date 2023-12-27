<?php include 'db_connect.php' ?>
<?php 

$month_of = isset($_GET['month_of']) ? $_GET['month_of'] : date('Y-m');

?>
<style>
	.on-print{
		display: none;
	}
</style>
<noscript>
	<style>
		.text-center{
			text-align:center;
		}
		.text-right{
			text-align:right;
		}
		table{
			width: 100%;
			border-collapse: collapse
		}
		tr,td,th{
			border:1px solid black;
		}
	</style>
</noscript>
<div class="container-fluid">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-body">
				<div class="col-md-12">
					<form id="filter-report">
						<div class="row form-group">
							<label class="control-label col-md-2 offset-md-2 text-right">Month of: </label>
							<input type="month" name="month_of" class='from-control col-md-4' value="<?php echo ($month_of) ?>">
							<button class="btn btn-sm btn-block btn-primary col-md-2 ml-1">Filter</button>
						</div>
					</form>
					<hr>
						<div class="row">
							<div class="col-md-12 mb-2">
							<button class="btn btn-sm btn-block btn-success col-md-2 ml-1 float-right" type="button" id="print"><i class="fa fa-print"></i> Print</button>
							</div>
						</div>
					<div id="report">
						<div class="on-print">
							 <p><center>Rental Balances Report</center></p>
							 <p><center>As of <b><?php echo date('F ,Y') ?></b></center></p>
						</div>
						<div class="row">
							<table class="table table-bordered">
								<thead>
									<tr>
									<th class="text-center">#</th>
									<th class="">Name</th>
									<th class="">Service</th>
									<th class="">Phone Number</th>
									<th class="">Status</th>
									<th class="">Requested By</th>
									<th class="">Date of Request</th>
									<th class="">End date of Request</th>
									</tr>
								</thead>
								<tbody>
                                <?php
								$i = 1;
								$agents = $conn->query("SELECT * from agents ");
                                if($agents->num_rows > 0):
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
										<td class="text-right">
											<p> <b><?php echo $row['date_req'] ?></b></p>
										</td>
										<td class="text-right">
											<p> <b><?php echo $row['date_end'] ?></b></p>
										</td>
                                    
								<?php endwhile; ?>
								<?php else: ?>
									<tr>
										<th colspan="9"><center>No Data.</center></th>
									</tr>
								<?php endif; ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	$('#print').click(function(){
		var _style = $('noscript').clone()
		var _content = $('#report').clone()
		var nw = window.open("","_blank","width=800,height=700");
		nw.document.write(_style.html())
		nw.document.write(_content.html())
		nw.document.close()
		nw.print()
		setTimeout(function(){
		nw.close()
		},500)
	})
	$('#filter-report').submit(function(e){
		e.preventDefault()
		location.href = 'index.php?page=payment_report&'+$(this).serialize()
	})
</script>