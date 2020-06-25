<!DOCTYPE html>
<html lang="en">
<head>
<title>  ראש פינה והסביבה| סוויטות אירוח ומרכז ספא| צימר בצפון|צימרים בראש פינה</title>
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
    <li class="dropdown active">
        <a class="dropdown-toggle " data-toggle="dropdown"   href="RoshPina.php">ראש פינה והסביבה
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li class="active"><a href="Restaurnt.php" style="text-align:right;">מסעדות בראש פינה</a></li>
          <li><a href="Attraction.php" style="text-align:right;">טיולים בראש פינה</a></li>
        </ul>
      </li>
    <li><a href="Spa.php">מרכז ספא</a></li>
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
    <div class="col-sm-5">
    <h2 class="JumbotronTitle">ראש פינה והסביבה</h2>    
    <p class="JumbotronTXT">ראש פינה שופעת אטרקציות ומוקדי עניין תיירותיים ואורחי צימר בקתות טליה מוזמנים להתנסות בשפע של חוויות מרתקות ורומנטיות - לסעוד במסעדות מצוינות, לבקר במתחם השחזור העתיק המפורסם ואף לצאת מגבולותיה של העיירה אל המרחבים המרהיבים של הגליל העליון ורמת הגולן. 

</p>
    
    </div>
    <div class="col-sm-7"> 
    <img  src="https://www.tiuli.com/image/caef25a58cbb3a178ecd8d91c678d958.jpg?&width=546&height=400" class="JumbotronIMG" alt="jumbotronImg" style="height:350px;"/> 
  </div>
</div>
</div><br>




<div class="container-fluid bg-3 text-center">    

  <div class="row" style="background-color: #D8EDDF !important; ">
  <div class="col-sm-12">
    <h2 class="JumbotronTitle">חוויה קולינרית בראש פינה </h2> <br><br>   
    </div>
  
    <div class="col-sm-4"> 
    
    <div  onClick="document.location='Restaurnt.php#wines';">
   <button class="RestaurntPage"><img src="../Images/wine.png" style="height:82px; width:82px;"/>גבינות ויקבי יין</button>
   </div>

   </div>
   <div class="col-sm-4"> 
  
  <div  onClick="document.location='Restaurnt.php#pubs';" >
<button  class="RestaurntPage"><img src="../Images/beer.png" style="height:82px; width:82px;">פאבים, ברים ובתי קפה</button>
</div>
</div>
   <div class="col-sm-4" >
    <div  onClick="document.location='Restaurnt.php#restaurnt';">
   <button class="RestaurntPage"><img src="../Images/eat.png" style="height:82px; width:82px;">מסעדות בראש פינה</button>
   </div> 

  </div>

  <div class="col-sm-4" >
  <div class="container">
  <img src="../Images/roshPina3.PNG" alt="roshPina1" class="image"/>
  <div class="overlay">
    <div class="text">גליל עליון שופע יקבי בוטים קסומים הפתוחים לביקורי נופשים. ניתן לשלב סיור ביקב עם חוויה קולינרית בחוות אורגניות הפזורות באזור. </div>
  </div>
</div>

  </div>

  <div class="col-sm-4" >
  <div class="container">
  <img src="../Images/roshPina2.PNG" alt="roshPina1" class="image"/>
  <div class="overlay">
    <div class="text">במרחק קצרצר מצימר בקתות טליה מחכים לכם בתי קפה אינטימיים לשעות היום ופאבים וברים לבילוי לילי. לפניכם - רשימת בתי קפה ופאבים מומלצים.</div>
  </div>
</div>

  </div>

  <div class="col-sm-4" >
  <div class="container">
  <img src="../Images/roshPina1.PNG" alt="roshPina1" class="image"/>
  <div class="overlay">
    <div class="text">ראש פינה, בירת התיירות של הגליל העליון, מציעה לנופשים מגוון רב של בתי אוכל. לחצו למסעדות מומלצות עבור אורחי צימר בקתות טליה</div>
  </div>
</div>

  </div>

   </div>
 </div>
</div><br>






<div class="container-fluid bg-3 text-center">    

  <div class="row" style="background-color: rgba(171, 140, 140, 1) !important">
  <div class="col-sm-12">
    <h2 class="JumbotronTitle">  המלצות לטיולים בראש פינה והסביבה </h2> <br><br>   
    </div>
  
    <div class="col-sm-4"> 
    
     <div onClick="document.location='Attraction.php#Trips';">
    <button class="RestaurntPage2"><img src="../Images/tour-guide.png" style="height:72px; width:72px;">טיולים ברמת הגולן</button>
    </div>
    </div>
    <div class="col-sm-4"> 
   
   <div  onClick="document.location='Attraction.php#Gallery';">
 <button  class="RestaurntPage2"><img src="../Images/gallery.png" style="height:72px; width:72px;">גלריות באתר השחזור</button>
 </div>
 </div>
    <div class="col-sm-4">
     <div  onClick="document.location='Attraction.php#site';">
    <button class="RestaurntPage2"><img src="../Images/hall.png" style="height:72px; width:72px;">אתר השחזור</button>
    </div> </div>
    <div class="col-sm-4" >
  <div class="container">
  <img src="../Images/roshPina6.PNG" alt="roshPina1" class="image"/>
  <div class="overlay">
    <div class="text">רמת הגולן שופעת פינות חמד יפיפיות ומסלולי טיול בין מרחבי הטבע בפראיים

</div>
  </div>
</div>

  </div>

  <div class="col-sm-4" >
  <div class="container">
  <img src="../Images/roshPina5.PNG" alt="roshPina1" class="image"/>
  <div class="overlay">
    <div class="text">הזדמנות נהדרת לרכוש מתנות ופרטי נוי מרהיבים ביופיים, פרי יצירתם של אמנים מקומיים</div>
  </div>
</div>

  </div>

  <div class="col-sm-4" >
  <div class="container">
  <img src="../Images/roshPina4.PNG" alt="roshPina1" class="image"/>
  <div class="overlay">
    <div class="text">אתר השחזור המפורסם של ראש פינה חושף בפני המטיילים את ההיסטוריה המרתקת של העיירה 

</div>
  </div>
</div>
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
