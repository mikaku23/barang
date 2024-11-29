// Check for saved dark mode preference in Local Storage
if (localStorage.getItem("dark-mode") === "enabled") {
  document.body.classList.add("dark-mode");
  document.body.classList.remove("normal-mode"); // Remove normal mode class
  document.getElementById("dark-mode-icon").classList.remove("fa-sun");
  document.getElementById("dark-mode-icon").classList.add("fa-moon");
  document.getElementById("dark-mode-icon").classList.add("rotate"); // Add rotation for initial load
}

// Dark mode toggle
document
  .getElementById("dark-mode-toggle")
  .addEventListener("click", function (event) {
    event.preventDefault();
    const icon = document.getElementById("dark-mode-icon");

    // Check if dark mode is currently enabled
    if (document.body.classList.contains("dark-mode")) {
      // Fade out animation
      icon.classList.add("fade-out");
      setTimeout(function () {
        document.body.classList.remove("dark-mode");
        document.body.classList.add("normal-mode"); // Add normal mode class
        icon.classList.remove("fade-out");
        icon.classList.remove("rotate");
        icon.classList.remove("fa-moon");
        icon.classList.add("fa-sun");
        icon.classList.add("fade-in"); // Fade in the sun icon
      }, 300);
      localStorage.setItem("dark-mode", "disabled"); // Save preference
    } else {
      // Fade out animation
      icon.classList.add("fade-out");
      setTimeout(function () {
        document.body.classList.add("dark-mode");
        document.body.classList.remove("normal-mode"); // Remove normal mode class
        icon.classList.remove("fade-out");
        icon.classList.add("rotate");
        icon.classList.remove("fa-sun");
        icon.classList.add("fa-moon");
        icon.classList.add("fade-in"); // Fade in the moon icon
      }, 300);
      localStorage.setItem("dark-mode", "enabled"); // Save preference
    }
  });
// Tangkap klik pada link keluar dan tampilkan modal konfirmasi keluar
document.querySelector('.sign-out-link').addEventListener('click', function(event) {
  event.preventDefault(); // Mencegah tindakan default link
  $('#modalKeluar').modal('show'); // Menampilkan modal
});
