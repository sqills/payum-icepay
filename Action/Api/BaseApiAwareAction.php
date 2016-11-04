<?php
namespace Payum\Icepay\Action\Api;

use Payum\Core\Action\ActionInterface;
use Payum\Core\ApiAwareInterface;
use Payum\Core\ApiAwareTrait;
use Payum\Core\GatewayAwareInterface;
use Payum\Core\GatewayAwareTrait;
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

    public function __construct()
    {
        $this->apiClass = Api::class;
    }
}
