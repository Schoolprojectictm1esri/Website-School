<!-- Auteur : Thom --!>

<!-- Linkerblok !-->
    <div id="categories">

Kies een categorie:
    <br>
    <br>   

    

<?php    
 
$stmt = $db->prepare('SELECT * FROM categorieen');

    $result = $stmt->fetchall();
      $stmt->execute();
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
            echo '<a href="index.php?page=bekijkenproducten&categorie='.$row['id'].'&product='.$row2['id'].'">'.$row2['naam'].'</a>' ; echo "<br> <br>";
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
    <br>
    <br>
<?php


            
if(isset($_GET['product'])){
    $product = $_GET['product'];
$stmt3 = $db->prepare("SELECT * FROM producten WHERE id = :product");
$stmt3->bindParam(':product', $product);
  $stmt3->execute();
// query om alle producten uit de database te halen, waarnaar wordt gevraagd

    $result3 = $stmt3->fetchall();
         foreach ($result3 as $row3){
             echo "Foto : <img src='{$row3['foto']}'>";
             echo "Productnaam : {$row3['naam']}"; echo '<br>';
             echo "Prijs : {$row3['prijs']}"; echo '<br>';
             echo "Omschrijving : {$row3['omschrijving']}"; echo '<br>';
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

