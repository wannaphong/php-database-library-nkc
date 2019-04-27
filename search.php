<?php
require_once("config.php");
?>
<!DOCTYPE html>
<html></html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>ค้นหาหนังสือ : <?php echo $name_web;?></title>
    <?php include("header_web.php"); ?>
    <?php include("js.php"); ?>
</head>
<body>
    <?php include('nav.php');?>
  <div class="row">
    <div class="container center">
    <form action="./list_book.php" method="get">
    <div class="input-field col s12">
          <input name="namebook" required id="name" type="text">
          <label for="name">ค้นหาหนังสือ</label>
        </div>
        <button class="btn waves-effect waves-light" type="submit">Submit
    <i class="material-icons right">send</i>
  </button>
    </form>
    </div>
    </div>
    <?php include("footer.php"); ?>
</body>
</html>