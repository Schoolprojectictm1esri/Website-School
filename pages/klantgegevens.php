<?php
/*
    Document   : Date
    Created on : 11-12-2012
    Author     : Daniel
    Description:
        Het weergeven van klantgegevens.
*/
?>
<?php
	$stmt           = $db->query("SELECT `voornaam`, `achternaam`, `klant_id` FROM `klanten` where klant_id != '' ");
	$result          = $stmt->fetchall();
        foreach ($result as $details)
        
	$cols=1;		// Here we define the number of columns
	echo "<table>";	// The container table with $cols columns
	
	echo "<tr>";
	for($i=1;$i<=$cols;$i++){	// All the rows will have $cols columns even if
									// the records are less than $cols
			
	if($details){
				
 ?>

<?php
//$stmt = $db->query("SELECT email FROM behandelingen where actief = '1'");
//$klantid = $stmt->fetchall();

//var_dump($klantid);

// "<a href='index.php?page=inplannenafspraak&dag=".$date->day."&maand=".$date->month."&jaar=".$date->year."'>"
?>
        
            <table>
                <td>
                
                <tr valign="top">
                Voornaam:
                        <?php echo $details['voornaam']; ?>
                Achternaam:
                        <?php echo $details['achternaam']; ?>    
                Klant id:                        
                        <?php echo $details['klant_id'];  ?>
                        <?php $klant_id = $_POST['klant_id'];?>
                        <?php Echo "<a href='index.php?page=aanpassenklantgegevens&klant_id".$klant_id."'>" ?>
                         Selecteer deze 1234 klant.12312
                     </a>
                    </td>
                    <!--<td width="50">&nbsp;</td>	 Create gap between columns -->
                </tr>
                <br><br>
           </table>
        </td>
<?php
			}
			else{
				echo "<td>&nbsp;</td>";	//If there are no more records at the end, add a blank column
			}
		
	} while($details < 10 /* voorkomen van oneindige loop */);
	echo "</table>";
 ?>
