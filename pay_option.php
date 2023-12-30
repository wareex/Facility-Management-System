<?php include('db_connect.php');
?>
<!-- Info boxes -->
<span style="color:green;text-align:center; font-weight: bold;">SELECT PAYMENT METHOD</span>
<?php
//Data Transfer

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $itemData = $_POST['item'];
    $detailsData = $_POST['details'];
    $payData = $_POST['pay'];
    $balanceData = $_POST['balance'];
    $amountpayableData = $_POST['amountpayableIn'];

    //Array Data
    $item_typeData = $_POST["item_type"];
    $durData = $_POST['dur'];

?>
    <form action="./index.php?page=make_payment" method="POST">
        <input type="hidden" class="form-control form-control-sm" name="id" id="id" value="" readonly>
        <div class="form-group">
            <label for="paymethode" class="control-label">Payment Method</label>
            <select class="form-control" name="paymethode" id="paymethode">
                <option value="1">Mobile Money</option>
                <option value="2">Credit Card</option>
            </select>
            <!---Form transfer---->
            <input type="hidden" name="item" id="item" value="<?php echo $itemData; ?>" readonly required>
            <input type="hidden" name="item_type" id="item_type" value="<?php
                                                                        // Assuming two dropdowns
                                                                        if (isset($item_typeData[0])) {
                                                                            echo $item_typeData[0];
                                                                        }

                                                                        if (isset($item_typeData[1])) {
                                                                            echo  $item_typeData[1];
                                                                        }

                                                                        if (isset($item_typeData[2])) {
                                                                            echo $item_typeData[2];
                                                                        }

                                                                        if (isset($item_typeData[3])) {
                                                                            echo  $item_typeData[3];
                                                                        }


                                                                        ?>" readonly required>
            <input type="hidden" name="duration" id="duration" value="<?php
                                                                        if (isset($durData[0])) {
                                                                            echo $durData[0];
                                                                        }

                                                                        if (isset($durData[1])) {
                                                                            echo  $durData[1];
                                                                        }


                                                                        ?>" readonly required>
            <input type="hidden" name="details" id="details" value="<?php echo $detailsData; ?>" readonly required>
            <input type="hidden" name="balance" id="balance" value="<?php echo $balanceData; ?>" readonly required>
            <input type="hidden" name="amountpayable" id="amountpayable" value="<?php echo $amountpayableData; ?>" readonly required>
            <input type="hidden" name="pay" id="pay" value="<?php echo $payData; ?>" readonly required>

        </div>
        <!--
        <script src="https://js.paystack.co/v1/inline.js"></script>
    <button type="button" onclick="payWithPaystack()"> Pay </button>
                                                                    -->
        <button type="submit" class="btn btn-flat  bg-gradient-primary mx-2" name="choice">PROCEED <i class="fa fa-angle-double-right"> </i></button>
        <a href="./index.php?page=select_item"><button type="button" class="btn btn-flat  bg-gradient-warning mx-2"><i class="fa fa-angle-double-left"> </i> BACK</button></a>
    </form>
    </div>
<?php } ?>
<script>
//PAysatck

function payWithPaystack(){
 /*   var pay = document.getElementById("pay");
    var mobil = document.getElementById("mobil");
    var mail = document.getElementById("mail");
    var payValue = pay.value;
    var mailValue = mail.value;
    var mobilValue = mobil.value;
    
    var handler = PaystackPop.setup({
      key: 'pk_test_7e74ec31cd02678ec4a8e3904324d85afa14faf1',
      email: mailValue,
      amount: payValue,
      ref: ''+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
      metadata: {
         custom_fields: [
            {
                display_name: "Mobile Number",
                variable_name: "mobile_number",
                value: mobilValue
            }
         ]
      },
      callback: function(response){
          alert('success. transaction ref is ' + response.reference);
      },
      onClose: function(){
          alert('window closed');
      }
    });
    handler.openIframe(); 
    */
  }




</script>