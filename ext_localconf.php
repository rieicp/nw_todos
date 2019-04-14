<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function()
    {

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'NWInt.NwTodos',
            'Tasklising',
            [
                'Todo' => 'list, search, add, show, update, delete'
            ],
            // non-cacheable actions
            [
                'Todo' => 'list, search, add, show, update, delete'
            ]
        );

    // wizards
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
        'mod {
            wizards.newContentElement.wizardItems.plugins {
                elements {
                    tasklising {
                        iconIdentifier = nw_todos-plugin-tasklising
                        title = LLL:EXT:nw_todos/Resources/Private/Language/locallang_db.xlf:tx_nw_todos_tasklising.name
                        description = LLL:EXT:nw_todos/Resources/Private/Language/locallang_db.xlf:tx_nw_todos_tasklising.description
                        tt_content_defValues {
                            CType = list
                            list_type = nwtodos_tasklising
                        }
                    }
                }
                show = *
            }
       }'
    );
		$iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class);
		
			$iconRegistry->registerIcon(
				'nw_todos-plugin-tasklising',
				\TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
				['source' => 'EXT:nw_todos/Resources/Public/Icons/user_plugin_tasklising.svg']
			);
		
    }
);
