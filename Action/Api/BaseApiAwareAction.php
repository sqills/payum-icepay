<?php
namespace Payum\Icepay\Action\Api;

use Payum\Core\Action\ActionInterface;
use Payum\Core\ApiAwareInterface;
use Payum\Core\ApiAwareTrait;
use Payum\Core\GatewayAwareInterface;
use Payum\Core\GatewayAwareTrait;
use Payum\Core\GatewayInterface;
use Payum\Icepay\Api;

/**
 * Class BaseApiAwareAction
 * @package Payum\Icepay\Action\Api
 * @author Mark Pietrusinski <mark.pietrusinski@sqills.com>
 */
abstract class BaseApiAwareAction implements ActionInterface, GatewayAwareInterface, ApiAwareInterface
{
    use GatewayAwareTrait;
    use ApiAwareTrait;

    /**
     * @var Api
     */
    protected $api;

    /**
     * @var GatewayInterface
     */
    protected $gateway;

    /**
     * BaseApiAwareAction constructor.
     */
    public function __construct()
    {
        $this->apiClass = Api::class;
    }
}
