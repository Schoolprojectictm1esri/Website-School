<?php
/*
 * @author Jelle
 */
//lijst van pagina's
// 0 is anoniem, iedereen mag de pagina zien.
// 1 elke klant die ingelogd is mag deze pagina zien.
// 2 Elke beheerder die ingelogd is mag deze pagina zien.

//De key van de array is de naam van de pagina (zonder.php erachter).
$pagelist = array();
//algemene pagina's
$pagelist['home'] = 0;
//pagina's van Jelle.
$pagelist['inloggen_beheer'] = 0;
$pagelist['routebeschrijving'] = 0;
$pagelist['beheer'] = 2;
$pagelist['toevoegen_klant'] = 2;
// pagina's van Daniel
$pagelist['aanpassenklantegegevens'] = 2;
$pagelist['inzienagenda'] = 1;
$pagelist['aanpassenproducten'] = 2;
// pagina's van Thomas
$pagelist['bevestigen_afspraak'] = 2;
$pagelist['wachtwoord_vergeten'] = 0;
$pagelist['wachtwoord_wijzigen'] = 0;
$pagelist['inloggen_bij_agenda'] = 0;
$pagelist['inzienklantgegevens'] = 2;
// pagina's van Thom
$pagelist['beherenbestellingen'] = 2;
$pagelist['bekijkenproducten'] = 0;
$pagelist['bestellenproducten'] = 1;
$pagelist['inplannenafspraak'] = 1;
?>
