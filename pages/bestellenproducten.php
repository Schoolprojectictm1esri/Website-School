<div id="bestellenproducten">   
<?php

if(isset($_GET['id']))
    
    // als er bij bekijkenproducten op een product is geselecteerd en op geklikt , wordt er gecontroleerd of er een waarde is meegegeven
           
            {
        $product=$db->query("SELECT * FROM producten WHERE id = " . mysql_real_escape_string($_GET['id']));   
        $lijst = $product->fetchall();
        
     
        foreach($lijst as $info){
            print ("U heeft gekozen voor het volgende product :<br> Naam : {$info['naam']} <br> ");
            print("Prijs : &euro;{$info['prijs']},- <br>");
            print("Omschrijving : {$info['omschrijving']} <br>");
            print("Foto : <img src='{$info['foto']}'> <br>");
            // query en foreach om voor de producten die uit de database worden gehaald te selecteren en deze te laten zien
            
        }      
        
        
   
            ?>
    
</div>
            

<div id="bestellenproductrechts">

   






            
            
    </select
</div>

<div id="bereken">
<?php

$id = $_GET['id'];
echo '<a href="index.php?page=bestellenproducten&id='.$id.'&aantal=1">1</a><br>' ;
echo '<a href="index.php?page=bestellenproducten&id='.$id.'&aantal=2">2</a><br>' ;
echo '<a href="index.php?page=bestellenproducten&id='.$id.'&aantal=3">3</a><br>' ;
echo '<a href="index.php?page=bestellenproducten&id='.$id.'&aantal=4">4</a><br>' ;
echo '<a href="index.php?page=bestellenproducten&id='.$id.'&aantal=5">5</a><br>' ;
//  link om op te klikken om de nieuwe prijs te berekenen

        if(isset($_GET['aantal']) == TRUE){
    
$prijs = $info['prijs'];
    $nieuweprijs = $prijs * $_GET['aantal'];
// berekent de nieuweprijs bij het aangegeven aantal door de gebruiker en laat deze zien  
        print ("Het nieuwe bedrag bij het door u gekozen aantal is : &euro;$nieuweprijs,-");
}

?>
</div>

<?php
$i = $_GET['aantal'];
    echo 'Let op! Selecteer eerst een aantal voordat u verdergaat <br>';
    echo "Let op! Bij klikken op 'Bestel' zet u een bestelling <br>";
    echo '<a href="index.php?page=bestel&id='.$id.'&aantal='.$i.'">Bestel</a><br><br>' ;
    
         }
            
else  
                  {
    echo 'Helaas, wij verzoeken u eerst een product te selecteren uit de kijkshop.<br>';
    echo 'Om terug te gaan naar bekijkenproducten <a href="index.php?page=bekijkenproducten">Klik hier</a>' ;
                  }
                  ?>
