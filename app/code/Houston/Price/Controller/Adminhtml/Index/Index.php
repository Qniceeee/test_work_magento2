<?php

namespace Houston\Price\Controller\Adminhtml\Index;

use Magento\Framework\Controller\ResultFactory;

class Index extends \Houston\Price\Controller\Adminhtml\Index\AbstractController
{

    public function execute()
    {
        $resultPage = $this->resultFactory->create(ResultFactory::TYPE_PAGE);
        $resultPage->getConfig()->getTitle()->prepend(__('Price Requests panel'));

        return $resultPage;
    }


    public function _isAllowed()
    {
        return $this->_authorization->isAllowed('Houston_Price::price');
    }
}
