<?php
require_once("is_login.php");
require_once("config.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>เพิ่มข้อมูลนักเรียน : <?php echo $name_web;?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
<?php include("js.php"); ?></head>
<body>
    <?php include('header_web.php');?>
    <?php include('nav.php');?>
    <main>
      <article>
        <h1>เพิ่มข้อมูลนักเรียน</h1>
        <form action="./save_add_student.php"  method="POST">
        <table>
        <tr>
        <tr><td>ชื่อ :</td> <td><input type="text" name="name" required></td></tr>
        <tr><td>ที่อยู่ :</td> <td><input type="text" name="address" required></td></tr>
        <tr><td>ปีเดือนวันเกิด :</td> <td><input type="date" name="dob" required></td></tr>
        <tr>
            <td>เพศ :</td>
            <td>
            <select required name="gender">
                <option value="ชาย">ชาย</option>
                <option value="หญิง">หญิง</option>
            </select>
            </td>
        </tr>
        <tr><td>เบอร์ :</td> <td><input type="tel" name="phone"></td></tr>
        <tr><td><input type="submit" value="Submit"></td></tr></table>
        </form><br>
    </article>
    </main>
    <footer>Copyright <?php echo $name_web;?></footer>
</body>
</html>