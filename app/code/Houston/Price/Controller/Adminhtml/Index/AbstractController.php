<?php

namespace Houston\Price\Controller\Adminhtml\Index;

use Magento\Backend\App\Action;

abstract class AbstractController extends \Magento\Backend\App\Action
{
    const DEFAULT_ACTION_PATH = 'price_requests/index/';

    protected $priceRequests;

    public function __construct(
        Action\Context $context,
        \Houston\Price\Model\PriceRepository $priceRequests
    ) {
        parent::__construct($context);
        $this->priceRequests = $priceRequests;
    }
}
