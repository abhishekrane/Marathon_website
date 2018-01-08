<?php
$server = 'opatija.sdsu.edu:3306';
$user = 'jadrn051';
$password = 'emulsion';
$database = 'jadrn051';
if(!($db = mysqli_connect($server,$user,$password,$database)))
    echo "ERROR in connection ".mysqli_error($db);
$email =$_POST['email'];
$sql = "select * from racer where email='$email';";
mysqli_query($db, $sql);
$how_many = mysqli_affected_rows($db);
mysqli_close($db);
if($how_many > 0)
    echo "dup";
else if($how_many == 0)
    echo "OK";
else
    echo "ERROR, failure ".$how_many;
?>