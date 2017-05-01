<?php
session_start();
$bid=$_POST['bookid'];
$con1=mysqli_connect("localhost","root","","books");

//Updating books database
$q1=mysqli_query($con1,"SELECT * FROM bookdetails WHERE book_id=$bid");
while($row=mysqli_fetch_array($q1))
{
    $row[3]=$row[3]+1;
    $e1=mysqli_query($con1,"UPDATE bookdetails SET no_of_books='$row[3]' WHERE book_id=$bid");
    if (!$e1) 
    {
        printf("Error at e1: %s\n", mysqli_error($con));
        exit();
    }
    printf("Book db update success!\n");
}
$_SESSION['bookid']=$bid;
?>


