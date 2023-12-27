<?php include('db_connect.php'); ?>
<!-- Info boxes -->
<span style="color:green;text-align:center; font-weight: bold;">SELECT UTILITY ITEM</span>
<?php
$qry = $conn->query("SELECT * FROM utility_bill");
$rs = $qry->fetch_array();
?>
<style>
    .hidden {
        display: none;
    }
</style>
<form action="./index.php?page=pay_option" method="POST" id="infopage">
    <div class="form-group">
        <input type="hidden" class="form-control form-control-sm" name="id" id="id" value="<?php echo $rs['id']; ?>" readonly>
        <label for="mobile" class="control-label">Utility Items</label>
        <select id="item" name="item" onchange="updateDiv()" for="mobile" class="form-control">
            <option value="item0"><i>--Please Select the Utility Item you want--</i></option>
            <option value="Elcetricity Bill">Elcetricity Bill</option>
            <option value="Waste Bill">Waste Bill</option>
            <option value="TV Subscription">TV Subscription</option>
            <option value="Internet Subscription">Internet Subscription</option>
        </select>
        <!----------se------------>
        <div id="div0" class="">
            <label for="item_type" class="control-label">Utility Item Types</label>
            <select class="form-control" name="nill" id="nill">
                <option value="1">Nill</option>
            </select>

        </div>
        <!---Electricity Bill show--->
        <div id="div1" class="hidden">
            <label for="item_type" class="control-label">Utility Item Types</label>
            <select onchange="updateDiv2()" class="form-control" name="item_type[]" id="item_type1">
                <option value=""><i>--Please Select the Utility Item type you want--</i></option>
                <option value="AEDC">AEDC</option>
                <option value="IBEDC">IBEDC</option>
            </select>

            <label for="mobile" class="control-label">Amount Due (Summation of all month due)</label>
            <i>Hover your mouse on each month for exact month due</i>
            <div class="input-group mb-3">
                <input type="number" class="form-control" name="AmountPayable" id="paid" readonly aria-label="Amount Payable" value="" aria-describedby="basic-addon2">
                <span class="input-group-text" value="<?php echo 2; ?>" id="basic-addon2"><?php echo 2 . ' ' . 'Month(s)'; ?></span>
            </div>

        </div>

        <!---Waste Bill show--->
        <div id="div2" class="hidden">
            <label for="item_type" class="control-label">Utility Item Types</label>
            <i>Choose the duration plan your require</i>
            <select onchange="updateDiv2()" class="form-control" name="item_type[]" id="item_type2">
                <option value=""><i>--Please Select the duration plan you want--</i></option>
                <option value="Monthly Package">Monthly Package</option>
                <option value="Weekly Package">Weekly Package</option>
                <option value="Daily Package">Daily Package</option>
                <option value="One-Off Package">One-Off Package</option>
            </select>

        </div>

        <!---TV Bill show--->
        <div id="div3" class="hidden">
            <label for="item_type" class="control-label">Utility Item Types</label>
            <select onchange="updateDiv2()" class="form-control" name="item_type[]" id="item_type3">
                <option value=""><i>--Please Select the Tv Subscription you want--</i></option>
                <option value="DSTV">DSTV</option>
                <option value="StartTime">StartTime</option>
                <option value="GoTv">GoTv</option>
                <option value="Netflix">Netflix</option>
            </select>

            <label for="item_type" class="control-label">Duration Plan</label>
            <i>Choose the duration plan your require</i>
            <select onchange="updateDiv2()" class="form-control" name="dur[]" id="dur1">
                <option value=""><i>--Please Select the duration you want--</i></option>
                <option value="Monthly Sub">Monthly Sub</option>
                <option value="Weekly Sub">Weekly Sub</option>
                <option value="Daily Sub">Daily Sub</option>
                <option value="One-Off Sub">One-Off Sub</option>
            </select>

        </div>

        <!---Internet Bill show--->
        <div id="div4" class="hidden">
            <label for="item_type" class="control-label">Utility Item Types</label>
            <select onchange="updateDiv2()" class="form-control" name="item_type[]" id="item_type4">
                <option value=""><i>--Please Select the Utility Item type you want--</i></option>
                <option value="Airtel">Airtel</option>
                <option value="Glo">Glo</option>
                <option value="Mtn">Mtn</option>
                <option value="9Mobile">9Mobile</option>
                <option value="Spectranet">Spectranet</option>
            </select>

            <label for="item_type" class="control-label">Duration Plan</label>
            <i>Choose the duration plan your require</i>
            <select onchange="updateDiv2()" class="form-control" name="dur[]" id="dur2">
                <option value=""><i>--Please Select the duration plan you want--</i></option>
                <option value="Monthly Subs">Monthly Subs</option>
                <option value="Weekly Subs">Weekly Subs</option>
                <option value="Daily Subs">Daily Subs</option>
                <option value="One-Off Subs">One-Off Subs</option>
            </select>

        </div>
        <!---------->
    </div>
    <label for="mobile" class="control-label">Your Recharging Details</label>
    <i>Meter No(Elcetricity)/ House No(Waste)/ Smart card No(TV)/ Phone Number(Internet)</i>
    <input type="number" class="form-control form-control-sm" name="details" id="details" value="" required>
    <!---
    <label for="mobile" class="control-label">Your Email Address</label>
    <i>Put in your mail address for confirmation message</i>
    <input type="email" class="form-control form-control-sm" name="mail" id="mail" value="" required>

    <label for="mobile" class="control-label">Your Mobile number</label>
    <i>Put in your personal mobile number</i>
    <input type="number" class="form-control form-control-sm" name="mobil" id="mobil" value="" required>
