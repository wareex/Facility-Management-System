<?php include 'db_connect.php';
session_start();
?>
<style>
	img#cimg {
		max-width: 150px;
		max-height: 200px;
	}
</style>
<div class="container-fluid">
	<form action="" id="set_pics">
		<div id="msg"></div>
		<div class="form-group">
			<label for="" class="control-label">User ID</label>
			<input type="text" name="UId" value="<?php echo $_SESSION['login_UId'];
													?>" class="form-control" readonly required>
		</div>
		<div class="form-group">
			<label for="" class="control-label">User Profile Picture</label>
			<input type="file" class="form-control" name="img" onchange="displayImg(this,$(this))">
		</div>
		<div class="form-group">
			<img src="" alt="" id="cimg">
		</div>
	</form>
</div>
<script>
	function displayImg(input, _this) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function(e) {
				$('#cimg').attr('src', e.target.result);
			}

			reader.readAsDataURL(input.files[0]);
		}
	}
	$('#set_pics').submit(function(e) {
		e.preventDefault()
		start_load()
		$('#msg').html('')
		$.ajax({
			url: 'ajax.php?action=set_pics',
			data: new FormData($(this)[0]),
			cache: false,
			contentType: false,
			processData: false,
			method: 'POST',
			type: 'POST',
			success: function(resp) {
				if (resp == 1) {
					alert_toast("Profile Picture Successfully Set.", 'success')
					setTimeout(function() {
						location.reload()
					}, 1000)
				}
			}
		})
	})
</script>