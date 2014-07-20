<?php
define ('_JEXEC', 1);
define('JPATH_BASE', __DIR__ . '/..');
require_once JPATH_BASE . '/includes/defines.php';
require_once JPATH_BASE . '/includes/framework.php';
$app = JFactory::getApplication('site');
$user =  JFactory::getUser();
$levels = JAccess::getAuthorisedViewLevels($user->id);
$groups = JAccess::getGroupsByUser($user->id);
setcookie('test', 3, time() + 60*60, '/cd');
$table = JTable::getInstance('viewlevel');
$db = JFactory::getDbo();
$query = $db->getQuery(true);
$query->select('id')->from('#__viewlevels')->where('title = ' . $db->quote('Leader'));
$db->setQuery($query);
$id = $db->loadResult();
?>
<h1>Index</h1>
<pre>
<?php //var_dump($_COOKIE); ?>
<?php //var_dump($user); ?>
<?php var_dump($levels); ?>
<?php var_dump($groups); ?>
<?php //var_dump($table); ?>
<?php //var_dump($values); ?>
<?php 
	echo "User = $user->name ($user->id) <br>";
	echo "Leader Access ID = $id <br>"?>
<?php 
	// Check if current users has access to the leader group
	if (in_array($id, $levels)) {
		echo "User has leader access<br>";
	}
	else {
		echo "User does not have leader access<br>";
	}
?>
</pre> 
