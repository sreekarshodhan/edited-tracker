<?php
$showAlert = false;
$showError=false;
$login = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'partials/dbconnect.php';
    
    $useremail = $_POST['email'];
    $password = $_POST['pwd'];
    $sql = "Select * from userdata where email='$useremail' AND password='$password'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if($num==1)
    {   
        $login = true;
    }
}
?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://kit.fontawesome.com/0a4a968d76.js" crossorigin="anonymous"></script>
        <link rel = "stylesheet" href ="signin.css">
    </head>
    <body>
<?php
  if($login)
  {
    echo ' <div class= "alert alert-success alert-dismissible fade show" role="alert">
    <strong?>Success!</strong> You are logged in.
    <button type = "button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
    </div> ';
    header('Location:home.php');
  }
else{
    echo ' <div class= "alert alert-success alert-dismissible fade show" role="alert">
    <strong?></strong>Invalid credentials.
    <button type = "button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
    </div> ';
    echo '<div class="hero">
            <div class="formbox">
            <div class="button-box">
                <div id="colorbtn"></div>
                <button type="button" class="toggle-btn0" onclick="login()">Login</button>
                <button type="button" class="toggle-btn1" onclick="register()">Register</button></div>
                <form method="post" class= "form0" id="Login" action="login.php">
                    <!--<div class="icon-div"><i class="fa fa-user fa-2x icon"></i></div>-->
                    <!--<div><i class="fa fa-user fa-4x mb-2"></i></div>-->
                    <i class="fas fa-envelope mb-3"></i>
                    <label for = "email" class="elabel">Email:</label><br>
                    <input type = "email" class="input-group mb-2 form-control input-field" id="email" name="email" placeholder="Email Address" required autofocus><br>
                    
                    <i class="fa fa-lock mb-3"></i>
    
                    <label for = "password" class="plabel">Password:</label><br>
                    <input type = "password" class="input-group form-control input-field" id="pwd" name="pwd" placeholder="Password" required autofocus><br>
                    
                    <input type= "submit" class="btn btn-primary submit form-control mb-3" value="Submit">
    
                    <input type="checkbox" id="remember" name="remember">
                    <label for="remember" class= "remember">Remember me</label>
                    <a class ="fpwd" href="forgotpwd.html">Forgot password?</a>
    
                </form>
                <form method="post" id= "register" class= "form0" action="register.php">
                    <label for = "uid" class="ulabel">User ID:</label><br>
                    <input type = "text" class="uid mb-2 form-control input-field" id="uid" name="uid" placeholder="User ID" required autofocus><br>
                    <i class="fas fa-envelope mb-3"></i>
                    <label for = "email" class="elabel">Email:</label><br>
                    <input type = "email" class=" input-group input-field mb-2 form-control" id="email" name="email" placeholder="Email Address" required autofocus><br>
                    
                    <i class="fa fa-lock mb-3"></i>
    
                    <label for = "password" class="plabel">Password:</label><br>
                    <input type = "password" class="input-group input-field form-control" id="pwd" name="pwd" placeholder="Password" required autofocus><br>
                    <label for = "password" class="plabel">Confirm password:</label><br>
                    <input type = "password" class="input-group input-field form-control" id="cpwd" name="cpwd" placeholder="Password" required autofocus><br>
                    <input type= "submit" class="btn btn-primary submit form-control mb-3" value="Submit">  
    
                </form>
                </div>
            </div>
            
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<script>
    var x = document.getElementById("Login");
    var y = document.getElementById("register");
    var z = document.getElementById("colorbtn");

    function register(){
        x.style.left = "-750px"; 
        y.style.left = "-25px";
        y.style.top="-550px"    
        z.style.left = "220px"
    }
    function login(){
        x.style.left = "-25px"; 
        y.style.left = "750px";
        z.style.left = "0px";
    }
</script>    
</body>
</html> ';
}
?>
</body>
</html>