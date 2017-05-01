<?php
$con=mysqli_connect("localhost","root","","members");
if(! $con )
{
	die("Could not connect: " . mysqli_connect_error());
}    
$id=$_POST['id'];
$name=$_POST['mname'];
$i=0;
$q=mysqli_query($con,"INSERT INTO memdetails VALUES ('{$id}','{$name}','{$i}')");
if(!$q)
{
	die('Could not enter data: ' . mysqli_error( $con ));
}
echo "<br>";
echo "Entered data successfully\n";
echo "Data entered is:";
echo "<br>";
echo $id;
echo "<br>";
echo $name;
?>