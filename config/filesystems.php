<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default filesystem disk that should be used
    | by the framework. The "local" disk, as well as a variety of cloud
    | based disks are available to your application for file storage.
    |
    */

    'default' => env('FILESYSTEM_DISK', 'local'),

    /*
    |--------------------------------------------------------------------------
    | Filesystem Disks
    |--------------------------------------------------------------------------
    |
    | Below you may configure as many filesystem disks as necessary, and you
    | may even configure multiple disks for the same driver. Examples for
    | most supported storage drivers are configured here for reference.
    |
    | Supported Drivers: "local", "ftp", "sftp", "s3"
    |
    */

    'disks' => [

        'local' => [
            'driver' => 'local',
            'root' => storage_path('app'),
            'throw' => false,
        ],

        'public' => [
            'driver' => 'local',
            'root' => storage_path('app/public'),
            'url' => env('APP_URL') . '/storage',
            'visibility' => 'public',
            'throw' => false,
        ],

        'blog_images' => [
            'driver' => 'local',
            'root' => storage_path('app/blog_images'),
            'url' => env('APP_URL') . '/storage/blog_images',
            'visibility' => 'public',
            'throw' => false,
        ],

        'project_proposals' => [
            'driver' => 'local',
            'root' => storage_path('app/project_proposals'),
            'url' => env('APP_URL') . '/storage/project_proposals',
            'visibility' => 'public',
            'throw' => false,
        ],

        'designs' => [
            'driver' => 'local',
            'root' => storage_path('app/designs'),
            'url' => env('APP_URL') . '/storage/designs',
            'visibility' => 'public',
            'throw' => false,
        ],

        'magazines' => [
            'driver' => 'local',
            'root' => storage_path('app/magazines'),
            'url' => env('APP_URL') . '/storage/magazines',
            'visibility' => 'public',
            'throw' => false,
        ],

        'property_images' => [
            'driver' => 'local',
            'root' => storage_path('app/property_images'),
            'url' => env('APP_URL') . '/storage/property_images',
            'visibility' => 'public',
            'throw' => false,
        ],

        'profile_photos' => [
            'driver' => 'local',
            'root' => storage_path('app/profile_photos'),
            'url' => env('APP_URL') . '/storage/profile_photos',
            'visibility' => 'public',
            'throw' => false,
        ],

        'zone_images' => [
            'driver' => 'local',
            'root' => storage_path('app/zone_images'),
            'url' => env('APP_URL') . '/storage/zone_images',
            'visibility' => 'public',
            'throw' => false,
        ],

        // Add more disk configurations as needed...

        's3' => [
            'driver' => 's3',
            'key' => env('AWS_ACCESS_KEY_ID'),
            'secret' => env('AWS_SECRET_ACCESS_KEY'),
            'region' => env('AWS_DEFAULT_REGION'),
            'bucket' => env('AWS_BUCKET'),
            'url' => env('AWS_URL'),
            'endpoint' => env('AWS_ENDPOINT'),
            'use_path_style_endpoint' => env('AWS_USE_PATH_STYLE_ENDPOINT', false),
            'throw' => false,
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Symbolic Links
    |--------------------------------------------------------------------------
    |
    | Here you may configure the symbolic links that will be created when the
    | `storage:link` Artisan command is executed. The array keys should be
    | the locations of the links and the values should be their targets.
    |
    */

    'links' => [
        public_path('storage') => storage_path('app/public'),
        public_path('blog_images') => storage_path('app/blog_images'),
        public_path('project_proposals') => storage_path('app/project_proposals'),
        public_path('designs') => storage_path('app/designs'),
        public_path('magazines') => storage_path('app/magazines'),
        public_path('property_images') => storage_path('app/property_images'),
        public_path('profile_photos') => storage_path('app/profile_photos'),
        public_path('zone_images') => storage_path('app/zone_images'),
    ],

];