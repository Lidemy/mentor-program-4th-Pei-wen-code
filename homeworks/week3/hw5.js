//參考同學的版本
function solve(lines) {
    let arrLength = Number(lines[0])
    for (let i=1; i<=arrLength; i++) {
        let [a, b, k] = lines[i].split(' ')
        console.log(largerOrSmaller(a, b, k))
    }
}
function largerOrSmaller(a, b, k) {
    const lengthA = a.length
    const lengthB = b.length
    if (a === b) {
        return 'DRAW' // 一樣大
    } else {
        if (k == 1) {  // 比大
            if (lengthA === lengthB) {
                for (let i=0; i<lengthA; i++) {
                    if (a[i] == b[i]) {
                        continue
                    } else {
                        return a[i] > b[i] ? 'A' : 'B'
                    }
                }
            } else {
                return lengthA > lengthB ? 'A' : 'B'
            }
        } else { // 比小
            if (lengthA === lengthB) {
                for (let j=0; j<lengthA; j++) {
                    if (a[j] == b[j]) {
                        continue
                    } else {
                        return a[j] > b[j] ? 'B' : 'A'
                    }
                }
            } else {
                return lengthA > lengthB ? 'B' : 'A'
            }    
        }     
    }    
}

//我自己的版本：未考慮數字太大的情況，所以不該把字串轉數字
function solve(lines) {
    for (let i=1; i<lines.length; i++) {
       let aa = lines[i].split(' ')

       if (aa[0] === aa[1]) console.log('DRAW')
       if (aa[2] === '1' && aa[0] !== aa[1]) {
           let result = judgeBig(Number(aa[0]), Number(aa[1]))
           console.log(result)
       } else if (aa[2] === '-1' && aa[0] !== aa[1]) {
           let result = judgeSmall(Number(aa[0]), Number(aa[1]))
           console.log(result)
       } 
    }
}

function judgeBig(a, b) {
    if (a > b) {
        return 'A'
    } else {
        return 'B'
    }
}

function judgeSmall(a, b) {
    if (a < b) {
        return 'A'
    } else {
        return 'B'
    }
}