## 什麼是 Ajax？
Ajax 是 Asynchronous JavaScript and XML 的簡寫，是一種非同步且用 JS 交換資料（送出請求 ＆ 得到回覆）的方式

## 用 Ajax 與我們用表單送出資料的差別在哪？
用表單送出資料比較像是帶參數到某個頁面，因為表單資料都會被加在原始網址的後面，然後 responde 會由 server 傳給瀏覽器。但是 Ajax 比較是真正在跟後端溝通，不像用表單送資料，透過 Ajax 可以真的拿到 response 的資料，而且瀏覽器一但接收到 response，會把它送給瀏覽器的 JS （去觸發其他事件之類的）。

## JSONP 是什麼？
JSON with Padding 的簡寫，目的是為了解決跨網域還可以拿到資料。這個方式是利用 script 標籤不受同源政策的限制所產生的神奇用法。用法是用一個 script 標籤加上 src 屬性，值是取一個 JS 檔案（這個 JS 檔案有一 function，內含資料）。再利用另外一個 script 標籤包起一個被宣告的 function。這時候被宣告的 function 就會被執行，因此拿到資料。

## 要如何存取跨網域的 API？
就要確定 server 的 response.header 有 access-control-allow-origin 才可以跨網域存取資料。

## 為什麼我們在第四週時沒碰到跨網域的問題，這週卻碰到了？
因為第四週送 request 的時候是透過 node.js 請作業系統送出請求給 server，但本週是瀏覽器上的 JS 透過瀏覽器請作業系統送出請求給 server。就是因為多了瀏覽器這一層，所以瀏覽器本身為了安全性多加了許多限制（比方同源政策，不同網域卻可以互相拿資料蠻可怕的）。
