## 教你朋友 CLI
  
> 首先，command line 只是**操控電腦**的另一種方式  
Command line 是“命令行”的意思，指的是用一行一行的命令讓電腦做你想要它做的事。在談到 command line 以前，必須先講到 Graphic User Interface/ GUI，因為它是大部分的人目前操控電腦的方式。  

什麼是 GUI 呢？它指的是“讓使用者以圖形介面操控電腦”。比方說，若在 Macbook 新增一個資料夾，只要兩指同時在操控版上輕點，就會出現一串選單，然後只要點選“新增資料夾”的選項，就可以新增一個資料夾。這一連串的過程，都是藉由點選某個圖示完成的。 

反觀以命令行的方式，也就是 Command Line Interface/ CLI，讓電腦新增一個資料夾，使用者不需要點選任何電腦上的圖示（e.g. 垃圾桶是一個圖示，Safari也是一個圖示）, 只需要輸入"命令/ command line "，即可完成新增檔案的任務。比起選擇“新增資料夾”，使用者必須在git-bash(微軟使用者)或是 terminal (Mac使用者)輸入 `mkdir xxx`，即可新增一個叫 xxx 的檔案夾，而 `mkdir xxx` 就是一行命令/ command line。  

以下這張圖可以更清楚的比較 GUI 和 CLI 的差異  
[兩種介面的差異](https://anydifferencebetween.com/wp-content/uploads/2016/09/Difference-Between-Graphical-User-Interface-and-Command-Line-Interface.jpg)  

> 那，我到底怎麼用 command line 做那些，我用 GUI 就可以完成的事呢？  
**先確認你的電腦上有沒有可以讓你輸入 command line 的環境吧！**  
1. 如果你是 Windows 使用者，請至[Git官網](https://git-scm.com/)下載 Git 並依照步驟安裝，安裝完以後點選 Git bash 即可開啟使用 command line 的介面。  
2. 如果你是 Mac 使用者，直接在螢幕右上角的搜尋輸入 Terminal 即可開啟使用 command line 的介面。  

**以下幾種是基本的 command line 指令**  
1. 輸入`pwd` ( Print Working Directory 的縮寫) 可以印出目前所在位置。  
2. 如果你想從目前所在位置移動到桌面 你可以輸入 `cd Desktop`, `cd`為 Change Directory 的縮寫。  
3. 想像一下你現在沒有任何的“圖示”可以看(因為你在 CLI 了，忘了 GUI 吧), 那你要怎麼樣看到桌面上的資料夾？很簡單，這時候輸入`ls` ( LiSt 的縮寫)，你就可以看到你所有的資料夾會在 CLI 上被印出來了。它的功能是列出檔案清單。  
4. 你會想去別的資料夾，怎麼做？想想你目前位置在桌面，然後你要前往桌面上的某個資料夾，叫它 haha 好了。你可以輸入 `cd haha` 就可以進入那個叫 haha 的資料夾。想回到上一層的話，就輸入`cd ..`。  
5. 想建立檔案？你可以用 `touch`。比方輸入`touch mmm`可以建立一個叫 mmm 的檔案。
6. 那麼建立資料夾呢？指令`mkdir`( MaKe DIRectory 的縮寫) 後面加欲新建之資料夾名稱就可以了。比方`mkdir ccc`會建立一個叫 ccc 的資料夾。  
7. 刪檔案呢？用`rm`。比方`rm 123`( ReMove 的縮寫)可以刪掉一個叫 123 的檔案。  
8. 但是刪掉資料夾有點麻煩。你可以用 `rmdir 456` 來刪掉一個叫456的資料夾，也就是要在rm後面加上dir才行。或是可以用`rm -r 456`。  
9. 關於這個 `-r`，是 `rm` 的一個參數。其實蠻多指令都可以加參數在後面，而且每個參數都有它特別的功能。利用`man`來叫出使用手冊。比方說`man rm`可以看到 rm 指令可以加的所有參數以及其說明。  
10. 想複製檔案的話，比方說，輸入`cp week1 week1copy`( CoPy 的縮寫)，意思是“把 week1 複製一份，並且那個複製檔的名稱叫做 week1copy”。  
11. 想把某個檔案移動到某個資料夾，`move`可以辦到。例如`mv 123 456`指的是將 123 這個檔案移動到 456 這個資料夾。  
12. 上面都是比較基本也比較常用到的指令，更多的 command line 可以到[這個網站](https://www.git-tower.com/blog/command-line-cheat-sheet/) 做更深入的研究。   

> 好，那接下來談談用哪些 command line 可以解決你的需求吧！  
花個五分鐘想一想再往下拉看答案吧！  





















沒錯，你會用到 `mkdir wifi`建立資料夾，也會用到`touch afu.js`建立一個 JS 的檔案。  
