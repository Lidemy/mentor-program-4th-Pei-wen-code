/* eslint-disable */
//一開始我寫成這樣
const request = require('request');

const options = {
  url: 'https://api.twitch.tv/kraken/games/top',
  headers: {
    'Accept': 'application/vnd.twitchtv.v5+json',
    'Client ID': 'l2c4tqr5o2nurxv9wccl8ojikzkouz'
  }
};

function callback(error, response, body) {
  if (!error && response.statusCode == 200) {
    const info = JSON.parse(body);
    console.log(info)
  }
}
//之後分析老師的範本，以下為老師的範例，註解的部分是分析程式碼學到的東西
// const request = require('request');

// const CLIENT_ID = 'l2c4tqr5o2nurxv9wccl8ojikzkouz';
// const BASE_URL = 'https://api.twitch.tv/kraken';


// request({
//   method: 'GET',
//   url: `${BASE_URL}/games/top`,
//   headers: {
//     'Client-ID': CLIENT_ID,
//     'Accept': 'application/vnd.twitchtv.v5+json'
//   }//1. 
// }, function(err, res, body) {
//   if (err) {
//     return console.log(err)
//   }

//   const data = JSON.parse(body)//2. parse掉以後就可以當一般物件使用
//   const games = data.top//3.
//   for(let game of games) {//4. 
//     console.log(game.viewers + ' ' + game.game.name)
//   }
// })

//
// 1. 對這邊的理解就如老師在Slack的回答，request的第一個參數不只可以帶url，
// 也可以帶其他的東西。所以在這個練習當中，這個request是要更改header的東西，
// 而不是body的資料。

//3. data.top印出來的東西是一個物件，這物件裡有兩個properties，其中一個是陣列
//中包著很多個物件
// {
//     _total: 2725,
//     top: [
//       { game: [Object], viewers: 248900, channels: 4186 },
//       { game: [Object], viewers: 186532, channels: 3247 },
//       { game: [Object], viewers: 156618, channels: 1987 },
//       { game: [Object], viewers: 100370, channels: 10139 },
//       { game: [Object], viewers: 96543, channels: 5333 },
//       { game: [Object], viewers: 92611, channels: 4055 },
//       { game: [Object], viewers: 87839, channels: 1436 },
//       { game: [Object], viewers: 86493, channels: 2349 },
//       { game: [Object], viewers: 49034, channels: 229 }
//     ]
//   }
// 承上，其中一個property又包一個物件，而那個物件裡印來的東西長這樣
//[
//     {
//       game: {
//         name: 'League of Legends',
//         _id: 21779,
//         giantbomb_id: 24024,
//         box: [Object],
//         logo: [Object],
//         localized_name: 'League of Legends',
//         locale: 'en-us'
//       },
//       viewers: 248900,
//       channels: 4186
//     },...

// 4. 為了取top裡面的game的name的值，用了for ... of 方法，遍歷games變數中的game，
//迴圈數目為games變數中的物件的index數。每次回圈，都會印出viwer的值還有game裡面
//的name的值。

//game.game.name還好理解，但是

// 問題：
// 1. 我不明白的是，viewer不是game裡面的物件，為什麼可以用game.viewers的方式拿值，
// 而不是只有viewers就好？
// 2. key: value的value貌似可以是一個陣列而且該陣列中有多個物件，也可以直接是一個物件。
// 這兩種安排的差別是什麼？