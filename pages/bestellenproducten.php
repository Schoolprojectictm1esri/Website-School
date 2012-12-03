<?php
if (isset($_POST['bestel'])) {
/*$stmt = $db->query ('INSERT INTO bestelling_producten VALUES "'.$bestellingid.'","'.$productid.'",aantal'); */
}
    
else { 
    $productid = 0;
    $stmt = $db->query('SELECT foto FROM producten WHERE id="'.$productid.'"');
    var_dump($stmt->fetchobject());
    ?> 
<table id="bestellenproducten">
        <tr>
            <td colspan="2"><img src="<?php $stmt = $db->query('SELECT foto FROM producten WHERE id="'.$productid.'"');  ?>"/>
            <!--afbeelding product-->
            </td>
        </tr>
        <tr>
            <td><?php 
                     //met GET vanuit bekijkenproducten en die moet gelinkt zijn aan deze.
                    $stmt = $db->query
                        ('SELECT naam FROM producten WHERE id= "'.$productid.'"'); ?>
                <!--naam product--></td>
            <td>
                <form name="aantal" method="POST">
                    Aantal:
                    <select name="aantalproducten">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                    </select>
                    <input type="submit" value="Bereken" name="berekenen" />
                </form>
            </td>
        </tr>
        <tr>
            <td></td>
            <td>Prijs:
                <?php 
                if (isset($aantal)) {
                $aantal = $_POST['berekenen'];
                }
                else{
                    $aantal = 1;
                }
                $prijs= 3;//$stmt = $db->query ('SELECT prijs FROM producten WHERE id="'.$productid.'"');
                $totaal =$aantal*$prijs;
                echo "€ $totaal";
                ?>
            </td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" value="Bestel" name="bestel" /></td>
        </tr>
</table>
<?php } ?>