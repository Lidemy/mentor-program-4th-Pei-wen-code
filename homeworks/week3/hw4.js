function solve(lines) {
    let temp = lines[0];
    if (temp === reverseText(temp)) {
      console.log('True')
    } else {
      console.log('False')
    }
}
  
function reverseText(str) {
    let newString = '';
    for (let i=str.length - 1; i>=0; i--) {
      newString += str[i]
    }
    return newString
}