<?php
namespace Payum\Icepay\Response\Model;

use JMS\Serializer\Annotation as Jms;

/**
 * Class Country
 * @author Mark Pietrusinski <mark.pietrusinski@sqills.com>
 */
class Country
{
    /**
     * @Jms\SerializedName("CountryCode")
     * @Jms\Type("string")
     *
     * @var string
     */
    public $countryCode;

    /**
     * @Jms\SerializedName("Currency")
     * @Jms\Type("string")
     *
     * @var string
     */
    public $currency;
    
    /**
     * @Jms\SerializedName("MinimumAmount")
     * @Jms\Type("integer")
     *
     * @var Integer
     */
    public $minimumAmount;

    /**
     * @Jms\SerializedName("MaximumAmount")
     * @Jms\Type("integer")
     *
     * @var Integer
     */
    public $maximumAmount;
}