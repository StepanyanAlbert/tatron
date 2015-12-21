<!DOCTYPE html>
<html>
<head>
    <style>
        .color_red{
            background-color: red;
        }

    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

    <title>tatron</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/styles.css" rel="stylesheet">
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <link href="bootstrap-3.3.5-dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<form action="mysql.php" method="post">
 <input type="text" name="name" placeholder="name">
 <input type="text" name="surname" placeholder="surname">
 <input type="submit" value="send" >

</form>
<br>

<?php
$server="localhost";
$user="root";
$password=" ";
$dbname="mydb";

$link=mysqli_connect('localhost','root','','mydb');
if(!$link){
    echo mysqli_errno($link);
}
$select="SELECT `reserv_place` FROM gazan";
$array=array();
$query=mysqli_query($link,$select);
while($row=mysqli_fetch_array($query)){

    $array[] = $row['reserv_place'];

}

$r=0;
echo "<table border='1px'>";
$class = '';
for($i=0; $i<6;$i++){
    echo "<tr>";

    for($k=0; $k<5;$k++){
        $class = '';
       foreach($array as $value){
           if($value == "a".$k.$i){
               $class = 'color_red';
               break;

             }

       }
       echo "<td class='$class' id=\"a$k$i\">".$r++."</td>";
    }
    echo "</tr>";
}

echo "</table>";




?>



</body>

</html>

<script>

    $(document).ready(function(){
        $("td").click(function(){
            var id= $(this).attr('id');

            $.ajax({
                type: 'POST',
                url: 'ajax.php',
                data: {place_id:id},

                success: function(result){
                 $('#'+id).addClass('color_red');


                }

            });

        });
    });



</script>