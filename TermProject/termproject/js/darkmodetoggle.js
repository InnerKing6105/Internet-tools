document.addEventListener("DOMContentLoaded", function () {
  const themeToggleBtn = document.getElementById("theme-toggle");
  const currentTheme = localStorage.getItem("theme") || "light";

  document.body.classList.add(`${currentTheme}-mode`);
  document.querySelector(".footer").classList.add(`${currentTheme}-mode`);

  themeToggleBtn.addEventListener("click", function () {
    let newTheme = "light";
    if (document.body.classList.contains("light-mode")) {
      newTheme = "dark";
    }

    document.body.classList.toggle("light-mode");
    document.body.classList.toggle("dark-mode");
    document.querySelector(".footer").classList.toggle("light-mode");
    document.querySelector(".footer").classList.toggle("dark-mode");

    localStorage.setItem("theme", newTheme);
  });
});
