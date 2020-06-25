
<!DOCTYPE html>
<html lang="en">
<head >
<title>  צור קשר| סוויטות אירוח ומרכז ספא| צימר בצפון|צימרים בראש פינה</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="../Images/logo.png" type="image/png" sizes="16x16">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="../JavaScript/script.js"></script>
  <link rel="stylesheet" type="text/css" href="../css/style.css">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <script src='https://kit.fontawesome.com/a076d05399.js'></script>
  <script>
 fetch('https://api.openweathermap.org/data/2.5/weather?q=Rosh Pina&appid=26b12a44f4c02b6690ba0c54d93b86d5')
.then(response => response.json())
.then(data => {
  var tempValue = data.main.temp;
  var icons = data.weather[0].icon;
  
  document.querySelector('#temp').textContent = Math.floor(Math.round(tempValue-273.15))+"C°";
  var iconurl ='../Images/'+data.weather[0].icon+'.png';
  $('#myImg').attr('src', iconurl);
  
})

</script>
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


require '../Pages/PHPMailer/src/Exception.php';
require '../Pages/PHPMailer/src/PHPMailer.php';
require '../Pages/PHPMailer/src/SMTP.php';
// require 'vendor/autoload.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer();

try {
  $mail->CharSet = 'UTF-8';
  $mail->SMTPDebug = 0;                      // Enable verbose debug output
  $mail->isSMTP();                                            // Send using SMTP
  $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
  $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
  $mail->Username   = 'Tamir.php2@gmail.com';                     // SMTP username
  $mail->Password   = 'P123456789p  ';                               // SMTP password
  $mail->SMTPSecure = "tls";         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
  $mail->Port       = 587;           
    //Recipients
   // Add a recipient
    if(isset($_POST['send'])){
	
      $name=$_POST['name'];
      $TEL=$_POST['TEL'];
      $email=$_POST['email'];
      $words=$_POST['words'];

    $mail->setFrom("biktalia@gmail.com",'בקתות טליה');
    $mail->addAddress('tamir.otl2@gmail.com');  

    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = "בקשה ליצירת קשר";
    $mail->Body='<h3 style="text-align:right;margin-right:5px; direction:rtl; background-color:#D8EDDF;font-family: museum-aaa-400,sans-serif;color:rgb(171, 140, 140);
    height:100%;width:100%;font-size:18px;">
    '.$words .'<br><br> מייל ליצירת קשר: '.$email.' '
    .'<br><br>מספר טלפון:'.$TEL.''
    .'<br><br> תודה: '.$name.'<br><br><img  src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcTfFjTuOyHnbNpLpBRhBBM98167as9GZYUMptm2OoSPiyN1zL09&usqp=CAU"  alt ="logo" width="100px" height="100px" /></h3>';
    

    $mail->send();
    
    
    }

 
 
} catch (Exception $e) {
    echo "";
}
?>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "taliacabin";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


function UserAndPass($user,$pass){
  $conn = new mysqli("localhost","root","", "taliacabin");
 
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$password1=md5($pass);
  $sql = "SELECT 	*FROM users WHERE UserName='".$user."' AND Password='".$pass."'";
  $result=mysqli_query($conn, $sql);
  if(mysqli_num_rows($result) > 0){
    $find=true;
  }
  else
  $find=false;

  return $find;
}
$user="";
  
	$pass="";
  
if(isset($_POST['submit'])){
	
    $user=$_POST['user'];
  
	$pass=$_POST['password'];
  
  

	
  }
  

?>
</head>
<body style="text-align:right; direction:rtl;">

