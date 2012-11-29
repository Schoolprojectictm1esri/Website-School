<?php
session_start();
//controleer of er een gebruikte cookie is.
//als post submit geset is is het formulier verstuurd.
if(isset($_COOKIE['beheerder_id']) && $_COOKIE['beheerder_id'] != '' && is_numeric($_COOKIE['beheerder_id'])){
    $_SESSION['beheerder_id'] = $_COOKIE['beheerder_id'];
    header('location: index.php?page=beheer');
}elseif(isset($_SESSION['beheerder_id'])){
    //controleer of sessie bestaat.

       header('location: index.php?page=beheer'); 
}
if(isset($_POST['submit'])){
    //als wachtwoord en gebruikersnaam niet leeg zijn.
    if($_POST['username'] != '' && $_POST['password'] != ''){
        //nu valideer met database.
        $naam = mysql_real_escape_string($_POST['username']);
        $wachtwoord = hashPassword($_POST['password']);
        $stmt = $db->query('select * from beheerder where gebruikersnaam = "'.$naam.'" AND wachtwoord = "'.$wachtwoord.'" AND actief = 1 LIMIT 0,1');
        $result = $stmt->fetchObject();
        if(empty($result)){
            echo '';
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
            <?php
        }else{
            //start sessie met gebruikersnaam.
            if($_POST['stayloggedin'] == true){
                setcookie('beheerder_id', $result->beheerder_id, time() +360000);
            }
            $_SESSION['beheerder_id'] = $result->beheerder_id;
            $_SESSION['gebruikersnaam'] = $result->gebruikersnaam;
            header('location: index.php?page=beheer');
        }
    }else{
        // toon formulier met gebruikersnaam ingevuld en foutmelding.
    ?>
    <!-- Toon formulier !-->
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
    //toon formulier.
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

?>
