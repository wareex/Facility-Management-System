<?php include('db_connect.php'); 
?>
<!-- Info boxes -->
<div class="col-12">
	<div class="card">
		<div class="card-body">

			<div class="img">
				<img src="assets/uploads/<?php echo $_SESSION['login_avatar'] ?>" id="pp" alt="">
			</div>
			Welcome <b><?php
						$wat =  $_SESSION['login_UId'];

						$tenant = $conn->query("SELECT *,concat(tenants.lastname,', ',tenants.firstname,' ',tenants.middlename) as name FROM tenants where house_id = '$wat' ");
						while ($row = $tenant->fetch_assoc()) :
							echo ucwords($row['name']);
						endwhile;

						?>!</b>

		</div>
	</div>
</div>
</div>
<!------------------------------------------------------------------------------------------------------------------------>
<div class="container-fluid">
	<style>
		input[type=checkbox] {
			/* Double-sized Checkboxes */
			-ms-transform: scale(1.5);
			/* IE */
			-moz-transform: scale(1.5);
			/* FF */
			-webkit-transform: scale(1.5);
			/* Safari and Chrome */
			-o-transform: scale(1.5);
			/* Opera */
			transform: scale(1.5);
			padding: 10px;
		}

		.list-group-item+.list-group-item {
			border-top-width: 1px !important;
		}

		#profile {
			display: flex;
			height: calc(100%);
			width: calc(100%);
			justify-content: center;
			align-items: center
		}

		#pp {
			max-width: calc(100%);
			max-height: calc(100%);
			border-radius: 100%;
		}

		.img {
			width: 80px;
			height: 85px;
			align-self: center;
			border-radius: 50%;
			border: 3px solid #808080c2;
			display: flex;
			justify-content: center;
			text-align: -webkit-auto;
		}
		#cheader{
		height: calc(10%);
		border-bottom: 3px solid #ecececab;
		padding:1em .5em;
	}
	#cheader img{
		max-width: calc(100%);
		max-height:calc(100%);
		    border-radius: 100%;
	}
		#cheader .uavatar {
	    width: 50px;
	    height: 50px;
	    align-self: center;
	    border-radius: 50%;
	    border: 3px solid #808080c2;
	    display: flex;
	    justify-content: center;
	    text-align: -webkit-auto;
	}
	</style>
	<div class="col-lg-12">
		<div class="row mb-4 mt-4">
			<div class="col-md-12">

			</div>
		</div>
		<div class="row">
			<!-- FORM Panel -->

			<!-- Table Panel -->
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<h6 class="font-weight-medium"><a href="javascript:void(0)" class="linking"><b>FORUM CHATS</b></a></h6>
						<span class="">

							<button class="btn btn-primary btn-block btn-sm col-sm-2 float-right" type="button" id="new_topic">
								<i class="fa fa-plus"></i> Create Topic</button>
						</span>
					</div>
					<div class="card-body">
						<ul class="w-100 list-group" id="topic-list">
							<?php
							$tag = $conn->query("SELECT * FROM categories order by name asc");
							while ($row = $tag->fetch_assoc()) :
								$tags[$row['id']] = $row['name'];
							endwhile;
							$topic = $conn->query("SELECT t.*,tenants.firstname,tenants.house_id,tenant_login.avatar FROM topics t left join tenants on tenants.house_id = t.user_id left join tenant_login on tenant_login.UId = t.user_id  order by unix_timestamp(date_created) desc");
							while ($row = $topic->fetch_assoc()) :
								$trans = get_html_translation_table(HTML_ENTITIES, ENT_QUOTES);
								unset($trans["\""], $trans["<"], $trans[">"], $trans["<h2"]);
								$desc = strtr(html_entity_decode($row['content']), $trans);
								$desc = str_replace(array("<li>", "</li>"), array("", ","), $desc);
								$view = $conn->query("SELECT * FROM forum_views where topic_id=" . $row['id'])->num_rows;
								$comments = $conn->query("SELECT * FROM comments where topic_id=" . $row['id'])->num_rows;
								$replies = $conn->query("SELECT * FROM replies where comment_id in (SELECT id FROM comments where topic_id=" . $row['id'] . ")")->num_rows;
									?>
								<li class="list-group-item mb-4">
									<div>
										<?php if ($_SESSION['login_UId'] == $row['user_id']) : ?>
											<div class="dropleft float-right mr-4">
												<a class="text-dark" href="javascript:void(0)" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
													<span class="fa fa-ellipsis-v"></span>
												</a>
												<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
													<a class="dropdown-item edit_topic" data-id="<?php echo $row['id'] ?>" href="javascript:void(0)">Edit</a>
													<a class="dropdown-item delete_topic" data-id="<?php echo $row['id'] ?>" href="javascript:void(0)">Delete</a>
												</div>
											</div>
										<?php endif; ?>
										<span class="float-right mr-4"><small><i>Created: <?php echo date('M d, Y h:i A', strtotime($row['date_created'])) ?></i></small></span>
										<a href="index.php?page=forum/view_forum&id=<?php echo $row['id'] ?>" class=" filter-text"><?php echo $row['title'] ?></a>

									</div>
									<hr>
									<p class="truncate filter-text"><?php echo strip_tags($desc) ?></p>
									<div class="w-100" id="cheader">
										<table class="" width="100%">
											<tr>
												<td width="10%"><div class="uavatar"><img src="assets/uploads/<?php echo $row['avatar'] ?>" alt=""></div></td>
												<td><p class="row justify-content-left"><span class="badge badge-success text-white"><i>Posted By: <?php echo $row['firstname'] ?> </i></span></p></td>
											</tr>
										</table>
									</div>
									<hr>

									<span class="float-left badge badge-secondary text-white"><?php echo number_format($view) ?> view/s</span>
									<span class="float-left badge badge-primary text-white ml-2"><i class="fa fa-comments"></i> <?php echo number_format($comments) ?> comment/s <?php echo $replies > 0 ? " and " . number_format($replies) . ' replies' : '' ?> </span>
									<span class="float-right">
										<span>Tags: </span>
										<?php
										foreach (explode(",", $row['category_ids']) as $cat) :
										?>
											<span class="badge badge-info text-white ml-2"><?php echo $tags[$cat] ?></span>
										<?php endforeach; ?>
									</span>
								</li>
							<?php endwhile; ?>
						</ul>
					</div>
				</div>
			</div>
			<!-- Table Panel -->
		</div>
	</div>

</div>
<style>
	td {
		vertical-align: middle !important;
	}

	td p {
		margin: unset
	}

	img {
		max-width: 100px;
		max-height: 150px;
	}
</style>
<script>
	$(document).ready(function() {
		$('table').dataTable()
	})

	$('#new_topic').click(function() {
		uni_modal("New Entry", "./forum/manage_topic.php", 'mid-large')
	})

	$('.edit_topic').click(function() {
		uni_modal("Edit Topic", "./forum/manage_topic.php?id=" + $(this).attr('data-id'), 'mid-large')

	})
	$('.delete_topic').click(function() {
		_conf("Are you sure to delete this topic?", "delete_topic", [$(this).attr('data-id')], 'mid-large')
	})

	$('#topic-list').JPaging({
		pageSize: 15,
		visiblePageSize: 10,
	})


	function delete_topic($id) {
		start_load()
		$.ajax({
			url: 'ajax.php?action=delete_topic',
			method: 'POST',
			data: {
				id: $id
			},
			success: function(resp) {
				if (resp == 1) {
					alert_toast("Data successfully deleted", 'success')
					setTimeout(function() {
						location.reload()
					}, 1500)

				}
			}
		})
	}
</script>
<!-------------------------------------->
<!-- Column -->