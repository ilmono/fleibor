<?php

include_once 'Database.class.php';

class Producto{

    /********************************************************
    Este metodo devuelve todos los Productos
     ********************************************************/
    public function getProductos(){
        $mysqli = DataBase::connex();
        $query = '
			SELECT
                *
            FROM
                productos
            ORDER BY
                nombre
            ASC
		';
        $result = $mysqli->query($query);
        if($result->num_rows > 0){
            while ($row = $result->fetch_assoc()){
                $productos[] = $row;
            }
        }else{
            return false;
        }

        $result->free();
        $mysqli->close();
        return $productos;

    }

    /********************************************************
    Este metodo devuelve un Producto
     ********************************************************/
    public function getProducto($id){
        $mysqli = DataBase::connex();
        $query = '
			SELECT
                *
            FROM
                productos
            WHERE
              id = '.$id.'
		';
        $result = $mysqli->query($query);
        $mysqli->close();
        if($result->num_rows == 1){
            return $result->fetch_assoc();
        }else{
            header("Location: producto-lista.php");
        }
    }

    /********************************************************
    Este metodo elimina un Producto
     ********************************************************/
    public function deleteProducto($id){
        $mysqli = DataBase::connex();
        $queryValue = 'SELECT id_values FROM productos WHERE id = ' . $mysqli->real_escape_string($id);
        $result = $mysqli->query($queryValue);
        if($result->num_rows == 1){
            $idValue = $result->fetch_assoc();
        }
        $query = '
			DELETE FROM
				productos
			WHERE
				productos.id = ' . $mysqli->real_escape_string($id) . '
			LIMIT
				1
		';
        $result = $mysqli->query($query);
        $mysqli->close();
        $this->borrarRelacion($id, 'producto_colores', 'id_producto');
        $this->borrarRelacion($idValue["id_values"], 'values', 'id');
        return $result;
    }

    public function borrarRelacion($id, $tabla, $id_name){
        $mysqli = DataBase::connex();

        $query = '
			DELETE FROM
				`' . $tabla . '`
			WHERE
				`' . $id_name . '` = ' . $mysqli->real_escape_string($id) . '
		';
        $mysqli->query($query);
        $mysqli->close();
    }

    /********************************************************
    Este metodo agrega un Producto
     ********************************************************/
    public function agregarProducto($producto, $imagen){
        $mysqli = DataBase::connex();
        $pathIgame = $this->uploadImage($imagen);
        $query = '
			INSERT INTO productos (id, envase, nombre, tipo, img, subtitulo)
            VALUES (NULL, ' . $producto['envase'] . ', "' . $producto['nombre'] . '", "' . $producto['tipo'] . '", "' . $pathIgame["image"] . '", "' . $producto['subtitulo'] . '");
		';
        $mysqli->query($query);
        $id_producto = $mysqli->insert_id;
        $this->agregarValues($id_producto, "envase", $producto["opciones"]);
        if($producto['tipo'] == 'color'){
            $this->setTablasRelacionales($id_producto, $producto['color'], 'producto_colores');
        }else{
            $this->setTablasRelacionales($id_producto, $producto['gusto'], 'producto_gustos');
        }
        $mysqli->close();
        return $result;
    }

    /********************************************************
    Este metodo actualiza un Producto
     ********************************************************/
    public function updateProducto($producto, $imagen){

        $mysqli = DataBase::connex();
        $pathIgame = $this->uploadImage($imagen);
        if(!$pathIgame){
            $pathIgame["image"] =  $producto['img'];
        }
        $query = '
            UPDATE
              productos
            SET
              envase = "' . $producto['envase'] . '",
              nombre = "' . $producto['nombre'] . '",
              tipo = "' . $producto['tipo'] . '",
              img = "' . $pathIgame["image"] . '",
              subtitulo = "' . $producto['subtitulo'] . '"
             WHERE
              id = ' . $producto['id'] . ';
		';
        $result = $mysqli->query($query);
        $id_producto = $producto['id'];
        if($producto['tipo'] == 'color'){
            $this->borrarRelacion($id_producto,'producto_colores','id_producto');
            $this->setTablasRelacionales($id_producto, $producto['color'], 'producto_colores');
        }else{
            $this->borrarRelacion($id_producto,'producto_gustos','id_producto');
            $this->setTablasRelacionales($id_producto, $producto['gusto'], 'producto_gustos');
        }

        $values = $this->getValues($producto['id']);
        $this->updateValues($values['id'], "envase", $producto["opciones"]);
        $mysqli->close();
        return $result;
    }


