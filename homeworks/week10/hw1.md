## 六到十週心得與解題心得
從第四關開始，雖不是那麼直覺，但第六感就是告訴我去看程式碼，因此還算好解

第五關一開始輸入直接給的密碼，後當然不對，之後再看一遍，想想 transparent 是 css 的一種屬性，於是就去找 css 檔案

第六關是真的有卡一下，於是只好上網求助，才發現居然是跳轉頁面...但是，我真的看不出有跳轉QQ

第七關那 windows 不是很明白意思，也是上網找才知道答案。不過我想問的是，這邊想要測驗的概念是什麼？是那個捕獲與冒泡那邊的觀念嗎？那有實際的例子可以舉出工程師的日常什麼時候會碰到需要去 windows 找東西的例子嗎？

第八關只要去 application -> storage 找到 cookie 就好，稍微 encode 一下，％7b 和 ％7d 都是曲線括號，去掉這兩個中間的就是 token 了

第九關就去找 response header

第十關，先解程式碼，知道 token 長度必須為 8，而且第二位乘以前一位的和，對第一位取餘數之後還必須等於 0，才符合條件。我一開始輸入 11111111 就不行了，奇怪這條件不是符合嗎？最後還是去找同學的解法，可是仍蠻不明白為什麼八個一不行。

第十一關，要繞過同源政策，使用 Node.js 發出請求。學到其實發真正的請求之前都會有一個叫 pre-flight 的請求，先向 server 端確認是否可以接受我們接下來要發的請求，如果 server 在 pre-flight 的階段給一個 options 就代表 server 不接受目前 client 端的請求方式，它要你用其他 server 可能會接受的方式傳送請求。
https://dev.to/p0oker/why-is-my-browser-sending-an-options-http-request-instead-of-post-5621
https://assertible.com/blog/7-http-methods-every-web-developer-should-know-and-how-to-test-them#options

第十二關，去指定網址看到一個很像 ptt 風格的版，看了一下被 render 的所有檔案中，js 檔有一個 news_api,php?id=888888，把這個複製並用 Node.js 發 request，不要透過瀏覽器就可以了

第十三關...設定 cookie，記得是在第九週作業的時候實作過，在處理登入的 php 檔案中，使用了 setcookie 這個函數，並設置 token，其值，以及 time() 函數...到 response header 找到真正的 cookie

第十四關，猜數字，有點像之前 ABBA 那個，這邊可以利用 network 裡的 waterfall看反應時間，越久代表越接近密碼

第十五關解不出來哭哭，我的做法是先設定一個有小時也有分的時間，比如11:30，接著把它相乘加42(得372)，把得出來的數字作因式分解找出因數，發現其大於100的因數是124，
所以count就是124，接著我用122(z 的 ascii code)減去65得57，再用124/57得2.1(也就是有兩個z)，然後因餘數是10，因此就平均分配給剩下的六位數，因此得zzCCCCCA，結果不對QQ

