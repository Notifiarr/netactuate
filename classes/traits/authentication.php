<?php

/*
----------------------------------
 ------  Created: 122123   ------
 ------  Austin Best	   ------
----------------------------------
*/

trait Authentication
{
    public function auth_login()
    {
        if (!NA_EMAIL || !NA_PASSWORD) {
            return ['code' => 401, 'result' => 'Missing login information in .secrets file'];
        } else {
            $url        = sprintf($this->apiurl, 'auth/login');
            $headers    = ['content-type: application/x-www-form-urlencoded'];
            $payload    = ['email' => NA_EMAIL, 'password' => NA_PASSWORD];
            $curl       = curl($url, $headers, 'POST', $payload);
            return $curl['response'];
        }
    }
}
