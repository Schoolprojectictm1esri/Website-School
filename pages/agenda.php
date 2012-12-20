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
            $stmt = $db->prepare("SELECT SUM(lengte) as totaallengte FROM behandelingen WHERE id in(
                                        SELECT behandeling_id 
                                        FROM afspraakbehandelingen
                                        WHERE afspraak_id IN(
                                            SELECT id 
                                            FROM afspraken
                                            WHERE datum LIKE :date
                                        )
                                )");
            $qrdate = $date->year.'-'.$date->month.'-'.$date->day.'%';

            $stmt->bindParam(':date', $qrdate);
            $stmt->execute();
            $total = $stmt->fetchObject();
            $numberOfApp = $total->totaallengte;
            // Kijkt welke dag het is, en kijk wat de beschikbaarheid op die dag is.
                                        // Afhankelijk van die beschikbaarheid geeft het een kleur weer.
            if ($date->dayOfWeek()=="Zondag"){
                $available ="agendaholiday";
            }else{   
                if( $numberOfApp <= 120){
                    $available = "agendaavail";
                }elseif( $numberOfApp >= 121 && $numberOfApp <= 360){
                    $available = "agendabusy";
                }elseif( $numberOfApp >= 361){
                    $available = "agendafull";
                }else{
                    $available = "agendavacancy"; 
                }     
            }
                echo "<td class='$available'>";
               
                if($date->dayOfWeek() == "Zondag"){
                    //niet klikbaar
                    echo substr($date->dayOfWeek(), 0,2)."-".$date->day."-".substr($date->monthOfTheYear(), 0, 3);
                }else{
                     // Link om agenda te openen met link waarin dag maand jaar staan.
                    echo "<a href='index.php?page=inplannenafspraak&date=".$date->day."-".$date->month."-".$date->year."'>
                        ".substr($date->dayOfWeek(), 0,2)."-".$date->day."-".substr($date->monthOfTheYear(), 0, 3)."
                        </a>";
                }          
                //Laat vandaag zien en berekend de datum van de volgende dag
                $date->addDays(1);
                echo "</td>";              
        }
        echo "</tr>";
    }
    echo "</table>";
?>