    /********************************************************
    Este metodo devuelve todos las Unidades
     ********************************************************/
    public function getRelaciones($id_producto, $tabla, $id){
        $mysqli = DataBase::connex();
        $query = '
			SELECT
                *
            FROM
                ' . $tabla . '
            WHERE
                ' . $id . ' = ' . $id_producto . '
		';
        $result = $mysqli->query($query);

        if($result !== false && $result->num_rows > 0){
            while ($row = $result->fetch_assoc()){
                $items[] = $row;
            }
            $result->free();
            $mysqli->close();

            return $items;
        }else{
            return false;
        }
    }

    /********************************************************
    Este metodo setea todas las tablas relacionales de productos
     ********************************************************/
    public function setTablasRelacionales($id_producto, $array_ids, $tabla){
        $mysqli = DataBase::connex();
        foreach($array_ids as $id){
            $query = '
                INSERT INTO ' . $tabla . '  VALUES
                (NULL, "'.$mysqli->real_escape_string($id_producto).'", "'.$mysqli->real_escape_string($id).'");
            ';
            $result = $mysqli->query($query);
            if(!$result){
                $mysqli->close();
                return $result;
            }
        }

        $mysqli->close();
        return $result;
    }

    public function getValues($id_producto){
        $mysqli = DataBase::connex();
        $query = '
            SELECT
                *
            FROM
                `values`
            WHERE
                id_producto = '. $id_producto .'
        ';
        $result = $mysqli->query($query);
        $mysqli->close();
        if($result->num_rows == 1){
            return $result->fetch_assoc();
        }else{
            return array();
        }

    }

    public function agregarValues($id_producto, $type, $options){
        $mysqli = DataBase::connex();
        $queryValues = '
			INSERT INTO `values` (`id`, `id_producto`, `type`, `values`)
            VALUES (NULL, ' . $id_producto . ', "' . $mysqli->real_escape_string(json_encode($type)) . '", "' . $mysqli->real_escape_string(json_encode($options)) . '");
		';
        $mysqli->query($queryValues);
        $mysqli->close();
    }

    public function updateValues($id, $type, $options){
        $mysqli = DataBase::connex();
        $query = '
            UPDATE
              `values`
            SET
              `type` = "' .$mysqli->real_escape_string($type) . '",
              `values` = "' . $mysqli->real_escape_string(json_encode($options)) . '"
             WHERE
              id = ' . $id . ';
		';
        $mysqli->query($query);
        $mysqli->close();
    }

    /********************************************************
    Este metodo devuelve todos los Gustos
     ********************************************************/
    public function getGustos(){
        $mysqli = DataBase::connex();
        $query = '
			SELECT
                *
            FROM
                gustos
		';
        $result = $mysqli->query($query);
        if($result->num_rows > 0){
            while ($row = $result->fetch_assoc()){
                $gustos[] = $row;
            }
            $result->free();
            $mysqli->close();
            return $gustos;
        }else{
            return false;
        }
    }
    /********************************************************
    Este metodo agrega un Gusto
     ********************************************************/
    public function agregarGusto($gusto){
        $mysqli = DataBase::connex();
        $query = '
			INSERT INTO gustos (id, nombre) VALUES
			(NULL, "'.$mysqli->real_escape_string($gusto["nombre"]).'");
		';
        $result = $mysqli->query($query);
        $mysqli->close();
        return $result;
    }
    /********************************************************
    Este metodo elimina un Gusto
     ********************************************************/
    public function deleteGusto($id){
        $mysqli = DataBase::connex();
        $query = '
			DELETE FROM
				gustos
			WHERE
				gustos.id = ' . $mysqli->real_escape_string($id) . '
			LIMIT
				1
		';
        $result = $mysqli->query($query);
        $mysqli->close();
        return $result;
    }

