<?php
    $UPLOAD_DIR = 'Images/';
    $COMPUTER_DIR = '/home/jadrn024/public_html/proj3/Images/';
    $fname = $_FILES['photograph']['name'];
    $message = "";

        
    if($_FILES['photograph']['error'] > 0) {
    	$err = $_FILES['photograph']['error'];	
        $message .= "Error Code: $err ";
        }     
             
    else {
        move_uploaded_file($_FILES['photograph']['tmp_name'], "$UPLOAD_DIR".$fname);
        $message = "Success! Your file has been uploaded to the server</br >\n";
    }         
    echo $message;
?>  

