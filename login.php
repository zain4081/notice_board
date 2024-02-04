<?php
extract($_POST);
if(isset($save))
{
	$role;

	if($e=="" || $p=="")
	{
	$err="<font color='red'>fill all the fileds first</font>";
	}
	else
	{
		$pass=md5($p);

		$sql=mysqli_query($conn,"select * from user where email='$e' and pass='$pass'");

		$r=mysqli_num_rows($sql);

		if($r==true)
		{
			$sql=mysqli_query($conn,"select * from user where email='$e' ");
			$user=mysqli_fetch_assoc($sql);

			if($user['status']==0){

				$err="<font color='orange'>Acount Status is pending.Kindly Approved by Admin</font>";
			}
			elseif($user['status']==2){
				$err="<font color='red'>Account has been <b>Deactivated</b>. Contact your Administrator ?</font>";
			}
			else{
				$query="update user set login=now() where email='$e'";
				$terr=mysqli_query($conn,$query);

				if($terr==true){
					$sql=mysqli_query($conn,"select * from user where email='$e'");
					$rr=mysqli_fetch_assoc($sql);

					$_SESSION['user']=$e;
					$_SESSION['rol']=$rr['role'];
					
					header('location:user');


					    //////// automatic query run to Deactivate users

							$que=mysqli_query($conn,"select * from user where status=1");
							while($up=mysqli_fetch_assoc($que)){
								$date1 = $up['login'];

								$d1 = strtotime($date1);
								
								
								$date = date('Y-m-d h:i:s');
								$d2 = strtotime($date);
								

								$diff = abs($d2-$d1);
								$min = $diff/60/60/24/30;
								$err="<font color='red'>".$min."</font>";
								
								if($min>1){
									$nid = $up['id'];
									$q=mysqli_query($conn,"update user set status='2' where id='$nid'");
								}
							}
						}
					}
				}
				else
				{
				$err="<font color='red'>Invalid login details</font>";
			}
		}
}











?>
<h2><b>LOGIN FORM</B></h2>
<form method="post">

	<div class="row">
		<div class="col-sm-4"></div>
		<div class="col-sm-4"><?php echo @$err;?></div>
	</div>



	<div class="row">
		<div class="col-sm-4">Email ID</div>
		<div class="col-sm-5">
		<input type="email" name="e" class="form-control"/></div>
	</div>

	<div class="row">
		<div class="col-sm-4">Password</div>
		<div class="col-sm-5">
		<input type="password" name="p" class="form-control"/></div>
	</div>
	<div class="row" style="margin-top:10px">
		<div class="col-sm-2"></div>
		<div class="col-sm-8">
		<input type="submit" value="Login" name="save" class="btn btn-success"/>

		</div>
	</div>
</form>
