let array1 = [];

for (let i = 0; i < 100; i++) {
  const randomNum = Math.floor(Math.random() * 9) + 1;
  array1.push(randomNum);
}

console.log("array1:" + array1);

let array2 = [];

for (let i = 0; i < array1.length; i++) {
  let sum = 0;
  for (let j = 0; j <= i; j++) {
    sum += array1[j];
  }
  array2.push(sum);
}

console.log("array2:" + array2);

const randomNum1 = Math.floor(Math.random() * 99);
const randomNum2 = Math.floor(Math.random() * 99);

console.log("randomNum1:" + randomNum1);
console.log("randomNum2:" + randomNum2);

let output = 0;
if (randomNum1 < randomNum2) {
  if (randomNum1 === 1) {
    output = array2[randomNum2] - array2[randomNum1];
  }
  output = array2[randomNum2] - array2[randomNum1 - 1];
} else {
  output = array2[randomNum1] - array2[randomNum2];
}

console.log("output:" + output);
