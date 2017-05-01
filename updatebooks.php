<?php
session_start();
$con=mysqli_connect("localhost","root","","books");
$id=$_POST['b_id'];
$name=$_POST['b_name'];
$author=$_POST['b_author'];
$no=$_POST['b_no'];
$q=mysqli_query($con,"SELECT * FROM bookdetails WHERE book_id=$id");
while($row=mysqli_fetch_array($q))
{
    $row[1]=$name;
    $row[2]=$author;
    $row[3]=$no;
    $e=mysqli_query($con,"UPDATE bookdetails SET book_name='$row[1]', author='$row[2]', no_of_books='$row[3]' WHERE book_id=$id");
    if (!$e) 
    {
        printf("Error: %s\n", mysqli_error($con));
        exit();
    }
    echo "Edit successful!";
    echo "<br>";
}
session_destroy();
?>