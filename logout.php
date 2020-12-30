<?php
session_start();

session_destroy();

// Unset COOKIE
unset($_COOKIE['email']);
setcookie('email',$emailName,-time()+60+60*24);

header('Location: login.php');

?>