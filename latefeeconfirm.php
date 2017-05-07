<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="refresh" content="1; url=latefeememreturn.php">
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
$mid=$_POST['mid'];
$bid=$_POST['bid'];
$con1=mysqli_connect("localhost","root","","books");

//Updating books database
$q1=mysqli_query($con1,"SELECT * FROM bookdetails WHERE book_id=$bid");
if(!q1)
{
    $bid='terminate';
    $_SESSION['bookid']=$bid;
    exit();
}
while($row=mysqli_fetch_array($q1))
{
    $e1=mysqli_query($con1,"UPDATE bookdetails SET avail='YES' WHERE book_id=$bid");
    if (!$e1) 
    {
        echo '<div class="alert alert-danger" role="alert">';
        printf("<strong>Error at e1:</strong> %s\n", mysqli_error($con));
        echo '</div><br>';
        exit();
    }
    printf("Book db update success!\n");
    echo '<br>';
}
$_SESSION['bookid']=$bid;
$_SESSION['mem_id']=$mid;
?>
    </body>
</html>


