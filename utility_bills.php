<?php include 'db_connect.php' ?>

<!---Style--->
<style>
  /** Colors **/
  @darkGreen: #4a6a28;
  @lightGreen: #87ba51;
  @greyState: #DDD;
  @mainBlue: #0070c0;
  @red: #4a6a28;

  ol {

    &.progress-track {
      display: table;
      list-style-type: none;
      margin: 0;
      padding: 2em 1em;
      table-layout: fixed;
      width: 100%;

      li {
        display: table-cell;
        line-height: 3em;
        position: relative;
        text-align: center;

        .icon-wrap {
          border-radius: 50%;
          top: -1.5em;

          color: #fff;
          display: block;
          height: 2.5em;
          margin: 0 auto -2em;
          left: 0;
          right: 0;
          position: absolute;
          width: 2.5em;
        }

        .icon-check-mark,
        .icon-down-arrow {
          height: 25px;
          width: 15px;
          display: inline-block;
          fill: currentColor;
        }

        .progress-text {
          position: relative;
          top: 10px;
        }

        &.progress-done {
          border-top: 7px solid #4a6a28;
          transition: border-color 1s ease-in-out;
          -webkit-transition: border-color 1s ease-in-out;
          -moz-transition: border-color 1s ease-in-out;

          .icon-down-arrow {
            display: none;
          }

          &.progress-current {

            .icon-wrap {
              background-color: #4a6a28;

              .icon-check-mark {
                display: none;
              }

              .icon-down-arrow {
                display: block;
              }
            }
          }

          .icon-wrap {
            background-color: #4a6a28;
            border: 5px solid #87ba51;
          }
        }

        &.progress-todo {
          border-top: 7px solid #DDD;
          color: black;

          .icon-wrap {
            background-color: #FFF;
            border: 5px solid #DDD;
            border-radius: 50%;
            bottom: 1.5em;
            color: #fff;
            display: block;
            height: 2.5em;
            margin: 0 auto -2em;
            position: relative;
            width: 2.5em;

            .icon-check-mark,
            .icon-down-arrow {
              display: none;
            }
          }
        }
      }
    }
  }
</style>
<!-- Add this to the <head> section of your HTML file -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>


<!-- Info boxes -->
<div class="col-12">
  <div class="card">
    <div class="card-body">
      Welcome! <b><?php
                  $wat =  $_SESSION['login_UId'];

                  $tenant = $conn->query("SELECT *,concat(tenants.lastname,', ',tenants.firstname,' ',tenants.middlename) as name FROM tenants where house_id = '$wat' ");
                  while ($row = $tenant->fetch_assoc()) :
                    echo ucwords($row['name']);
                  endwhile; ?>!</b>

    </div>
  </div>
