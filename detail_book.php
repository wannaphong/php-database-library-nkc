<?php
require_once("is_login.php");
require_once("config.php");
$idbook=$_GET["bookid"];
require_once("db.php");
$sql = "SELECT * FROM `Books` WHERE BookId=".$idbook;
$result=mysqli_query($con,$sql);
$rowcount=mysqli_fetch_array($result);
if($rowcount){
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>รายละเอียดหนังสือ : <?php echo $name_web;?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
<?php include("js.php"); ?></head>
<body>
    <?php include('header_web.php');?>
    <?php include('nav.php');?>
    <main>
      <article>
        <h1 align="center">รายละเอียดหนังสือ</h1>
        <table>
        <tr>
            <td>ชื่อ :</td>
            <td><?php echo $rowcount["Namebooks"]; ?></td>
        </tr>
        <tr>
            <td>ผู้เขียน :</td>
            <td><?php echo $rowcount["Author"]; ?></td>
        </tr>
        <tr>
            <td>หมวดหมู่ :</td>
            <td><?php echo $rowcount["category"]; ?></td>
        </tr>
        <tr>
            <td>สำนักพิมพ์ :</td>
            <td><?php echo $rowcount["Publisher"]; ?></td>
        </tr>
        </table>
      <br>
    </article>
    </main>
    <?php include('footer_web.php');?>
</body>
</html>
<?php
}
else{
    header("Location: index.php");
    exit();
}
?>