<?php
return [
    '@class' => 'Grav\\Common\\File\\CompiledYamlFile',
    'filename' => '/home/ms008600/www_root/cms2/user/config/site.yaml',
    'modified' => 1586622806,
    'data' => [
        'title' => 'Kiapeš',
        'default_lang' => 'sk',
        'author' => [
            'name' => 'Kiapeš',
            'email' => 'admin@kiapes.sk'
        ],
        'taxonomies' => [
            0 => 'category',
            1 => 'tag'
        ],
        'metadata' => [
            'description' => 'Grav is an easy to use, yet powerful, open source flat-file CMS'
        ],
        'summary' => [
            'enabled' => true,
            'format' => 'short',
            'size' => 300,
            'delimiter' => '==='
        ],
        'redirects' => NULL,
        'routes' => NULL,
        'blog' => [
            'route' => '/blog'
        ]
    ]
];
