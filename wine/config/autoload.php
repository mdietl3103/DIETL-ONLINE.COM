<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2014 Leo Feyer
 *
 * @package Wine
 * @link    https://contao.org
 * @license http://www.gnu.org/licenses/lgpl-3.0.html LGPL
 */


ClassLoader::addNamespaces(array
(
    'dietl_online\wine',
));

/**
 * Register the classes
 */
ClassLoader::addClasses(array
(
    // Library
    'dietl_online\wine\WebserviceWine'      => 'system/modules/wine/webservices/WebserviceWine.php',
//    'RESTfulWebservices\RESTfulController' => 'system/modules/restful-webservices/library/RESTfulWebservices/RESTfulController.php',
//    'RESTfulWebservices\RESTfulWebservice' => 'system/modules/restful-webservices/library/RESTfulWebservices/RESTfulWebservice.php',
));

/**
 * Register the templates
 */
TemplateLoader::addFiles(array
(
	'tl_wine_be' => 'system/modules/wine/templates',
	'tl_wine_fe' => 'system/modules/wine/templates',
));
