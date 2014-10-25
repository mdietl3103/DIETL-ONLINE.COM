<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2013 Leo Feyer
 *
 * @package   wine
 * @author    Michael Dietl
 * @license   GNU/LPGL
 * @copyright &#40;c&#41; 2014
 */


/**
 * Namespace
 */
namespace dietl_online\wine;


/**
 * Class wine_fe
 *
 * @copyright  &#40;c&#41; 2014
 * @author     Michael Dietl
 * @package    Devtools
 */
class wine_fe extends \Module
{

	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'wine_fe';


	/**
	 * Generate the module
	 */
	protected function compile()
	{
        $this->loadLanguageFile('tl_wine');

        $typeFilter = '';

        $whereSql = array();
        $queryArgs = array();

        if ($this->wine_filter_type) {
            $typeFilter = $this->wine_filter_type;
        }
        else if (\Input::get('type')) {
            $typeFilter = \Input::get('type');
        }

        if ($typeFilter) {
            $whereSql[] = 'type=?';
            $queryArgs[] = $typeFilter;
        }

        /** @var \Contao\Database\Result $rs */
        $rs = $this->Database                   //Database::getInstance()
            ->prepare('SELECT * FROM tl_wine ' . (count($whereSql) ? 'WHERE ' . implode('AND', $whereSql) : '') . ' ORDER BY name')
            ->execute($queryArgs);

        while ($rs->next())
        {
            $wineArr = array
            (
               // 'partnernachname' => trim($objPaare->partnernachname),
            );

            $images = deserialize($rs->path);
            if(count($images) > 0)
            {
                // $imagesFolder = deserialize($imagesFolder);
                //$objFiles = \FilesModel::findMultipleByUuids($imagesFolder);
                $objImage = \FilesModel::findByUuid($images[0]);
                $wineArr['pictures'] = $objImage->path;
            }
            else
            {
                $wineArr['pictures'] =  $GLOBALS['TL_CONFIG']['websitePath'] . '/system/modules/wine/assets/images/black_bottle.jpg';
            }

            $arrWines[] = $wineArr;
        }
        $this->Template->wines = $arrWines;
    }
  
}
