<!DOCTYPE html>
<html lang="en">
<head>
<title> סוויטת זית| סוויטות אירוח ומרכז ספא| צימר בצפון|צימרים בראש פינה</title>

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
    <a  href="../Index.php"><img src="../Images/logo.png" 
    class="logo"></a>
    </div>
    <ul class="nav navbar-nav navbar-right"style="margin-top:4%;">
    
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
    <li class="active"><a href="Olive.php">סוויטת זית</a></li>
    <li><a href="Agoz.php">סוויטת אגוז</a></li>
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
          echo"<script>location.href='Olive.php'</script>";
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
       <form method="post" action="Olive.php" >
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
    <h2 class="JumbotronTitle">סוויטה זית</h2>    
    <p class="JumbotronTXT">סוויטה זו משדרת יוקרה ואיכות בשילוב של אווירה נינוחה ומרגיעה.
עץ הזית הגדול יקדם את פניכם כבר בכניסה לסוויטה, הממוקמת במבנה רחב ידיים, בעל עיצוב נקי, אלגנטי ולא שגרתי. <br>
שביל פסיפס העשוי בעבודת יד המחבר בין הכניסה הראשית למרפסת הפרטית של היחידה.<br>
במרפסת המקורה ישנו  ג'קוזי ספא חדיש עם תאורה מתחלפת ופינת ישיבה נוחה.
האינטימיות נשמרת בעזרת סגירת במבוק וצמחיה טרופית קסומה. 
מיטת מלכים מעץ אורן בהיר עם מזרן אורטופדי ניצבת בסמוך לפינת סלון יוקרתית ובה כורסאות מפנקים ושולחן עגול מסוגנן מול מסך טלוויזיה .<br> חדר רחצה גדול עם ראש גשם ענק ושלל תמרוקים.</p>
    
    </div>
    <div class="col-sm-7"> 
    <img  src="../Images/פנים5.jpg" class="JumbotronIMG" alt="פנים5" style="height:550px;"/> 
  </div>
</div>
</div><br>




<div class="container-fluid bg-3 text-center">    
  <div class="row">
    <div class="col-sm-12">
    <h3 class="welcome">סוויטה זית - פרטי האירוח </h3><br>
    </div>
    
  </div>
</div><br>



<div class="container-fluid bg-3 text-right ">    
  
  <div class="row ">
    <div class="col-sm-6 spa_Treatment">
    <ul class="ul" style="height:400px; padding-top:25px;font-size:20px;">
    <li >ג'קוזי ספא פרטי ענק מקורה</li>
    <li >חצר פרטית מבודדת ומגודרת</li>
    <li >חלל פתוח מרווח ומואר</li>
    <li >ג'קוזי ענק בחלל הסוויטה</li>
    <li >מיטה זוגית אורתופדית, מצעי יוקרה</li>
    <li >כיבודים & מכונת אספרסו</li>
    <li >מערכת קולנוע ביתית</li>
    <li >מסך לד  40  אינצ' כולל ערוצי לווין</li>
    <li >פינת אוכל </li>
    <li >סלון אירוח</li>
    <li >מקלחת ראש הגשם </li>
    <ul>
    <a  href="#myModal" >
    <button class="more_inforamtionClick"  data-toggle="modal" data-target="#myModal">מחירים</button>
    </a>
    </div>
    <div class="col-sm-6"> 
    <img  src="../Images/זית3.jpg" class="JumbotronIMG" alt="זית3.jpg"/> 
  </div>
</div>
</div><br>
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title text-center">סוויטה זית - מחירים</h4><br>
          <p>להזמנות יש להתקשר למספר 052-3392535</p>
        </div>
        <div class="modal-body">
        <div class="col-sm-3"> 
        <h5>סופ"ש  2 לילות</h5>
        <p class="modalTXT">2300 ש"ח</p>
         </div>      
        <div class="col-sm-3"> 
        <h5>סופ"ש  לילה</h5>
        <p class="modalTXT">1400 ש"ח</p>
         </div>   
        <div class="col-sm-3"> 
        <h5>אמצ"ש 2 לילות</h5>
        <p class="modalTXT">1800 ש"ח</p>
         </div>   
        <div class="col-sm-3"> 
        <h5>אמצ"ש לילה</h5>
        <p class="modalTXT">1000 ש"ח</p>
         </div>
      
        <br><br><br>
       
        </div>
        <div class="modal-footer">
        <a  href="#" >
        <button class="more_inforamtionClick" style="float:left;"  data-dismiss="modal">סגור</button>
         </a>

        </div>
      </div>
      
    </div>
  </div>


