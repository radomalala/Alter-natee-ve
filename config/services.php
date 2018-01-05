<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],
    'twitter' => [
        'client_id'     => env('TWITTER_ID','NzKwsgC7ZbVB43IJ7plu4h2BA'),
        'client_secret' => env('TWITTER_SECRET','aA6PpQ35aoatW0eiekjO4zBFu140Hw89GwcXJsi30MeiQ9FbgL'),
        'redirect'      => env('TWITTER_URL','http://alternateeve.way2crm.com/public/auth/twitter/callback'),
        'scope'         =>'email'
    ],
    'facebook' => [
        'client_id'     => env('FACEBOOK_ID','1412228782133969'),
        'client_secret' => env('FACEBOOK_SECRET','0fda996baf810618b2d5e36a1a2a662f'),
        'redirect'      => env('FACEBOOK_URL','http://alternateeve.way2crm.com/public/auth/facebook/callback'),
    ],
    'google' => [
        'client_id' => env('GOOGLE_ID','105210641054-bbchu8e2eflr2tim74h1dc0fe8amr835.apps.googleusercontent.com'),
        'client_secret' => env('GOOGLE_SECRETE','42IZ7jxx86ao-xaxDndEYCCs'),
        'redirect' => env('GOOGLE_REDIRECT','http://alternateeve.way2crm.com/public/auth/google/callback'),
    ],
	'stripe' => [
		'secret' => env('STRIPE_SECRATE_KEY'),
		'publishable_key'=>env('STRIPE_PUBLISHABLE_KEY')
	],
	'mailchimp' => [
		'MAILCHIMP_API_KEY' => env('MAILCHIMP_API_KEY'),
		'MAILCHIMP_LIST_ID' => env('MAILCHIMP_LIST_ID')
	],


];
