function solve(lines) {
    for (let i=1; i<lines.length; i++) {
        if (isPrime(Number(lines[i]))) {
            console.log('Prime')
        } else {
            console.log('Composite')
        }
    }
}


function isPrime(n) {
    if (n === 1) return false;
    for (let j=2; j<n; j++) {
        if (n % j === 0) {
            return false
        }
    }
    return true
}
//不知為何就算14行下面不加const num = Math.sqrt(n); 也可以過？而且為何開根號？比方5開根號約2.23，為什麼要跑2.23圈啊？