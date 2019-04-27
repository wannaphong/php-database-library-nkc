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
    <?php include("header_web.php"); ?>
    <?php include("js.php"); ?>
<body>
    <?php include('nav.php');?>
    <div class="row">
    <div class="container">
        <h2 align="center">ระบบยืมคืนหนังสือ</h1>
        <form action="./save_student_use.php"  method="POST">
        <table>
        <tr>
        <td>รหัสนักเรียน :</td> <td><input type="number" name="studentid"></td></tr>
        <tr><td><input type="submit" value="Submit"></td></tr>
        </form>
        </table>
        </div>
        </div>
        <?php include("footer.php"); ?>
</body>
</html>