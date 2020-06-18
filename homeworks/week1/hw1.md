## 交作業流程

> 在本地端的操控   
1. 新開一個 branch : `git branch week1HW`  
2. 跳轉到新的 branch : `git checkout week1HW`  
3. 確認自己正在新開的 branch 當中：`git branch -v`, 顯示綠色的 branch 必須是 week1HW ; 若無，重新執行以上三步驟  
4. 前往 mentor-program-4th-Pei-wen-code 的 homework 資料夾  
5. 打開當週作業並編輯  
6. 所有作業編輯完成以後用 `git status` 檢查被 modified 的檔案，正常情況會顯示紅色字體  
7. 接著新建版本，使用 `git commit -am 'week1HW completed'`  
8. 將本地端的新分支推到遠端，利用 `git push origin week1HW`  

> 在遠端 GitHub 上的操控  
9. 接著在 GitHub 上找到專案首頁的 **pull request**  
10. 再點選 **compare & pull request**，並輸入簡單資料，如要問助教的問題  
11. 輸入完畢點選**create pull request**等待助教做 code review  

>  在學習系統的操控  
12. 前往[學習系統](https://learning.lidemy.com) 並點選最上排列表的[作業列表](https://learning.lidemy.com/homeworks)  
13. 接著點選左上角的**新增作業**  
14. 點開下拉選單選取 Week1，並貼上方才 pull request 頁面之網址  
15. 按下**送出**以前，先確認有無滿足交作業前的兩個條件並勾選此兩條件  

>  學習系統顯示助教已完成批改，學生回到遠端 GitHub 的操作   
16. 學生在終端機上使用指令將被助教完成合併的 master 推回到本地端，先切換至master 主幹 `git checkout master`  
17. 接著執行 `git pull origin master`  
18. 再把本地端的 week1HW 刪除，利用指令 `git branch -d week1HW`  
19. 用 `git log` 確認 master 上的版本是否與遠端同步  
20. 完成所有作業提交程序  
