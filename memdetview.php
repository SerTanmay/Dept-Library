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

    <title>View Members Borrow Details</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap-3.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

    <script>
        function goBack() 
        {
            window.history.back();
        }
    </script>
    <style>
        body {
            padding: 40px 15px;
            text-align: center;
            background-color: #eee;
        }
        table.center {
            margin-left:55%; 
            margin-right:35%;
        }
    </style>  
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
    <h2>Members Borrow Details</h2>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="bootstrap-3.3.7/docs/assets/js/ie10-viewport-bug-workaround.js"></script>

<?php
session_start();
$con=mysqli_connect("localhost","root","","members");
if(! $con )
{
    echo '<div class="alert alert-danger" role="alert">';
    die("<strong>Could not connect:</strong> " . mysqli_connect_error());
    echo "<br></div>";
} 
$sql="CREATE OR REPLACE VIEW mem_view AS 
SELECT memdetails.mem_id,mem_name,book_id,borrow_date,return_date
FROM memdetails, memborrow
WHERE memdetails.mem_id=memborrow.mem_id";
$q=mysqli_query($con,$sql);
if (!$q) 
{
    echo '<div class="alert alert-danger" role="alert">';
    printf("<strong>Error at create view:</strong> %s\n</div>", mysqli_error($con));
    exit();
}
$c=mysqli_query($con,"SELECT * FROM mem_view");
if (!$c) 
{
    echo '<div class="alert alert-danger" role="alert">';
    printf("<strong>Error at select from view:</strong> %s\n</div>", mysqli_error($con));
    exit();
}
echo '<div class="col-md-6">
          <table class="table center table-striped table-bordered">
            <thead>
              <tr>
                <th>Member ID</th>
                <th>Member Name</th>
                <th>Book ID</th>
                <th>Borrow Date</th>
                <th>Return Date</th>
              </tr>
            </thead>
            <tbody>';
while($row=mysqli_fetch_array($c))
{
    if (!$row) 
{
    echo '<div class="alert alert-danger" role="alert">';
    printf("<strong>Error at fetch array:</strong> %s\n</div>", mysqli_error($con));
    exit();
}
    echo '<tr><td>'.$row[0].'</td>
    <td>'.$row[1].'</td>
    <td>'.$row[2].'</td>
    <td>'.$row[3].'</td>
    <td>'.$row[4].'</td></tr>';
}
echo '      </tbody>
          </table>
        </div>
      </div>';
echo '<button class="btn btn-lg btn-primary btn-block" onclick="goBack()">Back!</button>';

?>
    </body>
</html>