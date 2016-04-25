<?php

$json_file = file_get_contents("usuarios.json");
$arrayUsuarios = json_decode($json_file);
echo '<pre>';
$stringSearh = array(' ', '.', '-', '/');
$stringReplace = array('', '', '', '');
foreach ($arrayUsuarios as $usuario) {
    $usr = str_replace($stringSearh, $stringReplace,$usuario->razon_social);
    $usr = strtolower($usr);


    $query = '
        INSERT INTO usuarios (`id`, `codigo`, `categoria`, `nombre`, `domicilio`, `localidad`, `telefono`, `mail`, `user`, `pass`)
        VALUES (NULL, "' . $usuario->cliente . '", 4, "' . $usuario->razon_social . '", "' . $usuario->domicilio . '", "' . $usuario->localidad . '", "' . $usuario->telefono . '", "' . $usuario->mail . '", "' . $usr . '", "' . md5($usuario->cliente) . '");
    ';

    echo $query;


}
die;
?>

