<?php
session_start();
ini_set('display_errors', 1);
Class Action {
	private $db;

	public function __construct() {
		ob_start();
   	include 'db_connect.php';
    
    $this->db = $conn;
	}
	function __destruct() {
	    $this->db->close();
	    ob_end_flush();
	}

	function login(){
		extract($_POST);
		$qry = $this->db->query("SELECT * FROM users where username = '".$username."' and password = '".md5($password)."' ");
		if($qry->num_rows > 0){
			foreach ($qry->fetch_array() as $key => $value) {
				if($key != 'passwors' && !is_numeric($key))
					$_SESSION['login_'.$key] = $value;
			}
				return 1;
		}else{
			return 3;
		}
	}
	function logout(){
		session_destroy();
		foreach ($_SESSION as $key => $value) {
			unset($_SESSION[$key]);
		}
		header("location:login.php");
	}

	function save_user(){
		extract($_POST);
		$data = " name = '$name' ";
		$data .= ", username = '$username' ";
		if(!empty($password))
		$data .= ", password = '".md5($password)."' ";
		$data .= ", type = '$type' ";
		$chk = $this->db->query("Select * from users where username = '$username' and id !='$id' ")->num_rows;
		if($chk > 0){
			return 2;
			exit;
		}
		if(empty($id)){
			$save = $this->db->query("INSERT INTO users set ".$data);
		}else{
			$save = $this->db->query("UPDATE users set ".$data." where id = ".$id);
		}
		if($save){
			return 1;
		}
	}
	function delete_user(){
		session_destroy();
		extract($_POST);
		$delete = $this->db->query("DELETE FROM users where id = ".$id);
		if($delete)
		return 1;
		header("location: ./login.php");
	}
	function signup(){
		extract($_POST);
		$data = " name = '$name' ";
		$data .= ", contact = '$contact' ";
		$data .= ", address = '$address' ";
		$data .= ", username = '$email' ";
		$data .= ", password = '".md5($password)."' ";
		$data .= ", type = 3";
		$chk = $this->db->query("SELECT * FROM users where username = '$email' ")->num_rows;
		if($chk > 0){
			return 2;
			exit;
		}
			$save = $this->db->query("INSERT INTO users set ".$data);
		if($save){
			$qry = $this->db->query("SELECT * FROM users where username = '".$email."' and password = '".md5($password)."' ");
			if($qry->num_rows > 0){
				foreach ($qry->fetch_array() as $key => $value) {
					if($key != 'passwors' && !is_numeric($key))
						$_SESSION['login_'.$key] = $value;
				}
			}
			return 1;
		}
	}

	function save_settings(){
		extract($_POST);
		$data = " name = '".str_replace("'","&#x2019;",$name)."' ";
		$data .= ", email = '$email' ";
		$data .= ", contact = '$contact' ";
		$data .= ", about_content = '".htmlentities(str_replace("'","&#x2019;",$about))."' ";
		if($_FILES['img']['tmp_name'] != ''){
						$fname = strtotime(date('y-m-d H:i')).'_'.$_FILES['img']['name'];
						$move = move_uploaded_file($_FILES['img']['tmp_name'],'assets/uploads/'. $fname);
					$data .= ", cover_img = '$fname' ";

		}
		
		// echo "INSERT INTO system_settings set ".$data;
		$chk = $this->db->query("SELECT * FROM system_settings");
		if($chk->num_rows > 0){
			$save = $this->db->query("UPDATE system_settings set ".$data);
		}else{
			$save = $this->db->query("INSERT INTO system_settings set ".$data);
		}
		if($save){
		$query = $this->db->query("SELECT * FROM system_settings limit 1")->fetch_array();
		foreach ($query as $key => $value) {
			if(!is_numeric($key))
				$_SESSION['settings'][$key] = $value;
		}

			return 1;
				}
	}
	function save_event(){
		extract($_POST);
		$data = " event = '$event' ";
		$data .= ",venue_id = '$venue_id' ";
		$data .= ", schedule = '$schedule' ";
		$data .= ", audience_capacity = '$audience_capacity' ";
		if(isset($payment_status))
		$data .= ", payment_type = '$payment_status' ";
		else
		$data .= ", payment_type = '2' ";
		if(isset($type))
			$data .= ", type = '$type' ";
		else
		$data .= ", type = '1' ";
			$data .= ", amount = '$amount' ";
		$data .= ", description = '".htmlentities(str_replace("'","&#x2019;",$description))."' ";
		if($_FILES['banner']['tmp_name'] != ''){
						$_FILES['banner']['name'] = str_replace(array("(",")"," "), '', $_FILES['banner']['name']);
						$fname = strtotime(date('y-m-d H:i')).'_'.$_FILES['banner']['name'];
						$move = move_uploaded_file($_FILES['banner']['tmp_name'],'assets/uploads/'. $fname);
					$data .= ", banner = '$fname' ";

		}
		if(empty($id)){
			$save = $this->db->query("INSERT INTO events set ".$data);
			if($save){
				$id = $this->db->insert_id;
				$folder = "assets/uploads/event_".$id;
				if(is_dir($folder)){
					$files = scandir($folder);
					foreach($files as $k =>$v){
						if(!in_array($v, array('.','..'))){
							unlink($folder."/".$v);
						}
					}
				}else{
					mkdir($folder);
				}
				if(isset($img)){
				for($i = 0 ; $i< count($img);$i++){
						$img[$i]= str_replace('data:image/jpeg;base64,', '', $img[$i] );
						$img[$i] = base64_decode($img[$i]);
						$fname = $id."_".strtotime(date('Y-m-d H:i'))."_".$imgName[$i];
						$upload = file_put_contents($folder."/".$fname,$img[$i]);
					}
				}
			}
		}else{
			$save = $this->db->query("UPDATE events set ".$data." where id=".$id);
			if($save){
				$folder = "assets/uploads/event_".$id;
				if(is_dir($folder)){
					$files = scandir($folder);
					foreach($files as $k =>$v){
						if(!in_array($v, array('.','..'))){
							unlink($folder."/".$v);
						}
					}
				}else{
					mkdir($folder);
				}

				if(isset($img)){
				for($i = 0 ; $i< count($img);$i++){
						$img[$i]= str_replace('data:image/jpeg;base64,', '', $img[$i] );
						$img[$i] = base64_decode($img[$i]);
						$fname = $id."_".strtotime(date('Y-m-d H:i'))."_".$imgName[$i];
						$upload = file_put_contents($folder."/".$fname,$img[$i]);
					}
				}
			}
		}
		if($save)
			return 1;
	}
	function delete_event(){
		extract($_POST);
		$delete = $this->db->query("DELETE FROM events where id = ".$id);
		if($delete){
			return 1;
		}
	}
}