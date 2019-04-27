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
    <?php include("header_web.php"); ?>
    <?php include("js.php"); ?>
</head>
<body>
    <?php include('nav.php');?>
    <div class="row">
    <div class="container">
        <h3 align="center">เพิ่มข้อมูลหนังสือ</h1>
        <form action="./save_add_book.php"  method="POST" enctype="multipart/form-data">
        <table>
        <tr>
            <td>ชื่อ :</td> 
            <td><input type="text" name="namebook" required></td>
        </tr><tr>
        <td>ผู้เขียน :</td> <td><input type="text" name="author" required></td></tr>
        <tr>
            <td>หมวดหมู่ :</td>
            <td>
            <select required name="category">
            <?php
            require("db.php");
            $sql = "SELECT * FROM Category";
            $query = mysqli_query($con,$sql);
            $rowcount=mysqli_num_rows($query);
            while($result=mysqli_fetch_array($query,MYSQLI_ASSOC))
            {
            ?>
            <option value="<?php echo $result["categoryid"];?>"><?php echo $result["name"];?></option>
            <?php
            }
            ?>
            </select>
            </td>
        </tr>
        <tr>
            <td>ไฟล์ :</td> 
            <td><input type="file" name="image"></td>
        </tr>
        <tr>
        <td>สำนักพิมพ์ :</td> <td><input type="text" name="publisher"></td></tr><tr>
        <td><input type="submit" value="บันทึก"></td></tr>
        </table><br>
        </form>
    </div>
    </div>
    <?php include('footer.php');?>
</body>
</html>