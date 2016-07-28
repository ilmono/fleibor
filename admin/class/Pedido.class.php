<?php
//session_start();
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

    public function delItem($item){

    }

    public function totalItems(){

    }

    public function clearCart(){
        $_SESSION['cart'] = [];
        return '';
    }

    public function getCartHtml(){
        $html = '';
        foreach($_SESSION['cart'] as $producto){
            if(isset($producto['add_to_cart'][0]->color) && $producto['add_to_cart'][0]->color != false){
                $tipo = 'color';
            }else if(isset($producto['add_to_cart'][0]->gusto) && $producto['add_to_cart'][0]->gusto != false){
                $tipo = 'gusto';
            }else{
                $tipo = 'nada';
            }
            //var_dump($tipo);
            $html .= '<div class="widget widget-table action-table">';
                $html .= '<div class="widget widget-table action-table">';
                    $html .= '<div class="widget-content" style="padding-top: 15px;">';
                        $html .= '<div class="control-group">';
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
                                            $html .= '</tr>';
                                        $html .= '</thead>';
                                        $html .= '<tbody>';
                                        foreach($producto['add_to_cart'] as $item){
                                            $html .= '<tr>';
                                                if($tipo == 'color'){
                                                    if($item->color['codigo'] != '#grad') {
                                                        $html .= '<td><div style="background-color: ' . $item->color["codigo"] . '; width: 20px; height: 20px; border-radius: 10px"></div></td>';
                                                    }else{
                                                        $html .= '<td><div class="grad" style="width: 20px; height: 20px; border-radius: 10px"></div></td>';
                                                    }
                                                    $html .= '<td>'.$item->color["nombre"].'</td>';
                                                }
                                                if($tipo == 'gusto') { /*var_dump($item->gusto);*/$html .= '<td>'.$item->gusto["nombre"].'</td>'; }
                                                $html .= '<td class="td-select-medida">'.$item->medida["cantidad"].'</td>';
                                                $html .= '<td class="td-select-unidades">'.$item->unidades["cantidad"].'</td>';
                                                $html .= '<td class="td-cantidad">'.$item->cant.'</td>';
                                            $html .= '</tr>';
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
        return $html;
    }

    public function test(){
        $newItes = '{"product":9,"add_to_cart":[{ "color":36,"medida":3,"unidades":1,"cant":1 },{ "color":121,"medida":3,"unidades":1,"cant":2 }]}';
        $this->addItem($newItes);
        echo $this->getCartHtml();
        //return var_dump($newItes);
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
}
?>
