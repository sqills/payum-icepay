<?php
namespace Payum\Icepay;

use Payum\Icepay\Action\AuthorizeAction;
use Payum\Icepay\Action\CancelAction;
use Payum\Icepay\Action\ConvertPaymentAction;
use Payum\Icepay\Action\CaptureAction;
use Payum\Icepay\Action\GetPaymentMethodsAction;
use Payum\Icepay\Action\NotifyAction;
use Payum\Icepay\Action\RefundAction;
use Payum\Icepay\Action\StatusAction;
use Payum\Core\Bridge\Spl\ArrayObject;
use Payum\Core\GatewayFactory;
use Psr\Log\LoggerInterface;

/**
 * Class IcepayGatewayFactory
 * @package Payum\Icepay
 * @author Mark Pietrusinski <mark.pietrusinski@sqills.com>
 */
class IcepayGatewayFactory extends GatewayFactory
{
    /**
     * {@inheritDoc}
     */
    protected function populateConfig(ArrayObject $config)
    {
        $config->defaults([
            'payum.factory_name' => 'icepay',
            'payum.factory_title' => 'icepay',
            'payum.action.get_payment_methods' => new GetPaymentMethodsAction(),
            'payum.action.capture' => new CaptureAction(),
//            'payum.action.authorize' => new AuthorizeAction(),
//            'payum.action.refund' => new RefundAction(),
//            'payum.action.cancel' => new CancelAction(),
            'payum.action.notify' => new NotifyAction(),
            'payum.action.convert_payment' => new ConvertPaymentAction(),
            'payum.action.status' => new StatusAction(),
        ]);

        if (false == $config['payum.api']) {


            $config['payum.default_options'] = array(
                'sandbox' => true,
            );
            $config->defaults($config['payum.default_options']);
            $config['payum.required_options'] = [
                'api_key',
                'api_secret',
                'base_url',
                'retry_url'
            ];

            $config['payum.api'] = function (ArrayObject $config) {
                $config->validateNotEmpty($config['payum.required_options']);

                $api = new Api();
                if ($config['logger'] && $config['logger'] instanceof LoggerInterface) {
                    $api->setLogger($config['logger']);
                }

                $api->setApiKey($config['api_key']);
                $api->setApiSecret($config['api_secret']);
                $api->setCompletedURL($config['base_url']);
                $api->setErrorURL($config['base_url'] . $config['retry_url']);

                $api->setAllowedPaymentMethods($config['allowed_payment_methods']);
                $api->setAllowedIssuerCountries($config['allowed_issuer_countries']);
                $api->setAllowedIssuerCurrencies($config['allowed_issuer_currencies']);

                return $api;
            };
        }
    }
}
