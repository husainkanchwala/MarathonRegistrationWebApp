<!DOCTYPE html>
<html>
<head>
         <meta charset="utf-8">
         <title>Marathon Report</title>
         <link rel="stylesheet" href="/~jadrn024/proj3/CSS/report.css" />
         <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
         <script src="/jquery/jquery.js"></script>
         <script src="/~jadrn024/proj3/JS/report.js"></script>
         <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
 </head>
<body>
  <div id="login" >
    <div id="wrapper">
      <form name="lform" class="lform" action="show_report.php" method="post">
        <div class="header">
          <h1>Login</h1>
          <span></span>
        </div>
        <div class="content">
          <input id = "passwd" name="passwd" type="password" class="input password" placeholder="Password" />
        </div>
        <div class="footer">
          <input id = "logcheck" type="submit" name="submit" value="Login" class="buttonl" />
            <input type="reset" value="Clear" class="buttonr">
        </div>
      </form>
      <p id = "error" class="error"></p>
    </div>   
    </div>      
    <div>
  </div>
 <div id="mainpage" style="display: none;">
      <ul class="tab">
          <li><a href="javascript:void(0)" class="active" onclick="tabInventory(event, 'teen')">Teen</a></li>
          <li><a href="javascript:void(0)" class="tablinks" onclick="tabInventory(event, 'adult')">Adult</a></li>
          <li><a href="javascript:void(0)" class="tablinks" onclick="tabInventory(event, 'senior')">Senior</a></li>
      </ul>
    <div id="teen" class="tabcontent" style="display: block;">
    <h1> Marathon Report of Teen participant</h1>
    
<?php
$server = 'opatija.sdsu.edu:3306';
$user = 'jadrn024';
$password = 'bottom';
$database = 'jadrn024';
if(!($db = mysqli_connect($server,$user,$password,$database)))
    echo "ERROR in connection ".mysqli_error($db);
else {
    $sql = "select category,photo,CONCAT(lname, ',', name) as fullname,  dob, experiencelevel from person where category = 'Teen' order by fullname";    
    $result = mysqli_query($db, $sql);
    if(!result)
        echo "ERROR in query".mysqli_error($db);
    echo "<table>\n";
    echo
   
"<tr><td>photo</td><td>Name</td><td>Age</td><td>Experience</td></tr>";
    while($row=mysqli_fetch_row($result)) {
        echo "<tr>";
        foreach(array_slice($row,1) as $key=>$item){
            if($key == "0") {
            echo  "<td><img id='amyImg' src='/~jadrn024/proj3/Images/"."$item"."' accept='image/*' STYLE='WIDTH:150px;HEIGHT:150px;' /></td>";
            }
           else if($key == "2"){
              $birthDate = explode("/", $item);
              $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md")
              ? ((date("Y") - $birthDate[2]) - 1)
              : (date("Y") - $birthDate[2]));
              echo "<td>$age</td>";
            }
            else{
            echo "<td>$item</td>";
           }
        }
        echo "</tr>\n";
        }
    mysqli_close($db);
    }
?>
</table>
</div>
 <div id="adult" class="tabcontent" style="display: none;">
    <h1> Marathon Report of Adult participant</h1>
<?php
$server = 'opatija.sdsu.edu:3306';
$user = 'jadrn024';
$password = 'bottom';
$database = 'jadrn024';
if(!($db = mysqli_connect($server,$user,$password,$database)))
    echo "ERROR in connection ".mysqli_error($db);
else {
    $sql = "select category,photo,CONCAT(lname, ',', name) as fullname,  dob, experiencelevel from person where category = 'Adult' order by fullname";    
    $result = mysqli_query($db, $sql);
   if(!result)
        echo "ERROR in query".mysqli_error($db);
    echo "<table>\n";
    echo
   
"<tr><td>photo</td><td>Name</td><td>Age</td><td>Experience</td></tr>";
    while($row=mysqli_fetch_row($result)) {
        echo "<tr>";
        foreach(array_slice($row,1) as $key=>$item){
            if($key == "0") {
            echo  "<td><img id='amyImg' src='/~jadrn024/proj3/Images/"."$item"."' accept='image/*' STYLE='WIDTH:150px;HEIGHT:150px;' /></td>";
            }
           else if($key == "2"){
              $birthDate = explode("/", $item);
              $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md")
              ? ((date("Y") - $birthDate[2]) - 1)
              : (date("Y") - $birthDate[2]));
              echo "<td>$age</td>";
            }
            else{
            echo "<td>$item</td>";
           }
        }
        echo "</tr>\n";
        }
    mysqli_close($db);
    }
?>
</table>
</div>
 <div id="senior" class="tabcontent" style="display: none;">
    <h1> Marathon Report of Senior participant</h1>
<?php
$server = 'opatija.sdsu.edu:3306';
$user = 'jadrn024';
$password = 'bottom';
$database = 'jadrn024';
if(!($db = mysqli_connect($server,$user,$password,$database)))
    echo "ERROR in connection ".mysqli_error($db);
else {
    $sql = "select category,photo,CONCAT(lname, ',', name) as fullname,  dob, experiencelevel from person where category = 'Senior' order by fullname";    
    $result = mysqli_query($db, $sql);
    if(!result)
        echo "ERROR in query".mysqli_error($db);
    echo "<table>\n";
    echo
   
"<tr><td>photo</td><td>Name</td><td>Age</td><td>Experience</td></tr>";
    while($row=mysqli_fetch_row($result)) {
        echo "<tr>";
        foreach(array_slice($row,1) as $key=>$item){
            if($key == "0") {
            echo  "<td><img id='amyImg' src='/~jadrn024/proj3/Images/"."$item"."' accept='image/*' STYLE='WIDTH:150px;HEIGHT:150px;' /></td>";
            }
           else if($key == "2"){
              $birthDate = explode("/", $item);
              $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md")
              ? ((date("Y") - $birthDate[2]) - 1)
              : (date("Y") - $birthDate[2]));
              echo "<td>$age</td>";
            }
            else{
            echo "<td>$item</td>";
           }
        }
        echo "</tr>\n";
        }
    mysqli_close($db);
    }
?>
</table>
</div>
</div>
</body>
</html>
