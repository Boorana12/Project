<?php
    // ดึงการเชื่อมต่อฐานข้อมูลมาจากไฟล์ที่ชื่อว่า db.php
    include_once "../../Connection/db.php";
    
    // เก็บค่าที่เอามาจากไฟล์ updatepage.php ในตัวแปรดังกล่าว
    $research_No = $_POST['research-no'];
    $research_NameThai = $_POST['research-name-thai'];
    $research_NameEnglish = $_POST['research-name-english'];
    $research_Type = $_POST['research-type'];
    $research_ProjectLeaderName = $_POST['research-name-projectleader'];
    $research_ProjectLeaderEmail = $_POST['research-email-projectleader'];
    $research_AdvisorName = $_POST['research-name-advisor'];
    $research_YearCompletion = $_POST['research-yearcompletion'];
    $research_StudentClass = $_POST['research-studentclass'];
    $research_Member = $_POST['research-member'];
    $text = $_POST['research-text'];


?>

<!-- ถ้าหากว่าไม่มีการเปลี่ยนแปลงไฟล์ word ให้ทำงานดังต่อไปนี้ -->
<?php
    // กำหนดค่า error ไว้เก็บส่วนผิดพลาดและตั้งค่าตัวแปรภาพเป็น null
    $worderrors = [];
    $word = null;
    if(!empty($_FILES['research_fileword']['name'])):
        // เก็บรายละเอียดของภาพไปในตัวแปรดังกล่าว
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
        if(empty($worderrors)) {
            // ทำ path และตั้งชื่อเป็นเวลาแบบใส่รหัส md5
            $uploadFileDir = '../../file/word/';
            date_default_timezone_set('Asia/Bangkok');
            $fileNameNew = md5(time()) . $fileName;
            $research_FileWord = $fileNameNew;
            $dest_path = $uploadFileDir . $fileNameNew;

             // บันทึกไฟล์ไว้ในเซิร์ฟเวอร์
            if(move_uploaded_file($fileTmpPath, $dest_path)) 
            {
                echo 'บันทึกไฟล์สำเร็จ';
                $word = $fileName;
            
                $readResearch = "SELECT * FROM researchs WHERE research_No = $research_No";
                $readResearchResult = mysqli_query($conn, $readResearch);
            
                if (mysqli_num_rows($readResearchResult) > 0) {
                    $row = mysqli_fetch_assoc($readResearchResult);
                }
            
                if(isset($row['research_FileWord'])) {
                    $fileName = $row['research_FileWord'];
                        $deleteFileDir = '../../file/word/' . $fileName;
                        @unlink($deleteFileDir);
                }
            
            } else {
                $worderrors[]  = 'There was some errors moving the file to upload directory. Please make sure the upload directory is writable by web server.';
            }
        }
        $UpdateResearch = "UPDATE researchs SET
            research_FileWord='$research_FileWord'
        WHERE research_No=$research_No";

        if (mysqli_query($conn, $UpdateResearch) === TRUE) {
            echo "เปลี่ยนแปลงสำเร็จ <br />";
        } else {
            header('location: ../Edit.php?n=1');
        }
    endif;
?>

<!-- ถ้าหากว่าไม่มีการเปลี่ยนแปลงไฟล์ pdf ให้ทำงานดังต่อไปนี้ -->
<?php
    $pdferrors = [];
    $pdf = null;
    if(!empty($_FILES['research_filepdf']['name'])):
        // เก็บรายละเอียดของภาพไปในตัวแปรดังกล่าว
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
        if(empty($pdferrors)) {
            // ทำ path และตั้งชื่อเป็นเวลาแบบใส่รหัส md5
            $uploadFileDir = '../../file/pdf/';
            date_default_timezone_set('Asia/Bangkok');
            $fileNameNew = md5(time()) . $fileName;
            $research_FilePDF = $fileNameNew;
            $dest_path = $uploadFileDir . $fileNameNew;

             // บันทึกไฟล์ไว้ในเซิร์ฟเวอร์
            if(move_uploaded_file($fileTmpPath, $dest_path)) 
            {
                echo 'บันทึกไฟล์สำเร็จ';
                $pdf = $fileName;

                $readResearch = "SELECT * FROM researchs WHERE research_No = $research_No";
                $readResearchResult = mysqli_query($conn, $readResearch);
            
                if (mysqli_num_rows($readResearchResult) > 0) {
                    $row = mysqli_fetch_assoc($readResearchResult);
                }
            
                if(isset($row['research_FilePDF'])) {
                    $fileName = $row['research_FilePDF'];
                        $deleteFileDir = '../../file/pdf/' . $fileName;
                        @unlink($deleteFileDir);
                }

            } else {
                $pdferrors[]  = 'There was some errors moving the file to upload directory. Please make sure the upload directory is writable by web server.';
            }
        }
        $UpdateResearch = "UPDATE researchs SET
            research_FilePDF='$research_FilePDF'
        WHERE research_No=$research_No";

        if (mysqli_query($conn, $UpdateResearch) === TRUE) {
            echo "เปลี่ยนแปลงสำเร็จ <br />";
        } else {
            header('location: ../Edit.php?n=1');
        }
    endif;
