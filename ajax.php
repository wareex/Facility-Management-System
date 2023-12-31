<?php
ob_start();
date_default_timezone_set("Asia/Manila");

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

if ($action == 'signup') {
	$save = $crud->signup();
	if ($save)
		echo $save;
}
if ($action == 'save_user') {
	$save = $crud->save_user();
	if ($save)
		echo $save;
}
if ($action == 'update_user') {
	$save = $crud->update_user();
	if ($save)
		echo $save;
}
if ($action == 'delete_user') {
	$save = $crud->delete_user();
	if ($save)
		echo $save;
}
if ($action == 'pay_bill') {
	$save = $crud->pay_bill();
	if ($save)
		echo $save;
}
if ($action == "save_agent") {
	$save = $crud->save_agent();
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

if ($action == "release_agent") {
	$save = $crud->release_agent();
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
if ($action == 'set_pics') {
	$save = $crud->set_pics();
	if ($save)
		echo $save;
}
ob_end_flush();
