// eslint-disable-next-line
const request = require('request');
// eslint-disable-next-line
const API_ENDPOINT = 'https://restcountries.eu/rest/v2/name/';
// eslint-disable-next-line
const process = require('process');
request(`${API_ENDPOINT}${process.argv[2]}`, (err, response, body) => {
  if (err) {
    console.log('抓取失敗', err);
    return;
    // eslint-disable-next-line
  }
  if (response.statusCode === 404) {
    console.log('找不到國家資訊');
    // eslint-disable-next-line
    return;
  }
  const data = JSON.parse(body);
  for (let i = 0; i < data.length; i += 1) {
    console.log('statusCode:', response && response.statusCode);
    console.log(`國家: ${data[i].name}`);
    console.log(`首都: ${data[i].capital}`);
    console.log(`貨幣：${data[i].currencies[0].code}`);
    console.log(`國碼：${data[i].callingCodes}`);
    console.log('=============');
  }
});
