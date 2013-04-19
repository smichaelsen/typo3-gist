<?php

\TYPO3\CMS\Core\Utility\GeneralUtility::loadTCA('tt_content');

/**
 * Define new content element type
 */
$TCA['tt_content']['columns']['CType']['config']['items'][] = array(
	'Embed Gist',
	'tx_gist_embedgist',
	''
);

/**
 * New TCA column
 */
$newColumn = array(
	'tx_gist_gisturl' => array(
		'label' => 'LLL:EXT:gist/Resources/Private/Language/locallang_db.xml:tt_content.tx_gist_gisturl',
		'config' => array(
			'type' => 'input',
			'size' => '40',
		)
	)
);
if (class_exists('\TYPO3\CMS\Core\Utility\ExtensionManagementUtility')) {
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('tt_content', $newColumn);
} else {
	t3lib_extMgm::addTCAcolumns('tt_content', $newColumn);
}

/**
 * Columns for the new CE type
 */
$TCA['tt_content']['types']['tx_gist_embedgist'] = array(
	'showitem' => '
		--palette--;LLL:EXT:cms/locallang_ttc.xml:palette.general;general,
		header;LLL:EXT:gist/Resources/Private/Language/locallang_db.xml:tt_content.header,
		tx_gist_gisturl,
		--div--;LLL:EXT:cms/locallang_ttc.xml:tabs.access, --palette--;LLL:EXT:cms/locallang_ttc.xml:palette.visibility;visibility, --palette--;LLL:EXT:cms/locallang_ttc.xml:palette.access;access
	'
);

?>