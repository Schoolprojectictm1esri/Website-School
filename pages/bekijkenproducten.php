
<!-- Linkerblok !-->
<div id="categories">
<?php



$stmt = $db->query('SELECT * FROM categorieen');
$result = $stmt->fetchall();
foreach ($result as $row){
echo '<a href="index.php?page=bekijkenproducten&categorie='.$row['id'].'">'.$row['naam'].'</a>' ; echo "<br>";

} 


?>

</div>

<!-- Middenblok !-->
<div id="resultaten">
   <?php
 

   
$stmt2 = $db->query('SELECT * FROM producten1');
$result2 = $stmt2->fetchall();
foreach ($result2 as $row2){
echo '<a href="index.php?page=bekijkenproducten&categorie='.$row['id'].'&product='.$row2['productID'].'">'.$row2['naam'].'</a>' ; echo "<br>";
 
}
   
  
 
   
   
   ?>
</div>



<!-- Rechterblok !-->

<div id="productinfo"> 


  <div id="bestelknop"> 
      <form name='formulier' action='index.php?page=bestellenproducten' method='post'>
      <input type="submit" name="submit" value="Bestel" />
  </div>
</div>

<div class="spacer"></div>
    
<?php
// Thom
?>