<?php
$i18n = require __DIR__ . '/i18n.php';

return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'language'   => 'uz',
    'sourceLanguage' => 'uz',
    'components' => [
        'telegram' => [
            'class' => 'aki\telegram\Telegram',
            'botToken' => '1470570071:AAFftwkPwW-vi04sHZDaPqAqdlNCkjly9hU',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',

        ],
        'i18n' => [
            'translations' => [
                'main*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@common/messages',
                ],
            ],
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'smtp.gmail.com',
                'username' => 'asd@gmail.com',
                'password' => 'omnsnesatlfabwcc',
                'port' => '587',
                'encryption' => 'tls',
            ],
            'viewPath'=>'@common/mail',
            'useFileTransport' => false,
        ],

    ],
];
