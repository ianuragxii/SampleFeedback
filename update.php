<?php

$servername="localhost";
$username="root";
$password="";
$dbname="mca";

$conn=mysqli_connect($servername,$username,$password,$dbname);
if(!$conn)
{
    echo "error";
}

else
{

    $q='SELECT excellent from feedback';
    $query=mysqli_query($conn,$q);
    $row=mysqli_fetch_assoc($query);

    // $e=$row['excellent'];


    if($_SERVER['REQUEST_METHOD']=='POST')
    {
        $a=$_POST['rating'];
       
        if($a=="excellent")
        {
            
            $query="UPDATE feedback SET excellent=excellent+1;";
        }

        if($a=="good")
        {
            
            $query="UPDATE feedback SET good=good+1;";
        }

        if($a=="bad")
        {
            
            $query="UPDATE feedback SET bad=bad+1;";
        }

        mysqli_query($conn,$query) or die("failed");
        mysqli_close($conn);
        echo"<script> alert('feedbackk submitted') </script>";

        header("Location:index.php");


    }
    
}

?>