<!DOCTYPE html>
<html lang="en">
    <head>
        <title>User sign up page</title>
        <link rel="Stylesheet" href="usersignup.css">

        <script type="text/javascript">
            /**/
            function validate()
            {
                var firstname = document.getElementById("first name");
                var middlename = document.getElementById("middle name");
                var lastname = document.getElementById("last name");
                var gender = document.getElementById("gender");
                var mobilenumber = document.getElementById("mobile number");
                var email = document.getElementById("email");
                var adharnumber = document.getElementById("adharnumber");
                var password = document.getElementById("password");
                var confirmpassword = document.getElementById("confirm password");
            
                if(firstname.value =="" || middlename.value=="" || lastname.value=="" || gender.value=="" || mobilenumber.value=="" ||
                 email.value=="" || adharnumber.value=="" || password.value=="" || confirmpassword.value=="")
                {
                    alert("no blank value allowed");
                    return false;
                }
                else 
                {
                    true;
                }

            }
        </script>
    </head>
    <body>
        <div class="menu">
            <ul>
                <li><a href="Crime.php">Home</a></li>
            </ul>
        </div>
        <h1 align="center">User Registration </h1>
        <?php
        if(isset($_POST['signup']))
        {
            include('config.php');
            $name = $_POST['firstname'] . $_POST['middlename'] . $_POST['lastname'];
            $gender = $_POST['gender'];
            $mobilenumber = $_POST['mobilenumber'];
            $email = $_POST['email'];
            $adharnumber = $_POST['adharnumber'];
            $password = $_POST['password'];
            $confirmpassword = $_POST['confirmpassword'];
        
            $query = "INSERT INTO `user` (`name`, `email`, `password`, `gender`, `mobile`, `aadhar`) VALUES ('$name', '$email', '$password', '$gender', '$mobilenumber', '$adharnumber');";
            $query_run = mysqli_query($connection, $query);
            
            if($query_run)
            {
                echo "<script>alert('User is signed up successfully')</script>";
            }
        }
        ?>
        <form  onsubmit="return validate()"  action="#" method="POST" >
            <label>First name : </label>
            <input type="text" name="firstname" size="15" id="first name"><br><br>
            <label>Middle name : </label>
            <input type="text" name="middlename" size="15" id="middle name"><br><br>
            <label>Last name : </label>
            <input type="text" name="lastname" size="15" id="last name"><br><br>
            <label>Gender : </label>
            <input type="radio" value="Male" name="gender" id="gender">Male &nbsp;
            <input type="radio" value="Female" name="gender">Female &nbsp;
            <input type="radio" value="Others" name="gender">Others<br><br>
            <label>Mobile number : </label>
            <input type="tel" name="mobilenumber" value="+91-" id="mobile number"><br><br>
            <label>Email Id : </label>
            <input type="email" placeholder="@gmail.com" size="30" id="email" name="email"><br><br>
            <label>Aadhaar Number</label>
            <input type="text" name="adharnumber" id="adharnumber"><br><br>
            <label> Password : </label>
            <input type="password" name="password" size="15" id="password">
            <span id="messages" style="color:red;"></span><br><br>
            <label>Confirm Password</label>
            <input type="password" name="confirmpassword" size="15" id="confirm password">
            <span id="messages"></span><br><br><br><br>
             
            <button onclick="validate()" name="signup" qtype="submit">Submit</button>
    
       </form>
  
    </body>
     
</html>   

