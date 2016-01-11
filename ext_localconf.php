<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'Qinx.' . $_EXTKEY,
	'Pi1',
	array(
		'Question' => 'index, save',
		
	),
	// non-cacheable actions
	array(
		'Question' => 'index, save',
	)
);
