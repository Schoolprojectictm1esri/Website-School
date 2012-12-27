<?php
/**
 * @author Jelle Smeets
 */
echo '<div id="bestel">';
if(isset($_POST['submit'])){
    if(check_wagentje()){
        //als formulier verstuurd is plaats bestelling.
            //eerste query voor bestellingen tabel.
        $insertbestellingen = $db->prepare('insert into bestelling (klant_id, datum) VALUES(:klant_id, :datum)');
        $insertbestellingen->bindParam(':klant_id', $_SESSION['klanten_id']);
        $datum = date('Y-m-d');
        $insertbestellingen->bindParam(':datum', $datum);
        $insertbestellingen->execute();
        $id = $db->lastInsertId();
        //query nummer 2 wordt een loop die elke keer opnieuw een prodid en aantal insert in bestellingproducten
        $insertbestprod = $db->prepare('insert into bestelling_producten (bestelling_id, product_id, aantal) VALUES (:b_id, :p_id, :aantal)');
        $insertbestprod->bindParam(':b_id', $id);
        //loop door alle winkelwagen items heen en insert deze.
        foreach($_SESSION['winkelwagen'] as $key => $val){
            
            $insertbestprod->bindParam(':p_id', $val['id']);
            $insertbestprod->bindParam(':aantal', $val['aantal']);
            $insertbestprod->execute();
        }
        
        //leeg hierna de winkelwagen.
        leeg_wagentje();
        echo 'Het plaatsen van de bestelling is gelukt!';
    }else{
        echo '<div class="error"> Er is geen winkelwagentje. Er kan dus ook niks besteld worden. </div>';
    }
}else{
    //controleer of er een winkelwagen is.
    if(check_wagentje()){
      echo 'U heeft de volgende producten in uw winkelwagentje: <br />';
      echo '<form name="bestel" action="index.php?page=bestel" method="POST">
          <table>
                <tr>
                    <th> Product: </th>
                    <th> Aantal: </th>
                    <th> Totaalprijs per product: </th>
                </tr>';
      $prod = $db->prepare('select * from producten where id = :id');
      $totprijs = 0;
      //toon naam bij product.
      foreach($_SESSION['winkelwagen'] as $key => $val){
          $prod->bindParam(':id', $val['id']);
          $prod->execute();
          $objprod = $prod->fetchObject();
          if($objprod != false){
              $prijs = $val['aantal'] * $objprod->prijs;
              $totprijs = $totprijs + $prijs;
            echo '<tr>
                <td>'.$objprod->naam.'</td>
                <td>'.$val['aantal'].'</td>
                <td>&euro;'.$prijs.'</td>
            </tr>';  
          }else{
              //fout met een product. Toon dit in de tabel.
              echo '<tr><td>Fout met productid: </td><td>'.$val['id'].'</td></tr>';
          }
      }
      //toon de totaalprijs en bestelknop.
      echo '<tr><td> Totaal prijs bestelling: </td><td colspan=2>&euro;'.$totprijs.'</td></tr>';
      echo '<tr><td><input type="submit" name="submit" value="bestel" />';
      echo '</table>
          </form>';
    }else{
        //geen winkelwagentje beschikbaar.
          echo '<div class="error">U heeft geen winkelwagentje. Klik <a href="index.php?page=bekijkenproducten">hier</a> om terug te gaan naar de productenpagina.</div>';
    }
}
echo '</div>';
?>