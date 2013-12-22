<?php
/**
 * Pagseguro_Version test case.
 *
 * Realejo/PagSeguro (http://realejo.com.br/)
 *
 * @link      http://github.com/realejo/pagseguro-zf1
 * @copyright Copyright (c) 2013 Realejo (http://realejo.com.br)
 * @license   Apache 2.0
 */
class VersionTest extends PHPUnit_Framework_TestCase
{
    public function testVersion()
    {
        $this->assertStringMatchesFormat(Pagseguro_Version::VERSION, Pagseguro_Version::getLatest('develop'));
    }
}

