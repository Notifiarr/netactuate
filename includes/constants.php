<?php

/*
----------------------------------
 ------  Created: 122123   ------
 ------  Austin Best	   ------
----------------------------------
*/

define('NA_APIURL', 'https://vapi2.netactuate.com/api/');

//-- GET THIS FROM THE PORTAL OR USE LOGIN CREDS INSTEAD
define('NA_APIKEY', $secrets['NA_APIKEY']);

//-- LOGIN CREDS (SHOULD ONLY BE USED IF APIKEY IS NOT PROVIDED)
define('NA_EMAIL', $secrets['NA_EMAIL']);
define('NA_PASSWORD', $secrets['NA_PASSWORD']);
