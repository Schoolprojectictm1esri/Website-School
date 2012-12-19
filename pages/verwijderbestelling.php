<!-- Auteur : Thom --!>
<?php

$stmt = $db->prepare("DELETE FROM bestelling WHERE id = :id");
$stmt->bindParam(':id', $_GET['id']);
$stmt->execute();
$besprod = $db->query("DELETE from bestelling_producten WHERE bestelling_id = :id");
$besprod->bindParam(':id', $_GET['id']);
$besprod->execute();
// verwijderquery om desbetreffende bestelling uit de database te verwijderen
    echo " De door u gekozen bestelling , is verwijderd uit de database!"; 
    echo "<br>";


    echo "<a href=index.php?page=beherenbestellingen>Terug naar beheren bestellingen</A>";
   // wanneer er hierop wordt geklikt, dan gaat de gebruiker terug naar 'Beherenbestsellingen'     

?>
