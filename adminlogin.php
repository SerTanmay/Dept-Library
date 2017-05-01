<?php
$con=mysqli_connect("localhost","root","","libadmin");
if(! $con )
{
	die("Could not connect: " . mysqli_connect_error());
}    
// Define $username and $password 
$username=$_POST['user_name']; 
$password=$_POST['password'];

$sql="SELECT * FROM admindetails WHERE mem_id='{$username}' and mem_pass='{$password}'";
$result=mysqli_query($con,$sql);
if (!$result) {
    printf("Error: %s\n", mysqli_error($con));
    exit();
}
// Mysql_num_row is counting table row
$count=mysqli_num_rows($result);
// If result matched $username and $password, table row must be 1 row
if($count==1)
{
    echo "Login Successful";
	echo "<br>";
    session_start();
    $_SESSION['mem_id']=$username;
    $_SESSION['mem_pass']=$password;   
	echo '<a href="insertbooks.html">Continue!</a>';
}
else
{
    echo "Wrong Username or Password";
    return false;
}
?>