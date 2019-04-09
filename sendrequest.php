<?php
session_start();
$_SESSION['onpage'] = 'home';
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

    <link rel="stylesheet" href="css/signup.css">
    <script src="js/jquery-3.3.1.min.js"></script>
    

    <title>Musically</title>
    <link rel="icon" href="css/images/ipl-logo1.jpg">
</head>
<body>

   
  <!-- always include one </div> elements before </body> -->
    <?php include 'mynavigation.php';?>

        <div id='content' class="col-md-10 main">
          <div class="container">
      <div class="row main">
        <div class="main-login main-center">
        <h5>Sign up on Musically</h5>
          <form  method="post" action="">
            
            <div class="form-group">
              <label for="receiver_id" class="cols-sm-2 control-label">Receiver Id</label>
              <div class="cols-sm-10">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                  <input type="text" class="form-control" name="receiver_id" id="receiver_id"  placeholder="Receiver Id"/>
                </div>
              </div>
            </div>

            <div class="form-group">
              <label for="song_id" class="cols-sm-2 control-label">Song Id</label>
              <div class="cols-sm-10">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
                  <input type="text" class="form-control" name="song_id" id="song_id"  placeholder="song Id"/>
                </div>
              </div>
            </div>

            
            <div class="form-group ">

              <input type="submit" id="button" class="btn btn-primary btn-lg btn-block login-button" name="Submited"/>
            </div>
            
          </form>
        </div>
      </div>
    </div>
    </div>
  
    <!-- SCRIPTS -->
    <!-- JQuery -->
    <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="js/bootstrap.min.js"></script>

</body>
</html>
<?php
if (isset($_POST['Submited'])){
  $sender_id = $_SESSION['userid'];
  $receiver_id = $_POST['receiver_id'];
  $song_id = $_POST['song_id'];
  debug_to_console("request sent");
  $mysqli = mysqli_connect("localhost","root","","musicallydb");
  $sql="insert into requests(sender_id , receiver_id , music_id) values('".$sender_id."','".$receiver_id."','".$song_id."')";

  $result = mysqli_query($mysqli,$sql);
  if ( false===$result ) {
    debug_to_console( mysqli_error($mysqli));
  }
  else {
    debug_to_console('done.');
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

