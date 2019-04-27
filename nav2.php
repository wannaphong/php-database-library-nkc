<!--<a href="javascript: history.go(-1)"><< ย้อนกลับ</a>-->
<nav class="white" role="navigation">
    <div class="nav-wrapper container">
      <a id="logo-container" href="#" class="brand-logo">Library</a>
      <ul class="right hide-on-med-and-down">
        <li><a href="./">หน้าหลัก</a></li>
        <li><a href="./search.php">ค้นหา</a></li>
      <?php
      if (isset($_COOKIE['user']))
      {
        echo '<li><a href="student_id.php">ยืมคืน</a></li>';
        echo '<li><a href="book.php">หนังสือ</a></li>';
        echo '<li><a href="student.php">นักเรียน</a></li>';
        require_once("check_admin.php");
        if(is_admin()){
          echo '<li><a href="librarian.php">บรรณารักษ์</a></li>';
        }
        echo '<li><a href="logout.php">ออกจากระบบ</a></li>';
      }
      else{
        echo '<li><a href="login.php">เข้าสู่ระบบ</a></li>';
      }
      ?>
      </ul>

      <ul id="nav-mobile" class="sidenav">
      <li><a href="./">หน้าหลัก</a></li>
      <li><a href="./search.php">ค้นหา</a></li>
      <?php
      if (isset($_COOKIE['user']))
      {
        echo '<li><a href="student_id.php">ยืมคืน</a></li>';
        echo '<li><a href="book.php">หนังสือ</a></li>';
        echo '<li><a href="student.php">นักเรียน</a></li>';
        require_once("check_admin.php");
        if(is_admin()){
          echo '<li><a href="librarian.php">บรรณารักษ์</a></li>';
        }
        echo '<li><a href="logout.php">ออกจากระบบ</a></li>';
      }
      else{
        echo '<li><a href="login.php">เข้าสู่ระบบ</a></li>';
      }
      ?>
      </ul>
      <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
    </div>
  </nav>