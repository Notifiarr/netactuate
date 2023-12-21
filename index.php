<?php

/*
----------------------------------
 ------  Created: 122123   ------
 ------  Austin Best	   ------
----------------------------------
*/

require 'loader.php';

$api = $naApi->auth_login();
echo '/auth/login<br>';
echo json_encode($api) . '<hr>';

$api = $naApi->cloud_locations();
echo '/cloud/locations<br>';
echo json_encode($api) . '<hr>';

$api = $naApi->cloud_images();
echo '/cloud/images<br>';
echo json_encode($api) . '<hr>';
