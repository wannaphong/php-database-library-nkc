<?php
//require_once("is_login.php");
require_once("config.php");
$idbook=$_GET["bookid"];
require_once("db.php");
$sql = "SELECT * FROM `book_view` WHERE BookId=".$idbook;
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
    <?php include("header_web.php"); ?>
    <?php include("js.php"); ?>
</head>
<body>
    <?php include('nav.php');?>
    <div class="row">
    <div class="container">
        <h3 align="center">รายละเอียดหนังสือ</h1>
        <div class="row">
        <div class="col s5">
        <?php 
        if(!IsNullOrEmptyString($rowcount["image"])){
            echo '<img src="images/'.$rowcount["image"].'" class="responsive-img">';
        }
        ?>
        </div>
      <div class="col s7">
      <table>
      <thead>
      <tr>
      <th><h4><?php echo $rowcount["Namebooks"]; ?></h4></th></tr></thead>
      <tbody>
      <tr>
      <td>ผู้เขียน</td><td><?php echo $rowcount["Author"]; ?></td>
          </tr>  
          <tr><td>หมวดหมู่</td><td><?php echo $rowcount["name"]; ?></td></tr>
          <tr><td>สำนักพิมพ์</td><td><?php echo $rowcount["Publisher"]; ?></td></tr>
          <?php
        if (isset($_COOKIE['user'])){ ?>
        <tr><td><a href="./edit_book.php?id=<?php echo $rowcount['BookId']; ?>">แก้ไข</td></tr>
        <?php } ?>
        </tbody>
        </table>
    </div>
        </div>
        </div>
        </div>
    <?php include('footer.php');?>
</body>
</html>
<?php
}
else{
    header("Location: index.php");
    exit();
}
?>