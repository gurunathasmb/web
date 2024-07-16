<?php
$name=$_POST['fullname'];
$gender=$_POST['gender'];
$City=$_POST['City'];
$Number=$_POST['mobileno'];
$conn=mysqli_connect("localhost","root","","gg") or die("Connection error");
$sql= "INSERT INTO user_details(user_name,user_gender,user_City,user_number) values('{$name}','{$gender}','{$City}','{$Number}')";
$result=mysqli_query($conn,$sql) or die("query unsuccessful.");
header("Location: http://localhost/web1/g1.php");
mysqli_close($conn);
 ?>
