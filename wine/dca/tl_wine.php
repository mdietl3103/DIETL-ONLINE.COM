<?php

//namespace dietl_online\wine;

/**
 * Table tl_wine
 */
$GLOBALS['TL_DCA']['tl_wine'] = array
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
        'sorting' => array
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
    // Palettes
    'palettes' => array
    (
        'default' => '{general_legend},name, description; {wine_details_legend},vintage, grape, country, region,
                       alcohol_strength, colour, aroma, quality, genussreife, temperature, handling, storing, advised_to, buy_date, price, vendor,
                       URL, notes, path;
                       {winemaker_legend}, winemaker, winemaker_URL, date_visited, savor_date, savored_with'
    ),
    // Fields
    'fields' => array
    (
        'id' => array
        (
            'sql' => "int(10) unsigned NOT NULL auto_increment"
        ),
        'tstamp' => array
        (
            'sql' => "int(10) unsigned NOT NULL default '0'"
        ),
        'name' => array(
            'label' => &$GLOBALS['TL_LANG']['tl_wine']['name'],
            'inputType' => 'text',
            'exclude' => true,
            'sorting' => true,
            'flag' => 1,
            'search' => true,
            'reference' => &$GLOBALS['TL_LANG']['tl_wine'],
            'eval' => array(
                'includeBlankOption' => false,
                'submitOnChange' => false,
                'mandatory' => true,
                'tl_class' => 'long',
            ),
            'sql' => "varchar(255) NOT NULL default ''"
        ),
        'description' => array
        (
            'label' => &$GLOBALS['TL_LANG']['tl_wine']['description'],
            'inputType' => 'textarea',
            'exclude' => true,
            'sorting' => false,
            'search' => true,
            'reference' => &$GLOBALS['TL_LANG']['tl_wine'],
            'eval' => array(
                //'rows' => 8,
                'includeBlankOption' => false,
                'submitOnChange' => false,
                'mandatory' => false,
                'style' => 'height:82px !important',
                'tl_class' => 'w50 clr',
            ),
            'sql' => "varchar(2500) NOT NULL default ''"
        ),
        'vintage' => array
        (
            'label' => &$GLOBALS['TL_LANG']['tl_wine']['vintage'],            
            'filter'                  => false,
            'sorting'                 => true,
            'flag'                    => 12,
            'sql'                     => "int(10) unsigned NOT NULL default '2014'",            
            'inputType' => 'customselect',
            'exclude' => true,
            'options_callback' => array('tl_wine', 'populateYearOptions'),
            //'reference' => &$GLOBALS['TL_LANG']['tl_wine'],
            'eval' => array(
                'includeBlankOption' => true,
                'submitOnChange' => false,
                'mandatory' => true,
                'tl_class' => 'w50',
                'default' => '-'
            ),
        ),
        'quality' => array
        (
            'label' => &$GLOBALS['TL_LANG']['tl_wine']['quality'],
            'inputType' => 'text',
            'exclude' => true,
            'sorting' => false,
            'eval' => array(
                'includeBlankOption' => true,
                'submitOnChange' => false,
                'mandatory' => false,
                'tl_class' => 'w50',
            ),
            'sql' => "varchar(180) NOT NULL default ''"
        ),
        'temperature' => array
        (
            'label' => &$GLOBALS['TL_LANG']['tl_wine']['temperature'],
            'inputType' => 'text',
            'exclude' => true,
            'sorting' => false,
            'flag' => 1,
            'eval' => array(
                'includeBlankOption' => true,
                'submitOnChange' => false,
                'mandatory' => false,
                'tl_class' => 'w50',
            ),
            'sql' => "varchar(50) NOT NULL default ''"
        ),
        'genussreife' => array
        (
            'label' => &$GLOBALS['TL_LANG']['tl_wine']['consumption'],
            'inputType' => 'text',
            'exclude' => true,
            'sorting' => false,
            'flag' => 1,
            'eval' => array(
                'includeBlankOption' => true,
                'submitOnChange' => false,
                'mandatory' => false,
                'tl_class' => 'w50',
            ),
            'sql' => "varchar(50) NOT NULL default ''"
        ),
        'date_visited' => array
        (
            'label' => &$GLOBALS['TL_LANG']['tl_wine']['date_visited'],
            'inputType' => 'text',
            'exclude' => true,
            'sorting' => false,
            'flag' => 1,
            'search' => false,
            //'input_field_callback' => array('tl_wine', 'fillCurrentDate'),
            'eval' => array(
                'rgxp' => 'date',
                'doNotCopy' => true,
                'tl_class' => 'w50 wizard',
                'mandatory' => false,
                'unique' => false,
                'maxlength' => 255,
                'datepicker' => true
            ),
            'sql' => "int(10) unsigned NULL"
            //'sql' => "int(10) unsigned NULL default NULL"
        ),
        'country' => array
        (
            'label' => &$GLOBALS['TL_LANG']['tl_wine']['country'],
            'inputType' => 'customselect',
            'exclude' => true,
            'sorting' => true,
            'filter' => true,
            'search' => true,
            'flag' => 4,
            'length' => 25,
            'options_callback' => array('tl_wine', 'populateCountryOptions'),
            'reference' => &$GLOBALS['TL_LANG']['tl_wine'],
            // 'foreignKey' => 'do_countries.country',
            'eval' => array(
                'includeBlankOption' => true,
                'submitOnChange' => false,
                'mandatory' => true,
                'tl_class' => 'w50',
                'default' => '-'
            ),
            'sql' => "varchar(50) NOT NULL default ''"
        ),
        'region' => array
        (
            'label' => &$GLOBALS['TL_LANG']['tl_wine']['region'],
            'inputType' => 'customselect',
            'exclude' => true,
            'sorting' => true,
            'filter' => true,
            'search' => true,
            'flag' => 4,
            'length' => 25,
            'options_callback' => array('tl_wine', 'populateRegionOptions'),
            'reference' => &$GLOBALS['TL_LANG']['tl_wine'],
            'eval' => array(
                'includeBlankOption' => true,
                'submitOnChange' => false,
                'mandatory' => false,
                'tl_class' => 'w50',
                'default' => '-'
            ),
            'sql' => "varchar(50) NOT NULL default ''"
        ),
        'grape' => array
        (
            'label' => &$GLOBALS['TL_LANG']['tl_wine']['grape'],
            'inputType' => 'text',
            'exclude' => true,
            'sorting' => false,
            'filter' => true,
            'search' => true,
            'reference' => &$GLOBALS['TL_LANG']['tl_wine'],
            'eval' => array(
                'includeBlankOption' => true,
                'submitOnChange' => false,
                'mandatory' => false,
                'tl_class' => 'w50'
            ),
            'sql' => "varchar(200) NOT NULL default ''"
        ),
        'winemaker' => array
        (
            'label' => &$GLOBALS['TL_LANG']['tl_wine']['winemaker'],
            'inputType' => 'text',
            'exclude' => true,
            'sorting' => false,
            'search' => true,
            'filter' => true,
            'reference' => &$GLOBALS['TL_LANG']['tl_wine'],
            'eval' => array(
                'includeBlankOption' => true,
                'submitOnChange' => false,
                'mandatory' => false,
                'wizard' => true,
                'tl_class' => 'w50 wizard'
            ),
            'sql' => "varchar(200) NOT NULL default ''"
        ),
        'handling' => array
        (
            'label' => &$GLOBALS['TL_LANG']['tl_wine']['handling'],
            'inputType' => 'text',
            'exclude' => true,
            'eval' => array(
                'tl_class' => 'w50'
            ),
            'sql' => "varchar(200) NOT NULL default ''"
        ),
        'alcohol_strength' => array
        (
            'label' => &$GLOBALS['TL_LANG']['tl_wine']['alcohol_strength'],
            'inputType' => 'text',
            'exclude' => true,
            'eval' => array(
                'tl_class' => 'w50'
            ),
            'sql' => "varchar(200) NOT NULL default ''"
        ),
        'colour' => array
        (
            'label' => &$GLOBALS['TL_LANG']['tl_wine']['colour'],
            'inputType' => 'text',
            'exclude' => true,
            'eval' => array(
                'tl_class' => 'w50'
            ),
            'sql' => "varchar(200) NOT NULL default ''"
        ),
        'aroma' => array
        (
            'label' => &$GLOBALS['TL_LANG']['tl_wine']['aroma'],
            'inputType' => 'text',
            'exclude' => true,
            'eval' => array(
                'tl_class' => 'w50 clr'
            ),
            'sql' => "varchar(200) NOT NULL default ''"
        ),
        'storing' => array
        (
            'label' => &$GLOBALS['TL_LANG']['tl_wine']['storing'],
            'inputType' => 'text',
            'exclude' => true,
            'eval' => array(
                'tl_class' => 'w50'
            ),
            'sql' => "varchar(200) NOT NULL default ''"
        ),
        'advised_to' => array
        (
            'label' => &$GLOBALS['TL_LANG']['tl_wine']['advised_to'],
            'inputType' => 'text',
            'exclude' => true,
            'eval' => array(
                'tl_class' => 'w50 clr'
            ),
            'sql' => "varchar(200) NOT NULL default ''"
        ),
        'buy_date' => array
        (
            'label' => &$GLOBALS['TL_LANG']['tl_wine']['buy_date'],
            'inputType' => 'text',
            'exclude' => true,
            'sorting' => false,
            'flag' => 1,
            'search' => false,
            'eval' => array(
                'rgxp' => 'date',
                'doNotCopy' => true,
                'tl_class' => 'w50 wizard',
                'mandatory' => false,
                'unique' => false,
                'maxlength' => 255,
                'datepicker' => true
            ),
            'sql' => "int(10) unsigned NULL"
        ),
        'price' => array
        (
            'label' => &$GLOBALS['TL_LANG']['tl_wine']['price'],
            'inputType' => "varchar(200) NOT NULL default ''",
            'exclude' => true,
            'eval' => array(
                'tl_class' => 'w50'
            ),
            'sql' => "varchar(200) NOT NULL default ''"
        ),
        'vendor' => array
        (
            'label' => &$GLOBALS['TL_LANG']['tl_wine']['vendor'],
            'inputType' => 'text',
            'exclude' => true,
            'search' => true,
            'eval' => array(
                'tl_class' => 'w50'
            ),
            'sql' => "varchar(200) NOT NULL default ''"
        ),
        'URL' => array
        (
            'label' => &$GLOBALS['TL_LANG']['tl_wine']['URL'],
            'inputType' => 'text',
            'exclude' => true,
            'eval' => array(
                'tl_class' => 'w50'
            ),
            'sql' => "varchar(200) NOT NULL default ''"
        ),
        'winemaker_URL' => array
        (
            'label' => &$GLOBALS['TL_LANG']['tl_wine']['winemaker_URL'],
            'inputType' => 'text',
            'exclude' => true,
            'eval' => array(
                'tl_class' => 'w50'
            ),
            'sql' => "varchar(200) NOT NULL default ''"
        ),
        'savor_date' => array
        (
            'label' => &$GLOBALS['TL_LANG']['tl_wine']['savor_date'],
            'inputType' => 'text',
            'exclude' => true,
            'sorting' => false,
            'flag' => 1,
            'search' => false,
            'eval' => array(
                'rgxp' => 'date',
                'doNotCopy' => true,
                'tl_class' => 'w50 wizard',
                'mandatory' => false,
                'unique' => false,
                'maxlength' => 255,
                'datepicker' => true
            ),
            // let the field be empty so the datepicker control will use the current date
            'sql' => "int(10) unsigned NULL"
        ),
        'savored_with' => array
        (
            'label' => &$GLOBALS['TL_LANG']['tl_wine']['savored_with'],
            'inputType' => 'text',
            'exclude' => true,
            'eval' => array(
                'tl_class' => 'long clr'
            ),
            'sql' => "varchar(200) NOT NULL default ''"
        ),
        'notes' => array
        (
            'label' => &$GLOBALS['TL_LANG']['tl_wine']['notes'],
            'inputType' => 'textarea',
            'exclude' => true,
            'sorting' => false,
            'flag' => 1,
            'search' => true,
            'reference' => &$GLOBALS['TL_LANG']['tl_wine'],
            'eval' => array(
                'rows' => 8, 
                'includeBlankOption' => false,
                'submitOnChange' => false,
                'mandatory' => false,
                'style' => 'height:82px !important',
                'tl_class' => 'w50 clr',
            ),
            'sql' => "varchar(5000) NOT NULL default ''"
        ),
        'path' => array
        (
            'label' => &$GLOBALS['TL_LANG']['tl_wine']['path'],
            'exclude'                 => true,
            'inputType'               => 'fileTree',
            'eval'                    => array(
                    'filesOnly'=>true,
                    'multiple' =>true,
                    'extensions'=>$GLOBALS['TL_CONFIG']['validImageTypes'],
                    'fieldType'=>'checkbox',
                    'tl_class' => 'long m12 clr'
            ),
            'sql'                     => "blob NULL"
        ),
        'published' => array
        (
            'label'               => &$GLOBALS['TL_LANG']['tl_wine']['published'],
            'exclude'             => true,
            'filter'              => false,
            'inputType'           => 'checkbox',
            'sql'                 => "char(1) NOT NULL default '1'"          
        ),
    )
);

