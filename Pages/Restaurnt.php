<!DOCTYPE html>
<html lang="en">
<head>
<title>  מסעדות בראש פינה| סוויטות אירוח ומרכז ספא| צימר בצפון|צימרים בראש פינה</title>
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
    <h2 class="JumbotronTitle">חוויה קולינרית </h2>    
    <p class="JumbotronTXT">חופשה בצימר בקתות טליה הינה הזדמנות נהדרת לחוויה קולינרית. בראש פינה ובסביבה מחכים לכם מסעדות גורמה, מרכזי יין, חוות אורגניות ומעדניות גליליות. לכם נשאר רק לבחור </p>
    
    </div>
    <div class="col-sm-7"> 
    <img  src="../Images/restaurant.png" class="JumbotronIMG" alt="jumbotronImg" style="height:350px;"/> 
  </div>
</div>
</div><br>




<div class="container-fluid bg-3 text-center">    

  <div class="row" style="background-color: #D8EDDF !important;">
  <div class="col-sm-12">
    <h2 class="JumbotronTitle">בחרו בסוג החוויה </h2> <br><br>   
    </div>
  
    
 
    <div class="col-sm-4"> 
    
     <a href="#wines">
    <button class="RestaurntPage"><img src="../Images/wine.png" style="height:82px; width:82px;">גבינות ויקבי יין</button>
    </a>
    </div>
    <div class="col-sm-4"> 
   
   <a href="#pubs" >
 <button  class="RestaurntPage"><img src="../Images/beer.png" style="height:82px; width:82px;">פאבים, ברים ובתי קפה</button>
 </a>
 </div>
    <div class="col-sm-4">
     <a href="#restaurnt">
    <button class="RestaurntPage"><img src="../Images/eat.png" style="height:82px; width:82px;">מסעדות בראש פינה</button>
    </a> </div>
    </div>
  </div>
</div><br>





<div class="container-fluid bg-3 text-center">    
  <div class="row">
    <div class="col-sm-12 page_title_restaurnt" id="restaurnt" >
    <h3 class="welcome">מסעדות מומלצות בראש פינה </h3><br>
    </div>
    
  </div>
</div><br>



<div class="container-fluid bg-3 text-right ">    
  
  <div class="row ul_Restaurant">
    <div class="col-sm-8 spa_Treatment ">
    <ul class="ul RestaurntPageSmall" >
    <li >שם: דוריס קצבים</li>
    <li >סוג: בשרים</li>
    <li >האם המקום כשר: לא</li>
    <li >מיקום: ראש פינה כביש ראשי 1 </li>
    <li >טלפון:04-6801313</li>
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
    <li >שם: עמבורגר</li>
    <li >סוג: בשרים</li>
    <li >האם המקום כשר: כן</li>
    <li >מיקום: ראש פינה, מרכז קניות סנטר הגליל </li>
    <li >טלפון:04-680-1592</li>
    <ul>
    </div>
    <div class="col-sm-4" > 
    <img  src="https://files.mishloha.co.il/files/menu_food_pic/FIL_6343189_637012148199839731.jpg" 
    class="JumbotronIMG img_Restaurant2 img_Restaurant" alt="Massage" /> 
  </div>
</div>
</div><br>


<div class="container-fluid bg-3 text-right ">    
<div class="row ul_Restaurant">
    <div class="col-sm-8 spa_Treatment ">
    <ul class="ul RestaurntPageSmall" >
    <li >שם: מיטבלים</li>
    <li >סוג: צמחוני, דגים, בשרים</li>
    <li >האם המקום כשר: כן</li>
    <li >מיקום: ראש פינה, רח' הגליל 1 </li>
    <li >טלפון: 04-6860107</li>
    <ul>
    </div>
    <div class="col-sm-4 " > 
    <img  src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcS3jHqexk8ERA5Yt8HVLuMM6xHiD_7HOPAjm2Bgv_fZWGop_w8F&usqp=CAU" 
    class="JumbotronIMG img_Restaurant" alt="Massage" /> 
  </div>
</div>
</div><br>

<div class="container-fluid bg-3 text-right ">    
<div class="row ul_Restaurant">
    <div class="col-sm-8 spa_Treatment ">
    <ul class="ul RestaurntPageSmall" >
    <li >שם: אחוזת שלומית</li>
    <li >סוג:  דגים, בשרים</li>
    <li >האם המקום כשר: לא</li>
    <li >מיקום: ראש פינה, דוד שו"ב 34 </li>
    <li >טלפון: 04-6931485</li>
    <ul>
    </div>
    <div class="col-sm-4 " > 
    <img  src="https://media-cdn.tripadvisor.com/media/photo-s/07/9d/0e/09/auberge-shulamit.jpg" 
    class="JumbotronIMG img_Restaurant" alt="Massage" /> 
  </div>
