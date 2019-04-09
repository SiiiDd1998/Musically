<?php 
session_start();
?>

<!-- <script type="text/javascript">
	function myFunction() {
    var x = document.getElementById("exampleInputPassword");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
	}
</script> -->

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
    <link rel="stylesheet" href="css/playmusic.css">

	<!-- <link rel="icon" href="css/images/ipl-logo1.jpg"> -->
	<title>Musically</title>
    <?php 
    $mysqli=mysqli_connect("localhost","root","","musicallydb");
    
    if(isset($_SESSION['userid'])){
        
        $sql="select * from musics where owner_id='".$_SESSION['userid']."' ";
        $values=array();

        $result=mysqli_query($mysqli,$sql);

        $num=mysqli_num_rows($result);

        if($num>0){
            while($row=mysqli_fetch_array($result,MYSQLI_NUM)){
                $values[]=$row;
            }
        }
        
    }
    
?>
</head>


<body>

	
	<!-- always include one </div> elements before </body> -->
    <?php include 'mynavigation.php';?>
    		<div id='content' class="col-md-10 main">



			<div class="col-md-10 main">

				<table class="table table-bordered table-hover">

					<tr>
						<thead>
							<th>Music id</th>
							<th>Song Name</th>
							<th>Owner id</th>
							<th>File</th>
							<th>Play</th>
						</thead>
					</tr>
                    <?php for($i=0;$i<$num;$i++){ ?>
					<tr>
						<td><?= $values[$i][0] ?></td>
						<td><?= $values[$i][1] ?></td>
						<td><?= $values[$i][2] ?></td>
						<td><?= $values[$i][3] ?></td>
						<td>Play</td>
					</tr>
                    <?php }?>
				</table>

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
