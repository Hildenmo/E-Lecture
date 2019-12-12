<?php
session_start();
session_destroy();
 
echo "Logout erfolgreich";
header("Location: login.php");
?>
