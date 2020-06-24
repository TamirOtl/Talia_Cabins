<!DOCTYPE html>
<html lang="en">
<head>
<title>  טיולים בראש פינה| סוויטות אירוח ומרכז ספא| צימר בצפון|צימרים בראש </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="../Images/logo.png" type="image/png" sizes="16x16">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
    <div class="col-sm-5">
    <h2 class="JumbotronTitle">טיולים בראש פינה וברמת הגולן </h2>    
    <p class="JumbotronTXT">ההסטוריה, האמנות, המוזיקה והטבע - כל אלה משתלבים יחד במושבה ציורית ראש פינה. במרחק דקות נסיעה מצימר בקתות טליה מחכה לכם עולם עשיר, מלא צבע, רומנטיקה וסיפורים.<br><br>ואם מתחשק לכם לשלב בחופשה שלכם טיול בטבע פראי - מרחבי רמת הגולן מחכים לכם...

</p>
    
    </div>
    <div class="col-sm-7"> 
    <img  src="https://www.tiuli.com/image/caef25a58cbb3a178ecd8d91c678d958.jpg?&width=546&height=400" class="JumbotronIMG" alt="jumbotronImg" style="height:350px;"/> 
  </div>
</div>
</div><br>




<div class="container-fluid bg-3 text-center">    

  <div class="row" style="background-color: #D8EDDF !important;">
  <div class="col-sm-12">
    <h2 class="JumbotronTitle">בחרו בסוג הטיול </h2> <br><br>   
    </div>
  
    
 
    <div class="col-sm-4"> 
    
     <a href="#Trips">
    <button class="RestaurntPage"><img src="../Images/tour-guide.png" style="height:72px; width:72px;">טיולים ברמת הגולן</button>
    </a>
    </div>
    <div class="col-sm-4"> 
   
   <a href="#Gallery" >
 <button  class="RestaurntPage"><img src="../Images/gallery.png" style="height:72px; width:72px;">גלריות באתר השחזור</button>
 </a>
 </div>
    <div class="col-sm-4">
     <a href="#site">
    <button class="RestaurntPage"><img src="../Images/hall.png" style="height:72px; width:72px;">אתר השחזור</button>
    </a> </div>
    </div>
  </div>
</div><br>





<div class="container-fluid bg-3 text-center">    
  <div class="row">
    <div class="col-sm-12 page_title_restaurnt" id="site" >
    <h3 class="welcome">אתר השחזור - תרבות והיסטוריה </h3><br>
    </div>
    
  </div>
</div><br>



<div class="container-fluid bg-3 text-right ">    
  
  <div class="row ul_Restaurant">
    <div class="col-sm-8 spa_Treatment ">
    <ul class="ul RestaurntPageSmall" >
    <li >שם: מיצג אור קולי</li>
    <li >סוג: תערוכה</li>
    <li >תיאור: מבנה משוחזר אשר שימש את ברון רוטשילט במאה ה-19 וכיום מתקיים בו מיצג או קולי</li>
    <li >טלפון:  04-6936913</li>
</ul>
    
    </div>
    <div class="col-sm-4"> 
    <img  src="data:image/jpeg;base64,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"
    class="JumbotronIMG img_Restaurant" alt="Massage" />  
  </div>
</div>
</div><br>




<div class="container-fluid bg-3 text-right ">    
<div class="row ul_Restaurant">
    <div class="col-sm-8 spa_Treatment ">
    <ul class="ul RestaurntPageSmall" >
    <li >שם: סיור וירטואלי בבית פרופסור מר</li>
    <li >סוג: תערוכה</li>
    <li >תיאור: לחובבי ההיסטוריה - תערוכה המספרת על קורותיו של פרופסור מר ועל תהליך התמודדות של המתיישבים עם מחלת המלריה</li>
    <li >טלפון:04-6936913</li>
    <ul>
    </div>
    <div class="col-sm-4" > 
    <img  src="https://sites.google.com/site/pninabateva/_/rsrc/1430735253211/profesor-mer-1/%D7%AA%D7%9E%D7%95%D7%A0%D7%945.jpg" 
    class="JumbotronIMG img_Restaurant2 img_Restaurant" alt="Massage" /> 
  </div>
</div>
</div><br>


