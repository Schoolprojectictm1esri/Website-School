<?php
/**
 * document by Jelle Smeets.
 * Created on 13-11-2012.
 * Last updated on: 15-11-2012 By Jelle
 * Version 1.0
 */

//laad bootstrap en initialiseer alle settings.
require_once('includes/bootstrap.php');
?>
<!doctype html>
<html>
<head>
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
            Header afbeelding
        </div>
        <div id="menu">
           menu
        </div>
        <!-- Div for content scripts !-->
        <div id="contentwrapper">
            <div id="content-left">
                Sidebar
            </div>
            <div id="content-right">
                <?php
                //haal pagina op en laad de pagina.
                if(isset($_GET['page'])){
                    //kijk of de pagina een string is.
                    if(is_string($_GET['page'])){
                        //kijk of het bestand bestaat.
                        if(file_exists('pages/'.$_GET['page'].'.php')){
                            //laad de opgevraagde pagina die bestaat.
                            require_once('pages/'.$_GET['page'].'.php');
                        }else{
                            //geen pagina gevonden.
                            echo 'De opgegeven pagina bestaat niet.';
                        }
                    }else{
                        //get variabele voldoet niet aan de gestelde eisen.
                        echo 'U heeft geen geldige pagina opgegeven.';
                    }
                }else{
                    //homepagina wordt geladen.
                    require_once('pages/home.php');
                }


                ?>
            </div>
            <div class="spacer"></div>
        </div>
        <div id="footer">
            Footer!
        </div>
    </div>
</body>
</html>