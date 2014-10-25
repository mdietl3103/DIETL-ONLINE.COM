<?php


/**
 * Table tl_module
 */
$this->loadLanguageFile('tl_slowfood');

$GLOBALS['TL_DCA']['tl_module']['palettes']['slowfood_list'] = '{title_legend},name,date_vistited,type;{filter_legend},slowfood_filter_type;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space';

$GLOBALS['TL_DCA']['tl_module']['fields']['slowfood_filter_type']  = array
(
	'label'     => &$GLOBALS['TL_LANG']['tl_module']['slowfood_filter_type'],
	'inputType' => 'select',
	'exclude'   => true,
	'sorting'   => true,
	'flag'      => 1,
	'options'   => array('bar', 'local'),
	'reference' => &$GLOBALS['TL_LANG']['tl_slowfood'],
	'eval'      => array(
		'includeBlankOption' => true,
		'tl_class'           => 'w50',
	),
	'sql'       => "varchar(10) NOT NULL default ''"
);
