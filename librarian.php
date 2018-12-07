<?php
require_once("config.php");
require_once("check_admin.php");
open_only_admin();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>ระบบจัดการนักเรียน : <?php echo $name_web;?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
<?php include("js.php"); ?></head>
<body>
    <?php include('header_web.php');?>
    <?php include('nav.php');?>
    <main>
      <article>
        <h1>ระบบจัดการบรรณารักษ์ห้องสมุด</h1>
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
        <tr>
        <th> <div align="center">ชื่อ</div></th>
        <th> <div align="center">บัตรประชาชน</div></th>
        <th> <div align="center">แก้ไข</div></th>
        <th> <div align="center">เปลี่ยนรหัสผ่าน</div></th>
        <th> <div align="center">ลบ</div></th>
        <th> <div align="center">เปลี่ยนสิทธิ์</div></th>
    </tr>
<?php
while($result=mysqli_fetch_array($query,MYSQLI_ASSOC))
{
    $right="";
    $text_right="";
    if($result["status"]=="admin"){
        $right="user";
        $text_right="เปลี่ยนเป็นผู้ใช้";
    }
    else{
        $right="admin";
        $text_right="เปลี่ยนเป็นแอดมิน";
    }
?>
  <tr>
    <td><div align="center"><?php echo $result["Name"];?></div></td>
    <td><?php echo $result["IDcard"];?></td>
    <td><a href="./edit_librarian.php?id=<?php echo $result["LibrarianId"];?>">คลิก</a></td>
    <td><a href="./edit_pass.php?id=<?php echo $result["LibrarianId"];?>">คลิก</a></td>
    <td><a href="./del_librarian.php?id=<?php echo $result["LibrarianId"];?>" onclick="return confirm('คุณแน่ใจว่าต้องการลบ ?')">คลิก</a></td>
    <td><a href="./change_admin.php?id=<?php echo $result["LibrarianId"];?>&right=<?php echo $right;?>" onclick="return confirm('คุณแน่ใจว่าต้องการ<?php echo $text_right;?> ?')">
    <?php echo $text_right;?>
</a></td>
  </tr>
<?php
}
}
?>
</table>
<?php
mysqli_close($conn);
?><br>
    </article>
    </main>
    <footer>Copyright <?php echo $name_web;?></footer>
</body>
</html>