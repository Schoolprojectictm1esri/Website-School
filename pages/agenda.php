
<html>
   <link rel="stylesheet" type="text/css" href="danielstyle.css" />
   <th>Beschikbaarheid.</th>      
   <table border="2">
   
   
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

for($dag = 1; $dag <= 7; $dag+1)

    { 
        $tijdstempel = mktime(1,1,1,$11,$19,$2012);
<!-- bovenstaande geeft 11-19-2012 weer -->
<!-- http://us3.php.net/manual/en/function.date.php -->
        if(date('l', $tijdstempel) == $vandaag)
        
        
        if(date('d',$timestamp) == 1)
        {
        
        <!--$dagenindemaand afgekort didm
        http://php.net/manual/en/function.cal-days-in-month.php-->
        $didm = cal_days_in_month(CAL_GREGORIAN, $month, $year);
        
        for($datum = 1; $datum <=$didm; $datum++)




print"</td> ";
        if ($datum == 7){
        print "</tr><tr>";
        }
        if ($datum == 14){
        print "</tr><tr>";
        }
        if ($datum== 21){
        print "</tr><tr>";
        }
        if ($datum == 28){
        print "</tr>";




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

?>-->

<!-- namen van de maanden en dagen

$namenvandemaand = Array("Januari", "Februari", "Maart", "April", "Mei", "Juni", "Juli", 
"Augustus", "September", "October", "November", "December");

$dagenindeweek = Array("Maandag", "Dinsdag", "Woensdag", "Donderdag", "Vrijdag", "Zaterdag", "Zondag");

-->
