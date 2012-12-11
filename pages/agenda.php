<?php

include './includes/Date.php';

$date = new Date();

echo "Plaatje met legenda";


// Get the current day
$date->now();

echo "<table id=table_agenda>";

// For every row in the table 
for($row = 0; $row<4; $row++)
{                
    echo "<tr>";
    
    //For every column in the table
    for($column = 0; $column<7; $column++)
    {        
        
        //$SankuyoTshwaraganoManagementTrust = $db->query("SELECT COUNT(id) FROM behandelingen WHERE actief = 'TRUE'");
        //$numberOfApp = $SankuyoTshwaraganoManagementTrust->fetchall();
        
        //print_r($numberOfApp);
        //$stmt           = $db->query("SELECT * FROM klanten WHERE achternaam = 'smit' ");
       // $result         = $stmt->fetchall();

        

        //Test w/o db : $numberOfApp = 14;
        /*Test w/o db :*/ $numberOfApp = 2;
        //Test w/o db : $numberOfApp = 15;
        //Test w/o db : $numberOfApp = 0;

        // Check availability 
        // Kijkt welke dag het is, en kijk wat de beschikbaarheid op die dag is.
                                    // Afhankelijk van die beschikbaarheid geeft het een kleur weer.
        if ($date->dayOfWeek()=="Zondag"){
            $available ="agendaholiday";
            echo "<a href='index.php?page=agendanietbeschikbaar'>";
            echo "</a>";
        }
            else {   

                if      ( $numberOfApp <= 8)
                    $available = "agendaavail";

                else if ( $numberOfApp >= 9 && $numberOfApp <= 14)
                    $available = "agendabusy";

                else if ( $numberOfApp >= 15)
                    $available = "agendafull";

                else  
                    $available = "agendavacancy";
                 }
            echo "<td class='$available'>";
            // Link om agenda te openen met link waarin dag maand jaar staan.
            
            Echo "<a href='index.php?page=inplannenafspraak&dag=".$date->day."&maand=".$date->month."&jaar=".$date->year."'>";
            

                    
            // Laat vandaag zien
            Echo substr($date->dayOfWeek(), 0, 2) . ". " . $date->day . " " . substr($date->monthOfTheYear(), 0, 3) . ".";

            echo "</a>";


            //Laat vandaag zien en berekend de volgende dag
            $date->addDays(1);

            echo "</td>";

            // return $available
    }

    echo "</tr>";
}


echo "</table>";

?>



