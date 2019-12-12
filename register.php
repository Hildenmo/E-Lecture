<?php 
session_start();
require_once('konfiguration.php');
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

$showFormular = true; //Variable ob das Registrierungsformular anezeigt werden soll

if(isset($_GET['register'])) {
    $error = false;
    $username = $_POST['username'];
    $email = $_POST['email'];
    $passwort = $_POST['passwort'];
    $passwort2 = $_POST['passwort2'];
  
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo 'Bitte eine gültige E-Mail-Adresse eingeben<br>';
        $error = true;
    }     
    if(strlen($passwort) == 0) {
        echo 'Bitte ein Passwort angeben<br>';
        $error = true;
    }
    if($passwort != $passwort2) {
        echo 'Die Passwörter müssen übereinstimmen<br>';
        $error = true;
    }
    
    //Überprüfe, dass der Benutzername noch nicht vergeben wurde

    if(!$error) {
        $statement = $pdo->prepare("SELECT * FROM nutzer WHERE benutzername = :username");
        $result = $statement->execute(array('username' => $username));
        $user = $statement->fetch();

        if($user !== false) {
			
							?>
		<div class="container-fluid text-center loginscreen">
    <br>
    <img title="" src="https://cdn4.iconfinder.com/data/icons/e-learning-2-4/66/109-512.png" alt="" height="100" />
    <h1 style="display:inline; color: black"><b>E-Lecture</b></h1>
		</b> <h4> Dieser Benutzername ist bereits vergeben </h4>
		<b> <a href="register.php">Zur Registierung</a>
			
			 </div>
			
			<?php
		
            $error = true;
			$showFormular = false;
        }

    }
    //Überprüfe, dass die E-Mail-Adresse noch nicht registriert wurde
    if(!$error) { 
        $statement = $pdo->prepare("SELECT * FROM nutzer WHERE email = :email");
        $result = $statement->execute(array('email' => $email));
        $user = $statement->fetch();
        
        if($user !== false) {
			
					?>
		<div class="container-fluid text-center loginscreen">
    <br>
    <img title="" src="https://cdn4.iconfinder.com/data/icons/e-learning-2-4/66/109-512.png" alt="" height="100" />
    <h1 style="display:inline; color: black"><b>E-Lecture</b></h1>
		</b> <h4> Diese E-Mail-Adresse ist bereits vergeben </h4>
		<b> <a href="register.php">Zur Registierung</a>
			
			 </div>
			
			<?php
    
			
            $error = true;
			$showFormular = false;
        }    
    }

    
    
    //Keine Fehler, wir können den Nutzer registrieren
    if(!$error) {    
        $passwort_hash = password_hash($passwort, PASSWORD_DEFAULT);
        
        $statement = $pdo->prepare("INSERT INTO nutzer (benutzername, passwort, email) VALUES (:username, :passwort, :email)");
        $result = $statement->execute(array('username' => $username, 'passwort' => $passwort_hash, 'email' => $email));
        
        if($result) {   
			
			?>
		<div class="container-fluid text-center loginscreen">
    <br>
    <img title="" src="https://cdn4.iconfinder.com/data/icons/e-learning-2-4/66/109-512.png" alt="" height="100" />
    <h1 style="display:inline; color: black"><b>E-Lecture</b></h1>
		</b> <h4> Du wurdest erfolgreich registriert. </h4>
		<b> <a href="login.php">Zum Login</a>
			
			 </div>
			
			<?php
            $showFormular = false;
        } else {
			
				?>
		<div class="container-fluid text-center loginscreen">
    <br>
    <img title="" src="https://cdn4.iconfinder.com/data/icons/e-learning-2-4/66/109-512.png" alt="" height="100" />
    <h1 style="display:inline; color: black"><b>E-Lecture</b></h1>
		</b> <h4> Beim Abspeichern ist leider ein Fehler aufgetreten </h4>
		<b> <a href="register.php">Zur Registierung</a>
			
			 </div>
			
			<?php
          
			
        }
    } 
}
 
if($showFormular) {
?>
 
 <div id="register">
  <div class="container-fluid text-center loginscreen">
    <br>
    <img title="" src="https://cdn4.iconfinder.com/data/icons/e-learning-2-4/66/109-512.png" alt="" height="100" />
    <h1 style="display:inline; color: black"><b>E-Lecture</b></h1>
      <div class="register">
        <div class="heading">
          <br>
          <h2 style="color: black">Registierungsformular</h2>
          
          <?php 
          if(isset($errorMessage)) {
          echo $errorMessage;
          }
          ?>
          <br>
            <form action="?register=1" method="post">
			<h4>Nutzername:</h4>
              <div class="input-group input-group-lg">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
				
                <input type="text" size="40" maxlength="250" name="username" class="form-control" placeholder="Benutzername">
              </div>
			  <h4>E-mail:</h4>
			  <div class="input-group input-group-lg">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
				
                <input type="email" size="40" maxlength="250" name="email" class="form-control" placeholder="E-Mail">
              </div>
			  <h4>Dein Passwort:</h4>
			  <div class="input-group input-group-lg">
                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
				
                <input type="password" size="40" maxlength="250" name="passwort" class="form-control" placeholder="Passwort">
              </div>
			  
			  <h4>Passwort wiederholen:</h4>
              <div class="input-group input-group-lg">
                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
				
                <input type="password" size="40"  maxlength="250" name="passwort2" class="form-control" placeholder="Passwort wiederholen"><br><br>
              </div>
        </div>
		<br>
        <button type="submit" class="float" margin: 25px>Abschicken</button>
		<br><a href="login.php">Zum Login</a>
        </form>
      </div>
  </div>
</div>

 
<!--   <a href="changepassword.php">Passwort ändern</a> -->
 


<?php
} //Ende von if($showFormular)
?>
 
</body>
</html>