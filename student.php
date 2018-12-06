<?php
require_once("config.php");
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
        <h1>ระบบจัดการนักเรียนห้องสมุด</h1>
        <a href="./add_student.php">เพิ่มรายชื่อ</a><br>
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
        <tr>
        <th> <div align="center">ชื่อ</div></th>
        <th> <div align="center">รหัส</div></th>
        <th> <div align="center">รายการยืมที่ค้าง</div></th>
        <th> <div align="center">แก้ไขข้อมูล</div></th>
        <th> <div align="center">ลบรายชื่อ</div></th>
    </tr>
<?php
while($result=mysqli_fetch_array($query,MYSQLI_ASSOC))
{
?>
  <tr>
    <td><div align="center"><?php echo $result["Name"];?></div></td>
    <td><?php echo $result["id"];?></td>
    <td><a href="./student_borrow.php?stu_id=<?php echo $result["id"];?>">คลิก</a></td>
    <td><a href="./edit_student.php?stu_id=<?php echo $result["id"];?>">คลิก</a></td>
    <td><a href="./del_student.php?stu_id=<?php echo $result["id"];?>">คลิก</a></td>
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