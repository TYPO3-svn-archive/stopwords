<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}
$TCA['tx_stopwords_lists'] = array (
	'ctrl' => array (
		'title'     => 'LLL:EXT:stopwords/locallang_db.xml:tx_stopwords_lists',
		'label'     => 'title',
		'tstamp'    => 'tstamp',
		'crdate'    => 'crdate',
		'cruser_id' => 'cruser_id',
		'languageField'            => 'sys_language_uid',	
		'transOrigPointerField'    => 'l10n_parent',	
		'transOrigDiffSourceField' => 'l10n_diffsource',	
		'default_sortby' => 'ORDER BY title',
		'delete' => 'deleted',	
		'enablecolumns' => array (		
			'disabled' => 'hidden',
		),
		'type' => 'type',
		'typeicon_column' => 'type',
		'typeicons' => array(
			'black' => t3lib_extMgm::extRelPath($_EXTKEY) . 'icon_tx_stopwords_blacklist.gif',
			'white' => t3lib_extMgm::extRelPath($_EXTKEY) . 'icon_tx_stopwords_whitelist.gif'
		),
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'tca.php',
		'iconfile'          => t3lib_extMgm::extRelPath($_EXTKEY) . 'icon_tx_stopwords_lists.gif',
	),
);
t3lib_extMgm::allowTableOnStandardPages('tx_stopwords_lists');
?>