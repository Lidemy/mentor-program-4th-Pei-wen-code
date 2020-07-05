function solve(arr) {
    let temp = arr[0].split(' ');
    let begin = Number(temp[0]);
    let end = Number(temp[1]);
    
    for (let i=begin; i<=end; i++) {
        if (isNars(i)) {
            console.log(i)
        }
    }
}

function isNars(i) {
    let getInd = '';
    let result = 0;
    if (i < 10 && i === Math.pow(i, 1)) return true
    if (i >= 10) {
        getInd = i.toString().split('')
        for (let j=0; j<getInd.length; j++) {
            result += Math.pow(getInd[j],getInd.length)
        }
        if ( result === i) {
            return true
        }
    }
}

// 我的解法跑出來的時間比老師的長很多，這就是所謂效能問題吧？那這塊程式碼效能慢事不是出在我不段轉換型別？還有要怎麼樣練習讓效能更好？