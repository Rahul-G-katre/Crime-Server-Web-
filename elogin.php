<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Police login</title>
        <link rel="Stylesheet" href="elogin.css">

        <script type="text/javascript">
            /**/
            function validate()
            {
                var text = document.getElementById("text");
                var password = document.getElementById("password");
            
                if(text.value =="" ||password.value=="")
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
                <li><a href="Crime.html">Home</a></li>
            </ul>
        </div>
        <h2 align="center">Police login</h2>
        <?php 
        if(isset($_POST['login_btn']))
        {
            include('config.php');
            $email_login = $_POST['emaill']; 
            $password_login = $_POST['passwordd']; 
        
            $query = "SELECT * FROM user WHERE email='$email_login' AND password='$password_login' LIMIT 1";
            $query_run = mysqli_query($connection, $query);
        
           if(mysqli_fetch_array($query_run))
           {
                $_SESSION['username'] = $email_login;
                $_SESSION['loginstatus'] = true;
        
                header('Location: index.php');
           } 
           else
           {
                $_SESSION['status'] = "Email / Password is Invalid";
                header('Location: login.php');
           }
            
        }
        ?>
        <form onsubmit="return validate()" action="" method>
            <input type="text" name="" placeholder="enter User Id here" id="text" required><br>
            <input type="password" name="" placeholder="enter password here" id="password" required><br>
            <button onclick="validate()" type="submit">login</button>
           
            <p class="link">Forgot password<br>
                <a href="eforgot.html">Click </a>here
            </p>
        </form>
    </body>
</html>