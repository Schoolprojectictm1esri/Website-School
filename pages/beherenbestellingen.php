<!-- Auteur : Thom Geertman -->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Beheren bestellingen</title>
    </head>
    <body>
        <div class="inzienklantgegevens">
 <?php

 
$stmt = $db->query('SELECT * FROM bestelling b1 JOIN bestelling_producten bp ON b1.ID = bp.bestelling_id');
// query om benodigde gegevens 

    if($stmt == TRUE)
        {
    
$result = $stmt->fetchall();

foreach ($result as $row){
    echo "<table>";
    echo "<tr><td colspan='2' class='vet'>Informatie </td></tr>";
    echo "<tr><td>Bestelling ID</td><td>{$row['bestelling_id']}</td></tr>";
    echo "<tr><td>Klanten ID</td><td>{$row['klant_id']}</td></tr>";
    echo "<tr><td>Datum geplaats</td><td>{$row['datum']}</td></tr>";
    echo "<tr><td>Datum afgerond</td><td>{$row['afgerond']}</td></tr>";
    echo "<tr><td>Product ID</td><td>{$row['product_id']}</td></tr>";
    echo "<tr><td>Aantal producten</td><td>{$row['aantal']}</td></tr>";
    echo "<a href=index.php?page=verwijderbestelling&id={$row['id']}>Verwijderen</A>";
    // linkje naar het verwijderen van een bestelling uit de database
    echo "</table>";    
// alle resultaten worden weergegeven in een tabel over desbetreffende bestelling
    
                        }
      }        
        ?>
  
        </div>
    
    
    </body>
</html>
