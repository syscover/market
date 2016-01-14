<?php

return [
    /*
     * Paypal credential sandbox
     */
    'clientId' => 'Abnq3pDgPTVMWawPTOUkQjIRXRdOf3kLkNAQt0UJSGg2Hqr9flKZnI37Z2Dr7hTWHIZ3PfTcenMHpBZn',
    'secret'    => 'EHsB5RJVPe1Dr0ps8Ec-cyAOKsUV7sI-waBcW5I3fQnoa19rQJsOXUyjSsm_zkaFS29A5ELBHcrhZrlP',

    /*
     * Paypal credential live
     */
    //'clientId' => 'AdV7xSu7OrlKsABsLYIQP_G-u2PUcpXadBj65034LUv1p4ltYI-WuHgzyUzDxaQAZe88Eb9ms7_yzAP9',
    //'secret'    => 'EHnhZTlHw9qq9qQl6WckRWENLXdvsIEaqRKX9tQE98d69H2QOZl9MiOxsj6EnqjsiFELluhvztCMFiFQ',

    /*
     * SDK configuration
     */
    'settings' => [
        /*
         * Available option 'sandbox' or 'live'
         */
        'mode' => 'live',

        /*
         * Specify the max request time in seconds
         */
        'http.ConnectionTimeOut' => 30,

        /*
         * Whether want to log to a file
         */
        'log.LogEnabled' => true,

        /*
         * Specify the file that want to write on
         */
        'log.FileName' => storage_path() . '/logs/paypal.log',

        /*
         * Available option 'FINE', 'INFO', 'WARN' or 'ERROR'
         *
         * Logging is most verbose in the 'FINE' level and decreases as you
         * proceed towards ERROR
         */
        'log.LogLevel' => 'FINE'
    ]
];