 
<html>
   <link rel="stylesheet" type="text/css" href="danielstyle.css" />
   <th>Beschikbaarheid.</th>      
   <table border="2">
   <!--if statement
}-->
   
<!--$beschikbaarheid = beschikbaarheid uit database
 if($beschikbaarheid == "beschikbaar")
                {
                 print("tagendaavail");
}
        
            Elseif($beschikbaarheid == "druk")
            { 
                Print("tagendabusy");
            }
             Else($beschikbaarheid == "vol")
            { 
                Print("tagendafull");
            }

-->
         <tr>
             <td span class="tagendaavail">1</td>
             <td span class="tagendaavail">2</td>
             <td span class="tagendaavail">3</td>
             <td span class="tagendaavail">4</td>             
         </tr>
         <!-- elke knop moet een TD zijn om zo nieuwe pagina met tijden te kunnen openen?-->
           <tr>
             <td span class="tagendaavail">1</td>
             <td span class="tagendaavail">2</td>
             <td span class="tagendaavail">3</td>
             <td span class="tagendaavail">4</td>             
         </tr>
          <tr>
                 <td span class="tagendabusy">1</td>
                 <td span class="tagendabusy">2</td>
                 <td span class="tagendabusy">3</td>
                 <td span class="tagendabusy">4</td>
              
         </tr>
           <tr>
             <td span class="tagendaavail">1</td>
             <td span class="tagendaavail">2</td>
             <td span class="tagendaavail">3</td>
             <td span class="tagendaavail">4</td>             
         </tr>
          <tr>
             <td span class="tagendafull">1</td>
             <td span class="tagendafull">2</td>
             <td span class="tagendafull">3</td>
             <td span class="tagendafull">4</td>             
         </tr>
           <tr>
             <td span class="tagendaavail">1</td>
             <td span class="tagendaavail">2</td>
             <td span class="tagendaavail">3</td>
             <td span class="tagendaavail">4</td>             
         </tr>
    </table>
</html>
<!--<?php
 
// Inlog gegegevens e.d.
//$db_host = "localhost"; 
//$db_user = "Desi"; 
//$db_pass = "ree"; 
//$db_name = "Pedicure.db"; 
 
//$connection = mysql_connect($db_host,$db_user,$db_pass); 
	//if (!(mysql_select_db($db_name,$connection))) { 
       // echo "Database niet bereikbaar"; 
		//}
		// Connectie met de database proberen te maken
?>-->

<!-- namen van de maanden en dagen

$namenvandemaand = Array("Januari", "Februari", "Maart", "April", "Mei", "Juni", "Juli", 
"Augustus", "September", "October", "November", "December");

$dagenindeweek = Array("Maandag", "Dinsdag", "Woensdag", "Donderdag", "Vrijdag", "Zaterdag", "Zondag");

-->
