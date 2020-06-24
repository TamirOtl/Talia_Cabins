<!DOCTYPE html>
<html lang="en">
<head>
  <title>בקתות טליה</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="../Images/logo.png" type="image/png" sizes="16x16">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="../JavaScript/script.js"></script>
  <link rel="stylesheet" type="text/css" href="../css/style.css">
  </head>
  <body>
<?php
    $conn = new mysqli("localhost","root","", "taliacabin");
   
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

function CheckUser($user){
    $conn = new mysqli("localhost","root","", "taliacabin");
   
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    $sql="SELECT UserName FROM users WHERE UserName ='".$user."'";
    $result = $conn->query($sql);
   
    if ($result->num_rows > 0 ){
         
    while($row2=$result->fetch_assoc()){
     $usr=$row2['UserName'];
      
}

}
else{
    return " ";   
}
    
  if($usr!=" ")
  return $usr;
  else
  return " ";  
}





$USER = $_GET['user'];
if($USER){
$checkUser=CheckUser($USER);
if($USER==$checkUser)
    echo "שם משתמש  תפוס";  

}
?>
</body>
</html>