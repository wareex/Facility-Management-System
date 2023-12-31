<?php include 'db_connect.php' ?>


<?php
$wat =  $_SESSION['login_UId'];
$tenants = $conn->query("SELECT t.*,concat(t.lastname,', ',t.firstname,' ',t.middlename) as name,h.house_no,h.typez,h.description FROM tenants t inner join houses h on h.house_no = t.house_id where t.house_id = '$wat' ");
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
				<p> My Profile Picture: <br></p>
				<div class="img">
					<img src="assets/uploads/<?php echo $_SESSION['login_avatar'] ?>" id="pp" alt="UserImage">
				</div>
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
				#profile {
			display: flex;
			height: calc(100%);
			width: calc(100%);
			justify-content: center;
			align-items: center
		}

		#pp {
			max-width: calc(100%);
			max-height: calc(100%);
			border-radius: 100%;
		}

		.img {
			width: 80px;
			height: 85px;
			align-self: center;
			border-radius: 50%;
			border: 3px solid #808080c2;
			display: flex;
			justify-content: center;
			text-align: -webkit-auto;
		}
			</style>