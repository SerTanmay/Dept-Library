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

    <title>Book Return</title>

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

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="home.html">Home</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <!--<li class="active"><a href="home.html">Home</a></li>-->
            <li><a href="adminlogin.html">Admin Login</a></li>
            <li><a href="viewbooks.php">View Books</a></li>
            <li><a href="about.html">About</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="home.html">Home</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <!--<li class="active"><a href="home.html">Home</a></li>-->
            <li><a href="adminlogin.html">Admin Login</a></li>
            <li><a href="viewbooks.php">View Books</a></li>
            <li><a href="about.html">About</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
    <br>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="bootstrap-3.3.7/docs/assets/js/ie10-viewport-bug-workaround.js"></script>
 
<?php
session_start();
$mid=$_SESSION['mem_id'];
$mname=$_SESSION['mem_name'];
$bid=$_SESSION['bookid'];
//Updating member database
$con2=mysqli_connect("localhost","root","","members");
$q2=mysqli_query($con2,"SELECT * FROM memdetails WHERE mem_id=$mid");
while($r=mysqli_fetch_array($q2))
{
    if($r[3]==$bid)
    {
        $e2=mysqli_query($con2,"UPDATE memdetails SET bid1=NULL WHERE mem_id=$mid");
    }
    else if($r[4]==$bid)
    {
        $e2=mysqli_query($con2,"UPDATE memdetails SET bid2=NULL WHERE mem_id=$mid");
    }
    else if($r[5]==$bid)
    {
        $e2=mysqli_query($con2,"UPDATE memdetails SET bid3=NULL WHERE mem_id=$mid");
    }
    else if($r[6]==$bid)
    {
        $e2=mysqli_query($con2,"UPDATE memdetails SET bid3=NULL WHERE mem_id=$mid");
    }
    else
    {
        echo '<div class="alert alert-danger" role="alert">';
        printf("<strong>Book not issued by you!</strong> Exiting!\n");
        echo '</div><br>';
        exit();
    }
    if (!$e2) 
    {
        echo '<div class="alert alert-danger" role="alert">';
        printf("<strong>Error at e2:</strong> %s\n", mysqli_error($con2));
        echo '</div><br>';
        exit();
    }
    $r[2]=$r[2]-1;
    $e3=mysqli_query($con2,"UPDATE memdetails SET books_issued='$r[2]' WHERE mem_id=$mid");
    echo '<div class="alert alert-success" id="success" role="alert">';
    printf("Book successfully returned!\n");
    echo '</div><br>';
}
        echo '<ul>
        <li><a href="check_user-pass.html">Log in again</li>
        <li><a href="memlogout.php">Member Logout</li>
        </ul>';
        
?>
    </body>
</html>