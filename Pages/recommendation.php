<!DOCTYPE html>
<html lang="en">
<head>
<title>  המלצות| סוויטות אירוח ומרכז ספא| צימר בצפון|צימרים בראש פינה</title>
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
/*textera with emoji*/
$(document).ready(function() {
  $(".emoji_act").emojioneArea({
    emojiPlaceholder: ":smile_cat:",
    searchPlaceholder: "Search",
    buttonTitle: "Use your TAB key to insert emoji faster",
    searchPosition: "bottom",
    pickerPosition: "bottom"
  });
});
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
    <li  class="active"><a href="recommendation.php">המלצות</a></li>
    <li class="dropdown">
        <a class="dropdown-toggle " data-toggle="dropdown"   href="RoshPina.php">ראש פינה והסביבה
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="Restaurnt.php" style="text-align:right;">מסעדות בראש פינה</a></li>
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
          echo"<script>location.href='recommendation.php'</script>";
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
       <form method="post" action="recommendation.php" >
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
    <div class="col-sm-12">
    <h2 class="JumbotronTitle">אורחים ממליצים</h2>    

    </div>
</div>
</div><br>
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


function add_feedback($name,$comment){
  $conn = new mysqli("localhost","root","", "taliacabin");
 
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
  $sql = "INSERT INTO recommendation (name,comment)
  VALUES ('$name','$comment')";

 if ($conn->query($sql) === TRUE) {
  echo "<h3 style='color:red; margin-right:5px;'>תגובתך נשמרה</h3>";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
  }
  
if(isset($_POST['send'])){
  $comment=$_POST['comment'];
  $isTouch = empty($_SESSION['user']);
  
	if($isTouch!=1){
    add_feedback($_SESSION['user'],$comment);
  }
  elseif($isTouch==1) {
  
    $name="אנונימי";
    add_feedback($name,$comment);
  } 
  
	

	
  }
  

?>


<link href="https://rawgit.com/mervick/emojionearea/master/dist/emojionearea.css" rel="stylesheet" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script src="https://rawgit.com/mervick/emojionearea/master/dist/emojionearea.js"></script>
<div class="container-fluid bg-3 text-right ">    
<div class="row">
    <div class="col-sm-12  ">
    <form  class="form-group" action="recommendation.php" method="post"> 
    <textarea placeholder="השאר כאן המלצה" class="form-control emoji_act" rows="5" id="comment" name='comment'></textarea>
    <input class="more_inforamtionClick "  type="submit" value="שלח" name='send' style="float:left;">
    </form>
    </div>
    <div class="col-sm-12 " > 
    
    <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "taliacabin";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
function count1(){
  
  $conn = new mysqli("localhost","root","", "taliacabin");
 
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  $sql="SELECT COUNT(comment) FROM recommendation";
  $result = $conn->query($sql);
  
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    echo '<h3>'.$row['COUNT(comment)'].' תגובות</h3>';
   
  }
} 
$conn->close();
}
echo count1();
echo"<br><br>";
$sql = "SELECT * FROM recommendation";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    $timestamp = strtotime($row["date"]);
    
    echo   '<ul class="media-list">
    <li class="media">
        <div class="media-body">
            <span class="text-muted pull-right">
                <small class="text-muted">'.date("d-m-Y",$timestamp).'&nbsp-</small>
            </span>
            <strong class="text-success">&nbsp'. $row["name"].'</strong>
            <p>
            '.$row["comment"].'
            </p>
        </div>
    </li>
   
</ul>';
  }
} 
$conn->close();
?>

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
