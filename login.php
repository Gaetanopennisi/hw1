<?php
    include 'auth.php';
    if(checkAuth()){
        header('Location: index.php');
        exit;
    }


  if(!empty($_POST["username"]) && !empty($_POST["password"]))
  {     
    $conn=mysqli_connect("localhost","root","","hm1");
    $username=mysqli_real_escape_string($conn, $_POST["username"]);
    $password=mysqli_real_escape_string($conn, $_POST["password"]);
    $query="SELECT * FROM users WHERE username='$username'";
    $res= mysqli_query($conn, $query) or die(mysqli_error($conn));;
    if(mysqli_num_rows($res)>0)
    {
     $login = mysqli_fetch_assoc($res);
     if (password_verify($_POST['password'], $login['password'])) {
       $_SESSION["username"]=$_POST["username"];
       $_SESSION["userid"]=$login['id'];
       header("Location: home.php");
       mysqli_free_result($res);
       mysqli_close($conn);
       exit;
     }
     else{
       $error=true;
     }
    }
    else{
      $error=true;
    }
       
  }
  
    ?>
    
<!DOCTYPE html>
<html>
    <link rel="stylesheet" href="login.css">
    <head>
      <meta charset="utf-8">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Anton&family=BIZ+UDMincho&family=Lora&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
        
        <title> McDonald_login </title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
    <img src="img_hw1/mcDonald's-logo.jpg">
    <div class="contenitore">
      
        <div class="container">
            <form action="" method="POST" name="login">
                <div class="head">
                    <span>Accedi</span>
                    <?php
                     if(isset($error)){
                      echo "Credenziali sbagliate";
                     }
                     ?>
                  </div>

                <div class="inputs">
                    <p>
                    <label>Username<input type="text" name= "username" placeholder="Username"></label>
                    </p>
                    <p>
                    <label>Password<input type="password" name="password" placeholder="Password"></label>
                    </p>
                  </div>
                <label>&nbsp;<input type="submit" name="login" id="login" action='mhw3.php' value="Login" ></label>
            </form>
            <div class="form-footer">
                <p>Non hai un account? <a href="signup.php">Registrati</a></p> 
            </div>
    
        </div>

    </div>
</body>