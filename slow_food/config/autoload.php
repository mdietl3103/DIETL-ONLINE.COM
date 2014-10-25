<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2014 Leo Feyer
 *
 * @package Slow_food
 * @link    https://contao.org
 * @license http://www.gnu.org/licenses/lgpl-3.0.html LGPL
 */


/**
 * Register the classes
 */
ClassLoader::addClasses(array
(
	// Modules
	'ModuleSlowFoodList' => 'system/modules/slow_food/modules/ModuleSlowFoodList.php',
));


/**
 * Register the templates
 */
TemplateLoader::addFiles(array
(
	'mod_slowfood_list' => 'system/modules/slow_food/templates',
));
