## 什麼是 DOM？
DOM 全名是 Document Object Model。它是瀏覽器提供給 JavaScript 的一種工具，能讓 JS 選 document 的元素並對其做改變。

## 事件傳遞機制的順序是什麼；什麼是冒泡，什麼又是捕獲？
順序會先從最最上面一層的 Windows --> Document --> HTML --> Body --> 各種標籤 --> 事件本身。目前為止的階段叫做捕獲。
接著會由事件本身一路往上傳遞（循著剛剛的路徑），回到 Windows。這個階段又叫做冒泡。

當一個又一個的事件有父子關係，且皆有掛 event listner 的時候，必須考慮監聽事件的哪一個階段，以免像連坐法一樣，對子元素做事結果連父元素的監聽都影響到了。

因此，決定要監聽事件的捕獲還是冒泡階段，是由 event 第三個參數決定的。若參數為true，則監聽一個事件的捕獲階段。若不設定或是設定為false，則是監聽冒泡階段。


## 什麼是 event delegation，為什麼我們需要它？
event delegation 是“事件代理”，之所以會需要它是因為我們想減少掛 event listener 在檔案裡無限個事件上，並且可以讓程式碼看起來更為簡潔。事件代理運用事件傳遞機制的原理，監聽事件的冒泡階段並做出指定反應。

## event.preventDefault() 跟 event.stopPropagation() 差在哪裡，可以舉個範例嗎？
前者用來阻止 event 第一個參數的預設行為。比方參數為 submit 時，預設行為就是(點擊後的)“送出”行為。因此若用 event.preventDefault() 可以阻止表單送出。後者則是阻止事件傳遞。掛在哪個事件上的哪個階段，就代表事件只傳遞到那個事件的那個階段。比方說，我想監聽一個事件的捕獲階段，並設定 event.stopPropagation() ，這代表該事件的傳遞只會傳到捕獲階段，並不會往下傳到冒泡階段。
