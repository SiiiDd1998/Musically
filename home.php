<?php
session_start();
if(empty($_SESSION['isLoggedIn']))
  $_SESSION['isLoggedIn'] = false;
$_SESSION['onpage'] = 'home';


?>
<?php

function debug_to_console( $data ) {
  $output = $data;
  if ( is_array( $output ) )
      $output = implode( ',', $output);

  echo "<script>console.log( 'Debug Objects: " . $output . "' );</script>";
}


debug_to_console("in home");
$mysqli = mysqli_connect("localhost","root","mysql","musicallydb");

if (!empty($_POST['name']) ) {
  
  $uname1=$_POST['username'];
  $pass1=$_POST['password'];
  $name1=$_POST['name'];
  $email1=$_POST['email'];
  $usertype1=$_POST['usertype'];
  debug_to_console("Result started");
  $sql="insert into users(username,password,name,email,usertype) values('".$uname1."','".$pass1."','".$name1."','".$email1."','".$usertype1."')";

  mysqli_query($mysqli,$sql);

  debug_to_console("Query executed");
    $_SESSION['isLoggedIn'] = true;
    $_SESSION['user'] = $_POST['name'];
    header('Location: '.$_SERVER['REQUEST_URI']);

  
}
if (!empty($_POST['username']) 
               && !empty($_POST['password'])) {
  
  $_SESSION['user']=$_POST['username'];
  $_SESSION['pass']=$_POST['password'];


  $sql="select * from users where username='".$_SESSION['user']."' and password='".$_SESSION['pass']."'  ";

  $result=mysqli_query($mysqli,$sql);

  if($row=mysqli_fetch_array($result,MYSQLI_NUM)){
    $_SESSION['isLoggedIn'] = true;
    $_SESSION['username'] = $row['name'];
    header('Location: '.$_SERVER['REQUEST_URI']);

  }
  else{
    echo "You have entered wrong credentials";

  }
}

/* 
$yep=mt_rand(1,8);

$sql1="select * from teams where pid_teams='".$yep."' ";

$result1=mysqli_query($mysqli,$sql1);

$values=mysqli_fetch_array($result1);

$image="css/images/".$values[0].".png";

$yep2=mt_rand(1,56);

$status=array("Not-Happened","Already-Happened");

$sql2="select * from matches where pid_matches='".$yep2."' ";

$result2=mysqli_query($mysqli,$sql2);

$values1=mysqli_fetch_array($result2);

$teams=array("","Mumbai Indians","Chennai Super Kings","Royal Challengers Bangalore","Kolkata Knight Riders","Sunrisers Hyderabad","Rajasthan Royals","Kings XI Punjab","Delhi Daredevils");


$image1="css/images/".array_search(strtolower($values1[2]),array_map('strtolower', $teams)).".png";
$image2="css/images/".array_search(strtolower($values1[3]),array_map('strtolower', $teams)).".png";
 */
?>

<!DOCTYPE html>
<html>
<head>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="css/font-awesome.css">
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Your custom styles -->
    <link rel="stylesheet" href="css/mynavigation.css">
    <!-- Your custom styles (optional) -->

    <link rel="stylesheet" href="css/home.css">
    

    <title>Musically</title>
    <link rel="icon" href="css/images/ipl-logo1.jpg">
</head>
<body>

   
  <!-- always include one </div> elements before </body> -->
    <?php include 'mynavigation.php';?>

        
          
Login
  
    <!-- SCRIPTS -->
    <!-- JQuery -->
    <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="js/bootstrap.min.js"></script>

    

</body>
</html>
