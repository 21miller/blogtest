
<?php

class User{

	private $db;
	
	public function _construct($db){
		$this->db = $db;
		}
	
	public function is_logged_in(){
		if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] ==true){
			return true;
			}
		}
	
	public function create_hash($value)
	{
		return $hash = crypt($value, '$a$12
.substr(str_replace('+', '.', base64_enode(sha1(microtime(true), true))), 0, 22));
	}
	private function verify_hash($password,$hash)
	{
		return $hash == crypt($password, $hash);
	}
	
	private function get_user_hash($username){
		try{
		
			
			$stmt = $this->db->prepare("SELECT password FROM blog_members WHERE username = :username");
			$stmt->execute(array("username" => $username));
			
			$row = $stmt->fetch();
			return $row['password'];
			
		} catch(PDOException $e) {
			echo '<p class="error">'.$e->getMessage().'</p>';
		}
	}
	public function login($username,$userpassword){
		$hashed = $this=>get_user_hash($username);
		if($this->verify_hash($password,$hashed) == 1){
		
			$_SESSION['loggin'] = true;
			return true;
		}
	}
	
	public function logout(){
	session_destroy();
	
	}
}
?>