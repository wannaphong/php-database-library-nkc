<?php
/*
หน้านี้เป็นหน้าสำหรับเพิ่มรายการที่ยืม หรือ ลบรายการที่ยืม โดยสามารถยกเลิกการยืมได้
*/
require_once("is_login.php");
if (isset($_COOKIE['studentid']))
{
        header("Location: borrow.php");
        exit();
}
require_once("config.php");

/*
แสดงรายการหนังสือที่ยืม ในการยืมแต่ละครั้ง

- เลือกหนังสือที่จะยิมเพิ่ม
- หากต้องการยกเลิกการยืม สามารถกดยกเลิกได้
*/
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>กรอกรหัสนักเรียน : <?php echo $name_web;?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
<?php include("js.php"); ?></head>
<body>
<?php include('header_web.php');?>
    <?php include('nav.php');?>
    <main>
      <article>
        <h1>ระบบยืมคืนหนังสือ</h1>
        <?php
        ?>
        <form action="./save_student_use.php"  method="POST">
        <br>รหัสนักเรียน : <input type="number" name="studentid"><br>
        <input type="submit" value="Submit">
        </form>
    </article>
    </main>
    <footer>Copyright  <?php echo $name_web;?></footer>
</body>
</html>