<div class="container-fluid bg-3 text-center">    
  <div class="row">
    <div class="col-sm-12">
    <h3 class="welcome">סוויטה זית - גלריית תמונות </h3><br>
    </div>
    
  </div>
</div><br>



<div class="container">
  <br>
  <div id="pic" class="carousel slide" data-ride="carousel">

    <ol class="carousel-indicators">
      <li data-target="#pic" data-slide-to="0" class="active"></li>
      <li data-target="#pic" data-slide-to="1"></li>
      <li data-target="#pic" data-slide-to="2"></li>
      <li data-target="#pic" data-slide-to="3"></li>
      <li data-target="#pic" data-slide-to="4"></li>
      <li data-target="#pic" data-slide-to="5"></li>
      <li data-target="#pic" data-slide-to="6"></li>
      <li data-target="#pic" data-slide-to="7"></li>
      <li data-target="#pic" data-slide-to="8"></li>
      <li data-target="#pic" data-slide-to="9"></li>

    </ol>
    <div class="carousel-inner" role="listbox">

      <div class="item active">
        <img  src="../Images/פנים6.jpg" alt="פנים6.jpg" width="100%"  style="height:400px;">
        <div class="carousel-caption">
          <h3>חלל מרווח,פתוח ונושם</h3>
          
        </div>
      </div>

      <div class="item">
        <img src="../Images//זית.jpg" alt="זית.jpg" width="100%"  style="height:400px;">
        <div class="carousel-caption">
          <h3>עץ זית עתיק בכניסה לסוויטה</h3>
         
        </div>
      </div>
    
      <div class="item">
        <img src="../Images/זית3.jpg" alt="זית3.jpg" width="100%"  style="height:400px;">
        <div class="carousel-caption">
          <h3>ג'קוזי ספא פרטי במתחם מבודד</h3>
        </div>
      </div>

      <div class="item">
        <img src="../Images/זית6.jpg" alt="זית6.jpg" width="100%"  style="height:400px;">
        <div class="carousel-caption">
          <h3>מתחם שינה רומנטי ואינטימי</h3>
        </div>
      </div>
      <div class="item">
        <img src="../Images/פינתישיבה.jpg" alt="פינתישיבה.jpg" width="100%"  style="height:400px;">
        <div class="carousel-caption">
          <h3>פינת ישיבה נינוחה</h3>
        </div>
      </div>
      <div class="item">
        <img src="../Images/זית2.jpg" alt="זית2.jpg" width="100%"  style="height:400px;">
        <div class="carousel-caption">
          <h3>גינה מטופחת יפיפייה</h3>
        </div>
      </div>
      <div class="item">
        <img src="../Images/פנים5.jpg" alt="פנים5.jpg" width="100%"  style="height:400px;">
        <div class="carousel-caption">
          <h3>עיצוב פנים אלגנטי ויוקרתי</h3>
        </div>
      </div>
      <div class="item">
        <img src="../Images/ארוחת בוקר.jpg" alt="ארוחת בוקר.jpg" width="100%"  style="height:400px;">
        <div class="carousel-caption">
          <h3>ארוחת הבוקר המשובחת</h3>
        </div>
      </div>
      <div class="item">
        <img src="../Images/זית אחרון.jpg" alt="זית אחרון.jpg" width="100%"  style="height:400px;">
        <div class="carousel-caption">
          <h3>חדר רחצה מעוצב עם ראש גשם</h3>
        </div>
      </div>
      <div class="item">
        <img src="../Images/אווירה.jpg" alt="אווירה.jpg" width="100%" style="height:400px;" >
        <div class="carousel-caption">
          <h3>מצעי יוקרה ומזרן אורתופדי</h3>
        </div>
      </div>
    </div>
    <a class="left carousel-control" href="#pic" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">next</span>
    </a>
    <a class="right carousel-control" href="#pic" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
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
