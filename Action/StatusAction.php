<?php
namespace Payum\Icepay\Action;

use Payum\Core\Action\ActionInterface;
use Payum\Core\Request\GetStatusInterface;
use Payum\Core\Bridge\Spl\ArrayObject;
use Payum\Core\Exception\RequestNotSupportedException;

class StatusAction implements ActionInterface
{
    /**
     * {@inheritDoc}
     *
     * @param GetStatusInterface $request
     */
    public function execute($request)
    {
        RequestNotSupportedException::assertSupports($this, $request);

        $model = ArrayObject::ensureArrayObject($request->getModel());

        if ($model['checkoutResponse']) {
            if (isset($model['checkoutResponse']->Message)) {
                $request->markFailed();
            } else {
                $request->markCaptured();
            }
        } else {
            $request->markNew();
        }

        return;
    }

    /**
     * {@inheritDoc}
     */
    public function supports($request)
    {
        return
            $request instanceof GetStatusInterface &&
            $request->getModel() instanceof \ArrayAccess
        ;
    }
}
