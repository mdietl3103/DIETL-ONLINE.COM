<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2014 Leo Feyer
 *
 * @package Receipt
 * @link    https://contao.org
 * @license http://www.gnu.org/licenses/lgpl-3.0.html LGPL
 */


/**
 * Register the namespaces
 */
ClassLoader::addNamespaces(array
(
	'receipt',
));


/**
 * Register the classes
 */
ClassLoader::addClasses(array
(
	// Classes
	'receipt\receipt'               => 'system/modules/receipt/classes/receipt.php',

	// Models
	'receipt\ReceiptCountriesModel' => 'system/modules/receipt/models/ReceiptCountriesModel.php',
	'receipt\ReceiptModel'          => 'system/modules/receipt/models/ReceiptModel.php',
));


/**
 * Register the templates
 */
TemplateLoader::addFiles(array
(
	'receipt' => 'system/modules/receipt/templates',
));
