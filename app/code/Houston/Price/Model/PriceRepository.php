<?php

namespace Houston\Price\Model;

use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;

/**
 * Class PriceRepository
 * @package Houston\Price\Model
 */
class PriceRepository implements \Houston\Price\Api\PriceRequestsRepositoryInterface
{
    /**
     * @var \Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface
     */
    protected $collectionProcessor;

    /**
     * @var \Magento\Framework\Api\SearchResultsInterfaceFactory
     */
    protected $searchResultsFactory;

    /**
     * @var PriceFactory
     */
    protected $priceFactory;

    /**
     * @var ResourceModel\Price
     */
    protected $priceResourceModel;

    /**
     * @var ResourceModel\Collection\PriceFactory
     */
    protected $priceCollectionFactory;

    /**
     * PriceRepository constructor.
     * @param PriceFactory $priceFactory
     * @param ResourceModel\Price $priceResourceModel
     * @param ResourceModel\Collection\PriceFactory $priceCollectionFactory
     * @param \Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface $collectionProcessor
     * @param \Magento\Framework\Api\SearchResultsInterfaceFactory $searchResultsFactory
     */
    public function __construct
    (
        \Houston\Price\Model\PriceFactory $priceFactory,
        \Houston\Price\Model\ResourceModel\Price $priceResourceModel,
        \Houston\Price\Model\ResourceModel\Collection\PriceFactory $priceCollectionFactory,
        \Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface $collectionProcessor,
        \Magento\Framework\Api\SearchResultsInterfaceFactory $searchResultsFactory
    )
    {
        $this->priceFactory = $priceFactory;
        $this->priceResourceModel = $priceResourceModel;
        $this->priceCollectionFactory = $priceCollectionFactory;
        $this->collectionProcessor = $collectionProcessor;
        $this->searchResultsFactory = $searchResultsFactory;
    }

    /**
     * @param $model
     * @return mixed|void
     * @throws CouldNotSaveException
     */
    public function save($model)
    {
        try {
            $this->priceResourceModel->save($model);
        }catch ( \Exception $e)
        {
            throw new CouldNotSaveException(__('Sorry, cant save your price! ' . $e->getMessage() ) );
        }
    }

    /**
     * @param $model
     * @return bool
     * @throws CouldNotDeleteException
     */
    public function delete($model)
    {
        try {
            $this->priceResourceModel->delete($model);
            return true;
        }catch ( \Exception $e)
        {
            throw new CouldNotDeleteException(__('Sorry, cant delete your price! ' . $e->getMessage() ) );
        }
    }

    /**
     * @param $id
     * @return Price|mixed
     * @throws NoSuchEntityException
     */
    public function getById($id)
    {
        try {
            $model = $this->priceFactory->create();
            $this->priceResourceModel->load($model, $id);

            return $model;
        }catch ( \Exception $e)
        {
            throw new NoSuchEntityException(__('Sorry, cant get your price %1! ' . $e->getMessage() ) );
        }
    }

    /**
     * @param $searchCriteria
     * @return \Magento\Framework\Api\SearchResultsInterface|mixed
     */
    public function getList($searchCriteria)
    {
        $collection = $this->priceCollectionFactory->create();
        $this->collectionProcessor->process($searchCriteria, $collection);
        $searchResults = $this->searchResultsFactory->create();
        $searchResults->setSearchCriteria($searchCriteria);
        $searchResults->setItems($collection->getItems());
        return $searchResults;
    }

    /**
     * @return Price
     */
    public function getPriceModel()
    {
        return $this->priceFactory->create();
    }

    /**
     * @return ResourceModel\Collection\Price
     */
    public function getPriceCollection()
    {
        return $this->priceCollectionFactory->create();
    }
}