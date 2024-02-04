<?php 
session_start();

include('../connection.php');

	unset($_SESSION['user']);
	header('location:../index.php');
?>