<?php

// 關閉錯誤報告
error_reporting(0);

// 開始會話
session_start();

// 檢查使用者是否已登入
if (!$_SESSION["id"]) {
    // 如果未登入，提示用戶登入並在3秒後重新導向到登入頁面
    echo "請登入帳號";
    echo "<meta http-equiv=REFRESH content='3, url=2.login.html'>";
} else {
    // 建立資料庫連結
    $conn = mysqli_connect("db4free.net", "immust", "immustimmust", "immust");

    // 新增資料的SQL命令
    // insert into 表格名稱(欄位1,欄位2) values(欄位1的值,欄位2的值)
    $sql = "insert into user(id, pwd) values('{$_POST['id']}', '{$_POST['pwd']}')";
    
    // 執行SQL命令並檢查是否成功
    if (!mysqli_query($conn, $sql)) {
        // 如果SQL命令執行失敗，顯示錯誤訊息
        echo "新增命令錯誤";
    } else {
        // 如果SQL命令執行成功，顯示成功訊息並在3秒後重新導向到18.user.php頁面
        echo "新增使用者成功，三秒鐘後回到網頁";
        echo "<meta http-equiv=REFRESH content='3, url=18.user.php'>";
    }
}
?>
