<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace dietl_online\wine;

/**
 * Class wine_fe
 *
 * @copyright  &#40;c&#41; 2014
 * @author     Michael Dietl
 * @package    Devtools
 */
class wine_frontend extends \Frontend {

    /**
     * Import the back end user object
     */
    public function __construct() {
        parent::__construct();
        $this->import('BackendUser', 'User');
        $this->log('Inserttag', __METHOD__, TL_ERROR);
    }    
    
    public function Wine_Details($strTag) {
        // Parameter abtrennen
        $arrSplit = explode('::', $strTag);

        return "It works!";
        if ($arrSplit[0] != 'foo' && $arrSplit[0] != 'cache_foo') {
            //nicht unser Inserttag
            return false;
        }
        $this->log('Inserttag', __METHOD__, TL_ERROR);
        // Parameter angegeben?
        if (isset($arrSplit[1]) && $arrSplit[1] == 'bar') {
            return 'Parameter bar';
        } else {
            return 'Fehler! foo ohne Parameter!';
        }
    }

}
