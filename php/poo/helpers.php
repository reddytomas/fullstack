<?php

function old($dato){
    if(isset($_POST[$dato])){
        return $_POST[$dato];
    }
}

function dd($dato){
    echo "<pre>";
        var_dump($dato);
        exit;
    echo "</pre>";
}
