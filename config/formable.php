<?php

return [

    'site_title' => 'Crystal Peel',

    'site_description' => 'Crystal Peel',

    'company_name' => 'Crystal Peel',
    'company_email' => 'test@test.is',

    'email' => 'test@test.is',
    
    /*
    |--------------------------------------------------------------------------
    | Formable hlutir (models)
    |--------------------------------------------------------------------------
    |
    | Hvaða hlutir eru í notkun?
    |
    */
    'hlutir' => [
        'Page',
        //'News',
        'Category',
        'Product',
    ],

    /*
    |--------------------------------------------------------------------------
    | Tungumál í boði
    |--------------------------------------------------------------------------
    |
    | Hvaða tungumál eru í boði? Fyrsti er sem kemur alltaf fremst allsstaðar, og er hann sá sem er stilltur sem default í kerfinu.
    |
    */
    'locales' => ['is'],

    'flagicons' => [
        'is' => 'flagicons/Iceland.png'
    ],



    'shipping_options' => [
        'sott' => 'Sótt á staðinn',
        'sent' => 'Sent á pósthús',
    ],


    'payment_options' => [
        'milli' => 'Greitt með millifærslu',
        'kort' => 'Greitt með greiðslukorti',
    ],


];  