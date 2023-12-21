<?php

/*
----------------------------------
 ------  Created: 122123   ------
 ------  Austin Best	   ------
----------------------------------
*/

//-- BRING IN THE TRAITS
$traits     = ABSOLUTE_PATH . 'classes/traits/';
$traitsDir  = opendir($traits);
while ($traitFile = readdir($traitsDir)) {
    if (str_contains($traitFile, '.php')) {
        require $traits . $traitFile;
    }
}
closedir($traitsDir);

class NetActuate
{
    use Authentication;
    use Cloud;

    protected $apiurl;

    public function __construct()
    {
        $this->apiurl = NA_APIURL . '%s?key=' . NA_APIKEY;
    }

    public function __toString()
    {
        return 'NetActuate initialized';
    }
}
