<!-- ทำลาย session ทั้งหมดทิ้งแล้วเด้งกลับไปยังหน้า search.php -->
<?php
    session_start();
    session_destroy();

    header('Location: ../../SearchPage/Search.php');
?>