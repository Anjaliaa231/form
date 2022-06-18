<?php
$insert=false;
if(isset($_POST['name'])){
    ///set connection variable
$server="localhost";
$username="root";
$password="";
//create databse connection
$con=mysqli_connect($server,$username,$password);
//check for connection success
if(!$con){
    die("connection to this database failed due to ".musqli_connect_error());

}
// echo"success connecting to the database";


//collect post variables
$name=$_POST['name'];
$age=$_POST['age'];
$email=$_POST['email'];
$phone=$_POST['mobile'];
$dob=$_POST['date'];
$detail=$_POST['desc'];

$sql="INSERT INTO `form`.`profileofstudent` (`name`, `age`, `email id`, `phone`, `dob`, `details`, `time`) VALUES ( '$name', '$age', '$email', '$phone', '$dob', '$detail ', current_timestamp());";
// echo $sql;
//execute the query
if($con->query($sql)==true){
    // echo"successfully inserted";

    //flag for successful insertion
    $insert=true;
}
else{
    echo"error :$sql<br>$con->error";
}
//close the database connection
$con->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>form</title>
</head>
<link rel="stylesheet" href="style.css">
<body>
    <img class="background" src="online img.jpg" alt="kist" style="width: 100%;  z-index: -1;height: -webkit-fill-available;position:absolute;";>

    <div class="container">
       <h1>FILL THE FORM</h1>
       <h3>Enter your biodata</h3>
       <?php
       if($insert==true){
       echo"<p class='submitmsg'>thanks for submitting your form</p>";}
       ?>    

           <form action="index.php" method="post">
               <input type="text" name="name" id="name" placeholder="enter your name">
               <input type="number" name="age" id="age" placeholder="enter your age">
               <input type="email" name="email" id="email" placeholder="enter your email id">
               <input type="mobile" name="mobile" id="mobile" placeholder="enter your phone number">
               <input type="date" name="date" id="date" placeholder="enter your date of birth">
               <textarea name="desc" id="desc" cols="30" rows="10" placeholder="other details"></textarea>
               <button class="btn">submit</button>
            </div>
        
    </form>
    <script src="index.js">

    </script>
    <!-- INSERT INTO `profileofstudent` (`sno`, `name`, `age`, `email id`, `phone`, `dob`, `details`, `time`) VALUES ('1', 'soni', '20', 'email.com', '123457890', '10032001', 'my name is soni', current_timestamp()); -->
</body>
</html>