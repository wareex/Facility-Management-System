<?php include 'db_connect.php' ?>
<div class="col-lg-12">
    <div class="card card-outline card-primary">
        <div class="card-header">
            <div class="card-tools">
            </div>
        </div>

        <?php
        $wat =  $_SESSION['login_UId'];
        $tenant = $conn->query("SELECT *,tenants.house_id FROM tenants where house_id = '$wat' ");
        while ($row = $tenant->fetch_assoc()) :
            //echo $row['house_id'];
        ?>
            <div class="card-body">
                <table class="table tabe-hover table-bordered" id="list">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th>Name</th>
                            <th>Service Type</th>
                            <th>Phone Number</th>
                            <th>Status</th>

                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        $qry = $conn->query("SELECT *
					FROM agents  ");
                        while ($row = $qry->fetch_assoc()) :
                        ?>
                            <tr>
                                <td><?php echo $i++ ?></td>
                                <td><?php echo $row['name'] ?></td>
                                <td><?php echo $row['service'] ?></td>
                                <td><?php echo $row['phone_no'] ?></td>
                                <td><?php if ($row['status'] == 1) : ?>
                                        <span class="badge badge-danger">Unavailable</span>
                                    <?php else : ?>
                                        <span class="badge badge-success">Available</span>
                                    <?php endif; ?>
                                </td>

                                <td class="text-center">

                                    <div class="btn-group">
                                        <?php if ($row['UId'] == $_SESSION['login_UId'] and $row['status'] == 1) : ?>
                                            <button class="btn btn-sm btn-outline-primary release_agent" type="button" data-id="<?php echo $row['id'] ?>">Release Agent</button>
                                        <?php elseif ($row['UId'] == $_SESSION['login_UId'] and $row['status'] == 0) : ?>
                                            <button class="btn btn-sm btn-outline-primary select_agent" type="button" data-id="<?php echo $row['id'] ?>">SELECT</button>
                                        <?php elseif ($row['UId'] !== $_SESSION['login_UId'] and $row['status'] == 1) : ?>
                                            <button class="btn btn-sm btn-outline-primary check_requester" type="button" data-id="<?php echo $row['id'] ?>">Check Requester</button>
                                            <?php elseif ($row['UId'] !== $_SESSION['login_UId'] and $row['status'] == 0) : ?>
                                                <button class="btn btn-sm btn-outline-primary select_agent" type="button" data-id="<?php echo $row['id'] ?>">SELECT</button>
                                        <?php endif; ?>
                                    </div>
            </div>
            </td>
            </tr>
        <?php endwhile; ?>
        </tbody>
        </table>
    </div>

<?php endwhile; ?>
</div>
<script>
    $(document).ready(function() {
        $('#list').dataTable()

        $('.select_agent').click(function() {
            uni_modal("Agent Request", "select_agent.php?id=" + $(this).attr('data-id'), "large")
        })
        $('.check_requester').click(function() {
            uni_modal("Requester", "check_requester.php?id=" + $(this).attr('data-id'), "large")
        })
        $('.release_agent').click(function() {
            uni_modal("Are you done with this Agent?", "release_agent.php?id=" + $(this).attr('data-id'), "large")
            //_conf("Are you done with this Agent?", "release_agent", [$(this).attr('data-id')])
        })
        /*
                   function release_agent($id) {
                       start_load()
                       $.ajax({
                           url: 'ajax.php?action=release_agent',
                           method: 'POST',
                           data: {
                               id: $id
                           },
                           success: function(resp) {
                               if (resp == 1) {
                                   alert_toast("Agent has successfully been released", 'success')
                                   setTimeout(function() {
                                       location.reload()
                                   }, 1500)

                               }
                           }
                       })
                   }*/
    })
</script>