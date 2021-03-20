<?php

namespace Houston\Price\Controller\Request;

/**
 * Class Price
 * @package Houston\Price\Controller\Request
 */
class Price extends \Magento\Framework\App\Action\Action
{
    /**
     * @var \Houston\Price\Model\PriceRepository
     */
    protected $priceRepository;

    /**
     * @var \Magento\Framework\Controller\Result\JsonFactory
     */
    protected $resultJsonFactory;

    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    protected $resultPageFactory;

    /**
     * Price constructor.
     * @param \Magento\Framework\App\Action\Context $context
     * @param \Magento\Framework\Controller\Result\JsonFactory $resultJsonFactory
     * @param \Houston\Price\Model\PriceRepository $priceRepository
     * @param \Magento\Framework\View\Result\PageFactory $resultPageFactory
     */
    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\Controller\Result\JsonFactory $resultJsonFactory,
        \Houston\Price\Model\PriceRepository $priceRepository,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory
    )
    {
        parent::__construct($context);
        $this->resultJsonFactory = $resultJsonFactory;
        $this->priceRepository = $priceRepository;
        $this->resultPageFactory = $resultPageFactory;
    }

    /**
     * @return \Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\Result\Json|\Magento\Framework\Controller\ResultInterface
     * @throws \Magento\Framework\Exception\CouldNotSaveException
     */
    public function execute()
    {
        $name = $this->getRequest()->getParam('name');
        $email = $this->getRequest()->getParam('email');
        $comment = $this->getRequest()->getParam('comment');
        $product_sku = $this->getRequest()->getParam('product_sku');

        $priceModel = $this->priceRepository->getPriceModel();

        try {
            $priceModel->setUserName($name)
                ->setUserEmail($email)
                ->setComment($comment)
                ->setProductSku($product_sku);

            $this->priceRepository->save($priceModel);

            $resultJson = $this->resultJsonFactory->create();
            $data = ['success' => "true"];

            $this->messageManager->addSuccessMessage(__("Request price save success."));

            return $resultJson->setData($data);

        }catch (\Magento\Framework\Validator\Exception $exception) {
            $this->messageManager->addMessages($exception->getMessages());
        }
    }
}