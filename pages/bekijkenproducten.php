<!-- Auteur : Thom --!>
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

// selecteerd de categorieen waar je uit kan kiezen
    

 ?>
    </div>
<!-- Middenblok !-->

<div id="resultaten">
    Kies een product:
   
    <br>
    <br>
<?php
  
if(isset($_GET['categorie'])){
$stmt2 = $db->query("SELECT * FROM producten where categorieid = " . mysql_real_escape_string($_GET['categorie']));
    $result2 = $stmt2->fetchall();
        foreach ($result2 as $row2){
            echo '<a href="index.php?page=bekijkenproducten&categorie='.$row['id'].'&product='.$row2['id'].'">'.$row2['naam'].'</a>' ; echo "<br> <br>";
        }       
}    
else {
    print ("Kies eerst een categorie");
}
 // selecteerd de producten waar uit gekozen kan worden          
?>
</div>
<!-- Rechterblok !-->

    <div id="productinfo"> 
    Productinformatie 
    <br>
    <br>
<?php
if(isset($_GET['product'])){
$stmt3 = $db->query("SELECT * FROM producten WHERE id = " . mysql_real_escape_string($_GET['product']));
    $result3 = $stmt3->fetchall();
         foreach ($result3 as $row3){
             echo "Productnaam : {$row3['naam']}"; echo '<br>';
             echo "Prijs : {$row3['prijs']}"; echo '<br>';
             echo "Omschrijving : {$row3['omschrijving']}"; echo '<br>';
                                    }
            echo '<a href="index.php?page=bestellenproducten&naam='.$row3['naam'].'">Bestel</a>' ; echo "<br> <br>"; 
}
else {
    print("Kies eerst een categorie en een product");
}
// geeft de productinformatie weer en de mogelijkheid te bestellen
?>  
    <br>    
    </div>

