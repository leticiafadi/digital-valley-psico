<?php
return [
  'driver' => env('MAIL_DRIVER', 'smtp'),
  'host' => env('MAIL_HOST', 'smtp.gmail.com'),
  'port' => env('MAIL_PORT', 587),
  'from' => ['address' => 'n2s.mensageiro.assistencia@gmail.com' , 'name' => 'Equipe psicologia UFC' ],
  'encryption' => env('MAIL_ENCRYPTION', 'tls'),
  'username' => env('MAIL_USERNAME'),
  'password' => env('MAIL_PASSWORD'),
  'sendmail' => '/usr/sbin/sendmail -bs',
  'pretend' => false,
  'markdown' => [
    'theme' => 'default',
    'paths' => [
      resource_path('views/vendor/mail'),
    ]
  ],
];