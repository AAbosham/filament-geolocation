<?php

return [

    'fieldset' => [

        'label' => 'Geolocation',
        'helper_text' => 'This page needs access your location.',

    ],

    'messages' => [

        'errors' => [

            'title' => 'Alert!',

            'not_supported_browser' => 'Geolocation is not supported by this browser.',
            'permission_denied' => 'User denied the request for Geolocation.',
            'position_unavailable' => 'Location information is unavailable.',
            'timeout' => 'The request to get user location timed out.',
            'unknown_error' => 'An unknown error occurred.',

        ],

    ],
];
