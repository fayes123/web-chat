<?php

$nameserver="localhost";
$username="root";
$pass="";
$nameDB="chat";

$conn = mysqli_connect($nameserver, $username, $pass, $nameDB);

if(!$conn){
    die(print_r(mysqli_connect_error()));
}