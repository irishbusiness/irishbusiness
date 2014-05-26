<?php

return array(

    'multi' => array(
        'user' => array(
            'driver' => 'eloquent',
            'model' => 'User'
        ),
        'salesperson' => array(
            'driver' => 'eloquent',
            'model' => 'Salesperson'
        )
    ),

    'reminder' => array(

        'email' => 'emails.auth.reminder',

        'table' => 'password_reminders',

        'expire' => 60,

    ),

);