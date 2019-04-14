<?php
return [
    'ctrl' => [
        'title' => 'LLL:EXT:nw_todos/Resources/Private/Language/locallang_db.xlf:tx_nwtodos_domain_model_todo',
        'label' => 'title',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'versioningWS' => true,
        'languageField' => 'sys_language_uid',
        'transOrigPointerField' => 'l10n_parent',
        'transOrigDiffSourceField' => 'l10n_diffsource',
        'delete' => 'deleted',
        'enablecolumns' => [
            'disabled' => 'hidden',
            'starttime' => 'starttime',
            'endtime' => 'endtime',
        ],
        'searchFields' => 'title,detail,due_start_time,due_end_time,must_do,finished,category,links,files',
        'iconfile' => 'EXT:nw_todos/Resources/Public/Icons/tx_nwtodos_domain_model_todo.gif'
    ],
    'interface' => [
        'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, title, detail, due_start_time, due_end_time, must_do, finished, category, links, files',
    ],
    'types' => [
        '1' => ['showitem' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, title, detail, due_start_time, due_end_time, must_do, finished, category, links, files, --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.access, starttime, endtime'],
    ],
    'columns' => [
        'sys_language_uid' => [
            'exclude' => true,
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.language',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'special' => 'languages',
                'items' => [
                    [
                        'LLL:EXT:lang/locallang_general.xlf:LGL.allLanguages',
                        -1,
                        'flags-multiple'
                    ]
                ],
                'default' => 0,
            ],
        ],
        'l10n_parent' => [
            'displayCond' => 'FIELD:sys_language_uid:>:0',
            'exclude' => true,
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.l18n_parent',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'default' => 0,
                'items' => [
                    ['', 0],
                ],
                'foreign_table' => 'tx_nwtodos_domain_model_todo',
                'foreign_table_where' => 'AND tx_nwtodos_domain_model_todo.pid=###CURRENT_PID### AND tx_nwtodos_domain_model_todo.sys_language_uid IN (-1,0)',
            ],
        ],
        'l10n_diffsource' => [
            'config' => [
                'type' => 'passthrough',
            ],
        ],
        't3ver_label' => [
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.versionLabel',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'max' => 255,
            ],
        ],
        'hidden' => [
            'exclude' => true,
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.hidden',
            'config' => [
                'type' => 'check',
                'items' => [
                    '1' => [
                        '0' => 'LLL:EXT:lang/Resources/Private/Language/locallang_core.xlf:labels.enabled'
                    ]
                ],
            ],
        ],
        'starttime' => [
            'exclude' => true,
            'behaviour' => [
                'allowLanguageSynchronization' => true
            ],
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.starttime',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'size' => 13,
                'eval' => 'datetime',
                'default' => 0,
            ],
        ],
        'endtime' => [
            'exclude' => true,
            'behaviour' => [
                'allowLanguageSynchronization' => true
            ],
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.endtime',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'size' => 13,
                'eval' => 'datetime',
                'default' => 0,
                'range' => [
                    'upper' => mktime(0, 0, 0, 1, 1, 2038)
                ],
            ],
        ],

        'title' => [
            'exclude' => false,
            'label' => 'LLL:EXT:nw_todos/Resources/Private/Language/locallang_db.xlf:tx_nwtodos_domain_model_todo.title',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim,required'
            ],
        ],
        'detail' => [
            'exclude' => false,
            'label' => 'LLL:EXT:nw_todos/Resources/Private/Language/locallang_db.xlf:tx_nwtodos_domain_model_todo.detail',
            'config' => [
                'type' => 'text',
                'cols' => 40,
                'rows' => 15,
                'eval' => 'trim'
            ]
        ],
        'due_start_time' => [
            'exclude' => false,
            'label' => 'LLL:EXT:nw_todos/Resources/Private/Language/locallang_db.xlf:tx_nwtodos_domain_model_todo.due_start_time',
            'config' => [
                'dbType' => 'datetime',
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'size' => 12,
                'eval' => 'datetime',
                'default' => null,
            ],
        ],
        'due_end_time' => [
            'exclude' => false,
            'label' => 'LLL:EXT:nw_todos/Resources/Private/Language/locallang_db.xlf:tx_nwtodos_domain_model_todo.due_end_time',
            'config' => [
                'dbType' => 'datetime',
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'size' => 12,
                'eval' => 'datetime',
                'default' => null,
            ],
        ],
        'must_do' => [
            'exclude' => false,
            'label' => 'LLL:EXT:nw_todos/Resources/Private/Language/locallang_db.xlf:tx_nwtodos_domain_model_todo.must_do',
            'config' => [
                'type' => 'check',
                'items' => [
                    '1' => [
                        '0' => 'LLL:EXT:lang/Resources/Private/Language/locallang_core.xlf:labels.enabled'
                    ]
                ],
                'default' => 0,
            ]
            
        ],
        'finished' => [
            'exclude' => false,
            'label' => 'LLL:EXT:nw_todos/Resources/Private/Language/locallang_db.xlf:tx_nwtodos_domain_model_todo.finished',
            'config' => [
                'type' => 'check',
                'items' => [
                    '1' => [
                        '0' => 'LLL:EXT:lang/Resources/Private/Language/locallang_core.xlf:labels.enabled'
                    ]
                ],
                'default' => 0,
            ]
            
        ],
        'category' => [
            'exclude' => false,
            'label' => 'LLL:EXT:nw_todos/Resources/Private/Language/locallang_db.xlf:tx_nwtodos_domain_model_todo.category',
            'config' => [
                'type' => 'input',
                'size' => 4,
                'eval' => 'int'
            ]
        ],
        'links' => [
            'exclude' => false,
            'label' => 'LLL:EXT:nw_todos/Resources/Private/Language/locallang_db.xlf:tx_nwtodos_domain_model_todo.links',
            'config' => [
                'type' => 'input',
                'size' => 4,
                'eval' => 'int'
            ]
        ],
        'files' => [
            'exclude' => false,
            'label' => 'LLL:EXT:nw_todos/Resources/Private/Language/locallang_db.xlf:tx_nwtodos_domain_model_todo.files',
            'config' => [
                'type' => 'input',
                'size' => 4,
                'eval' => 'int'
            ]
        ],
    
    ],
];
