document.addEventListener("DOMContentLoaded", function () {
  const themeToggleBtn = document.getElementById("theme-toggle");
  const currentTheme = localStorage.getItem("theme") || "light";

  // Apply the initial theme
  document.body.classList.add(`${currentTheme}-mode`);
  document.querySelector(".footer").classList.add(`${currentTheme}-mode`);

  themeToggleBtn.addEventListener("click", function () {
    let newTheme = "light";
    if (document.body.classList.contains("light-mode")) {
      newTheme = "dark";
    }

    // Update classes
    document.body.classList.toggle("light-mode");
    document.body.classList.toggle("dark-mode");
    document.querySelector(".footer").classList.toggle("light-mode");
    document.querySelector(".footer").classList.toggle("dark-mode");

    // Save the current theme in local storage
    localStorage.setItem("theme", newTheme);
  });
});
