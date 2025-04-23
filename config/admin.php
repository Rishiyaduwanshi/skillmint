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


        /*
    |--------------------------------------------------------------------------
    | Payment Information
    |--------------------------------------------------------------------------
    */
    'payment_gateway' => env('PAYMENT_GATEWAY', 'stripe'),
    'stripe_key' => env('STRIPE_KEY', 'pk_test_your_stripe_key'),
    'stripe_secret' => env('STRIPE_SECRET', 'sk_test_your_stripe_secret'),
    'upi_id' => env('UPI_ID', 'Enter UPI ID'),
    'account_holder' => env('ACCOUNT_HOLDER', 'Admin'),
    'upi_QR_code' => env('UPI_QR_CODE', 'payment/qrCode.jpg'),
    'ifsc_code' => env('IFSC_CODE', 'Enter your IFSC Code'),
    'bank_name' => env('BANK_NAME','Enter your Bank name'),
    'account_number' => env('ACCOUNT_NUMBER', 'Enter your bank account number')

];
