<?php
/**
 * document by Jelle Smeets.
 * Created on 13-11-2012.
 * Last updated on: 15-11-2012 By Jelle
 * Version 1.1
 */
//maak globale variabele met instellingen.

global $data;
$data['develop'] = true;
if($data['develop']){
    $data['baseurl'] = 'http://ictm1e.pedicurepraktijkdesiree.nl/';
}else{
    $data['baseurl'] = 'http://www.pedicurepraktijkdesiree.nl/';
}
//regelt database connectie. standaard connectie voor sql in samenwerking met xampp.
// laad de database pedicure.
try{
    if($data['develop']){
        $db = new PDO('mysql:host=localhost;dbname=pedicure', 'root', '');
    }else{
        $db = new PDO('mysql:host=localhost;dbname=deb41761_pedicure', 'deb41761_site', 'h83PI0Th');
    }
}catch(Exception $e){
    //als develop mode ingesteld is laat foutmelding zien, anders toon geen foutmelding aan de end-user.
    if($data['develop'] == true){
        echo 'Data base connection failed: '.$e->getMessage();
    }else{
        echo 'Problemen met het verbinden met de database.';
    }
}

//set error reporting.
if($data['develop'] == true){
    error_reporting(E_ALL);
}else{
    error_reporting(0);
}
require_once('functions.php');

//Set the title aan de hand van de op te vragen pagina.
if(isset($_GET['page'])){
    //voeg de op gevraagde pagina toe aan de title en maak de eerste letter een hoofdletter.
    //En vervang de _ in bestandsnamen door een spatie.
    $title = '- '.str_replace('_', '&nbsp;',ucfirst(strtolower($_GET['page'])));
}else{
    //voeg niks toe aan de title.
    $title = '';
}
require_once('pagelist.php');
?>
