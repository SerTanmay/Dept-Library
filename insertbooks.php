<?php
session_start();
$con=mysqli_connect("localhost","root","","books");
$id=$_POST['b_id'];
$name=$_POST['b_name'];
$author=$_POST['b_author'];
$no=$_POST['b_no'];
$sql="INSERT INTO bookdetails VALUES ('{$id}','{$name}','{$author}','{$no}')";
$q=mysqli_query($con,$sql);
if (!$q) 
{
    printf("Error: %s\n", mysqli_error($con));
    exit();
}
echo "Insert successful!";
echo "<br>";
session_destroy();
?>