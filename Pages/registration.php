<?php

function add_usersdetails($LN,$FN,$BOD,$email,$marrige,$Telephone){
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
  
  $sql = "INSERT INTO usersdetails (LastName,FirstName,BirthDAY,email,Marrige,Telephone)
  VALUES ('$LN','$FN','$BOD','$email','$marrige','$Telephone')";

 if ($conn->query($sql) === TRUE) {
  echo "";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
}

function add_users($User,$pass){
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "taliacabin";
  
  // Create connection
  $conn = new mysqli($servername, $username, "", $dbname);
  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  $pass=md5($pass);
  $sql = "INSERT INTO users (UserName,Password)
  VALUES ('$User','$pass')";

 if ($conn->query($sql) === TRUE) {
  echo "";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
}

function CheckMail($email){
  
  $conn = new mysqli("localhost","root","", "taliacabin");
 
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  $sql="SELECT COUNT(email) FROM usersdetails where email='.$email.'";
  $result = $conn->query($sql);
  
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
   echo '<script>
    document.getElementById("email").style.border = "2px solid red";
    document.getElementById("emailvalidERROR").innerHTML = "כתובת מייל רשומה"; 
    var BTN=true;
    '.$row['COUNT(email)'].'</script>';
   
   
  }
} 
$conn->close();
}


if(isset($_POST['send'])){
  $LN=$_POST['LN'];
  $FN=$_POST['FN'];
  $BOD=$_POST['BOD'];
  $email=$_POST['email'];
  $marrige=$_POST['Marrige'];
  $Telephone=$_POST['TEL'];
  $User=$_POST['user'];
  $password=$_POST['pwd'];


  add_usersdetails($LN,$FN,$BOD,$email,$marrige,$Telephone);
  add_users($User,$password);
 header("Location:confirm.php");
  }
  

?>
<!DOCTYPE html>
<html lang="en">
<head >
<title> הרשמה | סוויטות אירוח ומרכז ספא| צימר בצפון|צימרים בראש פינה</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="../Images/logo.png" type="image/png" sizes="16x16">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="../JavaScript/script.js" type='text/javascript'></script>
  <link rel="stylesheet" type="text/css" href="../css/style.css">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <script src='https://kit.fontawesome.com/a076d05399.js'></script>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
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
<script>
$(document).ready(function(){
	$('.launch-modal').click(function(){
		$('#myModal').modal({
			backdrop: 'static'
		});
	}); 
});
</script>
</head>
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
<body style="text-align:right; direction:rtl;">

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
          echo"<script>location.href='../Index.php'</script>";
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
       <form method="post" action="registration.php" >
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
        <a  href="registration.php">
       להצטרפות למועדון לחץ כאן
         </a>
      </div>
        </div>
      </div>
      
    </div>
  </div>
</div>


<div class="container-fluid bg-3 text-center ">    
  
  <div class="row ">
    <div class="col-sm-12 registration">
    <h1 >הרשמה למועדון הלקוחות</h1>    
    <p >
    שלום רב, אנו שמחים להזמינך להצטרף למועדון החברים של בקתות טליה. ההרגשה של להיות "אורח מועדף", התחושה הנעימה של להיות מכובד ורצוי, והפינוקים שיש רק לך ואין לאחרים.
    </p>
    <h4 ><b>ההטבות לחברי מועדון:</b></h4>
    <ul>
    <li >הנחה בת 10% על האירוח בצימרים ועל חבילות הפינוק (מהמחיר המלא התקף באותה עת) בכל עונה, החל מחופשתך השנייה.</li>
    <li >הנחה בת 10% על כל הטיפולים בספא (מהמחיר המלא התקף באותה עת)</li>
    <li >הנחה בת 10% על כל החבילות בספא (מהמחיר המלא התקף באותה עת) בכל עונה, החל מחופשתך השנייה.</li>
    <ul>
    <h4 ><b>חוגגים יום הולדת ? יום נישואין ? נשמח לפנק אתכם ולעונג לנו להציע לכם את ההטבות הבאות:
</b></h4>
<ul >
    <li >הנחה בת 15% על האירוח בצימר ועל חבילות הפינוק (מהמחיר המלא התקף באותה עת) בכל עונה.</li>
    <li >הנחה זהה בת 15% על האירוח בצימרים לחבריכם (עד 3 זוגות) אשר יצטרפו אליכם</li>
    <li >הנחה בת 15% על חבילות הספא (מהמחיר המלא התקף באותה עת) בכל עונה.</li>
    <li >נחה זהה בת 15% על חבילות ספא לחבריכם אשר יצטרפו אליכם, (עד 3 זוגות)</li>
    <ul>
    <h4 ><b>תנאים כלליים להצטרפות למועדון:
