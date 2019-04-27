<?php
require_once("config.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>เพิ่มข้อมูลบรรณารักษ์ : <?php echo $name_web;?></title>
    <?php include("header_web.php"); ?>
    <?php include("js.php"); ?>
</head>
<body>
    <?php include('nav.php');?>
    <div class="row">
    <div class="container">
        <h1 align="center">เพิ่มข้อมูลบรรณารักษ์</h1>
        <form action="./save_add_librarian.php"  method="POST">
        <table>
        <tr>
        <td>ชื่อ :</td>  <td><input type="text" name="name" required></td></tr>
        <tr><td>ที่อยู่ :</td> <td><input type="text" name="address"></td></tr>
        <tr><td>IDcard :</td> <td><input type="text" name="idcard" required></td></tr>
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
        <tr><td>User :</td> <td><input type="text" name="user" required></td></tr>
        <tr><td>Password :</td> <td><input type="password" name="pass" required></td></tr>
        <tr><td><input type="submit" value="Submit"></td></tr></table>
        </form>
        <br>
    </div>
    </div>
    <?php include('footer.php');?>
</body>
</html>