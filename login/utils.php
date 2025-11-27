<?php

function secure($text){
    $text = htmlspecialchars(stripslashes(trim($text)));

    return $text;
}

