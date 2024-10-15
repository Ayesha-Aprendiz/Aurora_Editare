<?php 
$username="root";
$servername="localhost";
$password="";
$db="Aurora_Editare";
    $conn= mysqli_connect($servername,$username,$password,$db);
    if($conn== false)
    {
        die("Connection Error: ".mysqli_connect_error());
    }

?>