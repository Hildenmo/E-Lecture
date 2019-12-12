<!DOCTYPE html>
<html lang="en">

<head>
  <title>E-Lecture Profil</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="template.css">
</head>
<?php
    session_start();
    // Testet, ob User eingeloggt ist
    if(!isset($_SESSION['userid'])) {
      header("Location: login.php");
    }
    require_once('konfiguration.php');
    $user = $_SESSION['userid'];
    $statement = $pdo->prepare("SELECT * FROM nutzer inner join studiengang on kuerzel_sg = kuerzel where benutzername= :user");
    $result = $statement->execute(array('user' => $user));
    $row = $statement->fetch();
    
?>
<body>
  <nav class="navbar navbar-inverse" id="nav">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" id="logo" href="home.php">E-Lecture</a>
      </div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav">
          <li id="nav_home"><a href="home.php">Home</a></li>
          <li class="active" id="nav_profil"><a href="profil.php">Profil</a></li>
          <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown">Meine Kurse<span
                class="caret"></span></a>
            <ul class="dropdown-menu">
            <?php
             
             require_once('konfiguration.php');
             $statement3 = $pdo->prepare("SELECT * FROM kurse ORDER BY beschreibung");
             $result3 = $statement3->execute();
             
             while($row3 = $statement3->fetch()) {
                 echo '<li><a href="home.php#'.$row3['beschreibung'].'">'.$row3['beschreibung'].'</a></li>';
             }
         ?>            
         </ul>
          </li>
        </ul>
        
        <form class="navbar-form navbar-right">
          <a href="logout.php" id="logout"><img title="" src="logout2.png" alt="" height="30px" /></a>
        </form>
      </div>
    </div>
  </nav>

  <div class="container-fluid text-center content">
    <div class="container-fluid text-center content">
      <div class="container-fluid bg-3 text-center">
        <h2>Mein Profil</h2>
        <div class="row">
          <div class="col-sm-6">

            <div class="card">
              <img src="https://upload.wikimedia.org/wikipedia/commons/e/ef/Profilbild_19_12_2015.jpg" alt="Profil"
                style="width:100%">
                <?php
              echo '<h1>'.$row['vorname'].' '.$row['nachname'].'</h1>'
              
              ?>
              <p class="title">Persönlicher Text</p>
              <p>DHBW Ravensburg</p>
              <p><button>Profilbild ändern</button></p>
            </div>
          </div>
       
          <div class="col-sm-6">
            <h3>Persönliche Daten</h3>
          

            <table style="text-align: left"> 
              <?php
                echo '<tr>';
                echo '<td style="width: 500px"><b>Benutzername:</b><td>';
                echo '<td>'.$row['benutzername'].'</td>';
                echo '</tr>';
            
                echo '<tr>';
                echo '<td><b>E-Mail:</b><td>';
                echo '<td>'.$row['email'].'</td>';
                echo '</tr>';
                echo '<tr>';
                echo '<td><b>Studiengang:</b><td>';
                echo '<td>'.$row['beschreibung'].'</td>';
                echo '</tr>';
            ?>
          </table>
          <h3>Meine Kurse</h3>
          
          <?php
          $statement3 = $pdo->prepare("SELECT * FROM kurse ORDER BY beschreibung");
          $result3 = $statement3->execute();
           while($row3 = $statement3->fetch()) {
            echo '<p>'.$row3['beschreibung'].'</p>';
        }
          ?>        
          
          </div>
        </div>
      </div>
    </div>
  </div>

  <footer class="container-fluid text-center" id="footer">
    <div class="col-md-4">
      <a style="color: rgb(126, 126, 126);">&copy; E-Lecture</a>
    </div>
    <div class="col-md-4">
      <a style="color: rgb(126, 126, 126)" id="impressum_link" href="impressum.php">Impressum</a>
    </div>
    <div class="col-md-4">
      <img title="" src="logo_facebook.png" alt="" height="30px" />
      <img title="" src="logo_instagram.png" alt="" height="30px" />
      <img title="" src="logo_twitter.png" alt="" height="30px" />
    </div>
  </footer>


</body>


</html>