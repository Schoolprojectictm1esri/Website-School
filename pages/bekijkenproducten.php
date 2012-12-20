<!-- Auteur : Thom --!>

<!-- Linkerblok !-->
    <div id="categories">

Kies een categorie:
    <br>
    <br>   

    

<?php    
 
$stmt = $db->prepare('SELECT * FROM categorieen');
$stmt->execute();
    $result = $stmt->fetchall();
      
        foreach ($result as $row){
            echo '<a href="index.php?page=bekijkenproducten&categorie='.$row['id'].'">'.$row['naam'].'</a>' ; echo "<br> <br> " ;
}

// selecteert de categorieen waar je uit kan kiezen en laat deze zien
    

 ?>
    </div>
<!-- Middenblok !-->

<div id="resultaten">
    Kies een product:
   
    <br>
    <br>
    

<?php
  
if(isset($_GET['categorie'])){
    $categorie = $_GET['categorie'];
    $stmt2 = $db->prepare("SELECT * FROM producten where categorieid = :categorie");
    $stmt2->bindParam(':categorie', $categorie);
    $stmt2->execute();
    $result2 = $stmt2->fetchall();
        foreach ($result2 as $row2){
            echo '<a href="index.php?page=bekijkenproducten&categorie='.$row2['categorieid'].'&product='.$row2['id'].'">'.$row2['naam'].'</a>' ; echo "<br> <br>";
        }       
}    
else {
    print ("Kies eerst een categorie");
}
 // selecteert de producten waar uit gekozen kan worden  en laat deze zien         
?>
</div>
<!-- Rechterblok !-->
    <div id="productinfo"> 
    Productinformatie 
<?php            
if(isset($_GET['product'])){
    $product = $_GET['product'];
$stmt3 = $db->prepare("SELECT * FROM producten WHERE id = :product");
$stmt3->bindParam(':product', $product);
  $stmt3->execute();
// query om alle producten uit de database te halen, waarnaar wordt gevraagd

    $result3 = $stmt3->fetchall();
         foreach ($result3 as $row3){
             echo "<table>";        
             echo "<tr><td>Productnaam:</td><td>{$row3['naam']}</td></tr>";echo '<br>';
             echo "<tr><td>Prijs:</td><td>{$row3['prijs']}</td></tr>";echo '<br>';
             echo "<tr><td>Omschrijving:</td><td>{$row3['omschrijving']}</td></tr>";echo '<br>';
             echo "<tr><td>Foto:</td><td><img src='{$row3['foto']}' class='imgt'></td></tr>";echo '<br>';
             echo "</table>";
                                    }
            echo '<a href="index.php?page=bestellenproducten&id='.$row3['id'].'">Bestel</a>' ; echo "<br> <br>"; 
}
else {
    print("Kies eerst een categorie en een product");
}
// geeft de productinformatie weer en geeft de mogelijkheid te bestellen
?>  
    <br>    
    </div>

