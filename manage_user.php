<?php include 'db_connect.php';

$wat =  $_SESSION['login_UId'];

$tenant = $conn->query("SELECT housie_id FROM tenants where house_id = '$wat' ");
while ($row = $tenant->fetch_assoc()) :

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
				<input type="text" name="UId" value="<?php echo $row['house_id'];
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
	<?php endwhile; ?>
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
				error: err => {
					console.log(err)
				},
				success: function(resp) {
					resp = JSON.parse(resp)
					if (resp.status == 1) {
						location.replace('index.php')
					} else {
						$('#msg').html("<div class='alert alert-danger'>" + resp.msg + "</div>")
						end_load()
					}
				}
			})

		})
	</script>