</div>
</div><br>

<div class="container-fluid bg-3 text-right ">    
<div class="row ul_Restaurant">
    <div class="col-sm-8 spa_Treatment ">
    <ul class="ul RestaurntPageSmall" >
    <li >שם: טיבי'ס</li>
    <li >סוג: מסעדת שף</li>
    <li >האם המקום כשר: לא</li>
    <li >מיקום: חוות וורד הגליל </li>
    <li >טלפון: 04-6935785</li>
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
    <li >שם: פלומרי 29 - Plomari</li>
    <li >סוג: טברנה יוונית, מאזטים</li>
    <li >האם המקום כשר: לא</li>
    <li >מיקום: ראש פינה, חאן ראש פינה </li>
    <li >טלפון: 04-6060166</li>
    <ul>
    </div>
    <div class="col-sm-4" > 
    <img  src="https://commondatastorage.googleapis.com/easy/images/UserThumbs/26555455_1553592611023.jpg" 
    class="JumbotronIMG img_Restaurant" alt="Massage" /> 
  </div>
</div>
</div><br>

<div class="container-fluid bg-3 text-right ">    
<div class="row ul_Restaurant">
    <div class="col-sm-8 spa_Treatment ">
    <ul class="ul RestaurntPageSmall" >
    <li >שם: שירי ביסטרו</li>
    <li >סוג: מסעדת שף צרפתית</li>
    <li >האם המקום כשר: לא</li>
    <li >מיקום: ראש פינה, רח' החלוצים 8 </li>
    <li >טלפון: 04-6936582</li>
    <ul>
    </div>
    <div class="col-sm-4 " > 
    <img  src="https://lh3.googleusercontent.com/p/AF1QipPMBSNyw9caOBO4CtNPSjMFqVbHYgvJERN8UOyW=s1600-w1280-h1280" 
    class="JumbotronIMG img_Restaurant" alt="Massage" /> 
  </div>
</div>
</div><br>

<div class="container-fluid bg-3 text-center">    
  <div class="row">
    <div class="col-sm-12 page_title_restaurnt" id="pubs" >
    <h3 class="welcome">פאבים, ברים ובתי קפה בראש פינה </h3><br>
    </div>
    
  </div>
</div><br>

<div class="container-fluid bg-3 text-right ">    
<div class="row ul_Restaurant">
    <div class="col-sm-8 spa_Treatment ">
    <ul class="ul RestaurntPageSmall" >
    <li >שם: שוקולטה </li>
    <li >סוג: בית קפה מסעדה חלבית</li>
    <li >מיקום: ראש פינה, רח' הראשונים, אתר השחזור  </li>
    <li >טלפון: 04-6860219</li>
    <ul>
    </div>
    <div class="col-sm-4 " > 
    <img  src="https://static.wixstatic.com/media/280906_3a6525cd7102417a8beaeb25c1ad5b4e~mv2.jpg/v1/fill/w_532,h_450,al_c,q_80,usm_0.66_1.00_0.01/280906_3a6525cd7102417a8beaeb25c1ad5b4e~mv2.webp" 
    class="JumbotronIMG img_Restaurant" alt="Massage" /> 
  </div>
</div>
</div><br>

<div class="container-fluid bg-3 text-right ">    
<div class="row ul_Restaurant">
    <div class="col-sm-8 spa_Treatment ">
    <ul class="ul RestaurntPageSmall" >
    <li >שם: טנג׳רין בר</li>
    <li >סוג: פאב, בר אלכוהולי</li>
    <li > מיקום: ראש פינה, הבולבאר </li>
    <li >טלפון: 054-4776361</li>
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
    <li >שם: יענק'לה בר</li>
    <li >סוג: בר אלכוהולי</li>
    <li >מיקום: ראש פינה </li>
    <li >טלפון:050-6334520</li>
    <ul>
    </div>
    <div class="col-sm-4" > 
    <img  src="https://commondatastorage.googleapis.com/easy/images/UserThumbs/10010916_1518411254477.jpg" 
    class="JumbotronIMG img_Restaurant" alt="Massage" /> 
  </div>
</div>
</div><br>

<div class="container-fluid bg-3 text-right ">    
<div class="row ul_Restaurant">
    <div class="col-sm-8 spa_Treatment ">
    <ul class="ul RestaurntPageSmall" >
    <li >שם: רנה</li>
    <li >סוג: קפה בר אלכוהולי</li>
    <li >מיקום: ראש פינה, דרך הגליל 11 </li>
    <li >טלפון: 04-6860834</li>
    <ul>
    </div>
    <div class="col-sm-4 " > 
    <img  src="https://commondatastorage.googleapis.com/easy/images/PICS/5195989.jpg" 
    class="JumbotronIMG img_Restaurant" alt="Massage" /> 
  </div>
