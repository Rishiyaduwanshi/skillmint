<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Application Branding
    |--------------------------------------------------------------------------
    */
    'app_name' => env('APP_NAME', 'SkillMint'),
    'tagline' => env('APP_TAGLINE', 'Learn. Grow. Succeed.'),
    'logo' => env('APP_LOGO', 'logo.png'),
    'favicon' => env('APP_FAVICON', 'favicon.ico'),

    /*
    |--------------------------------------------------------------------------
    | Admin Info
    |--------------------------------------------------------------------------
    */
    'admin_name' => env('ADMIN_NAME', 'Admin'),
    'admin_email' => env('ADMIN_EMAIL', 'admin@mail.com'),
    'admin_password' => env('ADMIN_PASSWORD', '12345678'), 
    'admin_role' => 'admin',

    /*
    |--------------------------------------------------------------------------
    | Contact Information
    |--------------------------------------------------------------------------
    */
    'contact_email' => env('CONTACT_EMAIL', 'support@example.com'),
    'contact_number' => env('CONTACT_PHONE', '+91 9876543210'),

    /*
    |--------------------------------------------------------------------------
    | Social Links (Optional)
    |--------------------------------------------------------------------------
    */
    'social' => [
        'facebook' => env('SOCIAL_FB', 'https://facebook.com/yourpage'),
        'twitter' => env('SOCIAL_TW', 'https://twitter.com/yourhandle'),
        'linkedin' => env('SOCIAL_LN', 'https://linkedin.com/company/yourcompany'),
    ],

    /*
    |--------------------------------------------------------------------------
    | Misc Settings
    |--------------------------------------------------------------------------
    */
    'default_language' => env('APP_LANG', 'en'),
    'currency' => env('APP_CURRENCY', 'INR'),

];
