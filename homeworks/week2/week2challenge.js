// let aa = [1, 2, 3, 4, 5];
// let length = aa.length;

// while( length > 1 ) {
//     length = Math.floor(length/2);
//     check(length, aa) ? console.log('Yes') : console.log('No')
//     aa = aa.splice(length)//不對不能用splice因為就算改變了陣列長度還是得回傳原本陣列的index
// }

// function check(value, aa) {
//     for (let i=0; i<2; i++) {
//         if (aa[i] === 5) {
//             return true
//         } else {
            
//         }
//     }
// }

function solve(arr, value) {
    let start = 0;
    let end = arr.length -1

    while (start <= end ) {
        let mid = Math.floor((start + end) / 2);
        
        if (value === arr[mid]) return console.log(arr.indexOf(arr[mid]));
        if (value > arr[mid]) {
            start = mid + 1
        } 
        if (value < arr[mid]) {
            end = mid - 1
        }
    }
    return console.log(-1)
}

solve([1, 2, 3, 4, 5], 0)
