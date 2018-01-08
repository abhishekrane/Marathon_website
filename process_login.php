<!DOCTYPE html>
<html lang="en">
<head>
  <title>Marathon</title>
  <link rel="stylesheet" href="report.css">
  </head>

  <body>
  
  <?php
  	$password = $_POST['pass'];
  		
$valid = false;

$raw = file_get_contents('PasswordData.txt');
$data = explode("\n",$raw);
foreach($data as $item) {
    
    if(crypt($password,$item) === $item) 
            $valid = true;            
    }  #end foreach
    
if($valid){
    echo "<h1>Runner's Report</h1>";
 $server = 'opatija.sdsu.edu:3306';
 $user = 'jadrn051';
 $password = 'emulsion';
 $database = 'jadrn051';
 if(!($db = mysqli_connect($server,$user,$password,$database)))
    echo "ERROR in connection ".mysqli_error($db);
 else {
    $sql = "select name, lastName, experience, Dob, Filename, category from racer order by category, lastName;";    
    $result = mysqli_query($db, $sql);
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
    mysqli_close($db);
    }
    }

else{
	  echo "<h1>Login Unsuccessful</h1>";  
    echo "<h1>Incorrect Password! Try again</h1>"; 
    include 'report.php'; 
}
  
?>





  </body>
  </html>