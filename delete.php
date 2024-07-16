<?php
include 'conn.php';
  $user_id = $_GET['id'];
$sql= "DELETE FROM user_details where user_id={$user_id}";
$result=mysqli_query($conn,$sql);

header("Location: g1.php");

mysqli_close($conn);

 ?>
