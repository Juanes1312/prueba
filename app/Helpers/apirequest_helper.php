<?php

/*
 * Realiza llamadas a API al back del OMS especificamente
 * 
 */
if (!function_exists('ApiRequest')) {

    function ApiRequest($Recurso, $params = [], $Tipo = "POST", $body = [])
    {
        $ch = curl_init(APP_URL_BACK . $Recurso);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 15);
        curl_setopt($ch, CURLOPT_TIMEOUT, 15);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        // if (SesionGetAtributo("app_token") != "") {
        //     curl_setopt($ch, CURLOPT_HTTPHEADER, ['OMS-API-TOKEN: ' . SesionGetAtributo("app_token")]);
        // }

        if (mb_strtolower($Tipo) == "post") {
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
            if (!empty($params)) {
                curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));
            }
        }

        if (mb_strtolower($Tipo) == "get") {
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
            if (!empty($params)) {
                curl_setopt($ch, CURLOPT_URL, APP_URL_BACK . $Recurso . "?" . http_build_query($params));
            } else {
                curl_setopt($ch, CURLOPT_URL, APP_URL_BACK . $Recurso);
            }
        }

        if (!empty($body)) {
            $body = array_merge($body, $params);
            $data_string = json_encode($body);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
            curl_setopt(
                    $ch,
                    CURLOPT_HTTPHEADER,
                    array(
                        // 'OMS-API-TOKEN: ' . SesionGetAtributo("app_token"),
                        'Content-Type: application/json',
                        'Content-Length: ' . strlen($data_string)
                    )
            );
        }

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $respuesta = curl_exec($ch);
        $return = json_decode($respuesta, true);
        $info = curl_getinfo($ch);
        // if (($info["http_code"] == "") || ($info["http_code"] != "200")) {
        //     PixelLog("----------------------------------", "api_oms_request_" . date("Y-m-d"));
        //     PixelLog($Tipo . " " . $Recurso . " Params: " . PrintArray($params, true) . " Body: " . PrintArray($body, true), "api_oms_request_" . date("Y-m-d"));
        //     PixelLog(PrintArray($info, true), "api_oms_request_" . date("Y-m-d"));
        //     $return = [];
        // }

        curl_close($ch);
        return $return;
    }

}

if (!function_exists('GetRealIP')) {
    function GetRealIP() {
        if (!empty($_SERVER['HTTP_CLIENT_IP']))//check ip from share internet
        {
          $ip=$_SERVER['HTTP_CLIENT_IP'];
        }
        elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))//to check ip is pass from proxy
        {
          $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
        }
        else
        {
          $ip=$_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    }
}

