<?php
session_start();
include_once("functions.php");
$id=$_GET['id'];
//$sql="DELETE FROM customer WHERE id='$id' ";
mysqlexec("DELETE FROM customer WHERE cust_id='$id' ");
header("location:admin.php");
?>