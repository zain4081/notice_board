<?php
require('connection.php');
extract($_POST);
if(isset($save))
{
//check user alereay exists or not
$sql=mysqli_query($conn,"select * from user where email='$e'");

$r=mysqli_num_rows($sql);

if($r==true)
{
$err= "<font color='red'>This user already exists</font>";
}
else
{


//image
$imageName=$_FILES['img']['name'];


//encrypt your password
$pass=md5($p);


$st="0";

//date




$query="insert into user values('','$role','$n','$e','$pass','$mob','$gen','$imageName','$dob','$st',now())";
mysqli_query($conn,$query);

//upload image

mkdir("images/$e");
move_uploaded_file($_FILES['img']['tmp_name'],"images/$e/".$_FILES['img']['name']);


$err="<font color='blue'>Registration successfull !!</font>";

}
}




?>
<h2><b>REGISTRATION FORM</b></h2>
		<form method="post" enctype="multipart/form-data">
			<table class="table table-bordered">
	<Tr>
		<Td colspan="2"><?php echo @$err;?></Td>
	</Tr>

				<tr>
					<td>Your Name</td>
					<Td><input  type="text"  class="form-control" name="n" required/></td>
				</tr>
				<tr>
					<td>Your Email </td>
					<Td><input type="email"  class="form-control" name="e" required/></td>
				</tr>

				<tr>
					<td>Your Password </td>
					<Td><input type="password"  class="form-control" name="p" required/></td>
				</tr>

				<tr>
					<td>Your Mobile No. </td>
					<Td><input  class="form-control" type="number" name="mob" required/></td>
				</tr>

				<tr>
					<td>Select Your Gender</td>
					<Td>
				Male<input type="radio" name="gen" value="MALE" required/>
				Female<input type="radio" name="gen" value="FEMALE"/>
					</td>
				</tr>

				<tr>
					<td>Select Your Role</td>
					<Td>
				Teacher<input type="radio" name="role" value="Teacher" required/></span>
				Student<input type="radio" name="role" value="Student"/></span>
					</td>
				</tr>


				<tr>
					<td>Upload  Your Image </td>
					<Td><input class="form-control" type="file" name="img" required/></td>
				</tr>
				<tr>
					<td>Date of Birth</td>
					<Td><input  class="form-control" type="date" name="dob" required/></td>
				</tr>

				

				<tr>


<Td colspan="2" align="center">
<input type="submit" class="btn btn-success" value="Save" name="save"/>
<input type="reset" class="btn btn-success" value="Reset"/>

					</td>
				</tr>
			</table>
		</form>
	</body>
</html>
