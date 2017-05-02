<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="bootstrap-3.3.7/docs/favicon.ico">

    <title>Administrator Login</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap-3.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="bootstrap-3.3.7/docs/assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="bootstrap-3.3.7/docs/examples/signin/signin.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="bootstrap-3.3.7/docs/assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
    
    <body>


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="bootstrap-3.3.7/docs/assets/js/ie10-viewport-bug-workaround.js"></script>
 
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
    echo '<div class="alert alert-success" id="success" role="alert">';
    echo "<strong>Login Successful!</strong>";
	echo "<br></div>";
    session_start();
    $_SESSION['mem_id']=$username;
    if(isset($_SESSION['mem_id'])){
        printf("mem_id is set\n");
    }
    $_SESSION['mem_name']=$password; 
    if(isset($_SESSION['mem_name'])){
        printf("mem_name is set\n");
    }
    echo "<h3>Library Member Options:</h3><br>";
    echo '<ul><li><a href="bookissue.html">Issue book!</a></li>';
    echo '<li><a href="bookreturn.html">Return book!</a></li>';
}
else
{
    echo '<div class="alert alert-danger" role="alert">';
    echo "<strong>Wrong Username or Password</strong>";
    echo " Try again</div>";
    return false;
}
?>
    </body>
</html>