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
    <form action="./list_book.php" method="get">>
        <div class="row">
         
            <div class="col s12 m6 offset-m3">
                  <div class="card center-align mg">
                    
                      <div class="card-content">
                      <span class="card-title">ค้นหาหนังสือ</span>
                      <div class="input-field col s12">
          <input name="namebook" required id="name" type="text">
          <label for="name">ค้นหาหนังสือ</label>
        </div>
        <div>
        </div>
        <button class="btn waves-effect waves-light" type="submit">Submit
    <i class="material-icons right">send</i>
  </button>
                      </div>
                     
                
                     </div>
                   </div>
             </div>
        
      
       </form>  
    </div>
    <?php include("footer.php"); ?>
</body>
</html>