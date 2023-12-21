<?php

/*
----------------------------------
 ------  Created: 122123   ------
 ------  Austin Best	   ------
----------------------------------
*/

trait Cloud
{
    public function cloud_locations()
    {
        $url    = sprintf($this->apiurl, 'cloud/locations');
        $curl   = curl($url);
        return $curl['response'];
    }
    public function cloud_images()
    {
        $url    = sprintf($this->apiurl, 'cloud/images');
        $curl   = curl($url);
        return $curl['response'];
    }
}
