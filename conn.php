<?php

$conn = mysqli_connect('localhost','root','','students');


if(!$conn){
    die("Failed to connect to MySQL: " .mysqli_connect_error());
}

