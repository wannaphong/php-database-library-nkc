<?php
/*
หน้านี้เป็นหน้าสำหรับเพิ่มรายการที่ยืม หรือ ลบรายการที่ยืม โดยสามารถยกเลิกการยืมได้
*/
$st_id=$_GET['stu_id'];
require_once("is_login.php");
require_once("config.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>แก้ไขข้อมูลนักเรียน : <?php echo $name_web;?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
<?php include("js.php"); ?></head>
<body>
    <?php include('header_web.php');?>
    <?php include('nav.php');?>
    <main>
      <article>
        <h1 align="center">แก้ไขข้อมูลนักเรียน</h1>
        <?php
        echo "รหัสนักเรียน : ".$st_id;
        ?>
        <?php
        require("db.php");
	    $sql = "SELECT * FROM Students WHERE id=".$st_id;//"SELECT * FROM student_not_return WHERE StudentId=".$_COOKIE['studentid'];
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
  <form action="./save_edit_student.php"  method="POST">
  <input type="hidden" name="id" value=<?php echo $st_id; ?> ?>
  <table>
  <tr><td>ชื่อ :</td><td><input type="text" name="name" value="<?php echo $result['Name'];  ?>"></td></tr>
  <tr><td>ที่อยู่ :</td><td><textarea name="address"><?php echo $result['Address'];  ?></textarea></td></tr>
  <tr><td>ปีเดือนวันเกิด :</td><td><input type="date" name="dob" value="<?php echo $result['DOB'];  ?>"></td></tr>
  <tr><td>เพศ : </td><td><input type="text" name="gender" value="<?php echo $result['Gender'];  ?>"></td></tr>
  <tr><td>เบอร์ : </td><td><input type="tel" name="phone" value="<?php echo $result['Phone'];  ?>"></td></tr>
  <tr><td><input type="submit" value="Submit"></tr><td></td>
        </table>
    </form>
<?php
}
?>
</table>
<?php
mysqli_close($conn);
?>
    </article>
    </main>
    <?php include('footer_web.php');?>
</body>
</html>