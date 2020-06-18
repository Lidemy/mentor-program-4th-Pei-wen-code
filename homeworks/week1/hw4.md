## 跟你朋友介紹 Git

> Git 是一個程式  
這是一個可以幫助使用者在自己的電腦中，替檔案進行版本控制的程式。而版本控制的概念類似於大學或是研究所寫論文時，會先有初版，再來被教授洗臉之後會有第二版，覺得好像又有哪裡要加資料於是產生第三版...一直到口試以前的最終版 ; 這個從初版到最終版的過程中，包含資料的增加與刪減，就是版本控制。  

> 我該怎麼開始使用 Git ?  
Git 是一個必須用 command line 才能執行的程式。所以必須要先做以下的準備:  
1. 對 command line 有基礎的操作經驗。  
2. 有 git-bash (Window users) 或是 terminal (MacOS users)。  
3. 確認已安裝 git 程式：Windows 用戶[按此下載安裝](https://git-scm.com)， MacOs用戶按[此下載安裝](https://git-scm.com/book/en/v2/Getting-Started-Installing-Git)。  
4. 安裝完以後在用`git --version` 確認是否安裝成功。  

> Git 的基礎指令有哪些？
1. 先用 `cd` 指令到某個資料夾，而資料夾裡的檔案會被 Git 程式抓進來做版本控制。  
2. 輸入`git init`確認 Git 對該資料夾進行版本控制。這個資料夾對 Git 來說會是一個 "Working directory" (工作資料夾)。  
3. 用`vim .gitignore` 先把不需要被控制的檔案排除。 進入 vim 之後，按 i 開啟插入模式，並輸入不想被版控的檔案的檔名，按`:wd`就會儲存並離開 vim 模式。   
4. 離開 vim 模式之後，用`git status`查看目前有哪些檔案在wordking directory，它們會被 highlight 成紅色。  
5. 用`git add .`把所有檔案加入版本控制（若用`git add 某檔案名`可以將某個指定的檔案加入版控）; 此時這些檔案名會變成綠色，同時也代表他們現在在 staging area 了。  
6. 此時對檔案進行編輯 ; 編輯完成後存擋。接著用`git status`檢查有無任何檔案被修改了，被修改的檔案會呈現紅色，並有"modified"字樣在檔案名前。    
7. 若有 modified，要用`git commit -m "輸入任何字在此雙引號內，通常是版本名稱"`; 這個舉動是確認修並產生修改後的版本。  
8. 接著用`git log`看一下剛剛產生的版本有無被建立。

> 養成在 Git 建立 branch 的好習慣  
Branch 是使用 Git 時很重要的概念之一。比方說，當工程師就本來上線的產品進行新功能的開發時，卻被 PM 告知有 bug 要修時，有 branch 讓工程師可以把“本來上線的產品”的 bug 修好，並且把修改後的版本推上線，同時也用另外一個 branch 對新功能進行開發。若沒有 branch，會發生的情況是，工程師將會把修復過後的產品與開發到一半的產品一起上線...

1. 比方，用`git branch yayay` 可以創建一個叫 yayaya 的分支。  
2. `git branch -v`可以看到目前所在的分支是哪一個，所在分支會以綠色顯示。  
3. 若想要移動到別的分支，使用`git checkout`，比方`git checkout yayaya`是“跳轉到 yayaya 那個分支”。   
4. 確認工作時都在“不是 master branch”的分支進行開發。
5. 當分支的開發工作結束以後，用`git checkout master`到主幹，並使用`git merge yayaya` 把 yayaya 這個分支合併到主幹當中。
6. 若在合併當中產生衝突，則開啟檔案編輯，決定要的內容是什麼並存擋，再用`git commit -am "輸入版本名稱"`，這是一個可以 add 也順便 commit 的便捷指令。  

> GitHub 可以看作是一個遠端的空間  
GitHub 的 Hub 本來就是“匯集”的意思，所以它的用途就是匯集被版本控制的檔案們。先去 GitHub 申請帳號就可開始建立倉庫，並把以上被版控的檔案上傳到這個遠端的倉庫囉。  

1. 先點選自己的 GitHub 頁面的頭像旁邊的 “＋” 號，並建立新的倉庫/respository。  
2. 接著複製 `git remote add ...`那串到 CMI 上，這會讓你的 Git 加入遠端的倉庫。  
3. 接著複製`git push -u origin master`到 CML 上，這是把自己本地端的檔案上傳到遠端倉庫中的主幹當中。也就是傳說中的`git push`。
4. 相反的，若遠端倉庫的任何一個分枝被編輯過，你也要拉到自己本地端的電腦中同步，就用`git pull`。  
5. 若是想把其他開發者的專案從 GitHub 載到自己的電腦，可以在該專案的頁面點選**Clone or download**，並複製網址列中的網址。  
6. 在 CMI 上使用`git clone` 並貼上剛剛複製的網址。  
7. 簡單來說，只要本地端檔案有更動，就要用`git push`把檔案推到遠端倉庫 ; 若遠端倉庫有更新，就用`git pull` 把本地端同步化。  

