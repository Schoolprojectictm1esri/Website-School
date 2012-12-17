<?php

/**
 * document by Jelle Smeets.
 * Created on 13-11-2012.
 * Last updated on: 15-11-2012 By Jelle
 * Version 1.0
 */
ob_start();
session_start();
//laad bootstrap en initialiseer alle settings.
require_once('includes/bootstrap.php');
?>
<!doctype html>
<html>
    <head>
        <script type="text/javascript" src="includes/jquery-1.8.3.js"></script>
        <?php
        //kunnen meer pagina's worden toegevoegd voor custom jquery/javascript scripts.
        if (isset($_GET['page'])) {
            //als pagina routebeschrijving geladen is laat google api jquery stuff.
            if ($_GET['page'] == 'routebeschrijving') {
                ?>
                <script type="text/javascript">
                    <!--
                    var anwb_tool="adresnv";
                    var anwb_tool_type="normal";
                    var anwb_tool_tekst="Pedicure praktijk Desiree";
                    var anwb_tool_lon="";
                    var anwb_tool_lat="";
                    var anwb_tool_postcode="8033 EH";
                    var anwb_tool_nr="63";
                    //-->
                </script>
                

        <?php
    }
}
?>
        <!-- $title komt uit de bootstrap !-->
        <title> 
            Pedicure praktijk D&#233;sir&#233;e <?php echo $title; ?>
        </title>
        <meta charset="UTF-8">
        <!-- Verschillende stylesheets om elkaar niet in de weg te zitten. Aan het einde van project samenvoegen !-->
        <link rel="stylesheet" type="text/css" href="style/style.css" />
        <link rel="stylesheet" type="text/css" href="style/danielstyle.css" />
        <link rel="stylesheet" type="text/css" href="style/jellestyle.css" />
        <link rel="stylesheet" type="text/css" href="style/thomstyle.css" />
        <link rel="stylesheet" type="text/css" href="style/sanderstyle.css" />
        <link rel="stylesheet" type="text/css" href="style/thomasstyle.css" />
    </head>    
    <body>
        <!-- Wrapper div for website !-->
        <div id="wrapper">
            <!-- Div for header!-->
            <div id="header">
                <div id="contact-info-header">
                    Pedicure praktijk D&#233;sir&#233;e <br/>
                    T: 06-41544308 <br />
                    E: <a href="mailto:desiree.vermeulen@home.nl">desiree.vermeulen@home.nl</a> <br />
                    Leerinkbeek 63 <br />
                    8033 EH Zwolle
                </div>
            </div>
            <div id="menu">
                <?php echo getMenu(getRole()); ?>
            </div>
            <!-- Div for content scripts !-->
            <div id="contentwrapper">
                <div id="content-left">
                    <!--
                    <div class="sidebar">
                        <div class="innersidebar">
                            Sub menu item.
                        </div>
                    </div>
                    <div class="sidebar">
                        <div class="innersidebar">
                            Sub menu item.
                        </div>
                        
                    </div>
                    <div class="sidebar">
                        <div class="innersidebar">
                            Sub menu item.
                        </div>
                        
                    </div>
                    <div class="sidebar">
                        <div class="innersidebar">
                            Sub menu item.
                        </div>
                      
                    </div>!-->
                </div>
                <div id="content-right">
<?php
//haal pagina op en laad de pagina.
if (isset($_GET['page'])) {
    //kijk of de pagina een string is.
    if (is_string($_GET['page'])) {
        //kijk of het bestand bestaat.
        if (file_exists('pages/' . $_GET['page'] . '.php')) {
            //laad de opgevraagde pagina die bestaat.
            if (isset($pagelist[$_GET['page']]) && is_numeric($pagelist[$_GET['page']])) {
                if (getRole() >= $pagelist[$_GET['page']]) {
                    require_once('pages/' . $_GET['page'] . '.php');
                } else {
                    echo '<p class="permission_error">U heeft onvoldoende rechten om deze pagina te bekijken. <br />
                                        Mocht deze fout zich vaker voordoen terwijl u wel voldoende rechten heeft, neemt u dan alstublieft contact op met de  Pedicure praktijk D&#233;sir&#233;e.
                                        </p>';
                }
            } else {
                //anonieme gebruikers zijn toegestaan.
                require_once('pages/' . $_GET['page'] . '.php');
            }
        } else {
            //geen pagina gevonden.
            echo 'De opgegeven pagina bestaat niet.';
        }
    } else {
        //get variabele voldoet niet aan de gestelde eisen.
        echo 'U heeft geen geldige pagina opgegeven.';
    }
} else {
    //homepagina wordt geladen.
    require_once('pages/home.php');
}
?>
                </div>
                <div class="spacer"></div>
            </div>
            <div id="footer">
                    <?php
                    if (date('Y') == 2012) {
                        echo 'Copyright &copy;  Pedicure praktijk D&#233;sir&#233;e 2012';
                    } else {
                        echo 'Copyright &copy;  Pedicure praktijk D&#233;sir&#233;e 2012 -  ' . date("Y");
                    }
                    ?> 
            </div>
        </div>
    </body>
</html>
<?php
ob_end_flush();
?>