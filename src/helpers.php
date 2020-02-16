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


if (! function_exists('prepare_options')) {

    function prepare_options($data, $selected)
    {
        if($data instanceof Illuminate\Support\Collection){
            $data = $data->toArray();
        }
        if(!is_array($selected)){
            $selected = [$selected];
        }
        $options_html = '';
        
        if(array_values($data) !== $data){
            foreach($data as $key => $value){
                if(in_array($key, $selected)){
                    $options_html .= '<option selected="selected" value="'. $key .'">'. $value.'</option>';
                }else{
                    $options_html .= '<option value="'. $key .'">'. $value.'</option>';
                }
            }
        }else{
            foreach($data as $key){
                if(in_array($key, $selected)){
                    $options_html .= '<option selected="selected" value="'. $key .'">'. $key.'</option>';
                }else{
                    $options_html .= '<option value="'. $key .'">'. $key.'</option>';
                }
            }
        }
        

        return $options_html;
    }
}