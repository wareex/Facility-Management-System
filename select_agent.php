<?php
include 'db_connect.php';
session_start();
$wat = $_SESSION['login_UId'];
 $tenant = $conn->query("SELECT *,concat(tenants.lastname,', ',tenants.firstname,' ',tenants.middlename) as name,  tenants.house_id FROM tenants where house_id = '$wat' ");
 while ($row = $tenant->fetch_assoc()) :

 //echo ucwords($row['name']);
 
                                                                               
if (isset($_GET['id'])) {
    $qry = $conn->query("SELECT * FROM agents where id= " . $_GET['id']);
    foreach ($qry->fetch_array() as $k => $val) {
        $$k = $val;
    }
}

?>
<div class="container-fluid">
    <form action="" id="manage-agent">
        <input type="hidden" name="id" value="<?php echo isset($id) ? $id : '' ?>">
        <div class="form-group row">
            <div class="col-md-4">
                <label for="" class="control-label">Name</label>
                <input type="text" class="form-control" name="name" value="<?php echo isset($name) ? $name : '' ?>" readonly>
            </div>
            <div class="col-md-4">
                <label for="" class="control-label">Phone Number</label>
                <input type="text" class="form-control" name="phone_no" value="<?php echo isset($phone_no) ? $phone_no : '' ?>" readonly>
            </div>
            <div class="col-md-4">
                <label for="" class="control-label">Service</label>
                <input type="text" class="form-control" name="service" value="<?php echo isset($service) ? $service : '' ?>" readonly>
            </div>

        </div>
        <div class="row form-group">
            <div class="col-md-4">
                <label for="" class="control-label">Purpose</label>
                <input type="textarea" class="form-control" name="purpose" value="" required>
            </div>
            <div class=" col-md-4">
                <label for="" class="control-label">Request Date</label>
                <input type="date" class="form-control" name="date_req" value="" required>
            </div>
            <div class=" col-md-4">
                <label for="" class="control-label">Expected End Date</label>
                <input type="date" class="form-control" name="date_end" value="" required>
            </div>
            <div class="col-md-4">
                <input type="hidden" class="form-control" name="requester" value="<?php echo ucwords($row['name']);?>">
            </div>
            <div class="col-md-4">
                <input type="hidden" class="form-control" name="status" value="<?php echo "1"; ?>">
                <input type="hidden" class="form-control" name="UId" value="<?php echo $row['house_id']; ?>">
            </div>
            <?php endwhile;?>
        </div>
    </form>
</div>
<script>
    $(document).ready(function() {
        if ('<?php echo isset($id) ? 1 : 0 ?>' == 1)
            $('#tenant_id').trigger('change')
    })
    $('.select2').select2({
        placeholder: "Please Select Here",
        width: "100%"
    })
    $('#tenant_id').change(function() {
        if ($(this).val() <= 0)
            return false;

        start_load()
        $.ajax({
            url: 'ajax.php?action=get_tdetails',
            method: 'POST',
            data: {
                id: $(this).val(),
                pid: '<?php echo isset($id) ? $id : '' ?>'
            },
            success: function(resp) {
                if (resp) {

                }
            },
            complete: function() {
                end_load()
            }
        })
    })
    $('#manage-agent').submit(function(e) {
        e.preventDefault()
        start_load()
        $('#msg').html('')
        $.ajax({
            url: 'ajax.php?action=save_agent',
            data: new FormData($(this)[0]),
            cache: false,
            contentType: false,
            processData: false,
            method: 'POST',
            type: 'POST',
            success: function(resp) {
                if (resp == 1) {
                    alert_toast("Agent successfully requested.", 'success')
                    setTimeout(function() {
                        location.reload()
                    }, 1000)
                }
            }
        })
    })
</script>