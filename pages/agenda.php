<?php
/* 
    Document   : Agenda.php
    Created on : 11-12-2012
    Author     : Daniel
    Description:
        Het weergeven van de agenda.
*/
    include './includes/Date.php';

    $date = new Date();

    echo "Plaatje met legenda";


    // Vandaag
    $date->now();

    echo "<table id=table_agenda>";

    // Voor elke row in de table
    for($row = 0; $row<4; $row++)
    {                
        echo "<tr>";

        // Voor elke column in de table
        for($column = 0; $column<7; $column++)
        {        

            $stmt = $db->prepare("SELECT COUNT(id) FROM behandelingen WHERE actief = 'TRUE'");
            $stmt->execute();
            $numberOfApp = $stmt->fetchall();

            // Kijkt welke dag het is, en kijk wat de beschikbaarheid op die dag is.
                                        // Afhankelijk van die beschikbaarheid geeft het een kleur weer.
            if ($date->dayOfWeek()=="Zondag"){
                $available ="agendaholiday";

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

                Echo "<a href='index.php?page=inplannenafspraak&datum=".$date->day."-".$date->month."-".$date->year."'>";



                // Laat vandaag zien
                Echo substr($date->dayOfWeek(), 0, 2) . ". " . $date->day . " " . substr($date->monthOfTheYear(), 0, 3) . ".";

                echo "</a>";


                //Laat vandaag zien en berekend de datum van de volgende dag
                $date->addDays(1);

                echo "</td>";

                
        }

        echo "</tr>";
    }


    echo "</table>";

?>



