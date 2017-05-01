<?php
$con=mysqli_connect("localhost","root","","members");
if(! $con )
{
	die("Could not connect: " . mysqli_connect_error());
}    
// Define $username and $password 
$username=$_POST['user_name']; 
$password=$_POST['password'];

$sql="SELECT * FROM memdetails WHERE mem_id='{$username}' and mem_name='{$password}'";
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
    if(isset($_SESSION['mem_id'])){
        printf("mem_id is set");
    }
    $_SESSION['mem_name']=$password; 
    if(isset($_SESSION['mem_name'])){
        printf("mem_name is set");
    }
	echo '<a href="bookissue.html">Issue book!</a>';
    echo '<a href="bookreturn.html">Return book!</a>';
}
else
{
    echo "Wrong Username or Password";
    return false;
}
?>    