<?php

include("functions.php");
$show = 'emailForm'; //which form step to show by default

if (isset($_POST['subStep']) && !isset($_GET['a']) && $_SESSION['lockout'] != true)
{
    switch($_POST['subStep'])
    {
        case 1:
            //we just submitted an email or username for verification
            $result = checkUNEmail($_POST['uname'],$_POST['email']);
            if ($result['status'] == false )  //check user in database.
            {
                $error = true;
                $show = 'userNotFound';
            } else {
                $error = false;
                $show = 'securityForm';      //  show security form
                $securityUser = $result['userID'];   //userID represent username
            }
        break;
        case 2:
            //we just submitted the security question for verification
            if ($_POST['userID'] != "" && $_POST['answer'] != "")
            {
                $result = checkSecAnswer($_POST['userID'],$_POST['answer']);
                if ($result == true)
                {
                    //answer was right
                    $error = false;
                    $show = 'successPage';
                    $passwordMessage = sendPasswordEmail($_POST['userID']);
                    $_SESSION['badCount'] = 0;
                } else {
                    //answer was wrong
                    $error = true;
                    $show = 'securityForm';
                    $securityUser = $_POST['userID'];
                    $_SESSION['badCount']++;
                }
            } else {
                $error = true;
                $show = 'securityForm';
            }
        break;
        case 3:
            //we are submitting a new password (only for encrypted)
            if ($_POST['userID'] == '' || $_POST['key'] == '') header("location: login.php");
            if (strcmp($_POST['pw0'],$_POST['pw1']) != 0 || trim($_POST['pw0']) == '')
            {
                $error = true;
                $show = 'recoverForm';
            } else {
                $error = false;
                $show = 'recoverSuccess';
                updateUserPassword($_POST['userID'],$_POST['pw0'],$_POST['key']);
            }
        break;
    }
}

elseif (isset($_GET['a']) && $_GET['a'] == 'recover' && $_GET['email'] != "") {
    $show = 'invalidKey';
    $result = checkEmailKey($_GET['email'],urldecode(base64_decode($_GET['u'])));
    if ($result == false)
    {
        $error = true;
        $show = 'invalidKey';
    } elseif ($result['status'] == true) {
        $error = false;
        $show = 'recoverForm';
        $securityUser = $result['userID'];
    }
}
if ($_SESSION['badCount'] >= 3)
{
    $show = 'speedLimit';
    $_SESSION['lockout'] = true;
    $_SESSION['lastTime'] = '' ? mktime() : $_SESSION['lastTime'];
}





/*

we create an if block that checks to see if anything has been posted to the page. You can also see that we are checking to make sure that $_GET['a'] is not set, this variable will be set when the user clicks on the link in their recovery email, so if that is happening, we can skip the post check. Also in the logic block, we make sure that the lockout variable isn't set to true.


 we use switch($_POST['subStep']) to check which stage of the form has been submitted. There are three stages that we will handle: 
case 1:
 Step 1 means that we just entered a username or email address that we want to reset the password for. To do that, we call the function checkUNEmail(), which we will write momentarily. This function returns an array that has a boolean value to determine if the user was found, and an integer of the userID if the user was found. Line 17 checks to see if the user check returned false (the user wasn't found), if so we set the error flag, and the $show variable so that we see the 'User Not Found' message. If the user was found, we should show the security question form, and set $securityUser so we know which user to load the question for.


In stage 2, we have submitted the security question. The first thing we do here is check to make sure that both a userID and an answer were returned. If either one was omitted, we display the security question form again. If both values were included, we call a function to check the answer against the database. This function returns a simple boolean. If the question was answered correctly, we will show the success page, send the reset email, and set the bad entry count to 0. If the question was answered incorrectly, we display the question page again, and also increment the bad answer counter.


The third stage happens after the user has received the password reset email, and has clicked on the link and submitted the password reset form. First, either userID or the security key are empty, we redirect to the homepage. Then we check to make sure that the two passwords match and were not empty. If they don't match, we show the password reset form again. If they do match, though, we show the success message, and call a function to reset the user's password.

*/



?>