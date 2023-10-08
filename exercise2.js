const array = [];
for (let i = 10; i <= 100; i++) {
  if (i % 3 == 0 && i % 2 == 0) {
    array.push(i);
  }
}

console.log("The folowing numbers are even and divisible with 3: " + array);
