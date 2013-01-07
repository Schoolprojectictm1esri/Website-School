<?
/**
 * document by Thomas Vermeulen.
 * Created on 21-11-2012.
 * Version 1.0
 */
?>
<?php
require_once('includes/functions.php');
//check submit
if(isset($_POST['submit'])){
    //check email niet leeg
    if($_POST['emailadres'] != ''){
        //query om informatie op te halen
        $stmt = $db->prepare("SELECT * FROM klanten WHERE `emailadres` = :email");
        $stmt->bindParam(':email', $_POST['emailadres']);
        $stmt->execute();
        $result = $stmt->fetchObject();
            //controleert of resultaat niet leeg is
            if(!empty($result)){
                //aanmaken hass voor link
                $hash = hashpasswordrecovery2($_POST['emailadres']);
                $stmt = $db->prepare("UPDATE `klanten` SET `hash`= :hash WHERE `emailadres`= :emailadres");
                $stmt->bindParam(':hash', $hash);
                $stmt->bindParam(':emailadres', $_POST['emailadres']);
                $stmt->execute();
                //mail
                $to = $_POST['emailadres'];
                $subject = "Wachtwoord vergeten";
                $headers = "MIME-Version: 1.0". "\r\n";
                $headers .= "Content-type:text/html;charset=iso-8859-1". "\r\n";
                $headers .= "From: <noreply@pedicurepraktijkdesiree.nl>"."\r\n";
                $message = "
                    <html>
                        <head>
                            <title>Wachtwoord vergeten</title>
                        </head>
                    <body>
                        <table>
                            <tr>
                                <th>Beste,<th>
                            </tr>
                            <tr>
                                <td>Klik op de onderstaande link om uw wachtwoord opnieuw in te voeren</td>
                            </tr>
                            <tr>
                                <td>thomasvermeulen_2@hotmail.com </td> <!-- en de rest ofcourse!!! -->
                            </tr>
                            <tr>
                                <a href='".$data['baseurl']."index.php?page=wachtwoord_wijzigen&value=".$hash."'>Klik hier</a>
                            </tr>
                            <tr>
                                <td>Met vriendelijke groet PedicurePraktijk Desiree.
                            </tr>
                        </table>
                    </body>
                    </html>
                    ";
                //automatische mail
                mail($to, $subject, $message, $headers);
            //eindpagina
            echo 'Email word verzonden.';
            }
            else {
?>          <!-- formulier !-->
            <div id="wwvergeten">
                <form action="index.php?page=wachtwoord_vergeten" method="POST">
                    <table>
                            <!tekst !>
                            <h2>Wachtwoord opvragen/wijzigen</h2>
                            <p />
                            Als je je wachtwoord bent vergeten of je wilt je wachtwoord wijzigen,   <br /> 
                            voer dan hier je gebruikersnaam en het e-mailadres in waarmee je je     <br />
                            aangemeld hebt. Je krijgt dan een e-mail waarmee je een nieuw wachtwoord kunt kiezen.
                        <tr>
                            <td>E-mailadres:</td>
                            <td><input type="text" name="emailadres" /><td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input type="submit" value="submit" name="submit"</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>Onjuist emailadres</td>
                        </tr>
                    </table>
                </form>  
            </div>
<?php
            }
    }
    else {
?>      <!-- formulier !-->
        <div id="wwvergeten">
            <form action="index.php?page=wachtwoord_vergeten" method="POST">
                <table>
                        <!tekst !>
                        <h2>Wachtwoord opvragen/wijzigen</h2>
                        <p />
                        Als je je wachtwoord bent vergeten of je wilt je wachtwoord wijzigen,   <br /> 
                        voer dan hier je gebruikersnaam en het e-mailadres in waarmee je je     <br />
                        aangemeld hebt. Je krijgt dan een e-mail waarmee je een nieuw wachtwoord kunt kiezen.
                    <tr>
                        <td>E-mailadres:</td>
                        <td><input type="text" name="emailadres" /><td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="submit" value="submit" name="submit"</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Vul emailadres in</td>
                    </tr>
                </table>
            </form>  
        </div>
<?php
        }
}
else {
?>
<!-- formulier !-->
<div id="wwvergeten">
    <form action="index.php?page=wachtwoord_vergeten" method="POST">
        <table>
                <!tekst !>
                <h2>Wachtwoord opvragen/wijzigen</h2>
                <p />
                Als je je wachtwoord bent vergeten of je wilt je wachtwoord wijzigen,   <br /> 
                voer dan hier je gebruikersnaam en het e-mailadres in waarmee je je     <br />
                aangemeld hebt. Je krijgt dan een e-mail waarmee je een nieuw wachtwoord kunt kiezen.
            <tr>
                <td>E-mailadres:</td>
                <td><input type="text" name="emailadres" /><td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="submit" name="submit"</td>
            </tr> 
        </table>
    </form>  
</div>
<?php 
}
?>
