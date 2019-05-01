<li><a href="./">หน้าหลัก</a></li>
        <li><a href="./search.php">ค้นหา</a></li>
        <li><a href="./report.php">รายงาน</a></li>
      <?php
      if (isset($_COOKIE['user']))
      {
        echo '<li><a href="student_id.php">ยืมคืน</a></li>';
        echo '<li><a href="book.php">หนังสือ</a></li>';
        echo '<li><a href="student.php">นักเรียน</a></li>';
        require_once("check_admin.php");
      #  if(is_admin()){
          echo '<li><a href="librarian.php">บรรณารักษ์</a></li>';
       # }
        echo '<li><a href="logout.php">ออกจากระบบ</a></li>';
      }
      else{
        echo '<li><a href="login.php">เข้าสู่ระบบ</a></li>';
      }
      ?>