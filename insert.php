<?php
$firstname = $_POST['firstname'];
$middlename = $_POST['middlename'];
$lastname = $_POST['lastname'];
$gender = $_POST['gender'];
$mobilenumber = $_POST['mobilenumber'];
$email = $_POST['email'];
$adharnumber = $_POST['adharnumber']
$password = $_POST['password'];
$confirmpassword = $_POST['confirmpassword'];

if (!empty($firstname) || !empty($middlename) || !empty($lastname) || !empty($gender) ||
 !empty$mobilenumber () || !empty($email) || !empty($adharnumber) || !empty($password) || !empty($confirmpassword)) {
    $host = "localhost";
    $dbUsername = "root";
    $dbpassword = "";
    $dbname = "user registration"

    //create connection
    $conn = new mysql($host, $dbUsername, $dbpassword, $dbname);

    if (mysqli_connect_error()){
        die('Connect Error('. mysqli_connect_error().')'. mysqli_connect_error());
    } else {
        $SELECT = "SELECT email From register Where email = ? Limit 1";
        $INSERT = "INSERT Into register (firstname, middlename, lastname, gender, mobilenumber, email, adharnumber
         password, confirmpassword) values(?, ?, ?, ?, ?, ?, ?, ?) ";

         //Prepare statement
         $stmt = $conn->prepare($SELECT);
         $stmt->bind_param("s",$email);
         $stmt->execute();
         $stmt->bind_result($email);
         $stmt->store_result();
         $rnum = $stmt->num-rows;

         if ($rnum==0){
             $stmt->close();

             $stmt = $conn->prepare($INSERT);
             $stmt->bind_param("ssssii", $firstname, $middlename, $lastname, $gender, $mobilenumber, $email, $adharnumber,
                 $password, $confirmpassword);
             $stmt->execute();
             echo "New record insert sucessfully";
         } else {
             echo"Someone alredy register using this email" ;
         }
         $stmt->close();
         $conn->close();
    }
 } else{
     echo "All field required";
     die();
 }

?>
