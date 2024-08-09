<?php
ob_start();
$action = $_GET['action'];
include 'admin_class.php';
include 'db_connect.php';
require '../vendor/phpmailer/phpmailer/src/SMTP.php';
require '../vendor/phpmailer/phpmailer/src/Exception.php';
require '../vendor/phpmailer/phpmailer/src/PHPMailer.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

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
		$save = saveBookAdmin($conn);
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

function sendEmailNotification($toEmail, $status) {
    $subject = "Booking Status Notification";
    $body = "";

    if ($status == 1) {
        $body = "Your booking has been confirmed.";
    } elseif ($status == 2) {
        $body = "Your booking has been cancelled.";
    } else {
        $body = "Your booking is under verification.";
    }

    $mail = new PHPMailer;
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'aadegbesan222@gmail.com';
    $mail->Password = 'hgao miqw kwja wihe';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    $mail->setFrom('aadegbesan222@gmail.com', 'Effortless Events');
    $mail->addAddress($toEmail);
    $mail->Subject = $subject;
    $mail->Body = $body;

    if (!$mail->send()) {
        return 'Mailer Error: ' . $mail->ErrorInfo;
    }
    return 'Message sent!';
}

function saveBookAdmin($conn) {
    extract($_POST);
    $data = " name = '$name', address = '$address', email = '$email', contact = '$contact', duration = '$duration', datetime = '$schedule', status = '$status' ";

    if (empty($id)) {
        $chk = $conn->query("SELECT * FROM venue_booking WHERE email = '$email' AND datetime = '$schedule'")->num_rows;
        if ($chk > 0) {
            return 2; // Booking already exists
        }
        $save = $conn->query("INSERT INTO venue_booking SET " . $data);
    } else {
        $save = $conn->query("UPDATE venue_booking SET " . $data . " WHERE id = " . $id);
    }

    if ($save) {
        $emailStatus = sendEmailNotification($email, $status);
        return $emailStatus; // Return the email notification status
    }

    return 0; // Return 0 for failure
}


ob_end_flush();