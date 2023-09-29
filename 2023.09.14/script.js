const button = document.getElementById("copy");
const textarea = document.getElementById("textarea");
const wynik = document.getElementById("wynik");

button.addEventListener("click", () => {
  return (wynik.innerHTML = textarea.value);
});
