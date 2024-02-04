
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- dashbooard css file -->
    <link rel="stylesheet" type="text/css" href="../css/dashboard.css">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
<script type="text/javascript">
	$(document).ready(function(){
		$("#b_active").click(function(){
			$("#t_new").hide();
			$("#t_inactive").hide();
			$("#t_active").show();
		});
		$("#b_new").click(function(){
			$("#t_inactive").hide();
			$("#t_active").hide();
			$("#t_new").show();
		});
		$("#b_inactive").click(function(){
			$("#t_new").hide();
			$("#t_active").hide();
			$("#t_inactive").show();
		});
	});

	function DeleteUser(id)
	{
		if(confirm("You want to delete this record ?"))
		{
		window.location.href="delete_user.php?id="+id;
		}
	}
	function ApproveUser(id)
	{
		if(confirm("You want to Approve this User?"))
		{
		window.location.href="Approve_user.php?id="+id;
		}
	}
	function ActivateUser(id)
	{
		if(confirm("You want to Re-Activate this User ?"))
		{
		window.location.href="Activate_user.php?id="+id;
		}
	}
	function DeactiveUser(id)
	{
		if(confirm("You want to De Activate this User ?"))
		{
		window.location.href="Deactivate_user.php?id="+id;
		}
	}

</script>
<body id="manag">
	<div class="container-fluid">
		<button class="btn btn-light"><a href="index.php?page=Add_user"><span class="glyphicon glyphicon-user"></span> Add User</a></button>
	</div>
	<ul class="nav nav-tabs nav-justified">
		
		<li class="btn btn-success" id="b_active">Active   -<span class="w3-badge w3-red">
			<?php 
			$q=mysqli_query($conn,"select * from user where status=1");
		    $active=mysqli_num_rows($q);
		    echo $active;
		    ?>
		</span></li>
		<li class="btn btn-primary" id="b_new">New   -<span class="w3-badge">
			<?php 
			$q=mysqli_query($conn,"select * from user where status=0");
		    $new=mysqli_num_rows($q);
		    echo $new;
		    ?>
		</span></li>
		<li class="btn btn-danger" id="b_inactive">InActive   -<span class="w3-badge">
			<?php 
			$q=mysqli_query($conn,"select * from user where status=2");
		    $inactive=mysqli_num_rows($q);
		    echo $inactive;
		    ?>
		</span></li>
	</ul>

<!--                      Active Users                                 -->
		<div class="div" id="t_active">
			<table class="table" style="background-color: white;">
				<?php 
					$q=mysqli_query($conn,"select * from user where status=1");
					$rr=mysqli_num_rows($q);
					if(!$rr){

						?>
						  <tr>
						  	<th>0 items</th>
						  </tr>
						<?php
					}
					else{
						?>
						<tr>
							<th>Sr#</th>
							<th>Teacher/Student</th>
							<th>Name</th>
							<th>E Mail</th>
							<th>Gender</th>
							<th>Action</th>
						</tr>
						
							<?php
							$i=1;
							    while($row=mysqli_fetch_assoc($q)){
							    	echo "<tr>";
							    	echo "<td>".$i."</td>";
							    	echo "<td>".$row['role']."</td>";
							    	echo "<td>".$row['name']."</td>";
							    	echo "<td>".$row['email']."</td>";
							    	echo "<td>".$row['gender']."</td>";
							    	?>

							    	<td>
							    		<a href="javascript:DeleteUser('<?php echo $row['id']; ?>')" class="btn btn-danger">Delete</a>
							    	</td>
							    	<td>
							    		<a href="javascript:DeactiveUser('<?php echo $row['id']; ?>')" class="btn btn-info">De Activate</a>
							    	</td>
							    	<?php

							    	echo "</tr>";
							    	$i++;

							    } 
							}?>
				</table>
			</div>

<!--///////////////////////////////New Users///////////////////////////////////////-->
		<div class="div" id="t_new" hidden>
			<table class="table" style="background-color: white;">
				<?php 
					$q=mysqli_query($conn,"select * from user where status=0");
					$rr=mysqli_num_rows($q);
					if(!$rr){

						?>
						<tr>
							<th style="text-align: center;">0 items</th>
						</tr>
						<?php
					}
					else{
						?>
						<tr>
							<th>Sr#</th>
							<th>Teacher/Student</th>
							<th>Name</th>
							<th>E Mail</th>
							<th>Gender</th>
							<th>Action</th>
						</tr>
						
							<?php
							$i=1;
							    while($row=mysqli_fetch_assoc($q)){
							    	echo "<tr>";
							    	echo "<td>".$i."</td>";
							    	echo "<td>".$row['role']."</td>";
							    	echo "<td>".$row['name']."</td>";
							    	echo "<td>".$row['email']."</td>";
							    	echo "<td>".$row['gender']."</td>";
							    	?>

							    	<td>
							    		<a href="javascript:ApproveUser('<?php echo $row['id']; ?>')" class="btn btn-success">Approve</a>
							    		<a href="javascript:DeleteUser('<?php echo $row['id']; ?>')" class="btn btn-danger">Reject</a>
							    	</td>
							    	<?php

							    	echo "</tr>";
							    	$i++;

							    } 
							}?>
				</table>
		</div>


<!--///////////////////////////////In Active Users///////////////////////////////////////-->
		<div class="div" id="t_inactive" hidden>
			<table class="table" style="background-color: white;">
				<?php 

					$q=mysqli_query($conn,"select * from user where status=2");
					$rr=mysqli_num_rows($q);
					if(!$rr){

						?>
						<tr>
							<th style="text-align: center;">0 items</th>
						</tr>
						<?php
					}
					else{
						?>
						<tr>
							<th>Sr#</th>
							<th>Teacher/Student</th>
							<th>Name</th>
							<th>E Mail</th>
							<th>Gender</th>
							<th>Action</th>
						</tr>
						
							<?php
							$i=1;
							    while($row=mysqli_fetch_assoc($q)){
							    	echo "<tr>";
							    	echo "<td>".$i."</td>";
							    	echo "<td>".$row['role']."</td>";
							    	echo "<td>".$row['name']."</td>";
							    	echo "<td>".$row['email']."</td>";
							    	echo "<td>".$row['gender']."</td>";
							    	?>

							    	<td>
							    		<a href="javascript:ActivateUser('<?php echo $row['id']; ?>')" class="btn btn-success">Re Activate</a>
							    		<a href="javascript:DeleteUser('<?php echo $row['id']; ?>')" class="btn btn-danger">Delete</a>
							    	</td>
							    	<?php

							    	echo "</tr>";
							    	$i++;

							    } 
							}


							?>
				</table>
		</div>
		
</body>
				

		












    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="../css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/dashboard.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../js/ie-emulation-modes-warning.js"></script>

    <!-- dashbooard css file -->
    <link rel="stylesheet" type="text/css" href="../css/dashboard.css">




