<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function()
    {

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'NWInt.NwTodos',
            'Tasklisting',
            [
                'Todo' => 'list, search, add, show, update, delete, setItemsOrdering'
            ],
            // non-cacheable actions
            [
                'Todo' => 'list, search, add, show, update, delete, setItemsOrdering'
            ]
        );

    // wizards
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
        'mod {
            wizards.newContentElement.wizardItems.plugins {
                elements {
                    tasklisting {
                        iconIdentifier = nw_todos-plugin-tasklisting
                        title = LLL:EXT:nw_todos/Resources/Private/Language/locallang_db.xlf:tx_nw_todos_tasklisting.name
                        description = LLL:EXT:nw_todos/Resources/Private/Language/locallang_db.xlf:tx_nw_todos_tasklisting.description
                        tt_content_defValues {
                            CType = list
                            list_type = nwtodos_tasklisting
                        }
                    }
                }
                show = *
            }
       }'
    );
		$iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class);
		
			$iconRegistry->registerIcon(
				'nw_todos-plugin-tasklisting',
				\TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
				['source' => 'EXT:nw_todos/Resources/Public/Icons/user_plugin_tasklisting.svg']
			);
		
    }
);
