<?php
require_once("is_login.php");
require_once("config.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>ทดสอบ</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
    <header><?php echo $name_web;?></header>
    <?php include('nav.php');?>
    <main>
      <article>
<?php
        require("db.php");
	    $sql = "SELECT * FROM Books";
        $query = mysqli_query($con,$sql);
        //echo $sql;
        $rowcount=mysqli_num_rows($query);
        if($rowcount== 0){
            echo "<br>ไม่มีหนังสือให้ยืม";
         }
         else{
    ?>
    <table border="1">
        <tr>
        <th> <div align="center">ชื่อหนังสือ</div></th>
        <th> <div align="center">ผู้เขียน</div></th>
    </tr>
<?php
while($result=mysqli_fetch_array($query,MYSQLI_ASSOC))
{
?>
  <tr>
    <td><div align="center"><?php echo $result["Namebooks"];?></div></td>
    <td><?php echo $result["Author"];?></td>
    <?php
    if (isset($_COOKIE['studentid']))
    {
    
    ?>
    <td><a href="./borrowbook.php?bookid=<?php echo $result["BookId"];?>">ยืมหนังสือ</a></td>
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
mysqli_close($conn);
?>
<br>
<a href="./add_book.php">เพิ่มหนังสือ</a>
</article>
    </main>
    <footer>Copyright <?php echo $name_web;?></footer>
</body>
</html>