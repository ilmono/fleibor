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
		';
        $result = $mysqli->query($query);
        if($result->num_rows > 0){
            while ($row = $result->fetch_assoc()){
                $productos[] = $row;
            }
        }else{
            return false;
        }

        $tmp = $this->getFamilias();
        $familias = array();
        foreach($tmp as $familia){
            $familias[$familia['id']] = $familia['nombre'];
        }

        $productosPorFamilia = array();
        foreach($productos as $producto){
            $productosPorFamilia[$familias[$producto['familia']]][] = $producto;
        }

        $result->free();
        $mysqli->close();
        return $productosPorFamilia;

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

        //Borro el producto
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
        $this->borrarRelacionados($id);
        return $result;
    }

    private function borrarRelacionados($id){
        $mysqli = DataBase::connex();

        //Borro los colores relacionados
        $query = '
			DELETE FROM
				producto_colores
			WHERE
				producto_colores.id_producto = ' . $mysqli->real_escape_string($id) . '
		';
        $mysqli->query($query);

        //Borro los envases relacionados
        $query = '
			DELETE FROM
				producto_envases
			WHERE
				producto_envases.id_producto = ' . $mysqli->real_escape_string($id) . '
		';
        $mysqli->query($query);

        //Borro las medidas relacionadas
        $query = '
			DELETE FROM
				producto_medidas
			WHERE
				producto_medidas.id_producto = ' . $mysqli->real_escape_string($id) . '
		';
        $mysqli->query($query);

        //Borro las medidas relacionadas
        $query = '
			DELETE FROM
				producto_unidades
			WHERE
				producto_unidades.id_producto = ' . $mysqli->real_escape_string($id) . '
		';

        $mysqli->query($query);
        $mysqli->close();
    }

    /********************************************************
    Este metodo agrega un Producto
     ********************************************************/
    public function agregarProducto($producto){
         $mysqli = DataBase::connex();

         $query = '
			INSERT INTO productos (id, familia, nombre, descripcion, subtitulo)
            VALUES (NULL, ' . $producto['familia'] . ', "' . $producto['nombre'] . '", "' . $producto['descripcion'] . '", "' . $producto['subtitulo'] . '");
		';
        $result = $mysqli->query($query);
        $id_producto = $mysqli->insert_id;
        $this->setTablasRelacionales($id_producto, $producto['color'], 'producto_colores');
        $this->setTablasRelacionales($id_producto, $producto['envase'], 'producto_envases');
        $this->setTablasRelacionales($id_producto, $producto['medida'], 'producto_medidas');
        $this->setTablasRelacionales($id_producto, $producto['unidad'], 'producto_unidades');
        $mysqli->close();
        return $result;
    }

    /********************************************************
    Este metodo actualiza un Producto
     ********************************************************/
    public function updateProducto($producto){
        $mysqli = DataBase::connex();

        $query = '
            UPDATE
              productos
            SET
              familia = "' . $producto['familia'] . '",
              nombre = "' . $producto['nombre'] . '",
              descripcion = "' . $producto['descripcion'] . '",
              subtitulo = "' . $producto['subtitulo'] . '"
             WHERE
              id = ' . $producto['id'] . ';
		';

        $result = $mysqli->query($query);
        $id_producto = $producto['id'];
        $this->borrarRelacionados($id_producto);
        $this->setTablasRelacionales($id_producto, $producto['color'], 'producto_colores');
        $this->setTablasRelacionales($id_producto, $producto['envase'], 'producto_envases');
        $this->setTablasRelacionales($id_producto, $producto['medida'], 'producto_medidas');
        $this->setTablasRelacionales($id_producto, $producto['unidad'], 'producto_unidades');
        $mysqli->close();
        return $result;
    }


    /********************************************************
    Este metodo devuelve todos las Unidades
     ********************************************************/
    public function getRelaciones($id_producto, $tabla){
        $mysqli = DataBase::connex();
        $query = '
			SELECT
                *
            FROM
                ' . $tabla . '
            WHERE
                id_producto = ' . $id_producto . '
		';
        $result = $mysqli->query($query);
        if($result->num_rows > 0){
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
    private function setTablasRelacionales($id_producto, $array_ids, $tabla){
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

    /********************************************************
    Este metodo devuelve todos las Familias
     ********************************************************/
    public function getFamilias(){
        $mysqli = DataBase::connex();
        $query = '
			SELECT
                *
            FROM
                familias
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
    Este metodo agrega una Familia
     ********************************************************/
    public function agregarFamilia($familia){
        $mysqli = DataBase::connex();
        $query = '
			INSERT INTO familias (id, nombre) VALUES
			(NULL, "'.$mysqli->real_escape_string($familia["nombre"]).'");
		';
        $result = $mysqli->query($query);
        $mysqli->close();
        return $result;
    }
    /********************************************************
    Este metodo elimina una Familia
     ********************************************************/
    public function deletFamilia($id){
        $mysqli = DataBase::connex();
        $query = '
			DELETE FROM
				familias
			WHERE
				familias.id = ' . $mysqli->real_escape_string($id) . '
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
}