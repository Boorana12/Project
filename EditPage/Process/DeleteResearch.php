<?php
    // ดึงการเชื่อมต่อฐานข้อมูลมาจากไฟล์ที่ชื่อว่า db.php
    include_once "../../Connection/db.php";
    
    // เก็บค่าที่เอามาจากไฟล์ deletepage.php ในตัวแปรดังกล่าว
    $research_No = $_POST['research_No'];

    // ทำการลบไอดีที่กำหนดในตาราง researchs
    $deleteResearch = "DELETE FROM researchs WHERE research_No = $research_No";

    if (mysqli_query($conn, $deleteResearch)) {
        echo "ลบสำเร็จ <br />";
        header('location: ../Edit.php?u=1');
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
        header('location: ../DeletePage.php?m=1');
    }

    mysqli_close($conn);

?>