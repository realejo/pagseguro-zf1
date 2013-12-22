<?php
class Pagseguro_Resource
{
    CONST WEBSERVICE_URL_PRODUCTION  = 'https://ws.pagseguro.uol.com.br';
    CONST WEBSERVICE_URL_DEVELOPMENT = 'https://dev.ws.pagseguro.uol.com.br';

    CONST PAYMENT = 'payment';
    CONST PAYMENT_URL_PATH = '/v2/checkout';
    CONST PAYMENT_URL_CHECKOUT = 'https://pagseguro.uol.com.br/v2/checkout/payment.html';
    CONST PAYMENT_URL_TIMEOUT  = 20;

    CONST NOTIFICATION = 'notification';
    CONST NOTIFICATION_URL_PATH = '/v2/transactions/notifications';
    CONST NOTIFICATION_TIMEOUT  = 20;

    CONST TRANSACTION = 'transaction';
    CONST TRANSACTION_URL_PATH = '/v2/transactions';
    CONST TRANSACTION_TIMEOUT = 20;

    static public function getWebserviceUrl($env = null)
    {
        if (empty($env)) {
            $env = APPLICATION_ENV;
        }

        return ($env === 'production') ? WEBSERVICE_URL_PRODUCTION : WEBSERVICE_URL_DEVELOPMENT;
    }

    static public function getResourceUrl($service)
    {
        if ($service === self::PAYMENT) {
            return self::getWebserviceUrl() . self::PAYMENT_URL_PATH;
        } elseif($service === self::NOTIFICATION) {
            return self::getWebserviceUrl() . self::NOTIFICATION_URL_PATH;
        } elseif ($service === self::TRANSACTION) {
            return self::getWebserviceUrl() . self::TRANSACTION_URL_PATH;
        } else {
            throw new Exception("Service $service not defined in Pagseguro_Resource::getResourceUrl()");
        }
    }

    static public function getCheckoutUrl()
    {
        return self::PAYMENT_URL_CHECKOUT;
    }
}