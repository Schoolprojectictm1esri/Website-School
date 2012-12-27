<?php
/**
 * @author Jelle Smeets, opnieuw opgepakt.
 * 
 */

echo '<div id="bestellenproducten">';
if(isset($_POST['submit']) && isset($_POST['prodid']) && is_numeric($_POST['prodid'])){
    //als formulier verstuurd is, voeg het dan toe aan het winkelwagentje
    if((int)$_POST['aantal'] != 0){
        //voeg de producten toe aan de winkelwagen.
       voeg_toe_winkelwagen($_POST['prodid'], $_POST['aantal']);
       echo 'Het product is in het winkelwagentje geplaats. U kunt verder gaan met winkelen, of het <a href="index.php?page=bestel">hier</a> bestellen.';
        //var_dump($_SESSION);
    }else{
      echo '<div class="error">U kunt niet 0 keer iets bestellen. Klik <a href="index.php?page=bestellenproducten&id='.$_POST['prodid'].'">hier</a> om terug te gaan naar de productenpagina.</div>';
    }
}else{
    if(isset($_GET['id']) && $_GET['id'] != ''){
        // als er bij bekijkenproducten op een product is geselecteerd en op geklikt , wordt er gecontroleerd of er een waarde is meegegeven
        $product=$db->prepare("SELECT * FROM producten WHERE id = :id"); 
        $product->bindParam(':id', $_GET['id']);
        $product->execute();
        $lijst = $product->fetchObject();
        //als query succesvol is toon dan lijst met productgegevens
        if($lijst != false){
            echo '<form id="bestellenproductenform" name="bestellenproducten" action="index.php?page=bestellenproducten&id='.$_GET['id'].'" method="POST">
                    <input type="hidden" name="prodid" value="'.$_GET['id'].'" />
                    <table>
                    <tr>
                        <td> Naam: </td>
                        <td> '.$lijst->naam.'</td>
                    </tr>
                    <tr>
                        <td> Prijs: </td>
                        <td> &euro;'.$lijst->prijs.'</td>
                    </tr>
                    <tr>
                        <td> Omschrijving: </td>
                        <td> '.$lijst->omschrijving.'</td>
                    </tr>
                     <tr>
                        <td> Foto: </td>
                        <td> <img src="'.$lijst->foto.'" class="imgt" /></td>
                    </tr>
                    <tr>
                        <td> Aantal: </td>
                        <td>    
                            <select name="aantal">
                                <option value="0">Selecteer aantal</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="submit" value="Plaats in winkelwagentje" name="submit"></td>
                    </tr>
                </table>
                 </form>';
        }else{
            //query heeft niks op kunnen halen.
            echo '<div class="error">Het ophalen van het product is mislukt.</div>';
        }
    }else{
        //geen id meegegeven.
        echo '<div class="error">Er is geen product geselecteerd. Klik <a href="index.php?page=bekijkenproducten">hier</a> om terug te gaan naar de productenpagina.</div>';
    }
}
echo '</div>';