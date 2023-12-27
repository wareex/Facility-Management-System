<?php include 'db_connect.php' ?>


<?php
$tenants = $conn->query("SELECT t.*,concat(t.lastname,', ',t.firstname,' ',t.middlename) as name,h.house_no,h.typez,h.description FROM tenants t inner join houses h on h.house_no = t.house_id where t.id = {$_GET['id']} ");
foreach ($tenants->fetch_array() as $k => $v) {
	if (!is_numeric($k)) {
		$$k = $v;
	}
}
/*
*/
?>
<div class="container-fluid">
	<div class="col-lg-24">
		<div class="row">
			<div class="col-md-24">
				<div id="details">
					<p>Tenant: <b><?php echo ucwords($name) ?></b></p>
					<p>Tenant ID: <b><?php echo ($house_no) ?></b></p>
					<p>Property Address: <b><?php echo ($house_no), " ", ($typez), " ", ($description) ?></b></p>
					<p>Email Address: <b><?php echo ($email) ?></b></p>
					<p>Phone Number: <b><?php echo ($contact) ?></b></p>
					<p>Job: <b><?php echo ($job) ?></b></p>
					<p>Number of house occupant: <b><?php echo ($no_of_occupant) ?></b></p>
					<p>Date Registred: <b><?php echo $date_in ?></b></p>
				</div>
			</div>

			<style>
				#details p {
					margin: unset;
					padding: unset;
					line-height: 1.3em;
				}

				td,
				th {
					padding: 3px !important;
				}
			</style>