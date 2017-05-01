<?php
session_start();
$con=mysqli_connect("localhost","root","","books");
$id=$_POST['b_id'];
$sql="DELETE FROM bookdetails WHERE book_id=$id";
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