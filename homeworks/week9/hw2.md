## 資料庫欄位型態 VARCHAR 跟 TEXT 的差別是什麼
差別在於 VARCHAR 可以限定長度 TEXT 則是資料長度不明的時候使用


## Cookie 是什麼？在 HTTP 這一層要怎麼設定 Cookie，瀏覽器又是怎麼把 Cookie 帶去 Server 的？
Cookie 是一個 key:value 的組合，它存在的目的是為解決 HTTP 無狀態性所造成的登入問題。因為收發 request 對於 HTTP 來說每次都是新的 request，HTTP 並不會記住剛剛登入的使用者跳轉到另一個頁面時還是同一個使用者（若不帶 cookie 的話），所以才要在登入動作的時候使用 setcookie，把token的名稱，token的值，以及token過期的時間設定好，帶在 response header 上，而收到 response 的瀏覽器再度發 request 的時候，在 request header 會有一個 set-cookie 值，那就是剛剛設定好的值。

## 我們本週實作的會員系統，你能夠想到什麼潛在的問題嗎？
比方...同一個帳號出現在不同的 ip 位置 ，這樣可能是被盜帳號，其中一個帳號會被踢掉。


