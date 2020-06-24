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
  function CheckMail($email){
    $conn = new mysqli("localhost","root","", "taliacabin");
   
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    $sql="SELECT email FROM usersdetails WHERE email ='".$email."'";
    $result = $conn->query($sql);
   
    if ($result->num_rows > 0 ){
         
    while($row2=$result->fetch_assoc()){
     $mail=$row2['email'];
      
}

}
else{
    return " ";   
}
    
  if($mail!=" ")
  return $mail;
  else
  return " ";  
} 	



$EmailUser = $_GET['email'];

$reg1="/^[a-z0-9][a-z0-9-_\.]+@([a-z]|[a-z0-9]?[a-z0-9-]+[a-z0-9])\.[a-z0-9]{2,10}(?:\.[a-z]{2,10})?$/"; 
if($EmailUser!=NULL){
$checkEmail=CheckMail($EmailUser);

if($EmailUser==$checkEmail)
    echo "אימייל  תפוס";    
    $match=preg_match($reg1, $EmailUser);
    if ($match==0){
        echo"הכנס כתובת אימייל תקינה";
    }
    else echo"";
}
else {
  echo"";}


?>
</body>
</html>