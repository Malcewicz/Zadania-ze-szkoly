// Define variables
const procent = document.getElementById("procent");
const select = document.getElementById("styl");
const wynik = document.getElementById("wynik");
const tekst = document.getElementById("tekst");
const wynik2 = document.getElementById("wynik2");
const wynik3 = document.getElementById("wynik3");

// Input change font size on input
procent.addEventListener("input", (e) => {
  let content = e.target.value;
  wynik.style.fontSize = `${content}%`;
});

// Select change font style on select
select.addEventListener("change", (e) => {
  let content = e.target.value;
  wynik.style.fontStyle = content;
});

// Function: change font color on button click
function f(kolor) {
  wynik.style.color = kolor;
}

// Function: display individual words from input on button click
tekst.addEventListener("input", (e) => {
  wynik.innerHTML = tekst.value;
});
function podziel() {
  let slowa = tekst.value.split(" ");
  wynik.innerHTML = slowa.join("<br>");
}

// Function: check if word is palindrome
function czyPalindrom() {
  let slowa = tekst.value.toLowerCase().trim().split("").join("");
  let slowaReverse = tekst.value
    .toLowerCase()
    .trim()
    .split("")
    .reverse()
    .join("");
  if (slowa === slowaReverse) {
    wynik2.innerHTML = `"${tekst.value}" jest palindromem`;
  } else {
    wynik2.innerHTML = `"${tekst.value}" nie jest palindromem`;
  }
}

// Generate 8 random letters
const generuj = document.getElementById("generuj");

generuj.addEventListener("click", () => {
  let litery = "abcdefghijklmnoprstuwxyz";
  let slowo = "";
  for (let i = 0; i < 8; i++) {
    slowo += litery.charAt(Math.random() * litery.length);
  }
  tekst.value = slowo;
});

// Calculate triangle area
function Policz() {
  const a = parseFloat(document.getElementById("a").value);
  const b = parseFloat(document.getElementById("b").value);
  const c = parseFloat(document.getElementById("c").value);

  // First check if triangle is possible
  if (a + b > c && a + c > b && b + c > a) {
    // Calculate triangle area
    let p = (a + b + c) / 2;
    let pole = Math.sqrt(p * (p - a) * (p - b) * (p - c)).toFixed(3);
    wynik3.innerHTML = `Pole trójkąta wynosi ${pole}`;
  } else {
    // If triangle is not possible
    wynik3.innerHTML = "Nie można utworzyć trójkąta";
  }
}
