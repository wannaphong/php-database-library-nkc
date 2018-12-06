<?php
if(!empty($_POST['user'])) {
    require("db.php");
    $usr=$_POST['user'];
    $pas=$_POST['password'];
    $sql="select * from Librarian WHERE username='$usr' AND password='$pas'";
    echo $sql;
    $result=mysqli_query($con,$sql);
    $rowcount=mysqli_fetch_array($result);
    if($rowcount){
        
        $cookie_name = "user";
        $cookie_value = $rowcount['LibrarianId'];
        setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
    mysqli_close($con);
       header("Location: index.php");
       echo "ok";
       exit();
    }
    else{
        echo "error";
    }
}
?>