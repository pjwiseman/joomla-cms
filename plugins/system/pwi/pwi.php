<?php
/**
 * @package     Joomla.Plugin
 * @subpackage  System.pwi
 *
 * @copyright   Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('JPATH_BASE') or die;

/**
 * Plugin class for pwi testing.
 *
 * @package     Joomla.Plugin
 * @subpackage  System.pwi
 * @since       3.1
 */
class PlgSystemPwi extends JPlugin
{
	/**
	 * Constructor.
	 *
	 * @param   object  &$subject  The object to observe -- event dispatcher.
	 * @param   object  $config    An optional associative array of configuration settings.
	 *
	 * @since   3.1
	 */
	public function __construct(&$subject, $config)
	{
		parent::__construct($subject, $config);
	}

	public function onAfterRender()
	{
		
	}
	
	public function onUserLogin($user, $options = array())
	{
		// Check for leader access
		setcookie('cdaccess', 1, time() + 60*60*24);
		JFactory::getApplication()->enqueueMessage('test login message');
		return true;
	}

	public function onUserLogout($user, $options = array())
	{
		setcookie('cdaccess', 0, time() - 60*60*24);
		JFactory::getApplication()->enqueueMessage('test logout message');
		return true;
	}

}
