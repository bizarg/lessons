<?php

return [
    'namespace' => 'app',
    'paths' => [
        'domain' => 'Domain',
        'command' => 'Application',
        'repository' => 'Infrastructure/Eloquent',
        'controller' => 'Http/Controllers/Api',
        'request' => 'Http/Requests',
        'resource' => 'Http/Resources',
        'migrate' => 'database/migrations',
        'test' => 'tests/Feature',
        'doc' => 'api-doc',
        'stub' => 'resources/stubs',
        'route' => base_path('routes/api.php'),
    ],
    'repositoryFilePrefix' => 'Eloquent',
    'routePrefix' => 'api',
    'generate' => [
        'collection' => true
    ],
    'declare' => true
];
