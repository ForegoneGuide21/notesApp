document.addEventListener("DOMContentLoaded", function () {
  const iconUser = document.getElementById("username");
  if (iconUser && iconUser.textContent) {
    const firstChar = iconUser.textContent.trim().charAt(0).toUpperCase();
    iconUser.textContent = firstChar;
  }
});