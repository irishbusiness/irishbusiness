<?php

return array(

    'multi' => array(
        'user' => array(
            'driver' => 'eloquent',
            'model' => 'users'
        ),
        'salesperson' => array(
            'driver' => 'eloquent',
            'model' => 'salespersons'
        )
    ),

    'reminder' => array(

        'email' => 'emails.auth.reminder',

        'table' => 'password_reminders',

        'expire' => 60,

    ),

);