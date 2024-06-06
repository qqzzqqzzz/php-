<html>
    <head><title>使用者管理</title></head>
    <body>
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
            // 如果已登入，顯示使用者管理頁面內容
            echo "<h1>使用者管理</h1>
                [<a href=14.user_add_form.php>新增使用者</a>] [<a href=11.bulletin.php>回佈告欄列表</a>]<br>
                <table border=1>
                    <tr><td></td><td>帳號</td><td>密碼</td></tr>";
            
            // 建立資料庫連結
            $conn = mysqli_connect("db4free.net", "immust", "immustimmust", "immust");
            
            // 從資料庫查詢所有使用者
            $result = mysqli_query($conn, "select * from user");
            
            // 遍歷查詢結果，並顯示在表格中
            while ($row = mysqli_fetch_array($result)) {
                echo "<tr>
                        <td><a href=19.user_edit_form.php?id={$row['id']}>修改</a>||<a href=17.user_delete.php?id={$row['id']}>刪除</a></td>
                        <td>{$row['id']}</td>
                        <td>{$row['pwd']}</td>
                      </tr>";
            }
            echo "</table>";
        }
    ?> 
    </body>
</html>
