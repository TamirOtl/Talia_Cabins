<!DOCTYPE html>
<html lang="en">
<head>
<title> המתחם| סוויטות אירוח ומרכז ספא| צימר בצפון|צימרים בראש פינה</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="../Images/logo.png" type="image/png" sizes="16x16">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="../JavaScript/script.js"></script>
  <link rel="stylesheet" type="text/css" href="../css/style.css">
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


</head>
<body>
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
<nav class="navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header  navbar-right">
      <a class="navbar-brand  " href="../Index.php">בקתות טליה</a>
    </div>
    <ul class="nav navbar-nav navbar-right">
    
    <li ><a href="ContactUs.php">צור קשר</a></li>
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
    <li class="active"><a href="Cabin.php">המתחם</a></li>
      
     
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
      <li><a href="Pages/Restaurnt.php" style="text-align:right;"class="glyphicon glyphicon-user"> פרופיל אישי</a></li>
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
    <div class="col-sm-4">
    <h2 class="JumbotronTitle">מתחם הסוויטות </h2>    
    <p class="JumbotronTXT">מתחם הסוויטות מגודר ומבודד היטב וממוקם בתוך גן מרהיב, שופע צמחיה מוריקה, מדשאות, פרחים ועצי פרי. 
בין שבילי הטיול פזורות פינות ישיבה מקסימות ובמרכז המתחם ניצב עץ זית עתיק ומרשים.
בתוך המתחם נמצא מרכז ספא מקצועי ובו חדר טיפולים מרגיע ונעים וסאונה יבשה.</p>
    
    </div>
    <div class="col-sm-8"> 
    <img  src="../Images/areaCabin.png" class="JumbotronIMG" alt="areaCabin.png"/> 
  </div>
</div>
</div><br>



<div class="container-fluid bg-3 text-center">    
  <div class="row">
    <div class="col-sm-12">
    <h3 class="welcome">בקתות טליה - מה במתחם  </h3><br>
    </div>
    
  </div>
</div><br>



<div class="container-fluid bg-3 text-center jumbotronBack">    
  <div class="row ">
  <div class="col-sm-2"> </div>
    <div class="col-sm-7 boxCabin"> 
    <div class="col-sm-5 ">
    <h2 class="cabinTitle">סוויטה אגוז</h2>  
    <p class="cabinTXT">סוויטה נינוחה הבנויה מעץ טבעי בגוונים כהים עם בריכת שחיה פרטית, מחוממת ומקורה</p>
    <a href="Agoz.php"  >
    <button  class="more_inforamtion" style="float:right;margin-right:30px; margin-top:30px;">מידע נוסף</button>
    </a>
    </div>
    <div class="col-sm-7"> 
    <div class="cabinAGOZ"></div>
  </div>
    </div>
    <div class="col-sm-3"> </div>
  </div>


  <div class="row ">
  <div class="col-sm-2"> </div>
    <div class="col-sm-7 boxCabin"> 
    <div class="col-sm-5 ">
    <h2 class="cabinTitle">סוויטה זית</h2>  
    <p class="cabinTXT">סוויטה מעוצבת בסגנון כפרי - מודרני בגווני עץ בהירים עם ג'קוזי ספא פרטי מקורה בחצר המבודדת</p>
    <a href="Olive.php"  >
    <button  class="more_inforamtion" style="float:right;margin-right:30px; margin-top:30px;">מידע נוסף</button>
    </a>
    </div>
    <div class="col-sm-7"> 
    <div class="cabinOlive"></div>
  </div>
    </div>
    <div class="col-sm-3"> </div>
  </div>

  <div class="row ">
  <div class="col-sm-2"> </div>
    <div class="col-sm-7 boxCabin"> 
    <div class="col-sm-5 ">
    <h2 class="cabinTitle">מרכז ספא וסטודיו יופי</h2>  
    <p class="cabinTXT">מרכז ספא מקצועי המציע לאורחי הסוויטות מגוון רב של טיפולי גוף וטיפולים קוסמטיים</p>
    <a href="Spa.php"  >
    <button  class="more_inforamtion" style="float:right;margin-right:30px; margin-top:30px;">מידע נוסף</button>
    </a>
    </div>
    <div class="col-sm-7"> 
    <div class="cabinSpa"></div>
  </div>
    </div>
    <div class="col-sm-3"> </div>
  </div></div>