-->
    <div class=" form-group">
        <label for="mobile" class="control-label">Amount to pay</label>
        <i>Enter the Amount you want to pay</i>
        <input type="number" class="form-control form-control-sm" name="pay" id="pay" value="updateDiv2()" readonly required>

    </div>
    <button type="submit" class="btn btn-flat  bg-gradient-primary mx-2" name="step1" onclick="submitForm()"> PROCEED <i class="fa fa-angle-double-right"> </i></button>
    <a href="./index.php?page=utility_bills"><button type="button" class="btn btn-flat  bg-gradient-warning mx-2"><i class="fa fa-angle-double-left"> </i> BACK</button></a>
    </div>
</form>


<!---Script-->
<script>
    function updateDiv() {
        var item = document.getElementById("item");
        var div0 = document.getElementById("div0");
        var div1 = document.getElementById("div1");
        var div2 = document.getElementById("div2");
        var div3 = document.getElementById("div3");
        var div4 = document.getElementById("div4");

        // Hide all divs
        div0.classList.add("hidden");
        div1.classList.add("hidden");
        div2.classList.add("hidden");
        div3.classList.add("hidden");
        div4.classList.add("hidden");

        // Get the selected value from the select box
        var selectedValue = item.value;

        // Show the div corresponding to the selected value
        if (selectedValue === "Elcetricity Bill") {
            div1.classList.remove("hidden");
            div0.classList.add("hidden");
        } else if (selectedValue === "Waste Bill") {
            div2.classList.remove("hidden");
            div0.classList.add("hidden");
        } else if (selectedValue === "TV Subscription") {
            div3.classList.remove("hidden");
            div0.classList.add("hidden");
        } else if (selectedValue === "Internet Subscription") {
            div4.classList.remove("hidden");
            div0.classList.add("hidden");
        } else if (selectedValue === "item0") {
            div0.classList.remove("hidden");
        }
    }

    function updateDiv2() {
        var item_type2 = document.getElementById("item_type2");
        var item_type3 = document.getElementById("item_type3");
        var item_type4 = document.getElementById("item_type4");
        var dur1 = document.getElementById("dur1");
        var dur2 = document.getElementById("dur2");
        var pay = document.getElementById("pay");

        //Waste Bill
        // Get the selected value from the select box
        var selectedValue2 = item_type2.value;
        var MonthlyValue = 5000.00;
        var WeeklyValue = 2000.00;
        var DailyValue = 1200.00;
        var OneOffValue = 900.00;
        // Show the div corresponding to the selected value
        if (selectedValue2 === "Monthly Package") {
            pay.value = MonthlyValue;
        } else if (selectedValue2 === "Weekly Package") {
            pay.value = WeeklyValue;
        } else if (selectedValue2 === "Daily Package") {
            pay.value = DailyValue;
        } else if (selectedValue2 === "OneOff Package") {
            pay.value = OneOffValue;
        }

        //TV Bill
        // Get the selected value from the select box
        var selectedValue3 = item_type3.value;
        var selectedDur = dur1.value;
        var MonthlyValue0 = 12000.00;
        var WeeklyValue0 = 3600.00;
        var DailyValue0 = 1500.00;
        var OneOffValue0 = 800.00;
        var MonthlyValue1 = 15000.00;
        var WeeklyValue1 = 2500.00;
        var DailyValue1 = 1500.00;
        var OneOffValue1 = 900.00;
        var MonthlyValue2 = 5500.00;
        var WeeklyValue2 = 2500.00;
        var DailyValue2 = 1500.00;
        var OneOffValue2 = 800.00;
        var MonthlyValue3 = 25000.00;
        var WeeklyValue3 = 2500.00;
        var DailyValue3 = 1200.00;
        var OneOffValue3 = 600.00;

        // Show the div corresponding to the selected value
        if (selectedValue3 === "DSTV" && selectedDur === "Monthly Sub") {
            pay.value = MonthlyValue0;
        } else if (selectedValue3 === "DSTV" && selectedDur === "Weekly Sub") {
            pay.value = WeeklyValue0;
        } else if (selectedValue3 === "DSTV" && selectedDur === "Daily Sub") {
            pay.value = DailyValue0;
        } else if (selectedValue3 === "DSTV" && selectedDur === "One-Off Sub") {
            pay.value = OneOffValue0;
        } else if (selectedValue3 === "StartTime" && selectedDur === "Monthly Sub") {
            pay.value = MonthlyValue1;
        } else if (selectedValue3 === "StartTime" && selectedDur === "Weekly Sub") {
            pay.value = WeeklyValue1;
        } else if (selectedValue3 === "StartTime" && selectedDur === "Daily Sub") {
            pay.value = DailyValue1;
        } else if (selectedValue3 === "StartTime" && selectedDur === "One-Off Sub") {
            pay.value = OneOffValue1;
        } else if (selectedValue3 === "GoTv" && selectedDur === "Monthly Sub") {
            pay.value = MonthlyValue2;
        } else if (selectedValue3 === "GoTv" && selectedDur === "Weekly Sub") {
            pay.value = WeeklyValue2;
        } else if (selectedValue3 === "GoTv" && selectedDur === "Daily Sub") {
            pay.value = DailyValue2;
        } else if (selectedValue3 === "GoTv" && selectedDur === "One-Off Sub") {
            pay.value = OneOffValue2;
        } else if (selectedValue3 === "Netflix" && selectedDur === "Monthly Sub") {
            pay.value = MonthlyValue3;
        } else if (selectedValue3 === "Netflix" && selectedDur === "Weekly Sub") {
            pay.value = WeeklyValue3;
        } else if (selectedValue3 === "Netflix" && selectedDur === "Daily Sub") {
            pay.value = DailyValue3;
        } else if (selectedValue3 === "Netflix" && selectedDur === "One-Off Sub") {
            pay.value = OneOffValue3;
        }


        //TV Bill
        // Get the selected value from the select box
        var selectedValue4 = item_type4.value;
        var selectedDur1 = dur2.value;
        var MonthlyValueA = 6000.00;
        var WeeklyValueA = 3200.00;
        var DailyValueA = 1500.00;
        var OneOffValueA = 700.00;
        var MonthlyValueB = 8000.00;
        var WeeklyValueB = 3220.00;
        var DailyValueB = 2000.00;
        var OneOffValueB = 900.00;
        var MonthlyValueC = 6700.00;
        var WeeklyValueC = 3400.00;
        var DailyValueC = 2300.00;
        var OneOffValueC = 850.00;
        var MonthlyValueD = 15050.00;
        var WeeklyValueD = 4500.00;
        var DailyValueD = 1200.00;
        var OneOffValueD = 600.00;

        // Show the div corresponding to the selected value
        if (selectedValue4 === "Airtel" && selectedDur1 === "Monthly Subs") {
            pay.value = MonthlyValueA;
        } else if (selectedValue4 === "Airtel" && selectedDur1 === "Weekly Subs") {
            pay.value = WeeklyValueA;
        } else if (selectedValue4 === "Airtel" && selectedDur1 === "Daily Subs") {
            pay.value = DailyValueA;
        } else if (selectedValue4 === "Airtel" && selectedDur1 === "One-Off Subs") {
            pay.value = OneOffValueA;
        } else if (selectedValue4 === "Glo" && selectedDur1 === "Monthly Subs") {
            pay.value = MonthlyValueB;
        } else if (selectedValue4 === "Glo" && selectedDur1 === "Weekly Subs") {
            pay.value = WeeklyValueB;
        } else if (selectedValue4 === "Glo" && selectedDur1 === "Daily Subs") {
            pay.value = DailyValueB;
        } else if (selectedValue4 === "Glo" && selectedDur1 === "One-Off Subs") {
            pay.value = OneOffValueB;
        } else if (selectedValue4 === "Mtn" && selectedDur1 === "Monthly Subs") {
            pay.value = MonthlyValueC;
        } else if (selectedValue4 === "Mtn" && selectedDur1 === "Weekly Subs") {
            pay.value = WeeklyValueC;
        } else if (selectedValue4 === "Mtn" && selectedDur1 === "Daily Subs") {
            pay.value = DailyValueC;
        } else if (selectedValue4 === "Mtn" && selectedDur1 === "One-Off Subs") {
            pay.value = OneOffValueC;
        } else if (selectedValue4 === "9Mobile" && selectedDur1 === "Monthly Subs") {
            pay.value = MonthlyValueD;
        } else if (selectedValue4 === "9Mobile" && selectedDur1 === "Weekly Subs") {
            pay.value = WeeklyValueD;
        } else if (selectedValue4 === "9Mobile" && selectedDur1 === "Daily Subs") {
            pay.value = DailyValueD;
        } else if (selectedValue4 === "9Mobile" && selectedDur1 === "One-Off Subs") {
            pay.value = OneOffValueD;
        } else if (selectedValue4 === "Spectranet" && selectedDur1 === "Monthly Subs") {
            pay.value = MonthlyValueD;
        } else if (selectedValue4 === "Spectranet" && selectedDur1 === "Weekly Subs") {
            pay.value = WeeklyValueD;
        } else if (selectedValue4 === "Spectranet" && selectedDur1 === "Daily Subs") {
            pay.value = DailyValueD;
        } else if (selectedValue4 === "Spectranet" && selectedDur1 === "One-Off Subs") {
            pay.value = OneOffValueD;
        }

    }
</script>