<?php

function validate_data($params) {
    $msg = "";
    if(strlen($params[0]) == 0)
        $msg .= "Please enter the name<br />";  
    if(strlen($params[3]) == 0)
        $msg .= "Please enter the address<br />"; 
    if(strlen($params[5]) == 0)
        $msg .= "Please enter the city<br />"; 
    if(strlen($params[6]) == 0)
        $msg .= "Please enter the state<br />";                        
    if(strlen($params[7]) == 0)
        $msg .= "Please enter the zip code<br />";
    elseif(!is_numeric($params[7])) 
        $msg .= "Zip code may contain only numeric digits<br />";
    if(strlen($params[9]) == 0)
        $msg .= "Please enter email<br />";
    elseif(!filter_var($params[9], FILTER_VALIDATE_EMAIL))
        $msg .= "Your email appears to be invalid<br/>";        
    if($msg) {
        write_form_error_page($msg);
        exit;
        }
    }
  
function write_form_error_page($msg) {
    write_header_confirmation();
    echo "<h2>Sorry, an error occurred<br />",
    $msg,"</h2>";
    write_footer_confirmation();
    }  

function process_parameters($params) {
    global $bad_chars;
    $params = array();
    $params[] = trim(str_replace($bad_chars, "",$_POST['name']));
    $params[] = trim(str_replace($bad_chars, "",$_POST['mname']));
    $params[] = trim(str_replace($bad_chars, "",$_POST['lname']));
    $params[] = trim(str_replace($bad_chars, "",$_POST['address1']));
    $params[] = trim(str_replace($bad_chars, "",$_POST['address2']));
    $params[] = trim(str_replace($bad_chars, "",$_POST['city']));
    $params[] = trim(str_replace($bad_chars, "",$_POST['state']));
    $params[] = trim(str_replace($bad_chars, "",$_POST['zip']));
    $params[] = trim(str_replace($bad_chars, "",$_POST['phone']));
    $params[] = trim(str_replace($bad_chars, "",$_POST['email']));
    $params[] = trim(str_replace($bad_chars, "",$_POST['radGender']));
    $params[] = trim(str_replace($bad_chars, "",$_POST['dob']));
    $params[] = trim(str_replace($bad_chars, "",$_POST['medicalcondition']));
    $params[] = trim(str_replace($bad_chars, "",$_POST['radELevel']));
    $params[] = trim(str_replace($bad_chars, "",$_POST['radCategory']));
    $params[] = trim(str_replace($bad_chars, "",$_FILES['photograph']['name']));
    return $params;
    }
    
function store_data_in_db($params) {
    $name = $params[0]." ".$params[1];
    $address = $params[3]." ".$params[4];
    # get a database connection
    $db = get_db_handle();  ## method in helpers.php
    ##############################################################
    $sql = "SELECT * FROM person WHERE ".
    "email = '$params[9]';";
    ##echo "The SQL statement is ",$sql;    
    $result = mysqli_query($db, $sql);
    if(mysqli_num_rows($result) > 0) {
        write_form_error_page('This record appears to be a duplicate');
        exit;
        }
##OK, duplicate check passed, now insert
    $sql = "INSERT INTO person(name,lname,address,city,state,zip,phone,email,gender,dob,medical_condition,experiencelevel,category,photo) ".
    "VALUES('$name','$params[2]','$address','$params[5]','$params[6]','$params[7]','$params[8]','$params[9]','$params[10]','$params[11]','$params[12]','$params[13]','$params[14]','$params[15]');";
##echo "The SQL statement is ",$sql;    
    mysqli_query($db,$sql);
    $how_many = mysqli_affected_rows($db);
    close_connector($db);
    }
        
?>   
