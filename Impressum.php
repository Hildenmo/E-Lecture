<!DOCTYPE html>
<html lang="en">

<head>
  <title>E-Lecture Impressum</title>
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
          <li id="nav_home"><a href="home.php">Home</a></li>
          <li id="nav_profil"><a href="profil.php">Profil</a></li>
        
		<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown">Meine Kurse<span
                class="caret"></span></a>
            <ul class="dropdown-menu">
			
             
            <?php
                session_start();
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

    <div class="row">
      <div class="col-md-4 text-left">
        <h1>Impressum</h1>
      </div>
    </div>

    <div class="row" style="height: 200px;">
      <div class="col-md-4 text-left">
        <h3>Herausgeber:</h3>
      </div>
      <div class="col-md-8 text-left">
        <p>E-Lecture</p>
        <p>Marienplatz 2</p>
        <p>88212 Ravensburg</p>
        <a>kontakt@e-lecture.com</a>
      </div>
    </div>

    <div class="row" style="height: 353px;">
      <div class="col-md-4 text-left">
        <h3>Verantwortliche:</h3>
      </div>
      <div class="col-md-8 text-left">
        <p>Lukas Beuscher</p>
        <a>lukas.beuscher@beispiel.com</a><br>

        <p>Marco Hildenbrand</p>
        <a>marco.hildenbrand@beispiel.com</a><br>

        <p>Moritz Lang</p>
        <a>moritz.lang@test.com</a><br>

        <p>Jonas Strobel</p>
        <a>jonas.strobel@test.com</a><br>
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
