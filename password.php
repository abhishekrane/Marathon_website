<?php

if($_GET) exit;
if($_POST) exit;

$pass = array('cs545','Abhishek','Rane','sdsu');

#### Using SHA256 #######
$salt='$5$R$4hd5hl]oq12f65';  # 12 character salt starting with $1$

for($i=0; $i<count($pass); $i++) 
        echo crypt($pass[$i],$salt)."</br>\n";
?>