?>

 <!-- ถ้าหากว่าไม่มีการเปลี่ยนแปลงรูปภาพให้ทำงานดังต่อไปนี้ -->
 <?php
    // กำหนดค่า error ไว้เก็บส่วนผิดพลาดและตั้งค่าตัวแปรภาพเป็น null
    $errors = [];
    $image = null;
    if(empty($_FILES['research-image']['name'])):
        $UpdateResearch = "UPDATE researchs SET
            research_NameThai='$research_NameThai',
            research_NameEnglish='$research_NameEnglish',
            research_Type='$research_Type',
            research_ProjectLeaderName='$research_ProjectLeaderName',
            research_ProjectLeaderEmail='$research_ProjectLeaderEmail',
            research_AdvisorName='$research_AdvisorName',
            research_YearCompletion='$research_YearCompletion',
            research_StudentClass='$research_StudentClass',
            research_Member='$research_Member',
            research_Text='$text'
        WHERE research_No=$research_No";

        if (mysqli_query($conn, $UpdateResearch) === TRUE) {
            echo "เปลี่ยนแปลงสำเร็จ <br />";
            header('location: ../Edit.php?m=1');

        } else {
            header('location: ../Edit.php?n=1');
        }
    // ถ้าหากว่ามีการเปลี่ยนแปลงรูปภาพให้ทำงานดังต่อไปนี้
    else:
        // เก็บรายละเอียดของภาพไปในตัวแปรดังกล่าว
        $fileTmpPath = $_FILES['research-image']['tmp_name'];
        $fileName = $_FILES['research-image']['name'];
        $research_Image = $fileName;
        $fileSize = $_FILES['research-image']['size'];
        $fileType = $_FILES['research-image']['type'];
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));

        // ตรวจสอบว่าไฟล์ภาพมีขนาดเกินที่กำหนดรึเปล่า
        if($fileSize > 1048576) {
            $errors[] = "Filesize is more than 1MB";
        }

        // ตรวจสอบไฟล์ภาพว่ามีนามสกุลตรงตามที่กำหนดรึเปล่า
        $allowedfileExtensions = array('jpg', 'png');
        if (!in_array($fileExtension, $allowedfileExtensions)) {
            $errors[] = 'Upload failed. Allowed file types' . implode(',', $allowedfileExtensions);
        }

        // หากไม่พบ error ให้ทำงานตามคำสั่งต่อไปนี้ 
        if(empty($errors)) {
            // ทำ path และตั้งชื่อเป็นเวลาแบบใส่รหัส md5
            $uploadFileDir = '../../img/researchimg/';
            date_default_timezone_set('Asia/Bangkok');
            $fileNameNew = md5(time()) . $fileName;
            $research_Image = $fileNameNew;
            $dest_path = $uploadFileDir . $fileNameNew;

             // บันทึกไฟล์ไว้ในเซิร์ฟเวอร์
            if(move_uploaded_file($fileTmpPath, $dest_path)) 
            {
                echo 'บันทึกไฟล์สำเร็จ';
                $image = $fileName;

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

            } else {
                $errors[]  = 'There was some errors moving the file to upload directory. Please make sure the upload directory is writable by web server.';
            }
        }
        $UpdateResearch = "UPDATE researchs SET
            research_NameThai='$research_NameThai',
            research_NameEnglish='$research_NameEnglish',
            research_Type='$research_Type',
            research_Image='$research_Image',
            research_ProjectLeaderName='$research_ProjectLeaderName',
            research_ProjectLeaderEmail='$research_ProjectLeaderEmail',
            research_AdvisorName='$research_AdvisorName',
            research_YearCompletion='$research_YearCompletion',
            research_StudentClass='$research_StudentClass',
            research_Member='$research_Member',
            research_Text='$text'
        WHERE research_No=$research_No";

        if (mysqli_query($conn, $UpdateResearch) === TRUE) {
            echo "เปลี่ยนแปลงสำเร็จ <br />";
            header('location: ../Edit.php?m=1');
        
        } else {
            header('location: ../Edit.php?n=1');
        }
    endif;
?>
