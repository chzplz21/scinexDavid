<?php

include_once("db.php");

// Handles logging in

if(!empty($_POST)) {

  $pdo = pdoConnection();

  $stmt = $pdo->prepare("SELECT * FROM tbl_users WHERE username = ? AND password = ?");
  $stmt->execute([$_POST['uname'], $_POST['psw']]);
  $result = $stmt->fetch();

  //If correct un and pw, redirect to users page. else redirect back to login screen
  if(!empty($result)) {
   $userid = $result['id'];
   header("Location:  user?id=".$userid);
  } else {
    header("Location:  index?wrongpassword=true");
  }


} else {

  header("Location:  index?wrongpassword=true");
}






 ?>
