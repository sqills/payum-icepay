<?php
namespace Payum\Icepay\Response;

use JMS\Serializer\Annotation as Jms;

/**
 * Class GetPaymentResponse
 * @author Mark Pietrusinski <mark.pietrusinski@sqills.com>
 */
class GetPaymentResponse
{
    const STATUS_OPEN = 'OPEN';
    const STATUS_ERROR = 'ERR';
    const STATUS_OK = 'OK';
    const STATUS_REFUND = 'REFUND';
    const STATUS_CHARGEBACK = 'CBACK';
    const STATUS_VALIDATE = 'VALIDATE';

    /**
     * @Jms\SerializedName("Amount")
     * @Jms\Type("integer")
     *
     * @var int
     */
    public $amount;

    /**
     * @Jms\SerializedName("Checksum")
     * @Jms\Type("string")
     *
     * @var string
     */
    public $checksum;

    /**
     * @Jms\SerializedName("consumerAccountNumber")
     * @Jms\Type("string")
     *
     * @var string
     */
    public $consumerAccountNumber;

    /**
     * @Jms\SerializedName("ConsumerAddress")
     * @Jms\Type("string")
     *
     * @var string
     */
    public $consumerAddress;

    /**
     * @Jms\SerializedName("ConsumerBIC")
     * @Jms\Type("string")
     *
     * @var string
     */
    public $consumerBIC;

    /**
     * @Jms\SerializedName("ConsumerCity")
     * @Jms\Type("string")
     *
     * @var string
     */
    public $consumerCity;

    /**
     * @Jms\SerializedName("consumerCountry")
     * @Jms\Type("string")
     *
     * @var string
     */
    public $consumerCountry;

    /**
     * @Jms\SerializedName("ConsumerEmail")
     * @Jms\Type("string")
     *
     * @var string
     */
    public $consumerEmail;

    /**
     * @Jms\SerializedName("ConsumerHouseNumber")
     * @Jms\Type("string")
     *
     * @var string
     */
    public $consumerHouseNumber;

    /**
     * @Jms\SerializedName("ConsumerIPAddress")
     * @Jms\Type("string")
     *
     * @var string
     */
    public $consumerIPAddress;

    /**
     * @Jms\SerializedName("ConsumerName")
     * @Jms\Type("string")
     *
     * @var string
     */
    public $consumerName;

    /**
     * @Jms\SerializedName("ConsumerPhoneNumber")
     * @Jms\Type("string")
     *
     * @var string
     */
    public $consumerPhoneNumber;

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
    public $cescription;

    /**
     * @Jms\SerializedName("Duration")
     * @Jms\Type("string")
     *
     * @var string
     */
    public $duration;

    /**
     * @Jms\SerializedName("Issuer")
     * @Jms\Type("integer")
     *
     * @var string
     */
    public $issuer;

    /**
     * @Jms\SerializedName("MerchantID")
     * @Jms\Type("string")
     *
     * @var string
     */
    public $merchantID;

    /**
     * @Jms\SerializedName("OrderID")
     * @Jms\Type("string")
     *
     * @var string
     */
    public $orderId;

    /**
     * @Jms\SerializedName("OrderTime")
     * @Jms\Type("string")
     *
     * @var string
     */
    public $orderTime;

    /**
     * @Jms\SerializedName("PaymentID")
     * @Jms\Type("integer")
     *
     * @var string
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
     * @Jms\SerializedName("PaymentTime")
     * @Jms\Type("string")
     *
     * @var string
     */
    public $paymentTime;

    /**
     * @Jms\SerializedName("Reference")
     * @Jms\Type("string")
     *
     * @var string
     */
    public $reference;

    /**
     * @Jms\SerializedName("Status")
     * @Jms\Type("string")
     *
     * @var string
     */
    public $status;

    /**
     * @Jms\SerializedName("StatusCode")
     * @Jms\Type("string")
     *
     * @var string
     */
    public $StatusCode;

    /**
     * @Jms\SerializedName("TestMode")
     * @Jms\Type("string")
     *
     * @var string
     */
    public $testMode;

    /**
     * @Jms\SerializedName("Timestamp")
     * @Jms\Type("string")
     *
     * @var string
     */
    public $timestamp;

}