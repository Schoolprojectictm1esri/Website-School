<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Beheren bestellingen</title>
    </head>
    <body>
        <?php
$stmt = $db->query('SELECT * FROM bestelling1 b1 JOIN bestelling_producten1 bp ON b1.ID = bp.bestelling_id');
$result = $stmt->fetchall();
foreach ($result as $row){
    echo "<table width='600' cellpadding='5' cellspacing='5'>";
    echo "<tr><td colspan='2' class='vet'>Informatie </td></tr>";
    echo "<tr><td>Bestelling ID</td><td>${row['bestelling_id']}</td></tr>";
    echo "<tr><td>Klanten ID</td><td>${row['Klant_id']}</td></tr>";
    echo "<tr><td>Datum geplaats</td><td>${row['datum']}</td></tr>";
    echo "<tr><td>Datum afgerond</td><td>${row['afgerond']}</td></tr>";
    echo "<tr><td>Product ID</td><td>${row['product_id']}</td></tr>";
    echo "<tr><td>Aantal producten</td><td>${row['aantal']}</td></tr>";
    echo "<tr><td><form name='formulier' action='index.php?page=verwijderproducten.php' method='post'>
      <input type='submit' name='submit' value='Wijzigen' />";
    echo "</table>";    
}      
        ?>
    
    
    
    
    </body>
</html>