<div class="container-fluid bg-3 text-right ">    
<div class="row ul_Restaurant">
    <div class="col-sm-8 spa_Treatment ">
    <ul class="ul RestaurntPageSmall" >
    <li >שם: גן הברון</li>
    <li >סוג: טיול בטבע </li>
    <li >תיאור: גן עתיק, מרהיב ביופיו, אשר הוקם בשנת 1886, המקום המושלם לטיול רומנטי</li>
    <ul>
    </div>
    <div class="col-sm-4 " > 
    <img  src="https://www.roshpina.org.il/wp-content/uploads/2015/02/PC2dDSC5f2964.90144752.jpg" 
    class="JumbotronIMG img_Restaurant" alt="Massage" /> 
  </div>
</div>
</div><br>



<div class="container-fluid bg-3 text-center">    
  <div class="row">
    <div class="col-sm-12 page_title_restaurnt" id="Gallery" >
    <h3 class="welcome">אתר השחזור - גלריות </h3><br>
    </div>
    
  </div>
</div><br>

<div class="container-fluid bg-3 text-right ">    
<div class="row ul_Restaurant">
    <div class="col-sm-8 spa_Treatment ">
    <ul class="ul RestaurntPageSmall" >
    <li >שם: גלריה לקרמיקה שימושית </li>
    <li >סוג: חנות בוטיק וגלריה לקרמיקה</li>
    <li > תיאור: כלי קרמיקה שימושיים להגשה, לאפייה ולנוי</li>
    <li >טלפון: 054-4416789</li>
    <ul>
    </div>
    <div class="col-sm-4 " > 
    <img  src="https://www.roshpina.org.il/wp-content/uploads/2015/02/%D7%92%D7%9C%D7%A8%D7%99%D7%95%D7%AA_%D7%91%D7%90%D7%AA%D7%A8_%D7%94%D7%A9%D7%99%D7%97%D7%96%D7%95%D7%A8_2013_124.jpg" 
    class="JumbotronIMG img_Restaurant" alt="Massage" /> 
  </div>
</div>
</div><br>

<div class="container-fluid bg-3 text-right ">    
<div class="row ul_Restaurant">
    <div class="col-sm-8 spa_Treatment ">
    <ul class="ul RestaurntPageSmall" >
    <li >שם: גלריית ענבר</li>
    <li >סוג: סדנא וגלריה לקרמיקה</li>
    <li > תיאור: כלי קרמיקה ייחודיים בעבודת יד</li>
    <li >052-3406218</li>
    <ul>
    </div>
    <div class="col-sm-4 " > 
    <img  src="data:image/jpeg;base64,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" 
    class="JumbotronIMG img_Restaurant" alt="Massage" /> 
  </div>
</div>
</div><br>




<div class="container-fluid bg-3 text-right ">    
<div class="row ul_Restaurant">
    <div class="col-sm-8 spa_Treatment ">
    <ul class="ul RestaurntPageSmall" >
    <li >שם: גלריה גרשון </li>
    <li >סוג:  חנות בוטיק וגלריית אמנות </li>
    <li >תיאור: גלריית אמנות מעוררת השראה המציגה ציורים של אמן גרשון מלניקוב </li>
    <li >טלפון:054-6437338</li>
    <ul>
    </div>
    <div class="col-sm-4" > 
    <img  src="https://www.roshpina.org.il/wp-content/uploads/2015/02/%D7%92%D7%9C%D7%A8%D7%99%D7%95%D7%AA_%D7%91%D7%90%D7%AA%D7%A8_%D7%94%D7%A9%D7%99%D7%97%D7%96%D7%95%D7%A8_2013_147.jpg" 
    class="JumbotronIMG img_Restaurant" alt="Massage" /> 
  </div>
</div>
</div><br>

<div class="container-fluid bg-3 text-right ">    
<div class="row ul_Restaurant">
    <div class="col-sm-8 spa_Treatment ">
    <ul class="ul RestaurntPageSmall" >
    <li >שם: גלרייה של רועי אבגי אומן צורפות</li>
    <li >סוג:  חנות בוטיק וגלריית צורפות</li>
    <li >תכשיטים ייחודיים עשויים מזהב עם שיבוצי אבני חן ויהלומים  </li>
    <li >טלפון: 050-7434051</li>
    <ul>
    </div>
    <div class="col-sm-4 " > 
    <img  src="data:image/jpeg;base64,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" 
    class="JumbotronIMG img_Restaurant" alt="Massage" /> 
  </div>
</div>
</div><br>


