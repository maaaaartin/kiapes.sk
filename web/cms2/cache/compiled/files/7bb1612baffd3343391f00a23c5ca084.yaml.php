<?php
return [
    '@class' => 'Grav\\Common\\File\\CompiledYamlFile',
    'filename' => '/home/ms008600/www_root/cms2/user/plugins/tools-collection/tools-collection.yaml',
    'modified' => 1586624194,
    'data' => [
        'enabled' => true,
        'pageblueprint' => [
            'enabled' => true,
            'options' => [
                'enabled' => true
            ],
            'advanced' => [
                'enabled' => true
            ]
        ],
        'infopanel' => [
            'enabled' => false,
            'text' => 'Here is your info that the customer should see.',
            'navtitel' => 'Info panel',
            'sitetitel' => 'Info',
            'titel' => 'Contact info'
        ],
        'markdown' => [
            'enabled' => true
        ],
        'filter' => [
            'twigextension' => [
                'enabled' => false,
                'modules' => [
                    0 => 'array',
                    1 => 'intl',
                    2 => 'date'
                ]
            ]
        ],
        'imageresize' => [
            'enabled' => false,
            'adapter' => 'imagick',
            'remove_original' => false,
            'mode' => 'all'
        ]
    ]
];