<nav class="navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header  navbar-right">
    <a  href="../Index.php"><img src="../Images/logo.png" 
    class="logo"></a>
    </div>
    <ul class="nav navbar-nav navbar-right"style="margin-top:4%;">
    
    <li class="active"><a href="ContactUs.php">צור קשר</a></li>
    <li ><a href="recommendation.php">המלצות</a></li>
    <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="RoshPina.php">ראש פינה והסביבה
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="Restaurnt.php" style="text-align:right;">מסעדות בראש פינה</a></li>
          <li><a href="Attraction.php" style="text-align:right;">טיולים בראש פינה</a></li>
        </ul>
      </li>
    <li><a href="Spa.php">מרכז ספא</a></li>
    <li ><a href="Olive.php">סוויטת זית</a></li>
    <li ><a href="Agoz.php">סוויטת אגוז</a></li>
    <li ><a href="Cabin.php">המתחם</a></li>
      
     
    </ul>
    <ul class="nav navbar-nav navbar-left">
    <li><img  src="" id="myImg"></li>
    <li ><div id="temp"></div></li>
    <?php 
      session_start();
      if(isset($_SESSION['user'])){
      echo'<li class="dropdown">
      <a  style="cursor: pointer;" class="dropdown-toggle" data-toggle="dropdown">';  
      echo"שלום ". $_SESSION['user'];
      echo' <span class="caret"></span></a>
      <ul class="dropdown-menu">
      <li><a href="../Logout.php" style="text-align:right;"class="glyphicon glyphicon-log-in"> התנתק</a></li>
      </ul>
    </li>';
      }
      else{
        $find= UserAndPass($user,$pass);
        if($find==true){
          $_SESSION['user']=$user;
          echo"<script>location.href='Spa.php'</script>";
        }
        else{
          
          echo"
            <li><a  style='cursor: pointer;'data-toggle='modal' data-target='#myModal'><img src='../Images/user.png' style='height:20px;width:20px;'/>&nbsp כניסת משתמש</a></li>";
        }
      }
   
      ?>



    
    </ul>
  </div>
</nav>



<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog" >
    
      <div class="modal-content" style="width:100%;">
        <div class="modal-header" style="background-color: #D8EDDF !important;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h2 style="text-align:center;">  בקתות טליה מועדון<img  src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcTfFjTuOyHnbNpLpBRhBBM98167as9GZYUMptm2OoSPiyN1zL09&usqp=CAU"  alt ="logo" width="100px" height="100px" /></h2>
        </div>
        <div class="modal-body"style="background-color: linen !important;" >
        <div class="col-sm-12" > 
       <form method="post" action="Spa.php" >
       <div class="form-group">
      <label for="user">שם משתמש:</label>
      <input type="text" class="form-control" id="user" name="user">
      <p style="color:red;" id="USERERROR"><?php $usererror?></p>  
    </div>
    <div class="form-group">
      <label for="password">סיסמה:</label>
      <input type="password" class="form-control" id="password" name="password" >
      <p style="color:red;" id="passwordERROR"><?php $passerror ?></p>  
    </div>
    <b><a href="ForgotPassword.php" style="cursor: pointer;decoration:underline;">שכחתי סיסמה</b></a>
    <br><br>
    <input type="submit" id="submit" data-backdrop='static' data-keyboard='false'  class="more_inforamtionClick" name="submit"  style="width:100%;" value="כניסה" 
      title="מלא את השדות"
        >
       </form>
         </div>      
<br><br>
</div >

        <div class="modal-footer" style="padding-right:35%;background-color: linen !important; ">
        <div class="col-sm-12" >
        <a  href="Pages/registration.php">
       להצטרפות למועדון לחץ כאן
         </a>
      </div>
        </div>
      </div>
      
    </div>
  </div>
</div>


<div class="container-fluid bg-3 text-center ">    
  
  <div class="row jumbotronBack">
    <div class="col-sm-5">
    <h2 class="JumbotronTitle">בואו להיות בקשר</h2>    
    <p class="JumbotronTXT" style="text-align:center;">
    052-3392535<br>
    <h3>טליה וראובן</h3>
    </p>
    </div>
    <div class="col-sm-7"> 
    <img  src="../Images/envelopes-letters-paper.jpg" class="JumbotronIMG" alt="צור קשר.png" style="height:250px;"/> 
  </div>
</div>
</div><br>




