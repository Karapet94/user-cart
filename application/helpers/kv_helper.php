<?php
if ( ! function_exists('akAddCssFiles'))
{

    function akAddCssFiles($AdditionalCssFiles)
    {
        $result = '';
        foreach($AdditionalCssFiles as $AdditionalCssFile) {
            $result .= ' <link rel="stylesheet" href="' . base_url(CSS_PATH . '/' . $AdditionalCssFile . '.css') . '">' . "\n";
        }
        return $result;
    }
}

if ( ! function_exists('akAddJsFiles'))
{

    function akAddJsFiles($AdditionalJsFiles)
    {
        $result = '';
        foreach($AdditionalJsFiles as $AdditionalJsFile) {
            $result .= ' <script src="' . base_url(JS_PATH . '/' . $AdditionalJsFile . '.js') . '"></script>' . "\n";
        }
        return $result;
    }
}
