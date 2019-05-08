$(document).ready(function(){

  var sendMessageButton = document.getElementById('sendMessage');
  var messageToSend = document.getElementById('messageToSend');
  var hiddenInput = document.getElementById('hiddenID');

  sendMessageButton.addEventListener("click", function() {
      var textToSend = messageToSend.value;
      var userID = hiddenInput.value;
      console.log(userID);

      if (textToSend) {
        sendMessageOut(textToSend, userID);

      } else {
        alert("You must first enter a message!");
      }

  });


  function sendMessageOut(textToSend, userID) {


    $.ajax({
      method: "POST",
      url: "user?id=" + userID + "&messageSent=true",
      data: { messageBody: textToSend }
    })
   .done(function( msg ) {
    alert( "Message Sent" );
   });


  }


});
