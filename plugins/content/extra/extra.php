<?php
/**
 * @package     Joomla.Plugin
 * @subpackage  Content.extra
 *
 * @copyright   Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

/**
 * Extra plugin.
 *
 * @package     Joomla.Plugin
 * @subpackage  Content.extra
 * @since       0.0.1
 */
class PlgContentExtra extends JPlugin
{
	protected $autoloadLanguage = true;

	
	public function __construct(&$subject, $config)
	{
		parent::__construct($subject, $config);
	}
	
	public function onContentPrepareForm($form, $data)
	{
		JForm::addFormPath(dirname(__FILE__) . '/extra');
		$form->loadFile('extra', false);
		return true;	
	}
	
	public function onContentPrepareData($context, $data)
	{
		//if (!is_object($article)) { return true; }
		
		$data->extra = array();
		$data->extra['field1'] = 'field1-value';
		
		return true;
	}
	
	public function onContentAfterSave($context, &$article, $isNew)
	{
		
	}
	
	public function onContentAfterDelete($context, $article)
	{
		
	}	

	public function onContentPrepare($context, &$article, &$params, $page = 0)
	{
// 		if (!isset($article->extra) || !count($article->extra))
// 			return;
	
		// add extra css for table
// 		$doc = JFactory::getDocument();
// 		$doc->addStyleSheet(JURI::base(true).'/plugins/content/rating/rating/rating.css');
	
		// construct a result table on the fly
// 		jimport('joomla.html.grid');
// 		$table = new JGrid();
	
// 		// Create columns
// 		$table->addColumn('attr')
// 		->addColumn('value');
	
// 		// populate
// 		$rownr = 0;
// 		foreach ($article->rating as $attr => $value) {
// 			$table->addRow(array('class' => 'row'.($rownr % 2)));
// 			$table->setRowCell('attr', $attr);
// 			$table->setRowCell('value', $value);
// 			$rownr++;
// 		}
	
// 		// wrap table in a classed <div>
// 		$suffix = $this->params->get('ratingclass_sfx', 'rating');
// 		$html = '<div class="'.$suffix.'">'.(string)$table.'</div>';
	
// 		$article->text = $html.$article->text;

		$extra = '';
		
		if (isset($article->extra)) 
		{
			$extra = "has extra";
		}
		$debug = var_export($article, true);
		$extra .= '<style>.test {color:red; border: 1px dotted red; }</style>';
		$extra .= '<div class="test">TEST CONTENT</div>';
		$extra .= "<pre>$debug</pre>";
		
		$article->text =  $extra . $article->text;
	}
}
