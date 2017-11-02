<?php

include("init.php"); 


define(PW_SALT,'(+3%_');
function checkUNEmail($uname,$email)
{
    global $mySQL;
    $error = array('status'=>false,'userID'=>0);
    if (isset($email) && trim($email) != '') {
        //email was entered
        if ($SQL = $mySQL->prepare("SELECT `ID` FROM `users_enc` WHERE `Email` = ? LIMIT 1"))
        {
            $SQL->bind_param('s',trim($email));
            $SQL->execute();
            $SQL->store_result();
            $numRows = $SQL->num_rows();
            $SQL->bind_result($userID);
            $SQL->fetch();
            $SQL->close();
            if ($numRows >= 1) return array('status'=>true,'userID'=>$userID);
        } else { return $error; }
    } elseif (isset($uname) && trim($uname) != '') {
        //username was entered
        if ($SQL = $mySQL->prepare("SELECT `ID` FROM `users_enc` WHERE Username = ? LIMIT 1"))
        {
            $SQL->bind_param('s',trim($uname));
            $SQL->execute();
            $SQL->store_result();
            $numRows = $SQL->num_rows();
            $SQL->bind_result($userID);
            $SQL->fetch();
            $SQL->close();
            if ($numRows >= 1) return array('status'=>true,'userID'=>$userID);
        } else { return $error; }
    } else {
        //nothing was entered;
        return $error;
    }
}



function sendPasswordEmail($userID)
{
    global $mySQL;
    if ($SQL = $mySQL->prepare("SELECT `Username`,`Email`,`Password` FROM `users_enc` WHERE `ID` = ? LIMIT 1"))
    {
        $SQL->bind_param('i',$userID);
        $SQL->execute();
        $SQL->store_result();
        $SQL->bind_result($uname,$email,$pword);
        $SQL->fetch();
        $SQL->close();
        $expFormat = mktime(date("H"), date("i"), date("s"), date("m")  , date("d")+3, date("Y"));
        $expDate = date("Y-m-d H:i:s",$expFormat);
        $key = md5($uname . '_' . $email . rand(0,10000) .$expDate . PW_SALT);
        if ($SQL = $mySQL->prepare("INSERT INTO `recoveryemails_enc` (`UserID`,`Key`,`expDate`) VALUES (?,?,?)"))
        {
            $SQL->bind_param('iss',$userID,$key,$expDate);
            $SQL->execute();
            $SQL->close();
            $passwordLink = "<a href=\"?a=recover&email=" . $key . "&u=" . urlencode(base64_encode($userID)) . "\">http://www.oursite.com/forgotPass.php?a=recover&email=" . $key . "&u=" . urlencode(base64_encode($userID)) . "</a>";
            $message = "Dear $uname,\r\n";
            $message .= "Please visit the following link to reset your password:\r\n";
            $message .= "-----------------------\r\n";
            $message .= "$passwordLink\r\n";
            $message .= "-----------------------\r\n";
            $message .= "Please be sure to copy the entire link into your browser. The link will expire after 3 days for security reasons.\r\n\r\n";
            $message .= "If you did not request this forgotten password email, no action is needed, your password will not be reset as long as the link above is not visited. However, you may want to log into your account and change your security password and answer, as someone may have guessed it.\r\n\r\n";
            $message .= "Thanks,\r\n";
            $message .= "-- Our site team";
            $headers .= "From: Our Site <webmaster@oursite.com> \n";
            $headers .= "To-Sender: \n";
            $headers .= "X-Mailer: PHP\n"; // mailer
            $headers .= "Reply-To: buyowlcakebruh@gmail.com\n"; // Reply address
            $headers .= "Return-Path: buyowlcakebruh@gmail.com\n"; //Return Path for errors
            $headers .= "Content-Type: text/html; charset=iso-8859-1"; //Enc-type
            $subject = "Your Lost Password";
            @mail($email,$subject,$message,$headers);
            return str_replace("\r\n","<br/ >",$message);
        }
    }
}


function checkEmailKey($key,$userID)
{
    global $mySQL;
    $curDate = date("Y-m-d H:i:s");
    if ($SQL = $mySQL->prepare("SELECT `UserID` FROM `recoveryemails_enc` WHERE `Key` = ? AND `UserID` = ? AND `expDate` >= ?"))
    {
        $SQL->bind_param('sis',$key,$userID,$curDate);
        $SQL->execute();
        $SQL->execute();
        $SQL->store_result();
        $numRows = $SQL->num_rows();
        $SQL->bind_result($userID);
        $SQL->fetch();
        $SQL->close();
        if ($numRows > 0 && $userID != '')
        {
            return array('status'=>true,'userID'=>$userID);
        }
    }
    return false;
}
 
function updateUserPassword($userID,$password,$key)
{
    global $mySQL;
    if (checkEmailKey($key,$userID) === false) return false;
    if ($SQL = $mySQL->prepare("UPDATE `users_enc` SET `Password` = ? WHERE `ID` = ?"))
    {
        $password = md5(trim($password) . PW_SALT);
        $SQL->bind_param('si',$password,$userID);
        $SQL->execute();
        $SQL->close();
        $SQL = $mySQL->prepare("DELETE FROM `recoveryemails_enc` WHERE `Key` = ?");
        $SQL->bind_param('s',$key);
        $SQL->execute();
    }
}
 
function getUserName($userID)
{
    global $mySQL;
    if ($SQL = $mySQL->prepare("SELECT `Username` FROM `users_enc` WHERE `ID` = ?"))
    {
        $SQL->bind_param('i',$userID);
        $SQL->execute();
        $SQL->store_result();
        $SQL->bind_result($uname);
        $SQL->fetch();
        $SQL->close();
    }
    return $uname;
}

?>