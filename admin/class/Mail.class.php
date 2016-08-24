<?php
class Mail
{
    private $params;
    private $classMail;
    public function __constructor($email){
        require("PHPmailer.php");
        $this->classMail = new PHPMailer();

            //Con la propiedad Mailer le indicamos que vamos a usar un
            //servidor smtp
        $this->classMail->Mailer = "smtp";

            //Luego tenemos que iniciar la validación por SMTP:
        $this->classMail->IsSMTP();
        $this->classMail->SMTPAuth = true; // True para que verifique autentificación de la cuenta o de lo contrario False
        $this->classMail->Username = "pedidos@laboratoriofleibor.com.ar"; // Cuenta de e-mail
        $this->classMail->Password = "p3d1d0s"; // Password

        $this->classMail->Host = "mail.laboratoriofleibor.com.ar";

        $this->classMail->From = "pedidos@laboratoriofleibor.com.ar";
        $this->classMail->FromName = "Laboratorio Fleibor";
        $this->classMail->AddAddress("$email");
        $this->classMail->Port = 25;
        $this->classMail->WordWrap =200;
    }

    public function setMail($email){
        $this->classMail->AddAddress("$email");
    }

    public function SendMail($type, $params){
        $this->params = $params;
        $this->bodysMail($type);
        $this->classMail->Send();
    }

    private function bodysMail($type){
        switch ($type){
            case 'realizarPedido':
                $this->classMail->Subject = "Pedido Realizado";
                $this->classMail->Body = $this->bodyRealizar();
                break;
            case 'repetirPedido':
                $this->classMail->Subject = "Pedido Realizado";
                $this->classMail->Body = $this->bodyRepetir();
                break;
            case 'reclamarPedido':
                $this->classMail->Subject = "Pedido Reclamado";
                $this->classMail->Body = $this->bodyReclamar();
                break;
        }

    }
    private function bodyRealizar(){
        $body ='';
        return $body;
    }
    private function bodyRepetir(){
        $body ='';
        return $body;
    }
    private function bodyReclamar(){
        $body ='';
        return $body;
    }
}
?>