</div>
<!-- Payement button redirect Table -->
<div class="col-lg-24">
  <div class="card card-outline card-primary">
    <div class="card-header">
      <div class="card-tools">
      <form action="./index.php?page=select_item" method="POST" id="billpage">
          <input type="hidden" class="form-control form-control-sm" name="amountpayableIn" id="amountpayableIn" value="" readonly>
          <input type="hidden" class="form-control form-control-sm" name="completedMonths" id="completedMonths" value="" readonly>
          <button type="submit" class="btn btn-block btn-sm btn-default btn-flat border-success make_payment" name="billpage"> Make Payments <i class="fa fa-angle-double-right"> </i></button>
                </form>
      </div>
    </div>
    <!-- Monthly Payement progress bar -->
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <table class="table tabe-hover table-bordered" id="list">
            <thead>
              <h3>Electricity Monthly Bills</h3>
              <tr>
                <ol class="progress-track" data-total-months="12">
                  <li class="progress-todo" data-value="2500">
                    <center>
                      <div class="icon-wrap">
                        <svg class="icon-state icon-check-mark">
                          <use xlink:href="#icon-check-mark"></use>
                        </svg>

                        <svg class="icon-state icon-down-arrow">
                          <use xlink:href="#icon-down-arrow"></use>
                        </svg>
                      </div>
                      <span class="progress-text">January</span>
                    </center>
                  </li>

                  <li class="progress-todo" data-value="2000">
                    <center>
                      <div class="icon-wrap">
                        <svg class="icon-state icon-check-mark">
                          <use xlink:href="#icon-check-mark"></use>
                        </svg>

                        <svg class="icon-state icon-down-arrow">
                          <use xlink:href="#icon-down-arrow"></use>
                        </svg>
                      </div>
                      <span class="progress-text">February</span>
                    </center>
                  </li>

                  <li class="progress-todo" data-value="2500">
                    <center>
                      <div class="icon-wrap">
                        <svg class="icon-state icon-check-mark">
                          <use xlink:href="#icon-check-mark"></use>
                        </svg>

                        <svg class="icon-state icon-down-arrow">
                          <use xlink:href="#icon-down-arrow"></use>
                        </svg>
                      </div>
                      <span class="progress-text">March</span>
                    </center>
                  </li>

                  <li class="progress-todo" data-value="2500">
                    <center>
                      <div class="icon-wrap">
                        <svg class="icon-state icon-check-mark">
                          <use xlink:href="#icon-check-mark"></use>
                        </svg>

                        <svg class="icon-state icon-down-arrow">
                          <use xlink:href="#icon-down-arrow"></use>
                        </svg>
                      </div>
                      <span class="progress-text">April</span>
                    </center>
                  </li>
                  <li class="progress-todo" data-value="2500">
                    <center>
                      <div class="icon-wrap">
                        <svg class="icon-state icon-check-mark">
                          <use xlink:href="#icon-check-mark"></use>
                        </svg>

                        <svg class="icon-state icon-down-arrow">
                          <use xlink:href="#icon-down-arrow"></use>
                        </svg>
                      </div>
                      <span class="progress-text">May</span>
                    </center>
                  </li>
                  <li class="progress-todo" data-value="2500">
                    <center>
                      <div class="icon-wrap">
                        <svg class="icon-state icon-check-mark">
                          <use xlink:href="#icon-check-mark"></use>
                        </svg>

                        <svg class="icon-state icon-down-arrow">
                          <use xlink:href="#icon-down-arrow"></use>
                        </svg>
                      </div>
                      <span class="progress-text">June</span>
                    </center>
                  </li>
                  <li class="progress-todo" data-value="2500">
                    <center>
                      <div class="icon-wrap">
                        <svg class="icon-state icon-check-mark">
                          <use xlink:href="#icon-check-mark"></use>
                        </svg>

                        <svg class="icon-state icon-down-arrow">
                          <use xlink:href="#icon-down-arrow"></use>
                        </svg>
                      </div>
                      <span class="progress-text">July</span>
                    </center>
                  </li>
                  <li class="progress-todo" data-value="2500">
                    <center>
                      <div class="icon-wrap">
                        <svg class="icon-state icon-check-mark">
                          <use xlink:href="#icon-check-mark"></use>
                        </svg>

                        <svg class="icon-state icon-down-arrow">
                          <use xlink:href="#icon-down-arrow"></use>
                        </svg>
                      </div>
                      <span class="progress-text">August</span>
                    </center>
                  </li>
                  <li class="progress-todo" data-value="2500">
                    <center>
                      <div class="icon-wrap">
                        <svg class="icon-state icon-check-mark">
                          <use xlink:href="#icon-check-mark"></use>
                        </svg>

                        <svg class="icon-state icon-down-arrow">
                          <use xlink:href="#icon-down-arrow"></use>
                        </svg>
                      </div>
                      <span class="progress-text">September</span>
                    </center>
                  </li>
                  <li class="progress-todo" data-value="2500">
                    <center>
                      <div class="icon-wrap">
                        <svg class="icon-state icon-check-mark">
                          <use xlink:href="#icon-check-mark"></use>
                        </svg>

                        <svg class="icon-state icon-down-arrow">
                          <use xlink:href="#icon-down-arrow"></use>
                        </svg>
                      </div>
                      <span class="progress-text">October</span>
                    </center>
                  </li>
                  <li class="progress-todo" data-value="2500">
                    <center>
                      <div class="icon-wrap">
                        <svg class="icon-state icon-check-mark">
                          <use xlink:href="#icon-check-mark"></use>
                        </svg>

                        <svg class="icon-state icon-down-arrow">
                          <use xlink:href="#icon-down-arrow"></use>
                        </svg>
                      </div>
                      <span class="progress-text">November</span>
                    </center>
                  </li>
                  <li class="progress-todo"data-value="2500">
                    <center>
                      <div class="icon-wrap">
                        <svg class="icon-state icon-check-mark">
                          <use xlink:href="#icon-check-mark"></use>
                        </svg>

                        <svg class="icon-state icon-down-arrow">
                          <use xlink:href="#icon-down-arrow"></use>
                        </svg>
                      </div>
                      <span class="progress-text">December</span>
                    </center>
                  </li>
                </ol>
              </tr>
            </thead>
          </table>
        </div>
      </div>
    </div>
    <!-- Payement History Table -->
    <div class="col-lg-12">
      <div class="card card-outline card-secondary">
        <div class="card-body">
          <table class="table tabe-hover table-bordered" id="list">
            <thead>
              <h3>Payments History</h3>
              <tr>
                <th class="text-center">#</th>
                <th>Items</th>
                <th>Items Type</th>
                <th>Amount Paid</th>
                <th>Duration</th>
                <th>Transaction ID</th>
                <th>Balance Due</th>
                <th>Date</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $ij = 1;
              $qry2 = $conn->query("SELECT *
				   FROM utility_bill WHERE utility_bill.UId = '$SessionId' ");
              while ($roww = $qry2->fetch_assoc()) :
              ?>
                <tr>
                  <td class="text-center"><?php echo $ij++ ?></td>
                  <td><?php echo $roww['item'] ?></td>
                  <td><?php echo $roww['item_type'] ?></td>
                  <td>N <?php echo $roww['pay'] ?></td>
                  <td> <?php echo $roww['duration'] ?></td>
                  <td> <?php echo $roww['trans_id'] ?></td>
                  <td>N <?php echo $roww['balance'] ?></td>
                  <td><?php echo $roww['date'] ?></td>
                  <td class="text-center">

                    <div class="btn-group">
                      <a href="./index.php?page=view_payment&payId=<?php echo $roww['id'] ?>" class="btn btn-primary btn-flat print_payment">RECEIPT
                      </a>
                    </div>
                  </td>
                </tr>
              <?php endwhile; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <script>
      $(document).ready(function() {
        $('#list').dataTable();
      })


     // Variable to hold indices of completed months
  var completedMonths = [];
  //var sumofcompletedMonths = calculateSum(completedMonths);

      function updateProgressBar() {
    // Get the current date
    var currentDate = new Date();

    // Get the current month (0-based index)
    var currentMonth = currentDate.getMonth(); // January is 0, February is 1, ..., December is 11

    // Get all progress-todo elements
    var todoItems = document.querySelectorAll('.progress-todo');


    // Get the total value for the progress bar
    var totalValue = parseInt(document.querySelector('.progress-track').getAttribute('data-total-months'));

    // Calculate the percentage completed
    var percentageCompleted = (amountPayable / totalValue) * 100;

    // Iterate through each progress-todo element and update the classes
    todoItems.forEach(function(item, index) {
      var monthValue = parseInt(item.getAttribute('data-value'));

      // Calculate the percentage for the current month
      var percentageMonth = (monthValue / totalValue) * 100;

      // Add the index of the completed month to the array
      if (!completedMonths.includes(index)) {
        completedMonths.push(index);
      }
    
      
      // Add progress-done class to completed months
      if (completedMonths.includes(index)) {
        item.classList.remove('progress-todo');
        item.classList.add('progress-done');
      }
      // Add progress-current class to the current month
      else if (index === currentMonth + 1) {
        item.classList.remove('progress-todo', 'progress-done');
        item.classList.add('progress-current');
      }
      // Add progress-todo class to future months
      else {
        item.classList.remove('progress-done', 'progress-current');
        item.classList.add('progress-todo');
      }
      
    });
    
    //Sum of fugding monthsss
    var sumofcompletedMonths = completedMonths.length;

    document.getElementById('completedMonths').value = sumofcompletedMonths;

     // Sum up the values of completed months
     var amountPayable = 0;
    document.querySelectorAll('.progress-done').forEach(function(item) {
      amountPayable += parseInt(item.getAttribute('data-value'));
    });

    // Display the amountPayable in the input box
    document.getElementById('amountpayableIn').value = amountPayable;
  }


  // Call the updateProgressBar function when the page is loaded
  $(document).ready(function() {
    updateProgressBar();
  });

  // A button that triggers a month change, you can do:
  // $('#changeMonthButton').on('click', updateProgressBar);
     
</script>
