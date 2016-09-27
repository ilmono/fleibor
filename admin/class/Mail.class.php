<?php
require("PHPmailer.php");
class Mail
{
    private $params;

    public function sendMail($email, $type, $params){

        $classMail  = new PHPMailer();

        //Con la propiedad Mailer le indicamos que vamos a usar un
        //servidor smtp
        $classMail->Mailer = "smtp";

        //Luego tenemos que iniciar la validación por SMTP:
        $classMail->IsSMTP();
        $classMail->SMTPAuth = true; // True para que verifique autentificación de la cuenta o de lo contrario False
        $classMail->Username = "pedidos@laboratoriofleibor.com.ar"; // Cuenta de e-mail
        $classMail->Password = "p3d1d0s"; // Password

        $classMail->Host = "mail.laboratoriofleibor.com.ar";

        $classMail->From = "pedidos@laboratoriofleibor.com.ar";
        $classMail->AddAddress("$email");
        $classMail->AddCC("pedidos@laboratoriofleibor.com.ar");
        $classMail->FromName = "Laboratorio Fleibor";
        $classMail->Port = 25;
        $classMail->WordWrap =200;
        $this->params = $params;
        switch ($type){
            case 'repetirPedido':
                $classMail->Subject = "Pedido Realizado";
                $classMail->From = "pedidos@laboratoriofleibor.com.ar";
                $classMail->AddAddress("$email");

                $classMail->Body = $this->bodyRepetir();
                break;
            case 'reclamarPedido':
                $classMail->Subject = "Reclamo de Pedido N°".$params["pedido_id"];
                $classMail->From = "$email";
                $classMail->AddAddress("pedidos@laboratoriofleibor.com.ar");
                $classMail->AddCC("$email");
                $classMail->Body = $this->bodyReclamar();
                break;
        }
        $classMail->Send();
    }

    private function getStyles(){
        $body = '<head>
                <style type=\'text/css\'>
                    <!--
                    body {
                        background: #838383;
                        color: #838383;
                        font: 13px/1.7em \'Open Sans\';
                    }
                    .container{
                        border: 1px solid #D5D5D5;
                        background: #FFF;
                        border-radius: 5px;
                        margin: 15px;
                        padding: 20px;
                        display: inline-block;
                        color: #838383;
                        width: 96%;
                        color: #838383;
                        font: 13px/1.7em \'Open Sans\';
                    }
                    table {
                        color: #838383;
                        font: 13px/1.7em \'Open Sans\';
                        margin-bottom: 0;
                        border: none;
                        width: 100%;
                        max-width: 100%;
                        border-collapse: collapse;
                        border-spacing: 0;
                        background-color: transparent;
                        display: table;
                    }
                    thead{
                        display: table-header-group;
                        vertical-align: middle;
                        border-color: inherit;
                    }
                    thead tr{
                        text-align: center;
                        font-weight: bold;
                    }
                    tbody {
                        display: table-row-group;
                        vertical-align: middle;
                        border-color: inherit;
                    }
                    tr {
                        display: table-row;
                        vertical-align: inherit;
                        border-color: inherit;
                    }
                    table th, table td{
                        padding: 8px;
                        line-height: 18px;
                        text-align: left;
                        vertical-align: top;
                        border-top: 1px solid #dddddd;
                    }
                    .th-margen{
                        margin: 0 10px;
                    }
                    -->
                </style>
                <meta charset="UTF-8">
            </head>';
        return $body;
    }

