document.getElementById("calculate-button").addEventListener("click", () => {
  const number = parseInt(document.getElementById("number-input").value);
  let result = 1;
  for (let i = 1; i <= number; i++) {
    result *= i;
  }
  document.getElementById("result-screen").innerText = `${number}! = ${result}`;
});

document.getElementById("dark-mode").addEventListener("click", () => {
  document.body.classList.add("bg-dark", "text-white");
  document.body.classList.remove("bg-light", "text-dark");
});

document.getElementById("light-mode").addEventListener("click", () => {
  document.body.classList.add("bg-light", "text-dark");
  document.body.classList.remove("bg-dark", "text-white");
});

document.getElementById("dark-mode").addEventListener("click", function () {
  document.querySelector("footer").classList.remove("footer-light");
  document.querySelector("footer").classList.add("footer-dark");
});

document.getElementById("light-mode").addEventListener("click", function () {
  document.querySelector("footer").classList.remove("footer-dark");
  document.querySelector("footer").classList.add("footer-light");
});
