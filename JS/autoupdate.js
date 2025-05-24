let lastSentMessage = '';
let debounceTimer;

//DOMContentLoaded event to ensure the DOM is fully loaded before attaching event listeners
document.addEventListener('DOMContentLoaded', function() {
  //Retrieve the current value of the textarea
  const textarea = document.getElementById('content');

  //To make a function that will update each second 
  textarea.addEventListener('input', function() {
    //Clear the timer (reset the time)
    clearTimeout(debounceTimer);

    //Set the timer for the update and this is for 1 sec (1000 milliseconds)
    debounceTimer = setTimeout(function() {
      const currentMessage = textarea.value.trim();

      if (currentMessage && currentMessage !== lastSentMessage) {
        sendMessage(currentMessage);
        lastSentMessage = currentMessage;
      }
    }, 1000);
  });
});

function sendMessage(message) {
  const xhr = new XMLHttpRequest();
  xhr.open('POST', '..controller/ControllerNoteEdit.php', true);
  xhr.setRequestHeader('Content-Type', 'http://localhost/notesapp/view/noteEdit.php');

  xhr.onreadystatechange = function() {
    if (xhr.readyState === 4) {
      if (xhr.status === 200) {
        updateStatus('Last sent: ' + new Date().toLocaleTimeString());
        console.log('Sent: ' + message);
      } else{
        updateStatus('Error sending message');
        console.error('Error', xhr.responseText);
      }
    }
  };
  xhr.send('message= ' + encodeURIComponent(message));
}

function updateStatus(text){
  document.getElementById('status').textContent = 'Status' + text;
}