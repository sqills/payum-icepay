<?php
namespace Payum\Icepay\Response\Model;

use Doctrine\Common\Collections\ArrayCollection;
use JMS\Serializer\Annotation as Jms;

/**
 * Class Issuer
 * @author Mark Pietrusinski <mark.pietrusinski@sqills.com>
 */
class Issuer
{
    /**
     * @Jms\SerializedName("IssuerKeyword")
     * @Jms\Type("string")
     *
     * @var string
     */
    public $issuerKeyword;

    /**
     * @Jms\SerializedName("Description")
     * @Jms\Type("string")
     *
     * @var string
     */
    public $description;
    
    /**
     * @Jms\SerializedName("Countries")
     * @Jms\Type("ArrayCollection<Payum\Icepay\Response\Model\Country>")
     *
     * @var ArrayCollection|Country[]
     */
    public $countries;
}