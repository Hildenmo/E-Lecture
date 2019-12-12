<?php 
session_start();
//Datenbankverbindung
require_once('konfiguration.php');

if(isset($_GET['login'])) {
    $username = $_POST['username'];
    $passwort = $_POST['passwort'];
    
    $statement = $pdo->prepare("SELECT * FROM nutzer WHERE benutzername = :username");
    $result = $statement->execute(array('username' => $username));
    $user = $statement->fetch();
    //Überprüfung des Passworts
   
    if ($user !== false && password_verify($passwort, $user['passwort'])) {
        $_SESSION['userid'] = $user['benutzername'];
        header("Location: home.php");

        //die('Login erfolgreich. Weiter zu <a href="home.php">internen Bereich</a>');
    } else {
        $errorMessage = "Benutzername oder Passwort war ungültig<br>";
    }
    
} 
?>
<!DOCTYPE html> 
<html> 
<head>
    <title>E-Lecture Login</title>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="template.css">  
</head> 
<body>


 

<div id="login">
  <div class="container-fluid text-center loginscreen">
    <br>
    <img title="" src="https://cdn4.iconfinder.com/data/icons/e-learning-2-4/66/109-512.png" alt="" height="100" />
    <h1 style="display:inline; color: black"><b>E-Lecture</b></h1>
      <div class="login">
        <div class="heading">
          <br>
          <h2 style="color: black">Login</h2>
          
          <?php 
          if(isset($errorMessage)) {
          echo $errorMessage;
          }
          ?>
          <br>
            <form action="?login=1" method="post">
              <div class="input-group input-group-lg">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <input type="text" size="40" maxlength="250" name="username" class="form-control" placeholder="Benutzername">
              </div>
              <div class="input-group input-group-lg">
                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                <input type="password" size="40"  maxlength="250" name="passwort" class="form-control" placeholder="Passwort">
              </div>
        </div>
        <button type="submit" class="float" margin: 25px>Login</button>
        </form>
      </div>
  </div>
</div>

</body>
</html>