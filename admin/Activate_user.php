<?php 
include('../connection.php');
$nid=$_GET['id'];

$q=mysqli_query($conn,"update user set status='1',login=now() where id='$nid'");

header('location:index.php?page=manage_users');
?>