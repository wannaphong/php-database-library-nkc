<?php
require_once("config.php");
require_once("check_admin.php");
#open_only_admin();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>ระบบจัดการบรรณารักษ์ห้องสมุด : <?php echo $name_web;?></title>
    <?php include("header_web.php"); ?>
    <?php include("js.php"); ?>
</head>
<body>
    <?php include('nav.php');?>
    <div class="container">
        <h3 align="center">ระบบจัดการบรรณารักษ์ห้องสมุด</h1>
        <a href="./add_librarian.php"><button>เพิ่มรายชื่อ</button></a><br>
        <?php
        require("db.php");
	    $sql = "SELECT * FROM Librarian";
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
        <th> <div align="center">ชื่อ</div></th>
        <th> <div align="center">บัตรประชาชน</div></th>
        <th> <div align="center">แก้ไข</div></th>
        <th> <div align="center">เปลี่ยนรหัสผ่าน</div></th>
       <!--  <th> <div align="center">ลบ</div></th>
       <th> <div align="center">เปลี่ยนสิทธิ์</div></th>-->
        </tr>
    </thead>
<?php
while($result=mysqli_fetch_array($query,MYSQLI_ASSOC))
{
  /*  $right="";
    $text_right="";
    if($result["status"]=="admin"){
        $right="user";
        $text_right="เปลี่ยนเป็นผู้ใช้";
    }
    else{
        $right="admin";
        $text_right="เปลี่ยนเป็นแอดมิน";
    }*/
?>
  <tr>
    <td><div align="center"><?php echo $result["Name"];?></div></td>
    <td><?php echo $result["IDcard"];?></td>
    <td><a href="./edit_librarian.php?id=<?php echo $result["LibrarianId"];?>">คลิก</a></td>
    <td><a href="./edit_pass.php?id=<?php echo $result["LibrarianId"];?>">คลิก</a></td>
   <!-- <td><a href="./del_librarian.php?id=<?php echo $result["LibrarianId"];?>" onclick="return confirm('คุณแน่ใจว่าต้องการลบ ?')">คลิก</a></td>
    <td><a href="./change_admin.php?id=<?php #echo $result["LibrarianId"];?>&right=<?php echo $right;?>" onclick="return confirm('คุณแน่ใจว่าต้องการ<?php echo $text_right;?> ?')">-->
    <?php echo $text_right;?>
</a></td>
  </tr>
<?php
}
}
?>
</table>
<?php

?><br>
    </div>
    <?php include('footer.php');?>
</body>
</html>