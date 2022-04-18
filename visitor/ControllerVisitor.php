<?php

function cutString($text){
    if(empty($text)){
        $newText = '';
    }else{
        $newText = substr($text, 0, 100);
        $newText .='...';
    }

    return $newText;
}

