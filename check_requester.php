<?php
include 'db_connect.php';
if (isset($_GET['id'])) {
    $qry = $conn->query("SELECT * FROM agents where id= " . $_GET['id']);
    foreach ($qry->fetch_array() as $k => $val) {
        $$k = $val;
    }
}

?>
<div class="container-fluid">
	<div class="col-lg-24">
		<div class="row">
			<div class="col-md-24">
				<div id="details">
					<p>Agent: <b><?php echo ucwords($name) ?></b></p>
					<p>Requester Name: <b><?php echo ($requester) ?></b></p>
					<p>Time  ending request: <b><?php echo ($date_end) ?></b></p>

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