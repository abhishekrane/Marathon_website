<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">


<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;
    charset=iso-8859-1" />
    <title>Confirmation Page</title>
<link rel="stylesheet" type="text/css" href="style.css" />
    

</head>


<body>
<?php



echo <<<ENDBLOCK

         <h1> Confirmation Page</h1>

    <h1>$params[0], thank you for registering.</h1>
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
            <td>$params[8]-$params[9]-$params[10]</td>
        </tr>

        <tr>
            <td>email</td>
            <td>$params[11]</td>
        </tr>

        <tr>
            <td>Gender</td>
            <td>$params[12]</td>
        </tr>

         <tr>
            <td>Photo Name</td>
            <td>$params[13]</td>
        </tr>

         <tr>
            <td>Date of Birth</td>
            <td>$params[14]/$params[15]/$params[16]</td>
        </tr>
        
        <tr>
            <td>Experience</td>
            <td>$params[17]</td>
        </tr>

        <tr>
            <td>Category</td>
            <td>$params[18]</td>
        </tr>   

        <tr>
            <td>Medical</td>
            <td>$params[19]</td>
        </tr> 

        

    </table>                          
ENDBLOCK;




?>
</body></html>