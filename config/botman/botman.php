<?php

use BotMan\Drivers\Web\WebDriver;

return [

    /*
     * How long BotMan conversations are stored (minutes)
     */
    'conversation_cache_time' => 40,

    /*
     * Enable drivers
     */
    'drivers' => [
        WebDriver::class,
    ],

];
