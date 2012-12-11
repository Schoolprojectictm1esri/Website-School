<?php
	$stmt           = $db->query("SELECT * FROM behandelingen");
	$result          = $stmt->fetchall();
        foreach ($result as $details)
        
	$cols=1;		// Here we define the number of columns
	echo "<table>";	// The container table with $cols columns
	do{
		echo "<tr>";
		for($i=1;$i<=$cols;$i++){	// All the rows will have $cols columns even if
									// the records are less than $cols
			
			if($details){
				
 ?>

<?php
$stmt = $db->query("SELECT email FROM behandelingen where actief = '1'");
$klantid = $stmt->fetchall();

//var_dump($klantid);
?>
        
            <table>
                <td>
                
                <tr valign="top">
                Voornaam:
                        <?php echo $details['voornaam']; ?>
                Achternaam:
                        <?php echo $details['achternaam']; ?>    
                Klant id:
                        
                        <?php echo $details['id']; ?>
                        
                     <a href=\index.php?page=aanpassenklantgegevens>
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
		}
	} while($details < 100 /* voorkomen van oneindige loop */);
	echo "</table>";
 ?>
