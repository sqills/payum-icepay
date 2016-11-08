<?php
namespace Payum\Icepay\Action;

use JMS\Serializer\SerializerBuilder;

use Payum\Core\Exception\RequestNotSupportedException;
use Payum\Core\Bridge\Spl\ArrayObject;

use Payum\Icepay\Action\Api\BaseApiAwareAction;
use Payum\Icepay\Reply\GetPaymentMethodsReply;
use Payum\Icepay\Request\GetPaymentMethodsRequest;
use Payum\Icepay\Response\GetPaymentMethodsResponse;
use Payum\Icepay\Response\Model\Issuer;
use Payum\Icepay\Response\Model\PaymentMethod;

class GetPaymentMethodsAction extends BaseApiAwareAction
{
    /**
     * {@inheritDoc}
     *
     * @param GetPaymentMethodsRequest $request
     * @return GetPaymentMethodsResponse
     */
    public function execute($request)
    {
        RequestNotSupportedException::assertSupports($this, $request);

        $paymentMethodResponse = SerializerBuilder::create()->build()->deserialize(
            json_encode($this->api->payment->getMyPaymentMethods()),
            GetPaymentMethodsResponse::class,
            'json'
        );

        if ($paymentMethodResponse instanceof GetPaymentMethodsResponse
            && !empty($paymentMethodResponse->paymentMethods)
        ) {
            $paymentMethods = $paymentMethodResponse->paymentMethods;

            // filter out payment methods and issuers based on api configuration
            foreach ($paymentMethods as $paymentMethodIndex => $paymentMethod) {
                if (!empty($this->api->getAllowedPaymentMethods())
                    && !in_array($paymentMethod->paymentMethodCode, $this->api->getAllowedPaymentMethods())
                ) {
                    $paymentMethods->remove($paymentMethodIndex);

                } else {
                    if (!empty($this->api->getAllowedIssuerCountries())) {
                        $paymentMethod->issuers = $paymentMethod->issuers->filter(function(Issuer $issuer) {
                            $hasAllowedCountry = false;
                            foreach ($issuer->countries as $country) {
                                if (in_array($country->countryCode, $this->api->getAllowedIssuerCountries())) {
                                    $hasAllowedCountry = true;
                                    break;
                                }
                            }
                            return $hasAllowedCountry;
                        });
                    }

                    if (!empty($this->api->getAllowedIssuerCurrencies())) {
                        $paymentMethod->issuers = $paymentMethod->issuers->filter(function(Issuer $issuer) {
                            $hasAllowedCurrency = false;
                            foreach ($issuer->countries as $country) {
                                if (preg_match(
                                    sprintf('/%s/', implode('|', $this->api->getAllowedIssuerCurrencies())),
                                    $country->currency
                                )) {
                                    $hasAllowedCurrency = true;
                                    break;
                                }
                            }
                            return $hasAllowedCurrency;
                        });
                    }

                    if (!$paymentMethod->issuers->count()) {
                        $paymentMethods->remove($paymentMethodIndex);
                    }
                }
            }

            throw new GetPaymentMethodsReply($paymentMethods);
        }

        throw new \LogicException('Could not retrieve payment methods.');
    }

    /**
     * {@inheritDoc}
     */
    public function supports($request)
    {
        return $request instanceof GetPaymentMethodsRequest;
    }
}
