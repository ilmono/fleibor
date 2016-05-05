<?php
    class DataBase
    {
        static function connex()
        {
            return $mysqli = new mysqli('localhost', 'root', '', 'fleibor');
            //return $mysqli = new mysqli('localhost', 'fleibor_root', 'abacabb.MK1', 'fleibor_gestion');
        }
    }
?>