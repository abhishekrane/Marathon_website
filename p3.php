<?php

function validate_data($params) {
    $msg = "";
    if(strlen($params[0]) == 0)
        $msg .= "Please enter the First name<br />";  
    if(strlen($params[2]) == 0)
        $msg .= "Please enter the Last name<br />"; 
    if(strlen($params[3]) == 0)
        $msg .= "Please enter the address <br />"; 
    if(strlen($params[5]) == 0)
        $msg .= "Please enter the City<br />";                        
    if(strlen($params[6]) == 0)
        $msg .= "Please enter the state <br />";
    if(strlen($params[7]) == 0)
        $msg .= "Please enter the zip <br />";
  

    if(strlen($params[8]) == 0){
		$msg .= "Please enter your phone area code<br /";
	} elseif(!preg_match("/^[0-9]*$/",$params[8])){
		$msg .= "Only numbers allowed for phone area code<br />";
	} elseif(strlen($params[8]) != 3  ){
		$msg .= "Enter in 3 digits for phone area code<br />";
	}

	if(strlen($params[9]) == 0){
		$msg .= "Please enter your 3 digits of your number<br /";
	} elseif(!preg_match("/^[0-9]*$/",$params[9])){
		$msg .= "Only numbers allowed for  3 digits of phone number<br />";
	} elseif(strlen($params[9]) != 3 ){
		$msg .= "Enter in 3 digits for 3 digits of phpne number<br />";
	}

	if(strlen($params[10]) == 0){
		$msg .= "Please enter your last 4 digits of your number<br /";
	} elseif(!preg_match("/^[0-9]*$/",$params[10])){
		$msg .= "Only numbers allowed for last 4 digits of phone number<br />";
	} elseif(strlen($params[10]) != 4 ){
		$msg .= "Enter in 4 digits for last 4 digits of phone<br />";
	}




    if(strlen($params[11]) == 0)
        $msg .= "Please enter email<br />";
    elseif(!filter_var($params[11], FILTER_VALIDATE_EMAIL))
        $msg .= "Your email appears to be invalid<br/>"; 

    if(strlen($params[12]) == 0)
        $msg .= "Please enter the gender <br />";
    if(strlen($params[13]) == 0)
        $msg .= "Please enter the user_pic <br />";  



	if(empty($params[14])){
		$msg .= "Please enter your birth month<br /";
	} elseif(!preg_match("/^[0-9]*$/",$params[14])){
		$msg .= "Only numbers allowed for birth month<br />";
	} elseif(strlen($params[14]) != 2 ){
		$msg .= "Enter  2 digits for month<br />";
	} 

	if(empty($params[15])){
		$msg .= "Please enter your birth day<br /";
	} elseif(!preg_match("/^[0-9]*$/",$params[15])){
		$msg .= "Only numbers allowed for birth day<br />";
	} elseif(strlen($params[15]) != 2 ){
		$msg .= "Enter 2 digits for birth day <br />";
	}

	if(empty($params[16])){
		$msg .= "Please enter your birth year<br /";
	} elseif(!preg_match("/^[0-9]*$/",$params[16])){
		$msg .= "Only numbers allowed for birth year<br />";
	} elseif(strlen($params[16]) != 4 ){
		$msg .= "Enter in 4 digits for birth year<br />";
	}

	if(!checkdate($params[14], $params[15], $params[16])){
		$msg .="Invalid birthday<br/>"; 
	}

	// age calculation referenced from: https://stackoverflow.com/questions/3776682/php-calculate-age
	$age = (date("md", date("U", mktime(0, 0, 0, $params[14], $params[15], $params[16]))) > date("md")
    			? ((date("Y") - $params[16]) - 1)
    			: (date("Y") - $params[16]));

	if($age < 18 || $age > 100) {
		$msg .="Sorry only for runners between age 18-99 <br/>";
	}


    if(strlen($params[17]) == 0)
        $msg .= "Please enter the category <br />";
    if(strlen($params[18]) == 0)
        $msg .= "Please enter the experience <br />";

   
    if($msg) {
        write_form_error_page($msg);
        exit;
        }
    }
  
function write_form_error_page($msg) {
    write_header();
    echo "<h2>Sorry, an error occurred<br />",
    $msg,"</h2>";
    write_form();
    write_footer();
    }  
    
