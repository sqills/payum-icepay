<?php


namespace Payum\Icepay;

use Icepay\API\Client;
use Psr\Log\LoggerInterface;

/**
 * Class Api
 * @package Payum\Icepay
 * @author Mark Pietrusinski <mark.pietrusinski@sqills.com>
 */
class Api extends Client
{
    /**
     * @var array
     */
    protected $allowedPaymentMethods;

    /**
     * @var array
     */
    protected $allowedIssuerCurrencies;

    /**
     * @var array
     */
    protected $allowedIssuerCountries;

    /**
     * @var LoggerInterface
     */
    protected $logger;

    /**
     * @return array
     */
    public function getAllowedPaymentMethods(): array
    {
        return $this->allowedPaymentMethods;
    }

    /**
     * @param array $allowedPaymentMethods
     * @return Api
     */
    public function setAllowedPaymentMethods($allowedPaymentMethods)
    {
        $this->allowedPaymentMethods = $allowedPaymentMethods;
        return $this;
    }

    /**
     * @return array
     */
    public function getAllowedIssuerCurrencies(): array
    {
        return $this->allowedIssuerCurrencies;
    }

    /**
     * @param array $allowedIssuerCurrencies
     * @return Api
     */
    public function setAllowedIssuerCurrencies($allowedIssuerCurrencies)
    {
        $this->allowedIssuerCurrencies = $allowedIssuerCurrencies;
        return $this;
    }

    /**
     * @return array
     */
    public function getAllowedIssuerCountries(): array
    {
        return $this->allowedIssuerCountries;
    }

    /**
     * @param array $allowedIssuerCountries
     * @return Api
     */
    public function setAllowedIssuerCountries($allowedIssuerCountries)
    {
        $this->allowedIssuerCountries = $allowedIssuerCountries;

        return $this;
    }

    /**
     * @param LoggerInterface $logger
     * @return Api
     */
    public function setLogger(LoggerInterface $logger)
    {
        $this->logger = $logger;

        return $this;
    }

    /**
     * Request function to call Icepay API Rest Payment Server
     *
     * @param string $method
     * @param string $api_method
     * @param string $body
     * @param string $checksum
     *
     * @return \stdClass
     * @throws \Exception
     */
    public function request($method, $api_method, $body = null, $checksum)
    {
        if ($this->logger) {
            $this->logger->debug(
                sprintf(
                    'ICEPAY REQUEST: method=%s, api_method=%s, checksum=%s, body=%s',
                    $method,
                    $api_method,
                    $checksum,
                    print_r($body, true)
                )
            );
        }

        $response = parent::request($method, $api_method, $body, $checksum);

        if ($this->logger) {
            $this->logger->debug(
                sprintf(
                    'ICEPAY RESPONSE: %s',
                    print_r($response, true)
                )
            );
        }

        return $response;
    }
}