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
        <br>ชื่อ : <input type="text" name="name"><br>
        ที่อยู่ : <input type="text" name="address"><br>
        ปีเดือนวันเกิด : <input type="date" name="dob"><br>
        เพศ : <input type="text" name="gender"><br>
        เบอร์ : <input type="tel" name="phone"><br>
        <input type="submit" value="Submit">
        </form>
        <p>Content</p>
    </article>
    </main>
    <footer>Copyright <?php echo $name_web;?></footer>
</body>
</html>