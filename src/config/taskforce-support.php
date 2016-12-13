<?php

return array(

    'layout' => 'taskforce-support::layouts.master',

    'frontend' => [

        /**
         * Use this section to indicate if your view supports any of the following libraries.
         *
         * When using the master layout provided by this package the frameworks will be pulled from
         * their respective cdn's.
         *
         * Use true/false
         */
        'libraries' => [
            'jquery' => true,

            'foundation' => false,

            'bootstrap' => false, // Requires jQuery
        ]
    ],

);
