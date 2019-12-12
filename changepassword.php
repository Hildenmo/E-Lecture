<?php 
session_start();

 // Testet, ob User eingeloggt ist
 if(!isset($_SESSION['userid'])) {
    header("Location: login.php");

  }

// Verbindung zur Datenbank
require_once('konfiguration.php');

$showFormular = true; //Variable ob das Registrierungsformular anezeigt werden soll

?>
<!DOCTYPE html> 
<html> 
<head>
    <title>E-Lecture Passwort ändern</title>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="template.css">  
</head> 
<body>
 
<?php
if(isset($_GET['change'])) {
    $error = false;
    $username = $_POST['username'];
    $altespasswort = $_POST['altespasswort'];
    $passwort = $_POST['passwort'];
    $passwort2 = $_POST['passwort2'];

    if($passwort != $passwort2) {
        $errorMessage= 'Passwörter müssen übereinstimmen<br>';
        $error = true;
    }
    
    $statement = $pdo->prepare("SELECT * FROM nutzer WHERE benutzername = :username");
    $result = $statement->execute(array('username' => $username));
    $user = $statement->fetch();
    //Überprüfung des Passworts
    
   
    if ($user !== false && password_verify($altespasswort, $user['passwort'])) {
        //$_SESSION['userid'] = $user['Benutzername'];
        

        if(!$error) {    
            $passwort_hash = password_hash($passwort2, PASSWORD_DEFAULT);
            
            $statement = $pdo->prepare("UPDATE nutzer SET Passwort=:passwort WHERE Benutzername=:username");

            $result = $statement->execute(array('username' => $username, 'passwort' => $passwort_hash));
            
            

            if($result) {        
                $errorMessage= 'Passwort wurde geändert.<br> <a href="logout.php">Zum Login</a>';
                //echo('Login erfolgreich. Weiter zu <a href="secret.php">internen Bereich</a>');
              //  header("Location: login.php");
                $showFormular = false;
            } else {
                $errorMessage = 'Beim Abspeichern ist leider ein Fehler aufgetreten<br>';
            }
        } 


    } else {
        $error = true;
        $errorMessage = "Benutzername oder Passwort ungültig<br>";
    }
    
} 
?>




<div class="container-fluid text-center loginscreen">

<img title="" src="https://cdn4.iconfinder.com/data/icons/e-learning-2-4/66/109-512.png" alt="" height="100" />
<h1 style="display:inline; color: black"><b>E-Lecture</b></h1>

<?php 
          if(isset($errorMessage)) {
          echo $errorMessage;
          }
?>
<?php 

if($showFormular){


?>
<form action="?change=1" method="post">

<div class="input-group input-group-lg">
    <span class="input-group-addon"><i class="fa fa-user"></i></span>
    <input type="text" size="40" maxlength="250" name="username" class="form-control" placeholder="Benutzername">
</div>

<div class="input-group input-group-lg">
    <span class="input-group-addon"><i class="fa fa-user"></i></span>
    <input type="password" size="40" maxlength="250" name="altespasswort" class="form-control" placeholder="Altes Passwort">
</div>

<div class="input-group input-group-lg">
    <span class="input-group-addon"><i class="fa fa-user"></i></span>
    <input type="password" size="40" maxlength="250" name="passwort" class="form-control" placeholder="Neues Passwort">
</div>

<div class="input-group input-group-lg">
    <span class="input-group-addon"><i class="fa fa-user"></i></span>
    <input type="password" size="40" maxlength="250" name="passwort2" class="form-control" placeholder="Neues Passwort bestätigen">
</div>

<button type="submit" class="float" margin: 25px>Passwort ändern</button>
</form> 

</div>

<?php
} //Ende von if($showFormular)
?>

</body>
</html>