<div class="container-fluid bg-3 text-right ">    
<div class="row ul_Restaurant">
    <div class="col-sm-8 spa_Treatment ">
    <ul class="ul RestaurntPageSmall" >
    <li >שם: גלרייה בדבדים  </li>
    <li >סוג: חנות בוטיק וגלריית בדים ותכשיטים  </li>
    <li >תיאור: עיצוב בדים, פרטי ביגוד, צעיפים, אביזרי שיער, תכשיטים ועוד</li>
    <li >טלפון:052-3778154</li>
    <ul>
    </div>
    <div class="col-sm-4" > 
    <img  src="data:image/jpeg;base64,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" 
    class="JumbotronIMG img_Restaurant" alt="Massage" /> 
  </div>
</div>
</div><br>


<div class="container-fluid bg-3 text-right ">    
<div class="row ul_Restaurant">
    <div class="col-sm-8 spa_Treatment ">
    <ul class="ul RestaurntPageSmall" >
    <li >שם: נגה הררי אורן  </li>
    <li >סוג: גלריית פיסול ועבודת אובניים </li>
    <li >תיאור: מתנות ייחודיות, כלי נוי, פריטים דקורטיביים, כלים שימושיים  </li>
    <li >טלפון:054-7602888</li>
    <ul>
    </div>
    <div class="col-sm-4" > 
    <img  src="data:image/jpeg;base64,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" 
    class="JumbotronIMG img_Restaurant" alt="Massage" /> 
  </div>
</div>
</div><br>




<div class="container-fluid bg-3 text-right ">    
<div class="row ul_Restaurant">
    <div class="col-sm-8 spa_Treatment ">
    <ul class="ul RestaurntPageSmall" >
    <li >שם: גלרייה הצבע שבאור  </li>
    <li >סוג:  חנות בוטיק וגלריית אמנות    </li>
    <li >תיאור: אהילים בעבודת יד מנייר ועיסת נייר ממוחזר </li>
    <li >טלפון: 054-7602888</li>
    <ul>
    </div>
    <div class="col-sm-4" > 
    <img  src="data:image/jpeg;base64,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" 
    class="JumbotronIMG img_Restaurant" alt="Massage" /> 
  </div>
</div>
</div><br>


<div class="container-fluid bg-3 text-center">    
  <div class="row">
    <div class="col-sm-12 page_title_restaurnt" id="Trips" >
    <h3 class="welcome">טיולים מומלצים ברמת הגולן </h3><br>
    </div>
    
  </div>
</div><br>

<div class="container-fluid bg-3 text-right ">    
<div class="row ul_Restaurant">
    <div class="col-sm-8 spa_Treatment ">
    <ul class="ul RestaurntPageSmall" >
    <li >שם: הר בנטל    </li>
    <li >סוג:  מסלול טיול, אתר ארכאולוגי, אתר מורשת       </li>
    <li >תיאור:  הר געש רדום הממוקם בצפון -מזרח רמת הגולן, המהווה אחד אתרי התיירות, הטבע וההיסטוריה המרתקים ביותר בישראל</li>
    <ul>
    </div>
    <div class="col-sm-4" > 
    <img  src="https://upload.wikimedia.org/wikipedia/commons/5/5a/Bental_mountain.JPG" 
    class="JumbotronIMG img_Restaurant" alt="Massage" /> 
  </div>
</div>
</div><br>

<div class="container-fluid bg-3 text-right ">    
<div class="row ul_Restaurant">
    <div class="col-sm-8 spa_Treatment ">
    <ul class="ul RestaurntPageSmall" >
    <li >שם: שמורת טבע תל דן </li>
    <li >סוג: מסלול טיול  </li>
    <li >מיקום: שמורת הטבע, בין היפות והמגוונות ביותר בישראל, המכילה שני אזורי תיירות - נחל דן ותל דן</li>
    <ul>
    </div>
    <div class="col-sm-4 " > 
    <img  src="https://i.ytimg.com/vi/SdiF2d8FrHE/maxresdefault.jpg" 
    class="JumbotronIMG img_Restaurant" alt="Massage" /> 
  </div>
</div>
</div><br>

<div class="container-fluid bg-3 text-right ">    
<div class="row ul_Restaurant">
    <div class="col-sm-8 spa_Treatment ">
    <ul class="ul RestaurntPageSmall" >
    <li >שם:  נחל עיון ומפל התנור  </li>
    <li >סוג: מסלול טיול  </li>
    <li >מיקום: שמורת טבע יחידה במינה בישראל הכוללת ארבעה מפלים יפיפיים</li>
    <ul>
    </div>
    <div class="col-sm-4 " > 
    <img  src="https://static.parks.org.il/wp-content/uploads/2017/08/DSC_9130.jpg" 
    class="JumbotronIMG img_Restaurant" alt="Massage" /> 
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
