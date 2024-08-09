<?php
ob_start();
$action = $_GET['action'];
include 'admin_class.php';
$crud = new Action();

switch ($action) {
	case 'login':
		echo $crud->login();
		break;
	case 'adminLogin':
		echo $crud->adminlogin();	
		break;
	case 'logout':
		echo $crud->logout();
		break;
	case 'save_client':
		echo $crud->save_client();
		break;
	case 'delete_client':
		echo $crud->delete_client();
		break;
	case 'save_user':
		echo $crud->save_user();
		break;
	case 'delete_user':
		echo $crud->delete_user();
		break;
	default:
		echo "Invalid action.";
}

ob_end_flush();