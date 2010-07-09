<?php

if ( ! function_exists('output_hidden')) {
    function output_hidden($text, $path, $filename = "hout") {
        $fp = fopen($path . '/' . $filename, 'w');
        fwrite($fp, $text);
        fclose($fp);
    }
}

?>
