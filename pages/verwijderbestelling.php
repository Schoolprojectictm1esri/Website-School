<?php

$stmt = $db->query("DELETE FROM bestelling1 WHERE ID =" . $_GET['id']);
$besprod = $db->query("DELETE from bestelling.producten1 WHERE bestelling_id =" . $_GET['id']);
echo " De door u gekozen bestelling , is verwijderd uit de database!"; 
echo "<br>";


echo "<a href=index.php?page=beherenbestellingen>Terug naar beheren bestellingen</A>";
        

?>
