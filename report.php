
<?xml version="1.0" encoding="utf-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<title>A Login Example</title>
	<meta http-equiv="content-type" 
		content="text/html;charset=utf-8" />                 

<link rel="stylesheet" href="report.css" type="text/css">    	
</head>
<body>





<script type="text/javascript">
document.login.user.focus();
</script>
<?php

if (!empty($_POST)) {
    # code...

$password = $_POST['pass'];
  		


$raw = file_get_contents('PasswordData.txt');
$data = explode("\n",$raw);
foreach($data as $item) {
    
    if(crypt($password,$item) === $item) 
            $valid = true;            
    }  
    
if($valid){

    echo "<h1>Runner's Report</h1>";
 $server = 'opatija.sdsu.edu:3306';
 $user = 'jadrn051';
 $password = 'emulsion';
 $database = 'jadrn051';
 if(!($db = mysqli_connect($server,$user,$password,$database)))
    echo "ERROR in connection ".mysqli_error($db);
 else {

         echo "<h1>Adult</h1>";
 	
    $sql = "select  name, lastName, experience, Dob, Filename, category from racer where category = 'adult' order by lastName;";    
    $sql2 = "select  name, lastName, experience, Dob, Filename, category from racer where category = 'teen' order by lastName;"; 
    $sql3 = "select  name, lastName, experience, Dob, Filename, category from racer where category = 'senior' order by lastName;";   
    $result = mysqli_query($db, $sql);
    $result2 = mysqli_query($db, $sql2);
    $result3 = mysqli_query($db, $sql3);
    if(!result)
        echo "ERROR in query".mysqli_error($db);
    echo "<table>\n";
    echo
   
"<tr><td>last Name</td><td>Name</td><td>Age</td><td>experience</td><td>Category</td><td>Runner's Image</td></tr>";
    while($row=mysqli_fetch_row($result)) {
        echo "<tr>";
        
		
        // age calculation referenced from: https://stackoverflow.com/questions/3776682/php-calculate-age
		$birthday = $row[3];

		$birthday = explode("/", $birthday);

		$age = (date("md", date("U", mktime(0, 0, 0, $birthday[0], $birthday[1], $birthday[2]))) > date("md")
    			? ((date("Y") - $birthday[2]) - 1)
    			: (date("Y") - $birthday[2]));
    	echo "<td>$row[1]</td>";
    	echo "<td>$row[0]</td>";
		echo "<td>$age</td>"; 
		echo "<td>$row[2]</td>";
		echo "<td>$row[5]</td>";
		echo "<td><img class='profile' src='http://jadran.sdsu.edu/~jadrn051/proj3/img_51/$row[4]'></td>";
        echo "</tr>\n";
        }

        //////////////////////
echo "</table>\n";

echo "<br/> <br/>\n";
echo "<h1>Teen</h1>";
echo "<table>\n";
    echo
   
"<tr><td>last Name</td><td>Name</td><td>Age</td><td>experience</td><td>Category</td><td>Runner's Image</td></tr>";
    while($row=mysqli_fetch_row($result2)) {
        echo "<tr>";
        
		
        // age calculation referenced from: https://stackoverflow.com/questions/3776682/php-calculate-age
		$birthday = $row[3];

		$birthday = explode("/", $birthday);

		$age = (date("md", date("U", mktime(0, 0, 0, $birthday[0], $birthday[1], $birthday[2]))) > date("md")
    			? ((date("Y") - $birthday[2]) - 1)
    			: (date("Y") - $birthday[2]));
    	echo "<td>$row[1]</td>";
    	echo "<td>$row[0]</td>";
		echo "<td>$age</td>"; 
		echo "<td>$row[2]</td>";
		echo "<td>$row[5]</td>";
		echo "<td><img class='profile' src='http://jadran.sdsu.edu/~jadrn051/proj3/img_51/$row[4]'></td>";
        echo "</tr>\n";
        }
        echo "</table>\n";
       ////////////////////////


echo "<br/> <br/>\n";
echo "<h1>Senior</h1>";
echo "<table>\n";
    echo
   
"<tr><td>last Name</td><td>Name</td><td>Age</td><td>experience</td><td>Category</td><td>Runner's Image</td></tr>";
    while($row=mysqli_fetch_row($result3)) {
        echo "<tr>";
        
		
        // age calculation referenced from: https://stackoverflow.com/questions/3776682/php-calculate-age
		$birthday = $row[3];

		$birthday = explode("/", $birthday);

		$age = (date("md", date("U", mktime(0, 0, 0, $birthday[0], $birthday[1], $birthday[2]))) > date("md")
    			? ((date("Y") - $birthday[2]) - 1)
    			: (date("Y") - $birthday[2]));
    	echo "<td>$row[1]</td>";
    	echo "<td>$row[0]</td>";
		echo "<td>$age</td>"; 
		echo "<td>$row[2]</td>";
		echo "<td>$row[5]</td>";
		echo "<td><img class='profile' src='http://jadran.sdsu.edu/~jadrn051/proj3/img_51/$row[4]'></td>";
        echo "</tr>\n";
        }
        echo "</table>\n";






    mysqli_close($db);
    }
    }



else{
	echo "
	<form method=\"post\" 
      
      name=\"login\">
<h1>
Password: <input type=\"password\" name=\"pass\" /><br />
</h1>
<h1>
<input type=\"reset\" value=\"Clear\" />
<input type=\"submit\" value=\"Log In\" />
</h1>

   <h1>Login Unsuccessful</h1> 
    <h1>Incorrect Password! Try again</h1>
    </form>
    "; 

  }

}
else
{
    echo "
    <form method=\"post\" 
      
      name=\"login\">
<h1>
Password: <input type=\"password\" name=\"pass\" /><br />
</h1>
<h1>
<input type=\"reset\" value=\"Clear\" />
<input type=\"submit\" value=\"Log In\" />
</h1>
</form>";

}



?>




</body>
</html>
