<?php include 'db_connect.php' ?>
<?php

$month_of = isset($_GET['month_of']) ? $_GET['month_of'] : date('Y-m');

?>
<style>
	.on-print {
		display: none;
	}
</style>
<noscript>
	<style>
		.text-center {
			text-align: center;
		}

		.text-right {
			text-align: right;
		}

		table {
			width: 100%;
			border-collapse: collapse
		}

		tr,
		td,
		th {
			border: 1px solid black;
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
							<p>
								<center>Rental Balances Report</center>
							</p>
							<p>
								<center>As of <b><?php echo date('F ,Y') ?></b></center>
							</p>
						</div>
						<div class="row">
							<table class="table table-bordered">
								<thead>
									<tr>
										<th class="text-center">#</th>
										<th class="">Name</th>
										<th class="">Property Rented</th>
										<th class="">UID</th>
										<th class="">Occupants</th>
										<th class="">Job</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$i = 1;
									$tenant = $conn->query("SELECT t.*,concat(t.lastname,', ',t.firstname,' ',t.middlename) as name,h.house_no,h.typez,h.description FROM tenants t inner join houses h on h.house_no = t.house_id where t.status = 1 order by h.house_no desc ");
									if ($tenant->num_rows > 0) :
										while ($row = $tenant->fetch_assoc()) :
											/**/
									?>
											<tr>
												<td class="text-center"><?php echo $i++ ?></td>
												<td>
													<?php echo ucwords($row['name']) ?>
												</td>
												<td class="">
													<p> <?php echo $row['house_no'] ?>,<b><?php echo $row['typez'] ?>,</b> <b><?php echo $row['description'] ?></b></p>
												</td>
												<td class="">
													<p> <b><?php echo $row['house_no'] ?></b></p>
												</td>
												<td class="">
													<p> <b><?php echo $row['no_of_occupant'] ?></b></p>
												</td>
												<td class="">
													<p><b><?php echo $row['job'] ?></b></p>
												</td>
											</tr>
										<?php endwhile; ?>
									<?php else : ?>
										<tr>
											<th colspan="9">
												<center>No Data.</center>
											</th>
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
	$('#print').click(function() {
		var _style = $('noscript').clone()
		var _content = $('#report').clone()
		var nw = window.open("", "_blank", "width=800,height=700");
		nw.document.write(_style.html())
		nw.document.write(_content.html())
		nw.document.close()
		nw.print()
		setTimeout(function() {
			nw.close()
		}, 500)
	})
	$('#filter-report').submit(function(e) {
		e.preventDefault()
		location.href = 'index.php?page=payment_report&' + $(this).serialize()
	})
</script>