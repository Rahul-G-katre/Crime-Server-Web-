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
				var adress = document.getElementById("adress");
                var pincode = document.getElementById("pincode");
                var police = document.getElementById("police");
				
                var password = document.getElementById("password");
                var confirmpassword = document.getElementById("confirm password");
            
                if(firstname.value =="" || middlename.value=="" || lastname.value=="" || gender.value=="" || mobilenumber.value=="" ||
                 email.value=="" || adress.value=="" || pincode.value=="" || police.value=="" || password.value=="" || confirmpassword.value=="")
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
			$adress = $_POST['adress'];
			$pincode = $_POST['pincode'];
            $police = $_POST['police'];
            $password = $_POST['password'];
            $confirmpassword = $_POST['confirmpassword'];
        
            $query = "INSERT INTO `policeuser` (`name`, `email`, `adress`,`pincode`, `password`, `gender`, `mobile`, `police`) VALUES ('$name', '$email', '$adress','$pincode', '$password', '$gender', '$mobilenumber', '$police');";
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
			<label>Adress : </label>
            <input type="text" placeholder="adress" size="60" id="adress" name="adress"><br><br>
			
			<label>pincode : </label>
            <input type="text" placeholder="pincode" size="30" id="pincode" name="pincode"><br><br>
			
            <label>Police ID </label>
            <input type="text" name="police" id="police"><br><br>
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

