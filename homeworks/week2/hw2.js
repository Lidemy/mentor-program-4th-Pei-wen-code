function capitalize(str) {
	let ascii = str.charCodeAt(0);
    let newName = '';
    if (97 <= ascii && ascii <= 122) {
        ascii = ascii - 32;
        newName = String.fromCharCode(ascii);
        for (let i=1; i<str.length; i++) {
            newName += str[i];
        }
    } else {
        return str
    }
}

console.log(capitalize('hello'));
