<?php
    $servername='localhost';
    $username='root';
    $password='';
    $dbname="tma2_part2";
    $con=mysqli_connect($servername,$username,$password,$dbname);
    if(mysqli_connect_errno()){
        //display error
        die('Connect Error (' . mysqli_connect_errno() . ') ' . mysqli_connect_error());
    }
?>