function write_form() {
    print <<<ENDBLOCK
	
	
      
       <form class="form-horizontal"  id="Register" enctype="multipart/form-data"  method="post" action="process_request.php">
    
    <div class="container2">
      <h1>Registration Form</h1>

              <div class="form-group">
                 <label for="firstName" class="col-sm-3 control-label">First Name</label>
                    <div class="col-sm-9">
                    <input type="text" id="firstName" name="firstName" value="$_POST[firstName]" placeholder="First Name" class="form-control" autofocus required="required" >          
                    </div>
              </div>

               <div class="form-group">
                 <label for="middleName" class="col-sm-3 control-label">Middle Name</label>
                   <div class="col-sm-9">
                     <input type="text" id="middleName" name="middleName" value="$_POST[middleName]" placeholder="Middle Name (Optional)" class="form-control" >
                   </div>
                </div>

        <div class="form-group">
            <label for="lastName" class="col-sm-3 control-label">Last Name</label>
              <div class="col-sm-9">
                <input type="text" id="lastName" name="lastName" value="$_POST[lastName]" placeholder="Last Name" class="form-control"  required="required">
             </div>
        </div>


               <div class="form-group">
                 
                   <label for="address" class="col-sm-3  control-label">Address</label>
                        <div class="col-sm-9">
                        <input type="text" id="address" name="address1" value="$_POST[address1]" placeholder="Address 1" class="form-control"  required="required">
                         <input type="text"  name="address2" value="$_POST[address2]" placeholder="Address 2 (Optional)" class="form-control" >
                      </div>
              </div>


            <div class="form-group">
              
               <label for="city" class="col-sm-3 control-label">City</label>
                 <div class="col-sm-9">
                   <input type="text" id="city" name="city" value="$_POST[city]" placeholder="Enter City Name Here.." class="form-control"  required="required">
                 </div> 
            </div>

                <div class="form-group">

              <label for="state" class="col-sm-3 control-label">State</label>
                   <div class="col-sm-9">
                   <input type="text" id="state" name="state" value="$_POST[state]" placeholder="Enter State Name Here.." class="form-control"  required="required">
                </div>  
              </div>



              <div class="form-group">
                <label for="zip" class="col-sm-3 control-label">Zip</label>
                  <div class="col-sm-9">
                    <input type="text" id="zip" name="zip" value="$_POST[zip]" placeholder="Enter Zip Name Here.." class="form-control" maxlength="5" required="required">
                  </div>  
              </div>



              <div class="form-group">
                 <label for="phone" class="col-sm-3 control-label">Phone Number</label>
                 <div class="col-sm-9" >
                    (<input type="text" name="area_phone" id="area_phone" class="phone" value="$_POST[area_phone]"  required="required" maxlength="3" minlength="3" />)- 
                     <input type="text" name="prefix_phone" id="prefix_phone" class="phone" value="$_POST[prefix_phone]" required="required"  maxlength="3" minlength="3" />-
                   <input type="text" name="phone" id="phone" class="phone" value="$_POST[phone]" required="required"  maxlength="4" minlength="4" />
                </div> 
              </div>
      


              <div class="form-group">
                     <label for="email" class="col-sm-3 control-label">Email</label>
                        <div class="col-sm-9">
                        <input type="email" id="email" name="email" value="$_POST[email]" placeholder="Email" class="form-control"  required="required"> 
                    </div>
              </div>

              
              <div class="form-group">
                    <label class="control-label col-sm-3">Gender</label>
                    <div class="col-sm-9">
                        <div class="row">
                           <div class="col-sm-4">
                           <input type="radio" name="gender" value="male" id="male" required="required" /> Male </div>
                              <div class="col-sm-4">      
                              <input type="radio" name="gender" value="female" id="female"/> Female </div>
                           <div class="col-sm-4">
                           <input type="radio" name="gender" value="others" id="others"/> Others </div>
                          </div>
                    </div>
              </div>

         


            <div class="form-group">
              <label for="image" class="col-sm-3 control-label" >Image</label>
                <div class="col-sm-9" >
                  <input class="col-sm-9" type="file" name="user_pic" value="$_POST[user_pic]" id="image" accept="image/*"  required="required"/>
                  <input type="button" id="fbutton" value="validate " />
                </div>
            </div>
          

            <div class="form-group">
                <div class="col-sm-9 col-sm-offset-3"></div>
                    <label for="birthDate" class="col-sm-3 control-label">Date of Birth</label>
                    <div class="col-sm-9" >
                       month <input type="text" id="birthDate" size="2" name="month" value="$_POST[month]" required="required"/>
                       day <input type="text" size="2" name="day" value="$_POST[day]" required="required"/>
                     year<input type="text" size="2"  name="year" value="$_POST[year]" required="required"/>

                     <input type="button" id="validate" value="Validate " >
                    </div>
                </div>
     
            


            <div class="form-group">
              <label for="category" class="col-sm-3 control-label" >Category</label>
                <div class="col-sm-9">
                  <div class="row">
                      <div class="col-sm-4">
                      <input type="radio" name="category" value="teen" id="category"  required="required"/> Teen </div>
                    <div class="col-sm-4">      
                    <input type="radio" name="category" value="adult" /> Adult </div>
                  <div class="col-sm-4">
                  <input type="radio" name="category" value="senior" /> Senior </div>
                </div>
            </div>
          </div>


            <div class="form-group">
               <div class="col-sm-9 col-sm-offset-3"></div>
                    <label for="experience" class="col-sm-3 control-label">Experience Level</label>
                    <div class="col-sm-9">
                          <select  id="experience" name="experience" class="form-control"  required="required" >
                              <option value="">Select Experience Level</option>
                              <option value="Expert">Expert</option>
                              <option value="Experienced">Experienced</option>
                              <option value="Novice">Novice</option>
                          </select> 
                    </div>

                </div> 



            <div class="form-group">
              <label class="col-md-3 control-label" for="medical">Medical Condition</label>
               <div class="col-md-9">                     
                  <textarea class="form-control" id="medical" name="medical" value="$_POST[medical]" placeholder="Enter here"  ></textarea>
               </div>
            </div>


                



                <div class="form-group">
                    <div class="col-sm-9 col-sm-offset-3">
                        <button type="submit" class="btn btn-primary btn-block" id="Reg">Register</button>
                    </div>
                </div> 
     </div>
  </form> <!-- /form -->




		
ENDBLOCK;

	
ENDBLOCK;
}                        

