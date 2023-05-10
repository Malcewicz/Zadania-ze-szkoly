function oblicz() {
  let powierzchnia = document.getElementById("metraz").value;
  let liczba = document.getElementById("liczba").value;
  if (document.getElementById("kafelki").chcecked) {
    koszt = `Koszt mieszkania: ${powierzchnia * 4000 + liczba * 1000 + 2000}zł`;
  } else {
    koszt = `Koszt mieszkania: ${powierzchnia * 4000 + liczba * 1000}zł`;
  }
  document.getElementById("koszt").innerHTML = koszt;
}
