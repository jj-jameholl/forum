<?php
return [
    'edit' => [
        'type' => 2,
    ],
    'admin' => [
        'type' => 1,
        'children' => [
            'edit',
        ],
    ],
    'author' => [
        'type' => 1,
        'children' => [
            'edit_self',
        ],
    ],
    'edit_self' => [
        'type' => 2,
        'ruleName' => 'isAuthor',
        'children' => [
            'edit',
        ],
    ],
];
