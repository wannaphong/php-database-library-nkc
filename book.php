<?php
require_once("is_login.php");
require_once("config.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>รายการหนังสือ : <?php echo $name_web;?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
<?php include("js.php"); ?></head>
<body>
    <?php include('header_web.php');?>
    <?php include('nav.php');?>
    <main>
      <article>
      <h1 align="center">รายการหนังสือ</h1>
      <a href="./add_book.php"><button>เพิ่มหนังสือ</button></a><br><br>
    <?php
        require("db.php");
	    $sql = "SELECT * FROM Books";
        $query = mysqli_query($con,$sql);
        $rowcount=mysqli_num_rows($query);
        if($rowcount== 0){
            echo "<br>ไม่มีหนังสือให้ยืม";
         }
        else{
    ?>
     <?php
        if (isset($_COOKIE['studentid']))
        {
        ?>
    <b>รหัสนักเรียน : <?php echo $_COOKIE['studentid']; ?></b>
    <?php }?>
    <table border="1">
        <tr>
        <th> <div align="center">รหัส</div></th>
        <th> <div align="center">รูป</div></th>
        <th> <div align="center">ชื่อหนังสือ</div></th>
        <th> <div align="center">รายละเอียด</div></th>
        <th> <div align="center">ลบหนังสือ</div></th>
        <?php
        if (isset($_COOKIE['studentid']))
        {
        ?>
        <th> <div align="center">ยืมหนังสือ</div></th>
        <?php }?>
    </tr>
    <?php
    while($result=mysqli_fetch_array($query,MYSQLI_ASSOC))
    {
    ?>
    <tr>
        <td><div align="center"><?php echo $result["BookId"];?></div></td>
        <td><div align="center"><?php 
        if(!IsNullOrEmptyString($result["image"])){
            echo '<img src="images/'.$result["image"].'" class="responsive">';
        }
        ?></div></td>
        <td><div align="center"><?php echo $result["Namebooks"];?></div></td>
        <td><a href="./detail_book.php?bookid=<?php echo $result["BookId"];?>"><button>รายละเอียด</button></a></td>
        <td><a href="./del_book.php?bookid=<?php echo $result["BookId"];?>"><button onclick="return confirm('คุณแน่ใจว่าต้องการลบ ?')">คลิก</button></a></td>
        <?php
        if (isset($_COOKIE['studentid']))
        {
        ?>
        <td><a href="./borrowbook.php?bookid=<?php echo $result["BookId"];?>"><button>ยืม</button></a></td>
        <?php
        }
        ?>
  </tr>
    <?php
    }
    }
    ?>
</table>
<?php

?>
<br>
<?php
    if (isset($_COOKIE['studentid']))
    {
        ?>
        <form method="GET" action="./borrowbook.php">
        <br>Book ID : <input type="text" name="bookid"><br>
        <input type="submit" value="Submit">
        </form><br>
<?php } ?>
</article>
    </main>
    <?php include('footer_web.php');?>
</body>
</html>