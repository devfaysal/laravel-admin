<?php

if (! function_exists('prepare_attributes')) {

    function prepare_attributes(array $attributes)
    {
        $attributes_string = '';
        
        foreach($attributes as $key => $value){
            $attributes_string .= $key . '="' . $value . '" ';
        }

        return $attributes_string;
    }
}