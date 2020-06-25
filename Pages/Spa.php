<!DOCTYPE html>
<html lang="en">
<head>
<title> מרכז ספא | סוויטות אירוח ומרכז ספא| צימר בצפון|צימרים בראש פינה</title>

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
    <li class="active"><a href="Spa.php">מרכז ספא</a></li>
    <li ><a href="Olive.php">סוויטת זית</a></li>
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
    <h2 class="JumbotronTitle">מרכז ספא וסטודיו יופי </h2>    
    <p class="JumbotronTXT">מתחם הספא מכיל חדר טיפולים נוח ומעוצב ובתוכו: אמבט שמנים ומלחים, ג'קוזי ספא ענק וסאונה יבשה, פינת ישיבה מזמינה, פינת קפה עשירה עם מגוון סוגי קפה וחליטות תה, יין בוטיק משובח וכיבוד עשיר
בנוסף, במרכז ספא ממוקם סטודיו יופי המציע מגוון טיפולים קוסמטיים.</p>
    
    </div>
    <div class="col-sm-8"> 
    <img  src="../Images/5252-features-hd-spa.jpg" class="JumbotronIMG" alt="jumbotronImg" style="height:350px;"/> 
  </div>
</div>
</div><br>




<div class="container-fluid bg-3 text-center">    
  <div class="row">
    <div class="col-sm-12">
    <h3 class="welcome">טיפולי ספא </h3><br>
    </div>
    
  </div>
</div><br>



<div class="container-fluid bg-3 text-right ">    
  
  <div class="row ">
    <div class="col-sm-6 spa_Treatment">
    <p>ספא בוטיק איכותי ואינטימי המציע חווית פינוק ייחודית. במרכז הספא ניתן להזמין מגוון רחב של טיפולי גוף:</p>
    <ul class="ul">
    <li >עיסוי משולב המותאם למטופל</li>
    <li >עיסוי באבנים חמות</li>
    <li >עיסוי ארומתרפי</li>
    <li >עיסוי נשים הרות</li>
    <li >פילינג גוף</li>
    <li >רפלקסולוגיה</li>
    <ul>
    </div>
    <div class="col-sm-6"> 
    <img  src="../Images/Massage.PNG" class="JumbotronIMG" alt="Massage"/> 
  </div>
</div>
</div><br>



<div class="container-fluid bg-3 text-center">    
  <div class="row">
    <div class="col-sm-12">
    <h3 class="welcome">טיפולי יופי וקוסמטיקה </h3><br>
    </div>
    
  </div>
</div><br>



<div class="container-fluid bg-3 text-right ">    
  
  <div class="row ">
    <div class="col-sm-6 Cosmetic_Treatment">
    <p>בסטודיו יופי תוכלו להנות ממגוון של טיפולים:</p>
    <ul class="ul">
    <li >בניית צפרניים במגוון שיטות</li>
    <li >מניקור</li>
    <li >ג'ל לק טבעי</li>
    <li >פדיקור רפואי מקצועי - הכולל גם טיפול בבעיות רפואיות: פטרת, צפורן חודרנית, עור סדוק ויבש, יבלות ועוד</li>
    <li >שעוות גוף</li>
    <li >אמבט פרפין</li>
    <li >עיצוב שיער – תסרוקות ערב וכלות וכל סוגי פן לשיער</li>
    <ul>
    </div>
    <div class="col-sm-6"> 
    <img  src="../Images/cosmetic.PNG" class="JumbotronIMG" alt="cosmetic"/> 
  </div>
</div>
</div><br>

<div class="container-fluid bg-3 text-center">    
  <div class="row">
    <div class="col-sm-12">
    <h3 class="welcome">הצעות מיוחדות</h3><br>
    </div>
  </div>
</div><br>

<div class="container-fluid bg-3 text-center">    
  <div class="row jumbotronBack">
    <div class="col-sm-2"> </div>
    <div class="col-sm-4"> 
    <div class="box3" >
       <div class="box2" style="background-color: #D8EDDF !important; color:#8B0000;">
         <p> ניתן לשלב ארוח כולל לינה בסוויטות או יום פינוק כולל סוויטה</p>
       </div> 
      </div>
    </div>
    <div class="col-sm-4"> 
      <div class="box1" >
       <div class="box2">
         <p>ניתן להזמין שוברי מתנה ולשלב בין מגוון הטיפולים לימי פינוק, ימי הולדת, ימי נישואין, מסיבת רווקות וסתם כפינוק לנשמה</p>
       </div> 
      </div>
    </div>

    <div class="col-sm-2">
    </div>
  </div>
</div><br><br>



<div class="container-fluid bg-3 text-center">    
  <div class="row">
    <div class="col-sm-12">
    <h3 class="welcome">מרכז ספא בקתות טליה</h3><br>
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
    </ol>


    <div class="carousel-inner" role="listbox">

      <div class="item active">
        <img  src="../Images/Jacuzzi.png" alt="Jacuzzi" width="100%" >
        <div class="carousel-caption">
          <h3>ג'קוזי ספא ענק</h3>
          
        </div>
      </div>

      <div class="item">
        <img src="../Images//drySAUNA.png" alt="drySAUNA" width="100%" >
        <div class="carousel-caption">
          <h3>סאונה יבשה</h3>
         
        </div>
      </div>
    
      <div class="item">
        <img src="../Images/Treatment_room.png" alt="Treatment_room.png" width="100%" >
        <div class="carousel-caption">
          <h3>חדר טיפולים</h3>
        </div>
      </div>

      <div class="item">
        <img src="../Images/nightSpa.png" alt="nightSpa" width="100%" >
        <div class="carousel-caption">
          <h3>מרכז ספא בתאורה לילית</h3>
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
