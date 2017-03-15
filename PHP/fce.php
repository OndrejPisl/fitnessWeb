<?php

function zkratitText($text, $znaku) {
    $mezera = strrpos(substr($text, 0, $znaku), " ");
    return substr($text, 0, $mezera) . "...";
}

?>