</b></h4>
<ul >
    <li >על הנחות אלו לא יחולו הנחות נוספות</li>
    <li >יש להודיע בזמן ההזמנה שאתם חברי מועדון.</li>
    <li >ההטבות הינן אישיות ואינן ניתנות להעברה</li>
    <li >הטבות יום הולדת/נישואין אינה תקפה במסגרת מבצעים מיוחדים.</li>
    <li >הטבות יום הולדת/נישואין ניתנות למימוש שבוע לפני ושבועיים אחרי תאריך יום ההולדת/נישואין</li>
    <li >ההנחות וההטבות לחברים המצטרפים לחגיגת יום הולדת ו/או נישואין יינתנו לשוהים בצימרים או בספא שלנו באותם התאריכים בהם שוהה חבר המועדון.</li>
    <li >זמן חלום רשאים למנוע כפל הטבות והנחות.</li>
    <li >זמן חלום שומרים לעצמם את הזכות לשנות את ההטבות ותנאי המועדון ללא כל הודעה מוקדמת.</li>
    <li >זמן חלום יהיו רשאים לבטל חברות של חבר במועדון אשר לא ינהג בהתאם לכללי ההתנהגות המקובלים בזמן חלום.</li>
    <li >הטבות נוספות, בלעדי לחברי המועדון יפורסמו מעת – לעת באתר זה</li>
    <ul>
    </div>
   
</div>
</div><br>
<script>
$(function() {
  $("#BOD").datepicker(
    {
      minDate: new Date(1900,1-1,1), maxDate: '-18Y',
      dateFormat: 'dd-mm-yy',
      changeMonth: true,
      changeYear: true,
      yearRange: '-110:-18',
      isRTL:true
      
    }
  );                    
});

$( function() {
  $( "#Marrige" ).datepicker({ dateFormat: 'dd-mm-yy',changeMonth:true,changeYear:true,yearRange: '1939:'
  ,isRTL:true });
  
} );
</script>
<div class="container-fluid bg-3 text-right ">    
  
  <div class="row ">
    <div class="col-sm-12 registration">
    <h3 >הרשמה למועדון לקוחות</h3>    
    <form method="post" action="registration.php">
    <div class="form-group">
      <label for="LN">שם משפחה:</label><span style='color:red;'>*</span>
      <input type="text" class="form-control" id="LN" name="LN" onkeyup="CheckFN_LN_BOD(this.value)">
      <p style="color:red;" id="LNERROR"></p>  
    </div>
    <div class="form-group">
      <label for="FN">שם פרטי:</label><span style='color:red;'>*</span>
      <input type="text" class="form-control" id="FN" name="FN" onkeyup="CheckFN_LN_BOD(this.value)">
      <p style="color:red;" id="FNERROR"></p>  
    </div>

    <div class="form-group">
      <label for="BOD">תאריך לידה:</label><span style='color:red;'>*</span>
      <input type="text"  class="form-control" id="BOD" name="BOD" onkeyup="CheckFN_LN_BOD(this.value)">
      <p style="color:red;" id="BODERROR"></p> 
    </div>
    
    <div class="form-group">
      <label for="Marrige">יום נישואין:</label>
      <input type="text" class="form-control" id="Marrige" name="Marrige">
    </div>
    <div class="form-group">
      <label for="email">אימייל:</label><span style='color:red;'>*</span>
      <input type="email" class="form-control" id="email" name="email" require  onkeyup="checkEmail(this.value)">
      <?php echo "<p style='color:red; ' id='emailvalidERROR'></p>"?>  
    </div>
    <div class="form-group">
      <label for="TEL">טלפון:</label><span style='color:red;'>*</span>
      <input type="TEL" class="form-control" id="TEL" name="TEL" onkeyup="checkTEL(this.value)">
      <p style="color:red;" id="TelvalidERROR"></p>  
    </div>
    <div class="form-group">
      <label for="user">משתמש:</label><span style='color:red;'>*</span>
      <input type="text" class="form-control" id="user" name="user"  onkeyup="checkUser(this.value)">
      <?php echo "<p style='color:red;' id='USERERROR'></p>"?>   
    </div>

    <div class="form-group">
      <label for="pwd">סיסמה:</label><span style='color:red;'>*</span>
      <input type="password" class="form-control" id="pwd" name="pwd" onkeyup="Checkpass(this.value)"> 
      <p style="color:red;" id="PASSERROR"></p>  
    </div>
    <p><b><a  data-toggle="modal" data-target="#myModal" style="cursor: pointer;">בלחיצה על "הצטרפות" הנני מאשר/ת הצטרפותי למועדון לקוחות בקתות טליה ומאשר/ת את תנאי המועדון ותקנון אתר.</b></a></p>
    <br>
    <button type="submit" id="send" disabled  class="more_inforamtionClick" name="send"  style="float:left;" 
      title="מלא את השדות"
        >הצטרפות</button>
  </form>
    </div>
   
</div>
</div><br>
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog" >
    
      <div class="modal-content" style="width:100%;">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h2 style="text-align:center;">תקנון בקתות טליה</h2>
        </div>
        <div class="modal-body">
        <div class="col-sm-12"> 
        <ul class="modal-title text-right" style="overflow:auto;"> 
        <li>ברוכים הבאים לאתר בקתות טליה. אתר זה מוגש ללקוחותינו, במסגרת מאמצינו לקדם ולייעל את השירות. אנא קראו בתשומת לב תקנון זה מפעם לפעם, שכן עשויים לחול בו שינויים. </li>
        <h5><b>אנא שימו לב כי עצם השימוש באתר מהווה הסכמה בלתי מותנית לתנאי תקנון זה </b></h5>
        <li>כל שאלה ניתן לפנות באמצעות וואטסאפ בטלפון 052-3392535</li>
        <li> מחירי המוצרים שיפורסמו באתר הינם מחירי המוצרים כפי שעודכנו לאחרונה לפני מועד ביקור הלקוח באתר </li>
        </ul>
         </div>      
<br><br>
        </div>
        <div class="modal-footer" style="margin-top:30%;">
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

