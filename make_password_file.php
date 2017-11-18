<?php

if($_GET) exit;
if($_POST) exit;

$users = array('ariggins','cs545','smith','tester');
$pass = array('123abc','cs545','abc123','sdsu');

#### Using SHA256 #######
$salt='$5$R$4%^gj9@9i8mf65';  # 12 character salt starting with $1$

for($i=0; $i<count($users); $i++) 
        echo $users[$i].'='.crypt($pass[$i],$salt)."\n";
?>
