<!DOCTYPE html>
<html lang="en">
<head>
  <title> סוויטת אגוז| סוויטות אירוח ומרכז ספא| צימר בצפון|צימרים בראש פינה</title>
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
    <li ><a href="Olive.php">סוויטת זית</a></li>
    <li class="active"><a href="Agoz.php">סוויטת אגוז</a></li>
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
    <h2 class="JumbotronTitle">סוויטה אגוז</h2>    
    <p class="JumbotronTXT">הסוויטה בנויה כחלל גדול ועשוי קורות עץ בגוונים טבעיים וכהים. לצד המיטה ישנו  ג'קוזי ענק צמוד לחלון המשקיף לגינה הפורחת.

בצמוד למרפסת היחידה ישנה  בריכה פרטית גדולה, מחוממת ומקורה המוקפת צמחיה פינת חמד זו מהווה בעצמה חוויה רומנטית מרעננת.

​

בסוויטה תמצאו מערכת קולנוע ביתית עם רמקולים ומסך לד  40  אינצ' הכוללת ערוצי לווין, ניתן להנות ממנה הן מהמיטה הרומנטית הענקית (בעלת המזרן האורטופדי האיכותי) והן מפינת הישיבה שבמרכז החדר, פינה יפייפיה בה שולחן עץ וכורסאות מפנקות.

 

לכל זה מצטרפת גם המקלחת המרווחת בעלת ראש הגשם הענק, המאובזרת אף היא בתפנוקים.</p>
    
    </div>
    <div class="col-sm-7"> 
    <img  src="../Images/AGOZCABIN.jpg" class="JumbotronIMG" alt="Agoz1.jpg" style="height:550px;"/> 
  </div>
</div>
</div><br>




<div class="container-fluid bg-3 text-center">    
  <div class="row">
    <div class="col-sm-12">
    <h3 class="welcome">סוויטה אגוז - פרטי האירוח </h3><br>
    </div>
    
  </div>
</div><br>



<div class="container-fluid bg-3 text-right ">    
  
  <div class="row ">
    <div class="col-sm-6 spa_Treatment">
    <ul class="ul" style="height:400px; padding-top:25px;font-size:20px;">
    <li >בריכת שחיה פרטית גדולה מחוממת ומקורה בחורף</li>
    <li >מרפסת גן פרטית</li>
    <li >חלל פתוח, מרווח ומואר</li>
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
    <img  src="../Images/pool.jpg" class="JumbotronIMG" alt="pool.jpg"/> 
  </div>
</div>
</div><br>
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title text-center">סוויטה אגוז - מחירים</h4><br>
          <p>להזמנות יש להתקשר למספר 052-3392535</p>
        </div>
        <div class="modal-body">
        <div class="col-sm-3"> 
        <h5>סופ"ש  2 לילות</h5>
        <p class="modalTXT">2600 ש"ח</p>
         </div>      
        <div class="col-sm-3"> 
        <h5>סופ"ש  לילה</h5>
        <p class="modalTXT">1600 ש"ח</p>
         </div>   
        <div class="col-sm-3"> 
        <h5>אמצ"ש 2 לילות</h5>
        <p class="modalTXT">2100 ש"ח</p>
         </div>   
        <div class="col-sm-3"> 
        <h5>אמצ"ש לילה</h5>
        <p class="modalTXT">1200 ש"ח</p>
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
    <h3 class="welcome">סוויטה אגוז - גלריית תמונות </h3><br>
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
     

    </ol>
    <div class="carousel-inner" role="listbox">

      <div class="item active">
        <img  src="../Images/pool.jpg" alt="pool.jpg" width="100%"  style="height:400px;">
        <div class="carousel-caption">
          <h3>בריכת שחיה פרטית</h3>
          
        </div>
      </div>

    
      <div class="item" >
        <img src="../Images/פנים1.jpg" alt="פנים1.jpg" width="100%" style="height:400px;">
        <div class="carousel-caption">
          <h3>חלוקי הבית, נעלי ספא ומצעי יוקרה</h3>
        </div>
      </div>

      <div class="item">
        <img src="../Images/פנים2.jpg" alt="פנים2.jpg" width="100%"  style="height:400px;">
        <div class="carousel-caption">
          <h3>ג'קוזי ענק בתוך החלל</h3>
        </div>
      </div>
      <div class="item">
        <img src="../Images/בריכה4.jpg" alt="בריכה4.jpg" width="100%"  style="height:400px;">
        <div class="carousel-caption">
          <h3>בריכת שחיה פרטית</h3>
        </div>
      </div>
      <div class="item">
        <img src="../Images/Agoz1.png" alt="Agoz1.png" width="100%"  style="height:400px;">
        <div class="carousel-caption">
          <h3>חלל פתוח, מואר היטב</h3>
        </div>
      </div>
      <div class="item">
        <img src="../Images/פנים22.jpg" alt="פנים22.jpg" width="100%"  style="height:400px;">
        <div class="carousel-caption">
          <h3>שפע של צמחיה בחצר הפרטית</h3>
        </div>
      </div>
      <div class="item">
        <img src="../Images/בריכה3.jpg" alt="בריכה3.jpg" width="100%"  style="height:400px;">
        <div class="carousel-caption">
          <h3>בריכת שחיה מחוממת ומקורה בחורף</h3>
        </div>
      </div>
      <div class="item">
        <img src="../Images/חוץ3.jpg" alt="חוץ3.jpg" width="100%"  style="height:400px;">
        <div class="carousel-caption">
          <h3>סביבה טבעית, מלאה בצמחיה</h3>
        </div>
      </div>
      <div class="item">
        <img src="../Images/בריכה חדש.jpg" alt="בריכה חדש.jpg" width="100%" style="height:400px;" >
        <div class="carousel-caption">
          <h3>בריכת שחיה מחוממת ומקורה בחורף</h3>
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
