<?php
  include 'auth.php';
  if (checkAuth()) {
      header('Location: index.php');
      exit;
  }
  
  if(!empty($_POST["username"]) && !empty($_POST["password"]) && !empty($_POST["name"]) && !empty($_POST["surname"]) && !empty($_POST["email"]))
   { 
     $error= array();
     $conn = mysqli_connect("localhost", "root", "", "hm1") or die(mysqli_error($conn));
     if(!preg_match('/^[a-zA-Z0-9_]{1,15}$/', $_POST['username'])) {
      $error[] = "Username non valido";
  } else {
      $username = mysqli_real_escape_string($conn, $_POST['username']);
      $query = "SELECT username FROM users WHERE username = '$username'";
      $res = mysqli_query($conn, $query);
      if (mysqli_num_rows($res) > 0) {
          $error[] = "Username già utilizzato";
      }
  }

  if (strlen($_POST["password"]) < 8) {
      $error[] = "Caratteri password insufficienti";
  } 

  if (strcmp($_POST["password"], $_POST["confirm_password"]) != 0) {
    $error[] = "Le password non coincidono";
  }

  if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
      $error[] = "Email non valida";
  } else {
      $email = mysqli_real_escape_string($conn, strtolower($_POST['email']));
      $res = mysqli_query($conn, "SELECT email FROM users WHERE email = '$email'");
      if (mysqli_num_rows($res) > 0) {
          $error[] = "Email già utilizzata";
      }
  }  
  
  if (count($error) == 0) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $surname = mysqli_real_escape_string($conn, $_POST['surname']);

    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $password = password_hash($password, PASSWORD_BCRYPT);


    $query="INSERT INTO users (username, password, email, name, surname) VALUES('$username','$password','$email','$name','$surname')";
    if (mysqli_query($conn, $query)) {
      $_SESSION["_agora_username"] = $_POST["username"];
      $_SESSION["_agora_user_id"] = mysqli_insert_id($conn);
      mysqli_close($conn);
      header("Location: home.php");
      exit;
  } else {
      $error[] = "Errore di connessione al Database";
  }
}

mysqli_close($conn);
}
else if (isset($_POST["username"])) {
$error = array("Riempi tutti i campi");
}
?>



<!DOCTYPE html>
<html>
    <link rel="stylesheet" href="signup.css">
    <script src="signup.js" defer="true"></script>
    <head>
      <meta charset="utf-8">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Anton&family=BIZ+UDMincho&family=Lora&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
        
        <title> McDonald_signup</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
    <img src="img_hw1/mcDonald's-logo.jpg">
    <div class="contenitore">
        <div class="container">
        
        <form action="" name="iscriviti" method="POST" autocomplete="off">
        <div class='head'>
        <span id="isc">Iscriviti</span>
          </div>
          <div class='inputs'>
                    <div class="name">
                        <label for='name'>Nome</label>
                        <input type='text' name='name' placeholder="Nome" <?php if(isset($_POST["name"])){echo "value=".$_POST["name"];} ?> >
                        <div><span>Devi inserire il tuo nome</span></div>
                    </div>
                    <div class="surname">
                        <label for='surname'>Cognome</label>
                        <input type='text' name='surname' placeholder="Cognome" <?php if(isset($_POST["surname"])){echo "value=".$_POST["surname"];} ?> >
                        <div><span>Devi inserire il tuo cognome</span></div>
                    </div>
                <div class="username">
                    <label for='username'>Nome utente</label>
                    <input type='text' name='username' placeholder="Username" <?php if(isset($_POST["username"])){echo "value=".$_POST["username"];} ?>>
                    <div><span>.</span></div>
                </div>
                <div class="email">
                    <label for='email'>E-mail</label>
                    <input type='text' name='email'placeholder="E-mail"  <?php if(isset($_POST["email"])){echo "value=".$_POST["email"];} ?>>
                    <div><span>.</span></div>
                </div>
                <div class="password">
                    <label for='password'>Password</label>
                    <input type='password' name='password' placeholder="Password"  <?php if(isset($_POST["password"])){echo "value=".$_POST["password"];} ?>>
                    <div><span>.</span></div>
                </div>
                <div class="confirm_password">
                    <label for='confirm_password'>Conferma Password</label>
                    <input type='password' name='confirm_password' placeholder="Conferma password" <?php if(isset($_POST["confirm_password"])){echo "value=".$_POST["confirm_password"];} ?>>
                    <div><span>.</span></div>
                </div>
                <?php if(isset($error)) {
                    foreach($error as $err) {
                        echo "<div class='errorj'><span>".$err."</span></div>";
                    }
                } ?>
            </div>
                <p>
              <label>&nbsp;<input type="submit" name="iscrizione" id="iscrizione" value="Iscriviti"></label>
                </p>
                </form>
        <div class="form-footer">
                <p>Hai già un account? <a href="login.php">Accedi</a></p> 
        </div>

    </div>
            </body>