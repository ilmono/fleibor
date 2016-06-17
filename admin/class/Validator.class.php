<?php
class Validator
{
    public $onlyChar = "/^[a-z\/ñA-ZáéíóúÁÉÍÓÚ\ ]{3,24}$/";
    public $alfa = "/^[a-z\/ñA-Z\ \.\-\_áéíóúÁÉÍÓÚ]{3,24}$/";
    public $numeric = "/^[0-9]{1,24}$/";
    public $alfaNumeric = "/^[a-z\/ñA-Z\ \.\-\_áéíóúÁÉÍÓÚ0-9]{3,24}$/";
    public $mail = "/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/";

    public function returnValidate($string, $key){
        $regex = $this->typeValidate($key);
        if (!preg_match($regex, $string)) {
            return true;
        }
    }

    private function typeValidate($key){
        switch ($key){
            case "razon_social":
                return $this->alfa;
                break;
            case "nueva-categoria":
            case "nueva-seccion":
                return $this->onlyChar;
                break;
            case "email":
                return $this->mail;
                break;
            case "categoria":
                return $this->numeric;
                break;
            default:
                return $this->alfaNumeric;
                break;
        }

    }
}
?>