<?php

include("init.php"); 

//define(PW_SALT,'(+3%_');

function sendPasswordEmail($email)
{

	$db = connect_database();
    //check for duplication
    $query = $db->prepare("SELECT uid, username FROM users WHERE email = :email");
	$query->bindParam("email", $email,PDO::PARAM_STR);
 	$query->execute();
 	$count = $query->rowCount();
    $data=$query->fetch(PDO::FETCH_OBJ);
    $uid = $data->uid;
    $username = $data->username;

    print_r ($data) ;
    //$query->bind_result($uid,$username);
	
	if($count=1)
	{
	 	$expFormat = mktime(date("H"), date("i"), date("s"), date("m")  , date("d")+3, date("Y"));
        $expDate = date("Y-m-d H:i:s",$expFormat);
        $ukey = md5($username . '_' . $email . rand(0,10000) .$expDate );
        $SQL = $db->prepare("INSERT INTO recoveryemails_enc(uid,ukey,expDate) VALUES (:uid,:ukey,:expDate)");

       
        $SQL -> bindParam("uid", $uid,PDO::PARAM_INT);
        $SQL -> bindParam("ukey", $ukey,PDO::PARAM_STR);
        $SQL -> bindParam("expDate", $expDate,PDO::PARAM_STR);

        $SQL->execute();
        $passwordLink = "<a href=\"?a=recover&email=" . $ukey . "&u=" . urlencode(base64_encode($uid)) . "\">http://localhost/buyowlcakebruh/recoverPass.php?a=recover&email=" . $ukey . "&u=" . urlencode(base64_encode($uid)) . "</a>";
        $message = "Dear $username,\r\n";
        $message .= "Please visit the following link to reset your password:\r\n";
        $message .= "-----------------------\r\n";
        $message .= "$passwordLink\r\n";
        $message .= "-----------------------\r\n";
        $message .= "Please be sure to copy the entire link into your browser. The link will expire after 3 days for security reasons.\r\n\r\n";
        $message .= "If you did not request this forgotten password email, no action is needed, your password will not be reset as long as the link above is not visited. However, you may want to log into your account and change your security password and answer, as someone may have guessed it.\r\n\r\n";
        $message .= "Thanks,\r\n";
        $message .= "-- BuyOwlCakeBruh Team";
        $headers .= "From: BuyOwlCakeBruh Team <buyowlcakebruh@gmail.com> \n";
        $headers .= "To-Sender: \n";
        $headers .= "X-Mailer: PHP\n"; // mailer
        $headers .= "Reply-To: buyowlcakebruh@gmail.com\n"; // Reply address
        $headers .= "Return-Path: buyowlcakebruh@gmail.com\n"; //Return Path for errors
        $headers .= "Content-Type: text/html; charset=iso-8859-1"; //Enc-type
        $subject = "Your Lost Password";
        $to = "$email";
        @mail($email,$subject,$message,$headers);
        return str_replace("\r\n","<br/ >",$message);
        
    }
    else 
    { 
        return $error; 
    }
    return $error; 
}


function checkEmailKey($key,$uid)
{
	$db = connect_database();
    $curDate = date("Y-m-d H:i:s");
	$SQL = $db->prepare("SELECT `uid` FROM `recoveryemails_enc` WHERE `ukey` = ? AND `uid` = ? AND `expDate` >= ?");
    {
        $SQL ->  bindParam("ukey", $ukey,PDO::PARAM_STR);
        $SQL -> bindParam("uid", $uid,PDO::PARAM_STR);
        $SQL -> bindParam("expDate", $expDate,PDO::PARAM_STR);
        $SQL->execute();
        $SQL->execute();
        $SQL->store_result();
        $numRows = $SQL->num_rows();
        $SQL->bind_result($uid);
        if ($numRows > 0 && $uid != '')
        {
            return array('status'=>true,'uid'=>$id);
        }
    }
    return false;
}


function updateUserPassword($uid,$password,$key)
{
   	$db = connect_database();
    if (checkEmailKey($key,$uid) === false) return false;
	$SQL = $db->prepare("UPDATE `users` SET `password` = ? WHERE `uid` = ?");
    
    $hash_password= hash('sha256', $password);
    $SQL->bind_param('si',$hash_password,$uid);
    $SQL->execute();

    $SQL = $mySQL->prepare("DELETE FROM `recoveryemails_enc` WHERE `Key` = ?");
    $SQL->bind_param('s',$key);
    $SQL->execute();
    
}