<?php

namespace NWInt\NwTodos\Backend\TCA;

use TYPO3\CMS\Backend\Utility\BackendUtility;

class Labels
{
    function getTodoRecordLabel(&$params, &$pObj)
    {
        if ($params ['table'] != 'tx_nwtodos_domain_model_todo')
            return '';

        // Get complete record
        $rec = BackendUtility::getRecordWSOL($params ['table'], $params ['row'] ['uid']);

        $ordering = $rec ['ordering'];

        // Assemble the label
        $label = $ordering . ': ' . $rec ['title'];

        // Write to the label
        $params ['title'] = $label;
    }
}
