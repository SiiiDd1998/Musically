<?php
if (empty($_SESSION['usertype']))
  $_SESSION['usertype'] = "Login";
if (isset($_SESSION['user']) && isset($_SESSION['pass'])  ){
  $mysqli = mysqli_connect("localhost","root","","musicallydb");
  $sql="select * from users where username='".$_SESSION['user']."' and password='".$_SESSION['pass']."'  ";
  $result=mysqli_query($mysqli,$sql);
  if($row=mysqli_fetch_array($result,MYSQLI_NUM)){
    $_SESSION['isLoggedIn'] = true;
    $_SESSION['usertype'] = $row[5];
  }
}
?>
 <!-- This is Top and right navigation bar. Edit only links -->
<div class="navbar navbar-inverse navbar-fixed-top">
  <div class="navbar-header">
    <!-- <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button> -->
    <a class="navbar-brand" href="home.php">Musically</a>
  </div>

  <!-- <div class="collapse navbar-collapse s">-->
    <ul class="nav navbar-nav navbar-right">
      <li>
        <?php if($_SESSION['isLoggedIn']) { ?>
         <a href="#"><span class="glyphicon glyphicon-th-large"></span> <?php echo $_SESSION['user']; ?></a>
       <?php } else {?>
          <a href="signup.php"><span class="glyphicon glyphicon-user"></span>Sign Up</a>
       <?php } ?>
           
      </li>
      <li>
        <?php if(!$_SESSION['isLoggedIn']) { ?>
         <a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a>
       <?php } else {?>
          <a href="logout.php"><span class="glyphicon glyphicon-log-out"></span>Logout</a>
       <?php } ?>

       </div>

</div><!--/.navbar -->


<div class='wrapper'>
    <div id="sidebar" class="sidebar navbar-left col-md-2">
      <div class="menu12">
          <h3>Menu</h3>
      </div>
      <?php if($_SESSION['usertype'] == "User") { ?>
          <ul id="user" class="nav nav-sidebar" >
            <li <?php if($_SESSION['onpage'] == 'home'){?> class="active" <?php } ?> ><a href="home.php">Home</a></li>
            <li <?php if($_SESSION['onpage'] == 'playmusic'){?> class="active" <?php } ?> ><a href="playmusic.php">Play Music</a></li>
            <li <?php if($_SESSION['onpage'] == 'addmusic'){?> class="active" <?php } ?> ><a href="addmusic.php">Add Music</a></li>
            <li <?php if($_SESSION['onpage'] == 'sharemusic'){?> class="active" <?php } ?> ><a href="sharemusic.php">Share Music</a></li>
            <li <?php if($_SESSION['onpage'] == 'sendrequest'){?> class="active" <?php } ?> ><a href="sendrequest.php">Send Request</a></li>
            <li <?php if($_SESSION['onpage'] == 'acceptrequest'){?> class="active" <?php } ?> ><a href="acceptrequest">Accept Request</a></li>
          </ul>
          <?php } else if($_SESSION['usertype'] == "Admin") {?>
          <ul id="admin" class="nav nav-sidebar" >
            <li <?php if($_SESSION['onpage'] == 'home'){?> class="active" <?php } ?> ><a href="home.php">Home</a></li>
            <li <?php if($_SESSION['onpage'] == 'deleteuser'){?> class="active" <?php } ?> ><a href="deleteuser.php">Delete User</a></li>
            <li <?php if($_SESSION['onpage'] == 'authenticateuser'){?> class="active" <?php } ?> ><a href="authenticateuser.php">Authenticate User</a></li>
          </ul>
          <?php } else {?>
            <ul id="admin" class="nav nav-sidebar" >
            <li <?php if($_SESSION['onpage'] == 'home'){?> class="active" <?php } ?> ><a href="home.php">Home</a></li>
          </ul>
          <?php } ?>  
    </div>
    <!-- End of Navigation bars -->