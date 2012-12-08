<!-- Linkerblok !-->
<div id="categories">
Kies een categorie:
<br>
<br>   
<?php
$stmt = $db->query('SELECT * FROM categorieen');
$result = $stmt->fetchall();
foreach ($result as $row){
echo '<a href="index.php?page=bekijkenproducten&categorie='.$row['id'].'">'.$row['naam'].'</a>' ; echo "<br> <br> " ;
} 
?>
</div>
<!-- Middenblok !-->
<div id="resultaten">
    Kies een product:
   
    <br>
    <br>
   <?php
$stmt2 = $db->query("SELECT * 
FROM producten1 where categorieID = " . $_GET['categorie']);
$result2 = $stmt2->fetchall();
    foreach ($result2 as $row2){
        echo '<a href="index.php?page=bekijkenproducten&categorie='.$row['id'].'&product='.$row2['productID'].'">'.$row2['naam'].'</a>' ; echo "<br> <br>";
}
?>
</div>
<!-- Rechterblok !-->
<div id="productinfo"> 
    Productinformatie 
    <br>
    <br>
<?php
$stmt3 = $db->query("SELECT * FROM producten1  
WHERE productID = " . $_GET['product']);
$result3 = $stmt3->fetchall();
    foreach ($result3 as $row3){
        echo "Productnaam : {$row3['naam']}"; echo '<br>';
        echo "Prijs : {$row3['prijs']}"; echo '<br>';
 }
?>
<div id="bestelknop"> 
      <form name='formulier' action='index.php?page=bestellenproducten' method='GET'>
      <input type="submit" name="submit" value="Bestel" />
      </form>
  </div>
</div>
<div class="spacer"></div>    
<?php
// Thom
?>