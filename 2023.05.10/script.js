const sectionKot = document.getElementById("kot");
const sectionPies = document.getElementById("pies");
const sectionPapuga = document.getElementById("papuga");
const sectionBocian = document.getElementById("bocian");
const tytul = document.getElementById("tytul");
const wynik = document.getElementById("wynik");

sectionKot.addEventListener("click", () => {
  let tekst =
    "Koty to mięsożerne zwierzęta domowe o zwinnej budowie ciała. Są znane ze swojej niezależności i często są hodowane jako towarzysze człowieka. Mają bardzo czułe zmysły, w tym ostry wzrok, słuch i węch.";
  return (wynik.innerHTML = tekst), (tytul.innerHTML = "Kot");
});

sectionPies.addEventListener("click", () => {
  let tekst =
    "Psy to popularne zwierzęta domowe, znane ze swojej przyjacielskiej natury i zdolności do bycia dobrymi towarzyszami. Są często szkolone jako psy przewodniki lub psy policyjne, a niektóre rasy psów są wykorzystywane do polowań lub jako psy stróżujące.";
  return (wynik.innerHTML = tekst), (tytul.innerHTML = "Pies");
});

sectionPapuga.addEventListener("click", () => {
  let tekst =
    "Papugi są socjalnymi ptakami, które często bywają hodowane jako zwierzęta domowe ze względu na swój kolorowy wygląd i zdolność do naśladowania ludzkich głosów. Są inteligentne i wymagają odpowiedniej opieki, w tym odpowiedniej diety i wystarczającej ilości czasu spędzonego z właścicielem.";
  return (wynik.innerHTML = tekst), (tytul.innerHTML = "Papuga");
});

sectionBocian.addEventListener("click", () => {
  let tekst =
    "Bociany to ptaki migracyjne, znane z charakterystycznych długich nóg i skrzydeł o rozpiętości nawet do 2 metrów. Są często kojarzone z narodzinami dzieci i uważane za symbol szczęścia i płodności. W Polsce bociany są chronione przez prawo i cieszą się popularnością jako atrakcja turystyczna.";
  return (wynik.innerHTML = tekst), (tytul.innerHTML = "Bocian");
});
