<?php
namespace Payum\Icepay\Model;

use Payum\Core\Model\PaymentInterface as BasePaymentInterface;

/**
 * Interface PaymentInterface
 * @package Payum\Icepay\Model
 */
interface PaymentInterface extends BasePaymentInterface
{
    /**
     * @return mixed
     */
    public function getId();

    /**
     * @return string
     */
    public function getCountry();

    /**
     * @return string
     */
    public function getIssuer();

    /**
     * @return mixed
     */
    public function getMethod();

    /**
     * @return string
     */
    public function getLanguage();

    /**
     * @return OrderInterface
     */
    public function getOrder();
}