//$GLOBALS['TL_PERMISSIONS'][] = 'wine';

/**
 * Class tl_wine
 *
 * Provide miscellaneous methods that are used by the data configuration array.
 * @copyright  Michael Dietl 2014
 * @author     Michael Dietl <http://www.dietl-online.com>
 * @package    Wine
 */

class tl_wine extends \Backend {

    /**
     * Import the back end user object
     */
    public function __construct() {
        parent::__construct();
        $this->import('BackendUser', 'User');
    }
    
    /**
     * Toggle the visibility of an element
     * @param integer
     * @param boolean
     */
    public function toggleVisibility($intId, $blnPublished)
    {
        $this->log('Test', __METHOD__, TL_ERROR);
        // Check permissions to publish
        if (!$this->User->isAdmin && !$this->User->hasAccess('tl_wine::published', 'alexf'))
        {
            $this->log('Not enough permissions to show/hide record ID "'.$intId.'"', 'tl_wine toggleVisibility', TL_ERROR);
            $this->redirect('contao/main.php?act=error');
        }

        $this->createInitialVersion('tl_wine', $intId);

        // Trigger the save_callback
        if (is_array($GLOBALS['TL_DCA']['tl_wine']['fields']['published']['save_callback']))
        {
            foreach ($GLOBALS['TL_DCA']['tl_wine']['fields']['published']['save_callback'] as $callback)
            {
                $this->import($callback[0]);
                $blnPublished = $this->$callback[0]->$callback[1]($blnPublished, $this);
            }
        }

        // Update the database
        $this->Database->prepare("UPDATE tl_wine SET tstamp=". time() .", published='" . ($blnPublished ? '' : '1') . "' WHERE id=?")
            ->execute($intId);
        $this->createNewVersion('tl_wine', $intId);
    }
    