    private function bodyRepetir(){
        $html = '<html>';
        $html .= $this->getStyles();
        $html .= '<body><div class="container" >';
        $html .= '
            <p><b>Pedido N°: </b>'.$this->params["id"].'</p>
            <p><b>Fecha: </b>'.date('Y-m-d').'</p>
            <p><b>Comentario: </b>'.$this->params["comentario"].'</p>
            <p><b>Detalle:</b></p>

            ';
        $editable = false;
        foreach($this->params["pedido"] as $key => $producto){
            var_dump($producto->envase);
            if(isset($producto->add_to_cart[0]) && is_array($producto->add_to_cart[0])){
                if(isset($producto->add_to_cart[0]['color']) && $producto->add_to_cart[0]['color'] != false){
                    $tipo = 'color';
                }else if(isset($producto->add_to_cart[0]['gusto']) && $producto->add_to_cart[0]['gusto'] != false){
                    $tipo = 'gusto';
                }else{
                    $tipo = 'nada';
                }
            }else{
                if(isset($producto->add_to_cart[0]->color) && $producto->add_to_cart[0]->color != false){
                    $tipo = 'color';
                }else if(isset($producto->add_to_cart[0]->gusto) && $producto->add_to_cart[0]->gusto != false){
                    $tipo = 'gusto';
                }else{
                    $tipo = 'nada';
                }
            }

            $html .= '<div class="widget widget-table action-table">';
            $html .= '<div class="widget widget-table action-table">';
            $html .= '<div class="widget-content" style="padding-top: 15px;">';
            $html .= '<div class="control-group">';
            if($editable == true) { $html .= '<button id="cart-'.$key.'" class="btn btn-danger btn-cart-remove-product"><span class="icon-large icon-trash"></span></button>';};
            $html .= '<div class="list-product-item">';
            $html .= '<h3>'.$producto->nombre.'</h3>';
            if(!empty($producto->subtitulo)){
                $html .= '<h4>'.$producto->subtitulo .'</h4>';
            }
            $html .= '<p><b>Envase: ' . $producto->envase->nombre . '</b></p>';
            $html .= '<div>';
            $html .= '<table class="table table-hover">';
            $html .= '<thead>';
            $html .= '<tr style="text-align: center; font-weight: bold;">';
            if($tipo == 'color'){ $html .= '<td colspan="2">Color</td>'; }
            if($tipo == 'gusto') { $html .= '<td>Gustos</td>'; }
            $html .= '<td> Medida </td>';
            $html .= '<td> Empaque </td>';
            $html .= '<td> Cantidad </td>';
            if($editable == true) { $html .= '<td> Quitar </td>';};
            $html .= '</tr>';
            $html .= '</thead>';
            $html .= '<tbody>';
            foreach($producto->add_to_cart as $subKey => $item){
                if(is_array($item)){
                    $html .= '<tr>';
                    if($tipo == 'color'){
                        if($item['color']['codigo'] != '#grad') {
                            $html .= '<td><div style="background-color: ' . $item['color']["codigo"] . '; width: 20px; height: 20px; border-radius: 10px"></div></td>';
                        }else{
                            $html .= '<td><div class="grad" style="width: 20px; height: 20px; border-radius: 10px"></div></td>';
                        }
                        $html .= '<td>'.$item['color']["nombre"].'</td>';
                    }
                    if($tipo == 'gusto') { $html .= '<td>'.$item['gusto']["nombre"].'</td>'; }
                    $html .= '<td class="td-select-medida">'.$item['medida']["cantidad"].'</td>';
                    $html .= '<td class="td-select-unidades">'.$item['unidades']["cantidad"].'</td>';
                    $html .= '<td class="td-cantidad">'.$item['cant'].'</td>';
                    if($editable == true) { $html .= '<td class="td-cantidad"><button id="cart-'.$key.'-'.$subKey.'" class="btn btn-danger btn-cart-remove-subproduct"><span class="icon-small icon-trash"></span></button></td>';};

                    $html .= '</tr>';
                }else{
                    $html .= '<tr>';
                    if($tipo == 'color'){
                        if($item->color->codigo != '#grad') {
                            $html .= '<td><div style="background-color: ' . $item->color->codigo . '; width: 20px; height: 20px; border-radius: 10px"></div></td>';
                        }else{
                            $html .= '<td><div class="grad" style="width: 20px; height: 20px; border-radius: 10px"></div></td>';
                        }
                        $html .= '<td>'.$item->color->nombre.'</td>';
                    }
                    if($tipo == 'gusto') { $html .= '<td>'.$item->gusto->nombre.'</td>'; }
                    $html .= '<td class="td-select-medida">'.$item->medida->cantidad.'</td>';
                    $html .= '<td class="td-select-unidades">'.$item->unidades->cantidad.'</td>';
                    $html .= '<td class="td-cantidad">'.$item->cant.'</td>';
                    if($editable == true) { $html .= '<td class="td-cantidad"><button id="cart-'.$key.'-'.$subKey.'" class="btn btn-danger btn-cart-remove-subproduct"><span class="icon-small icon-trash"></span></button></td>';};

                    $html .= '</tr>';
                }
            }
            $html .= '</tbody>';
            $html .= '</table>';
            $html .= '</div>';
            $html .= '</div>';
            $html .= '</div>';
            $html .= '</div>';
            $html .= '</div>';
            $html .= '</div>';
        }
        $html .= '</div></body>';
        $html .= '</html>';

        return $html;
    }

    private function bodyReclamar(){
        $html = '<html>';
        $html .= $this->getStyles();
        $html .= '<body><div class="container" >';
        $html .= '
            <h1>Reclamo de Pedido</h1>
            <p><b>Pedido N°: </b>'.$this->params["pedido_id"].'</p>
            <p><b>Fecha: </b>'.date('Y-m-d').'</p>
            <p><b>Comentario: </b>'.$this->params["comentario"].'</p>
            ';
        $html .= '</div></body>';
        $html .= '</html>';
        return $html;
    }
}

?>
