<?
/**
 * document by Thomas Vermeulen.
 * Created on 21-11-2012.
 * Version 1.0
 */
?>
<?php

if(isset($_POST['submit'])){
    if($_POST['emailadres'] != ''){
        
        $stmt = $db->query("SELECT * FROM klanten WHERE `e-mail` = '".mysql_real_escape_string($_POST['emailadres'])."'");
        $result = $stmt->fetchObject();
            if(!empty($result)){
            //mail
                $to = $_POST['emailadres'];
                $subject = "Wachtwoord vergeten";
                $from = "noreply@pedicurepraktijkdesiree.nl";
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
                                <td>".$emailadres." </td> <!-- en de rest ofcourse!!! -->
                            </tr>
                            <tr>
                                <td>Met vriendelijke groet PedicurePraktijk Desiree.
                            </tr>
                        </table>
                    </body>
                    </html>
                    ";
                mail($to,$from,$subject,$message);
            echo 'Email word verzonden.';
            }
            else {
?>
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
?>
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
