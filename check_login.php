<?php
if(!empty($_POST['user'])&&!empty($_POST['password'])) {
    require("db.php");
    $usr=mysqli_real_escape_string($con,$_POST['user']);
    $pas=mysqli_real_escape_string($con,$_POST['password']);
    $sql="select * from Librarian WHERE username='$usr' AND password='$pas'";
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
        header("Location: login.php");
        exit();
    }
}
else{
    header("Location: login.php");
    exit();
}
?>