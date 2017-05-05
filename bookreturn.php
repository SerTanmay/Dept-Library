<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="refresh" content="1; url=memreturn.php">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="bootstrap-3.3.7/docs/favicon.ico">
    <script type="text/javascript">
        window.location.href = "memreturn.php"
    </script>

    <title>Book Return</title>
  </head>
    
    <body>
 
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
        echo '<div class="alert alert-danger" role="alert">';
        printf("<strong>Error at e1:</strong> %s\n", mysqli_error($con));
        echo '</div><br>';
        exit();
    }
    echo '<div class="alert alert-success" id="success" role="alert">';
    printf("Book db update success!\n");
    echo '</div><br>';
}
$_SESSION['bookid']=$bid;
?>
    </body>
</html>


