<?php

namespace Houston\Price\Controller\Adminhtml\Index;


class Edit extends \Magento\Backend\App\Action
{
    private $resultPageFactory;

    protected $registry;

    private $priceRepository;

    const ADMIN_RESOURCE = "Houston_Price::price_requests_edit";

    public function __construct
    (
        \Magento\Backend\App\Action\Context $context,
        \Houston\Price\Model\PriceRepository $priceRepository,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        \Magento\Framework\Registry $registry
    )
    {
        $this->resultPageFactory = $resultPageFactory;
        $this->registry = $registry;
        $this->priceRepository = $priceRepository;
        parent::__construct($context);
    }

    public function execute()
    {
        $price = $this->priceRepository->getPriceModel();

        $id = $this->getRequest()->getParam('id');

        if ($id) {

            $price->load($id);

            if (!$price->getId()) {
                $resultRedirect = $this->resultRedirectFactory->create();
                return $resultRedirect->setPath('*/*/index');
            }
        }

        $this->registry->register('houston', $price);

        $resultPage = $this->resultPageFactory->create();
        $resultPage->getConfig()->setKeywords(__('Edit Page'));

        $resultPage->setActiveMenu('Houston_Price::price');

        $resultPage->getConfig()->getTitle()->prepend('Price Module');
        $pageTitlePrefix = __('Edit Page for %1',
            $price->getId() ? $price->getId() : __('New entry')
        );
        $resultPage->getConfig()->getTitle()->prepend($pageTitlePrefix);

        return $resultPage;
    }
}