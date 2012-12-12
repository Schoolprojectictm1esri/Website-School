<?
/**
 * document by Thomas Vermeulen.
 * Created on 12-12-2012.
 * Version 1.0
 */
?>
<?php
//controleert of er een specifieke klant is
if(isset($_GET['klant_id'])){
    $klant_id = $_GET['klant_id'];
    $stmt = $db->query("SELECT * FROM `klanten` WHERE `klant_id` = '".$klant_id."'");
    $result1 = $stmt->fetchObject();
    
?>
<div id="inzienklantgegevens">
    <form action="index.php/inzienklantgegevens&klant_id=<?php echo $klant_id ?>" method="GET">
        <table>
                        <!-- Waarde 1 -->
            <tr>
                <td>klantID:</td>
                <td><?php echo $result1->klant_id ?></td>
            </tr>
                        <!-- Waarde 2 -->
            <tr>
                <td>E-mail:</td>
                <td><?php echo $result1->email ?></td>
            </tr>
                        <!-- Waarde 3 -->
            <tr>
                <td>Voorletters:</td>
                <td><?php echo $result1->voorletters ?></td>
            </tr>
                        <!-- Waarde 4 -->
            <tr>
                <td>Achternaam:</td>
                <td><?php echo $result1->tussenvoegsel;echo $result1->achternaam ?></td>
            </tr>
                        <!-- Waarde 5 -->
            <tr>
                <td>Adres:</td>
                <td><?php echo $result1->adres ?></td>
            </tr>
                        <!-- Waarde 6 -->
            <tr>
                <td>Woonplaats:</td>
                <td><?php echo $result1->woonplaats ?></td>
            </tr>
                        <!-- Waarde 7 -->
            <tr>
                <td>Postcode:</td>
                <td><?php echo $result1->postcode ?></td>
            </tr>
                        <!-- Waarde 8 -->
            <tr>
                <td>Telefoonnummer:</td>
                <td><?php echo $result1->telefoonnr ?></td>
            </tr>
                        <!-- Waarde 9 -->
            <tr>
                <td>Klantenkaarnummer:</td>
                <td><?php echo $result1->klant_nummer ?></td>
            </tr>
                        <!-- Waarde 10 -->
            <tr>
                <td>Beroep:</td>
                <td><?php echo $result1->beroep ?></td>
            </tr>
                        <!-- Waarde 11 -->
            <tr>
                <td>Geboortedatum:</td>
                <td><?php echo $result1->geboortedatum ?></td>
            </tr>
                        <!-- Waarde 12 -->
            <tr>
                <td>Gewicht:</td>
                <td><?php echo $result1->gewicht ?></td>
            </tr>
                        <!-- Waarde 13 -->
            <tr>
                <td>Diabetis:</td>
                <td><?php if($result1->diabetis_melitus == TRUE){
                                    echo 'Ja';} 
                                    else{ 
                                    echo 'Nee' ;} ?></td>
            </tr>
                        <!-- Waarde 14 -->
            <tr>
                <td>Hart/vaat ziekte:</td>
                <td><?php if($result1->hart_vaat == TRUE){
                                    echo 'Ja';} 
                                    else{ 
                                    echo 'Nee' ;} ?></td>
            </tr>
                        <!-- Waarde 15 -->
            <tr>
                <td>Antistollingsmiddelen:</td>
                <td><?php if($result1->anti_stol == TRUE){
                                    echo 'Ja';} 
                                    else{ 
                                    echo 'Nee' ;} ?></td>
            </tr>
                        <!-- Waarde 16 -->
            <tr>
                <td>Phema:</td>
                <td><?php if($result1->phema == TRUE){
                                    echo 'Ja';} 
                                    else{ 
                                    echo 'Nee' ;} ?></td>
            </tr>
                        <!-- Waarde 17 -->
            <tr>
                <td>Allergie:</td>
                <td><?php if($result1->allergie == TRUE){
                                    echo 'Ja';} 
                                    else{ 
                                    echo 'Nee' ;} ?></td>
            </tr>
                        <!-- Waarde 18 -->
            <tr>
                <td>Hiv:</td>
                <td><?php if($result1->hiv == TRUE){
                                    echo 'Ja';} 
                                    else{ 
                                    echo 'Nee' ;} ?></td>
            </tr>
                        <!-- Waarde 19 -->
            <tr>
                <td>Hepatitis:</td>
                <td><?php if($result1->hepatitis == TRUE){
                                    echo 'Ja';} 
                                    else{ 
                                    echo 'Nee' ;} ?></td>
            </tr>
                        <!-- Waarde 20 -->
            <tr>
                <td>Hemofilie:</td>
                <td><?php if($result1->hemofilie == TRUE){
                                    echo 'Ja';} 
                                    else{ 
                                    echo 'Nee' ;} ?></td>
            </tr>
                        <!-- Waarde 21 -->
            <tr>
                <td>Steunkousen:</td>
                <td><?php if($result1->steunkousen == TRUE){
                                    echo 'Ja';} 
                                    else{ 
                                    echo 'Nee' ;} ?></td>
            </tr>
                        <!-- Waarde 22 -->
            <tr>
                <td>Voettype:</td>
                <td><?php echo $result1->voettype ?></td>
            </tr>
                        <!-- Waarde 23 -->
            <tr>
                <td>Orthopedische afwijking:</td>
                <td><?php echo $result1->orthopedische_afwijking ?></td>
            </tr>
                        <!-- Waarde 24 -->
            <tr>
                <td>Steunzolen:</td>
                <td><?php if($result1->steunzolen == TRUE){
                                    echo 'Ja';} 
                                    else{ 
                                    echo 'Nee' ;} ?></td>
            </tr>
                        <!-- Waarde 25 -->
            <tr>
                <td>Huidconditie:</td>
                <td><?php echo $result1->huidconditie ?></td>
            </tr>
                        <!-- Waarde 26 -->
            <tr>
                <td>Nagelconditie:</td>
                <td><?php echo $result1->nagelconditie ?></td>
            </tr>
                        <!-- Waarde 27 -->
            <tr>
                <td>Nagelaandoending:</td>
                <td><?php echo $result1->nagelaandoening ?></td>
            </tr>
            <tr>
                <td>Voet plantair (rechts):</td>
                <td><?php echo $result1->plantaire_rechts ?></td>
            </tr>
                        <tr>
                <td>Voet plantair (links):</td>
                <td><?php echo $result1->plantaire_links ?></td>
            </tr>
                        <tr>
                <td>Voet dorsaal (rechts):</td>
                <td><?php echo $result1->dorsale_rechts ?></td>
            </tr>
                        <tr>
                <td>Voet dorsaal (links):</td>
                <td><?php echo $result1->dorsale_links ?></td>
            </tr>
            <tr>
                <td></td>
                <td><a href='index.php?page=aanpassenklantgegevens&klant_id=<?php echo $result1->klant_id ?> '>Gegevens aanpassen</a>
            </tr>
        </table>
    </form>
</div>
<?php
}
//print formulier met alle klanten(voorletters, achternaam, email
else{
    ?>
<table>
    <tr>
        <th>Klant ID</th>
        <th>Voorletters</th>
        <th>Achternaam</th>
    </tr>
    <?php
    $stmt = $db->query("SELECT `klant_id`,`voorletters`,`achternaam` FROM klanten");
    $result2 = $stmt->fetchall();
    foreach ($result2 as $row => $row2){
        print "
            <tr>
                <td> ".$row2['klant_id']." </td>
                <td> ".$row2['voorletters']." </td>
                <td> ".$row2['achternaam']." </td>
                <td> <a href='index.php?page=inzienklantgegevens&klant_id=".$row2['klant_id']."'>Bekijken</a> </td>
            </tr>
" ;
    }
    echo "</table>";
}
?>
