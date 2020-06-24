<!DOCTYPE html>
<html lang="en">
<head>
  <title>בקתות טליה| סוויטות אירוח ומרכז ספא| צימר בצפון|צימרים בראש פינה</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="Images/logo.png" type="image/png" sizes="16x16">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="JavaScript/script.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <script src='https://kit.fontawesome.com/a076d05399.js'></script>
  <script>
 fetch('https://api.openweathermap.org/data/2.5/weather?q=Rosh Pina&appid=26b12a44f4c02b6690ba0c54d93b86d5')
.then(response => response.json())
.then(data => {
  var tempValue = data.main.temp;
  var icons = data.weather[0].icon;
  
  document.querySelector('#temp').textContent = Math.floor(Math.round(tempValue-273.15))+"C°";
  var iconurl ='Images/'+data.weather[0].icon+'.png';
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
      <a class="navbar-brand " href="Index.php">בקתות טליה</a>
      
    </div>
    <ul class="nav navbar-nav navbar-right">
    
    <li ><a href="Pages/ContactUs.php">צור קשר</a></li>
    <li ><a href="Pages/recommendation.php">המלצות</a></li>
    <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="RoshPina.php">ראש פינה והסביבה
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="Pages/Restaurnt.php" style="text-align:right;">מסעדות בראש פינה</a></li>
          <li><a href="Pages/Attraction.php" style="text-align:right;">טיולים בראש פינה</a></li>
        </ul>
      </li>
    <li ><a href="Pages/Spa.php">מרכז ספא</a></li>
    <li ><a href="Pages/Olive.php">סוויטת זית</a></li>
    <li><a href="Pages/Agoz.php">סוויטת אגוז</a></li>
    <li ><a href="Pages/Cabin.php">המתחם</a></li>
      
     
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
        <li><a href="Logout.php" style="text-align:right;"class="glyphicon glyphicon-log-in"> התנתק</a></li>
      </ul>
    </li>';
      }
      else{
        $find= UserAndPass($user,$pass);
        if($find==true){
          $_SESSION['user']=$user;
          echo"<script>location.href='Index.php'</script>";
        }
        else{
      
          echo"
            <li><a  style='cursor: pointer;'data-toggle='modal' data-target='#myModal'><img src='Images/user.png' style='height:20px;width:20px;'/>&nbsp כניסת משתמש</a></li>";
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
       <form method="post" action="Index.php" >
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
    <b><a href="Pages/ForgotPassword.php" style="cursor: pointer;decoration:underline;">שכחתי סיסמה</b></a>
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
<div id="TaliaCarousel" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#photo" data-slide-to="0" class="active"></li>
      <li data-target="#photo" data-slide-to="1"></li>
      <li data-target="#photo" data-slide-to="2"></li>
    </ol>

    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <img src="Images/pool.jpg" class="carouselCss" alt="pool" style="height:450px; width:100%;" >     
      </div>

      <div class="item">
        <img src="Images/agoz.jpg" alt="agoz" class="carouselCss" style="height:450px; width:100%;">   
      </div>
    
      <div class="item">
        <img src="Images/olive.jpg" alt="olive" class="carouselCss" style="height:450px; width:100%;">    
      </div>
    </div>

    <a class="left carousel-control" href="#TaliaCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
    <a class="right carousel-control" href="#TaliaCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
</div>

  
<div class="container bg-3 text-center ">    
  <h3 class="welcome">ברוכים הבאים לבקתות טליה </h3><br>
  <div class="row">
    <div class="col-sm-12">
      <p class="welcomeTXT">במושבה הציורית ראש פינה, בסביבה שקטה ופסטורלית, בין שיחים ירוקים ופרחים בשלל צבעים שוכן לו מתחם אירוח  "בקתות טליה" ובו שתי סוויטות עץ מדהימות אגוז וזית וספא בוטיק פרטי.</p>
    </div>
</div><br>
</div>

<div class="container-fluid bg-3 text-center">    

  <div class="row cabin">
    <div class="col-sm-4">
      <img src="Images/spa&cosmetic.PNG" style="width:100%;" class="img-responsive" alt="spa" >
      <p>האורחים מוזמנים להנות ממגוון רחב של טיפולים מקצועיים, עיסויים, רפלקסולוגיה, טיפולי קוסמטיקה, פדיקור, מניקור המייצרים שלווה ורוגע לגוף ולנפש.</p>
     <a href="Pages/Spa.php">
    <button class="more_inforamtion">למידע נוסף</button>
    </a> </div>
    
    <div class="col-sm-4"> 
    <img src="Images/AGOZSweet.PNG" style="width:100%;" class="img-responsive" alt="spa" >
    <p>סוויטה זוגית קסומה, הבנויה בגווני עץ בהירים ומעוצבת בקווים נקיים המשלבים אלמנטים קלסיים ומודרניים. 
      בחצר הפרטית של הסוויטה ממוקם ג'קוזי ספא מקורה.</p>
      <a href="Pages/Olive.php" >
    <button  class="more_inforamtion">למידע נוסף</button>
    </a>
    </div>
    <div class="col-sm-4"> 
    <img src="Images/poolspa.PNG" style="width:100%;" class="img-responsive" alt="spa" >
    <p>סוויטה רומנטית המעוצבת בגווני עץ טבעיים ומשדרת אווירה אינטימית ומקרבת. במתחם הפרטי של הסוויטה ממוקמת בריכת שחיה מבודדת, מחוממת ומקורה.</p>
     <a href="Pages/Agoz.php">
    <button class="more_inforamtion">למידע נוסף</button>
    </a>
    </div>
    </div>
  </div>
</div><br>



<div class="container bg-3 text-center ">    
  <h3 class="welcome">בקתות טליה - נעים להכיר</h3><br>
  <div class="row">
    <div class="col-sm-12">
      <p class="welcomeTXT">הסוויטות הוקמו בכדי להביא את האורחים לרגיעה, באמצעות האווירה הטבעית והעיצוב האינטימי של המקום, העשוי בקווים נקיים ואלגנטיים.
יחודיות המתחם הינה שילוב טיפולים הוליסטיים באירוח, המשלימים את החוויה האיכותית של נופש אחר.</p>
    </div>
</div><br>
</div>






<div class="container-fluid bg-3 text-center">    

  <div class="row cabin">
    <div class="col-sm-2">
    <img src="Images/bed.PNG"   style="width:100%; height:275px;float:right" alt="bed" > </div>
    
    <div class="col-sm-3"> 
    <h2 class="details">השילוב בין טבע, פינוק וריפוי</h2>
     <ul class="li" >
    <li >פרטיות מלאה במתחמים אישיים</li>
    <li >סביבת חוץ מטופחת</li>
    <li >שפע של פינוקים קולינריים</li>
    <li >שירות איכותי, נדיב ולבבי</li>
    <ul>
    </div>
    <div class="col-sm-2"> 
    <img src="Images/roshPina.PNG"    style="width:100%; height:275px;float:right" alt="rosh pina" > </div>
 
   <div class="col-sm-3">
   <h2 class="details">הרבה מעבר לצימר</h2>
     <ul class="li" >
    <li >מרכז ספא מקצועי עם מגוון טיפולי גוף וקוסמטיקה</li>
    <li >שפע של אטרקציות, מסעדות ובתי קפה במרחק נגיעה מהמתחם </li>
    <ul></div>
    <div class="col-sm-2">
    <img src="Images/sauna.png" style="width:100%; height:275px;float:right"  alt="sauna" > </div>
</div>
</div>
</div><br>



<div class="container bg-3 text-center ">    
  <h3 class="welcome">אורחים מספרים</h3><br>
  <div class="row">
    <div class="col-sm-12">
    <a href="Pages/recommendation.php">
    <button class="more_inforamtionClick">להמלצות נוספות  לחץ כאן</button>
    </a>
    
  </div></div>
  <div class="row cabin" style="border:2px solid; ">
    
      <?php
      $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "taliacabin";
      
      $conn = new mysqli($servername, $username, $password, $dbname);
      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }
     
      $sql="SELECT * FROM recommendation LIMIT 3";
      $result = $conn->query($sql);
      $x=0;
      $padding=0;
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        if($x==0){
          $class = '#D8EDDF'; 
          $color="#292929";
          $padding='5%';
          
        }
      
      else if($x == 1 ){
        $class = 'rgba(171, 140, 140, 1)';
        $padding='5%';
        $color="white";
      }
      else if($x == 2 ){
        $class = '#D8EDDF'; 
        $padding='5%';
        $color="#292929";
      }
     
        echo '<div class="col-sm-4 " style="padding-top:'.$padding.'; background-color:'.$class.';">
        <p style="text-align:left;"><i class="fas fa-quote-right" style="font-size:60px; color:#cfcc22;"></i></p>
        <p style="line-height:50px; color:'.$color.';">'.$row['comment'].'</p><br><br>
        <p style="text-align:left; color:'.$color.';">'.$row['name'].'</p>
        </div>';
       $x++;
      }
    } 
    $conn->close();
      ?>
  
    

  
    </div>
    </div>
</div><br>
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
  data-show-facepile="false"></div>

</div>
<div class="col-sm-4">
<br>
<p><a  class="mailto"href="Pages/recommendation.php">המלצות</a></p>
<p><a  class="mailto"href="Pages/Cabin.php">המתחם שלנו</a></p>
<p><a  class="mailto"href="Pages/RoshPina.php">אטרקציות בראש פינה</a></p>
<p><a  class="mailto"href="Pages/ContactUs.php">צור קשר</a></p>
<p><a  class="mailto"href="Pages/Agoz.php">סוויטת אגוז</a></p>
<p><a  class="mailto"href="Pages/Olive.php">סוויטת זית</a></p>
<p><a  class="mailto"href="Pages/Spa.php">מרכז ספא & סטודיו יופי</a></p>
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
