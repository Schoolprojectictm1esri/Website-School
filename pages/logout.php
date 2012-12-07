<?php
session_start();
//vernietig sessie!
session_destroy();
//verwijder cookies voor beheerder bij uitloggen. @teken ervoor om foutmelding te voorkomen als deze cookie niet bestaat.
//-3600 betekend dat de exporation date van een cookie in het verleden gezet wordt. 
//(precies een uur in de min). Hierdoor wordt het in browsers verwijderd.
@setcookie('beheerder_id', false, time() -3600);

//nog iets komen voor cookie delete gebruiker.

//stuur de gebruiker of beheerder terug naar de homepage.
header('location: index.php');
?>
