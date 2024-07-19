<?php
ob_start();
$action = $_GET['action'];
include 'admin_class.php';
$crud = new Action();

if($action == 'login'){
	$login = $crud->login();
	if($login)
		echo $login;
}
if($action == 'login2'){
	$login = $crud->login2();
	if($login)
		echo $login;
}
if($action == 'logout'){
	$logout = $crud->logout();
	if($logout)
		echo $logout;
}
if($action == 'logout2'){
	$logout = $crud->logout2();
	if($logout)
		echo $logout;
}
if($action == 'save_user'){
	$save = $crud->save_user();
	if($save)
		echo $save;
}
if($action == 'delete_user'){
	$save = $crud->delete_user();
	if($save)
		echo $save;
}
if($action == 'signup'){
	$save = $crud->signup();
	if($save)
		echo $save;
}
if($action == "save_settings"){
	$save = $crud->save_settings();
	if($save)
		echo $save;
}
if($action == "save_venue"){
	$save = $crud->save_venue();
	if($save)
		echo $save;
}
if($action == "save_book"){
	$save = $crud->save_book();
	if($save)
		echo $save;
}
if($action == "save_book_admin"){
	$save = $crud->save_book_admin();
	if($save)
		echo $save;
}
if($action == "delete_book"){
	$save = $crud->delete_book();
	if($save)
		echo $save;
}

if($action == "delete_venue"){
	$save = $crud->delete_venue();
	if($save)
		echo $save;
}

if($action == "save_event"){
	$save = $crud->save_event();
	if($save)
		echo $save;

}
if($action == "delete_event"){
	$save = $crud->delete_event();
	if($save)
		echo $save;
}