    /********************************************************
    Este metodo devuelve todos los Colores
     ********************************************************/
    public function getColores(){
        $mysqli = DataBase::connex();
        $query = '
			SELECT
                *
            FROM
                colores
            ORDER BY
              nombre
            ASC
		';
        $result = $mysqli->query($query);
        if($result->num_rows > 0){
            while ($row = $result->fetch_assoc()){
                $colores[] = $row;
            }
            $result->free();
            $mysqli->close();
            return $colores;
        }else{
            return false;
        }
    }
    /********************************************************
    Este metodo agrega un Color
     ********************************************************/
    public function agregarColor($color){
        $mysqli = DataBase::connex();
        $query = '
			INSERT INTO colores (id, nombre, codigo) VALUES
			(NULL, "'.$mysqli->real_escape_string($color["nombre"]).'", "'.$mysqli->real_escape_string($color["codigo"]).'");
		';
        $result = $mysqli->query($query);
        $mysqli->close();
        return $result;
    }
    /********************************************************
    Este metodo elimina un Color
     ********************************************************/
    public function deleteColor($id){
        $mysqli = DataBase::connex();
        $query = '
			DELETE FROM
				colores
			WHERE
				colores.id = ' . $mysqli->real_escape_string($id) . '
			LIMIT
				1
		';
        $result = $mysqli->query($query);
        $mysqli->close();
        return $result;
    }
    /********************************************************
    Este metodo devuelve todos las Medidas
     ********************************************************/
    public function getMedidas(){
        $mysqli = DataBase::connex();
        $query = '
			SELECT
                *
            FROM
                medidas
		';
        $result = $mysqli->query($query);
        if($result->num_rows > 0){
            while ($row = $result->fetch_assoc()){
                $medidas[] = $row;
            }
            $result->free();
            $mysqli->close();
            return $medidas;
        }else{
            return false;
        }
    }
    /********************************************************
    Este metodo agrega una Medida
     ********************************************************/
    public function agregarMedida($color){
        $mysqli = DataBase::connex();
        $query = '
			INSERT INTO medidas (id, cantidad) VALUES
			(NULL, "'.$mysqli->real_escape_string($color["cantidad"]).'");
		';
        $result = $mysqli->query($query);
        $mysqli->close();
        return $result;
    }


    /********************************************************
    Este metodo elimina una Medida
     ********************************************************/
    public function deleteMedida($id){
        $mysqli = DataBase::connex();
        $query = '
			DELETE FROM
				medidas
			WHERE
				medidas.id = ' . $mysqli->real_escape_string($id) . '
			LIMIT
				1
		';
        $result = $mysqli->query($query);
        $mysqli->close();
        return $result;
    }

    public function getCheckMedidas($unidad){
        $medidas = $this->getMedidas();
        $medidasElegidas = $this->getRelaciones($unidad, 'envase_medidas', 'id_envase');
        $html = '
                <div class="control-group">
                    <label class="control-label" for="lastname">Medidas</label>
                    <div class="controls">';
        foreach($medidas as $medida){
            $ckd = '';
            if($medidasElegidas) {
                foreach ($medidasElegidas as $medidaElegida) {
                    if ($medida["id"] == $medidaElegida['id_medida']) {
                        $ckd = 'checked';
                    }
                }
            }
            $html .= '<input ' . $ckd . ' type="checkbox" name="medida[]" value="'.$medida["id"].'"> ' . ucfirst($medida["cantidad"]) . ' <br>';
        }
        $html .=    '</div>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary">Aplicar</button>
                    </div>
                </div>';

        return $html;
    }

    public function getMedidasByEnvase($envase){
        $mysqli = DataBase::connex();
        $query = '
			SELECT 
			  * 
			FROM
				envase_medidas
			INNER JOIN
			    medidas
			ON 
			    envase_medidas.id_medida = medidas.id
			WHERE
				envase_medidas.id_envase = ' . $mysqli->real_escape_string($envase) . '
		';

        $result = $mysqli->query($query);
        if(!empty($result) && $result->num_rows > 0){
            while ($row = $result->fetch_assoc()){
                $medidas[] = $row;
            }
            foreach ($medidas as $key => $medida) {
                $medidas[$key]['unidades'] = $this->getUnidadesByMedida($medida['id_medida']);
            }
            $result->free();
            $mysqli->close();
            return $medidas;
        }else{
            return false;
        }
    }

