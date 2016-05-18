<?php

include_once 'Database.class.php';

class Producto{

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