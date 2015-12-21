<?php
$name=$_POST['name'];
$surname=$_POST['surname'];

$server="localhost";
$user="root";
$password=" ";
$dbname="mydb";

$link=mysqli_connect('localhost','root','','mydb');
if(!$link){
    echo mysqli_errno($link);
}

$sql = "CREATE TABLE  if not EXISTS gazan(
id INT  UNSIGNED  PRIMARY KEY AUTO_INCREMENT,
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
email VARCHAR(50)
)";

if (mysqli_query($link, $sql)) {
    echo "Table MyGuests created successfully";
} else {
    echo "Error creating table: " . mysqli_error($link);
}
$insert="insert into gazan(firstname,lastname,email) VALUES ('Albert','Stepanyan','abo@mail.ru')";
if (mysqli_query($link, $insert)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($link);
}
$sql_statement="";
$db_selected = mysqli_select_db('gazan', $link);
if (!$db_selected) {
    die ('Не удалось выбрать базу gazan: ' . mysqli_error());
}


var_dump($db_selected);
echo $_POST['place_id'];
mysqli_close($link);
