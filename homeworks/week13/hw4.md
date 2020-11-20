## Webpack 是做什麼用的？可以不用它嗎？
Webpack 是一個模組打包檔案們的工具。基本上就是安裝 Webpack 後，再引用各種 loaders 來 compile 各種模組成為一個檔案，就可以丟到瀏覽器上執行。不用 Webpack 是可以，因為瀏覽器已經有一個支援 import 和 export 模組的東西，叫做 ES Modules。但是它算是相對新的產品，所以還是建議用 Webpack。

## gulp 跟 webpack 有什麼不一樣？
Webpack 主要用來把模組們打包，而 gulp 是用來管理任務。Webpack 在打包之前會用各種 loaders 做資源的轉換，這一點跟 gulp 很像，但 gulp 不像 Webpack 那樣，在資源轉換之後還順便把轉換過後的東西都包在一起。

## CSS Selector 權重的計算方式為何？
CSS selector 計算權重的方式，由權重最重至輕的排列分別為：inline style attribute, ID, class/psuedo-class/attribute, element。比方說，如果有一個 <li style = “color: red”> 那麼權重就會給 style attribute 一分，其他讀數則是零分，看起來像是 1, 0, 0, 0。又比方，ul #nav li.active a，則 style 的讀數會是零分，ID 有一分（因為 #nav），class 拿一分（因為 .active）然後 elements 拿三分（因為 ul, li 以及 a），整組讀數看起來會是 0, 1, 1, 3。而通常權重會以之後寫的為主，要是有衝突，會以越靠近檔案下方的 css 程式碼為主。