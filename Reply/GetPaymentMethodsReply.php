<?php
namespace Payum\Icepay\Reply;

use Doctrine\Common\Collections\ArrayCollection;
use Payum\Core\Reply\Base;
use Payum\Icepay\Response\Model\PaymentMethod;

/**
 * Class GetPaymentMethods
 * @package Payum\Icepay\Reply
 * @author Mark Pietrusinski <mark.pietrusinski@sqills.com>
 */
class GetPaymentMethodsReply extends Base
{
    /**
     * @var ArrayCollection|PaymentMethod[]
     */
    public $paymentMethods;

    /**
     * @param ArrayCollection|PaymentMethod[] $getPaymentMethodsResponse
     */
    public function __construct(ArrayCollection $paymentMethods)
    {
        $this->paymentMethods = $paymentMethods;
    }

}
