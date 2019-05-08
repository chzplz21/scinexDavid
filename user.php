<?php

include_once("db.php");


$id = $_GET['id'];


//After successful login
$pdo = pdoConnection();

//get messages
$stmt = $pdo->prepare("SELECT * FROM tbl_messages  WHERE userID = ?");
$stmt->execute([$id]);
$messages = $stmt->fetchAll();
$messageAmount = count($messages);

//get user info
$stmt = $pdo->prepare("SELECT * FROM tbl_users  WHERE id = ?");
$stmt->execute([$id]);
$user = $stmt->fetch();
if ($user['username'] == 'Jimmy') {
  $otherUser = 'Jenny';
}else {
  $otherUser = 'Jimmy';
}

//message sent
if(!empty($_GET['messageSent'])) {
  //determines who to send message to
  if ($_GET['id'] == 1) {
    $receiverID = 2;
  } else {
    $receiverID = 1;
  }
  $stmt = $pdo->prepare("INSERT INTO tbl_messages (message, userID) VALUES (?, ?)");
  $stmt->execute([$_POST['messageBody'], $receiverID]);
  $stmt = null;

}


 ?>

<html>

<head>

  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

</head>


<body>

  <div class = "container">

    <a href = "index">
      <button type = "button" class="btn btn-primary backHome">Back To Login</button>
    </a>

      <h1><?= $user['username'] ?></h1>

    <div class = "row">
      <div class = "col-md-6">
        <h3> You have <?= $messageAmount ?> Message(s) </h3>

        <?php foreach($messages as $message) { ?>
                  <div id = "messageContainer">
                    <div class = "messageInner"><?= $message['message'] ?> </div>
                  </div>

        <?php  } ?>

      </div>

      <div class = "col-md-6">
        <h3> Write a message to your pal <?= $otherUser ?> </h3>
        <textarea class= "col-md-12" id = "messageToSend"></textarea>
        <input id = "hiddenID" value = "<?= $user['id'] ?>" type = "hidden"></input>
        <button type="button" class="btn btn-primary" id = "sendMessage">Send Message</button>
      </div>
    </div>

  </div>
</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src = "script.js"></script>


</html>
