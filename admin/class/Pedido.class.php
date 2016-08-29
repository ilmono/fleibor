<?php

class Pedido
{
    public $product = '';
    public $gustos = '';

    public function __construct(){
        //$this->clearclearCart();
        $this->product = new Producto();
        $this->gustos = $this->product->getGustos();
    }

    public function addItem($item){
        $newItes = json_decode($item);
        if(isset($_SESSION['cart'][$newItes->product])){
            $tmpProduct = $_SESSION['cart'][$newItes->product];
        }else{
            $tmpProduct = $this->product->getProducto($newItes->product);
            $tmpProduct["envase"] = $this->product->getEnvase($tmpProduct["envase"]);
            $tmpProduct["add_to_cart"] = [];
        }
        foreach($newItes->add_to_cart as $item){
            if(!$this->updateCart($newItes->product, $item)){
                if(isset($item->color) && $item->color != false){
                    $item->color  = $this->product->getColor($item->color);
                }else if(isset($item->gusto) && $item->gusto != false){
                    $item->gusto  = $this->product->getGusto($item->gusto);
                }
                $item->medida  = $this->product->getMedida($item->medida);
                $item->unidades  = $this->product->getUnidad($item->unidades);
                $tmpProduct["add_to_cart"][] = $item;
            }
        }
        $_SESSION['cart'][$newItes->product] = $tmpProduct;
    }

    public function clearCart(){
        $_SESSION['cart'] = [];
        return '';
    }

