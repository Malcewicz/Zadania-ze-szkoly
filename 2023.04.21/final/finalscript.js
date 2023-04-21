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
const alphabetDrugi = {
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

function Przelicz() {
  let system = document.getElementById("system").value;
  let number = document
    .getElementById("number")
    .value.replace(/[^0-9a-f]/gi, "")
    .toUpperCase();
  let length = number.length;

  // do systemu dziesietnego
  let decimalOutput = alphabet[number[0]];
  let i = 0;

  while (i < length - 1) {
    decimalOutput = decimalOutput * system + alphabet[number[++i]];
  }

  // do dowolnego systemu
  let trueOutput = "";
  let systemDrugi = document.getElementById("systemDrugi").value;

  while (decimalOutput > 0) {
    trueOutput = alphabetDrugi[decimalOutput % systemDrugi] + trueOutput;
    decimalOutput = Math.floor(decimalOutput / systemDrugi);
  }

  return (document.getElementById("output").value = trueOutput);
}
