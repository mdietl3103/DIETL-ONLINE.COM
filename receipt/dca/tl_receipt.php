<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2013 Leo Feyer
 *
 * @package   receipt
 * @author    Michael Dietl
 * @license   GNU/GPL
 * @copyright Michael Dietl 2014
 */


/**
 * Table tl_receipt
 */
$GLOBALS['TL_DCA']['tl_receipt'] = array
(
    // Config
    'config' => array
    (
        'dataContainer'     => 'Table',
        'enableVersioning'  => true,
        'sql' => array
        (
            'keys' => array
            (
                'id' => 'primary'  
            )
        ),
    ),
    // List
    'list' => array
    (
/*        'sorting' => array
        (
            'mode' => 2,
            'fields' => array('vintage DESC'),
            'flag' => 6,
            'panelLayout' => 'filter;sort,search,limit'
        ),
        'label' => array
        (
            'fields' => array('name', 'country'),
            'format' => '%s',
        ),
 * 
 */
        'global_operations' => array
        (
            'all' => array
            (
                'label' => &$GLOBALS['TL_LANG']['MSC']['all'],
                'href' => 'act=select',
                'class' => 'header_edit_all',
                'attributes' => 'onclick="Backend.getScrollOffset()" accesskey="e"'
            )
        ),
        'operations' => array
        (
            'edit' => array
            (
                'label' => &$GLOBALS['TL_LANG']['tl_wine']['edit'],
                'href' => 'act=edit',
                'icon' => 'edit.gif'
            ),
            'delete' => array
            (
                'label' => &$GLOBALS['TL_LANG']['tl_wine']['delete'],
                'href' => 'act=delete',
                'icon' => 'delete.gif',
                'attributes' => 'onclick="if(!confirm(\'' . $GLOBALS['TL_LANG']['MSC']['deleteConfirm'] . '\'))return false;Backend.getScrollOffset()"'
                //'attributes' => 'onclick="if(!confirm(\'' . 'Test' . '\'))return false;Backend.getScrollOffset()"'
            ),
            'toggle' => array
            (
                'label'               => &$GLOBALS['TL_LANG']['tl_wine']['toggle'],
                'icon'                => 'visible.gif',
                'attributes'          => 'onclick="Backend.getScrollOffset();return AjaxRequest.toggleVisibility(this,%s)"',
                'button_callback'     => array('tl_wine', 'toggleIcon')                
            ),
            'show' => array
            (
                'label' => &$GLOBALS['TL_LANG']['tl_wine']['show'],
                'href' => 'act=show',
                'icon' => 'show.gif',
                'attributes' => 'style="margin-right:3px"'
            ),
        )
    ),

	// Fields
	'fields' => array
	(
		'id'     => array
		(
			'sql' => "int(10) unsigned NOT NULL auto_increment"
		),
		'tstamp' => array
		(
			'sql' => "int(10) unsigned NOT NULL default '0'"
		),
		'type'  => array
		(
			'label'     => &$GLOBALS['TL_LANG']['tl_receipt']['type'],
			'inputType' => 'select',
			'exclude'   => true,
			'sorting'   => true,
			'flag'      => 1,
			'options'   => array('bar', 'buschenschank', 'osteria', 'restaurant', 'trattoria'),
			'reference' => &$GLOBALS['TL_LANG']['tl_receipt'],
			'eval'      => array(
				'includeBlankOption' => false,
				'submitOnChange'     => false,
				'mandatory'          => true,
				'tl_class'           => 'long',
			),
			'sql'       => "varchar(10) NOT NULL default ''"
		),
		'date_visited'  => array
		(
			'label'     => &$GLOBALS['TL_LANG']['tl_receipt']['date_visited'],
			'inputType' => 'text',
			'exclude'   => true,
			'sorting'   => true,
			'flag'      => 1,
			'search'    => true,
			'eval'      => array(
                                'rgxp'=>'date',
                                'doNotCopy'=>true,
                                'tl_class'=>'w50 wizard',                            
				'mandatory' => false,
				'unique'    => false,
				'maxlength' => 255,
                                'datepicker' => true
			),
                        'sql' => "int(10) unsigned NOT NULL default '0'"
                ),
		'title'  => array
		(
			'label'     => &$GLOBALS['TL_LANG']['tl_receipt']['title'],
			'inputType' => 'text',
			'exclude'   => true,
			'sorting'   => true,
			'flag'      => 1,
			'search'    => true,
			'eval'      => array(
				'mandatory' => true,
				'unique'    => true,
				'maxlength' => 255,
				'tl_class'  => 'long'
			),
			'sql'       => "varchar(255) NOT NULL default ''"
		),
		'land'  => array
		(
			'label'     => &$GLOBALS['TL_LANG']['tl_receipt']['land'],
			'inputType' => 'select',
			'exclude'   => true,
			'sorting'   => true,
			'flag'      => 1,
			'options'   => array('italien', 'österreich', 'deutschland', 'kroatien'),
			'reference' => &$GLOBALS['TL_LANG']['tl_receipt'],
			'eval'      => array(
				'includeBlankOption' => true,
				'submitOnChange'     => true,
				'mandatory'          => true,
				'tl_class'           => 'w50',
			),
			'sql'       => "varchar(10) NOT NULL default ''"
		),
    )
);
