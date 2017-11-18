<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">


<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;
    charset=iso-8859-1" />
    <title>Confirmation</title>
<link rel="stylesheet" type="text/css" href="/~jadrn024/proj3/CSS/Signup.css" />
</head>
<body>
    <ul class="tab">
        <li><a href="/~jadrn024/proj3/index.html" >Home</a></li>
    </ul>
    <div class = "wrapper">
<?php
echo <<<ENDBLOCK
    <h1>$params[0], thank you for registering. Below is snapshot of information logged</h1>
    <table>
        <tr>
            <td>Name</td>
            <td>$params[0] $params[1] $params[2]</td>
        </tr>
        <tr>
            <td>Address</td>
            <td>$params[3] $params[4]</td>
        </tr>
        <tr>
            <td>City</td>
            <td>$params[5]</td>
        </tr>
        <tr>
            <td>State</td>
            <td>$params[6]</td>
        </tr>
        <tr>
            <td>Zip Code</td>
            <td>$params[7]</td>
        </tr>
        <tr>
            <td>Phone</td>
            <td>$params[8]</td>
        </tr>
        <tr>
            <td>email</td>
            <td>$params[9]</td>
        </tr>
        <tr>
            <td>Gender</td>
            <td>$params[10]</td>
        </tr>
        <tr>
            <td>Date of Birth</td>
            <td>$params[11]</td>
        </tr>
        <tr>
            <td>Medical Condition</td>
            <td>$params[12]</td>
        </tr>
        <tr>
            <td>Experience Level</td>
            <td>$params[13]</td>
        </tr>
        <tr>
            <td>Category</td>
            <td>$params[14]</td>
        </tr>
    </table>                          
ENDBLOCK;

?>
</div>
</body></html>
