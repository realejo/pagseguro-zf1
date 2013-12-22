<?php
/**
 * Realejo/PagSeguro (http://realejo.com.br/)
 *
 * @link      http://github.com/realejo/pagseguro-zf1
 * @copyright Copyright (c) 2013 Realejo (http://realejo.com.br)
 * @license   Apache 2.0
 */
class ResourceTest extends PHPUnit_Framework_TestCase
{
    /**
     * Tests Pagseguro_Resource::getWebserviceUrl()
     */
    public function testGetWebserviceUrl()
    {
        $this->assertStringMatchesFormat(Pagseguro_Resource::WEBSERVICE_URL_DEVELOPMENT, Pagseguro_Resource::getWebserviceUrl('development'));
        $this->assertStringMatchesFormat(Pagseguro_Resource::WEBSERVICE_URL_DEVELOPMENT, Pagseguro_Resource::getWebserviceUrl('invalid'));
        $this->assertStringMatchesFormat(Pagseguro_Resource::WEBSERVICE_URL_PRODUCTION, Pagseguro_Resource::getWebserviceUrl('production'));

        // Não definido irá retornar o padrão do $env = testing
        $this->assertStringMatchesFormat(Pagseguro_Resource::WEBSERVICE_URL_DEVELOPMENT, Pagseguro_Resource::getWebserviceUrl('testing'));
        $this->assertStringMatchesFormat(Pagseguro_Resource::WEBSERVICE_URL_DEVELOPMENT, Pagseguro_Resource::getWebserviceUrl());
    }

    /**
     * Tests Pagseguro_Resource::getResourceUrl()
     *
     * @expectedException Exception
     */
    public function testGetResourceUrlException()
    {
        Pagseguro_Resource::getResourceUrl('invalid');
    }

    /**
     * Tests Pagseguro_Resource::getResourceUrl()
     */
    public function testGetResourceUrl()
    {

        $this->assertStringMatchesFormat(Pagseguro_Resource::getWebserviceUrl() . Pagseguro_Resource::PAYMENT_URL_PATH, Pagseguro_Resource::getResourceUrl('payment'));
        $this->assertStringMatchesFormat(Pagseguro_Resource::getWebserviceUrl() . Pagseguro_Resource::PAYMENT_URL_PATH, Pagseguro_Resource::getResourceUrl(Pagseguro_Resource::PAYMENT));

        $this->assertStringMatchesFormat(Pagseguro_Resource::getWebserviceUrl() . Pagseguro_Resource::NOTIFICATION_URL_PATH, Pagseguro_Resource::getResourceUrl('notification'));
        $this->assertStringMatchesFormat(Pagseguro_Resource::getWebserviceUrl() . Pagseguro_Resource::NOTIFICATION_URL_PATH, Pagseguro_Resource::getResourceUrl(Pagseguro_Resource::NOTIFICATION));

        $this->assertStringMatchesFormat(Pagseguro_Resource::getWebserviceUrl() . Pagseguro_Resource::TRANSACTION_URL_PATH, Pagseguro_Resource::getResourceUrl('transaction'));
        $this->assertStringMatchesFormat(Pagseguro_Resource::getWebserviceUrl() . Pagseguro_Resource::TRANSACTION_URL_PATH, Pagseguro_Resource::getResourceUrl(Pagseguro_Resource::TRANSACTION));
    }

    /**
     * Tests Pagseguro_Resource::getCheckoutUrl()
     */
    public function testGetCheckoutUrl()
    {
        $this->assertStringMatchesFormat(Pagseguro_Resource::PAYMENT_URL_CHECKOUT, Pagseguro_Resource::getCheckoutUrl());
    }
}
