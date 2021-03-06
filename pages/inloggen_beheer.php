<?php
/*
 * @author Jelle Smeets
 *  
 */
//als een gebruiker al ingelogd is met een cookie of een sessie stuur deze dan door naar beheer pagina. Je hoeft immers geen 2x in te loggen.
if(isset($_COOKIE['beheerder_id']) && $_COOKIE['beheerder_id'] != '' && is_numeric($_COOKIE['beheerder_id'])){
    //maak de sessie de huidige cookie zodat op de rest van de site gebruik gemaakt kan worden.
    $_SESSION['beheerder_id'] = $_COOKIE['beheerder_id'];
    header('location: index.php?page=beheer');
}elseif(isset($_SESSION['beheerder_id'])){
    //controleer of sessie bestaat.
    header('location: index.php?page=beheer'); 
}

// Controleer op vaker versturen dit formulier.
if(checkSpam('inlog_form_beheer')){
    echo 'U heeft te vaak foutief proberen in te loggen.';
}else{
    //controle en verwerking. anders toon leeg formulier.
    if(isset($_POST['submit'])){
        //als wachtwoord en gebruikersnaam niet leeg zijn.
        if($_POST['username'] != '' && $_POST['password'] != ''){
            //nu valideer met database.
            $wachtwoord = hashPassword($_POST['password']);
            $stmt = $db->prepare('select * from beheerder where gebruikersnaam = :naam AND wachtwoord = :wachtwoord AND actief = 1 LIMIT 0,1');
            $stmt->bindParam(':naam', $_POST['username']);
            $stmt->bindParam(':wachtwoord', $wachtwoord);
            //als resultaat leeg is, toon het formulier dat het inloggen niet gelukt is.   
            $stmt->execute();
            $result = $stmt->fetchObject();
           if(empty($result)){
                //set spam lvl een hoger
               setSpam('inlog_form_beheer');
                ?>
                <div id="beheer-login">
                    <form id="beheer-form" action="index.php?page=inloggen_beheer" method="POST">
                        <table id="table-beheer-login-form">
                            <tr>
                                <td> Gebruikersnaam: </td>
                                <td><input type="text" name="username" value="<?php echo $_POST['username']; ?>"/></td>
                            </tr>
                            <tr>
                                <td> Wachtwoord:</td>
                                <td><input type="password" name="password" /></td>
                            </tr>
                            <tr>
                                <td>Ingelogd blijven?</td>
                                <td><input type="checkbox" name="stayloggedin" /></td>
                            </tr>
                            <tr>
                                <td colspan="2"><input type="submit" name="submit" value="login" /></td>
                            </tr>
                        </table>
                    </form>
                    <div class="error">De combinatie van gebruikersnaam en wachtwoord is onjuist.</div>
                </div>
                <?php
            }else{
                //start sessie met gebruikersnaam.
                if($_POST['stayloggedin'] == true){
                    //als er ingelogd moet blijven start dan ook cookies.
                    setcookie('beheerder_id', $result->beheerder_id, time() +360000);
                }
                //maak sessie met gebruikersinformatie.
                $_SESSION['beheerder_id'] = $result->beheerder_id;
                $_SESSION['gebruikersnaam'] = $result->gebruikersnaam;
                header('location: index.php?page=beheer');
            }
        }else{
            // toon formulier met gebruikersnaam ingevuld en foutmelding.
        ?>
        <!-- Toon formulier met waardes!-->
        <div id="beheer-login">
            <form id="beheer-form" action="index.php?page=inloggen_beheer" method="POST">
                <table id="table-beheer-login-form">
                    <tr>
                        <td> Gebruikersnaam: </td>
                        <td><input type="text" name="username" value="<?php echo $_POST['username']; ?>"/></td>
                    </tr>
                    <tr>
                        <td> Wachtwoord:</td>
                        <td><input type="password" name="password" /></td>
                    </tr>
                    <tr>
                        <td>Ingelogd blijven?</td>
                        <td><input type="checkbox" name="stayloggedin" /></td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="submit" name="submit" value="login" /></td>
                    </tr>
                </table>
            </form>
            <div class="error">Vul alstublieft alle velden in.</div>

        </div>
        <?php
        }

    }else{
        ?>
        <!-- Toon formulier !-->
        <div id="beheer-login">
            <form id="beheer-form" action="index.php?page=inloggen_beheer" method="POST">
                <table id="table-beheer-login-form">
                    <tr>
                        <td> Gebruikersnaam: </td>
                        <td><input type="text" name="username" /></td>
                    </tr>
                    <tr>
                        <td> Wachtwoord:</td>
                        <td><input type="password" name="password" /></td>
                    </tr>
                    <tr>
                        <td>Ingelogd blijven?</td>
                        <td><input type="checkbox" name="stayloggedin" /></td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="submit" name="submit" value="login" /></td>
                    </tr>
                </table>
            </form>

        </div>
        <?php
    }
}
?>
