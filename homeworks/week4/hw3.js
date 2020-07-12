/* eslint-disable */

const request = require('request');
const API_ENDPOINT = 'https://restcountries.eu/rest/v2/name/';
const process = require('process')
request(`${API_ENDPOINT}${process.argv[2]}`, (err, response, body) => {
    if (err) {
        return console.log('抓取失敗', err);
    };
    if (response.statusCode === 404) {
      console.log('找不到國家資訊');
      return
    };
    let data;
    try {
      data = JSON.parse(body);
    } catch(err) {
      console.log(err.name);
      console.log(err.message)
      return
    };
    console.log('statusCode:', response && response.statusCode);
    console.log(`國家: ${data[0].name}`);
    console.log(`首都: ${data[0].capital}`);
    console.log('貨幣：' + data[0].currencies[0].code);
    console.log(`國碼：${data[0].callingCodes}`); 
});