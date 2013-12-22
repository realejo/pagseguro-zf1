<?php
/**
 * Bootstrap para os testes do PHPUnit
 *
 * @category   UnitTests
 * @author     Realejo
 * @version    $Id: bootstrap.php 51 2013-07-05 21:09:29Z rodrigo $
 * @copyright  Copyright (c) 2011-2012 Realejo Design Ltda. (http://www.realejo.com.br)
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

/* Zend_Loader_Autoloader::getInstance();

$locale = new Zend_Locale('pt_BR');
Zend_Locale_Format::setOptions(array('precision'=>2));
Zend_Registry::set('Zend_Locale', $locale);
date_default_timezone_set("America/Sao_Paulo");
 */