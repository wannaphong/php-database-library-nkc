<?php
/*
หน้านี้เป็นหน้าสำหรับเพิ่มรายการที่ยืม หรือ ลบรายการที่ยืม โดยสามารถยกเลิกการยืมได้
*/
$st_id=$_GET['id'];
require_once("is_login.php");
require_once("config.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>เปลี่ยนรหัสผ่าน : <?php echo $name_web;?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
<?php include("js.php"); ?></head>
<body>
    <?php include('header_web.php');?>
    <?php include('nav.php');?>
    <main>
      <article>
        <h2 align="center">เปลี่ยนรหัสผ่านบรรณารักษ์</h1>
        <?php
        echo "รหัสบรรณารักษ์ : ".$st_id;
        ?>
        <?php
        require("db.php");
	    $sql = "SELECT * FROM Librarian WHERE LibrarianId=".$st_id;//"SELECT * FROM student_not_return WHERE StudentId=".$_COOKIE['studentid'];
        $query = mysqli_query($con,$sql);
        $rowcount=mysqli_num_rows($query);
        if($rowcount== 0){
            echo "<br>ไม่มีรายชื่อในระบบ";
         }
         else{
    ?>
<?php
$result=mysqli_fetch_array($query,MYSQLI_ASSOC)
?>
  <form action="./save_newpass.php"  method="POST">
  <input type="hidden" name="id" value=<?php echo $st_id; ?>>
  <table>
  <tr><td>Password : <input type="password" name="pass"></td></tr>
  <tr><td><input type="submit" value="Submit"></td></tr>
        </table>
    </form>
<?php
}
?>
</table>
<?php

?>
    </article>
    </main>
    <?php include('footer_web.php');?>
</body>
</html>