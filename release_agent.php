<?php
include 'db_connect.php';
session_start();
$wat = $_SESSION['login_UId'];
 $tenant = $conn->query("SELECT *,concat(tenants.lastname,', ',tenants.firstname,' ',tenants.middlename) as name FROM tenants where house_id = '$wat' ");
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
    <form action="" id="release-agent">
        <input type="hidden" name="id" value="<?php echo isset($id) ? $id : '' ?>">
        <div class="form-group row">
            <div class="col-md-4">
                <label for="" class="control-label">Name</label>
                <input type="text" class="form-control" name="name" value="<?php echo isset($name) ? $name : '' ?>" readonly>
            </div>
            <div class="col-md-4">
                <label for="" class="control-label">Your Purpose</label>
                <input type="text" class="form-control" name="purpose" value="<?php echo isset($purpose) ? $purpose : '' ?>" readonly>
            </div>
            <div class="col-md-4">
                <label for="" class="control-label">Service</label>
                <input type="text" class="form-control" name="service" value="<?php echo isset($service) ? $service : '' ?>" readonly>
            </div>

        </div>
        <div class="row form-group">
            <div class=" col-md-4">
                <label for="" class="control-label">Requested Date</label>
                <input type="text" class="form-control" name="date_req" value="<?php echo isset($date_req) ? $date_req : '' ?>" readonly>
            </div>
            <div class=" col-md-4">
                <label for="" class="control-label">Expected End Date</label>
                <input type="text" class="form-control" name="date_end" value="<?php echo isset($date_end) ? $date_end : '' ?>" readonly>
            </div>
            <div class="col-md-4">
                <input type="hidden" class="form-control" name="requester" value="<?php echo isset($requester) ? $requester : '' ?>" readonly>
            </div>
            <div class="col-md-4">
                <input type="hidden" class="form-control" name="status" value="<?php echo "0"; ?>">
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
            url: 'ajax.php?action=release_agent',
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
    $('#release-agent').submit(function(e) {
        e.preventDefault()
        start_load()
        $('#msg').html('')
        $.ajax({
            url: 'ajax.php?action=release_agent',
            data: new FormData($(this)[0]),
            cache: false,
            contentType: false,
            processData: false,
            method: 'POST',
            type: 'POST',
            success: function(resp) {
                if (resp == 1) {
                    alert_toast("Agent successfully Released.", 'success')
                    setTimeout(function() {
                        location.reload()
                    }, 1000)
                }
            }
        })
    })
</script>