</div><br><br>


<div class="container-fluid bg-3 text-center">    
  <div class="row">
    <div class="col-sm-12">
    <h3 class="welcome">אירוח בבקתות טליה </h3><br>
    <p class="cabinInvite">לכל אחת מהבקתות חצר פרטית, פינת ישיבה רוגעת ומוצלת ותאורת ערב המאירה את המתחם באור לילי רך ורומנטי
</p>
    </div>
    
  </div>
</div><br>
<div class="container-fluid bg-3 text-center">    

  <div class="row cabin">
  
    <div class="col-sm-3">
    <div class="cabin2">
   <h2 class="details">כיבודים</h2>
     <ul class="liCabin" >
    <li > עוגיות מעשי ידיה של טליה  בעלת המקום</li>
    <li >חליטות תה להכנה עצמית</li>
    <li >פירות יבשים וטריים</li>
    <li >שוקולד איכותי</li>
    <li >פיצוחים</li>
    <li >ערכה לקפה</li>
    <li >ערכת תיבול לסלט</li>
    <li >מים מינרליים</li>
    <li >בקבוקי משקה אישיים</li>
    <li >חלב</li>
    <ul> </div></div>

    
    <div class="col-sm-3"> 
    <div class="cabin">
    <h2 class="details">בכל סוויטה</h2>
     <ul class="li" >
    <li >מיקרוגל</li>
    <li >מכונת אספרסו</li>
    <li >מקרר</li>
    <li >טלוויזיה 40 אינצ' עם ערוצי לווין</li>
    <li >מגזינים וספרים</li>
    <li >שוברי הנחה לאטרקציות</li>
    <li >מיטה זוגית עם מזרן אורתופדי</li>
    <li >חדר רחצה עם מקלחון ראש גשם ענק</li>
    <ul>
    </div></div>
    <div class="col-sm-3"> 
    <div class="cabin2">
    <h2 class="details">שירות לאורחים</h2>
    <p style="padding-left:15px;">*בתיאום מראש ובתוספת תשלום</p>
     <ul class="liCabin" >
    <li > חניה פרטית</li>
    <li >ארוחת בוקר עשירה</li>
    <li >הכנת סוויטה להצעת נישואין*</li>
    <li >עזרה בתכנון מסלולי טיול</li>
    <li >תנאים מלאים לאירוח ציבור דתי</li>
    <li > עזרה בהזמנת מסעדה</li>
    <li >שירות חדרים*</li>
    <li >טיפולי ספא*</li>
    <ul> </div></div>
 
   <div class="col-sm-3">
   <div class="cabin">
   <h2 class="details">טיפוח וטואלטיקה</h2>
     <ul class="li" >
    <li > מגבות רחצה, חלוקים ונעלי ספא</li>
    <li >מייבש שיער</li>
    <li >קצף אמבט</li>
    <li >ערכת תפירה</li>
    <li >שמיכות פליז</li>
    <li >קרם גוף</li>
    <li >סבונים</li>
    <li >ג'ל רחצה</li>
    <li >נרות ארומטיים</li>
    <ul></div></div>
    
</div>
</div>
</div><br>

<div class="container-fluid bg-3 text-center">    

  <div class="row ">
    

    <div class="col-sm-3"> 
    <img src="../Images/internet.png"   style=" height:175px;" alt="internet" >
    <h3>WIFI</h3>
    </div>
 
   <div class="col-sm-2">
   <img src="../Images/television.png"   style="height:175px;" alt="television" >
   <h3>ערוצי לווין YES</h3> </div>
    
    <div class="col-sm-2">
    <img src="../Images/breakfast.png"   style=" height:175px;" alt="breakfast" >
    <h3>ארוחת בוקר</h3> </div>
    
    
    <div class="col-sm-2"> 
    <img src="../Images/espresso.png"   style=" height:175px;" alt="espresso" > 
    <h3>מכונת אספרסו</h3></div>
    <div class="col-sm-2">
    <img src="../Images/car.png"   style=" height:175px;" alt="parking" > 
    <h3>חניה פרטית</h3></div>
</div>
</div>
</div><br>



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
