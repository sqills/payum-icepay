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

        $request->setResult(
            [
                'Amount' => $payment->getTotalAmount(),
                'Country' => $payment->getCountry(),
                'Currency' => $payment->getCurrencyCode(),
                'Description' => urlencode($payment->getDescription()),
                'Issuer' => $payment->getIssuer(),
                'Language' => $payment->getLanguage(),
                'OrderID' => $payment->getOrder()->getId(),
                'Paymentmethod' => $payment->getMethod(),
                'Reference' => urlencode($payment->getId()),
            ]
        );
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
