<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Table
    |--------------------------------------------------------------------------
    |
    | This is the table used to save disks to the database
    |
    */
    'table' => 'ore_disks',

    /*
    |--------------------------------------------------------------------------
    | Drivers
    |--------------------------------------------------------------------------
    |
    | These are the accepted drivers
    |
    */
    'drivers' => [
        's3' => [
            'key', 
            'secret', 
            'region', 
            'bucket',
            'url'
        ],
        'local' => [
            'root', 
            'url', 
            'visibility'
        ],
    ]
];
