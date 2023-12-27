<?php
session_start();
ini_set('display_errors', 1);
class Action
{
	private $db;

	public function __construct()
	{
		ob_start();
		include 'db_connect.php';

		$this->db = $conn;
	}
	function __destruct()
	{
		$this->db->close();
		ob_end_flush();
	}

	function login()
	{
		extract($_POST);
		$qry = $this->db->query("SELECT * FROM tenant_login
			WHERE tenant_login.UId = '" . $username . "' and tenant_login.password = '" . md5($password) . "' ");
		if ($qry->num_rows > 0) {
			foreach ($qry->fetch_array() as $key => $value) {
				if ($key != 'password' && !is_numeric($key))
					$_SESSION['login_' . $key] = $value;
			}
			return 1;
		} else {
			return 2;
		}
	}
	function logout()
	{
		session_destroy();
		foreach ($_SESSION as $key => $value) {
			unset($_SESSION[$key]);
		}
		header("location:login.php");
	}


	function update_user()
	{
		extract($_POST);
		$data = "";
		foreach ($_POST as $k => $v) {
			if (!in_array($k, array('id', 'ref_code')) && !is_numeric($k)) {
				if (empty($data)) {
					$data .= " $k='$v' ";
				} else {
					$data .= ", $k='$v' ";
				}
			}
		}
		if (empty($id)) {
			$save = $this->db->query("INSERT INTO tenant_login set $data");
			$id = $this->db->insert_id;
		} else {
			$save = $this->db->query("UPDATE tenant_login set $data where id = $id");
		}

		if ($save) {
			return 1;
		}
	}
	function delete_user()
	{
		extract($_POST);
		$delete = $this->db->query("DELETE FROM tenants where id = " . $id);
		if ($delete)
			return 1;
	}
	function save_image()
	{
		extract($_FILES['file']);
		if (!empty($tmp_name)) {
			$fname = strtotime(date("Y-m-d H:i")) . "_" . (str_replace(" ", "-", $name));
			$move = move_uploaded_file($tmp_name, '../assets/uploads/' . $fname);
			$protocol = strtolower(substr($_SERVER["SERVER_PROTOCOL"], 0, 5)) == 'https' ? 'https' : 'http';
			$hostName = $_SERVER['HTTP_HOST'];
			$path = explode('/', $_SERVER['PHP_SELF']);
			$currentPath = '/' . $path[1];
			if ($move) {
				return $protocol . '://' . $hostName . $currentPath . '/assets/uploads/' . $fname;
			}
		}
	}

	function pay_bill()
	{
		extract($_POST);
		$data = "";
		foreach ($_POST as $k => $v) {
			if (!in_array($k, array('id', 'ref_code')) && !is_numeric($k)) {
				if (empty($data)) {
					$data .= " $k='$v' ";
				} else {
					$data .= ", $k='$v' ";
				}
			}
		}
		if (empty($id)) {
			$save = $this->db->query("INSERT INTO utility_bill set $data");
			$id = $this->db->insert_id;
		}
		if ($save) {
			return 1;
		}
	}


	function save_agent()
	{
		extract($_POST);
		$data = "";
		foreach ($_POST as $k => $v) {
			if (!in_array($k, array('id', 'ref_code')) && !is_numeric($k)) {
				if (empty($data)) {
					$data .= " $k='$v' ";
				} else {
					$data .= ", $k='$v' ";
				}
			}
		}
		if (empty($id)) {
			$save = $this->db->query("INSERT INTO agents set $data");
			$id = $this->db->insert_id;
		} else {
			$save = $this->db->query("UPDATE agents set $data where id = $id");
		}

		if ($save) {
			return 1;
		}
	}

	function release_agent()
	{
		extract($_POST);
		$data = "";
		foreach ($_POST as $k => $v) {
			if (!in_array($k, array('id', 'ref_code')) && !is_numeric($k)) {
				if (empty($data)) {
					$data .= " $k='$v' ";
				} else {
					$data .= ", $k='$v' ";
				}
			}
		}
		if (empty($id)) {
			$save = $this->db->query("INSERT INTO agents set $data");
			$id = $this->db->insert_id;
		} else {
			$save = $this->db->query("UPDATE agents set requester= '', status = '0', purpose ='', date_req = '', date_end = '' where id = $id");
		}

		if ($save) {
			return 1;
		}
	}

	function save_category()
	{
		extract($_POST);
		$data = " name = '$name' ";
		$data .= ", description = '$description' ";
		if (empty($id)) {
			$save = $this->db->query("INSERT INTO categories set $data");
		} else {
			$save = $this->db->query("UPDATE categories set $data where id = $id");
		}
		if ($save)
			return 1;
	}
	function delete_category()
	{
		extract($_POST);
		$delete = $this->db->query("DELETE FROM categories where id = " . $id);
		if ($delete) {
			return 1;
		}
	}

	function save_topic()
	{
		extract($_POST);
		$data = " title = '$title' ";
		$data .= ", user_id = '{$_SESSION['login_UId']}' ";
		$data .= ", category_ids = '" . (implode(",", $category_ids)) . "' ";
		$data .= ", content = '" . htmlentities(str_replace("'", "&#x2019;", $content)) . "' ";

		if (empty($id)) {
			$save = $this->db->query("INSERT INTO topics set " . $data);
		} else {
			$save = $this->db->query("UPDATE topics set " . $data . " where id=" . $id);
		}
		if ($save)
			return 1;
	}
	function delete_topic()
	{
		extract($_POST);
		$delete = $this->db->query("DELETE FROM topics where id = " . $id);
		if ($delete) {
			return 1;
		}
	}
	function save_comment()
	{
		extract($_POST);
		$data = " comment = '" . htmlentities(str_replace("'", "&#x2019;", $comment)) . "' ";

		if (empty($id)) {
			$data .= ", topic_id = '$topic_id' ";
			$data .= ", user_id = '{$_SESSION['login_UId']}' ";
			$save = $this->db->query("INSERT INTO comments set " . $data);
		} else {
			$save = $this->db->query("UPDATE comments set " . $data . " where id=" . $id);
		}
		if ($save)
			return 1;
	}
	function delete_comment()
	{
		extract($_POST);
		$delete = $this->db->query("DELETE FROM comments where id = " . $id);
		if ($delete) {
			return 1;
		}
	}
	function save_reply()
	{
		extract($_POST);
		$data = " reply = '" . htmlentities(str_replace("'", "&#x2019;", $reply)) . "' ";

		if (empty($id)) {
			$data .= ", comment_id = '$comment_id' ";
			$data .= ", user_id = '{$_SESSION['login_UId']}' ";
			$save = $this->db->query("INSERT INTO replies set " . $data);
		} else {
			$save = $this->db->query("UPDATE replies set " . $data . " where id=" . $id);
		}
		if ($save)
			return 1;
	}
	function delete_reply()
	{
		extract($_POST);
		$delete = $this->db->query("DELETE FROM replies where id = " . $id);
		if ($delete) {
			return 1;
		}
	}
	function search()
	{
		extract($_POST);
		$data = array();
		$tag = $this->db->query("SELECT * FROM categories order by name asc");
		while ($row = $tag->fetch_assoc()) :
			$tags[$row['id']] = $row['name'];
		endwhile;
		$ts = $this->db->query("SELECT * FROM categories where name like '%{$keyword}%' ");
		$tsearch = '';
		while ($row = $ts->fetch_assoc()) :
			$tsearch .= " or concat('[',REPLACE(t.category_ids,',','],['),']') like '%[{$row['id']}]%' ";
		endwhile;
		// echo "SELECT t.*,u.name FROM topics t inner join users u on u.id = t.user_id where t.title LIKE '%{$keyword}%' or content LIKE '%{$keyword}%' $tsearch order by unix_timestamp(t.date_created) desc";
		$topic = $this->db->query("SELECT t.*,u.name FROM topics t inner join tenants u on u.house_id = t.user_id where t.title LIKE '%{$keyword}%' or content LIKE '%{$keyword}%' $tsearch order by unix_timestamp(t.date_created) desc");
		while ($row = $topic->fetch_assoc()) :
			$trans = get_html_translation_table(HTML_ENTITIES, ENT_QUOTES);
			unset($trans["\""], $trans["<"], $trans[">"], $trans["<h2"]);
			$desc = strtr(html_entity_decode($row['content']), $trans);
			$row['desc'] = strip_tags(str_replace(array("<li>", "</li>"), array("", ","), $desc));
			$row['view'] = $this->db->query("SELECT * FROM forum_views where topic_id=" . $row['id'])->num_rows;
			$row['comments'] = $this->db->query("SELECT * FROM comments where topic_id=" . $row['id'])->num_rows;
			$row['replies'] = $this->db->query("SELECT * FROM replies where comment_id in (SELECT id FROM comments where topic_id=" . $row['id'] . ")")->num_rows;
			$row['tags'] = array();
			foreach (explode(",", $row['category_ids']) as $cat) :
				$row['tags'][] = $tags[$cat];
			endforeach;
			$row['created'] = date('M d, Y h:i A', strtotime($row['date_created']));
			$row['posted'] = ucwords($row['name']);
			$data[] = $row;
		endwhile;
		return json_encode($data);
	}
}
