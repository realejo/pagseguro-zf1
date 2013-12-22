<?php
/**
 * Bootstrap para os testes do PHPUnit
 *
 * Realejo/PagSeguro (http://realejo.com.br/)
 *
 * @link      http://github.com/realejo/pagseguro-zf1
 * @copyright Copyright (c) 2013 Realejo (http://realejo.comb.r)
 * @license   Apache 2.0
 */
// Define path to application directory
defined('APPLICATION_PATH')
    || define('APPLICATION_PATH', realpath(dirname(__FILE__) . '/../application'));

// Define application environment
define('APPLICATION_ENV', 'testing');

error_reporting(E_ALL | E_STRICT);

set_include_path(__DIR__ . '/library' . PATH_SEPARATOR .
        __DIR__ . '/../library' . PATH_SEPARATOR .
        get_include_path());

require_once __DIR__ . '/../vendor/autoload.php';
