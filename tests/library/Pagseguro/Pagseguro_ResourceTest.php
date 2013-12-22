<?php

/**
 * Pagseguro_Resource test case.
 */
class Pagseguro_ResourceTest extends PHPUnit_Framework_TestCase
{

    /**
     *
     * @var Pagseguro_Resource
     */
    private $Pagseguro_Resource;

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


