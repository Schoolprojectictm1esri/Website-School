<?php
if (isset($_GET['Bestel'])) {
//$bestelquery = $db->query('INSERT INTO bestelling_producten VALUES "'.$bestellingid.'","'.$productid.'","'.$aantal.'"');
}
    
else { 
    $id = 1;
    $stmt = $db->query('SELECT * FROM producten WHERE id="'.$id.'"');
    $result = $stmt->fetchall();
    ?>
<table id="bestellenproducten">
        <tr>
            <td><img src="<?php echo $result->foto; ?>" WIDTH=345 HEIGHT=205 alt=""/>
            <!--afbeelding product-->
            </td>
            <td>
                <form name="aantal" method="GET">
                    Aantal:
                    <select name="aantalproducten" id="bestellenproducten">
                        <?php
                        if(isset($_GET['berekenen']) && is_numeric($_GET['aantalproducten'])){
                          $aantal = $_GET['aantalproducten'];
                        }else{
                            $aantal = 0;
                        }
                        for($i = 0; $i <= 10; $i++){
                            if($aantal == 0 && $i == 0){
                                echo '<option value="'.$i.'">Selecteer een waarde.</option>';
                            }else{
                                if($aantal == $i){
                                    echo '<option selected="SELECTED" value="'.$i.'">'.$i.'</option>';
                                }else{
                                    echo '<option value="'.$i.'">'.$i.'</option>';
                                }  
                            }

                        }
                        ?>
                    </select>
                    <input type="submit" value="Bereken" name="berekenen" />
                </form><br>
                Prijs per stuk: <?php 
                $prijs = $result->prijs;
                        echo "&euro; $prijs";
                        ?>  
                <br>
                <br>
                Totaal prijs:
                    <?php 
              
                    if (isset($_GET['berekenen'])) {
                    
                    $aantal = $_GET['aantalproducten']; 
                    }
                    else{
                        $aantal = 1;
                    }
                    $totaal = $aantal*$prijs;
                    echo "&euro; $totaal";
                    ?>
            </td>
          
        </tr>
        <tr>
            <td><?php 
                     //productid verkrijgen met GET vanuit bekijkenproducten en die moet gelinkt zijn aan deze.
                    echo $result->naam; ?>
                <!--naam product-->
            </td>
            <td><input type="submit" value="Bestel" name="bestel" /></td>
        </tr>
    </table>
<?php } ?>