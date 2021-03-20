<?php

namespace Houston\Price\Block\Adminhtml\Edit\Form;

/**
 * Class GenericButton
 * @package Houston\Price\Block\Adminhtml\Edit\Form
 */
class GenericButton
{
    /**
     * @var \Magento\Backend\Block\Widget\Context
     */
    private $context;

    /**
     * @var \Houston\Price\Model\PriceRepository
     */
    private $priceRepository;

    /**
     * GenericButton constructor.
     * @param \Houston\Price\Model\PriceRepository $priceRepository
     * @param \Magento\Backend\Block\Widget\Context $context
     */
    public function __construct(
        \Houston\Price\Model\PriceRepository $priceRepository,
        \Magento\Backend\Block\Widget\Context  $context
    ) {

        $this->priceRepository = $priceRepository;
        $this->context = $context;
    }

    /**
     * @return false|mixed
     */
    public function getId()
    {
        if($this->context->getRequest()->getParam('id')){
            $priceModel =$this->priceRepository->getPriceModel();
            $priceModel->load($this->context->getRequest()->getParam('id'));

            return $priceModel->getId();
        }
        return false;
    }

    /**
     * @return \Magento\Framework\UrlInterface
     */
    public function getUrlBuilder()
    {
        return $this->context->getUrlBuilder();
    }
}