<?php
include('connection.php');
session_start();
 ?>
<html>
	<head>
		<title>Online Notice Board</title>
		<link rel="stylesheet" href="css/bootstrap.css"/>
		<script src="js/jquery_library.js"></script>
<script src="js/bootstrap.min.js"></script>
	</head>
	<body>
			<nav class="navbar navbar-default navbar-fixed-top navbar-info bg-info">
  <div class="container">

  <ul class="nav navbar-nav navbar-left">
    <li><a href="index.php"><strong>Online Notice Board</strong></a></li>


	  <li><a href="index.php?option=about"><span class="glyphicon glyphicon-user"></span> About</a></li>

	</ul>


<ul class="nav navbar-nav navbar-right">
      <li><a href="index.php?option=New_user"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
      <li><a href="index.php?option=admin_login"><span class="glyphicon glyphicon-log-in"></span> Admin Login</a></li>
      <li><a href="index.php?option=login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    </ul>



</div>
</nav>

<div class="container-fluid">
	<img src="images/notice.jpg" alt="...">
	
</div>


<div class="container">
	<div class="row">
	<!-- container -->
		<div class="col-sm-8">
		<?php
		@$opt=$_GET['option'];

		if($opt!="")
		{
			if($opt=="about")
			{
			include('about.php');
			}
			else if($opt=="New_user")
			{
			include('registration.php');
			}


			else if($opt=="login")
			{
			include('login.php');
			}
			else if($opt=="admin_login")
			{
			header('location:admin\index.php');
			}
		}
		else
		{
		echo "<div class='row'><h2><b>'WELCOME USER TO OUR ONLINE NOTICE BOARD'</b></h2>
		<i> <b> Join us today and get connected. Register now to get each and every updates of your college! </b></i>
		<div class='col-sm-4'>
	<h6 style='color:grey;''>Authors</h6>
	<h4>BC170401542     BS150403469</h4>
</div>
<div class='col-sm-4'></div>
<div class='col-sm-4'>
	<h6 style='color:grey;'>Supervisor</h6>
	<h4>Miss Komal Khawer</h4>
</div></div>";
		}
		?>



		</div>
	<!-- container -->

		<div class="col-sm-4">
			<div class="panel panel-default">
  <div class="panel-heading"><b>LATEST NEWS</b></div>
  <div class="panel-body">
    ... With Google Apps for Education, everything is automatically saved in the cloud – 100% powered by the web. This means that emails, documents, calendar and sites can be accessed – and edited – on almost any mobile device or tablet. Anytime, anywhere.
  </div>
</div>

		</div>
	</div>

</div>



<br/>
<br/>
<br/>
<br/>

<!-- footer-->

			<nav class="navbar navbar-default navbar-bottom" style="background:black">
  <div class="container">

  <ul class="nav navbar-nav navbar-left">
    <li>&copy; 2021 ONBS</li>

	</ul>




</div>
</nav>
<!-- footer-->

	</body>
</html>
