// eslint-disable-next-line
const request = require('request');

const options = {
  url: 'https://api.twitch.tv/kraken/games/top',
  headers: {
    Accept: 'application/vnd.twitchtv.v5+json',
    'Client-ID': 'l2c4tqr5o2nurxv9wccl8ojikzkouz',
  },
};

request.get(options, (error, response, body) => {
  if (error) {
    console.log('資料存取失敗');
    return;
  }
  const data = JSON.parse(body);
  const games = data.top;
  // eslint-disable-next-line
  for (let eachGame of games) {
    console.log(`${eachGame.viewers} ${eachGame.game.name}`);
  }
});
