document.addEventListener('DOMContentLoaded', function() {
  const form = document.getElementById('createNoteForm');
  const zoomButton = document.getElementById('zoomButton');
  const zoomContent = document.getElementById('zoomContent');
  
  form.addEventListener('submit', function(e) {
      e.preventDefault(); // Stop immediate form submission
      
      // Apply zoom effect
      zoomContent.classList.add('zoomed');
      
      // Submit form after animation completes
      setTimeout(() => {
          zoomContent.classList.remove('zoomed');
          form.submit();
      }, 1000); // Match this duration with your CSS transition
  });
});