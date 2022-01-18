<?php
// ดึงการเชื่อมต่อฐานข้อมูลมาจากไฟล์ที่ชื่อว่า db.php
include_once "../../Connection/db.php";

// เก็บค่าที่เอามาจากไฟล์ Add.php ในตัวแปรดังกล่าว
$research_NameThai = $_POST['research-name-thai'];
$research_NameEnglish = $_POST['research-name-english'];

$research_Type = $_POST['research-type'];
$research_ProjectLeaderName = $_POST['research-name-projectleader'];
$research_ProjectLeaderEmail = $_POST['research-email-projectleader'];
$research_AdvisorName = $_POST['research-name-advisor'];
$research_YearCompletion = $_POST['research-yearcompletion'];
$research_StudentClass = $_POST['research-studentclass'];
$research_Member = $_POST['research-member'];
$research_Text = $_POST['research_text'];

// กำหนดค่า error ไว้เก็บส่วนผิดพลาดและตั้งค่าตัวแปรภาพเป็น null
$errors = [];
$image = null;

// หากพบว่ามีไฟล์เก็บรูปภาพให้ทำงานดังต่อไปนี้
if (isset($_FILES['research-image'])) {
    // เก็บรายละเอียดของภาพไปในตัวแปรดังกล่าว
    $fileTmpPath = $_FILES['research-image']['tmp_name'];
    $fileName = $_FILES['research-image']['name'];
    $research_Image = $fileName;
    $fileSize = $_FILES['research-image']['size'];
    $fileType = $_FILES['research-image']['type'];
    $fileNameCmps = explode(".", $fileName);
    $fileExtension = strtolower(end($fileNameCmps));

    // ตรวจสอบว่าไฟล์ภาพมีขนาดเกินที่กำหนดรึเปล่า
    if ($fileSize > 1048576) {
        $errors[] = "Filesize is more than 1MB";
    }

    // ตรวจสอบไฟล์ภาพว่ามีนามสกุลตรงตามที่กำหนดรึเปล่า
    $allowedfileExtensions = array('jpg', 'png');
    if (!in_array($fileExtension, $allowedfileExtensions)) {
        $errors[] = 'Upload failed. Allowed file types' . implode(',', $allowedfileExtensions);
    }

    // หากไม่พบ error ให้ทำงานตามคำสั่งต่อไปนี้ 
    if (empty($errors)) {
        // ทำ path และตั้งชื่อเป็นเวลาแบบใส่รหัส md5
        $uploadFileDir = '../../img/researchimg/';
        date_default_timezone_set('Asia/Bangkok');
        $fileNameNew = md5(time()) . $fileName;
        $research_Image = $fileNameNew;
        $dest_path = $uploadFileDir . $fileNameNew;

        // บันทึกไฟล์ไว้ในเซิร์ฟเวอร์
        if (move_uploaded_file($fileTmpPath, $dest_path)) {
            echo 'บันทึกไฟล์สำเร็จ';
            $image = $fileName;
        } else {
            $errors[]  = 'There was some errors moving the file to upload directory. Please make sure the upload directory is writable by web server.';
        }
    }
}

// กำหนดค่า error ไว้เก็บส่วนผิดพลาดและตั้งค่าตัวแปรภาพเป็น null
$worderrors = [];
$word = null;

if (isset($_FILES['research_fileword'])) {
    // เก็บรายละเอียดของไฟล์ไปในตัวแปรดังกล่าว
    $fileTmpPath = $_FILES['research_fileword']['tmp_name'];
    $fileName = $_FILES['research_fileword']['name'];
    $fileType = $_FILES['research_fileword']['type'];
    $fileNameCmps = explode(".", $fileName);
    $fileExtension = strtolower(end($fileNameCmps));

    // ตรวจสอบไฟล์ภาพว่ามีนามสกุลตรงตามที่กำหนดรึเปล่า
    $allowedfileExtensions = array('doc', 'docx');
    if (!in_array($fileExtension, $allowedfileExtensions)) {
        $worderrors[] = 'Upload failed. Allowed file types' . implode(',', $allowedfileExtensions);
    }

    // หากไม่พบ error ให้ทำงานตามคำสั่งต่อไปนี้ 
    if (empty($worderrors)) {
        // ทำ path และตั้งชื่อเป็นเวลาแบบใส่รหัส md5
        $uploadFileDir = '../../file/word/';
        date_default_timezone_set('Asia/Bangkok');
        $fileNameNew = md5(time()) . $fileName;
        $research_FileWord = $fileNameNew;
        $dest_path = $uploadFileDir . $fileNameNew;

        // บันทึกไฟล์ไว้ในเซิร์ฟเวอร์
        if (move_uploaded_file($fileTmpPath, $dest_path)) {
            echo 'บันทึกไฟล์สำเร็จ';
            $word = $fileNameNew;
        } else {
            $worderrors[]  = 'There was some errors moving the file to upload directory. Please make sure the upload directory is writable by web server.';
        }
    } else {
        $research_FileWord = NULL;
    }
}


// กำหนดค่า error ไว้เก็บส่วนผิดพลาดและตั้งค่าตัวแปรภาพเป็น null
$pdferrors = [];
$pdf = null;