</div>
</div><br>


<div class="container-fluid bg-3 text-center">    
  <div class="row">
    <div class="col-sm-12 page_title_restaurnt" id="wines" >
    <h3 class="welcome">גבינות, מעדניות ויין </h3><br>
    </div>
    
  </div>
</div><br>

<div class="container-fluid bg-3 text-right ">    
<div class="row ul_Restaurant">
    <div class="col-sm-8 spa_Treatment ">
    <ul class="ul RestaurntPageSmall" >
    <li >שם: יקב פלטר</li>
    <li >סוג:יקב בוטיק</li>
    <li >מיקום: קיבוץ עין זיוון, רמת הגולן </li>
    <li >טלפון: 054-2486663</li>
    <ul>
    </div>
    <div class="col-sm-4 " > 
    <img  src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcTRx3WZ-q5GhMuJ1dATIALj_AXmDhNIskgBNzxdDlacxHyXvhKR&usqp=CAU" 
    class="JumbotronIMG img_Restaurant" alt="Massage" /> 
  </div>
</div>
</div><br>

<div class="container-fluid bg-3 text-right ">    
<div class="row ul_Restaurant">
    <div class="col-sm-8 spa_Treatment ">
    <ul class="ul RestaurntPageSmall" >
    <li >שם: עין כמונים</li>
    <li >סוג: גבינות, גלידות, ארוחות בוקר</li>
    <li >מיקום:  עין כמונים, משק חקלאי </li>
    <li >טלפון: 04-6989894</li>
    <ul>
    </div>
    <div class="col-sm-4 " > 
    <img  src="https://img.wcdn.co.il/f_auto,w_1200,t_54/2/6/0/4/2604763-46.jpg" 
    class="JumbotronIMG img_Restaurant" alt="Massage" /> 
  </div>
</div>
</div><br>

<div class="container-fluid bg-3 text-right ">    
<div class="row ul_Restaurant">
    <div class="col-sm-8 spa_Treatment ">
    <ul class="ul RestaurntPageSmall" >
    <li >שם: מחלבת חלב ויקב אדיר</li>
    <li >סוג: יקב, גבינות ויוגורט </li>
    <li >מיקום:  אזור התעשייה דלתון </li>
    <li >טלפון: 04-6991039</li>
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
    <li >שם: פתפותים</li>
    <li >סוג: מאפיית כוסמין  </li>
    <li >מיקום: ראש פינה, דרך הגליל 46 </li>
    <li >טלפון: 050-7411940</li>
    <ul>
    </div>
    <div class="col-sm-4 " > 
    <img  src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcS0kulXu1ByIxWmXr-eb_dwBW6UxS0v-QR8JWUsgy35bwzDoV2f&usqp=CAU" 
    class="JumbotronIMG img_Restaurant" alt="Massage" /> 
  </div>
</div>
</div><br>

<div class="container-fluid bg-3 text-right ">    
<div class="row ul_Restaurant">
    <div class="col-sm-8 spa_Treatment ">
    <ul class="ul RestaurntPageSmall" >
    <li >שם: הבאר - גלריה לאומנות וטעמים</li>
    <li >סוג: מעדניה בוטיק של ליקרים, ריבות ורטבים ובית לתערוכות אמנות מתחלפות</li>
    <li >מיקום: ראש פינה,אתר השחזור  </li>
    <li >טלפון: 052-6930349</li>
    <ul>
    </div>
    <div class="col-sm-4 " > 
    <img  src="https://www.roshpina.org.il/wp-content/uploads/2015/02/%D7%92%D7%9C%D7%A8%D7%99%D7%95%D7%AA_%D7%91%D7%90%D7%AA%D7%A8_%D7%94%D7%A9%D7%99%D7%97%D7%96%D7%95%D7%A8_2013_021.jpg" 
    class="JumbotronIMG img_Restaurant" alt="Massage" /> 
  </div>
</div>
</div><br>

<div class="container-fluid bg-3 text-right ">    
<div class="row ul_Restaurant">
    <div class="col-sm-8 spa_Treatment ">
    <ul class="ul RestaurntPageSmall" >
    <li >שם: דה קרינה</li>
    <li >סוג: מפעל שוקולד בוטיק  </li>
    <li >מיקום: קיבוץ עין זיוון, רמת הגולן </li>
    <li >טלפון: 04-6993622</li>
    <ul>
    </div>
    <div class="col-sm-4 " > 
    <img  src="https://kosheronly.net/wp-content/uploads/2017/04/100747_3-e1492431978997.jpg" 
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
