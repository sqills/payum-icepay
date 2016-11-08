<?php


namespace Payum\Icepay;

use Icepay\API\Client;

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
}