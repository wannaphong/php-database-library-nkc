<?php
require_once("config.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>ระบบจัดการนักเรียน : <?php echo $name_web;?></title>
    <?php include("header_web.php"); ?>
    <?php include("js.php"); ?>
</head>
<body>
    <?php include('nav.php');?>
    <div class="row">
    <div class="container">
        <h3 align="center">ระบบจัดการนักเรียนห้องสมุด</h1>
        <a href="./add_student.php"><button>เพิ่มรายชื่อ</button></a><br>
        <?php
        require("db.php");
	    $sql = "SELECT * FROM Students";
        $query = mysqli_query($con,$sql);
        $rowcount=mysqli_num_rows($query);
        if($rowcount== 0){
            echo "<br>ไม่มีรายชื่อนักเรียน";
         }
         else{
    ?>
    <table border="1">
    <thead>
        <tr>
        <th> <div align="center">รหัส</div></th>
        <th> <div align="center">ชื่อ</div></th>
        <th> <div align="center">รายการยืมที่ค้าง</div></th>
        <?php
        require_once("check_admin.php");
        if(is_admin()){
        ?>
        <th> <div align="center">แก้ไขข้อมูล</div></th>
        <th> <div align="center">ลบรายชื่อ</div></th>
        <?php } ?>
    </tr>
    </thead>
<?php
while($result=mysqli_fetch_array($query,MYSQLI_ASSOC))
{
?>
  <tr>
  <td><?php echo $result["StudentId"];?></td>
    <td><div align="center"><?php echo $result["Name"];?></div></td>
    <td><a href="./student_borrow.php?stu_id=<?php echo $result["StudentId"];?>">คลิก</a></td>
    <?php if(is_admin()){ ?><td>
    <a href="./edit_student.php?stu_id=<?php echo $result["StudentId"];?>">คลิก</a></td>
    <td><a href="./del_student.php?stu_id=<?php echo $result["StudentId"];?>" onclick="return confirm('คุณแน่ใจว่าต้องการลบ ?')">คลิก</a></td><?php } ?>
  </tr>
<?php
}
}
?>
</table>
<?php

?><br>
    </div>
    </div>
    <?php include('footer.php');?>
</body>
</html>