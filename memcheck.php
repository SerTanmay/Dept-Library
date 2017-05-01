<?php
//memcheck.php
session_start();
$mid=$_SESSION['mem_id'];
$mname=$_SESSION['mem_name'];
$bid=$_SESSION['bookid'];
//Updating member database
$con2=mysqli_connect("localhost","root","","members");
$q2=mysqli_query($con2,"SELECT * FROM memdetails WHERE mem_id=$mid");
while($r=mysqli_fetch_array($q2))
{
    if($r[3]==NULL)
    {
        $r[3]=$bid;
        $e2=mysqli_query($con2,"UPDATE memdetails SET bid1='$r[3]' WHERE mem_id=$mid");
    }
    else if($r[4]==NULL)
    {
        $r[4]=$bid;
        $e2=mysqli_query($con2,"UPDATE memdetails SET bid2='$r[4]' WHERE mem_id=$mid");
    }
    else if($r[5]==NULL)
    {
        $r[5]=$bid;
        $e2=mysqli_query($con2,"UPDATE memdetails SET bid3='$r[5]' WHERE mem_id=$mid");
    }
    else if($r[6]==NULL)
    {
        $r[6]=$bid;
        $e2=mysqli_query($con2,"UPDATE memdetails SET bid3='$r[6]' WHERE mem_id=$mid");
    }
    else
    {
        printf("Max books already issued! Exiting!\n");
        exit();
    }
    if (!$e2) 
    {
        printf("Error at e2: %s\n", mysqli_error($con));
        exit();
    }
    $r[2]=$r[2]+1;
    $e3=mysqli_query($con2,"UPDATE memdetails SET books_issued='$r[2]' WHERE mem_id=$mid");
    printf("Members db update success!\n");
}
session_destroy();
?>