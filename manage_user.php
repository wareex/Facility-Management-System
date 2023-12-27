<?php
include('db_connect.php');
session_start();
if (isset($_GET['id'])) {
	$user = $conn->query("SELECT * FROM tenant_login where tenant_login.UId =" . $_GET['id']);
	foreach ($user->fetch_array() as $k => $v) {
		$$k = $v;
	}
}
?>
<div class="container-fluid">
	<div id="msg"></div>
	<form action="" id="manage-user">
		<input type="hidden" name="id" value="<?php echo isset($id) ? $id : '' ?>">
		<div class="form-group">
			<label for="password">Old Password</label>
			<input type="password" name="oldPwd" id="password" class="form-control" placeholder="Enter current password" required>
		</div>
		<div class="form-group">
			<label for="password">New Password</label>
			<input type="password" name="newPwd1" id="password" class="form-control" placeholder="Type your new password" required>
		</div>
		<div class="form-group">
			<label for="password">Retype New Password</label>
			<input type="password" name="newPwd2" id="password" class="form-control" placeholder="Retype your new password" required autocomplete="off">
		</div>

	</form>
</div>
<style>
	img#cimg {
		max-height: 15vh;
		/*max-width: 6vw;*/
	}
</style>
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
			url: 'ajax.php?action=update_user',
			data: new FormData($(this)[0]),
			cache: false,
			contentType: false,
			processData: false,
			method: 'POST',
			type: 'POST',
			success: function(resp) {
				if (resp == 1) {
					alert_toast("Password Successfully Changed.", 'success')
					setTimeout(function() {
						location.reload()
					}, 1000)
				}
			}
		})
	})
</script>