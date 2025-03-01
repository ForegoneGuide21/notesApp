document.getElementById('zoomButton').addEventListener('click', function() {
    const content = document.getElementById('zoomContent');
    content.classList.add('zoomed');
  
    // Redirect to another website after the zoom-in effect
    setTimeout(function() {
      //window.open('https:snapchat.com', '_blank');
      content.classList.remove('zoomed');
    }, 1000); // Match the duration of the CSS transition
  });

