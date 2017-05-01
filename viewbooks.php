<?php
      $con=mysqli_connect("localhost","root","","books");
         if(! $con )
        {
            die("Could not connect: " . mysqli_connect_error());
        } 
         $q=mysqli_query($con,"CREATE VIEW books_view AS SELECT * FROM bookdetails");
         $c=mysqli_query($con,"SELECT * FROM books_view");
         while($row=mysqli_fetch_array($c))
         {
	           echo $row[0]." ".$row[1]." ".$row[2]." ".$row[3];
	           echo "<br>";
         }
        echo '<a href="bookissue.html">Back!</a>';
?>