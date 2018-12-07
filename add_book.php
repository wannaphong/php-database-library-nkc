<?php
/*
ใช้เพิ่มข้อมูลหนังสือลงระบบ
*/
require_once("config.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>เพิ่มข้อมูลหนังสือ : <?php echo $name_web;?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
<?php include("js.php"); ?></head>
<body>
    <?php include('header_web.php');?>
    <?php include('nav.php');?>
    <main>
      <article>
        <h1>เพิ่มข้อมูลหนังสือ</h1>
        <form action="./save_add_book.php"  method="POST">
        <table>
        <tr>
            <td>ชื่อ :</td> 
            <td><input type="text" name="namebook"></td>
        </tr><tr>
        <td>ผู้เขียน :</td> <td><input type="text" name="author"></td></tr>
        <tr>
            <td>หมวดหมู่ :</td>
            <td>
            <select required name="category">
                <option value="เบ็ดเตล็ดหรือความรู้ทั่วไป">เบ็ดเตล็ดหรือความรู้ทั่วไป</option>
                <option value="ปรัชญา">ปรัชญา</option>
                <option value="ศาสนา">ศาสนา</option>
                <option value="สังคมศาสตร์">สังคมศาสตร์</option>
                <option value="ภาษาศาสตร์">ภาษาศาสตร์</option>
                <option value="วิทยาศาสตร์">วิทยาศาสตร์</option>
                <option value="วิทยาศาสตร์ประยุกต์ หรือเทคโนโลยี">วิทยาศาสตร์ประยุกต์ หรือเทคโนโลยี</option>
                <option value="ศิลปกรรมและการบันเทิง">ศิลปกรรมและการบันเทิง</option>
                <option value="วรรณคดี">วรรณคดี</option>
                <option value="ประวัติศาสตร์">ประวัติศาสตร์</option>
            </select>
            </td>
        </tr>
        <tr>
        <td>สำนักพิมพ์ :</td> <td><input type="text" name="publisher"></td></tr><tr>
        <td><input type="submit" value="Submit"></td></tr>
        </table><br>
        </form>
    </article>
    </main>
    <footer>Copyright ทดสอบ</footer>
</body>
</html>