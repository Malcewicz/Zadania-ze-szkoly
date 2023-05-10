function Przelicz() {
  const powierzchnia = document.getElementById("powierzchniaInput").value;
  if (document.getElementById("20x20").checked) {
    const cena = document.getElementById("20x20").value;
    const wynik = powierzchnia * cena;
    document.getElementById(
      "wynik"
    ).innerHTML = `Koszt kafelkowania: ${wynik} zł`;
  } else if (document.getElementById("25x12").checked) {
    const cena = document.getElementById("25x12").value;
    const wynik = powierzchnia * cena;
    document.getElementById(
      "wynik"
    ).innerHTML = `Koszt kafelkowania: ${wynik} zł`;
  }
}
