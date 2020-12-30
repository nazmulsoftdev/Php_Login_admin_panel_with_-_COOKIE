<?php

// Start session

session_start();

if(isset($_SESSION['email']) || isset($_COOKIE['email'])){

    header("Location: admin.php");
}
    
// Login logic

if(isset($_REQUEST['loginName'])){

    // define constant
    define('EMAIL','admin@gmail.com');
    define('PASSWORD','12345');

    // Auth Message

    $worngEmail = "Wrong Email";
    $wrongPass = "Wrong Password";

    $emailName = $_REQUEST['ename'];
    $passName = $_REQUEST['pname'];
    $checkName = isset($_REQUEST['checkName'])? $_REQUEST['checkName'] : NULL;
    

    if($emailName == EMAIL){
       if($passName == PASSWORD){
        
        // Session
        $_SESSION['email'] = $emailName;
        
        // Set COOKIE
          if(isset($checkName)){
            setcookie('email',$emailName,time()+60+60*24);
          }

           header("Location: admin.php");
       }
       else{
           echo $wrongPass;
       }
    }
    else{
         echo $worngEmail;
    }

}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    

<!-- Form wrapper -->
  <div class="wrapper">
      <form action="" method="POST">
          <input type="email" name="ename" id="ename" placeholder="Email address" autocomplete="off" required>
          <input type="password" name="pname" id="pname" placeholder="Password" autocomplete="off" required>
          <p><input type="checkbox" name="checkName" id="checkname"><small class="rememberTitle">  Do you want to remember ?</small></p>
          <input type="submit" value="Login"  name="loginName">
      </form>
  </div>


</body>
</html>