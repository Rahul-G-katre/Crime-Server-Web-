<!DOCTYPE html>
<html lang="en">
<head>   
    <title>Crime Management Server</title>
    <link rel="Stylesheet" href="Style.css">
<script type="text/javascript">
/**/
function validate()
{
    var email = document.getElementById("email");
    var password = document.getElementById("password");

    if(email.value =="" ||password.value=="")
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
    <div class="main">
        <div clsss="navbar">
            <div class="icon">
                <h2 class="logo">MAHARASHTRA POLICE</h2>
            </div>

            <div class="menu">
                <ul>
                    <li><a href="crime.php">Home</a></li>
                    <li><a href="about.html">About</a></li>
                    <li><a href="">Police login </a></li>
                    <li><a href="crime.php">Police Registration</a></li>
                    <li><a href="contact.html">Contact</a></li>
                </ul>
            </div>
            
        </div>  
    <br><br>
         <div class="content">  
             <h1>Welcome to<br> Crime Management Server</h1><br><br><br>
             <h2>Maharashtra Police is committed to PROTECTING THE RIGHTOUS<br> WHILE CONTROLLING & ANNIHILATING THE EVIL</h2>
         </div>
         <?php 
        if(isset($_POST['login']))
        {
            include('config.php');
            $email_login = $_POST['email']; 
            $password_login = $_POST['password']; 
        
            $query = "SELECT * FROM user WHERE email='$email_login' AND password='$password_login' LIMIT 1";
            $query_run = mysqli_query($connection, $query);
        
           if(mysqli_fetch_array($query_run))
           {        
                header('Location: success.php');
                
           } 
           else
           {
                header('Location: crime.php');
           }
            
        }
        ?>
            <form onsubmit="return validate()" action="#" method="post">
             <h2>User login</h2>
             
             <input type="email" name="email" placeholder="enter email here" id="email"required>
              
             
             <input type="password" name="password" placeholder="enter password here" id="password" required>
             
             
             <button onclick="validate()" name="login" type="submit">login</button>
             
             
             <p class="link">Don't have an account<br>
             <a href="usersignup.php">Sign up </a>here</p><br><br>

             <p class="link"><a href="cforgot.html">Forgot Password</a></p>

            
             </form>
         <br><br><br><br><br><br><br><br>
         <div class="menu">
            <ul>
                <li><a href="vct.html">View crime types</a></li>
                <li><a href="miss.html">View missing person</a></li>
                <li><a href="faq.html">View FAQ's</a></li>
                <li><a href="most.html">View most wanted</a></li>
                <li><a href="news.html">View latest news</a></li>
            </ul>
        </div>
    </div>  
 
   
</body>    

</html>