    /********************************************************
    Este metodo devuelve todos las Unidades
     ********************************************************/
    public function getUnidades(){
        $mysqli = DataBase::connex();
        $query = '
			SELECT
                *
            FROM
                unidades
            ORDER BY
			    cantidad
			ASC
		';
        $result = $mysqli->query($query);
        if($result->num_rows > 0){
            while ($row = $result->fetch_assoc()){
                $unidades[] = $row;
            }
            $result->free();
            $mysqli->close();
            return $unidades;
        }else{
            return false;
        }
    }

    /********************************************************
    Este metodo agrega una Unidad
     ********************************************************/
    public function agregarUnidad($unidad){
        $mysqli = DataBase::connex();
        $query = '
			INSERT INTO unidades (id, cantidad) VALUES
			(NULL, "'.$mysqli->real_escape_string($unidad["cantidad"]).'");
		';
        $result = $mysqli->query($query);
        $mysqli->close();
        return $result;
    }
    /********************************************************
    Este metodo elimina una Unidad
     ********************************************************/
    public function deleteUnidad($id){
        $mysqli = DataBase::connex();
        $query = '
			DELETE FROM
				unidades
			WHERE
				unidades.id = ' . $mysqli->real_escape_string($id) . '
			LIMIT
				1
		';
        $result = $mysqli->query($query);
        $mysqli->close();
        return $result;
    }

    public function getCheckUnidades($medida){
        $unidades = $this->getUnidades();
        $unidadesElegidas = $this->getRelaciones($medida, 'medida_unidades', 'id_medida');
        $html = '
                <div class="control-group">
                    <label class="control-label" for="lastname">Medidas</label>
                    <div class="controls">';
        foreach($unidades as $unidad){
            $ckd = '';
            if($unidadesElegidas) {
                foreach ($unidadesElegidas as $unidadElegida) {
                    if ($unidad["id"] == $unidadElegida['id_unidad']) {
                        $ckd = 'checked';
                    }
                }
            }
            $html .= '<input ' . $ckd . ' type="checkbox" name="unidad[]" value="'.$unidad["id"].'"> ' . ucfirst($unidad["cantidad"]) . ' <br>';
        }
        $html .=    '</div>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary">Aplicar</button>
                    </div>
                </div>';

        return $html;
    }

    public function getUnidadesByMedida($medida){
        $mysqli = DataBase::connex();
        $query = '
			SELECT 
			  * 
			FROM
				medida_unidades
			INNER JOIN
			    unidades
			ON 
			    medida_unidades.id_unidad = unidades.id
			WHERE
				medida_unidades.id_medida = ' . $mysqli->real_escape_string($medida) . '
		';

        $result = $mysqli->query($query);
        if($result->num_rows > 0){
            while ($row = $result->fetch_assoc()){
                $unidades[] = $row;
            }
            $result->free();
            $mysqli->close();
            return $unidades;
        }else{
            return false;
        }
    }

    /********************************************************
    Este metodo devuelve todos laos Envases
     ********************************************************/
    public function getEnvases(){
        $mysqli = DataBase::connex();
        $query = '
			SELECT
                *
            FROM
                envases
		';
        $result = $mysqli->query($query);
        if($result->num_rows > 0){
            while ($row = $result->fetch_assoc()){
                $unidades[] = $row;
            }
            $result->free();
            $mysqli->close();
            return $unidades;
        }else{
            return false;
        }
    }
    /********************************************************
    Este metodo agrega un Envase
     ********************************************************/
    public function agregarEnvase($envase){
        $mysqli = DataBase::connex();
        $query = '
			INSERT INTO envases (id, nombre) VALUES
			(NULL, "'.$mysqli->real_escape_string($envase["nombre"]).'");
		';
        $result = $mysqli->query($query);
        $mysqli->close();
        return $result;
    }
    /********************************************************
    Este metodo elimina un Envase
     ********************************************************/
    public function deleteEnvase($id){
        $mysqli = DataBase::connex();
        $query = '
			DELETE FROM
				envases
			WHERE
				envases.id = ' . $mysqli->real_escape_string($id) . '
			LIMIT
				1
		';
        $result = $mysqli->query($query);
        $mysqli->close();
        return $result;
    }
    
