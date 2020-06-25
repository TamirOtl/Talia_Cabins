<?php
session_start();

if(isset($_SESSION["user"])){

  session_destroy();
  echo"<script>alert('נותקת בהצלחה')</script>";
  echo"<script>location.href='Index.php'</script>";
}else
echo"<script>location.href='Index.php'</script>";


?>