<?php

include './includes/Date.php';

$date = new Date();

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
        
        $SankuyoTshwaraganoManagementTrust = $db->query("SELECT COUNT(id) FROM behandelingen WHERE actief = 'TRUE'");
        $numberOfApp = $SankuyoTshwaraganoManagementTrust->fetchall();
        
        //print_r($numberOfApp);
        //$stmt           = $db->query("SELECT * FROM klanten WHERE achternaam = 'smit' ");
       // $result         = $stmt->fetchall();

        

        //Test w/o db : $numberOfApp = 14;
        //Test w/o db : $numberOfApp = 5;
        //Test w/o db : $numberOfApp = 15;
        //Test w/o db : $numberOfApp = 0;

        // Check availability 
        
        
        if      ( $numberOfApp <= 8)
            $available = "agendaavail";

        else if ( $numberOfApp >= 9 && $numberOfApp <= 14)
            $available = "agendabusy";

        else if ( $numberOfApp >= 15)
            $available = "agendafull";

        else  
            $available = "agendavacancy";

        echo "<td class='$available'>";
        // Link to open Agenda
        echo "<a href=\"http://localhost/index.php?page=agenda\">";
        //echo "<a href=\"www.letmegooglethatforyou.com?variabele=dedag&vazr2=maand\">";//$_GET['variabele']

        // Shows current day 
        echo substr($date->dayOfWeek(), 0, 2) . ". " . $date->day . " " . substr($date->monthOfTheYear(), 0, 3) . ".";

        echo "</a>";

        //Shows current day and calculates next day.
        //echo $date->toString();
        $date->addDays(1);

        echo "</td>";
    }

    echo "</tr>";
}


echo "</table>";

?>



