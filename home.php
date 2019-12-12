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

<body>
  <nav class="navbar navbar-inverse" id="nav">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" id="logo" href="home.html">E-Lecture</a>
      </div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav">
          <li class="active" id="nav_home"><a href="home.html">Home</a></li>
          <li id="nav_profil"><a href="profil.html">Profil</a></li>
          <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown">Meine Kurse<span
                class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a id="nav_datenbanken" href="home.html#datenbanken">Datenbanken</a></li>
              <li><a id="nav_abap" href="home.html#abap">ABAP</a></li>
              <li><a id="nav_web" href="home.html#webprogrammierung">Webprogrammierung</a></li>
            </ul>
          </li>
        </ul>
        <form class="navbar-form navbar-right">
          <a href="#" id="logout"><img title="" src="logout2.png" alt="" height="30px" /></a>
        </form>
      </div>
    </div>
  </nav>

  <div class="container-fluid text-center content">
    <h1>Meine Kurse</h1>

    <?php
    session_start();
    require_once('konfiguration.php');

    $statement = $pdo->prepare("SELECT * FROM kurse ORDER BY kurs");
    $result = $statement->execute();

    while($row = $statement->fetch()) {
    echo '<div class="container-fluid bg-3 text-center">';
    echo '<h3><a data-toggle="collapse" href="#collapse'.$row['id'].'">'.$row['kurs'].'</a></h3>';
    echo '<div class="collapse" id="collapse'.$row['id'].'">';
    echo '<div class="row">';
    
    $statement2 = $pdo->prepare("SELECT * FROM vorlesungen where kurs_id= :test");
    $result2 = $statement2->execute(array('test' => $row['id']));

    while($row2 = $statement2->fetch()) {
    echo '<p>'.$row2['titel'].'</p>';
    }

    echo '</div>';
    echo '</div>';
    echo '</div>';
    }
    ?>

<div class="container-fluid bg-3 text-center">
      <h3 id="datenbanken"><a data-toggle="collapse" href="#collapse4">Datenbanken</a></h3>
      <div class="collapse" id="collapse1">
        <div class="row">
          <div class="col-sm-4">
            <p>Titel</p>
            <img src="https://placehold.it/150x80?text=VIDEO" class="img-responsive" style="width:100%" alt="Image">
          </div>
          <div class="col-sm-4">
            <p>Titel</p>
            <img src="https://placehold.it/150x80?text=VIDEO" class="img-responsive" style="width:100%" alt="Image">
          </div>
          <div class="col-sm-4">
            <p>Titel</p>
            <img src="https://placehold.it/150x80?text=VIDEO" class="img-responsive" style="width:100%" alt="Image">
          </div>
          <div class="col-sm-4">
            <p>Titel</p>
            <img src="https://placehold.it/150x80?text=VIDEO" class="img-responsive" style="width:100%" alt="Image">
          </div>
        </div>
      </div>
    </div><br><br>

    <div class="container-fluid bg-3 text-center">
      <h3 id="webprogrammierung"><a data-toggle="collapse" href="#collapse2">Webprogrammierung</a></h3>
      <div class="collapse" id="collapse2">
        <div class="row">
          <div class="col-sm-4">
            <p>Titel</p>
            <img src="https://placehold.it/150x80?text=VIDEO" class="img-responsive" style="width:100%" alt="Image">
          </div>
          <div class="col-sm-4">
            <p>Titel</p>
            <img src="https://placehold.it/150x80?text=VIDEO" class="img-responsive" style="width:100%" alt="Image">
          </div>
          <div class="col-sm-4">
            <p>Titel</p>
            <img src="https://placehold.it/150x80?text=VIDEO" class="img-responsive" style="width:100%" alt="Image">
          </div>
          <div class="col-sm-4">
            <p>Titel</p>
            <img src="https://placehold.it/150x80?text=VIDEO" class="img-responsive" style="width:100%" alt="Image">
          </div>
        </div>
      </div>
    </div><br><br>

    <div class="container-fluid bg-3 text-center">
      <h3 id="abap"><a data-toggle="collapse" href="#collapse3">ABAP</a></h3>
      <div class="collapse" id="collapse3">
        <div class="row">
          <div class="col-sm-4">
            <p>Titel</p>
            <img src="https://placehold.it/150x80?text=VIDEO" class="img-responsive" style="width:100%" alt="Image">
          </div>
          <div class="col-sm-4">
            <p>Titel</p>
            <img src="https://placehold.it/150x80?text=VIDEO" class="img-responsive" style="width:100%" alt="Image">
          </div>
          <div class="col-sm-4">
            <p>Titel</p>
            <img src="https://placehold.it/150x80?text=VIDEO" class="img-responsive" style="width:100%" alt="Image">
          </div>
          <div class="col-sm-4">
            <p>Titel</p>
            <img src="https://placehold.it/150x80?text=VIDEO" class="img-responsive" style="width:100%" alt="Image">
          </div>
        </div>
      </div>
    </div><br><br>
  </div>


  <footer class="container-fluid text-center" id="footer">
    <div class="col-md-4">
      <a style="color: rgb(126, 126, 126);">&copy; E-Lecture</a>
    </div>
    <div class="col-md-4">
      <a style="color: rgb(126, 126, 126)" id="impressum_link" href="impressum.html">Impressum</a>
    </div>
    <div class="col-md-4">
      <img title="" src="logo_facebook.png" alt="" height="30px" />
      <img title="" src="logo_instagram.png" alt="" height="30px" />
      <img title="" src="logo_twitter.png" alt="" height="30px" />
    </div>
  </footer>

  <script src="script.js"></script>
</body>

</html>