    public function toggleIcon($row, $href, $label, $title, $icon, $attributes)
    {
        $this->import('BackendUser', 'User');
 
        if (strlen($this->Input->get('tid')))
        {
            $this->toggleVisibility($this->Input->get('tid'), ($this->Input->get('state') == 0));
            $this->redirect($this->getReferer());
        }
 
        // Check permissions AFTER checking the tid, so hacking attempts are logged
        if (!$this->User->isAdmin && !$this->User->hasAccess('tl_wine::published', 'alexf'))
        {
            return '';
        }
 
        $href .= '&amp;id='.$this->Input->get('id').'&amp;tid='.$row['id'].'&amp;state='.$row[''];
 
        if (!$row['published'])
        {
            $icon = 'invisible.gif';
        }
 
        return '<a href="'.$this->addToUrl($href).'" title="'.specialchars($title).'"'.$attributes.'>'.$this->generateImage($icon, $label).'</a> ';
    }
    
    public function populateYearOptions($varValue) {
        $curYear = date('Y');
        $endYear = 1980;
        $ret = array();

        for ($i = $curYear; $i >= $endYear; $i--) {
            array_push($ret, "" . $i);
        }

        return $ret;
    }

    public function populateCountryOptions($varValue) {
        $ret = array();

        $objCountries = $this->Database->prepare("SELECT DISTINCT country
                                                FROM tl_wine
                                                ORDER by country")
            ->execute();
        while ($objCountries->next()) {
            if ($objCountries->country != '') {
                array_push($ret, $objCountries->country);
            }
        }

        return $ret;
    }

    public function populateRegionOptions($varValue) {
        $ret = array();

        $objRegions = $this->Database->prepare("SELECT DISTINCT region
                                                FROM tl_wine
                                                ORDER by region")
            ->execute();
        while ($objRegions->next()) {
            if ($objRegions->region != '') {
                array_push($ret, $objRegions->region);
            }
        }

        return $ret;
    }

    public function fillCurrentDate($varValue)
    {
        $date = Date::parse(Config::get('dateFormat'), time());
        return ($date);
    }
    
    public function storePictures(DataContainer $dc)
    {
        // Return if there is no ID
        if (!$dc->id)
        {
            return;
        }

        // Store the ID in the session
        //$session = $this->Session->get('calendar_feed_updater');
        //$session[] = $dc->id;
        //$this->Session->set('calendar_feed_updater', array_unique($session));
        $this->log('Pictures -> '.$dc->path, __METHOD__, TL_ERROR);
    }
}
