<?php

namespace Houston\Price\Controller\Adminhtml\Index;

use Magento\Framework\App\Request\DataPersistorInterface;



class Save extends \Magento\Backend\App\Action
{


    const ADMIN_RESOURCE = "Houston_Price::price_requests_edit";


    private $dataPersistor;


    private $priceRepository;


    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Houston\Price\Model\PriceRepository $priceRepository,
        DataPersistorInterface $dataPersistor
    )
    {
        $this->priceRepository = $priceRepository;
        parent::__construct($context);
        $this->dataPersistor = $dataPersistor;
    }


    public function execute()
    {
        $resultRedirect = $this->resultRedirectFactory->create();
        $data = $this->getRequest()->getPostValue();

        if ($data) {
            $priceModel = $this->priceRepository->getPriceModel();
            $id = $this->getRequest()->getParam('id');

            if (empty($data['id'])) {
                $data['id'] = null;
            }

            if ($id) {
                $priceModel->load($id);
            }

            $priceModel->setData($data);

            try {
                $priceModel->save();
                $this->messageManager->addSuccessMessage(__('Record SucessFully Update'));

                $this->dataPersistor->clear('houston_price');

                return $resultRedirect->setPath('*/*/edit', ['id' => $priceModel->getId()]);

            } catch (\Exception $exception) {
                $this->messageManager->addExceptionMessage($exception, __('Something Went to Wrong While save data'));
            }
            $this->dataPersistor->set('houston_price', $data);

            return $resultRedirect->setPath('*/*/edit', ['id' => $id]);
        }
        return $resultRedirect->setPath('*/*/index');
    }

}