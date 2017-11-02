<?php
/**
	public function remember_user($checked){
		if (isset($checked)){
			$selector = base64_encode(random_bytes(9));
    		$authenticator = random_bytes(33);

    		setcookie(
        	'remember',
         	$selector.':'.base64_encode($authenticator),
         	time() + 864000,
         	'/',
         	'buyowlcakebruh.com',
         	true, // TLS-only
         	true  // http-only
		
			$db = connect_database();
			$query = $db->prepare("INSERT INTO auth_tokens (selector, token, userid, expires) VALUES (?, ?, ?, ?)");
			$query->execute($selector,hash('sha256', $authenticator),$uid->uid,date('Y-m-d\TH:i:s', time() + 864000));
		
		}
	}




	public function check_remember_user(){
		if (empty($_SESSION['uid']) && !empty($_COOKIE['remember'])) {
    		list($selector, $authenticator) = explode(':', $_COOKIE['remember']);

    		$row = $database->selectRow(
        		"SELECT * FROM auth_tokens WHERE selector = ?",
        		[
            		$selector
        		]
    		);

    		if (hash_equals($row['token'], hash('sha256', base64_decode($authenticator)))) {
        		$_SESSION['uid'] = $row['uid'];
        		// Then regenerate login token as above

    		}
		}
	}


**/

?>