if (isset($_FILES['research_filepdf'])) {
    // เก็บรายละเอียดของไฟล์ไปในตัวแปรดังกล่าว
    $fileTmpPath = $_FILES['research_filepdf']['tmp_name'];
    $fileName = $_FILES['research_filepdf']['name'];
    $fileType = $_FILES['research_filepdf']['type'];
    $fileNameCmps = explode(".", $fileName);
    $fileExtension = strtolower(end($fileNameCmps));

    // ตรวจสอบไฟล์ภาพว่ามีนามสกุลตรงตามที่กำหนดรึเปล่า
    $allowedfileExtensions = array('pdf');
    if (!in_array($fileExtension, $allowedfileExtensions)) {
        $pdferrors[] = 'Upload failed. Allowed file types' . implode(',', $allowedfileExtensions);
    }

    // หากไม่พบ error ให้ทำงานตามคำสั่งต่อไปนี้ 
    if (empty($pdferrors)) {
        // ทำ path และตั้งชื่อเป็นเวลาแบบใส่รหัส md5
        $uploadFileDir = '../../file/pdf/';
        date_default_timezone_set('Asia/Bangkok');
        $fileNameNew = md5(time()) . $fileName;
        $research_FilePDF = $fileNameNew;
        $dest_path = $uploadFileDir . $fileNameNew;

        // บันทึกไฟล์ไว้ในเซิร์ฟเวอร์
        if (move_uploaded_file($fileTmpPath, $dest_path)) {
            echo 'บันทึกไฟล์สำเร็จ';
            $pdf = $fileNameNew;
        } else {
            $pdferrors[]  = 'There was some errors moving the file to upload directory. Please make sure the upload directory is writable by web server.';
        }
    } else {
        $research_FilePDF = NULL;
    }
}

// หากว่าการดำเนินงานข้างต้นไม่มี error ให้เพิ่มไฟล์เข้าไปในตาราง researchs ได้ 
if (!is_null($errors)) {
    if ($research_FileWord != NULL && $research_FilePDF != NULL) {
        $createNewResearch = "INSERT INTO researchs (research_NameThai, research_NameEnglish, research_Image, research_Type, research_ProjectLeaderName, research_ProjectLeaderEmail, research_AdvisorName, research_YearCompletion, research_StudentClass, research_Member, research_Text, research_FileWord, research_FilePDF)
            VALUES ('$research_NameThai', '$research_NameEnglish', '$research_Image', '$research_Type', '$research_ProjectLeaderName', '$research_ProjectLeaderEmail', '$research_AdvisorName', '$research_YearCompletion', '$research_StudentClass', '$research_Member', '$research_Text', '$research_FileWord' ,'$research_FilePDF')";
    }
    if ($research_FileWord == NULL && $research_FilePDF == NULL) {
        $createNewResearch = "INSERT INTO researchs (research_NameThai, research_NameEnglish, research_Image, research_Type, research_ProjectLeaderName, research_ProjectLeaderEmail, research_AdvisorName, research_YearCompletion, research_StudentClass, research_Member, research_Text, research_FileWord, research_FilePDF)
            VALUES ('$research_NameThai', '$research_NameEnglish', '$research_Image', '$research_Type', '$research_ProjectLeaderName', '$research_ProjectLeaderEmail', '$research_AdvisorName', '$research_YearCompletion', '$research_StudentClass', '$research_Member', '$research_Text', NULL , NULL)";
    }
    if ($research_FileWord != NULL && $research_FilePDF == NULL) {
        $createNewResearch = "INSERT INTO researchs (research_NameThai, research_NameEnglish, research_Image, research_Type, research_ProjectLeaderName, research_ProjectLeaderEmail, research_AdvisorName, research_YearCompletion, research_StudentClass, research_Member, research_Text, research_FileWord, research_FilePDF)
            VALUES ('$research_NameThai', '$research_NameEnglish', '$research_Image', '$research_Type', '$research_ProjectLeaderName', '$research_ProjectLeaderEmail', '$research_AdvisorName', '$research_YearCompletion', '$research_StudentClass', '$research_Member', '$research_Text', '$research_FileWord' , NULL)";
    }
    if ($research_FileWord == NULL && $research_FilePDF != NULL) {
        $createNewResearch = "INSERT INTO researchs (research_NameThai, research_NameEnglish, research_Image, research_Type, research_ProjectLeaderName, research_ProjectLeaderEmail, research_AdvisorName, research_YearCompletion, research_StudentClass, research_Member, research_Text, research_FileWord, research_FilePDF)
            VALUES ('$research_NameThai', '$research_NameEnglish', '$research_Image', '$research_Type', '$research_ProjectLeaderName', '$research_ProjectLeaderEmail', '$research_AdvisorName', '$research_YearCompletion', '$research_StudentClass', '$research_Member', '$research_Text', NULL ,'$research_FilePDF')";
    }

    /*if (mysqli_query($conn, $createNewResearch)) {
        echo "เพิ่มข้อมูลสำเร็จ <br />";
        header('location: ../../ProjectPage/Project.php');
    } else {
        echo "errors: " . $sql . "<br>" . mysqli_errors($conn);
    }*/
    if (mysqli_query($conn, $createNewResearch)) {
        echo "เพิ่มข้อมูลสำเร็จ <br />";
        
        header('location: ../UserEdit.php?s=1');
    } else {
        echo "errors: " . $sql . "<br>" . mysqli_errors($conn);
    }
    // หากว่าการดำเนินงานข้างต้นมี error ให้ย้อนกลับยังหน้า addpage และแสดงหน้าต่าง sweetalert ว่าเพิ่มไม่สำเร็จ
} else {
    echo "เพิ่มข้อมูลไม่สำเร็จ <br />";
    header('location: ../UserAddPage.php?m=1');

    foreach ($errors as $value) {
        echo $value . "<br/>";
    }
}

mysqli_close($conn);
