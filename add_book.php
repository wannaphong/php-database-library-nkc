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
    <title>เพิ่มข้อมูลหนังสือ</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
    <header><?php echo $name_web;?></header>
    <?php include('nav.php');?>
    <main>
      <article>
        <h1>เพิ่มข้อมูลหนังสือ</h1>
        <form action="./save_add_book.php"  method="POST">
        <br>ชื่อ : <input type="text" name="namebook"><br>
        ผู้เขียน : <input type="text" name="author"><br>
        หมวดหมู่ : <input type="text" name="category"><br>
        สำนักพิมพ์ : <input type="text" name="publisher"><br>
        <input type="submit" value="Submit">
        </form>
        <p>Content</p>
    </article>
	  <aside>
	    <p>More information</p>
	  </aside>
    </main>
    <footer>Copyright ทดสอบ</footer>
</body>
</html>