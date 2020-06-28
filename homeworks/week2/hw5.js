function join(arr, concatStr) {
  let newStr = '';
    for (let i=0; i<arr.length; i++) {
        newStr += arr[i]
        i< arr.length - 1 ? newStr += str : newStr
    }
    return newStr
}

function repeat(str, times) {
  let newStr = '';
    for (let i=1; i<= num; i++) {
        newStr += str;
    }
    return newStr
}

console.log(join(['a'], '!'));
console.log(repeat('a', 5));
