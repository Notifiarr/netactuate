<?php

/*
----------------------------------
 ------  Created: 122123   ------
 ------  Austin Best	   ------
----------------------------------
*/

function curl($url, $headers = [], $method = 'GET', $payload = [], $timeout = 60)
{
    $curlHeaders    = [
                        'user-agent: NetActuate PHP API',
                    ];

    if ($headers) {
        foreach ($headers as $header) {
            $curlHeaders[] = $header;
        }
    }

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);

    switch ($method) {
        case 'DELETE':
        case 'PATCH':
        case 'PUT':
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
            break;
        case 'POST':
            curl_setopt($ch, CURLOPT_POST, true);
            break;
        default:
            unset($payload);
            break;
    }

    curl_setopt($ch, CURLOPT_HTTPHEADER, $curlHeaders);

    if ($payload && $method != 'GET') {
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($payload, '', '&'));
    }

    $response       = curl_exec($ch);
    $jsonResponse   = json_decode($response, true);
    $response       = !empty($jsonResponse) ? $jsonResponse : $response;
    $error          = json_decode(curl_error($ch), true);
    $code           = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    return [
            'url'               => $url,
            'method'            => $method,
            'payload'           => $payload,
            'headers'           => $curlHeaders,
            'code'              => $code,
            'response'          => $response,
            'error'             => $error
        ];
}
