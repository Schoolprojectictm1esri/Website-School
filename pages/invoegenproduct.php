<?php
/*
  Document   : invoegenproduct.php
  Created on : 20-12-2012
  Author     : Thomas
  invoeren van producten.
 */
?>
<?php

if(isset($_POST['submit'])){
    $stmt = $db->prepare("INSERT INTO `producten`(`naam`, `prijs`, `omschrijving`, `actief`, `foto`, `categorieid`) 
                                       VALUES    (naam = :naam,
                                            prijs = :prijs, 
                                            omschrijving = :omschrijving,
                                            actief = :actief, 
                                            categorieid = :categorieid)");

            $stmt->bindParam(':naam', $_POST['naam']);
            $stmt->bindParam(':prijs', $_POST['prijs']);
            $stmt->bindParam(':omschrijving', $_POST['omschrijving']);
            $stmt->bindParam(':actief', $_POST['actief']);
            $stmt->bindParam(':categorieid', $_POST['categorieid']);
            $stmt->execute();
}
else {
    
}















?>
