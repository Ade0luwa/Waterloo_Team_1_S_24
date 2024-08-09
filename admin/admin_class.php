<?php
session_start();
ini_set('display_errors', 1);

class Action {
    private $db;

    public function __construct() {
        ob_start();
        include 'db_connect.php';
        $this->db = $conn;
    }

    function __destruct() {
        $this->db->close();
    }

    // Login for admins
    function adminLogin() {
        extract($_POST);
        $qry = $this->db->query("SELECT * FROM users WHERE username = '".$username."' AND password = '".md5($password)."' ");
        if($qry->num_rows > 0) {
            foreach ($qry->fetch_array() as $key => $value) {
                if($key != 'password' && !is_numeric($key))
                    $_SESSION['login_'.$key] = $value;
            }
            return 1;
        } else {
            return 3;
        }
    }
	function login() {
        extract($_POST);
        $email = $this->db->real_escape_string($email);
        $query = $this->db->query("SELECT * FROM clients WHERE email = '$email'");
        if ($query->num_rows == 1) {
            $row = $query->fetch_assoc();
            if (password_verify($password, $row['password'])) {
                $_SESSION['loggedin'] = true;
                $_SESSION['name'] = $row['name'];
                $_SESSION['email'] = $row['email'];
                return 1; // Success
            } else {
                return 0; // Incorrect password
            }
        } else {
            return 0; // Incorrect email
        }
    }
    // Logout
    function logout() {
        session_destroy();
        foreach ($_SESSION as $key => $value) {
            unset($_SESSION[$key]);
        }
        header("location:login.php");
    }

    function save_client(){
		extract($_POST);
		$data = " name = '$name' ";
		$data .= ", username = '$username' ";
		$data .= ", email = '$email' ";
		
		if (!empty($password)) {
			// Use password_hash to hash the password securely
			$hashedPassword = password_hash($password, PASSWORD_DEFAULT);
			$data .= ", password = '$hashedPassword' ";
		}
		
		if(empty($id)){
			// Check if username already exists
			$chk = $this->db->query("SELECT * FROM clients WHERE username = '$username'")->num_rows;
			if($chk > 0){
				return 2; // Username already exists
			}
			$save = $this->db->query("INSERT INTO clients SET ".$data);
		} else {
			$save = $this->db->query("UPDATE clients SET ".$data." WHERE id = ".$id);
		}
		
		return $save ? 1 : 0; // Return 1 for success, 0 for failure
	}	

    // Delete client
    function delete_client(){
        extract($_POST);
        $delete = $this->db->query("DELETE FROM clients WHERE id = ".$id);
        return $delete ? 1 : 0; // Return 1 for success, 0 for failure
    }

    // Save or update admin user
    function save_user() {
        extract($_POST);
        $data = " name = '$name' ";
        $data .= ", username = '$username' ";
        if(!empty($password))
            $data .= ", password = '".md5($password)."' ";
        $data .= ", type = '$type' ";
        $chk = $this->db->query("SELECT * FROM users WHERE username = '$username' AND id !='$id' ")->num_rows;
        if($chk > 0) {
            return 2; // Username already exists
        }
        if(empty($id)) {
            $save = $this->db->query("INSERT INTO users SET ".$data);
        } else {
            $save = $this->db->query("UPDATE users SET ".$data." WHERE id = ".$id);
        }
        return $save ? 1 : 0;
    }

    // Delete admin user
    function delete_user() {
        extract($_POST);
        $delete = $this->db->query("DELETE FROM users WHERE id = ".$id);
        return $delete ? 1 : 0;
    }
}