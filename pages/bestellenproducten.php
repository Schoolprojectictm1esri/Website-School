<?php
if (isset($_POST['bestel'])) {
/*$stmt = $db->query ('INSERT INTO bestelling_producten VALUES "'.$bestellingid.'","'.$productid.'",aantal'); */
}
    
else { 
    $productid = 1;
    $stmt = $db->query('SELECT * FROM producten WHERE id="'.$productid.'"');
    $result = $stmt->fetchobject();
    ?> 
<div id="bestellenproducten">
    <table id="bestellenproducten">
        <tr>
            <td colspan="2"><img src="<?php echo $result->foto; ?>" alt=""/>
            <!--afbeelding product-->
            </td>
        </tr>
        <tr>
            <td><?php 
                     //productid verkrijgen met GET vanuit bekijkenproducten en die moet gelinkt zijn aan deze.
                    echo $result->naam; ?>
                <!--naam product-->
            </td>
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
                $prijs = $result->prijs;
                $totaal = $aantal*$prijs;
                echo "€ $totaal";
                ?>
            </td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" value="Bestel" name="bestel" /></td>
        </tr>
    </table>
</div>
<?php } ?>