<?php
namespace Payum\Icepay\Response\Model;

use Doctrine\Common\Collections\ArrayCollection;
use JMS\Serializer\Annotation as Jms;

/**
 * Class PaymentMethod
 * @author Mark Pietrusinski <mark.pietrusinski@sqills.com>
 */
class PaymentMethod
{
    /**
     * @Jms\SerializedName("PaymentMethodCode")
     * @Jms\Type("string")
     *
     * @var string
     */
    public $paymentMethodCode;

    /**
     * @Jms\SerializedName("Description")
     * @Jms\Type("string")
     *
     * @var string
     */
    public $description;

    /**
     * @Jms\SerializedName("Issuers")
     * @Jms\Type("ArrayCollection<Payum\Icepay\Response\Model\Issuer>")
     *
     * @var ArrayCollection|Issuer[]
     */
    public $issuers;

}