<?php

    $string = "4626-3141 / 4457-2637";

    if (preg_match('/^[a-z\/ñA-Z\ \.\-\_áéíóúÁÉÍÓÚ0-9]{3,24}$/', $string)) {
        echo "Cumple.";
    }else{
        echo "kb.";

    }