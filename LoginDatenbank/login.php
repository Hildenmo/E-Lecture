<?php 
session_start();
//Datenbankverbindung
require_once('konfiguration.php');

if(isset($_GET['login'])) {
    $username = $_POST['username'];
    $passwort = $_POST['passwort'];
    
    $statement = $pdo->prepare("SELECT * FROM nutzer WHERE Benutzername = :username");
    $result = $statement->execute(array('username' => $username));
    $user = $statement->fetch();
    //Überprüfung des Passworts
   
    if ($user !== false && password_verify($passwort, $user['Passwort'])) {
        $_SESSION['userid'] = $user['Benutzername'];
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

<?php 
if(isset($errorMessage)) {
    echo $errorMessage;
}
?>
 

<div id="login">
    <div class="container-fluid text-center loginscreen">
      <div class="container-fluid bg-3 text-center">
        <div class="row">
            <div class="col-sm-2">
              </div>
          <div class="col-sm-8">
            <div class="login">
              <div class="heading"><br>
                <img title="" src="https://cdn4.iconfinder.com/data/icons/e-learning-2-4/66/109-512.png" alt="" height="100" />
                  <h1 style="display:inline;">E-Lecture</h1> 

                <h2>Login</h2>

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
            <div class="col-sm-2">
              </div>
          </div>
        </div>
      </div>
    </div>

</body>
</html>