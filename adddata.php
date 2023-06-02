<?php
require_once "conn.php";
if(isset($_POST['submit'])){

    $name = $_POST['name'];
    $grade = $_POST['grade'];
    $marks = $_POST['marks'];
    $lecturer = $_POST['lecturer'];

    if($name != "" && $grade != "" && $marks !=""){
        $sql = "INSERT INTO results(`name`, `class`, `marks`, `lecturer`) VALUES ('$name', '$grade', $marks, '$lecturer')";
        if(mysqli_query($conn, $sql)){
            header("location: index.php");
        }else{
            echo "something went wrong with creating. Please try again later.";
        }
    }
    else{
        echo "Name, class and marks cannot be empty!";
    }
}