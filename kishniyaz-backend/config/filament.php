<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Broadcasting
    |--------------------------------------------------------------------------
    |
    | By installing the Laravel Echo package, you may use Filament to
    | broadcast events to your users. Configure the broadcaster below.
    |
    */

    'broadcasting' => [
        
        'echo' => [
            'broadcaster' => null,
            'key' => env('VITE_PUSHER_APP_KEY'),
            'cluster' => env('VITE_PUSHER_APP_CLUSTER'),
            'wsHost' => env('VITE_PUSHER_HOST'),
            'wsPort' => env('VITE_PUSHER_PORT'),
            'wssPort' => env('VITE_PUSHER_PORT'),
            'authEndpoint' => '/broadcasting/auth',
            'disableStats' => true,
            'encrypted' => true,
            'forceTLS' => false,
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Default Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | This is the storage disk Filament will use to store files. You may use
    | any of the disks defined in the `config/filesystems.php`.
    |
    */

    'default_filesystem_disk' => env('FILAMENT_FILESYSTEM_DISK', 'public'),

    /*
    |--------------------------------------------------------------------------
    | Assets Path
    |--------------------------------------------------------------------------
    |
    | This is the directory where Filament's assets will be published to. It
    | is relative to the `public` directory of your Laravel application.
    |
    */

    'assets_path' => null,

    /*
    |--------------------------------------------------------------------------
    | Livewire Loading Delay
    |--------------------------------------------------------------------------
    |
    | This sets the delay before loading indicators appear.
    |
    | Setting this to 'none' makes indicators appear immediately, which can
    | be distracting. Setting it to 'default' applies Livewire's standard
    | 200ms delay. If you wish, you may specify a custom delay in
    | milliseconds before indicators appear.
    |
    */

    'livewire_loading_delay' => 'default',

];
