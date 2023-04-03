<?php

if (!function_exists('decoParamBase64')) {

    function decoParamBase64($var)
    {
        $listaParam = [];
        $url = base64_decode($var);
        $filtro = preg_split("/[&]+/", $url);
        $tmpFiltro = [];
        foreach ($filtro AS $value) {
            unset($tmpFiltro);
            if ($value != "") {
                $tmpFiltro = preg_split("/[&=]+/", $value);
                $listaParam[$tmpFiltro[0]] = $tmpFiltro[1];
            }
        }

        $listaParamFiltrado = [];

        foreach ($listaParam AS $key => $value) {
            if ($value != "") {
                $listaParamFiltrado[$key] = $value;
            }
        }

        return $listaParamFiltrado;
    }

}