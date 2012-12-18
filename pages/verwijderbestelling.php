<!-- Auteur : Thom --!>
<?php

$stmt = $db->query("DELETE FROM bestelling WHERE id =" . mysql_real_escape_string($_GET['id']));
$besprod = $db->query("DELETE from bestelling_producten WHERE bestelling_id =" . mysql_real_escape_string($_GET['id']));
// verwijderquery om desbetreffende bestelling uit de database te verwijderen
    echo " De door u gekozen bestelling , is verwijderd uit de database!"; 
    echo "<br>";


    echo "<a href=index.php?page=beherenbestellingen>Terug naar beheren bestellingen</A>";
   // wanneer er hierop wordt geklikt, dan gaat de gebruiker terug naar 'Beherenbestsellingen'     

?>
