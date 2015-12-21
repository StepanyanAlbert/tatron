<?php
$res= $_POST['place_id'];

$server="localhost";
$user="root";
$password=" ";
$dbname="mydb";

$link=mysqli_connect('localhost','root','','mydb');

$insert="insert into gazan(reserv_place) VALUES ('$res')";
if (mysqli_query($link, $insert)) {
    echo "New record created successfully";
} else {

    echo "Error: " . $sql . "<br>" ."<br>". mysqli_error($link);
=======
    echo "Error: " . $sql . "<br>" ;}