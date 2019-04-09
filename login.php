<?php 
session_start();
?>

<script type="text/javascript">
	function myFunction() {
    var x = document.getElementById("exampleInputPassword");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
	}
</script>

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
    <link rel="stylesheet" href="css/login.css">

	<link rel="icon" href="css/images/ipl-logo1.jpg">
	<title>Musically</title>
</head>

<body>

	
	<!-- always include one </div> elements before </body> -->
    <?php include 'mynavigation.php';?>
    		<div id='content' class="col-md-10 main">

			<div class="col-md-4 col-sm-4 col-xs-12">
			</div>

			<div class="col-md-4 col-sm-4 col-xs-12">
				
				<form method="post" class="form-container" action = "" autocomplete="off">
				<!-- <form class = "form-signin" role = "form" 
            action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']); 
            ?>" method = "post"> -->
					
					
					<!--<center><h1>Administrator Login</h1></center>-->

					<div class="form-group">
						<label for="exampleInputUsername">Username</label>
						<input type="text" class="form-control" id="exampleInputUsername" placeholder="username" name="username" required>

						<label for="exampleInputPassword">Password</label>
						<input type="password" class="form-control" id="exampleInputPassword" placeholder="password" name="password" required>

						<!--<label for="exampleInputFile">File Input</label>
						<input type="file" id="exampleInputFile">*/-->
						<br>
						<center><a href="forgot.php" class="help-block">Forgot Password</a></center>
					</div>

					<input type="checkbox" onclick="myFunction()">Show Password

					<div class="checkbox">
						<label>
							<input type="checkbox">Remember me
						</label>
					</div>

					<center><button type="submit" class="btn btn-success btn-block" name="Login">Log In</button></center>

				</form>

			</div>

			<div class="col-md-4 col-sm-4 col-xs-12">
			</div>

		</div>
	</div>
	</div>

	<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="js/bootstrap.min.js"></script>

</body>

</html>
<?php
if (isset($_POST['Login'])){
  $uname1=$_POST['username'];

  $pass1=$_POST['password'];
  $mysqli = mysqli_connect("localhost","root","","musicallydb");
  $sql="select * from users where username='".$uname1."' and password='".$pass1."'  ";

  $result=mysqli_query($mysqli,$sql);

  if($row=mysqli_fetch_array($result,MYSQLI_NUM)){
	debug_to_console($row);
    $_SESSION['isLoggedIn'] = true;
	$_SESSION['user'] = $row[3];
	$_SESSION['pass'] = $row[4];
	$_SESSION['usertype'] = $row[5];
	$_SESSION['userid'] = $row[0];
    header('Location: '.$_SERVER['REQUEST_URI']);

  }
  else{
    echo "You have entered wrong credentials";

  }

  debug_to_console("Executed..");
  
}
function debug_to_console( $data ) {
  $output = $data;
  if ( is_array( $output ) )
      $output = implode( ',', $output);

  echo "<script>console.log( 'Debug Objects: " . $output . "' );</script>";
}
?>
