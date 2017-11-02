<?php
   
    //connect to database
    $db = mysqli_connect("localhost","root","","buyowlcakebruh");
    
    if(isset($_POST['register-submit'])){
        $username = $_POST['username'];
        $email = $_POST['email'];
        $mobile = $_POST['mobile'];
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];

        if($password == $confirm_password){
            //create user
            $password = md5($password);
            $sql = "INSERT INTO User(username,email,password,mobile) VALUES('$username','$email','$password','$mobile')";
            mysqli_query($db,$sql);
            $_SESSION['message-register'] = "You are now logged in";
            $_SESSION['username'] = $username;
            $_SESSION['is_logged_in'] = true;
            
            //check user current page and redirect accordingly
            if(basename(__FILE__) == 'catalogue.php'){
                header("location: checkout.php");
            }elseif(basename(__FILE__) == 'account.php'){
                header("location: index.html");
            }
            
        }else{
            $_SESSION['message-register'] = "The two password does not match";
            header("location: catalogue.php");
            
        }
    }

    if(isset($_POST['login-submit'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

        $password = md5($password);
        $sql = "SELECT * FROM User WHERE username = '$username' AND password = '$password'";
        $result = mysqli_query($db,$sql);

        if(mysqli_num_rows($result) == 1){
            $_SESSION['message-login'] = "You are now logged in";
            $_SESSION['username'] = $username;
            $_SESSION['is_logged_in'] = true;
            header("location: checkout.php");
        }else{
            $_SESSION['message-login'] = "Wrong password";
            header("location: catalogue.php");
        
        }
    }
?>