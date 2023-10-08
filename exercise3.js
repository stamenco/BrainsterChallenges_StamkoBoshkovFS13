const number1 = parseInt(prompt("Enter a Number1 of 3: "));
const number2 = parseInt(prompt("Enter a Number2 of 3: "));
const number3 = parseInt(prompt("Enter a Number3 of 3: "));

const array = [number1, number2, number3];

const smallest = Math.min(...array);
const largest = Math.max(...array);

console.log(`Smallest - ${smallest}, Largest - ${largest}`);
console.log(
  `The smallest number ${smallest} is ` +
    isPrime(smallest) +
    `, The largest number ${largest} is ` +
    isPrime(largest) +
    `.`
);

function isPrime(number) {
  if (number < 2) {
    return "number under 2!!!";
  }

  for (let i = 2; i <= Math.sqrt(number); i++) {
    if (number % i === 0) {
      return "not prime";
    }
  }

  return "prime";
}
