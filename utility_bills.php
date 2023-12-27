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
        <a href="./index.php?page=select_item" class="btn btn-block btn-sm btn-default btn-flat border-success make_payment">Make Payments
        </a>
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
                <ol class="progress-track">
                  <li class="progress-done">
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

                  <li class="progress-done progress-current">
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

                  <li class="progress-todo">
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

                  <li class="progress-todo">
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
                  <li class="progress-todo">
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
                  <li class="progress-todo">
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
                  <li class="progress-todo">
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
                  <li class="progress-todo">
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
                  <li class="progress-todo">
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
                  <li class="progress-todo">
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
                  <li class="progress-todo">
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
                  <li class="progress-todo">
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

          <table class="table tabe-hover table-bordered" id="list">
            <thead>
              <h3>Waste Monthly Bills</h3>
              <tr>
                <ol class="progress-track">
                  <li class="progress-done">
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

                  <li class="progress-done progress-current">
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

                  <li class="progress-todo">
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

                  <li class="progress-todo">
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
                  <li class="progress-todo">
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
                  <li class="progress-todo">
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
                  <li class="progress-todo">
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
                  <li class="progress-todo">
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
                  <li class="progress-todo">
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
                  <li class="progress-todo">
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
                  <li class="progress-todo">
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
                  <li class="progress-todo">
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
                  <td>N <?php echo $roww['amountpaid'] ?></td>
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
    </script>