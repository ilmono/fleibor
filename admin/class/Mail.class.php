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
        $classMail->FromName = "Laboratorio Fleibor";
        $classMail->AddAddress("$email");
        $classMail->Port = 25;
        $classMail->WordWrap =200;
        $this->params = $params;
        $classMail->Subject = "Pedido Realizado";
        $classMail->Body = $this->bodysMail($type);
        $classMail->Send();
    }

    private function bodysMail($type){
        switch ($type){
            case 'realizarPedido':
                return $this->bodyRealizar();
                break;
            case 'repetirPedido':
                return $this->bodyRepetir();
                break;
            case 'reclamarPedido':
                return $this->bodyReclamar();
                break;
        }

    }
    private function bodyRealizar(){
        $body = '<pre>';
        $body .= var_dump($this->params);
        return $body;
    }
    private function bodyRepetir(){
        $html = '<html>';
        $html .= '
            <head>
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
                <title>Pedido Realizado</title>
                <meta charset="UTF-8">
            </head>
        ';
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

        return $html;
    }
    private function bodyReclamar(){
        $body = '<pre>';
        $body .= var_dump($this->params);
        return $body;
    }
}




/*

<div class="container" >

    <table class="email-table">
        <thead>
        <tr>
            <th colspan="5">Nombre del producto</th>
        </tr>
        <tr>
            <th><span class="th-margen">Color</span></th>
            <th><span class="th-margen">Medida</span></th>
            <th><span class="th-margen">Empaque</span></th>
            <th><span class="th-margen">Cantidad</span></th>
            <th><span class="th-margen">Total</span></th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td><span class="th-margen">Amarillo</span></th>
            <td><span class="th-margen">30 CC</span></th>
            <td><span class="th-margen">4 unidades</span></th>
            <td><span class="th-margen">2</span></th>
            <td><span class="th-margen">8</span></th>
        </tr>
        </tbody>
    </table>
</div>
</body>
</html>*/

?>
