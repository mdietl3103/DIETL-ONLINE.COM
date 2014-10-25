<?php

class ModuleSlowFoodList extends Module
{
	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'mod_slowfood_list';

	/**
	 * Compile the current element
	 */
	protected function compile()
	{
		$this->loadLanguageFile('tl_slowfood');

		$typeFilter = '';

		$whereSql = array();
		$queryArgs = array();

		if ($this->slowfood_filter_type) {
			$typeFilter = $this->slowfood_filter_type;
		}
		else if (\Input::get('type')) {
			$typeFilter = \Input::get('type');
		}

		if ($typeFilter) {
			$whereSql[] = 'type=?';
			$queryArgs[] = $typeFilter;
		}

		/** @var \Contao\Database\Result $rs */
		$rs = Database::getInstance()
			->prepare('SELECT * FROM tl_slowfood ' . (count($whereSql) ? 'WHERE ' . implode('AND', $whereSql) : '') . ' ORDER BY title')
			->execute($queryArgs);

		$this->Template->slowfoods = $rs->fetchAllAssoc();
		$this->Template->filterByType = !$this->slowfood_filter_type;
		$this->Template->typeFilter   = $typeFilter;
	}
}
