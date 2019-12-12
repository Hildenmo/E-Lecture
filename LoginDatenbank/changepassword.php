<?php 
session_start();
// Verbindung zur Datenbank
require_once('konfiguration.php');

$showFormular = true; //Variable ob das Registrierungsformular anezeigt werden soll


if(isset($_GET['change'])) {
    $error = false;
    $username = $_POST['username'];
    $altespasswort = $_POST['altespasswort'];
    $passwort = $_POST['passwort'];
    $passwort2 = $_POST['passwort2'];

    if($passwort != $passwort2) {
        echo 'Die Passwörter müssen übereinstimmen<br>';
        $error = true;
    }
    
    $statement = $pdo->prepare("SELECT * FROM nutzer WHERE Benutzername = :username");
    $result = $statement->execute(array('username' => $username));
    $user = $statement->fetch();
    //Überprüfung des Passworts
    
   
    if ($user !== false && password_verify($altespasswort, $user['Passwort'])) {
       // $_SESSION['userid'] = $user['Benutzername'];
        echo 'Altes Passwort richtig.';

        if(!$error) {    
            $passwort_hash = password_hash($passwort2, PASSWORD_DEFAULT);
            
            $statement = $pdo->prepare("UPDATE nutzer SET Passwort=:passwort WHERE Benutzername=:username");

            $result = $statement->execute(array('username' => $username, 'passwort' => $passwort_hash));
            
            

            if($result) {        
                echo 'Passwort wurde geändert. <a href="login.php">Zum Login</a>';
                echo('Login erfolgreich. Weiter zu <a href="secret.php">internen Bereich</a>');
                $showFormular = false;
            } else {
                echo 'Beim Abspeichern ist leider ein Fehler aufgetreten<br>';
            }
        } 


    } else {
        $error = true;
        $errorMessage = "Benutzername oder Passwort war ungültig<br>";
    }
    
} 
?>
<!DOCTYPE html> 
<html> 
<head>
  <title>Login</title>    
</head> 
<body>
 
<?php 
if(isset($errorMessage)) {
    echo $errorMessage;
}
if($showFormular){


?>
 
<form action="?change=1" method="post">

Benutzername:<br>
<input type="text" size="40" maxlength="250" name="username"><br><br>
 
Dein altes Passwort:<br>
<input type="password" size="40"  maxlength="250" name="altespasswort"><br><br>

Dein neues Passwort:<br>
<input type="password" size="40" maxlength="250" name="passwort"><br><br>

Neues Passwort bestätigen:<br>
<input type="password" size="40" maxlength="250" name="passwort2"><br><br>

 
<input type="submit" value="Abschicken">
</form> 

<a href="login.php">Zum Login</a>

<a href="logout.php">Zum Logout</a>
 
<a href="changepassword.php">Passwort ändern</a>

<?php
} //Ende von if($showFormular)
?>

</body>
</html>