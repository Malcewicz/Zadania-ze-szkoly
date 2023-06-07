const inputs = document.querySelectorAll("input");
const submit = document.getElementById("submit");

submit.addEventListener("click", () => {
  const isFilled = [...inputs].every((input) => input.value !== "");
  if (!isFilled) {
    alert("Proszę wypełnić wszystkie pola");
    return;
  }
  if (inputs[0].value.length < 2 || inputs[1].value.length < 2) {
    alert("Imię i nazwisko musi zawierać minimum 2 znaki");
    return;
  }
  if (inputs[2].value < 18) {
    alert("Musisz mieć ukończone 18 lat");
    return;
  }
  alert("Formularz został wysłany");
});