function process_parameters($params) {
    global $bad_chars;
    $params = array();

    $params[] = trim(str_replace($bad_chars, "",$_POST['firstName'])); 
    $params[] = trim(str_replace($bad_chars, "",$_POST['middleName']));
    $params[] = trim(str_replace($bad_chars, "",$_POST['lastName']));

    $params[] = trim(str_replace($bad_chars, "",$_POST['address1']));
    $params[] = trim(str_replace($bad_chars, "",$_POST['address2']));
    $params[] = trim(str_replace($bad_chars, "",$_POST['city']));
    $params[] = trim(str_replace($bad_chars, "",$_POST['state']));
    $params[] = trim(str_replace($bad_chars, "",$_POST['zip']));
    
     $params[] = trim(str_replace($bad_chars, "",$_POST['area_phone']));
    $params[] = trim(str_replace($bad_chars, "",$_POST['prefix_phone']));
    $params[] = trim(str_replace($bad_chars, "",$_POST['phone']));

    $params[] = trim(str_replace($bad_chars, "",$_POST['email']));
    $params[] = trim(str_replace($bad_chars, "",$_POST['gender']));
    $params[] = trim(str_replace($bad_chars, "",$_FILES['user_pic']['name']));

     $params[] = trim(str_replace($bad_chars, "",$_POST['month']));
    $params[] = trim(str_replace($bad_chars, "",$_POST['day']));
    $params[] = trim(str_replace($bad_chars, "",$_POST['year']));

    $params[] = trim(str_replace($bad_chars, "",$_POST['category']));
    $params[] = trim(str_replace($bad_chars, "",$_POST['experience']));
    $params[] = htmlspecialchars(trim(str_replace($bad_chars, "",$_POST['medical'])));
    // $params[] = trim(str_replace($bad_chars, "",$_POST['name']));
    // $params[] = trim(str_replace($bad_chars, "",$_POST['name']));

    return $params;
    }
    
function store_data_in_db($params) {
     include('upload_pic.php');
    # get a database connection
    $db = get_db_handle();  ## method in helpers.php
    $dob = $params[14] . '/' . $params[15] . '/' . $params[16];
    $phone = $params[8] . $params[9] .  $params[10];
    ##############################################################
//     $sql = "SELECT * FROM racer WHERE ".
//     // "name='$params[0]' AND ".
//     // "address = '$params[1]' AND ".
//     // "city = '$params[2]' AND ".
//     // "state = '$params[3]' AND ".
//     // "zip = '$params[4]' AND ".
//     // "email = '$params[5]';";
// ##echo "The SQL statement is ",$sql;    
//     $result = mysqli_query($db, $sql);
//     if(mysqli_num_rows($result) > 0) {
//         write_form_error_page('This record appears to be a duplicate');
//         exit;
//         }
##OK, duplicate check passed, now insert
   $sql = "INSERT INTO racer (id, name, middleName,lastName, address1, address2, city, state, zip, email, mobileNumber, gender, Filename, Dob, category, experience, medical) ".
    "VALUES(0,'$params[0]','$params[1]','$params[2]','$params[3]','$params[4]','$params[5]','$params[6]','$params[7]','$params[11]','$phone','$params[12]','$params[13]','$dob','$params[17]','$params[18]','$params[19]');";
##echo "The SQL statement is ",$sql;    
    $result = mysqli_query($db,$sql);
  
    $how_many = mysqli_affected_rows($db);
    
    close_connector($db);
    }
        
?>   