    public function getCartHtml($cart, $editable){
        $html = '';
        foreach($cart as $key => $producto){
            if(isset($producto['add_to_cart'][0]) && is_array($producto['add_to_cart'][0])){
                if(isset($producto['add_to_cart'][0]['color']) && $producto['add_to_cart'][0]['color'] != false){
                    $tipo = 'color';
                }else if(isset($producto['add_to_cart'][0]['gusto']) && $producto['add_to_cart'][0]['gusto'] != false){
                    $tipo = 'gusto';
                }else{
                    $tipo = 'nada';
                }
            }else{
                if(isset($producto['add_to_cart'][0]->color) && $producto['add_to_cart'][0]->color != false){
                    $tipo = 'color';
                }else if(isset($producto['add_to_cart'][0]->gusto) && $producto['add_to_cart'][0]->gusto != false){
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
                            $html .= '<div class="wraper-img">';
                                $html .= '<img class="img-producto-crear-pedido" src="'.$producto["img"].'">';
                            $html .= '</div>';
                            $html .= '<div class="list-product-item">';
                                $html .= '<h3>'.$producto['nombre'].'</h3>';
                                if(!empty($producto['subtitulo'])){
                                    $html .= '<h4>'.$producto['subtitulo'] .'</h4>';
                                }
                                $html .= '<p><b>Envase: ' . $producto['envase']['nombre'] . '</b></p>';
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
                                        foreach($producto['add_to_cart'] as $subKey => $item){
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
                                                    if($item->color['codigo'] != '#grad') {
                                                        $html .= '<td><div style="background-color: ' . $item->color["codigo"] . '; width: 20px; height: 20px; border-radius: 10px"></div></td>';
                                                    }else{
                                                        $html .= '<td><div class="grad" style="width: 20px; height: 20px; border-radius: 10px"></div></td>';
                                                    }
                                                    $html .= '<td>'.$item->color["nombre"].'</td>';
                                                }
                                                if($tipo == 'gusto') { $html .= '<td>'.$item->gusto["nombre"].'</td>'; }
                                                $html .= '<td class="td-select-medida">'.$item->medida["cantidad"].'</td>';
                                                $html .= '<td class="td-select-unidades">'.$item->unidades["cantidad"].'</td>';
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
        if($editable == true){
            $html .= '<div>';
            $html .= '<textarea id="comentario-cart" class="form-control" style="resize: none; width: 99%;" placeholder="Escribenos tus preferencias o especificacions"></textarea>';
            $html .= '</div>';
        }
        return $html;
    }

    public function removeProduct($key){
        if(isset($_SESSION['cart'][$key])){
            unset($_SESSION['cart'][$key]);
            return count($_SESSION['cart']);
        }else{
            return -1;
        }
    }

    public function removeSubProduct($key, $subKey){
        if(isset($_SESSION['cart'][$key]["add_to_cart"][$subKey])){
            unset($_SESSION['cart'][$key]["add_to_cart"][$subKey]);
            if(count($_SESSION['cart'][$key]["add_to_cart"]) <= 0){
                $this->removeProduct($key);
            }
            return count($_SESSION['cart']);
        }else{
            return -1;
        }
    }

    public function test(){
        $newItes = '{"product":9,"add_to_cart":[{ "color":36,"medida":3,"unidades":1,"cant":1 },{ "color":121,"medida":3,"unidades":1,"cant":2 }]}';
        $this->addItem($newItes);
        echo $this->getCartHtml();
    }

    private function updateCart($productIda, $item){
        $update = false;
        if(isset($_SESSION['cart'][$productIda])){
            foreach($_SESSION['cart'][$productIda]['add_to_cart'] as $index => $cartItem){
                if($cartItem->color['id'] == $item->color && $cartItem->medida['id'] == $item->medida && $cartItem->unidades['id'] == $item->unidades){
                    $_SESSION['cart'][$productIda]['add_to_cart'][$index]->cant = $_SESSION['cart'][$productIda]['add_to_cart'][$index]->cant + $item->cant;
                    $update = true;
                }
            }
        }
        return $update;
    }

    public function agregarPedido($idUsuario, $cart, $comentario){
        $mysqli = DataBase::connex();
        $pedido = json_encode($cart);
        $query = '
			INSERT INTO pedidos (`id`, `id_cliente`, `pedido`, `comentario`, `estado`, `fecha`)
            VALUES (NULL, ' . $idUsuario . ', "' . $mysqli->real_escape_string($pedido) . '", "' . $mysqli->real_escape_string($comentario) . '", "Pendiente", "' . date('Y-m-d') . '");
		';
        $result = $mysqli->query($query);
        $insert_id = $mysqli->insert_id;
        $mysqli->close();

        if($result){
            $params['id'] = $insert_id;
            $params['pedido'] = json_decode($pedido);
            $params['comentario'] = $comentario;
            $email = new Mail();
            $email->sendMail($_SESSION["email"], 'repetirPedido', $params);
        }
        return $result;
    }

    public function getPedidos(){
        $mysqli = DataBase::connex();
        $query = '
			SELECT
                pedidos.id as id,
                pedidos.comentario as comentario,
                pedidos.estado as estado,
                pedidos.fecha as fecha,
                usuarios.nombre as usuario
            FROM
                pedidos
            INNER JOIN
                usuarios
            ON
                pedidos.id_cliente = usuarios.id
            ORDER BY
              pedidos.id
            DESC
		';

        $result = $mysqli->query($query);
        if($result->num_rows > 0){
            while ($row = $result->fetch_assoc()){
                $pedidos[] = $row;
            }
            $result->free();
            $mysqli->close();
            return $pedidos;
        }else{
            return false;
        }
    }

    public function misPedidos($idUsuario){
        $mysqli = DataBase::connex();
        $query = '
			SELECT
                *
            FROM
                pedidos
            WHERE
              id_cliente = '.$idUsuario.'
            ORDER BY
              id
            DESC
		';

        $result = $mysqli->query($query);
        if($result->num_rows > 0){
            while ($row = $result->fetch_assoc()){
                $pedidos[] = $row;
            }
            $result->free();
            $mysqli->close();
            return $pedidos;
        }else{
            return false;
        }
    }

    public function getPedido($id){
        $mysqli = DataBase::connex();
        $query = '
			SELECT
                *
            FROM
                pedidos
            WHERE
              id = '.$id.'
		';
        $result = $mysqli->query($query);
        if($result->num_rows == 1){
            $pedido = $result->fetch_assoc();
            $pedido['cart'] = $this->getCartHtml(json_decode($pedido["pedido"],true), false);
            $result->free();
            $mysqli->close();
            return $pedido;
        }else{
            $result->free();
            $mysqli->close();
            return false;
        }
    }

    public function repetirPedido($idUsuario, $data){
        $mysqli = DataBase::connex();
        $query = '
			SELECT
                *
            FROM
                pedidos
            WHERE
              id = '.$data['pedido_id'].'
		';
        $result = $mysqli->query($query);
        if($result->num_rows == 1){
            $pedido = $result->fetch_assoc();
            $pedido = json_decode($pedido["pedido"]);
            $this->agregarPedido($idUsuario, $pedido, $data['comentario']);
            $result->free();
            $mysqli->close();
            return true;
        }else{
            $result->free();
            $mysqli->close();
            return false;
        }

    }

    public function reclamarPedido($data){
        $email = new Mail();
        $email->sendMail($_SESSION["email"], 'reclamarPedido', $data);
        return true;
    }

    public function actualizarEstado($id, $estado){
        $mysqli = DataBase::connex();
        $query = 'UPDATE pedidos SET estado = "'.$estado.'" WHERE id = '.$id;
        $result = $mysqli->query($query);
        $mysqli->close();

        return $result;
    }
}
?>