    public function renderOptionsProductByEnvase($envase, $id_producto){
        $medidas = $this->getMedidasByEnvase($envase);
        $selecteds = $this->getValues($id_producto);
        if(isset($selecteds["values"])){
            $values = json_decode($selecteds["values"],true);
        }else{
            $values = array();
        }

        $html = '<div>';
        if(!empty($medidas)){
            foreach ($medidas as $medida){
                $html .= '<div id="'.$medida["id"].'" class="btn-medidas"> <span class="icon-chevron-down"> </span>' . ucfirst($medida["cantidad"]) . ' </div>';
                $html .= '<div class="contenedor-unidades" id="medida-'.$medida["id"].'">';
                if(!empty($medida['unidades'])){
                    foreach ($medida['unidades'] as $unidad){
                        $chk = '';
                        if(isset($values[$medida["id"]])){
                            foreach($values[$medida["id"]] as $value){
                                if($unidad["id"] === $value){
                                    $chk = 'checked';
                                }
                            }
                        }
                        $html .= '<input '. $chk .' type="checkbox" name="opciones['.$medida["id"].'][]" value="'.$unidad["id"].'"> ' . ucfirst($unidad["cantidad"]) . ' ';
                    }
                }
                $html .= '</div>';
            }
        }else{
            $html .= '<br /><br />';
        }
        $html .= '</div>';
        return $html;
    }

    public function renderOptionsMedidasPedidos($id_producto){
        $medidas = $this->getMedidas();
        $selecteds = $this->getValues($id_producto);
        $select = '<select id="select-medida-pedido-' . $id_producto . '" class="select-medida-pedido form-control span2" name="medida">';
        if(isset($selecteds["values"])){
            $values = json_decode($selecteds["values"],true);
        }else{
            $values = array();
        }
        $firstMedida = '';
        foreach($values as $myMedida => $paquetes){
            foreach ($medidas as $medida){
                if($myMedida == $medida["id"]){
                    if($firstMedida == ''){
                        $firstMedida = $medida["id"];
                    }
                    $select .= '<option value="' . $medida["id"] . '">' . ucfirst($medida["cantidad"]) . '</option>';
                }
            }
        }
        $select .= '</select>';
        $res['medidas'] = $select;
        $res['unidades'] = $this->renderOptionsUnidadesPedidos($id_producto, $firstMedida);
        return $res;
    }

    public function renderOptionsUnidadesPedidos($id_producto, $id_medida){
        $selecteds = $this->getValues($id_producto);
        $packages = $this->getUnidades();
        $select = '<select id="select-medida-pedido" class="form-control span2" name="medida">';
        if(isset($selecteds["values"])){
            $values = json_decode($selecteds["values"],true);
        }else{
            $values = array();
        }
        foreach($values as $medida => $paquetes){
            foreach($paquetes as $paquete){
                foreach ($packages as $package){
                    if($medida == $id_medida && $paquete == $package["id"]){
                        $select .= '<option value="' . $package["id"] . '">' . ucfirst($package["cantidad"]) . '</option>';
                    }
                }
            }

        }
        $select .= '</select>';
        return $select;
    }

    /********************************************************
    Este metodo genera las imagenes de los productos
     ********************************************************/
    private function uploadImage($images){
        foreach ($images as $type => $image) {
            $foto = $image['tmp_name'] ;
            $nombre_original = $image['name'];
            $explode_name_image = explode( '.' , $nombre_original );
            $extension = array_pop( $explode_name_image);

            switch( $extension ) {
                case 'image/pjpg':
                case 'image/pjpeg':
                case 'jpg':
                case 'jpeg':
                case 'JPG':
                case 'JPEG':
                    $original = imagecreatefromjpeg( $foto );
                    break;
                case 'gif':
                    $original = imagecreatefromgif( $foto );
                    break;
                case 'png':
                    $original = imagecreatefrompng( $foto );
                    break;
                default:
                    return false;
                    break;
            }

            $uploaddir = 'upload_images/';
            $name = md5($image['name'] . date("YmdHms")) . '.jpg';
            $uploadfile = $uploaddir . basename($name);
            $pathIgame = array();

            if (move_uploaded_file($foto, $uploadfile)) {
                $pathIgame[$type] = $uploaddir . $name;
            } else {
                return false;
            }
        }
        return $pathIgame;
    }
}