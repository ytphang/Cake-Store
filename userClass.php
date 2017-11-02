<?php

include("init.php");
//include("config.php");

class userClass{

	/**
	 * Checks to see if the user can or is logged in and if given a username and password, log them in
	 * @param $username string The username of the user to check
	 * @param $password string The password of the user to check
 	* @return bool True if the user is authenticated
 	*/
	public function check_login($username, $password)
	{
    
		if (isset($username) && isset($password)) {		
			try{
    			// Set up database
    			$db = connect_database();
	    		//$hash_password= check_password($password,$username);
	    		$hash_password= hash('sha256', $password);
    		    $query = $db->prepare("SELECT uid FROM users WHERE (username=:username) AND password=:hash_password"); 
        		$query->bindParam("username", $username,PDO::PARAM_STR) ;
				$query->bindParam("hash_password", $hash_password,PDO::PARAM_STR) ;
				$query->execute();
				$count=$query->rowCount();
				$data=$query->fetch(PDO::FETCH_OBJ);
				$db = null;
		
				if($count)
				{
					$_SESSION['uid']=$data->uid; // Storing user session value
            		$_SESSION['username'] = $username;
            		$_SESSION['is_logged_in'] = true;
            		
					return true;
				}
				else
				{
					return false;
					$url=BASE_URL.'databaseError.php';
					header("Location: $url");	
				}
			} 
	
			catch(PDOException $e) {
				$e->getMessage();
				$_SESSION['message-login'] = $e;
				//echo '{"error":{"text":'. $e->getMessage() .'}}';
			}
		}
		

    // Their credentials don't match, so return a failure, failed auth results in potential embarrassment by peers,
    // hope of a password reset feature, and possibly drawing bad tarot cards. Also their session is no longer
    // authenticated.
    
    	return false;
	}






	/**
	* Creates a user with the given username and password and inserts them into the database
 	* Note that the created user is NOT authenticated
	* @param $username string The username of the user to be created
	* @param $password string The password of the user to be created
 	* @param $email string The email of the user to be created
 	* @return bool true if the user was created successfully
	 */
	public function create_user($username,$password,$email,$phoneNo)
	{
		try{
    		$db = connect_database();

    		//check for duplication
    		$query = $db->prepare("SELECT uid FROM users WHERE username=:username OR email=:email");
	    	$query->bindParam("username", $username,PDO::PARAM_STR);
			$query->bindParam("email", $email,PDO::PARAM_STR);

 		   	$query->execute();
	    	$count = $query->rowCount();

			if($count<1)
			{
				$query= $db->prepare("INSERT INTO users(username,password,email,phoneNo) VALUES (:username,:hash_password,:email,:phoneNo)");
				$query->bindParam("username", $username,PDO::PARAM_STR) ;
				$hash_password= hash('sha256', $password); //Password encryption
				//$hash_password= encrypt_password($password); //Password encryption
				$query->bindParam("hash_password", $hash_password,PDO::PARAM_STR) ;
				$query->bindParam("email", $email,PDO::PARAM_STR) ;
				$query->bindParam("phoneNo", $phoneNo,PDO::PARAM_STR);
				$query->execute();
				$uid=$db->lastInsertId(); // Last inserted row id
				$db = null;
				$_SESSION['uid']=$uid;
            	$_SESSION['username'] = $username;
            	$_SESSION['is_logged_in'] = true;
				return true;
			}
			else
			{
				$db = null;
				return false;
			}
		}	 
		catch(PDOException $e) {
			$e->getMessage();
			$_SESSION['message-register'] = $e;
			//echo '{"error":{"text":'. $e->getMessage() .'}}'; 
		}
	}


	/* User Details */
	public function userDetails($uid)
	{
		try{
			$db = connect_database();
			$query = $db->prepare("SELECT * FROM users WHERE uid=:uid"); 
			$query->bindParam("uid", $uid,PDO::PARAM_INT);
			$query->execute();
			$data = $query->fetch(PDO::FETCH_OBJ); //User data
			return $data;
		}
		catch(PDOException $e) {
			echo '{"error":{"text":'. $e->getMessage() .'}}';
		}
	}



	/* Update User Detail */
	function updateUserDetails($email,$password,$phoneNo)
	{
	    $db = connect_database();
	    $query = $db->prepare("UPDATE users SET email=:email, password=:hash_password, phoneNo=:phoneNo WHERE uid=:uid AND username=:username");
	    try 
	    {
	        $hash_password= hash('sha256', $password);
	        $query -> bindParam("email", $email,PDO::PARAM_STR);
	        $query -> bindParam("hash_password", $hash_password,PDO::PARAM_STR);
	        $query -> bindParam("phoneNo", $phoneNo,PDO::PARAM_STR);
	        $query -> bindParam("uid", $_SESSION['uid'],PDO::PARAM_INT);
	        $query -> bindParam("username", $_SESSION['username'],PDO::PARAM_STR);
	        $query -> execute();
	        $db = null;
	        return true;
	    
	    } catch (Exception $e) {
	        return false; 
	    }
	   
	    return false;
	}



	function userOrderHistory()
	{
	    $db = connect_database();
	    $query = $db->prepare("SELECT * FROM orders WHERE username=:username");
	    try 
	    {
	    	//var_dump($_SESSION['username']);
	        $query -> bindParam("username", $_SESSION['username'],PDO::PARAM_STR);
	        $query -> execute();
	       // $count=$query->rowCount();
	     //   $data = $query->fetch(PDO::FETCH_OBJ); //User data
	       //	$data = $query->fetch(PDO::FETCH_ASSOC);
	       	$data = $query->fetchall(PDO::FETCH_ASSOC);
			$db = null;
			return $data;
	        
	      
	    
	    } catch (Exception $e) {
	        return $e; 
	    }
	   
	    return false;
	}

}

?>