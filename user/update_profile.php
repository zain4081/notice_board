<?php
extract($_POST);
if(isset($update))
{
	

$query="update user set role='$role' name='$n',mobile='$mob',gender='$gen',dob='$dob' where email='".$_SESSION['user']."'";


mysqli_query($conn,$query);



$err="<font color='blue'>Profie updated successfully !!</font>";


}


//select old data
//check user alereay exists or not
$sql=mysqli_query($conn,"select * from user where email='".$_SESSION['user']."'");
$res=mysqli_fetch_assoc($sql);

?>
<h2 align="center"><B>UPDATE YOUR PROFILE</B></h2>

		<form method="post">
			<table class="table table-bordered">
	<Tr>
		<Td colspan="2"><?php echo @$err;?></Td>
	</Tr>

				<tr>
					<td>Enter Your name</td>
					<Td><input class="form-control" value="<?php echo $res['name'];?>"  type="text" name="n"/></td>
				</tr>
				<tr>
					<td>Enter Your email </td>
					<Td><input class="form-control" type="email" readonly="true" value="<?php echo $res['email'];?>"  name="e"/></td>
				</tr>


				<tr>
					<td>Enter Your Mobile </td>
					<Td><input class="form-control" type="text" value="<?php echo $res['mobile'];?>"  name="mob"/></td>
				</tr>

				<tr>
					<td>Select Your Gender</td>
					<Td>
				Male<input type="radio" <?php if($res['gender']=="MALE"){echo "checked";} ?> name="gen" value="MALE"/>
				Female<input type="radio" <?php if($res['gender']=="FEMALE"){echo "checked";} ?> name="gen" value="FEMALE"/>
					</td>
				</tr>

				<tr>
					<td>Select Your Role</td>
					<Td>
				Teacher<input type="radio" <?php if($res['role']=="Teacher"){echo "checked";} ?> name="role" value="Teacher"/>
				Student<input type="radio" <?php if($res['role']=="Student"){echo "checked";} ?> name="role" value="Student"/>
					</td>
				</tr>


				<tr>
					<td>Date of Birth</td>
					<Td><input  class="form-control" type="date" name="dob" value="<?php echo $res['dob'];?>" required/></td>
				</tr>

				<tr>


<Td colspan="2" align="center">
<input type="submit" class="btn btn-default" value="Update My Profile" name="update"/>
<input type="reset" class="btn btn-default" value="Reset"/>

					</td>
				</tr>
			</table>
		</form>
