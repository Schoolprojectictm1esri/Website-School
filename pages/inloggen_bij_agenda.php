<?
/**
 * document by Thomas Vermeulen.
 * Created on 13-11-2012.
 * Version 1.0
 */
?>
<?php
if(isset($_COOKIE['klanten_id']) && $_COOKIE['klanten_id'] != '' && is_numeric($_COOKIE['klanten_id'])){
    $_SESSION['klanten_id'] = $_COOKIE['klanten_id'];
    header('location: index.php?page=agenda');
}elseif(isset($_SESSION['klanten_id'])){
    //controleer of sessie bestaat.  
    header('location: index.php?page=agenda');
}
if(checkSpam('inlog_form_klant')){
    echo 'U heeft te vaak foutief ingelogd.';
}else{
    //is het formulier verstuurd?
    if(isset($_POST['submit'])){
        if($_POST['emailadres'] != '' && $_POST['password'] != ''){
            //beide velden zijn ingevuld.
            $password = hashPassword($_POST['password']);
            //querie voor controle DataBase
            $stmt = $db->prepare("SELECT * FROM klanten WHERE `email` = :email AND `wachtwoord` = :password");
            $stmt->bindParam(':email', $_POST['emailadres']);
            $stmt->bindParam(':password', $password);
            $stmt->execute();
                //Als er een return
                $result = $stmt->fetchObject();
                if(!empty($stmt)){
                    //kijken of actief is
                    if($result->actief == 1){
                    //gebruiker id in sessie.
                    setcookie('klanten_id', $result->klanten_id, time() +360000);
                    $_SESSION['klanten_id'] = $result->klant_id;
                    $_SESSION['achternaam'] = $result->achternaam;
                     //gebruiker doorsturen naar agenda.php
                    header('location: index.php?page=agenda');
                }
                    else{
                        ?>
                        Activeer eerst uw account. Of ga terug naar de homepagina <br />
                        <a href="index.php">Klik hier.</a>
                        <?php
                    
                    }
                }
            else{
                setSpam('inlog_form_klant');
     ?>  
    <div id="inloggenagenda">
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
                Onjuiste inlog gegevens.
            </div>
    </div>
    <?php
            }
        }else{
            setSpam('inlog_form_klant');
            //niet alles is correct ingevuld.
    ?>
    <div id="inloggenagenda">
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
    </div>
    <?php
        }
    }else{
        //toon leeg formulier
    ?>
    <div id="inloggenagenda">
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
    </div>
        <?php
    }
}