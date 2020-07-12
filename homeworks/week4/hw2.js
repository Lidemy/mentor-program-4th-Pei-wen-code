/* eslint-disable */
const request = require('request');
const process = require('process');
const API_ENDPOINT = 'https://lidemy-book-store.herokuapp.com';



// node hw2.js list // 印出前二十本書的 id 與書名
if (process.argv.length === 3 && process.argv[2] == 'list') {
  request(
  `${API_ENDPOINT}/books?_limit=20`,
  function (err, response, body) {
    if (err) {
      return console.log('抓取失敗', err);
    };
    let data;
    try {
      data = JSON.parse(body);
    } catch(err) {
      console.log(err);
      return
    };
    for (let i = 0; i < data.length; i += 1) {
      console.log(`${data[i].id} ${data[i].name}`);
    }
  })
}

// node hw2.js create "I love coding" // 新增一本名為 I love coding 的書
if (process.argv.length === 4 && process.argv[2] == 'create') {
  request.post({
    url: `${API_ENDPOINT}/books`,
    form: {
      name: `${process.argv[3]}`,
  }},
  function (error, response, body) {
    console.log('statusCode:', response && response.statusCode);
    let data;
    data = JSON.parse(body);
    console.log(data.name);
  })
}


// node hw2.js update 1 "new name" // 更新 id 為 1 的書名為 new name
if (process.argv.length === 5 && process.argv[2] == 'update') {
  request.patch({
    url: `${API_ENDPOINT}/books/${process.argv[3]}`,
    form: {
      name: `${process.argv[4]}`,
  }},
  function (error, response, body) {
    console.log('statusCode:', response && response.statusCode);
    let data;
    data = JSON.parse(body);
    console.log(data.id + ' ' + data.name);
  })
}


// node hw2.js read 1 // 輸出 id 為 1 的書籍
if (process.argv.length === 4 && process.argv[2] == 'read') {
  request(
    `${API_ENDPOINT}/books/${process.argv[3]}`,
  function (error, response, body) {
    console.log('statusCode:', response && response.statusCode);
    let data;
    data = JSON.parse(body);
    console.log(data.id + ' ' + data.name);
  })
}


// node hw2.js delete 1 // 刪除 id 為 1 的書籍
if (process.argv.length === 4 && process.argv[2] == 'delete') {
  request.delete(
    `${API_ENDPOINT}/books/${process.argv[3]}`,
  function (error, response, body) {
    console.log('statusCode:', response && response.statusCode);
    let data;
    data = JSON.parse(body);
    console.log('You have deleted the book successfully, try to use read with the specific id to check if the book is undefined'); 
  })
}