<?php

$pass = $_POST['pass'];
$valid = false;

$raw = file_get_contents('passwords.dat');
$data = explode("\n",$raw);
foreach($data as $item) {
    $pair = explode('=',$item);
    if(crypt($pass,$pair[1]) === $pair[1]) 
            $valid = true;            
    }  #end foreach
    
if($valid)
    echo "Login Successful";
else
    echo $pass;     
?>
