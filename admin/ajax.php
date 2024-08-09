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
	case 'signup':
		$save = $crud->signup();
		echo $save;
		break;

	case 'save_settings':
		$save = $crud->save_settings();
		echo $save;
		break;

	case 'save_venue':
		$save = $crud->save_venue();
		echo $save;
		break;

	case 'save_book':
		$save = $crud->save_book();
		echo $save;
		break;

	case 'save_book_admin':
		$save = $crud->save_book_admin();
		echo $save;
		break;

	case 'delete_book':
		$save = $crud->delete_book();
		echo $save;
		break;

	case 'delete_venue':
		$save = $crud->delete_venue();
		echo $save;
		break;

	case 'save_event':
		$save = $crud->save_event();
		echo $save;
		break;

	case 'delete_event':
		$save = $crud->delete_event();
		echo $save;
		break;

	default:
		echo "Invalid action.";
}

ob_end_flush();