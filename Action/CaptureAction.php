<?php
namespace Payum\Icepay\Action;

use JMS\Serializer\SerializerBuilder;
use Payum\Core\Bridge\Spl\ArrayObject;
use Payum\Core\Exception\Http\HttpException;
use Payum\Core\Reply\HttpRedirect;
use Payum\Core\Request\Capture;
use Payum\Core\Exception\RequestNotSupportedException;

use Payum\Core\Request\GetHumanStatus;
use Payum\Core\Security\GenericTokenFactoryAwareInterface;
use Payum\Icepay\Action\Api\BaseApiAwareAction;
use Payum\Icepay\Response\Model\Checkout;

/**
 * Class CaptureAction
 * @package Payum\Icepay\Action
 * @author Mark Pietrusinski <mark.pietrusinski@sqills.com>
 */
class CaptureAction extends BaseApiAwareAction
{
    /**
     * {@inheritDoc}
     *
     * @param Capture $request
     */
    public function execute($request)
    {
        RequestNotSupportedException::assertSupports($this, $request);

        $model = ArrayObject::ensureArrayObject($request->getModel());

        $this->api->setCompletedURL($request->getToken()->getAfterUrl());

        $checkout = $this->api->payment->checkOut($model);
        $model['checkout'] = $checkout;

        $status = new GetHumanStatus($model);
        if (!isset($checkout->PaymentScreenURL)) {
            $status->isFailed();
            $redirect = $this->api->api_error_url;
        } else {
            $status->isCaptured();
            $redirect = str_replace($checkout->PaymentScreenURL, ' ', '%20');
        }

        $this->gateway->execute(new GetHumanStatus($model));

        throw new HttpRedirect($redirect);
    }

    /**
     * {@inheritDoc}
     */
    public function supports($request)
    {
        return
            $request instanceof Capture &&
            $request->getModel() instanceof \ArrayAccess
        ;
    }
}
