<?php
require_once("config.php");
if(!empty($_POST['user'])&&!empty($_POST['password'])) {
    require("db.php");
    $usr=$_POST['user'];
    $pas=$_POST['password'];
    $sql="select * from Librarian WHERE username='$usr' AND password='$pas' LIMIT 1";
    $result=mysqli_query($con,$sql);
    $rowcount=mysqli_num_rows($result);
    if(mysql_num_rows($sql) == 1){
        $row=mysqli_fetch_array($result,MYSQLI_NUM);
        session_start();
        $_SESSION['username'] = $row['LibrarianId'];
        $_SESSION['logged'] = TRUE; 
        mysqli_close($con);
        header("Location: manage.php");
        exit; 
    }
}
?>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>เข้าสู่ระบบ : <?php echo $name_web;?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
    <header><?php echo $name_web;?></header>
    <?php include('nav.php');?>
    <main>
      <article>
        <h1>Login</h1>
        <form method="POST">
        <br>User : <input type="text" name="user"><br>
        Password : <input type="text" name="password"><br>
        <input type="submit" value="Submit">
        </form>
    </article>
	  <aside>
	    <p>More information</p>
	  </aside>
    </main>
    <footer>Copyright ทดสอบ</footer>
</body>
</html>