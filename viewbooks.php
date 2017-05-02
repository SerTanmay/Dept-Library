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

    <script>
        function goBack() 
        {
            window.history.back();
        }
    </script>
      
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
$con=mysqli_connect("localhost","root","","books");
if(! $con )
{
    echo '<div class="alert alert-danger" role="alert">';
    die("<strong>Could not connect:</strong> " . mysqli_connect_error());
    echo "<br></div>";
} 
$q=mysqli_query($con,"CREATE OR REPLACE VIEW books_view AS SELECT * FROM bookdetails");
if (!$q) 
{
    echo '<div class="alert alert-danger" role="alert">';
    printf("<strong>Error at create view:</strong> %s\n</div>", mysqli_error($con));
    exit();
}
$c=mysqli_query($con,"SELECT * FROM books_view");
echo '<div class="col-md-6">
          <table class="table table-striped table-bordered">
            <thead>
              <tr>
                <th>Book ID</th>
                <th>Book Name</th>
                <th>Author</th>
                <th>No. of books</th>
              </tr>
            </thead>
            <tbody>';
while($row=mysqli_fetch_array($c))
{
    echo '<tr><td>'.$row[0].'</td><td>'.$row[1].'</td><td>'.$row[2].'</td><td>'.$row[3].'</td></tr>';
}
echo '      </tbody>
          </table>
        </div>
      </div>';
echo '<button class="btn btn-lg btn-primary btn-block" onclick="goBack()">Back!</button>';

?>
    </body>
</html>