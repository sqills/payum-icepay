<?php
namespace Payum\Icepay\Action;

use Payum\Core\Action\ActionInterface;
use Payum\Core\Exception\RequestNotSupportedException;
use Payum\Core\GatewayAwareTrait;
use Payum\Core\Request\Convert;
use Payum\Icepay\Model\PaymentInterface;

class ConvertPaymentAction implements ActionInterface
{
    use GatewayAwareTrait;

    /**
     * {@inheritDoc}
     *
     * @param Convert $request
     */
    public function execute($request)
    {
        RequestNotSupportedException::assertSupports($this, $request);

        /** @var PaymentInterface $payment */
        $payment = $request->getSource();

        $request->setResult([
            'checkoutRequest' => [
                'Amount' => $payment->getTotalAmount(),
                'Country' => $payment->getCountry(),
                'Currency' => $payment->getCurrencyCode(),
                'Description' => $payment->getDescription(),
                'Issuer' => $payment->getIssuer(),
                'Language' => $payment->getLanguage(),
                'OrderID' => substr(uniqid($payment->getOrder()->getId() . '_'), 0, 10),
                'Paymentmethod' => $payment->getMethod(),
                'Reference' => $payment->getReference(),
            ]
        ]);
    }

    /**
     * {@inheritDoc}
     */
    public function supports($request)
    {
        return
            $request instanceof Convert &&
            $request->getSource() instanceof PaymentInterface &&
            $request->getTo() == 'array'
        ;
    }
}
