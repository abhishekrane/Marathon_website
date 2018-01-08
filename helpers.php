<?php

$bad_chars = array('$','%','?','<','>','php');

function check_post_only() {
if(!$_POST) {
    write_error_page("This scripts can only be called from a form.");
    exit;
    }
}

function write_error_page($msg) {
    write_header();
    echo "<h2>Sorry, an error occurred<br />",
    $msg,"</h2>";
    write_footer();
    }
    
function write_header() {
print <<<ENDBLOCK
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <Script type="text/javascript" src="function.js"></script>

 <link rel="stylesheet" href="abhi.css" type="text/css">
    
</head>
<body>    
ENDBLOCK;
}

function write_footer() {
    echo "</body></html>";
    }
    
function get_db_handle() {
    ########################################################
    # DO NOT USE jadrn000, DO NOT MODIFY jadnr000 DATABASE!
    ########################################################            
    $server = 'opatija.sdsu.edu:3306';
    $user = 'jadrn051';
    $password = 'emulsion';
    $database = 'jadrn051';   
    ########################################################
        
    if(!($db = mysqli_connect($server, $user, $password, $database))) {
        write_error_page('SQL ERROR: Connection failed: '.mysqli_error($db));
        }
    else{
        echo "Connected";
        return $db;

    }
    }        
       
function close_connector($db) {
    mysqli_close($db);
    }
    
?>
