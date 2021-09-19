<!DOCTYPE HTML>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

   <link rel="stylesheet" href="indexc1.css">
      <title>Contact Form </title>
</head>
<body>
<!----------------------------------------------validation code---------------------------------------- -->
<?php 
/*
function validator()
{
 $filename = document.forms["myform"]["file"].value;
 $len = $filename.length;
 $last = $filename.lastIndexOf(".");
 $last1 = $last + 1;
 $ext = $filename.substring(last1,len);
if($ext=="jpg" || $ext=="jpeg" || $ext=="gif" || $ext=="png") {
return true; // returned to onsubmit
}
else {
alert("Please choose file with correct file format");
return false; // returned to onsubmit
}
}*/
// define variables and set to empty values
$nameErr = $emailErr = $genderErr = $lnameErr =$numberErr = $messageErr= $fileErr="";
$fname = $email = $gender = $message = $number = $lname = $file= $date="";

//---------------------------------validation of First Name-----------------------------------

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["fname"])) {
    $nameErr = "Name is required";
  } else 
  {
    $fname = test_input($_POST["fname"]);
    $fname = ucfirst($fname);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$fname)) {
      $nameErr = "Only letters and white space allowed";
    }
  }
}

//--------------------------Validation of Message-----------------------------

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["message"])) {
    $messageErr = "please fill the message box";
  } else 
  {
    $message = test_input($_POST["message"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$message)) {
      $messageErr = "Only letters and white space allowed";
    }
  }
}
//-----------------------------Validation of Last Name-----------------------------

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["lname"])) {
      $lnameErr = "Last name is required";
    } else {
      $lname = test_input($_POST["lname"]);
      $lname = ucfirst($lname);
      // check if name only contains letters and whitespace
      if (!preg_match("/^[a-zA-Z-' ]*$/",$lname)) {
        $lnameErr = "Only letters and white space allowed";
      }
    }
}

//-------------------------------Validation of Number-----------------------------------

  if($_SERVER["REQUEST_METHOD"] == "POST"){
  if(empty($_POST["number"])){
      $numberErr="Mobile number is required";
  }
  else{
      $number =test_input($_POST["number"]);
      //check a number contails alphabet and whitspace 
      if(!preg_match("/^[0-9]*$/",$number)){
          $numberErr = "Only numbers are allowed";
      }
  }
}

//----------------------------------Validation of Email Id-----------------------------------

  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }

//-------------------------------------Validation of Gender---------------------------------------

  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }
/*
  if(empyt($_POST["date"])){
    $date= "plese select the D.O.B";
  }else{
    $date=test_input($_POST["date"]);
  }
  */

  //-----------------------------------------Validation of file----------------------------

if(empty($_POST["file"])){
    $fileErr="";
}
else
{
    $file=test_input($_POST["file"]);
    if(!preg_match("/^(jpg|JPG|gif|GIF|doc|DOC|pdf|PDF)*$/",$file)){
        $fileErr="Please upload a image file";
}
}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
<!-------------------------------------------------HTML Section ----------------------------------->
<section>
    <div class="container" >
    <h2 class="heading">
        Contact Form
    </h2>
    <form  name= "myform" method="post"action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
        <input type="radio" name="gender" value="Mr" >Mr
  <input type="radio" name="gender" value="Ms">Ms
  <input type="radio" name="gender" value="Mrs">Mrs
  <span class="error">* <?php echo $genderErr;?></span>
  <br/>           
  <label>First Name</label>
                <input type="text" name="fname"  >
                <span class="error">* <?php echo $nameErr;?></span>
        <br/>
                <label>Last Name</label>
                <input type="text" name="lname"  >
                <span class="error">* <?php echo $lnameErr;?></span>
      <br/>
          
                <label>Date Of Birth</label>
                <input type="date" name="date" placeholder="D.O.B">
      <br/>
          
                <label>Phone Number</label>
                <input type="number" name="number" maxlength="10" >
                <span class="error">*<?php echo $numberErr;?></span>
      <br/>

                <label>File Upload</label>
                <input type="file" name="file"  placeholder="Choose File">
               <span class="error"></span><br/> 
                <label>Email</label>
                <input type="email" name="email"  placeholder="Ex:abc@gmail.com">
                <span class="error">*<?php echo $emailErr;?></span>
      <br/>

                <label>Message</label>
                <textarea name="message" placeholder="Type Here...."></textarea>
     <br/>
            <div class="submit">
               <input type="submit" name="submit" value="Submit" >
            </div>
            
</section>
</form>
</div>
</div>
</body>
</html>

<!----------------------------------Output----------------------------------------------->

<?php 
echo "<div>Thank You</div>" .$gender . "&nbsp" .$fname . "&nbsp".$lname;
echo "<br>";
echo  "<div>Your Phone Number :$number </div>";
echo "<div>Your Email ID : $email </div>";
echo "<div>Message : $message</div>";
echo "<br>";
echo $date;
?>
