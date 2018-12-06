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
</head>
<body>
    <header><?php echo $name_web;?></header>
    <?php include('nav.php');?>
    <main>
      <article>
        <h1>ระบบจัดการบรรณารักษ์ห้องสมุด</h1>
        <a href="./add_librarian.php">เพิ่มรายชื่อ</a><br>
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
        <th> <div align="center">แก้ไขข้อมูล</div></th>
        <th> <div align="center">เปลี่ยนรหัสผ่าน</div></th>
        <th> <div align="center">ลบ</div></th>
    </tr>
<?php
while($result=mysqli_fetch_array($query,MYSQLI_ASSOC))
{
?>
  <tr>
    <td><div align="center"><?php echo $result["Name"];?></div></td>
    <td><?php echo $result["IDcard"];?></td>
    <td><a href="./edit_librarian.php?stu_id=<?php echo $result["LibrarianId"];?>">คลิก</a></td>
    <td><a href="./edit_librarian.php?stu_id=<?php echo $result["LibrarianId"];?>">คลิก</a></td>
    <td><a href="./del_student.php?stu_id=<?php echo $result["LibrarianId"];?>">คลิก</a></td>
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