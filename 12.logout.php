<?php
    // 開始會話
    session_start();
    
    // 清除會話中的id
    unset($_SESSION["id"]);
    
    // 輸出登出成功訊息
    echo "登出成功....";
    
    // 使用meta標籤在3秒後重新導向到2.login.html頁面
    echo "<meta http-equiv=REFRESH content='3; url=2.login.html'>";
?>