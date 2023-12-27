<?php
ob_start();
$action = $_GET['action'];
include 'admin_class.php';
$crud = new Action();
if ($action == 'login') {
	$login = $crud->login();
	if ($login)
		echo $login;
}
if ($action == 'login2') {
	$login = $crud->login2();
	if ($login)
		echo $login;
}
if ($action == 'logout') {
	$logout = $crud->logout();
	if ($logout)
		echo $logout;
}
if ($action == 'logout2') {
	$logout = $crud->logout2();
	if ($logout)
		echo $logout;
}
if ($action == 'save_user') {
	$save = $crud->save_user();
	if ($save)
		echo $save;
}
if ($action == 'delete_user') {
	$save = $crud->delete_user();
	if ($save)
		echo $save;
}
if ($action == 'signup') {
	$save = $crud->signup();
	if ($save)
		echo $save;
}
if ($action == 'update_account') {
	$save = $crud->update_account();
	if ($save)
		echo $save;
}
if ($action == "save_settings") {
	$save = $crud->save_settings();
	if ($save)
		echo $save;
}
if ($action == "save_category") {
	$save = $crud->save_category();
	if ($save)
		echo $save;
}

if ($action == "delete_category") {
	$delete = $crud->delete_category();
	if ($delete)
		echo $delete;
}
if ($action == "save_house") {
	$save = $crud->save_house();
	if ($save)
		echo $save;
}
if ($action == "delete_house") {
	$save = $crud->delete_house();
	if ($save)
		echo $save;
}

if ($action == "save_tenant") {
	$save = $crud->save_tenant();
	if ($save)
		echo $save;
}
if ($action == "delete_tenant") {
	$save = $crud->delete_tenant();
	if ($save)
		echo $save;
}
if ($action == "get_tdetails") {
	$get = $crud->get_tdetails();
	if ($get)
		echo $get;
}

if ($action == "save_agent") {
	$save = $crud->save_agent();
	if ($save)
		echo $save;
}
if ($action == "delete_agent") {
	$save = $crud->delete_agent();
	if ($save)
		echo $save;
}

if ($action == "save_topic") {
	$save = $crud->save_topic();
	if ($save)
		echo $save;
}
if ($action == "delete_topic") {
	$save = $crud->delete_topic();
	if ($save)
		echo $save;
}


if ($action == "save_comment") {
	$save = $crud->save_comment();
	if ($save)
		echo $save;
}
if ($action == "delete_comment") {
	$save = $crud->delete_comment();
	if ($save)
		echo $save;
}


if ($action == "save_reply") {
	$save = $crud->save_reply();
	if ($save)
		echo $save;
}
if ($action == "delete_reply") {
	$save = $crud->delete_reply();
	if ($save)
		echo $save;
}

ob_end_flush();
