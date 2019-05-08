
<?php

if (isset($_GET['wrongpassword'])) {
  $wrongMessage = "Sorry, that is a wrong username/password combination";
} else {
  $wrongMessage = "";
}


?>

<html>

<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<link rel="stylesheet" href="style.css">
</head>

<body>

<div class = "container">

  <h3> <?= $wrongMessage ?></h3>

  <form method = "post" action="login.php" style="width:400px">

       <div class="form-group">

          <label><b>Username</b></label>
          <input class="form-control" type="text" name="uname" >

          <label><b>Password</b></label>
          <input class="form-control" type="password" name="psw" >

          <button id = "loginButton" class="btn btn-primary" type="submit">Login</button>

      </div>



  </form>

</div>


</body>


</html>
