<nav>
      <a href="./">หน้าหลัก</a>
      <?php
      if (isset($_COOKIE['user']))
      {
        echo '<a href="student_id.php">ยืมคืน</a>';
        echo '<a href="book.php">หนังสือ</a>';
        echo '<a href="student.php">นักเรียน</a>';
        require_once("check_admin.php");
        if(is_admin()){
          echo '<a href="librarian.php">บรรณารักษ์</a>';
        }
        echo '<a href="logout.php">ออกจากระบบ</a>';
      }
      else{
        echo '<a href="login.php">เข้าสู่ระบบ</a>';
      }
      ?>
</nav>