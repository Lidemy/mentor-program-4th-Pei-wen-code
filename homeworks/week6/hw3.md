## 請找出三個課程裡面沒提到的 HTML 標籤並一一說明作用。
<em></em>包起來的自有斜體效果，而<strong></strong>則是粗體，兩個都有inline的特性。<ol></ol>則是會讓list前面有數字順序。

## 請問什麼是盒模型（box model）
盒模型是一個元素的層次。比方每一個item由裡到外分別有 text, padding, border and margin。而能不能調整box model中的每一個值端看display的方式決定的。另外，box-sizing可以調整整個元素的大小，若值是border-box，對整體切版作業來說比較簡單。


## 請問 display: inline, block 跟 inline-block 的差別是什麼？
他們都是元素的排列方法。若標籤為 div h p，則這些元素會以block的方式表現。若是 span a em strong，則會以inline的形式表現。 block會佔滿整行，寬高皆可調整 ; 而inline則無法調整寬高，倒是padding可以調整（可寬高依然沒變）。若想要元素與其他元素排列，也想要調整寬高，則display必須設定成inline-block。很多時候元素沒照著想像中的樣子排版，大多是因為display的方式。


## 請問 position: static, relative, absolute 跟 fixed 的差別是什麼？
在position沒有特別設定的情況下，預設值是static。Static的意思就是他的document flow是由左到右，由上往下的。也就是說，元素的排列會依照這樣子的document flow來走。可是我今天要調整其中一個元素到我要的位置，我可以將那個元素設定position: relative，接著調整TLRB的數值，而這些數值是“相對於”static的，也就是把static當成基準點。Absolute反而是把relative 當成基準點（所以要用absolute的時候，我必須確定上一層的定位是相對位置，否則就會往上找，直到以body層作為定為基準）。relative 不會影響其他元素的位置，但absolute會。Absolute會讓元素脫離原本的document flow，也就是讓下一個元素遞補到absolute在變成絕對定位以前的位置。Fixed就是把元素定位在相對於viewport的位置，捲軸怎麼捲都不會動，應用為廣告或是I can help那個小視窗。

問題：

1. 但我不是很清楚relative 和 absolute 在工作的時候實際上怎麼用（absolute目前能想到的就是餐廳那個作業中，評論區圖片可以以文字評論作為基準點做絕對定位...但實例不夠多所以對這兩個的應用仍然相當模糊）

2. 關於flex-box 中的 flex-basis屬性也是蠻莫名的。既然它的值設定為auto的時候，就是指元素的寬高是按照width and height 做設定，那麼什麼時機我會把flex-basis設為不是auto？換句話說，就是我都已經設定寬高了，為什麼還需要有flex-basis這個屬性？它被創造出來是為了解決什麼樣的問題？

