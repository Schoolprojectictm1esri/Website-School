
<!-- Linkerblok !-->

<?php


$sql = "SELECT * FROM categorieen";
$stmt = $db->query($sql);
$result = $stmt->fetch(PDO::FETCH_ASSOC);
foreach ($result as $row){
    var_dump($row);
    print ('<a href="index.php?page=bekijkenproducten&categorie='.$row['id'].'">'.$row['naam'].'</a>');
}
    
  
?>


<!-- Middenblok !-->
<div id="resultaten">
    hoi
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