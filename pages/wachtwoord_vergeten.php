<?php
if(isset($_POST['submit'])){
    if($_POST['emailadres'] != ''){
        $stmt = $db->query("SELECT * FROM klanten WHERE `e-mail` = '".$_POST['emailadres']."'");
        $result = $stmt->fetchObject();
            if(!empty($result)){
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
