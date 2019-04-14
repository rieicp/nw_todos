<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function()
    {

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
            'NWInt.NwTodos',
            'Tasklising',
            'Todos - Task Listing'
        );

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile('nw_todos', 'Configuration/TypoScript', 'Todos Listing');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_nwtodos_domain_model_todo', 'EXT:nw_todos/Resources/Private/Language/locallang_csh_tx_nwtodos_domain_model_todo.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_nwtodos_domain_model_todo');

    }
);
