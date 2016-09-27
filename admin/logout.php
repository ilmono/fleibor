<?php
    session_start();
    session_destroy();
    header( 'Location: /fleibor/index.php' );
?>