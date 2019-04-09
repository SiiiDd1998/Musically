<?php 
session_start();
?>



<script src="js/file-upload.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.file-upload').file_upload();
    });
//http://www.codingcage.com/2014/12/file-upload-and-view-with-php-and-mysql.html for upload code
    function addMusic(){
      var x = document.getElementById("file").value;//x stores path
      console.log(x);
    }
</script>
<!-- <p>Click the button to create a File Upload Button.</p>

<button onclick="myFunction()">Try it</button>

-->
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
    <link rel="stylesheet" type="text/css" href="css/file-upload.css" />
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
                <div id="add">  
                    <form id="upload" action="upload.php" method="post" enctype="multipart/form-data">
                        
                        <div class="form-group">
                            <label for="name" class="cols-sm-2 control-label">Song Name</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                                <input type="text" class="form-control" name="name" id="name"  placeholder="Enter your Name"/>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="cols-sm-2 control-label">Browse Song</label>
                                <div class="cols-sm-10">
                                    <div class="input-group">
                                    <center>
                                    <input type="file" id="file" name="file" />
                                    </center>
                                    </div>
                                </div>
                            </div>
                        </div>

                        </div>
                    </form>
                    <button type="submit" name="add_btn" id="add_btn" >Add Music</button>
                </div>

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
if(isset($_POST['add_btn']))
{    
     
 $file = rand(1000,100000)."-".$_FILES['file']['name'];
 $file_loc = $_FILES['file']['tmp_name'];
 $file_size = $_FILES['file']['size'];
 $file_type = $_FILES['file']['type'];
 $name = $_SESSION['userid'];
 $ownerid = 
 $folder="uploads/";
 
 move_uploaded_file($file_loc,$folder.$file);
 $mysqli = mysqli_connect("localhost","root","","musicallydb");

 $sql="INSERT INTO musics(file,filetype,filesize) VALUES('$file','$file_type','$file_size')";
 mysql_query($sql); 
}
?>