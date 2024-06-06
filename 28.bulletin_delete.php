<?php
    // 關閉錯誤報告
    error_reporting(0);
    
    // 開始會話
    session_start();
    
    // 檢查使用者是否已登入
    if (!$_SESSION["id"]) {
        // 如果未登入，提示用戶登入並在3秒後重新導向到登入頁面
        echo "請先登入";
        echo "<meta http-equiv=REFRESH content='3, url=2.login.html'>";
    }
    else{   
        // 建立資料庫連結
        $conn=mysqli_connect("db4free.net", "immust", "immustimmust", "immust");
        
        // 刪除佈告的SQL命令
        $sql="delete from bulletin where bid='{$_GET["bid"]}'";
        
        // 執行SQL命令並檢查是否成功
        if (!mysqli_query($conn,$sql)){
            // 如果SQL命令執行失敗，顯示錯誤訊息
            echo "佈告刪除錯誤";
        }else{
            // 如果SQL命令執行成功，顯示成功訊息
            echo "佈告刪除成功";
        }
        
        // 在3秒後重新導向到11.bulletin.php頁面
        echo "<meta http-equiv=REFRESH content='3, url=11.bulletin.php'>";
    }
?>
