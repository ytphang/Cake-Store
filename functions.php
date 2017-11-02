<?php

include("init.php"); 
//session_start() ;
//define(PW_SALT,'(+3%_');

function sendPasswordEmail($email)
{

	$db = connect_database();
    $query = $db->prepare("SELECT uid, username FROM users WHERE email LIKE :email");
    $query->bindParam("email", $email,PDO::PARAM_STR);
    $query->execute();
    $data=$query->fetch(PDO::FETCH_OBJ);
	//if ( !$data->count() )
	if(!($data))
    {  
        return "nonexist";     
    }
    else
    {
        try 
        {
            try 
            {
                $uid = $data->uid;
                $username = $data->username;
                $expFormat = mktime(date("H"), date("i"), date("s"), date("m")  , date("d")+3, date("Y"));
                $expDate = date("Y-m-d H:i:s",$expFormat);
            }
            catch (Exception $e) 
            {
                
            }
            
            $ukey = md5($username . '_' . $email . rand(0,10000) .$expDate );
            $SQL = $db->prepare("INSERT INTO recoveryemails_enc(uid,ukey,expDate) VALUES (:uid,:ukey,:expDate)");

            $SQL -> bindParam("uid", $uid,PDO::PARAM_INT);
            $SQL -> bindParam("ukey", $ukey,PDO::PARAM_STR);
            $SQL -> bindParam("expDate", $expDate,PDO::PARAM_STR);

            $SQL -> execute();
            $db = null;
            $passwordLink = "<a href=\"?a=recover&email=" . $ukey . "&u=" . urlencode(base64_encode($uid)) . "\">localhost/buyowlcakebruh/recoverPass.php?a=recover&email=" . $ukey . "&u=" . urlencode(base64_encode($uid)) . "</a>";
            $message = "Dear $username,\r\n";
            $message .= "Please visit the following link to reset your password:\r\n";
            $message .= "-----------------------\r\n";
            $message .= "$passwordLink\r\n";
            $message .= "-----------------------\r\n";
            $message .= "If clicking doesnt work, please copy the entire link into your browser. The link will expire after 3 days for security reasons.\r\n\r\n";
            $message .= "If you did not request this forgotten password email, no action is needed, your password will not be reset as long as the link above is not visited. However, you may want to log into your account and change your security password, as someone may have guessed it.\r\n\r\n";
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
             
        } catch (Exception $e) {
            //return $check;
            return "error";
        }
    }
    //return $check;
   return 'error';     
}


function checkEmailKey($ukey,$uid)
{
    try  
    {
    	$db = connect_database();
        $expDate = date("Y-m-d H:i:s");
    	$SQL = $db->prepare("SELECT uid FROM recoveryemails_enc WHERE ukey=:ukey AND uid=:uid AND expDate>=:expDate");
        {
            $SQL -> bindParam("ukey", $ukey,PDO::PARAM_STR);
            $SQL -> bindParam("uid", $uid,PDO::PARAM_INT);
            $SQL -> bindParam("expDate", $expDate,PDO::PARAM_STR);
            $SQL -> execute();
            //$SQL->execute();
           
            $count = $SQL->rowCount();
            $db = null;
            $data = $SQL->fetch(PDO::FETCH_OBJ);
           // $uid = $data->uid;
          //  var_dump($uid);
          //  var_dump($ukey);
          //  var_dump($ukey);
            if ($count > 0 && $uid != '')
            
            {

               // $_SESSION['ruid']=$uid;
                //$_SESSION['rukey']=$ukey;
                //var_dump($_SESSION['rukey']);
                //var_dump($_SESSION['ruid']);
                return array('status'=>true,'ruid'=>$uid,'rukey'=>$ukey);
            }
            return array('status'=>false,'uid'=>"");
        }
    }
    catch (Exception $e)
    {
       // return false;
        return array('status'=>false,'uid'=>"");
    }
    //return false;
}


function updateUserPassword($uid,$password,$ukey)
{
    $db = connect_database();
   // if (checkEmailKey($ukey,$uid) === false) 
   //     return false;
    $SQL = $db->prepare("UPDATE users SET password=:hash_password WHERE uid=:uid");
    try 
    {
        $hash_password= hash('sha256', $password);
        $SQL -> bindParam("hash_password", $hash_password,PDO::PARAM_STR);
        $SQL -> bindParam("uid", $uid,PDO::PARAM_INT);
        $SQL -> execute();
    
        $SQL = $db->prepare("DELETE FROM recoveryemails_enc WHERE ukey=:ukey");
        $SQL -> bindParam("ukey", $ukey,PDO::PARAM_STR);
        $SQL -> execute();
        $db = null;
        return true;
    
    } catch (Exception $e) {
        return false; 
    }
   
    return false;
}





?>


