<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Application Primary Theme
    |--------------------------------------------------------------------------
    |
    | This is the application primary color. It defines the brand identity
    | and is used for key UI elements such as primary buttons and active links.
    */

    'primary' => '#353535',

    /*
    |--------------------------------------------------------------------------
    | Application Secondary Theme
    |--------------------------------------------------------------------------
    |
    | The secondary color supports the primary color and is used for
    | secondary buttons, tabs, accents, and less prominent actions.
    */

    'secondary' => '#C5C5C5',

    /*
    |--------------------------------------------------------------------------
    | Application Tertiary Theme
    |--------------------------------------------------------------------------
    |
    | The tertiary color is optional but useful in complex interfaces.
    | It adds additional contrast and can be used for highlights or 
    | differentiating modules/sections.
    */

    'tertiary' => '#F0B429',

    /*
    |--------------------------------------------------------------------------
    | Text Colors
    |--------------------------------------------------------------------------
    |
    | Text-specific colors used for headings, body text, and muted text.
    | Consider overriding these when using dark/light themes.
    */

    'text' => [
        'default' => '#111111',
        'muted'   => '#666666',
        'inverted' => '#ffffff',
    ],

    /*
    |--------------------------------------------------------------------------
    | Background Colors
    |--------------------------------------------------------------------------
    |
    | Background colors for general surfaces like cards, modals, and the page.
    */

    'background' => [
        'default' => '#ffffff',
        'muted'   => '#f4f4f4',
        'inverted' => '#121212',
    ],

    /*
    |--------------------------------------------------------------------------
    | Border Colors
    |--------------------------------------------------------------------------
    |
    | Default border styling throughout the application.
    */

    'border' => [
        'default' => '#E0E0E0',
        'light'   => '#F5F5F5',
        'dark'    => '#BDBDBD',
    ],

    /*
    |--------------------------------------------------------------------------
    | Semantic Colors
    |--------------------------------------------------------------------------
    |
    | These colors are used to indicate intent or status (success, error, etc.)
    */

    'semantic' => [
        'success' => '#3E7C3D', // green-500
        'warning' => '#F59E0B', // amber-500
        'error'   => '#EF4444', // red-500
        'info'    => '#3B82F6', // blue-500
    ],
];
