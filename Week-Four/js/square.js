function square(a) {
  return function (b) {
    return a * b;
  };
}

window.onload = function () {
  let a = 5;
  let b = 5;
  let squareIt = square(a);
  let result = squareIt(b);
  console.log(`The square of ${a} = ${result}`);
  alert(`The square of ${a} = ${result}`);
};
