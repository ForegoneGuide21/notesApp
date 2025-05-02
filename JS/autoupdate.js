//Leon Thomas - MUTT
//Drake - NOKIA
//d4vid - Feel It
//tyler, the creator - SWEET / I THOUGHT YOU WANTED TO DANCE
//Imogen Heap - Headlock
//NLE CHOPPA - Or What ft. 41 (Orchestra Mix)
//Civ - 1AM
//FIFTY FIFTY - Cupid (Twin Version)
//Holy Fuck - "Tom Tom"
//

document.addEventListener("DOMContentLoaded", function() {
  const textarea = document.getElementById("inputArea");
  const status = document.getElementById("status");

  //Function to prevent rapid firing of the update function
  function debounce(func, wait){
    let timeout;
        return function() {
            const context = this;
            const args = arguments;
            clearTimeout(timeout);
            timeout = setTimeout(() => func.apply(context, args), wait);
        };
  }

  const updateNote = debounce(function(){
    const currentTitle = document.querySelector('.title').textContent.trim();

    //Prepare the data to match my controllers parameters
    const postData = {
      idnotes: window.noteData.noteid,
      title: currentTitle,
      notescontent: textarea.value
    };

    status.textContent = 'Saving...';
    status.style.display = 'block';
    status.style.color = 'blue';
    status.style.fontSize = '8px';
    status.style.border = '1px solid black';

    //Send to our ControllerNote.php by using AJAX
    fetch('../controller/ControllerNote.php', {
      method: 'POST',
      headers: {
        'Content-Type' : 'application/x-www-form-urlencoded',
        'X-Requested-With': 'XMLHttpRequest'
      },

      body: new URLSearchParams(postData).toString()
    })
    .then(response => {
      if (!response.ok) throw new Error('Network response was not ok');
      return response.json();
    })
    .then(data => {
      if (data.success) {
        status.textContent = 'Saved!';
        status.style.color = 'green';
        status.style.fontSize = '8px';
        status.style.border = '1px solid black';

        textarea.defaultValue = textarea.value;
      } else {
        throw new Error('Error saving note: ' + data.error);
      }
    })
    .catch(error => {
      console.error('Error:', error);
      status.textContent = 'Error!';
      status.style.color = 'red';
      status.style.fontSize = '8px';
      status.style.border = '1px solid black';
    })
    .finally(() => {
      setTimeout(() => {
        status.style.display = 'none';
      }, 2000);
    });
  }, 1000);

  textarea.addEventListener('input', updateNote);
  
  //Warning if it did not save changes o unsaved changes
  window.addEventListener('beforeunload', function(e) {
    if (textarea.value !== textarea.defaultValue) {
      e.preventDefault();
      e.returnValue = "You have unsaved changes. Are you sure you want to leave?";
      return e.returnValue
    }
  });

  //Set default initial values
  textarea.defaultValue = textarea.value;

});