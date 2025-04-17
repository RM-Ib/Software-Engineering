// to display and hide elements according to log in status

document.addEventListener("DOMContentLoaded", () => {
  // Get login status from localStorage
  const isLoggedIn = localStorage.getItem("isLoggedIn") === "true";

  // Toggle visibility based on login state
  document.querySelectorAll(".logged_in").forEach(el => {
    el.style.display = isLoggedIn ? "list-item" : "none";
  });

  document.querySelectorAll(".notLogged_in").forEach(el => {
    el.style.display = isLoggedIn ? "none" : "list-item";
  });

  // Logout handler
  const logoutBtn = document.getElementById("logoutBtn");
  if (logoutBtn) {
    logoutBtn.addEventListener("click", (e) => {
      e.preventDefault();
      localStorage.setItem("isLoggedIn", "false");
      location.reload();
    });
  }
});

