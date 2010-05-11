<?php
if (!defined ('TYPO3_MODE')) 	die ('Access denied.');

$TCA['tx_stopwords_lists'] = array (
	'ctrl' => $TCA['tx_stopwords_lists']['ctrl'],
	'interface' => array (
		'showRecordFieldList' => 'sys_language_uid,l10n_parent,l10n_diffsource,hidden,title,list_type,words'
	),
	'feInterface' => $TCA['tx_stopwords_lists']['feInterface'],
	'columns' => array (
		'sys_language_uid' => array (		
			'exclude' => 1,
			'label'  => 'LLL:EXT:lang/locallang_general.xml:LGL.language',
			'config' => array (
				'type'                => 'select',
				'foreign_table'       => 'sys_language',
				'foreign_table_where' => 'ORDER BY sys_language.title',
				'items' => array(
					array('LLL:EXT:lang/locallang_general.xml:LGL.allLanguages', -1),
					array('LLL:EXT:lang/locallang_general.xml:LGL.default_value', 0)
				)
			)
		),
		'l10n_parent' => array (		
			'displayCond' => 'FIELD:sys_language_uid:>:0',
			'exclude'     => 1,
			'label'       => 'LLL:EXT:lang/locallang_general.xml:LGL.l18n_parent',
			'config'      => array (
				'type'  => 'select',
				'items' => array (
					array('', 0),
				),
				'foreign_table'       => 'tx_stopwords_lists',
				'foreign_table_where' => 'AND tx_stopwords_lists.pid=###CURRENT_PID### AND tx_stopwords_lists.sys_language_uid IN (-1,0)',
			)
		),
		'l10n_diffsource' => array (		
			'config' => array (
				'type' => 'passthrough'
			)
		),
		'hidden' => array (		
			'exclude' => 1,
			'label'   => 'LLL:EXT:lang/locallang_general.xml:LGL.hidden',
			'config'  => array (
				'type'    => 'check',
				'default' => '0'
			)
		),
		'title' => array (		
			'exclude' => 0,		
			'label' => 'LLL:EXT:stopwords/locallang_db.xml:tx_stopwords_lists.title',
			'config' => array (
				'type' => 'input',	
				'size' => '30',	
				'eval' => 'required,trim',
			)
		),
		'list_type' => array (
			'exclude' => 0,		
			'label' => 'LLL:EXT:stopwords/locallang_db.xml:tx_stopwords_lists.list_type',
			'config' => array (
				'type' => 'radio',
				'items' => array (
					array('LLL:EXT:stopwords/locallang_db.xml:tx_stopwords_lists.list_type.I.0', 'white'),
					array('LLL:EXT:stopwords/locallang_db.xml:tx_stopwords_lists.list_type.I.1', 'black'),
				),
			)
		),
		'words' => array (		
			'exclude' => 0,		
			'label' => 'LLL:EXT:stopwords/locallang_db.xml:tx_stopwords_lists.words',
			'config' => array (
				'type' => 'text',
				'cols' => '48',	
				'rows' => '10',
			)
		),
	),
	'types' => array (
		'0' => array('showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden;;1, title;;;;2-2-2, list_type;;;;3-3-3, words'),
	),
	'palettes' => array (
		'1' => array('showitem' => '')
	)
);
?>