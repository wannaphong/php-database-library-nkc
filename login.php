<?php
require_once("config.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>เข้าสู่ระบบ : <?php echo $name_web;?></title>
    <?php include("header_web.php"); ?>
    <?php include("js.php"); ?>
</head>
<body>
    <?php include('nav.php');?>


        <?php if(!empty($_GET['loginfall'])){
            ?>
            <h3>User/Password ไม่ถูกต้อง</h3>
        <?php }
        ?>
    <form method="POST" action="./check_login.php">
        <div class="row">
         
            <div class="col s12 m6 offset-m3">
                  <div class="card center-align mg">
                    
                      <div class="card-content">
                          <span class="card-title">Login</span>
                          <div class="input-field">
                              <input id="username" type="text" class="validate" name="user" required>
                              <label class="active" for="username">👤 Username</label>
                          </div>
                          <div class="input-field" >
                              <input id="password" type="password" class="validate" required name="password">
                              <label for="password">🔑 Password</label>
                            
                          </div>
                          <button class="btn pulse waves-effect waves-light" type="submit" name="action">Login
                              <i class="material-icons right">send</i>
                          </button>
                      </div>
                     
                          
                    </div>
                  </div>
            </div>
       
     
      </form>  
    <?php include("footer.php"); ?>
</body>
</html>