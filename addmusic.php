<?php 
session_start();
?>



<script src="js/file-upload.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.file-upload').file_upload();
    });
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
          <form id="upload">
              <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                      <label class="file-upload btn btn-primary">
                          Browse for file ... <input type="file" />
                      </label>
                  </div>
              </div>
          </form>
          <button id = "add_btn">Add Music</button>
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
