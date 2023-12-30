<?php include('db_connect.php');

//data transfer
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$itemData = $_POST['item'];
	$item_typeData = $_POST['item_type'];
	$durData = $_POST['duration'];
	$detailsData = $_POST['details'];
	$balanceData = $_POST['balance'];
    $amountpayableData = $_POST['amountpayable'];

	$payData = $_POST['pay'];
?>



	<div class="row col-8">

		<?php
		require_once 'vendor/autoload.php';

		if (isset($_POST['choice'])) {
		
			if ($_POST['paymethode'] == '1') {

				echo '
					  <span style="color:green;text-align:center; font-weight: bold;">Youre making payment Via Mobile Money.</span>
				  <div class="container-fluid">
					<form action="./index.php?page=utility_bills" id="make_payment" method="POST">
					  <input type="hidden" class="form-control form-control-sm" name="id" id="id" value="" readonly>
					  <input type="hidden" class="form-control form-control-sm" name="UId" id="UId" value="' . $_SESSION['login_UId'] . '" readonly>	
					  <input type="hidden" class="form-control form-control-sm" name="trans_id" id="trans_id" value="' . 'tr' . $detailsData . $_SESSION['login_UId'] . date('M d, Y') . '" readonly>	  
					  <input type="hidden" class="form-control form-control-sm" name="status" id="status" value="' . '1' . '" readonly>
					  <input type="hidden" class="form-control form-control-sm" name="balance" id="balance" value="'. $balanceData .'" readonly>
					  <input type="hidden" class="form-control form-control-sm" name="amountpayable" id="amountpayable" value="'. $amountpayableData .'" readonly>



					  <div class="form-group">
						<label for="mobile" class="control-label">Mobile Number (Use Correct mobile for SMS receipt.)</label>
						<i>Please include 234</i>
						<input type="number" max-length="16" min-length="12" class="form-control form-control-sm" name="mobile" id="mobile" required placeholder="Enter Mobile Account to Use">
					  </div>		  
					  <label for="mobile" class="control-label">Utility Item </label>
					  <input type="text" class="form-control form-control-sm" name="item" id="item" value="' . $itemData . '" readonly>
					  <label for="mobile" class="control-label">Utility Item Type </label>
					  <input type="text" class="form-control form-control-sm" name="item_type" id="item_type" value="' . $item_typeData . '" readonly>
					  <div class="form-group">
					  <label for="mobile" class="control-label">Duration</label>
					  <i>Duration plan</i>
					  <input type="text" class="form-control form-control-sm" name="duration" id="duration" value="' . $durData . '" readonly required>

					  <label for="mobile" class="control-label">Recpient Recharging Details</label>
					  <i>Meter/Smart card/ or Phone Number</i>
					  <input type="number" class="form-control form-control-sm" name="details" id="details" value="' . $detailsData . '" readonly required>
					  
					  <label for="mobile" class="control-label">Amount to pay</label>
					  <i>Here is the Amount you want to pay</i>
					  <input type="number" class="form-control form-control-sm" name="pay" id="pay" value="' . $payData . '" readonly required>
					  </div>

					  <div class="card-footer border-top border-info">
						<div class="d-flex w-100 justify-content-center align-items-center">
						  <button type="submit" class="btn btn-flat bg-gradient-primary mx-2" id="pay_bill" name="pay">PAY</button>
						  </div>
						</div>	
					</form>
					<a href="./index.php?page=select_item"><button type="submit" class="btn btn-flat bg-gradient-warning mx-2" name="back">BACK</button></a>
			
				  </div>';
			} else {
				echo '
			<span style="color:green;text-align:center; font-weight: bold;">Youre making payment Via Credit Card.</span>
			<div class="container-fluid">
			  <form action="./index.php?page=utility_bills" id="make_payment" method="POST">
				<input type="hidden" class="form-control form-control-sm" name="id" id="id" value="" readonly>
				<input type="hidden" class="form-control form-control-sm" name="UId" id="UId" value="' . $_SESSION['login_UId'] . '" readonly>	
				<input type="hidden" class="form-control form-control-sm" name="trans_id" id="trans_id" value="' . 'tr' . $detailsData . $_SESSION['login_UId'] . date('M d, Y') . '" readonly>
				<input type="hidden" class="form-control form-control-sm" name="status" id="status" value="' . '1' . '" readonly>
				<input type="hidden" class="form-control form-control-sm" name="balance" id="balance" value="'. $balanceData .'" readonly>
				<input type="hidden" class="form-control form-control-sm" name="amountpayable" id="amountpayable" value="'. $amountpayableData .'" readonly>

				<div class="form-group">
						<label for="mobile" class="control-label">Credit Card Number (Use Correct Credit card for OTP)</label>
						<div class="input-group mb-3">
				<!-------->
				<div class="col-md-6">
				<input type="number" class="form-control form-control-sm" name="card_num" id="card-num" aria-label="Amount Payable" value="" aria-describedby="basic-addon2" placeholder="Enter Credit card here" required>
			  </div>
			  <div class="col-md-3">
				<input type="number" class="form-control form-control-sm" name="card_cv" id="card_cv" aria-label="Amount Payable" value="" aria-describedby="basic-addon2" placeholder="Enter Card CVV" required>
			  </div>
			  <div class="col-md-3">
			  <input type="date" class="form-control form-control-sm" name="card_date"id="card_date" value="" required>
			  </div>
				<!----------></div>
        					  </div>		  
					  <label for="mobile" class="control-label">Utility Item </label>
					  <input type="text" class="form-control form-control-sm" name="item" id="item" value="' . $itemData . '" readonly>
					  <label for="mobile" class="control-label">Utility Item Type </label>
					  <input type="text" class="form-control form-control-sm" name="item_type" id="item_type" value="' . $item_typeData . '" readonly>
					  <div class="form-group">
					  <label for="mobile" class="control-label">Duration</label>
					  <i>Duration plan</i>
					  <input type="text" class="form-control form-control-sm" name="duration" id="duration" value="' . $durData . '" readonly required>

					  <label for="mobile" class="control-label">Recpient Recharging Details</label>
					  <i>Meter/Smart card/ or Phone Number</i>
					  <input type="text" class="form-control form-control-sm" name="details" id="details" value="' . $detailsData . '" readonly required>
					  
					  
					  <label for="mobile" class="control-label">Amount to pay</label>
					  <i>Here is the Amount you want to pay</i>
					  <input type="number" class="form-control form-control-sm" name="pay" id="pay" value="' . $payData . '" readonly required>
					  </div>

					  <div class="card-footer border-top border-info">
						<div class="d-flex w-100 justify-content-center align-items-center">
						  <button type="submit" class="btn btn-flat bg-gradient-primary mx-2"id="pay_bill" name="pay">PAY</button> 
						  </div>
						</div>  
			  </form>
			  <a href="./index.php?page=select_item"><button type="submit" class="btn btn-flat bg-gradient-warning mx-2" name="back">BACK</button></a>
						
			</div>';
			}
		}
		//}

		?>


	<?php
}
	?>
	<script>
		function reSum() {
			//var num1 = parseInt(document.getElementById("Balance").value);
			//var num2 = parseInt(document.getElementById("amountToPay").value);
			//document.getElementById("CurrentBalance").value = +num1 - num2;
		}

		$('#make_payment').submit(function(e) {
		e.preventDefault()
		start_load()
		$('#msg').html('')
		$.ajax({
			url: 'ajax.php?action=pay_bill',
			data: new FormData($(this)[0]),
			cache: false,
			contentType: false,
			processData: false,
			method: 'POST',
			type: 'POST',
			success: function(resp) {
				if (resp == 1) {
					alert_toast("Payment made successfully", 'success')
					setTimeout(function() {
						location.reload()
					}, 1500)
					
				} location.href="./index.php?page=utility_bills";

			}
		})
	})
	</script>