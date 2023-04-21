//prettier-ignore
const alphabet = {
    "0": 0,
    "1": 1,
    "2": 2,
    "3": 3,
    "4": 4,
    "5": 5,
    "6": 6,
    "7": 7,
    "8": 8,
    "9": 9,
    "A": 10,
    "B": 11,
    "C": 12,
    "D": 13,
    "E": 14,
    "F": 15,
};

function Przelicz() {
  let system = document.getElementById("system").value;
  let number = document
    .getElementById("number")
    .value.replace(/\s*[g-z]*/gi, "")
    .toUpperCase();
  let length = number.length;
  let output = alphabet[number[0]];
  let i = 0;

  while (i < length - 1) {
    output = output * system + alphabet[number[++i]];
    console.log(output);
  }

  return (document.getElementById("output").value = parseInt(output));
}

const alphabetOdwrotnie = {
  0: "0",
  1: "1",
  2: "2",
  3: "3",
  4: "4",
  5: "5",
  6: "6",
  7: "7",
  8: "8",
  9: "9",
  10: "A",
  11: "B",
  12: "C",
  13: "D",
  14: "E",
  15: "F",
};

function PrzeliczOdwrotnie() {
  let system = document.getElementById("systemOdwrotnie").value;
  let number = document
    .getElementById("numberOdwrotnie")
    .value.replace(/\s*[a-z]*/gi, "");
  let output = "";

  if (number == 0) {
    return (document.getElementById("outputOdwrotnie").value = 0);
  }
  while (number > 0) {
    output = alphabetOdwrotnie[number % system] + output;
    number = Math.floor(number / system);
  }

  return (document.getElementById("outputOdwrotnie").value = output);
}
