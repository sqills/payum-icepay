<?php
namespace Payum\Icepay\Response\Model;

use JMS\Serializer\Annotation as Jms;

/**
 * Class Checkout
 * @author Mark Pietrusinski <mark.pietrusinski@sqills.com>
 */
class Checkout
{
    /**
     * @Jms\SerializedName("Amount")
     * @Jms\Type("int")
     *
     * @var int
     */
    public $amount;

    /**
     * @Jms\SerializedName("Checksum")
     * @Jms\Type("int")
     *
     * @var string
     */
    public $checksum;

    /**
     * @Jms\SerializedName("Country")
     * @Jms\Type("string")
     *
     * @var string
     */
    public $country;

    /**
     * @Jms\SerializedName("Currency")
     * @Jms\Type("string")
     *
     * @var string
     */
    public $currency;

    /**
     * @Jms\SerializedName("Description")
     * @Jms\Type("string")
     *
     * @var string
     */
    public $description;

    /**
     * @Jms\SerializedName("EndUserIP")
     * @Jms\Type("string")
     *
     * @var string
     */
    public $endUserIP;

    /**
     * @Jms\SerializedName("Issuer")
     * @Jms\Type("string")
     *
     * @var string
     */
    public $issuer;

    /**
     * @Jms\SerializedName("Language")
     * @Jms\Type("string")
     *
     * @var string
     */
    public $language;
    /**
     * @Jms\SerializedName("MerchantID")
     * @Jms\Type("string")
     *
     * @var string
     */
    public $merchantId;

    /**
     * @Jms\SerializedName("OrderID")
     * @Jms\Type("string")
     *
     * @var string
     */
    public $orderId;

    /**
     * @Jms\SerializedName("PaymentID")
     * @Jms\Type("integer")
     *
     * @var integer
     */
    public $paymentId;

    /**
     * @Jms\SerializedName("PaymentMethod")
     * @Jms\Type("string")
     *
     * @var string
     */
    public $paymentMethod;

    /**
     * @Jms\SerializedName("PaymentScreenURL")
     * @Jms\Type("string")
     *
     * @var string
     */
    public $paymentScreenURL;

    /**
     * @Jms\SerializedName("ProviderTransactionID")
     * @Jms\Type("string")
     *
     * @var string
     */
    public $providerTransactionID;

    /**
     * @Jms\SerializedName("Reference")
     * @Jms\Type("string")
     *
     * @var string
     */
    public $reference;

    /**
     * @Jms\SerializedName("TestMode")
     * @Jms\Type("bool")
     *
     * @var bool
     */
    public $testMode;

    /**
     * @Jms\SerializedName("Timestamp")
     * @Jms\Type("string")
     *
     * @var string
     */
    public $timestamp;

    /**
     * @Jms\SerializedName("URLCompleted")
     * @Jms\Type("string")
     *
     * @var string
     */
    public $urlCompleted;

    /**
     * @Jms\SerializedName("URLError")
     * @Jms\Type("string")
     *
     * @var string
     */
    public $urlError;
}