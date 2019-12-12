<!DOCTYPE html>
<html lang="en">

<head>
  <title>E-Lecture Home</title>
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
          <li class="active" id="nav_home"><a href="home.php">Home</a></li>
          <li id="nav_profil"><a href="profil.php">Profil</a></li>
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
    <h1>Meine Kurse</h1>

    <?php

    $statement = $pdo->prepare("SELECT * FROM kurse ORDER BY beschreibung");
    $result = $statement->execute();

    while($row = $statement->fetch()) {
    echo '<div class="container-fluid bg-3 text-center">';
    echo '<h3 id="'.$row['beschreibung'].'"><a data-toggle="collapse" href="#collapse'.$row['id'].'">'.$row['beschreibung'].'</a></h3>';
    echo '<div class="collapse" id="collapse'.$row['id'].'">';
    echo '<div class="row">';
    
    $statement2 = $pdo->prepare("SELECT * FROM vorlesungen where kurs_id= :test");
    $result2 = $statement2->execute(array('test' => $row['id']));

    while($row2 = $statement2->fetch()) {
    echo '<div class="col-sm-4">';
    echo '<p>'.$row2['titel'].'</p>';
    echo '<iframe src="'.$row2['video'].'" class="img-responsive" style="width:100%"></iframe>';
    echo '</div>';
    }

    echo '</div>';
    echo '</div>';
    echo '</div>';
    echo '<br><br>';
    }
    ?>

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
