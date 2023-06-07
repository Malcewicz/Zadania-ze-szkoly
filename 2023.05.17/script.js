let array1 = [];
const arraySize = 100;

for (let i = 0; i < arraySize; i++) {
  const randomNum = Math.floor(Math.random() * 9) + 1;
  array1.push(randomNum);
}

console.log("array1: " + array1 + "\n");

let array2 = [];

for (let i = 0; i < array1.length; i++) {
  let sum = 0;
  for (let j = 0; j <= i; j++) {
    sum += array1[j];
  }
  array2.push(sum);
}

console.log("array2: " + array2 + "\n");

const randomNum1 = Math.floor(Math.random() * (arraySize - 1));
const randomNum2 = Math.floor(Math.random() * (arraySize - 1));

console.log("randomNum1: " + randomNum1);
console.log("randomNum2: " + randomNum2);

let output = 0;
if (randomNum1 < randomNum2) {
  if (randomNum1 === 0) {
    output = array2[randomNum2] - 0;
    return console.log("output: " + output);
  }
  output = array2[randomNum2] - array2[randomNum1 - 1];
} else {
  if (randomNum2 === 0) {
    output = array2[randomNum1] - 0;
    return console.log("output: " + output);
  }
  output = array2[randomNum1] - array2[randomNum2 - 1];
}

console.log("output: " + output);
