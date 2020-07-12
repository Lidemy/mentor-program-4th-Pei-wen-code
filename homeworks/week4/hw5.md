## 請以自己的話解釋 API 是什麼
我覺得API是一個“發送請求到得到請求的結果”這一個過程。實際的應用面是，開發者把自己的網站串其他的API讓該網站用戶可以獲取其他網站之資料。
比方說，我們在使用很多教學網站時，像Gimkit，Quizziz，Flipgrid這些平台，很多都可以直接串Google classroom的服務。老師若有用GC，就不用額外花時間輸入學生姓名建立資料庫了。


## 請找出三個課程沒教的 HTTP status code 並簡單介紹
201 就是post之後會出現的結果 通常是新增成功的意思
401 就是用戶沒被授與瀏覽某網站時會出現的畫面，有時候我忘記開vpn連學校資料庫好像會發生這件事
505 瀏覽器無法支援該網站的時候會出現的

## 假設你現在是個餐廳平台，需要提供 API 給別人串接並提供基本的 CRUD 功能，包括：回傳所有餐廳資料、回傳單一餐廳資料、刪除餐廳、新增餐廳、更改餐廳，你的 API 會長什麼樣子？請提供一份 API 文件。

有可能長得像這樣...

Base URL: https://api.resturanthub.co.uk


說明              Method         Path                 參數                          
回傳所有餐廳資訊     GET          /resturants    
得到單一餐廳資訊     GET          /resturants/:name        
刪除某餐廳資訊     DELETE         /resturants/:name    
新增餐廳           POST          /resturants          name: name of the resturant   
修改餐廳資訊       PATCH         /resturants/:name     name: name of the resturant或 address: new address 或openinghours: new opening hours 之類

