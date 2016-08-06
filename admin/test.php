<html>
<head>
    <meta charset="utf-8">
    <title>Admin - Fleibor Website</title>
    <meta name="Fleibor Website" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <?php include("includes/style.php"); ?>
</head>
    <body>
        <?php
            echo '<pre>';
            include 'includes.php';
            $pedido = new Pedido();
            echo $pedido->test();

            echo '</pre>';
            include("includes/script.php");
        ?>
    </body>
</html>
