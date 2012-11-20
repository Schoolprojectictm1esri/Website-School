<?
/**
 * document by Thomas Vermeulen.
 * Created on 13-11-2012.
 * Version 1.0
 */
?>
<?php
session_start();
//is het formulier verstuurd?
if(isset($_POST['submit'])){
    if($_POST['emailadres'] != '' && $_POST['password'] != ''){
        //beide velden zijn ingevuld.
        $email = mysql_real_escape_string($_POST['emailadres']);
        $password = mysql_real_escape_string($_POST['password']);
        $stmt = $db->query("SELECT * FROM klanten WHERE `e-mail` = '".$email."' AND `wachtwoord` = '".$password."'");
        $result = $stmt->fetchObject();
        if(!empty($result)){
            //gebruiker id in sessie.
            $_SESSION['klant_id'] = $result->klant_id;
            $_SESSION['voornaam'] = $result->voornaam;
             header('location: index.php?page=agenda');
            //gebruiker doorsturen naar agenda.php
          }
        else{
            print('Onjuiste inlog gegevens');
        }
    }else{
        //niet alles is correct ingevuld.
           ?>
            <form action="index.php?page=inloggen_bij_agenda" method="POST">
            <table>
                <tr>
                    <td>E-mailadres</td>
                    <td><input type="text" name="emailadres" value="<?php echo $_POST['emailadres']; ?>"/></td>
                </tr>
                <tr>
                    <td>Wachtwoord</td> 
                    <td><input type="password" name="password"/></td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" name="submit" value="Inloggen" />
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <a Href="index.php?page=wachtwoord_vergeten"> Wachtwoord opvragen</a>
                    </td>
                </tr>
            </table>
        </form>
        <div class="error">
            U heeft niet alle velden ingevuld.
        </div>
    <?php
    }
}else{
    //toon leeg formulier
    ?>
            <form action="index.php?page=inloggen_bij_agenda" method="POST">
            <table>
                <tr>
                    <td>E-mailadres</td>
                    <td><input type="text" name="emailadres" /></td>
                </tr>
                <tr>
                    <td>Wachtwoord</td> 
                    <td><input type="password" name="password"/></td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" name="submit" value="Inloggen" />
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <a Href="index.php?page=wachtwoord_vergeten"> Wachtwoord opvragen</a>
                    </td>
                </tr>
            </table>
        </form>
    <?php
}