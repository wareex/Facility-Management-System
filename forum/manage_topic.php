<?php include 'db_connect.php';
session_start();


if (isset($_GET['id'])) {
    $qry = $conn->query("SELECT * FROM topics where id=" . $_GET['id'])->fetch_array();
    foreach ($qry as $k => $v) {
        $$k = $v;
    }
}

?>
<div class="container-fluid">
    <form action="" id="manage-topic">
        <input type="hidden" name="id" value="<?php echo isset($_GET['id']) ? $_GET['id'] : '' ?>" class="form-control">
        <div class="row form-group">
            <div class="col-md-8">
                <label class="control-label">Title</label>
                <input type="text" name="title" class="form-control" value="<?php echo isset($title) ? $title : '' ?>">
            </div>
            <input type="hidden" name="user_id" value="<?php echo isset($_SESSION['login_UId']) ? $_SESSION['login_UId'] : ''  ?>" class="form-control">
        </div>
        <div class="row form-group">
            <div class="col-md-8">
                <label class="control-label">Tags/Category</label>
                <select name="category_ids[]" id="category_ids" multiple="multiple" class="custom-select select2">
                    <option value=""></option>
                    <?php
                    $tag = $conn->query("SELECT * FROM categories order by name asc");
                    while ($row = $tag->fetch_assoc()) :
                    ?>
                        <option value="<?php echo $row['id'] ?>" <?php echo isset($category_ids) && in_array($row['id'], explode(",", $category_ids)) ? "selected" : '' ?>><?php echo $row['name'] ?></option>
                    <?php endwhile; ?>
                </select>
            </div>
        </div>
        <div class="row form-group">
            <div class="col-md-12">
                <label class="control-label">Content</label>
                <textarea name="content" class="textarea"><?php echo isset($content) ? $content : '' ?></textarea>
            </div>
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
    $('#manage-topic').submit(function(e) {
        e.preventDefault()
        start_load()
        $('#msg').html('')
        $.ajax({
            url: 'ajax.php?action=save_topic',
            data: new FormData($(this)[0]),
            cache: false,
            contentType: false,
            processData: false,
            method: 'POST',
            type: 'POST',
            success: function(resp) {
                if (resp == 1) {
                    alert_toast("Topic successfully created.", 'success')
                    setTimeout(function() {
                        location.reload()
                    }, 1000)
                }
            }
        })
    })
</script>