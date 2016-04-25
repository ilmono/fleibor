<title>Campos ARGON - Catalogo Escobillas</title>
<link href="../css/cards.css" rel="stylesheet">
<?php
function makeArrayKeys($arrayProducts){
    $arraytmpEquipos = array();
    $arrayEquipos = array();
    $arrayProduct = array();
    $stringSearh = array(' ', 'ñ', 'Ñ', 'á', 'é', 'í', 'ó', 'ú', 'ü');
    $stringReplace = array('', 'n', 'n', 'a', 'e', 'i', 'o', 'u', 'u');
    foreach($arrayProducts as $key => $product){
        $tmp = str_replace($stringSearh,$stringReplace,strtolower($product->equipo));
        if($product->equipo != ''){
            $arraytmpEquipos[$tmp] = $product->equipo;
            $arrayProduct[$key] = $product;
            $arrayProduct[$key]->filter = $tmp;

        }
    }

    $totalColumns = 6;
    $column = 1;
    foreach($arraytmpEquipos as $key => $equipo){
        $arrayEquipos[$column][$key] = $equipo;
        $column++;
        if($column > $totalColumns){
            $column = 1;
        }
    }
    return array('keys' => $arrayEquipos, 'products' => $arrayProduct);
}

$json_file = file_get_contents("../json/campos.json");
$arrayProductsCampos = json_decode($json_file);
$tmp = makeArrayKeys($arrayProductsCampos);
$campos = $tmp['products'];
$camposFilter = $tmp['keys'];

$json_file = file_get_contents("../json/carbones.json");
$arrayProductsCarbones = json_decode($json_file);
$tmp = makeArrayKeys($arrayProductsCarbones);
$carbones = $tmp['products'];
$carbonesFilter = $tmp['keys'];

?>
<table border="1" style="width:100%">
<tr style="text-align: center;">
    <td>Numero</td>
    <td>Imagen</td>
    <td>Descripcion</td>
    <td>Voltaje</td>
    <td>Medidas</td>
    <td>Cantidad</td>
    <td>Equipo</td>
</tr>
<?php foreach($carbones as $carbon){ ?>
    <tr>
        <td>N&deg; AR&#8226;GON: <?php echo $carbon->letra ?></td>
        <td><img src="../img/cards/escobillas/<?php echo $carbon->img ?>.png" alt="Just Background"></td>
        <td><?php echo $carbon->descripcion ?></td>
        <td><?php echo $carbon->voltaje ?> Volts</td>
        <td><?php echo $carbon->medidas ?></td>
        <td><?php echo $carbon->cantidad ?></td>
        <td><?php echo strtoupper($carbon->equipo) ?></td>
    </tr>
<?php } ?>
</table>
