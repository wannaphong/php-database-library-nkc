<?php
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
        <h1>เพิ่มข้อมูล</h1>
        <form action="./save_add_librarian.php"  method="POST">
        <br>ชื่อ : <input type="text" name="name"><br>
        ที่อยู่ : <input type="text" name="address"><br>
        IDcard : <input type="text" name="idcard"><br>
        เพศ : <input type="text" name="gender"><br>
        User : <input type="text" name="user"><br>
        Password : <input type="password" name="pass"><br>
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