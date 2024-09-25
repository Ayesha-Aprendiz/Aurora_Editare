<?php 
    $conn= mysqli_connect("localhost","root","","Minor");
    if($conn== false)
    {
        die("Connection Error: ".mysqli_connect_error());
    }

?>