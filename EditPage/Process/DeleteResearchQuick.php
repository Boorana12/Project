<?php
    // ดึงการเชื่อมต่อฐานข้อมูลมาจากไฟล์ที่ชื่อว่า db.php
    include_once "../../Connection/db.php";
    
    // เก็บค่าที่เอามาจากไฟล์ edit.php ในตัวแปรดังกล่าว
    $research_No = $_GET['id'];

    $readResearch = "SELECT * FROM researchs WHERE research_No = $research_No";
    $readResearchResult = mysqli_query($conn, $readResearch);

    if (mysqli_num_rows($readResearchResult) > 0) {
        $row = mysqli_fetch_assoc($readResearchResult);
    }

    if(isset($row['research_Image'])) {
        $fileName = $row['research_Image'];
            $deleteFileDir = '../../img/researchimg/' . $fileName;
            @unlink($deleteFileDir);
    }

    if(isset($row['research_FileWord'])) {
        $fileName = $row['research_FileWord'];
            $deleteFileDir = '../../file/word/' . $fileName;
            @unlink($deleteFileDir);
    }
    
    if(isset($row['research_FilePDF'])) {
        $fileName = $row['research_FilePDF'];
            $deleteFileDir = '../../file/pdf/' . $fileName;
            @unlink($deleteFileDir);
    }


    // ทำการลบไอดีที่กำหนดในตาราง researchs
    $deleteResearch = "DELETE FROM researchs WHERE research_No = $research_No";

    if (mysqli_query($conn, $deleteResearch)) {
        echo "ลบสำเร็จ <br />";
        header('location: ../Edit.php?u=1');
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
        header('location: ../Edit.php?a=1');
    }

    mysqli_close($conn);
