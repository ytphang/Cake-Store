<?php



echo "congratulation! you can now login with your new password."


   /**
include("functions.php");

session_start();

if(isset($_POST['recoverPassword-submit']))
{
  
  if(strcmp($_POST['password'],$_POST['confirm_password']) != 0 || trim($_POST['password']) == '')
  {
    $error = true;
    $show = 'recoverForm';

    $url=BASE_URL.'recoverPass.php';
		header("Location: $url");

} else {
  $error = false;
  $show = 'recoverSuccess';

  $uid = $_SESSION['uid'];
  $ukey = $_SESSION['rukey'];

  var_dump($uid);
  var_dump($ukey);

  $result =updateUserPassword($_SESSION['uid'],$_POST['password'],$_SESSION['rukey']);
  if($result == false)
  {
		$url=BASE_URL.'account.php';
		header("Location: $url");
    var_dump($uid);
    var_dump($ukey);
  }
  $uid = '';
  $ukey = '';
  $_SESSION['uid']='';
  $_SESSION['rukey']='';
  $show = 'completed';

     //   var_dump($show);
  if($result == true){
    $url=BASE_URL.'recoverPass.php';
    header("Location: $url");
    }       
  }           
}
**/

?>