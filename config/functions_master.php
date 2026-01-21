<?php

if (!function_exists('get_setting')) {

    function get_setting($data = []) {  
        return getValue('settings', 'key', $data['key'], 'value');
    }

}
?>
