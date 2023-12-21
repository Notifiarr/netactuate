<?php

/*
----------------------------------
 ------  Created: 122123   ------
 ------  Austin Best	   ------
----------------------------------
*/

// This will NOT report uninitialized variables
error_reporting(E_ERROR | E_PARSE);

if (!defined('ABSOLUTE_PATH')) {
    define('ABSOLUTE_PATH', './');
}

if (!file_exists(ABSOLUTE_PATH . '.secrets')) {
    exit('.secrets file is missing');
}

//-- BRING IN THE SECRETS CONFIG
$secrets = json_decode(file_get_contents(ABSOLUTE_PATH . '.secrets'), true);

//-- DIRECTORIES TO LOAD FILES FROM, ORDER IS IMPORTANT
$autoloads = ['includes', 'functions', 'classes'];

foreach ($autoloads as $autoload) {
    $dir = ABSOLUTE_PATH . $autoload;
    if (is_dir($dir)) {
        $handle = opendir($dir);
        while ($file = readdir($handle)) {
            if ($file[0] != '.' && !is_dir($dir . '/' . $file)) {
                require $dir . '/' . $file;
            }
        }
        closedir($handle);
    }
}

$naApi = new NetActuate;