<div class="container-fluid bg-3 text-center">    
  <div class="row">
    
    <div class="google-maps">
    <iframe width="500" height="400" id="gmap_canvas" src="https://maps.google.com/maps?q=%D7%91%D7%A7%D7%AA%D7%95%D7%AA%20%D7%98%D7%9C%D7%99%D7%94&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://www.crocothemes.net"></a>
</div>
   
    
  </div>
</div><br><br>




<div class="container-fluid bg-3 text-right ">    
  
  <div class="row ">
  <div class="col-sm-6"> 
    <div class="column">
    <div class="card">
      <h3>בקתות טליה פקס: 04-6935212</h3>
      <h3>רח' הרדוף 2, ראש פינה</h3>
      <h3>אימייל: biktalia@gmail.com</h3>
     <h3>טלפון:  052-3392535</h3> <a href="https://api.whatsapp.com/send?phone=972523392535"><i class='fab fa-whatsapp-square' style='font-size:66px; color:rgb(84, 233, 64);'></i></a>
     

      <p>נשמח לארח אתכם</p>
      <p>טליה וראובן</p>
    </div>
  </div></div>
  <div class="col-sm-6"> 
  <form  name="ContactUs"action="ContactUs.php" onsubmit="openModel()" method="post"> 
  
        <input type="email" id="email" name="email" placeholder="אימייל*"  
        onInput="validation()">
        <p style="color:red;" id="emailvalidERROR"></p>
        
        <input type="text" id="name" name="name" placeholder="שם" onInput="validation()">
        <p style="color:red;" id="nameError"></p> <br> 
        <input type="tel" id="TEL" name="TEL" placeholder="טלפון"  onInput="validation()">
        <p style="color:red;" id="TelvalidERROR"></p>
        <textarea  id="words" name="words" placeholder="מסר קצר" onInput="validation()"></textarea>
        <p style="color:red;" id="MSGERROR"></p>   <br>
        <button type="submit" id="send" disabled  class="more_inforamtionClick" name="send"  style="float:left;" 
        data-toggle="modal" data-target="#myModal" title="מלא את השדות"
        >שלח הודעה</button>
        </form></div>
    
</div>
</div><br>

<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
        <div class="col-sm-12"> 
        <h4 class="modal-title text-right"> תודה רבה! נחזור אליכם בהקדם</h4>
         </div>      
<br><br>
        </div>
        <div class="modal-footer">
        <a  href="#" >
        <button class="more_inforamtionClick" style="float:left;"  data-dismiss="modal" onClick="reset()">סגור</button>
         </a>

        </div>
      </div>
      
    </div>
  </div>





<footer class="container-fluid text-right">
<div class="container bg-3 text-center ">    
  <div class="row">
    <div class="col-sm-3">
    <div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v7.0&appId=581519822745913&autoLogAppEvents=1"></script>
<div class="fb-page" 
  data-href="https://www.facebook.com/Biktot.Talia/"
  data-width="380" 
  data-hide-cover="false"
  data-show-facepile="false"></div></div>
<div class="col-sm-4">
<br>
<p><a  class="mailto"href="recommendation.php">המלצות</a></p>
<p><a  class="mailto"href="Cabin.php">המתחם שלנו</a></p>
<p><a  class="mailto"href="RoshPina.php">אטרקציות בראש פינה</a></p>
<p><a  class="mailto"href="ContactUs.php">צור קשר</a></p>
<p><a  class="mailto"href="Agoz.php">סוויטת אגוז</a></p>
<p><a  class="mailto"href="Olive.php">סוויטת זית</a></p>
<p><a  class="mailto"href="Spa.php">מרכז ספא & סטודיו יופי</a></p>
</div>
<div class="col-sm-4">
<h1>בקתות טליה</h1>
<h4>סוויטת אירוח<i class='fas fa-spa' style='font-size:26px; color:rgba(255, 0, 0, 0.459);'></i>מרכז ספא</h4><br>
<p>ראש פינה</p>
<p><a  class="mailto"href="mailto:biktalia@gmail.com">biktalia@gmail.com</a></p>
<p>052-3392535</p>
</div>
</div><br>
</div>
</footer>

</body>
</html>
