<?php

/**
 * Back end modules
 */


$i = array_search('DIETL-ONLINE.COM', array_keys($GLOBALS['BE_MOD']));
$index_2_insert = 0;
if ($i >= 0)
{
    $index_2_insert = $i;
}

array_insert($GLOBALS['BE_MOD'], $index_2_insert, array
(
    'DIETL-ONLINE.COM' => array(
     	'slow_food' => array
    	(
        	'tables'      => array('tl_slowfood'),
            'icon'         => 'system/modules/slow_food/assets/snail-icon.png'
    	)
    )
));

/**
 * Front end modules
 */
$GLOBALS['FE_MOD']['slow_food'] = array
(
	'slowfood_list'     => 'ModuleSlowFoodList'
);
