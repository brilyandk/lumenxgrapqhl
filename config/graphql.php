<?php


return [

    /*
     * The prefix for routes
     */
    'prefix' => 'graphql',

    /*
     * The domain for routes
     */
    'domain' => null,

    /*
     * The routes to make GraphQL request. Either a string that will apply
     * to both query and mutation or an array containing the key 'query' and/or
     * 'mutation' with the according Route
     *
     * Example:
     *
     * Same route for both query and mutation
     *
     * 'routes' => [
     *     'query' => 'query/{graphql_schema?}',
     *     'mutation' => 'mutation/{graphql_schema?}',
     *      mutation' => 'graphiql'
     * ]
     *
     * you can also disable routes by setting routes to null
     *
     * 'routes' => null,
     */
    'routes' => '{graphql_schema?}',

    /*
     * The controller to use in GraphQL requests. Either a string that will apply
     * to both query and mutation or an array containing the key 'query' and/or
     * 'mutation' with the according Controller and method
     *
     * Example:
     *
     * 'controllers' => [
     *     'query' => '\Folklore\GraphQL\GraphQLController@query',
     *     'mutation' => '\Folklore\GraphQL\GraphQLController@mutation'
     * ]
     */
    'controllers' => \Folklore\GraphQL\GraphQLController::class.'@query',

    /*
     * The name of the input variable that contain variables when you query the
     * endpoint. Most libraries use "variables", you can change it here in case you need it.
     * In previous versions, the default used to be "params"
     */
    'variables_input_name' => 'variables',

    /*
     * Any middleware for the 'graphql' route group
     */
    'middleware' => [],

    /**
     * Any middleware for a specific 'graphql' schema
     */
    'middleware_schema' => [
        'default' => [],
    ],

    /*
     * Any headers that will be added to the response returned by the default controller
     */
    'headers' => [],

    /*
     * Any JSON encoding options when returning a response from the default controller
     * See http://php.net/manual/function.json-encode.php for the full list of options
     */
    'json_encoding_options' => 0,

    /*
     * Config for GraphiQL (see (https://github.com/graphql/graphiql).
     * To disable GraphiQL, set this to null
     */
    'graphiql' => [
        'routes' => '/graphiql/{graphql_schema?}',
        'controller' => \Folklore\GraphQL\GraphQLController::class.'@graphiql',
        'middleware' => [],
        'view' => 'graphql::graphiql',
        'composer' => \Folklore\GraphQL\View\GraphiQLComposer::class,
    ],

    /*
     * The name of the default schema used when no arguments are provided
     * to GraphQL::schema() or when the route is used without the graphql_schema
     * parameter
     */
    'schema' => 'default',

    /*
     * The schemas for query and/or mutation. It expects an array to provide
     * both the 'query' fields and the 'mutation' fields. You can also
     * provide an GraphQL\Type\Schema object directly.
     *
     * Example:
     *
     * 'schemas' => [
     *     'default' => new Schema($config)
     * ]
     *
     * or
     *
     * 'schemas' => [
     *     'default' => [
     *         'query' => [
     *              'users' => 'App\GraphQL\Query\UsersQuery'
     *          ],
     *          'mutation' => [
     *
     *          ]
     *     ]
     * ]
     */
    'schemas' => [
        'default' => [
            'query' => [
                //query ditulis di sini
                // 'PostQuery' => App\GraphQL\Query\PostQuery::class,
                //'MonitorQuery' => App\GraphQL\Query\MonitorQuery::class,
                'CameraQuery' => App\GraphQL\Query\CameraQuery::class,
                'LaptopQuery' => App\GraphQL\Query\LaptopQuery::class,
                'SmartphoneQuery' => App\GraphQL\Query\SmartphoneQuery::class
            ],
            'mutation' => [
                // 'PostMutation' => App\GraphQL\Mutation\PostMutation::class
                // 'Camera'    => App\GraphQL\Type\Camera\Camera::class,
                'IVideo'    => App\GraphQL\Type\Camera\IVideo::class,
                'IStorage'   => App\GraphQL\Type\Camera\IStorage::class,
                'ILens'      => App\GraphQL\Type\Camera\ILens::class,
                'IBatteryCamera'   => App\GraphQL\Type\Camera\IBatteryCamera::class,
                'IConnectivity'   => App\GraphQL\Type\Camera\IConnectivity::class,
                'IExposure'   => App\GraphQL\Type\Camera\IExposure::class,
                'IDesign'   => App\GraphQL\Type\Camera\IDesign::class,
                'IFeatures'   => App\GraphQL\Type\Camera\IFeatures::class,
                'ISensor'   => App\GraphQL\Type\Camera\ISensor::class,

                // 'Laptop'    => App\GraphQL\Type\Laptop\Laptop::class,
                'IGeneral'    => App\GraphQL\Type\Laptop\IGeneral::class,
                'IDisplay'    => App\GraphQL\Type\Laptop\IDisplay::class,
                'IConnectivityLP'    => App\GraphQL\Type\Laptop\IConnectivityLP::class,
                'IMemory'    => App\GraphQL\Type\Laptop\IMemory::class,
                'IMultimediaLP'    => App\GraphQL\Type\Laptop\IMultimediaLP::class,
                'IPerformance'    => App\GraphQL\Type\Laptop\IPerformance::class,
                'IPeripherals'    => App\GraphQL\Type\Laptop\IPeripherals::class,
                'IPorts'    => App\GraphQL\Type\Laptop\IPorts::class,
                'IStorage'    => App\GraphQL\Type\Laptop\IStorage::class,

                // 'Smartphone'        => App\GraphQL\Type\Smartphone\Smartphone::class,
                'ICellularSM'      => App\GraphQL\Type\Smartphone\ICellular::class,
                'ICameraSM'        => App\GraphQL\Type\Smartphone\ICamera::class,
               'IBatterySmartphone'       => App\GraphQL\Type\Smartphone\IBatterySmartphone::class,
                'IConnectivitySM'  => App\GraphQL\Type\Smartphone\IConnectivitySM::class,
                'IDisplaySM'       => App\GraphQL\Type\Smartphone\IDisplay::class,
                'IDesignSM'        => App\GraphQL\Type\Smartphone\IDesign::class,
                'IFeaturesSM'      => App\GraphQL\Type\Smartphone\IFeatures::class,
                'IMultimediaSM'    => App\GraphQL\Type\Smartphone\IMultimediaSM::class,
                'IPlatfromSM'     => App\GraphQL\Type\Smartphone\IPlatform::class
        
            ]
        ]
    ],

    /*
     * Additional resolvers which can also be used with shorthand building of the schema
     * using \GraphQL\Utils::BuildSchema feature
     *
     * Example:
     *
     * 'resolvers' => [
     *     'default' => [
     *         'echo' => function ($root, $args, $context) {
     *              return 'Echo: ' . $args['message'];
     *          },
     *     ],
     * ],
     */
    'resolvers' => [
        'default' => [
        ],
    ],

    /*
     * Overrides the default field resolver
     * Useful to setup default loading of eager relationships
     *
     * Example:
     *
     * 'defaultFieldResolver' => function ($root, $args, $context, $info) {
     *     // take a look at the defaultFieldResolver in
     *     // https://github.com/webonyx/graphql-php/blob/master/src/Executor/Executor.php
     * },
     */
    'defaultFieldResolver' => null,

    /*
     * The types available in the application. You can access them from the
     * facade like this: GraphQL::type('user')
     *
     * Example:
     *
     * 'types' => [
     *     'user' => 'App\GraphQL\Type\UserType'
     * ]
     *
     * or without specifying a key (it will use the ->name property of your type)
     *
     * 'types' =>
     *     'App\GraphQL\Type\UserType'
     * ]
     */

     //type ditulis di sini
    'types' => [
        // App\GraphQL\Type\PostType::class,

        //Monitor
        // 'IMonitor' => App\GraphQL\Type\Monitor\IMonitor::class,
        // 'IDisplay' => App\GraphQL\Type\Monitor\IDisplay::class,

        //Camera
        'Camera'    => App\GraphQL\Type\Camera\Camera::class,
        'Video'    => App\GraphQL\Type\Camera\Video::class,
        'Storage'   => App\GraphQL\Type\Camera\Storage::class,
        'Lens'      => App\GraphQL\Type\Camera\Lens::class,
        'BatteryCamera'   => App\GraphQL\Type\Camera\BatteryCamera::class,
        'Connectivity'   => App\GraphQL\Type\Camera\Connectivity::class,
        'Exposure'   => App\GraphQL\Type\Camera\Exposure::class,
        'Design'   => App\GraphQL\Type\Camera\Design::class,
        'Features'   => App\GraphQL\Type\Camera\Features::class,
        'Sensor'   => App\GraphQL\Type\Camera\Sensor::class,
        'Flash'   => App\GraphQL\Type\Camera\Flash::class,
       

        

        //Laptop
        'Laptop'    => App\GraphQL\Type\Laptop\Laptop::class,
        'General'    => App\GraphQL\Type\Laptop\General::class,
        'Display'    => App\GraphQL\Type\Laptop\Display::class,
        'ConnectivityLP'    => App\GraphQL\Type\Laptop\ConnectivityLP::class,
        'Memory'    => App\GraphQL\Type\Laptop\Memory::class,
        'Multimedia'    => App\GraphQL\Type\Laptop\Multimedia::class,
        'Performance'    => App\GraphQL\Type\Laptop\Performance::class,
        'Peripherals'    => App\GraphQL\Type\Laptop\Peripherals::class,
        'Ports'    => App\GraphQL\Type\Laptop\Ports::class,
        'StorageLP'    => App\GraphQL\Type\Laptop\Storage::class,

        //smartphone
        'Smartphone'      => App\GraphQL\Type\Smartphone\Smartphone::class,
        'CellularSM'      => App\GraphQL\Type\Smartphone\CellularSM::class,
        'CameraSM'        => App\GraphQL\Type\Smartphone\Camera::class,
        'BatterySmartphone'       => App\GraphQL\Type\Smartphone\BatterySmartphone::class,
        'ConnectivitySM'  => App\GraphQL\Type\Smartphone\ConnectivitySM::class,
        'DisplaySM'       => App\GraphQL\Type\Smartphone\Display::class,
        'DesignSM'        => App\GraphQL\Type\Smartphone\Design::class,
        'FeaturesSM'      => App\GraphQL\Type\Smartphone\Features::class,
        'MultimediaSM'    => App\GraphQL\Type\Smartphone\MultimediaSM::class,
        'PlatformSM'     => App\GraphQL\Type\Smartphone\Platform::class

        // 'ISmartphone'    => App\GraphQL\Type\Laptop\ISmartphone::class,
       


    ],

    /*
     * This callable will receive all the Exception objects that are caught by GraphQL.
     * The method should return an array representing the error.
     *
     * Typically:
     *
     * [
     *     'message' => '',
     *     'locations' => []
     * ]
     */
    'error_formatter' => [\Folklore\GraphQL\GraphQL::class, 'formatError'],

    /*
     * Options to limit the query complexity and depth. See the doc
     * @ https://github.com/webonyx/graphql-php#security
     * for details. Disabled by default.
     */
    'security' => [
        'query_max_complexity' => null,
        'query_max_depth' => null,
        'disable_introspection' => false
    ]
];
