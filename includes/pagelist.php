<?php
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
?>
