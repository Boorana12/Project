 <!-- แถบ Navigation Bar ส่วนหัว -->
 <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
     <img src="../img/itcmtc.png" width="30" height="30">
     <a class="navbar-brand" href="../index.php">&nbsp; CMTC RESEARCH</a>
     <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText"
         aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
     </button>
     <div class="collapse navbar-collapse" id="navbarText">
         <ul class="navbar-nav mr-auto">
             <!-- ทำลิงก์ไปยังหน้าเว็บต่างๆ -->
             <li class="nav-item active">
                 <a class="nav-link" href="../index.php">Home</a>
             </li>
             <li class="nav-item active">
                 <a class="nav-link" href="../HomePage/Home.php">Search</a>
             </li>
             <li class="nav-item active">
                 <a class="nav-link" href="../SearchPage/Search.php">Search Advance</a>
             </li>
             <li class="nav-item active">
                 <a class="nav-link" href="../ProjectPage/Project.php">Project</a>
             </li>
             <li class="nav-item active">
                 <a class="nav-link" href="../ContactPage/Contact.php">Contact</a>
             </li>
             <!-- ตรวจสอบว่ามี session ที่ชื่อว่า admin รึเปล่า ถ้ามีให้แสดงหน้าต่าง edit -->
             <?php if(isset($_SESSION["admin"])) { ?>
             <li class="nav-item active">
                 <a class="nav-link" href="../EditPage/Edit.php">Edit</a>
             </li>
             <?php }?>
             <!-- จบการทำงาน -->
         </ul>
         <!-- ตรวจสอบว่ามี session ที่ชื่อว่า username รึเปล่า ถ้าไม่มีให้แสดงคำสั่งลิงก์ไปยังหน้า login -->
         <?php if(!isset($_SESSION["username"])) { ?>
         <span class="navbar-text">
             <a href="../Login/LoginPage.php">Login</a>
         </span>
         <!-- ถ้าหากว่ามีให้ทำงานตามคำสั่งต่อไปนี้ -->
         <?php } else { ?>
         <span class="navbar-text">
             <!-- ทำการขออนุญาตเข้าถึงตาราง users เพื่อทำการตรวจสอบ id ของผู้เข้าใช้งาน -->
             <?php 
            $SESSONID = $_SESSION["id"];
            $readResearch = "SELECT * FROM users WHERE id = $SESSONID";
            $readResearchResult = mysqli_query($conn, $readResearch);
            ?>
             <?php if (mysqli_num_rows($readResearchResult) > 0) { ?>
             <?php while($row = mysqli_fetch_assoc($readResearchResult)) { ?>
             <!-- หาก id ของผู้เข้าใช้งานมีไฟล์ภาพให้นำไปเก็บในค่า photo -->
             <?php $photo = $row["userphotoicon"] ?>
             <!-- หาก id ของผู้เข้าใช้งานไม่มีไฟล์ภาพให้แทนด้วยค่า icon.1 ซึ่งเป็นภาพว่างเปล่าแล้วเก็บในค่า photo -->
             <?php if (empty($photo)) {
                $photo = "icon1.jpg";
              } ?>
             <!-- แสดงภาพโดยใช้ค่า photo เรียกมาจาก id ตาราง users -->
             <?php if(!isset($_SESSION["admin"])) echo "<a href=\"../Profile/MyProfile.php?id=" . $row["id"] . "\"><img src='../img/usersphoto/".$photo."'width='30' height='30' align='center'></a>" ?>
             <?php } ?>
             <?php } else { ?>
             <!-- หากไม่พบแสดงคำว่า error -->
             error
             <?php } ?>
             <a>&nbsp;|&nbsp;</a>
         </span>
         <!-- แสดง username ของผู้เข้าใช้งานและคำสั่งลิงก์ไปยังหน้า logout -->
         <span class="navbar-text mr-2">
             <?php echo $_SESSION["username"]; ?>
         </span>
         <span class="navbar-text">
             <a href="../Login/Process/LogoutPageProcess.php">Logout</a>
         </span>
         <?php } ?>
         <!-- จบการทำงาน -->
     </div>
 </nav>