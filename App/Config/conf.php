<?php

/**
 * Project config file
 */
return array(
    // database info
    'db' => array(
        'host' => '127.0.0.1',
        'port' => '3306',
        'user' => '***',
        'pass' => '***',
        'charset' => 'utf8',
        'dbname' => 'blog'
    ),
    // app info
    'App' => array(
        'default_platform' => 'Home',
        'dao' => 'pdo',// mysql or pdo
    ),
    // platform
    'Home' => array(
        'default_controller' => 'Index',
        'default_action' => 'index'
    ),
    'Back' => array(
        'default_controller' => 'Admin',
        'default_action' => 'login'
    ),
    'Captcha' => array(
        'width' => 80,
        'height' => 32,
        'linenum' => 5,
        'stringnum' => 2,
        'pixelnum' => 0.03,
    ),
	// Others
    'Page' =>array(
    'rowsPerPage' => 5,
    'maxPages' => 5,
)
);
