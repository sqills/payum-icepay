<?php
namespace Payum\Icepay\Response;

use Doctrine\Common\Collections\ArrayCollection;
use JMS\Serializer\Annotation as Jms;
use Payum\Icepay\Response\Model\PaymentMethod;

/**
 * Class GetPaymentMethods
 * @author Mark Pietrusinski <mark.pietrusinski@sqills.com>
 */
class GetPaymentMethodsResponse
{
    /**
     * @Jms\SerializedName("PaymentMethods")
     * @Jms\Type("ArrayCollection<Payum\Icepay\Response\Model\PaymentMethod>")
     *
     * @var ArrayCollection|PaymentMethod[]
     */
    public $paymentMethods;
}